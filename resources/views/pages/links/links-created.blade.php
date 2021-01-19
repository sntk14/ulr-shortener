@extends('layouts.base')

@section('content')
    @if($link)
                <div class="sm">Your short link:</div>
                <a href="{{ route('redirect', $link->short_url) }}">
                    {{ request()->server('HTTP_ORIGIN').'/'.$link->short_url }}
                </a>
{{--                <th><a href="{{ $link->full_url }}">{{ substr($link->full_url,0,50) }}</a></th>--}}
{{--                <th></th>--}}
{{--                <th>{{ $link->created_at }}</th>--}}
{{--                <th>{{ $link->updated_at }}</th>--}}
    @else
        <span>
            Произошла ошибка получения ссылки! Попробуйте <a href="{{ route('links.index') }}">еще раз</a>
        </span>
    @endif
@endsection
