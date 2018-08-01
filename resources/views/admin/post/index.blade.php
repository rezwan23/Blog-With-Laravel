
<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>
@extends('admin.layouts.app')
@section('title', 'AdminPanel - Posts')
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
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Posts</h3>
                    <a href="{{route('post.create')}}" class="btn btn-primary">Add New</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Serial No.</th>
                            <th>Post Title</th>
                            <th>Post Slug</th>
                            <th>poST Body</th>
                            <th>Categories</th>
                            <th>Featured Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->slug}}</td>
                            <td>
                                {!! str_limit(strip_tags($post->body), 30, '...') !!}
                            </td>
                            <td>
                                <ul class="cat_list">
                                @foreach($post->categories as $cat)

                                        <li>{{$cat->name}}</li>

                                @endforeach
                                </ul>
                            </td>
                            <td>
                                <div class="img-thumb">
                                    <img src="{{$post->featured_image}}" alt="">
                                </div>
                            </td>
                            <td>
                                <a href="{{route('post.edit', $post->slug)}}" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <form action="{{route('post.destroy', $post->slug)}}" method="post" id="deleteform"
                                      onsubmit="return confirm('Are you sure you you want to delete {{$post->title}}??')"
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
                            <th>Post Title</th>
                            <th>Post Slug</th>
                            <th>Post Body</th>
                            <th>Categories</th>
                            <th>Featured Image</th>
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

