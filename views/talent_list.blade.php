@php
    $args_get_talent_list = array(
        'type'                     => 'post',
        'child_of'                 => '',
        'parent'                   => '0',
        'orderby'                  => 'name',
        'order'                    => 'ASC',
        'hide_empty'               => 0,
        'hierarchical'             => 1,
        'exclude'                  => 1,
        'include'                  => '',
        'number'                   => '',
        'taxonomy'                 => 'category',
        'pad_counts'               => false 
    );
    $talent_list = get_categories( $args_get_talent_list );
@endphp

@extends('layout')

@section('content')
    <h1>{{ the_title() }}</h1>

    @foreach ($talent_list as $talent)
        @php
            $talent_id = $talent->cat_ID;
            $talent_name = $talent->name;
            $profile_img = get_category_img( $talent_id );
            $office = get_field('talent_office', 'category_'. $talent_id);

            // Get rating_latest value by getting latest post of the talent.
            $args_get_latest_post = array(
                'posts_per_page'   => 1,
                'offset'           => 0,
                'category'         => $talent_id,
                'category_name'    => '',
                'orderby'          => 'date',
                'order'            => 'DESC',
                'include'          => '',
                'exclude'          => '',
                'meta_key'         => '',
                'meta_value'       => '',
                'post_type'        => 'post',
                'post_mime_type'   => '',
                'post_parent'      => '',
                'author'	       => '',
                'post_status'      => 'publish',
                'suppress_filters' => true 
            );
            $latest_post = get_posts( $args_get_latest_post );
            $latest_post_id = $latest_post[0]->ID;
            if ( get_field('rating_latest', $latest_post_id) ) {
                $rating_latest = get_field('rating_latest', $latest_post_id);
            } else {
                $rating_latest = '未評価';
            }

            // Desicion for profile image exists.
            if ( $profile_img ) {
            } else {
                $placeholder_img_data = get_page_by_path('placeholder_img_profile', 'OBJECT', 'post');
                $placeholder_id = $placeholder_img_data->ID;
                $profile_img = wp_get_attachment_image_src( $placeholder_id, 'full')[0];
            }
        @endphp
        
        <article>
            <a href="{{ get_category_link( $talent_id ) }}">
                @include('profileMedium')
            </a>
        </article>
    @endforeach
@endsection