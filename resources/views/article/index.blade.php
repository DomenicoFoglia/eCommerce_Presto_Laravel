<x-layout>
    <main class="container-fluid">
        <section class="row height-custom justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-1">{{ __('ui.index.allArticles') }}</h1>
            </div>
        </section>
        <section class="row height-custom justify-content-center align-items-center py-5">
            @forelse($articles as $article)
                <div class="col-12 col-md-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h3 class="text-center">{{ __('ui.index.noArticles') }}</h3>
                </div>
            @endforelse
        </section>
    </main>
    <div class="d-flex justify-content-center">
        <div>
            {{ $articles->links() }}
        </div>
    </div>
</x-layout>
