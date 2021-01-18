@extends('layouts.base')

@section('content')
    @if(count($links) > 0)
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">Full URL</th>
            <th scope="col">Short URL</th>
            <th scope="col">Create time</th>
            <th scope="col">Delete time</th>
        </tr>
        </thead>
        <tbody>
        @foreach($links as $link)
            <tr>
                <th>{{ $link->full_url }}</th>
                <th>{{ $link->short_url }}</th>
                <th>{{ $link->create_at }}</th>
                <th>{{ $link->delete_at }}</th>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <span>Ссылок нет!</span>
    @endif
@endsection
