<div class="card mx-auto card-w shadow text-center mb-3">
    <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(800, 800) : 'https://picsum.photos/200' }}"
        class="card-img-top" alt="Immagine dell'articolo {{ $article->title }}">
    <div class="card-body">
        <h4 class="card-title">{{ $article->title }}</h4>
        <h6 class="card-subtitle text-body-secondary">
            {{ $article->price ? $article->price . ' $' : 'Prezzo non disponibile' }} </h6>
        <div class="d-flex justify-content-evenly align-items-center mt-5">
            <a href="{{ route('article.show', $article) }}" class="btn btn-primary">Dettaglio</a>
            <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                class="btn btn-outline-info">Categoria</a>
        </div>
    </div>
</div>
