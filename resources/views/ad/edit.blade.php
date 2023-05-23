<x-layout>
    <div>
        <div class="container">
            <h1 class="text-center mt-5">{{ __('Editar Anuncio') }}</h1>

            <div>
                <form action="{{ route('ads.update', $ad->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">{{ __('Título') }}:</label>
                        <input type="text" name="title" value="{{ $ad->title }}" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">{{ __('Categoría') }}:</label>
                        <select name="category" class="form-control">
                            <option value="">{{ __('Selecciona una categoría') }}:</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $ad->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">{{ __('Precio') }}:</label>
                        <input type="number" name="price" value="{{ $ad->price }}" class="form-control @error('price') is-invalid @enderror">
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="body" class="form-label">{{ __('Descripción') }}:</label>
                        <textarea name="body" cols="30" rows="15" class="form-control @error('body') is-invalid @enderror">{{ $ad->body }}</textarea>
                        @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mt-4 mb-2 d-flex justify-content-center">
                        <button type="submit" class="btn show-btn">{{ __('Actualizar') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
