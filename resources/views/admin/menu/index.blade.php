
<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>
@extends('admin.layouts.app')
@section('title', 'AdminPanel - Main Menu')
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
                        <h3 class="box-title">Main Menu Items</h3>
                        <a href="{{route('menu.create')}}" class="btn btn-primary">Add New Menu Item</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Serial No.</th>
                                <th>Item Name</th>
                                <th>Item Link</th>
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menuitems as $item)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->link}}</td>
                                    <td>{{$item->position}}</td>
                                    <td>
                                        <a href="{{route('menu.edit', $item->id)}}" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <form action="{{route('menu.destroy', $item->id)}}" method="post" id="deleteform"
                                              onsubmit="return confirm('Are you sure you you want to delete {{$item->name}}??')"
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
                                <th>Item Name</th>
                                <th>Item Link</th>
                                <th>Position</th>
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

