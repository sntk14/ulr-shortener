@extends('layouts.base')

@section('content')
    @if(count($links) > 0)
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Full URL</th>
            <th scope="col">Short URL</th>
            <th scope="col">Create time</th>
            <th scope="col">Delete time</th>
            <th scope="col">Visits</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($links as $link)
            <tr>
                <th><a href="{{ $link->full_url }}">{{ substr($link->full_url,0,50) }}</a></th>
                <th><a href="{{ route('redirect',$link->short_url) }}">{{ $link->short_url }}</a></th>
                <th>{{ $link->created_at }}</th>
                <th>{{ $link->updated_at }}</th>
                <th>{{ $link->visits }}</th>
                <form action="{{ route('links.delete',$link->id) }}"  method="post">
                    @method('DELETE')
                    @csrf
                    <th><input type="image" src="{{ asset('SVGs/trash.svg') }}" alt="delete"></th>
                </form>
            </tr>
        @endforeach
        </tbody>
    </table>
        {{ $links->links() }}
    @else
        <span>Ссылок нет!</span>
    @endif
@endsection
