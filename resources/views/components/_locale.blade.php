<form action="{{ route('setLocale', ['lang' => $lang]) }}" class="d-inline" method="POST">
    @csrf
    <button type="submit" class="btn border-0 bg-transparent p-0">
        <img src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg') }}" width="32" height="32"
            alt="Bandiera {{ $lang }}">
    </button>
</form>
