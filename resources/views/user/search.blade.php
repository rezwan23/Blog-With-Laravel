@extends('user.layouts.app')
@section('title', 'Search - '.$string)

@section('content')
    <div class="col-lg-8 content-wrapper">
        <div data-sticky_column>
            <div class="posts-box2">
                <div class="posts-box2__top">
                    <h3><span>Search Results - {{$string}}</span></h3>
                </div>
                <div class="posts-list-fluid-first">
                    @if($posts->count()==0)


                        <div class="alert alert-warning">

                            <a href="#" class="close" data-dismiss="alert">&times;</a>

                            <strong>Sorry!</strong> No post found.

                        </div>


                    @endif
                    @foreach($posts as $post)
                        @if($loop->index == 0)
                            <article class="post-item">
                                <div class="post-item__inner">
                                    <figure>
                                        <a href="{{route('singlePost', $post->slug)}}"><img src="{{$post->featured_image}}" class="ft_img_first" alt="{{$post->img_alt_text}}"></a>
                                    </figure>
                                    <div class="post-content">
                                        <div class="post-meta">
                                            <time datetime="2018-02-14 20:00">{{\Carbon\Carbon::parse($post->created_at)->subHours(6)->format('M. d, Y - g:i A')}} MDT </time>
                                        </div>
                                        <h4><a href="{{route('singlePost', $post->slug)}}">{!! str_limit(strip_tags($post->title), 60, '...') !!}</a></h4>
                                        <p class="post-excerpt">
                                            {!! str_limit(strip_tags($post->body), 150, '...') !!}
                                        </p>
                                    </div>
                                </div>
                            </article>
                        @else
                            <article class="post-item">
                                <div class="post-item__inner">
                                    <div class="post-item__top">
                                        <div class="post-meta">
                                            <time datetime="2018-02-14 20:00">{{\Carbon\Carbon::parse($post->created_at)->subHours(6)->format('M. d, Y - g:i A')}} MDT  </time>
                                        </div>
                                        <h5><a href="{{route('singlePost', $post->slug)}}">{!! str_limit(strip_tags($post->title), 60, '...') !!}</a></h5>
                                        <div class="post-item__bottom">
                                            <figure>
                                                <a href="{{route('singlePost', $post->slug)}}"><img src="{{$post->featured_image}}" class="ft_img" alt="{{$post->img_alt_text}}"></a>
                                            </figure>
                                            <p class="post-excerpt">
                                                {!! str_limit(strip_tags($post->body), 50, '...') !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endif


                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection