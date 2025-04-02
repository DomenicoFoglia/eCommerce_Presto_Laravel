<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateArticleForm extends Component
{
    #[Validate('required|min:5')]
    public string $title = '';
    #[Validate('required|min:5')]
    public string $description = '';
    #[Validate('required|numeric|min:0')]
    public string $price = '';
    #[Validate('required|exists:categories,id')]
    public ?int $category = null;
    // public $article;

    protected $messages = [
        'title.required' => 'Il titolo è obbligatorio.',
        'title.min' => 'Il titolo deve contenere almeno 5 caratteri.',
        'description.required' => 'La descrizione è obbligatoria.',
        'description.min' => 'La descrizione deve contenere almeno 5 caratteri.',
        'price.required' => 'Il prezzo è obbligatorio.',
        'price.numeric' => 'Il prezzo deve essere un numero.',
        'category.required' => 'La categoria è obbligatoria.',
    ];

    public function article_store()
    {
        $this->validate();
        Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => (float) $this->price,
            'category_id' => $this->category,
            'user_id' => Auth::id()
        ]);
        $this->reset();
        session()->flash('success', 'Articolo creato con successo');
    }

    public function render()
    {
        return view('livewire.create-article-form');
    }
}
