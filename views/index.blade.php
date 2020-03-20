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
                        $cat_id = $category->cat_ID; // カテゴリのIDを取得
                        $post_id = 'category_'. $cat_id; // カテゴリIDを付けて、category_1 の様な形にする 
                        $cat_imgid = get_field('cat_img', $post_id); // cat_imgはフィールド名を入力 

                        $cat_img = wp_get_attachment_image_src($cat_imgid, 'full')[0];
                        
                        echo '<img src="'. $cat_img .'">'; 
                        }
                    @endphp
                    <h3>{{ the_title() }}</h3>
                    <div>{{ the_content() }}</div>
                </article>
            @endwhile
        @endif
        @include('button',['url' => 'https://www.google.com/', 'label' => '恥の多い生涯を送って来ました。', 'btn_style' => 'btn_primary'])
    </div>
@endsection