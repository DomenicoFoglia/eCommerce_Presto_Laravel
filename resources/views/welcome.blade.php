<x-layout>
    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow rounded w-50">{{ session('errorMessage') }}</div>
    @endif
    @if (session()->has('message'))
        <div class="alert alert-success text-center shadow rounded w-50">{{ session('message') }}
        </div>
    @endif
    <main class="container-fluid text-center">
        <section class="row vh-100 justify-content-center align-items-center">
            <div class="col-12">
                <h1 class="display-1">Presto.it</h1>
                <div class="my-3">
                    @auth
                        <a class="btn btn-dark" href="{{ route('article.create') }}">{{ __('ui.welcome.publishListing') }}</a>
                    @endauth
                </div>
            </div>
        </section>
        <section class="row height-custom justify-content-center align-items-center py-5">
            @forelse($articles as $article)
                <div class="col-12 col-md-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h3 class="text-center">{{ __('ui.welcome.noListings') }}</h3>
                </div>
            @endforelse
        </section>
    </main>
    <div class="col-md-5 offset-md-1 mb-3 text-center">
        <h5>{{ __('ui.welcome.wantRevisor') }}</h5>
        <p>{{ __('ui.welcome.clickRevisor') }}</p>
        <a href="{{ route('become.revisor') }}" class="btn btn-success">{{ __('ui.welcome.becomeRevisor') }}</a>
    </div>
</x-layout>
