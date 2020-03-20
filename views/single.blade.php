@extends('layout')

@section('content')
    <div class="container">
        @if (have_posts())
            @while (have_posts())
                <?php the_post(); ?>
                <article>
                    <h3>{{ the_title() }}</h3>
                    <div class="content">
                        {{ the_content() }}
                    </div>
                    <p>note</p>
                </article>
            @endwhile
        @endif
    </div>
@endsection