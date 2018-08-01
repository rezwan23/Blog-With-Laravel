<div class="col-lg-4 side-bar sidebar--right u-md-down-margin-t-40">
    <div class="side-bar__inner is_stuck" data-sticky_column>
        <div class="widget widget--title-box single-cat">
            <div class="widget__title">
                <h4>Recent Posts</h4>
            </div>
            <ul class="posts-wrap">
                @foreach($recentPosts as $post)
                <li>
                    <figure>
                        <a href="#"><img style="width: 80px;height: 65px;border-radius: 4px" src="{{$post->featured_image}}" alt="{{$post->img_alt_text}}"></a>
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
        <div class="widget widget--title-box post-categoris">
            <div class="widget__title">
                <h4>Categories </h4>
            </div>
            <div class="post-categoris__wrap">
                <p>Select Category Below...</p>
                <button type="button" class="cat-ctrl" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select Categories <i class="fa fa-angle-down" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu w-categoris">
                    @foreach($categories as $category)
                    <a class="dropdown-item" href="{{route('showCategoryPosts', $category->slug)}}">{{$category->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>