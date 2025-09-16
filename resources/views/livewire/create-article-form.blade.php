<form class="bg-body-terziary shadow p-5 my-5" wire:submit="store">
    @if (session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    <div class="mb-3">
        <label for="title" class="form-label">Titolo:</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
            wire:model.blur="title">
        @error('title')
            <p class="fst-italic text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione:</label>
        <textarea id="description" cols="30" rows="10" class="form-control" wire:model.blur="description"></textarea>
        @error('description')
            <p class="fst-italic text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="price" step="0.01" class="form-label">Prezzo:</label>
        <input type="text" class="form-control" id="price" wire:model.blur="price">
        @error('price')
            <p class="fst-italic text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <select id="category" wire:model.blur="category_id" class="form-control">
            <option label disabled>Seleziona una categoria</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category')
            <p class="fst-italic text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-dark">Crea</button>
    </div>



</form>
