<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ bloginfo('name') }}</title>
    <link rel="stylesheet" href="{{ get_template_directory_uri() }}/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC&display=swap" rel="stylesheet">
</head>
<body>
    @include('header')
    <main>
      @yield('content')
    </main>
    @include('footer')
</body>
</html>