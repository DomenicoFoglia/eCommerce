<x-layout>
    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow rounded">
            {{ session('errorMessage') }}
        </div>
    @endif
    @if (session()->has('message'))
        <div class="alert alert-success text-center shadow rounded">
            {{ session('message') }}
        </div>
    @endif

    <div class="container-fluid text-center bg-body-tertiary">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-12">
                <h1 class="display-4">TITOLO</h1>
                <div class="my-3">
                    @auth
                        <a href="{{ route('create.article') }}" class="btn btn-dark">Crea un articolo</a>
                    @endauth
                </div>
            </div>
        </div>

        {{-- Qui React renderizzerà la lista degli articoli --}}
        <div id="articles-list" data-per-page="6" data-show-pagination="false"
            class="row justify-content-center align-items-center py-5">

        </div>
    </div>

    {{-- Import React --}}
    @viteReactRefresh
    @vite('resources/js/app.jsx')
</x-layout>
