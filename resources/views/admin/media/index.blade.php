@extends('admin.layouts.app')
@section('name' , \Illuminate\Support\Facades\Auth::user()->name)
@section('title', 'AdminPanel - Media')
@section('content')
    <section class="content">
        @include('admin.layouts.messages')
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">All Media</h3>
                        <a href="{{route('media.create')}}" class="btn btn-primary">Add New Media</a>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            @foreach($media as $singleMedia)
                                <div class="col-md-2">
                                    <div class="single_img index">
                                        <a href="{{route('media.show', $singleMedia->id)}}">
                                            <span class="tooltiptext">{{$singleMedia->title}}</span>
                                            <img class="img-responsive" src="{{asset('/images/'.$singleMedia->media)}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('head')
    <style>
        .index{
            position: relative;
        }
        .index span.tooltiptext{
            position: absolute;
            top: 15%;
            left: 5%;
            padding: 8px;
            border-radius: 4px;
            color: #fff;
            background-color: #000;
            visibility: hidden;
        }
        .index:hover span.tooltiptext{
            visibility: visible;
        }
    </style>
    @endsection