<x-layout>
    <div class="container-fluid md-5 p-5 bg-warning">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center display-1">
                    LOGIN
                </h1>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container my-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 p-5 shadow">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" id="inputEmail"
                            aria-describedby="emailHelp" value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password: </label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
