@extends('layouts.main')

@section('container')
<style>
    body {
        overflow: hidden;
    }
</style>

<div class="d-flex justify-content-center align-items-center vh-100" style="padding-bottom: 100px;">
<div class="text-center text-white">
    <h1 style="font-size: 3rem;">Welcome to Mbot Blog</h1>
    <p>Temukan informasi menarik dan terbaru di blog kami. Kami menyediakan berbagai artikel yang informatif dan inspiratif.</p>
    @auth
        <a href="/posts" class="d-inline-block btn btn-dark font-weight-bold">Read posts</a>
    @else
        <a href="/posts" class="d-inline-block btn btn-dark font-weight-bold">Read posts</a>
        <a href="/login" class="d-inline-block btn btn-dark font-weight-bold">Login</a>
    @endauth
</div>
</div>

@endsection
