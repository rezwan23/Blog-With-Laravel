@extends('user.layouts.app')
@section('name', \Illuminate\Support\Facades\Auth::user()->name)
@section('title', $page->title)
@section('content')
    <div class="col-lg-8 content-wrapper">

        <div class="m-post-content m-post-content--van">
            <div class="post-top">
                <h1 class="post-title">{{$page->title}}.</h1>
                <div class="post-meta">
                    <div class="item">
                        <time datetime="2018-02-14 20:00"><i class="fa fa-clock-o"></i>{{\Carbon\Carbon::parse($page->created_at)->subHours(6)->format('M. d, Y - g:i A')}} MDT</time>
                    </div>
                </div>
            </div>

            <div class="entry-content">
                {!! $page->body !!}
            </div>
        </div>
    </div>
@endsection