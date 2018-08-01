@extends('admin.layouts.app')
@section('title', 'Media - '.$media->title)
@section('name', Auth::user()->name)
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{$media -> title}}</h3>
                    </div>
                    <div class="box-body">
                        <img src="{{asset('/images/'.$media->media)}}" class="img-responsive" alt="">
                    </div>
                    <div class="box-footer">
                            <input class="form-control" type="text" value="{{$link}}" id="myInput">
                            <br>
                            <button class="btn btn-primary" onclick="myFunction()">Copy Link</button>

                        <form action="{{route('media.destroy', $media->id)}}" method="post" class="pull-right" onsubmit="return confirm('Are you sure? You want to delete this image??');">
                            @csrf
                            {{method_field('DELETE')}}
                            <button href="" type="submit" class="btn btn-danger pull-right">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')
    <script>
        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            document.execCommand("copy");
            alert("Copied the text: " + copyText.value);
        }
    </script>
@endsection