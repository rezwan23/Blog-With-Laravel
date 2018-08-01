@include('user.layouts.header')

<section class="has-sidebar u-padding-tb-60 u-gray-bg">
    <div class="container">
        <div class="row" data-sticky_parent>
            @section('content')
            @show
                @if(\Illuminate\Support\Facades\Route::currentRouteName()!='home' && \Illuminate\Support\Facades\Route::currentRouteName()!='showContactForm')
                    @include('user.layouts.sidebar')
                @endif
            @if(\Illuminate\Support\Facades\Route::currentRouteName()!='home' && \Illuminate\Support\Facades\Route::currentRouteName()!='showContactForm')
        </div>
    </div>
</section>
@endif

@include('user.layouts.footer')