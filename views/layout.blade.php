@php
  $ogp_img_data = get_page_by_path('ogp_img', 'OBJECT', 'post');
  $ogp_img_id = $ogp_img_data->ID;
  $ogp_img = wp_get_attachment_image_src( $ogp_img_id, 'full')[0];    
@endphp

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="twitter:card" content="summary_large_image"></meta>
    <meta name="twitter:title" content="{{ the_title() }}">
    <meta name="twitter:description" content="お笑い芸人について知るならTalendDoc（タレントドック）">
    <meta name="twitter:image" content="{{ $ogp_img }}">
    <title>{{ bloginfo('name') }}</title>
    <link rel="stylesheet" href="{{ get_template_directory_uri() }}/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;500;900&display=swap" rel="stylesheet">
    <script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>
</head>
<body>
  @include('header')
  <main class="l-main">
    @yield('content')
  </main>
  @include('footer')
</body>
</html>