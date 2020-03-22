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
                        $categories = get_the_category(); // Get the category information of curent post as array.

                        foreach ($categories as $category) {
                        $cat_id = $category->cat_ID; // Get cateory ID from category info array.
                        $post_id = 'category_'. $cat_id; // Format post_id value to "Category_* (*->category id)" by combine cat_id value with prefix "Category_".
                        $cat_imgid = get_field('cat_img', $post_id); // Get saved category image post meta id from custom field table.

                        $cat_img = wp_get_attachment_image_src($cat_imgid, 'full')[0]; // Get saved image url with post meta id.
                        
                        echo '<img src="'. $cat_img .'">'; // Put category image url into img tag.
                        }
                    @endphp
                    <h3>{{ the_title() }}</h3>
                    <div>{{ the_excerpt() }}</div>
                </article>
            @endwhile
        @endif
        @include('button',['url' => 'https://www.google.com/', 'label' => '恥の多い生涯を送って来ました。', 'btn_style' => 'btn_primary'])
    </div>
@endsection