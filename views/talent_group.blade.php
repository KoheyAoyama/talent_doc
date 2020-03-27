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
        $rating_latest = '評価がありません';
    }
@endphp

@extends('layout')

@section('content')

    <section>
        <h1>{{ $talent_name }}</h1>
        <img src="{{ $profile_img }}" alt="{{ $talent_name . "のプロフィール写真" }}">

        <dl>
            @php
                if ( $biography ) {
                    echo '<dt>プロフィール</dt><dd>' . $biography . '</dd>';
                } else { }
            @endphp
            @php
                if ( $members ) {
                    echo '<dt>メンバー</dt><dd><ul>';
                    foreach ( $members as $termchildren ) {
                        $term = get_term_by( 'id', $termchildren, 'category' );
                        echo '<li><a href="' . get_term_link( $termchildren, 'category' ) . '">' . $term->name . '</a></li>';
                    }
                    echo '</ul></dd>';
                }
            @endphp
            <dt>最新の評価：</dt>
            <dd>{{ $rating_latest }}</dd>
            <dt>所属事務所：</dt>
            <dd>{{ $office }}</dd>
            <dt>デビュー：</dt>
            <dd>{{ $date_of_debut }}</dd>
            <dt>受賞履歴</dt>
            <dd>
                @php // Must put PHP code here because it won't show correct HTML if it is via Blade engine.
                    if ( nl2br($award_history) ) {
                        echo nl2br($award_history);
                    } else {
                        echo 'なし';
                    }
                @endphp
            </dd>
        </dl>
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