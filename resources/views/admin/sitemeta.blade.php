<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>
@extends('admin.layouts.app')
@section('name', $user->name)
@section('title', 'AdminPanel - Site Meta')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                @include('admin.layouts.messages')
                <form action="{{route('sitemeta.update')}}" method="post">
                    @csrf
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="sitename">Site Name</label>
                            <input type="text" name="sitename" class="form-control" value="{{$meta ? $meta->sitename : ''}}" placeholder="Enter Site Name">
                        </div>
                        <div class="form-group">
                            <label for="favicon">Favicon</label>
                            <input type="text" name="favicon" class="form-control" value="{{$meta ? $meta->favicon : ''}}" placeholder="Enter Site Favicon Url">
                            <a target="_blank" class="btn btn-primary" href="{{route('media.index')}}">Open Media</a>
                        </div>
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="text" name="logo" class="form-control" value="{{$meta ? $meta->logo : ''}}" placeholder="Enter Site Logo Url">
                            <a target="_blank" class="btn btn-primary" href="{{route('media.index')}}">Open Media</a>
                        </div>
                        <div class="form-group">
                            <label for="footertext">Site Footer Text</label>
                            <textarea type="text" name="footertext" class="form-control">{{$meta ? $meta->footertext : ''}}
                            </textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection