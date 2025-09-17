<x-layout>
    <div class="container">
        <div class="row justify-content-center align-items-center text-center">
            <h1 class="display-4">Dettagli dell'articolo {{ $article->title }} :</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mb-3">
                <div id="articleCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Immagine principale dell'articolo -->
                        <div class="carousel-item active">
                            <img src="{{ $article->image ?? 'https://picsum.photos/600/400?random=1' }}"
                                class="d-block w-100" alt="Immagine articolo">
                        </div>
                        <!-- Segnaposti aggiuntivi -->
                        <div class="carousel-item">
                            <img src="https://picsum.photos/600/400?random=2" class="d-block w-100" alt="Segnaposto">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/600/400?random=3" class="d-block w-100" alt="Segnaposto">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#articleCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Precedente</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#articleCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Successivo</span>
                    </button>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-3 text-center">
                <h2 class="display-5"><span class="fw-bold">Titolo: </span>{{ $article->title }}</h2>
                <div class="d-flex flex-column justify-content-center">
                    <h4 class="fw-bold">Prezzo: {{ $article->price }} $</h4>
                    <h5>Descrizione:</h5>
                    <p>{{ $article->description }}</p>
                </div>
            </div>
        </div>


    </div>
</x-layout>
