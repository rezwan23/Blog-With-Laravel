<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>
@extends('admin.layouts.app')
@section('title', 'AdminPanel - New Menu Item')
@section('name', $user->name)
@section('content')
    <div class="content">
        <div class="content-header">
            <h1>Add New Menu Item</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">New Menu Item</h3>
                    </div>
                @include('admin.layouts.messages')
                <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('menu.store')}}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Menu Item Name</label>
                                <input type="text" class="form-control" id="name" name= "name" placeholder="Menu Item Name">
                            </div>
                            <div class="form-group">
                                <label for="name">Menu Item Link</label>
                                <input type="text" class="form-control" id="link" name= "link" placeholder="Menu Item Link">
                            </div>
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="number" class="form-control" id="position" name="position"
                                       placeholder="Select Position" step="1" />
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