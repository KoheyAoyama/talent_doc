<?php
  $page = get_page_by_path( 'talent-list' );
  $permalink = get_permalink( $page->ID );
  $page_name = get_the_title( $page->ID );
?>

<header>
  <nav>
    <a href="/">{{ bloginfo('name') }}</a>
    <a href="{{ $permalink }}">{{ $page_name }}</a>
  </nav>
</header>