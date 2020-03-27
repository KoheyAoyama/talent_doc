@php
    // Get talent information.
    $talent = get_queried_object();
        $talent_id = $talent->cat_ID;
        $talent_name = $talent->name;
        $biography = $talent->description;
    $members = get_term_children( $talent_id, 'category' );
    $profile_img = get_category_img( $talent_id );
    $office = get_field('talent_office', 'category_'. $talent_id);
    $date_of_debut = get_field('talent_date_of_debut', 'category_'. $talent_id);
    $award_history = get_field('award_history', 'category_'. $talent_id);

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
        $rating_latest = "未評価";
    }
@endphp

@extends('layout')

@section('content')
    <h1>{{ $talent_name }}</h1>

    <img src="{{ $profile_img }}" alt="{{ $talent_name . "のプロフィール写真" }}">
    <p>{{ $biography }}</p>

    <div>
        @php
            foreach ( $members as $termchildren ) {
                $term = get_term_by( 'id', $termchildren, 'category' );
                echo '<li><a href="' . get_term_link( $termchildren, 'category' ) . '">' . $term->name . '</a></li>';
            }
        @endphp
    </div>

    <div>
        <p>最新の評価：{{ $rating_latest }}</p>
        <p>所属事務所：{{ $office }}</p>
        <p>デビュー：{{ $date_of_debut }}</p>
        <div>
            <p>受賞履歴</p>
            <p>
                @php
                    echo nl2br($award_history);
                @endphp
            </p>
        </div>
    </div>

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
        @endif
    </section>
@endsection