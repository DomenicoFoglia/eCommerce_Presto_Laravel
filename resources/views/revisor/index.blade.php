<x-layout>
    <main class="container py-5">
        @if (session()->has('message'))
            <div class="row justify-content-center">
                <div class="col-5 alert alert-success text-center shadow-sm rounded">
                    {{ session('message') }}
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger text-center my-3">
                {{ session('error') }}
            </div>
        @endif

        <section class="row mb-4">
            <div class="col-3">
                <div class="rounded shadow-sm bg-light p-3">
                    <h1 class="fs-4 text-primary">{{ __('ui.show.revisor.dashboard') }}</h1>
                </div>
            </div>
        </section>

        @if ($article_to_check)
            <div class="row ">
                @if ($article_to_check->images->count())
                    @foreach ($article_to_check->images as $key => $image)
                        <div class="col-6 col-md-4">
                            <div class="card shadow-sm">
                                <img src="{{ Storage::url($image->path) }}" class="card-img-top rounded"
                                    alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article_to_check->title }}">
                            </div>
                        </div>
                    @endforeach
                @else
                    @for ($i = 0; $i < 6; $i++)
                        <div class="col-6 col-md-4">
                            <div class="card shadow-sm">
                                <img src="https://picsum.photos/300?random={{ $i }}"
                                    class="card-img-top rounded" alt="immagine segnaposto">
                            </div>
                        </div>
                    @endfor
                @endif
            </div>

            <section class="row justify-content-center pt-5">
                <article class="col-md-6 bg-light p-4 rounded shadow-sm">
                    <div class="mb-3">
                        <h1 class="fs-3">{{ $article_to_check->title }}</h1>
                        <h3 class="fs-5 text-secondary">{{ __('ui.show.revisor.author') }}:
                            {{ $article_to_check->user->name }}</h3>
                        <h4 class="text-success">{{ $article_to_check->price }} €</h4>
                        <h5 class="fst-italic text-muted">#{{ $article_to_check->category->name }}</h5>
                        <p>{{ $article_to_check->description }}</p>
                    </div>
                    <div class="d-flex gap-2">
                        <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger">{{ __('ui.show.revisor.reject') }}</button>
                        </form>
                        <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success">{{ __('ui.show.revisor.accept') }}</button>
                        </form>
                        <form method="POST" action="{{ route('revisor.article.reset') }}">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-secondary">{{ __('ui.show.revisor.undo') }}</button>
                        </form>
                    </div>
                </article>
            </section>
        @else
            <div class="row justify-content-center text-center">
                <div class="col-md-6">
                    <h1 class="display-6 text-muted">{{ __('ui.show.revisor.noListings') }}</h1>
                    <form method="POST" action="{{ route('revisor.article.reset') }}">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-secondary mt-3">{{ __('ui.show.revisor.undo') }}</button>
                    </form>
                    <a href="{{ route('homepage') }}"
                        class="btn btn-success mt-3">{{ __('ui.show.revisor.homePage') }}</a>
                </div>
            </div>
        @endif
    </main>
</x-layout>
