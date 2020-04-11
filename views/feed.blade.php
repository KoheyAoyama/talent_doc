<div class="p-Feed">
    <h2 class="p-Feed__title">{{ $feedTitle }}</h2>
    <div class="p-Feed__list">
        @if (have_posts())
            @while (have_posts())
                {{ the_post() }}
                @include('articleItem')
            @endwhile
        @endif
    </div>
</div>