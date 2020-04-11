@php
    // Get rating of this post.
    $rating_latest = get_field('rating_latest');

    // Get talent info realted this post.
    $talent = get_the_category()[0];
    $talent_id = $talent->cat_ID;
    $talent_name = $talent->name;
    $office = get_field('talent_office', 'category_'. $talent_id);
    $profile_img = get_category_img( $talent_id );

    // Desicion for profile image exists.
    if ( $profile_img ) {
    } else {
        $placeholder_img_data = get_page_by_path('placeholder_img_profile', 'OBJECT', 'post');
        $placeholder_id = $placeholder_img_data->ID;
        $profile_img = wp_get_attachment_image_src( $placeholder_id, 'full')[0];
    }
@endphp

@extends('layout')

@section('content')
    @if (have_posts())
        @while (have_posts())
            {{ the_post() }}
            <article>
                <h3>{{ the_title() }}</h3>
                <div>
                    <p>{{ $talent_name }}</p>
                    <p>{{ $rating_latest }}</p>
                </div>
                <div class="content">
                    {{ the_content() }}
                </div>
            </article>
        @endwhile
    @endif
    
    @include('profileSmall')
@endsection