<x-layout>
    <main class="container">
        <section class="row py-5 justify-content-center text-center">
            <article class="col-12">
                <h1 class="display-1">Risultati della ricerca : <span class="fst-italic">{{ $query }}</span></h1>
            </article>
        </section>
        <section class="row justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <article class="col-12 col-md-3">
                    <x-card :article="$article" />
                </article>
            @empty
                <article class="col-12">
                    <h1 class="text-center">Nessun articolo corrisponde alla tua ricerca</h1>
                </article>
            @endforelse
        </section>
    </main>
    <section class="d-flex justify-content-center">
        <article>{{ $articles->links() }}</article>
    </section>
</x-layout>
