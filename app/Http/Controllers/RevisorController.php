<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index', compact('article_to_check'));
    }

    public function accept(Article $article)
    {
        session(['last_action' => [
            'article_id' => $article->id,
            'previous_state' => $article->is_accepted,
        ]]);
        $article->setAccepted(true);
        return redirect()->back()->with('message', __('ui.show.revisor.listingAccepted') . ' ' . $article->title);
    }

    public function reject(Article $article)
    {
        session(['last_action' => [
            'article_id' => $article->id,
            'previous_state' => $article->is_accepted,
        ]]);
        $article->setAccepted(false);
        return redirect()->back()->with('message', __('ui.show.revisor.listingRejected') . ' ' . $article->title);
    }

    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('homepage')->with('message', __('ui.show.list.requestSent'));
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back()->with('message',  $user->name . __('ui.show.revisor.makeRevisor'));;
    }

    public function reset()
    {
        $lastAction = session('last_action');

        if ($lastAction) {
            $article = Article::find($lastAction['article_id']);
            if ($article) {
                $article->setAccepted($lastAction['previous_state']);
                session()->forget('last_action');
                return redirect()->back()->with('message', __('ui.show.revisor.cancelledMessage', ['title' => $article->title]));
            }
        }

        return redirect()->back()->with('error', __('ui.show.revisor.noCancelOperation'));
    }
}
