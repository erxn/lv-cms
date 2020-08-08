@extends('layouts.blog')

@section('title', 'Home')
@section('content')

<!-- Popular news category -->

<div class="col-md-8">
    <aside class="wrapper__list__article">
        <h4 class="border_section">Popular Posts</h4>

        <div class="wrapp__list__article-responsive">
            <!-- Post Article List -->

            @foreach ($posts as $post)
            <div class="card__post card__post-list card__post__transition mt-30">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card__post__transition">
                            <a href="#">
                                <img src="{{ asset('/assets/front/'.$post->featimg) }}" class="img-fluid w-100"
                                    alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="col-md-7 my-auto pl-0">
                        <div class="card__post__body">
                            <div class="card__post__content">
                                <div class="card__post__category">
                                    <i class="fa fa-tag"></i> {{ $post->category->name }}
                                </div>
                                <div class="card__post__title">
                                    <h5>
                                        <a href="/article/{{  $post->id }}">{{  $post->title }}</a>
                                    </h5>
                                    <div class="card__post__author-info mb-2">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <span class="text-primary">
                                                    <i class="fa fa-user-circle-o"></i>
                                                    {{ $post->blogAuthor->name }}
                                                </span>
                                            </li>
                                            <li class="list-inline-item">
                                                <span class="text-dark text-capitalize">
                                                    <i class="fa fa-calendar"></i>
                                                    {{ date('d F Y', strtotime($post->published_at)) }}
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="d-none d-lg-block d-xl-block mb-0">
                                        {{ Str::words($post->content, 20) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </aside>
</div>
<!-- End Popular news category -->
@endsection