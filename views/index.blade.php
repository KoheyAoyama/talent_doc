@extends('layout')

@section('content')
    <div class="container">
        <?php
            $args = array(
                'hide_empty' => 0,
                'title_li' => '芸人ども',
                );
            wp_list_categories( $args );
        ?>
        <h2>最新の投稿</h2>
        @if (have_posts())
            @while (have_posts())
                <?php the_post(); ?>
                <article>
                    <h3>{{ the_title() }}</h3>
                    <div>{{ the_content() }}</div>
                </article>
            @endwhile
        @endif
        @include('button',['url' => 'https://www.google.com/', 'label' => '恥の多い生涯を送って来ました。', 'btn_style' => 'btn_primary'])
    </div>
@endsection