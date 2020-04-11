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