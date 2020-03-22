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
                    @php
                        $categories = get_the_category();

                        foreach ($categories as $category) {
                            $category_id = $category->cat_ID;
                            $category_name = $category->name;
                        }
                    @endphp

                    <h3>{{ the_title() }}</h3>
                    <div>{{ the_excerpt() }}</div>
                    <div>{{ get_field('rating_latest') }}</div>
                    <a href="{{ get_category_link( $category_id ) }}">{{ $category_name }}</a><br>
                </article>
            @endwhile
        @endif
        @include('button',['url' => 'https://www.google.com/', 'label' => '恥の多い生涯を送って来ました。', 'btn_style' => 'btn_primary'])
    </div>
@endsection