@extends('layout')

@section('content')
    <div class="p-homeFeed">
        <h2 class="p-homeFeed__title">最新の投稿</h2>
        <div class="p-homeFeed__list">
            @if (have_posts())
                @while (have_posts())
                    {{ the_post() }}
                    @include('articleItem')
                @endwhile
            @endif
        </div>
    </div>
@endsection