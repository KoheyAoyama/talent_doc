@php
    $args = array(
        'type'                     => 'post',
        'child_of'                 => '',
        'parent'                   => '0',
        'orderby'                  => 'name',
        'order'                    => 'ASC',
        'hide_empty'               => 0,
        'hierarchical'             => 1,
        'exclude'                  => '',
        'include'                  => '',
        'number'                   => '',
        'taxonomy'                 => 'category',
        'pad_counts'               => false 
    );
    $talent_list = get_categories( $args );
@endphp

@extends('layout')

@section('content')
    <h1>{{ the_title() }}</h1>

    @foreach ($talent_list as $talent)
        @php
            $talent_id = $talent->cat_ID;
            $talent_name = $talent->name;
            $biography = $talent->description;
            $members = get_term_children( $talent_id, 'category' );
            $profile_img = get_category_img( $talent_id );
            $office = get_field('talent_office', 'category_'. $talent_id);
            
            // Desicion for profile image exists.
            if ( $profile_img ) {
            } else {
                $placeholder_img_data = get_page_by_path('placeholder_img_profile', 'OBJECT', 'post');
                $placeholder_id = $placeholder_img_data->ID;
                $profile_img = wp_get_attachment_image_src( $placeholder_id, 'full')[0];
            }
            // Desicion for office value exists.
            if ( $office ) {
            } else {
                $office = '未設定';
            }
            // Desicion for date of debut value exists.
            if ( $date_of_debut ) {
            } else {
                $date_of_debut = '不明';
            }
            // Desicion for talent raging.
            if ( get_field('rating_latest') ) {
                $rating_latest = get_field('rating_latest');
            } else {
                $rating_latest = '未評価';
            }
        @endphp
        
        <section>
            <h2>{{ $talent_name }}</h2>
            <img src="{{ $profile_img }}" alt="{{ $talent_name . "のプロフィール写真" }}">

            <dl>
                @if ( $biography )
                    <dt>プロフィール</dt><dd>{{ $biography }}</dd>
                @else
                @endif
                <dt>最新の評価：</dt>
                <dd>{{ $rating_latest }}</dd>
                <dt>所属事務所：</dt>
                <dd>{{ $office }}</dd>
            </dl>
        </section>
    @endforeach
@endsection