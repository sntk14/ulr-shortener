@extends('layouts.base')

@section('content')
    <div class="title m-b-md">
        Cell Link
        <img src="{{asset('img/logo.png')}}" class="logo" alt="">
        <div class="sm">
            link shortener
        </div>
    </div>

    <div class="mb-3">
        <form method="POST" class="inline" action={{ route('links.store') }}>
            @csrf
            <input type="text" class="form-control"
                   id="full_url" name="full_url"
                   placeholder="Link" maxlength="256">
            <input type="submit" class="btn btn-dark black_btn" value="Generate">
        </form>
    </div>
@endsection
