@extends('layouts.blog')

@section('title', $post->title)
@section('content')

<div class="col-md-12">
    <!-- Breadcrumb -->
    <ul class="breadcrumbs bg-light mb-4">
        <li class="breadcrumbs__item">
            <a href="/" class="breadcrumbs__url">
                <i class="fa fa-home"></i> Home</a>
        </li>
        <li class="breadcrumbs__item breadcrumbs__item--current">
            Article
        </li>
    </ul>
</div>
<div class="col-md-8">
    <!-- Article Detail -->
    <div class="wrap__article-detail">
        <div class="wrap__article-detail-title">
            <h1>
                {{ $post->title }}
            </h1>
        </div>
        <hr>
        <div class="wrap__article-detail-info">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <figure class="image-profile">
                        <img src="{{ asset('/assets/front/avatar.png') }}" alt="">
                    </figure>
                </li>
                <li class="list-inline-item">
                    <a href="#">
                        <i class="fa fa-user-circle-o"></i> {{ $post->blogAuthor->name }}
                    </a>
                </li>
                <li class="list-inline-item">
                    <span class="text-dark text-capitalize ml-1">
                        <i class="fa fa-calendar"></i> {{ date('d F Y', strtotime($post->published_at)) }}
                    </span>
                </li>
                <li class="list-inline-item">
                    <span class="text-dark text-capitalize">
                        in
                    </span>
                    <a href="#">
                        <i class="fa fa-tag"></i> {{ $post->category->name }}
                    </a>
                </li>
            </ul>
        </div>

        <div class="wrap__article-detail-image mt-4">
            <figure>
                <img src="{{ asset('/assets/front/'.$post->featimg) }}" alt="" class="img-fluid">
            </figure>
        </div>
        <div class="wrap__article-detail-content">
            <p class="has-drop-cap-fluid">
                {{ $post->content }}
            </p>
        </div>
    </div>

    <!-- Tags -->
    <div class="blog-tags">
        <ul class="list-inline">
            <li class="list-inline-item">
                <i class="fa fa-tags">
                </i>
            </li>
            <li class="list-inline-item">
                <a href="#">
                    #{{ $post->category->name }}
                </a>
            </li>
        </ul>
    </div>

    <!-- Profile author -->
    <div class="wrap__profile">
        <div class="wrap__profile-author">
            <figure>
                <img src="{{ asset('/assets/front/avatar.png') }}" alt="">
            </figure>
            <div class="wrap__profile-author-detail">
                <div class="wrap__profile-author-detail-name">author</div>
                <h4>{{ $post->name }}</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis laboriosam ad
                    beatae itaque ea non
                    placeat officia ipsum praesentium! Ullam?</p>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-social btn-social-o facebook ">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-social btn-social-o twitter ">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-social btn-social-o instagram ">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-social btn-social-o telegram ">
                            <i class="fa fa-telegram"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-social btn-social-o linkedin ">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection