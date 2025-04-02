<x-layout>
    <main class="container">
        <section class="row height-custom justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-4">{{ __('ui.articleDetail') }} {{ $article->title }}</h1>
            </div>
        </section>
        <section class="row height-custom justify-content-center align-items-center py-5">
            <div class="col-12 col-md-6 mb-3">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/400" class="d-block w100 rounded shadow" alt="">
                    </div>
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/400" class="d-block w100 rounded shadow" alt="">
                    </div>
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/400" class="d-block w100 rounded shadow" alt="">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visuality-hidden">Precedente</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visuality-hidden">Prossimo</span>
                </button>
            </div>
        </section>
        <div class="col-12 col-md-6 mb-3 height-custom text-center">
            <h2 class="display-5"><span class="fw-bold">{{ __('ui.title') }}: </span>{{ $article->title }}</h2>
            <div class="d-flex flex-column justify-content-center h-75">
                <h4 class="fw-bold">{{ __('ui.price') }}: {{ $article->price }}</h4>
                <h5>{{ __('ui.description') }}:</h5>
                <p>{{ $article->description }}</p>
            </div>
        </div>
    </main>
</x-layout>
