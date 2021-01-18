@extends('layouts.base')

@section('content')
    @if($link)
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
            <tr>
                <th>{{ $link->full_url }}</th>
                <th>{{ $link->short_url }}</th>
                <th>{{ $link->create_at }}</th>
                <th>{{ $link->delete_at }}</th>
            </tr>
        </tbody>
    </table>
    @else
        <span>
            Произошла ошибка получения ссылки! Попробуйте <a href="{{ route('links.index') }}">еще раз</a>
        </span>
    @endif
@endsection
