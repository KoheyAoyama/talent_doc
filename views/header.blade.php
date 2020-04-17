@php
  $page = get_page_by_path( 'talent-list' );
  $permalink = get_permalink( $page->ID );
  $page_name = get_the_title( $page->ID );
@endphp

<header class="l-header">
  <div class="p-header">
    <div class="p-header__wrapper">
      <div class="p-page-logo">
        <a class="p-page-logo__text" href="{{ home_url() }}">
          @if ( is_single() )
            <p>TalentDoc</p>
          @else
            <h1>TalentDoc</h1>
          @endif
        </a>
      </div>
        <nav class="p-global-menu">
          <ul class="p-global-menu__nav">
            <li class="p-global-menu__nav__item">
              <a class="p-global-menu__nav__text" href="{{ home_url() }}">最新記事一覧</a>
            </li>
            <li class="p-global-menu__nav__item">
              <a class="p-global-menu__nav__text" href="{{ $permalink }}">芸人一覧</a>
            </li>
          </ul>
        </nav>
    </div>
  </div>
</header>