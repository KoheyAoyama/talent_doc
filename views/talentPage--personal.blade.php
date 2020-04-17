@php
    // Get talent information.
    $talent = get_queried_object();
        $talent_id = $talent->cat_ID;
        $talent_name = $talent->name;
        $biography = $talent->description;
        $parent_id = $talent->parent;
    $group_name = get_the_category_by_ID( $parent_id);
    $group_link = get_category_link( $parent_id );
    $profile_img = get_category_img( $talent_id );
    $office = get_field('talent_office', 'category_'. $parent_id);
    $date_of_debut = get_field('date_of_debut', 'category_'. $parent_id);

    // Desicion for profile image exists.
    if ( $profile_img ) {
    } else {
        $placeholder_img_data = get_page_by_path('placeholder_img_profile', 'OBJECT', 'post');
        $placeholder_id = $placeholder_img_data->ID;
        $profile_img = wp_get_attachment_image_src( $placeholder_id, 'full')[0];
    }
    
    // Desicion for talent raging.
    if ( get_field('rating_latest') ) {
        $rating_latest = get_field('rating_latest');
    } else {
        $rating_latest = '未評価';
    }
@endphp

@extends('layout')

@section('content')
    <section class="p-talentProfile">
        <div class="p-talentBasics">
            <img class="p-talentBasics__image" src="{{ $profile_img }}" alt="{{ $talent_name . "のプロフィール写真" }}">
            <h1 class="p-talentBasics__name">{{ $talent_name }}</h1>
            <div class="p-talentBasics__rating p-talentRating">
                <p class="p-talentRating__title">最新の評価</p>
                <div class="p-talentRating__starRating">
                    <div class="p-talentRating__starRating--front" style="{{ $rating_setting }}">★★★★★</div>
                    <div class="p-talentRating__starRating--back">★★★★★</div>
                </div>
            </div>
            @if ( $biography )
                <p class="p-talentBasics__biography">{{ $biography }}</p>
            @endif
        </div>
        <div class="p-talentProfile__details p-talentDetails">
            <p class="p-talentDetails__title">詳細情報</p>
            @if ( $office )
                <p class="p-talentDetails__office">{{ $office }} 所属</p>
            @endif
        </div>
    </section>

    <section>
        @include('feed',['feedTitle'=>'投稿一覧'])
    </section>
@endsection