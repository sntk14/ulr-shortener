@extends('layouts.base')

@section('content')
    <div class="title m-b-md">
        Short Linker
    </div>

    <div class="mb-3">
        <form method="POST" action={{ route('links.create') }}>
            @csrf
            <input type="text" class="form-control"
                   id="full_url" name="full_url"
                   placeholder="Link" maxlength="256">
            <input type="submit" class="btn btn-dark" value="Generate">
        </form>
    </div>
@endsection
