@extends('admin.layouts.app')
@section('name', \Illuminate\Support\Facades\Auth::user()->name)
@section('title', 'AdminPanel - Messages')
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
                        <h3 class="box-title">Messages</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Serial No.</th>
                                <th>From</th>
                                <th>Subject</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$message->name}}</td>
                                    <td>{{$message->subject}}</td>
                                    <td>{{$message->company}}</td>
                                    <td>{{$message->email}}</td>
                                    <td>{{$message->phone}}</td>
                                    <td>
                                        {!! $message->message !!}
                                    </td>
                                    <td>
                                        <form action="{{route('message.destroy', $message->id)}}" method="post" id="deleteform"
                                              onsubmit="return confirm('Are you sure you you want to delete this message??')"
                                        >
                                            @csrf
                                            <input type="hidden" value="{{$message->id}}" name="id">
                                            <button id="delbtn" type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Serial No.</th>
                                <th>From</th>
                                <th>Subject</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
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
