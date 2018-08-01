<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>
@extends('admin.layouts.app')
@section('title', 'AdminPanel - New Category')
@section('name', $user->name)
@section('content')
    <div class="content">
        <div class="content-header">
            <h1>Add New Category</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Quick Example</h3>
                    </div>
                @include('admin.layouts.messages')
                <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('categories.store')}}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" class="form-control" id="name" name= "name" placeholder="Category Name">
                            </div>
                            <div class="form-group">
                                <label for="name">Category Slug</label>
                                <input type="text" class="form-control" id="slug" name= "slug" placeholder="Category Slug">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection