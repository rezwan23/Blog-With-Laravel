
<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>
@extends('admin.layouts.app')
@section('title', 'AdminPanel - Pages')
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
                        <h3 class="box-title">All Pages</h3>
                        <a href="{{route('page.create')}}" class="btn btn-primary">Add New Page</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Serial No.</th>
                                <th>Page title</th>
                                <th>Page Slug</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $item)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->slug}}</td>
                                    <td>{!! str_limit(strip_tags($item->body), 60, '...') !!}</td>
                                    <td>
                                        <a href="{{route('page.edit', $item->slug)}}" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <form action="{{route('page.destroy', $item->slug)}}" method="post" id="deleteform"
                                              onsubmit="return confirm('Are you sure you you want to delete {{$item->title}}??')"
                                        >
                                            {{method_field('DELETE')}}
                                            @csrf
                                            <button id="delbtn" type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Serial No.</th>
                                <th>Page title</th>
                                <th>Page Slug</th>
                                <th>Content</th>
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

