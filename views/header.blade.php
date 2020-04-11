@php
  $page = get_page_by_path( 'talent-list' );
  $permalink = get_permalink( $page->ID );
  $page_name = get_the_title( $page->ID );
@endphp

<header class="l-header">
  <div class="p-header">
    <div class="p-header__wrapper">
      <div class="p-header__title">
        <a class="p-header__title-text" href="{{ home_url() }}">
          @if ( is_single() )
            <p>TalentDoc</p>
          @else
            <h1>TalentDoc</h1>
          @endif
        </a>
      </div>
      <div class="p-header__menu">
        <nav class="p-header__nav">
          <ul class="p-header__nav-list">
            <li class="p-header__nav-item">
              <a class="p-header__nav-text" href="{{ home_url() }}">最新記事一覧</a>
            </li>
            <li class="p-header__nav-item">
              <a class="p-header__nav-text" href="{{ $permalink }}">芸人一覧</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  
  
</header>