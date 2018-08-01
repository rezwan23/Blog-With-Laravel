@extends('user.layouts.app')
@section('title', $post->title)
@section('post-meta')
{!! $post->post_meta !!}
@endsection
@section('content')
    <div class="col-lg-8 content-wrapper">

        <div class="m-post-content m-post-content--van">
            <div class="post-top">
                <h1 class="post-title">{{$post->title}}.</h1>
                <div class="post-meta">
                    <div class="item">
                        <time datetime="2018-02-14 20:00"><i class="fa fa-clock-o"></i>{{\Carbon\Carbon::parse($post->created_at)->subHours(6)->format('M. d, Y - g:i A')}} MDT</time>
                    </div>
                </div>
            </div>

            <div class="entry-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat sodales arcu et hendrerit. Nullam semper ac mauris non sagittis. Ut efficitur dui ac tortor volutpat semper. Donec mauris enim, iaculis eu congue facilisis, aliquam consequat orci. Curabitur facilisis nulla in lorem consequat.</p>
                <p>
                    <img class="aligncenter u-radius-3" src="{{$post->featured_image}}" alt="{{$post->img_alt_text}}">
                    <small>{{$post->img_alt_text}}</small>

                </p>
                {!! $post->body !!}
            </div>

            {{--<div class="post-share u-margin-t-40">--}}
                {{--<h6>Share :</h6>--}}
                {{--<div class="share-links social--color">--}}
                    {{--<a class="social__facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i><span>Facebook</span></a>--}}
                    {{--<a class="social__google-plus" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i><span>Google Plus</span></a>--}}
                    {{--<a class="social__twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i><span>Twitter</span></a>--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="post-tags u-margin-t-40">
                <h6>Tags :</h6>
                <div class="tags-wrap">
                    @foreach($post->categories as $tag)
                    <a class="cat-world" href="{{route('showCategoryPosts', $tag->slug)}}"><i class="fa fa-tag" aria-hidden="true"></i>{{$tag->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @endsection