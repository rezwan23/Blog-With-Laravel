<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>
@extends('admin.layouts.app')
@section('title', 'AdminPanel - New Post')
@section('name', $user->name)
@section('head')
    <link rel="stylesheet" href="{{asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{asset('/bower_components/select2/dist/css/select2.min.css')}}">
@endsection
@section('footer')
    <script src="{{asset('/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('/bower_components/ckeditor/ckeditor.js')}}"></script>
    <script>
        $(function () {
            CKEDITOR.replace('editor1', {
                startupMode : 'source',
            });
            CKEDITOR.replace('editor2', {
                startupMode : 'source',
            });
            $('.select2').select2();
        })
    </script>
@endsection
@section('content')
    <div class="content">
        <form role="form" method="post" action="{{route('post.store')}}">
        <div class="content-header">
            <h1>Add New Post</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="box box-primary">
                @include('admin.layouts.messages')
                <!-- /.box-header -->
                    <!-- form start -->
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" class="form-control" id="title" name= "title" placeholder="Post Title">
                            </div>
                            <div class="form-group">
                                <label for="name">Post Slug</label>
                                <input type="text" class="form-control" id="slug" name= "slug" placeholder="Post Slug">
                            </div>
                            <div class="form-group">
                                <label>Categories</label>
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select Categories" name="categories[]">
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="featured_image">Featured Image</label>
                            <input type="text" name="featured_image" class="form-control" placeholder="http://www.your_image_url">
                        </div>
                        <div class="form-group">
                            <label for="img_alt_text">Featured Image Alt-Text</label>
                            <input type="text" name="img_alt_text" class="form-control" placeholder="Enter featured image alt text">
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{route('media.index')}}" target="_blank" class="btn btn-primary">Open Media</a>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Post Meta
                                <small>Enter Post Meta Here...</small>
                            </h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                                        title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                                        title="Remove">
                                    <i class="fa fa-times"></i></button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                    <textarea id="editor2" name="post_meta" rows="5" cols="80">
                        Enter post meta here...
                    </textarea>
                        </div>
                        <h3 class="box-title">Custom Style
                            <small>Enter Custom CSS (if any).,.</small>
                        </h3>
                        <div class="box-body pad">
                    <textarea name="style" class="form-control">
                        Custom Style
                    </textarea>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <div class="row">
            <div class="col-sm-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Post Body
                            <small>Enter Your Post Here...</small>
                        </h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                                    title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                    <textarea id="editor1" name="body" rows="10" cols="80">
                        Enter post content here...
                    </textarea>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Add Post</button>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            </div>
        </form>
        </div>
@endsection
