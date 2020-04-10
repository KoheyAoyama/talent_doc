@extends('layout')

@section('content')
    <div class="p-feed">
        <h2 class="p-feed__title">最新の投稿</h2>
            @if (have_posts())
                @while (have_posts())
                    {{ the_post() }}
                    @include('article_card')
                @endwhile
            @endif
    </div>
@endsection