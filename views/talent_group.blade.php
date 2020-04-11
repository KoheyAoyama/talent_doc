@php
    // Get talent information.
    $talent = get_queried_object();
        $talent_id = $talent->cat_ID;
        $talent_name = $talent->name;
        $biography = $talent->description;
    $members = get_term_children( $talent_id, 'category' );
    $profile_img = get_category_img( $talent_id );
    $office = get_field('talent_office', 'category_'. $talent_id);
    $date_of_debut = get_field('date_of_debut', 'category_'. $talent_id);
    $award_history = get_field('award_history', 'category_'. $talent_id);

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
        @php
            if ( $members ) {
                echo '<ul>';
                foreach ( $members as $termchildren ) {
                    $term = get_term_by( 'id', $termchildren, 'category' );
                    echo '<li><a href="' . get_term_link( $termchildren, 'category' ) . '">' . $term->name . '</a></li>';
                }
                echo '</ul>';
            }
        @endphp
        <div>{{ $rating_latest }}</div>
        <div>
            @if ( $biography )
                <p>{{ $biography }}</p>
            @endif
            @if ( $date_of_debut )
                <p>{{ $date_of_debut }} 結成</p>
            @endif
            @if ( $office )
                <p>{{ $office }}</p>
            @endif
            @if ( $award_history )
                <div>
                    <p>受賞履歴</p>
                    @php // Must put PHP code here because it won't show correct HTML if it is via Blade engine.
                        echo nl2br($award_history);
                    @endphp
                </div>
            @endif
        </div>
    </section>
    <section>
        @include('feed',['feedTitle'=>'投稿一覧'])
    </section>
@endsection