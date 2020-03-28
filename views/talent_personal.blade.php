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
    <section>
        <img src="{{ $profile_img }}" alt="{{ $talent_name . "のプロフィール写真" }}">
        <h1>{{ $talent_name }}</h1>
        <a href="{{ $group_link }}.">{{ $group_name }}</a>
        <div>{{ $rating_latest }}</div>
        <div>
            @if ( $biography )
                <p>{{ $biography }}</p>
            @endif
            @if ( $office )
                <p>{{ $office }}</p>
            @endif
        </div>
    </section>

    <section>
        <h2>{{ $talent_name }}の投稿一覧</h2>

        @if (have_posts())
            @while (have_posts())
                {{ the_post() }}
                <article>
                    <h3>{{ the_title() }}</h3>
                    <div>{{ the_excerpt() }}</div> 
                </article>
            @endwhile
        @else
            <p>投稿はありません</p>
        @endif
    </section>
@endsection