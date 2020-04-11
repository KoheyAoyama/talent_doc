@php
    $talent_array = get_the_category();
        foreach ($talent_array as $talent) {
            $talent_id = $talent->cat_ID;
            $profile_img = get_category_img( $talent_id );
    }
@endphp

@extends('layout')

@section('content')
    @if (have_posts())
        @while (have_posts())
            {{ the_post() }}
            <article class="p-single">
                <h3 class="p-single__title">{{ the_title() }}</h3>
                <div class="p-single__body">
                    {{ the_content() }}
                </div>
            </article>
        @endwhile
    @endif

    <a class="p-article__innerProfile" href="{{ get_category_link( $talent_id ) }}">
        @include('profileMedium')
    </a>
@endsection