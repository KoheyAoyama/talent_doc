<article class="p-article">
    <a class="p-article__innerContent" href="{{ the_permalink() }}">
        <div class="p-articleExcerpt">
            <h3 class="p-articleExcerpt__title">{{ the_title() }}</h3>
            <div class="p-articleExcerpt__body">{{ the_excerpt() }}</div>
        </div>
    </a>
    <a class="p-article__innerProfile" href="{{ get_category_link( $talent_id ) }}">
        @include('profileSmall')
    </a>
</article>