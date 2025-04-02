<x-layout>
    <main class="container">
        @if (session()->has('message'))
            <div class="row justify-content-center">
                <div class="col-5 alert alert-success text-center shadow rounded">
                    {{ session('message') }}
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger text-center my-3">
                {{ session('error') }}
            </div>
        @endif

        <section class="row">
            <div class="col-3">
                <div class="rounded shadow bg-body-secondary">
                    <h1>{{ __('ui.show.revisor.dashboard') }}</h1>
                </div>
            </div>
        </section>
        @if ($article_to_check)
            <section class="row justify-content-center pt-5">
                <div class="col-md-8">
                    <article class="row justify-content-center">
                        @for ($i = 0; $i < 6; $i++)
                            <div class="col-6 col-md-4 mb-4 text-center">
                                <img src="https://picsum.photos/300?random={{ $i }}"
                                    class="img-fluid rounded shadow" alt="immagine segnaposto">
                            </div>
                        @endfor
                    </article>
                </div>
                <article class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                    <div>
                        <h1>{{ $article_to_check->title }}</h1>
                        <h3>{{ __('ui.show.revisor.author') }}: {{ $article_to_check->user->name }}</h3>
                        <h4>{{ $article_to_check->price }} euro</h4>
                        <h4 class="fst-italic text-muted">#{{ $article_to_check->category->name }}</h4>
                        <p class="h6">{{ $article_to_check->description }}</p>
                    </div>
                    <div class="d-flex pb-4 justify-content-around">
                        <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button
                                class="btn btn-danger py-2 px-5 fw-bold">{{ __('ui.show.revisor.reject') }}</button>
                        </form>
                        <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button
                                class="btn btn-success py-2 px-5 fw-bold">{{ __('ui.show.revisor.accept') }}</button>
                        </form>
                        <form method="POST" action="{{ route('revisor.article.reset') }}">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-secondary w-100 ms-1">{{ __('ui.show.revisor.undo') }}</button>
                        </form>
                    </div>
                </article>
            </section>
        @else
            <div class="row justify-content-center align-items-center text-center">
                <div class="col-12">
                    <h1 class="fsc-italic display-4">
                        {{ __('ui.show.revisor.noListings') }}
                    </h1>
                    <form method="POST" action="{{ route('revisor.article.reset') }}">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-secondary w-100 ms-1">{{ __('ui.show.revisor.undo') }}</button>
                    </form>
                    <a href="{{ route('homepage') }}"
                        class="mt-5 btn btn-success my-5">{{ __('ui.show.revisor.homePage') }}</a>
                </div>
            </div>
        @endif
    </main>
</x-layout>
