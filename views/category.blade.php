@extends('layout')

{{-- Start Getting the category informatoin --}}
@php
    $categories = get_the_category(); // Get the category information

    foreach ($categories as $category) {
//        $category_img = wp_get_attachment_image_src(get_field('category_img', 'category_'. $category->cat_ID), 'full')[0];
        $category_img = get_category_img( $category->cat_ID );
        $category_name = $category->name;
        $category_description = $category->description;
    }
@endphp
{{-- End Getting the category informatoin --}}

@section('content')
    <h1>{{ $category_name }}</h1>
    <img src="{{ $category_img }}" alt="{{ $category_name . "のプロフィール写真" }}">
    <p>{{ $category_description }}</p>

    @if (have_posts())
        @while (have_posts())
            <?php the_post(); ?>
            <article>
                <h3>{{ the_title() }}</h3>
                <div>{{ the_excerpt() }}</div>
                <div>{{ get_field('rating_latest') }}</div>
            </article>
        @endwhile
    @endif
@endsection