<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-center text-center align-items-center">
            <div class="col-12">
                <h1 class="text-center display-1">Tutti gli articoli</h1>
            </div>
        </div>
        {{-- <div class="row justify-content-center align-items-center">
            @forelse($articles as $article)
                <div class="col-12 col-md-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center">
                        Non sono presenti articoli
                    </div>
                </div>
            @endforelse
        </div> --}}
        <div id="articles-list" data-per-page="10" class="row justify-content-center align-items-center py-5">

        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div>
            {{ $articles->links() }}
        </div>
    </div>

    @viteReactRefresh
    @vite('resources/js/app.jsx')
</x-layout>
