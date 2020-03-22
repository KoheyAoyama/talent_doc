{{-- Start Getting the category informatoin --}}
@php
    $category = get_queried_object(); // Get the current page's infromation.
        $category_id = $category->cat_ID;
        $category_img = get_category_img( $category_id );
        $category_name = $category->name;
        $category_description = $category->description;   
@endphp
{{-- End Getting the category informatoin --}}

@extends('layout')

@section('content')
    <h1>{{ $category_name }}</h1>

    <img src="{{ $category_img }}" alt="{{ $category_name . "のプロフィール写真" }}">
    <p>{{ $category_description }}</p>

    <div>
        <p>評価：{{ get_field('rating_latest') }}</p>
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