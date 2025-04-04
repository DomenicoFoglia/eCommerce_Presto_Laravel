<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateArticleForm extends Component
{
    use WithFileUploads;

    #[Validate('required|min:5')]
    public string $title = '';
    #[Validate('required|min:5')]
    public string $description = '';
    #[Validate('required|numeric|min:0')]
    public string $price = '';
    #[Validate('required|exists:categories,id')]
    public ?int $category = null;
    // public $article;
    public $images = [];
    public $temporary_images;

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio.',
            'title.min' => 'Il titolo deve contenere almeno 5 caratteri.',
            'description.required' => 'La descrizione è obbligatoria.',
            'description.min' => 'La descrizione deve contenere almeno 5 caratteri.',
            'price.required' => 'Il prezzo è obbligatorio.',
            'price.numeric' => 'Il prezzo deve essere un numero.',
            'category.required' => 'La categoria è obbligatoria.',
            'temporary_images.*.image' => __('ui.createL.temporary_images.image'),
        ];
    }

    public function article_store()
    {
        $this->validate();
        $article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => (float) $this->price,
            'category_id' => $this->category,
            'user_id' => Auth::id()
        ]);

        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $article->images()->create(['path' => $image->store('images', 'public')]);
            }
        }

        $this->reset();
        session()->flash('success', 'Articolo creato con successo');
    }

    public function render()
    {
        return view('livewire.create-article-form');
    }

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',

        ])) {
            foreach ($this->temporary_images as $image) {
                if (count($this->images) < 6) {
                    $this->images[] = $image;
                }
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }
}
