<div class="p-feed">
    <h2 class="p-feed__title">{{ $feedTitle }}</h2>
    <div class="p-feed__list">
        @if (have_posts())
            @while (have_posts())
                {{ the_post() }}
                @php
                    // Get talent info.
                    $talent_array = get_the_category();
                    foreach ($talent_array as $talent) {
                        $talent_id = $talent->cat_ID;
                        $talent_name = $talent->name;
                        $profile_img = get_category_img( $talent_id );
                    }

                    // Desicion for profile image exists.
                    if ( $profile_img ) {
                    } else {
                        $placeholder_img_data = get_page_by_path('placeholder_img_profile', 'OBJECT', 'post');
                        $placeholder_id = $placeholder_img_data->ID;
                        $profile_img = wp_get_attachment_image_src( $placeholder_id, 'full')[0];
                    }

                    // Get rating of current post
                    $rating_latest = get_field('rating_latest');
                    $rating_setting = 'width: ' . ($rating_latest * 2) . '0%';
                @endphp
                @include('module.articleItem')
            @endwhile
        @endif
    </div>
</div>