<footer class="footer">
    <div class="footer__widgets style-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-4 u-lst-margin-b-40">
                    <div class="widget single-cat">
                        <div class="widget__title">
                            <h3>Most Viewed</h3>
                        </div>

                        <ul class="posts-wrap">
                        @foreach($footerPosts as $post)
                            <li>
                                <figure>
                                    <a href="{{route('singlePost', $post->slug)}}"><img style="border-radius:4px;width: 80px;height: 65px" src="{{$post->featured_image}}" alt="{{$post->img_alt_text}}"></a>
                                </figure>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <time datetime="2018-02-14 20:00">{{\Carbon\Carbon::parse($post->created_at)->format('M. d, Y')}}  </time>
                                    </div>
                                    <h6 class="post-title">
                                        <a href="{{route('singlePost', $post->slug)}}">
                                            {!! str_limit(strip_tags($post->title), 50, '...') !!}
                                        </a>
                                    </h6>

                                </div>
                            </li>
                            @endforeach


                        </ul>

                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="widget gallery">
                        <div class="widget__title">
                            <h3>Photo gallery</h3>
                        </div>
                        <ul class="zoom-gallery">
                            @foreach($imgPosts as $post)

                            <li>
                                <a href="{{route('singlePost', $post->slug)}}">
                                    <img style="width: 110px;height: 90px;border-radius: 4px" src="{{$post->featured_image}}" alt="{{$post->img_alt_text}}">
                                </a>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                </div>

                <div class="col-sm-4 d-none d-lg-block">
                    <div class="widget single-cat">
                        <div class="widget__title">
                            <h3>More Posts</h3>
                        </div>
                        <ul class="posts-wrap">
                            @foreach($morePosts as $post)
                                <li>
                                    <figure>
                                        <a href="{{route('singlePost', $post->slug)}}"><img style="width: 80px;height: 65px;border-radius: 4px;-moz-border-radius: ;border-radius: ;" src="{{$post->featured_image}}" alt="{{$post->img_alt_text}}"></a>
                                    </figure>
                                    <div class="post-content">
                                        <div class="post-meta">
                                            <time datetime="2018-02-14 20:00">{{\Carbon\Carbon::parse($post->created_at)->format('M. d, Y')}}  </time>
                                        </div>
                                        <h6 class="post-title">
                                            <a href="#">
                                                {!! str_limit(strip_tags($post->title), 50, '...') !!}
                                            </a>
                                        </h6>

                                    </div>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="footer__end footer__end--brand">
        <div class="container">
            <div class="row u-flex--item-center">
                <div class="col-md-5 u-sm-down-margin-b-15">
                    <div class="footer__copyright">
                        <p class="text-left">{!! $sitemeta->footertext !!}</p>
                    </div>
                </div>
                <div class="col-md-7">
                    <nav class="footer__nav">
                        <ul>
                            @foreach($footerpages as $item)
                            <li><a href="{{route('showPage', $item->slug)}}">{{$item->title}}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- inject:js -->
<script src="{{asset('/user/vendor/jquery/jquery-1.12.0.min.js')}}"></script>
<script src="{{asset('/user/vendor/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('/user/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/user/vendor/owl.carousel2/owl.carousel.min.js')}}"></script>
<script src="{{asset('/user/vendor/sticky-kit/jquery.sticky-kit.js')}}"></script>
<script src="{{asset('/user/vendor/flexMenu-master/flexmenu.min.js')}}"></script>
<script src="{{asset('/user/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
{{--<script src="{{asset('/user/vendor/nicescroll-master/jquery.nicescroll.min.js')}}"></script>--}}
<script src="{{asset('/user/js/newstoday.js')}}"></script>
<!-- endinject -->
</body>
</html>
