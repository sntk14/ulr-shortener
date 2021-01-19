@extends('layouts.base')

@section('content')
    @if($link)
    <table class="table table-striped">
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
                <th><a href="{{ $link->full_url }}">{{ substr($link->full_url,0,50) }}</a></th>
                <th><a href="{{ route('redirect',$link->short_url) }}">{{ $link->short_url }}</a></th>
                <th>{{ $link->created_at }}</th>
                <th>{{ $link->updated_at }}</th>
            </tr>
        </tbody>
    </table>
    @else
        <span>
            Произошла ошибка получения ссылки! Попробуйте <a href="{{ route('links.index') }}">еще раз</a>
        </span>
    @endif
@endsection
