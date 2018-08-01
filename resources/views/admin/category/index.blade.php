
<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>
@extends('admin.layouts.app')
@section('title', 'AdminPanel - Categories')
@section('name', $user->name)
@section('head')
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('footer')
    <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function () {
            $('#example2').DataTable()
        });
    </script>
@endsection
@section('content')
    @include('admin.layouts.messages')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Categories</h3>
                        <a href="{{route('categories.create')}}" class="btn btn-primary">Add New</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Serial No.</th>
                                <th>Category Name</th>
                                <th>Category Slug</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>
                                    <a href="{{route('categories.edit', $category->slug)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <form action="{{route('categories.destroy', $category->slug)}}" method="post" id="deleteform"
                                        onsubmit="return confirm('Are you sure you you want to delete {{$category->name}}??')"
                                    >
                                        {{method_field('DELETE')}}
                                        @csrf
                                        <input type="hidden" value="{{$category->id}}" name="id">
                                        <button id="delbtn" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Serial No.</th>
                                <th>Category Name</th>
                                <th>Category Slug</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection

