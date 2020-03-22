{{-- Start Getting the category informatoin --}}
@php
    $category = get_queried_object(); // Get the current page's infromation.
        $category_id = $category->cat_ID;
        $category_img = get_category_img( $category_id );
        $category_name = $category->name;
        $category_description = $category->description;
@endphp
{{-- End Getting the category informatoin --}}

{{-- Start get rating condition --}}
@php
if ( get_field('rating_latest') ) {
    $rating = get_field('rating_latest');
} else {
    $rating = "未評価";
}
@endphp
{{-- End get rating condition --}}

@extends('layout')

@section('content')
    <h1>{{ $category_name }}</h1>

    <img src="{{ $category_img }}" alt="{{ $category_name . "のプロフィール写真" }}">
    <p>{{ $category_description }}</p>

    <div>
        <p>最新の評価：{{ $rating }}</p>
        <p>所属事務所：{{ get_field('talent_office', 'category_'. $category_id) }}</p>
    </div>

    <section>
        <h2>{{ $category_name }}の投稿一覧</h2>

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