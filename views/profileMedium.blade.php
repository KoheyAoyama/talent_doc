@php
    // Get talent info.
    $talent_array = get_the_category();
    foreach ($talent_array as $talent) {
        $talent_id = $talent->cat_ID;
        $talent_name = $talent->name;
        $profile_img = get_category_img( $talent_id );
        $office = get_field('talent_office', 'category_'. $talent_id);
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

<div class="p-profileMedium">
    <div>
        <p><img class="p-profileMedium__image" src="{{ $profile_img }}" alt=""></p>
    </div>
    <div>
        <p class="p-profileMedium__name">{{ $talent_name }}</p>
        @if ( $office )
            <p class="p-profileMedium__office">{{ $office }}</p>
        @endif
        <div class="p-profileMedium__starRating">
            <div class="p-profileMedium__starRating--front" style="{{ $rating_setting }}">★★★★★</div>
            <div class="p-profileMedium__starRating--back">★★★★★</div>
        </div>
    </div>
</div>