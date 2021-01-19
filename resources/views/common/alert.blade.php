@error('')
    <div class="alert alert-danger" role="alert">
        {{ $message ?? '' }}
    </div>
@enderror
@if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ $message ?? '' }}
    </div>
@endif
