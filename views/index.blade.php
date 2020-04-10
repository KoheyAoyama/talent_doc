@extends('layout')

@section('content')
    <div class="container">
        <h2>最新の投稿</h2>
            @if (have_posts())
                @while (have_posts())
                    {{ the_post() }}
                    @include('article_card')
                @endwhile
            @endif
    </div>
@endsection