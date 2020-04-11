@php
    $talent_array = get_the_category();
        foreach ($talent_array as $talent) {
            $talent_id = $talent->cat_ID;
            $profile_img = get_category_img( $talent_id );
    }
@endphp

<article class="p-article">
    <a class="p-article-inner__content" href="{{ the_permalink() }}">
        <div class="p-article-content">
            <h3 class="p-article-content__title">{{ the_title() }}</h3>
            <div class="p-article-content__body">{{ the_excerpt() }}</div>
        </div>
    </a>
    <a class="p-article-inner__profile" href="{{ get_category_link( $talent_id ) }}">
        @include('talent-profile--small')
    </a>
</article>