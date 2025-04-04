<form class="bg-body-tertiary shadow rounded p-5 my-5" wire:submit="article_store">
    @if (session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    <div class="mb-3">
        <label for="title" class="form-label">{{ __('ui.createL.title') }}:</label>
        <input type="text" class="form-control" id="title" wire:model.blur='title'>
        @error('title')
            <p class="fst-italic text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">{{ __('ui.createL.description') }}:</label>
        <textarea id="description" cols="30" rows="10" class="form-control" wire:model.blur='description'></textarea>
        @error('description')
            <p class="fst-italic text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">{{ __('ui.createL.price') }}:</label>
        <input type="text" class="form-control" id="price" wire:model.blur='price'>
    </div>
    @error('price')
        <p class="fst-italic text-danger">{{ $message }}</p>
    @enderror
    <div class="mb-3">
        <select id="category" wire:model.blur="category" class="form-select">
            <option value="{{ null }}" selected>{{ __('ui.createL.selectCategory') }}</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category')
            <p class="fst-italic text-danger">{{ $message }}</p>
        @enderror
    </div>
    {{-- inserimento immagini --}}
    <div class="mb-3">
        <input type="file" wire:model.live="temporary_images" multiple
            class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img/">
        @error('temporary_images.*')
            <p class="fst-italic text-danger">{{ $message }}</p>
        @enderror
        @error('temporary_images')
            <p class="fst-italic text-danger">{{ $message }}</p>
        @enderror

    </div>
    @if (!empty($images))
        <div class="row">
            <div class="col-12">
                <p>Anteprima foto</p>
                <div class="row border border-4 border-success rounded shadow py-4">
                    @foreach ($images as $key => $image)
                        <div class="col d-flex flex-column align-items-center my-3">
                            <div class="img-preview mx-auto shadow rounded"
                                style="background-image: url('{{ $image->temporaryUrl() }}');"></div>
                            <button type="button" class="btn btn-danger"
                                wire:click="removeImage({{ $key }})">X</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif


    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">{{ __('ui.createL.createBtn') }}</button>
    </div>
</form>
