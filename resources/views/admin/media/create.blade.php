@extends('admin.layouts.app')
@section('title', 'AdminPanel - New Media')
@section('name' , \Illuminate\Support\Facades\Auth::user()->name)
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    @include('admin.layouts.messages')
                    <div class="box-header with-border">
                        <h3 class="box-title">New Media</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('media.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Select Media Type</label>
                                    <select class="form-control" name="media_cat">
                                        <option>Select One</option>
                                        <option value="Photo">Photo</option>
                                        <option value="Vedio">Vedio</option>
                                        <option value="Document">Document</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="media">Media Upload</label>
                                <input type="file" name="media">
                            </div>
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input class="form-control" type="text" name="title" placeholder="Enter media title">
                                </div>
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