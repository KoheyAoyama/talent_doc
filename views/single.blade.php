@php
    //if( !is_user_logged_in() && !is_bot() ) { set_page_views( get_the_ID() ); }
    set_page_views( get_the_ID() );
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

@extends('layout')

@section('content')
    @if (have_posts())
        @while (have_posts())
            {{ the_post() }}
            <article class="p-single">
                <h3 class="p-single__title">{{ the_title() }}</h3>
                <div class="p-single__body">
                    {{ the_content() }}
                </div>
            </article>
        @endwhile
    @endif

    <a href="{{ get_category_link( $talent_id ) }}">
        @include('module.profileMedium')
    </a>
@endsection