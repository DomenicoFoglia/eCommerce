<x-layout>
    <div class="container-fluid text-center bg-body-tertiary">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-12">
                <h1 class="display-4">TITOLO</h1>
                <div class="my-3">
                    @auth
                        <a href="{{ route('create.article') }}" class="btn btn-dark">Crea un articolo</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</x-layout>
