<article class="p-article">
    <a href="{{ the_permalink() }}">
        <div class="p-article__excerpt">
            <h3 class="p-article__excerpt__title">{{ the_title() }}</h3>
            <div class="p-article__excerpt__body">{{ the_excerpt() }}</div>
        </div>
    </a>
    <a href="{{ get_category_link( $talent_id ) }}">
        @include('module.profileSmall')
    </a>
</article>