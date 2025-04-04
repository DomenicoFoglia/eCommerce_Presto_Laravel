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

        <div class="row ">
            @foreach ($article->images as $key => $image)
                <div class="col-6 col-md-4">
                    <div class="card shadow-sm">
                        <img src="{{ Storage::url($image->path) }}" class="card-img-top rounded"
                            alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article->title }}">
                    </div>
                </div>
            @endforeach
        </div>

        <section class="row justify-content-center pt-5">
            <article class="col-md-6 bg-light p-4 rounded shadow-sm">
                <div class="mb-3">
                    <h1 class="fs-3">{{ $article->title }}</h1>
                    <h3 class="fs-5 text-secondary">{{ __('ui.show.revisor.author') }}:
                        {{ $article->user->name }}</h3>
                    <h4 class="text-success">{{ $article->price }} €</h4>
                    <h5 class="fst-italic text-muted">#{{ $article->category->name }}</h5>
                    <p>{{ $article->description }}</p>
                </div>
            </article>
        </section>
        <div class="row">
            <a href="{{ route('homepage') }}" class="btn btn-success mt-3">{{ __('ui.show.revisor.homePage') }}</a>
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mt-3 me-2">
                {{ __('ui.show.revisor.back') ?? 'Torna indietro' }}
            </a>
        </div>
    </main>
</x-layout>
