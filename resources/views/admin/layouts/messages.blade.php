@if(session()->has('success-message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        {{\Illuminate\Support\Facades\Session::get('success-message')}}.
    </div>
@endif
@if($errors->all()>0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Error!</h4>
            {{$error}}.
        </div>
    @endforeach
@endif

