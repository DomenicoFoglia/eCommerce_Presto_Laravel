<div class="card mx-auto card-w shadow text-center mb-3">
    <img src="https://picsum.photos/200" class="card-img-top" alt="Immagine dell'articolo {{ $article->title }}">
    <div class="card-body">
        <h4 class="card-title">{{ $article->title }}</h4>
        <h6 class="card-subtitle text-body-secondary mt-1 mb-1"><strong>{{ __('ui.card.price') }}:
                {{ $article->price }}</strong></h6>
        <h6 class="card-subtitle text-body-secondary">
            <strong>{{ __('ui.' . $article->category->name) }}
            </strong>
            <div class="d-flex justify-content-evenly align-items-center mt-5">
                <a href="{{ route('article.show', compact('article')) }}"
                    class="btn btn-primary">{{ __('ui.card.detail') }}</a>
                <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                    class="btn btn-outline-info">{{ __('ui.card.categoryBtn') }}</a>
            </div>
    </div>
</div>
