<article class="p-article">
    <a href="{{ the_permalink() }}">
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

        <div class="p-article-content">
            <h3 class="p-article-content__title">{{ the_title() }}</h3>        
            <div class="p-article-content__body">{{ the_excerpt() }}</div>
        </div>

        <div class="p-article-profile">
            <div>
                <p><img class="p-article-profile__image" src="{{ $profile_img }}" alt=""></p>
            </div>
            <div>
                <p class="p-article-profile__name">{{ $talent_name }}</p>
                <div class="star-rating">
                    <div class="star-rating-front" style="{{ $rating_setting }}">★★★★★</div>
                    <div class="star-rating-back">★★★★★</div>
                </div>
                <div class="p-article-profile__rating">{{ $rating_latest }}</div>
            </div>
        </div>
    </a>
</article>