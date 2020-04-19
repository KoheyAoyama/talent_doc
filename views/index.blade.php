@extends('layout')

@section('content')
    <img src="{{ get_template_directory_uri() }}/src/img/page_hero.jpg" alt="unko">
    @include('feed',['feedTitle'=>'最新の投稿'])
@endsection