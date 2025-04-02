<x-layout>
    <main class="container">
        <section class="row justify-content-center">
            <h1 class="text-center">{{ __('ui.publishListing') }}</h1>
        </section>
        <section class="row justify-content-center">
            <div class="col-12 col-md-4">
                <livewire:create-article-form />
            </div>
        </section>
    </main>
</x-layout>
