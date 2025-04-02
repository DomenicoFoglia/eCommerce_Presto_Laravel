<x-layout>
    <main class="container">
        <section class="row justify-content-center align-items-center text-center py-5">
            <div class="col-12 pt-5">
                <h1 class="display-2">Articoli della categoria <span class="fst-italic fw-bold">{{ $category->name }}
                    </span></h1>
            </div>
        </section>
        <section class="row justify-content-center align-items-center py-5">
            @forelse($articles as $article)
                <div class="col-12 col-md-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3>
                        Non sono presenti articoli per questa categoria
                    </h3>
                    @auth
                        <a class="btn btn-dark my-5" href="{{ route('article.create') }}">Pubblica un articolo</a>
                    @endauth
                </div>
            @endforelse
        </section>
    </main>
</x-layout>
