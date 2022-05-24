@extends('frontend.main_master')
@section('content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Blog Details</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<!-- start body part section -->
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="blog-page">
                <div class="col-md-9">
                    <div class="blog-post wow fadeInUp">
                        <img class="img-responsive" src="{{ asset($post->post_image) }}" alt="">
                        <h1>{{ $post->post_title }}</h1>
                        <span class="author">John Doe</span>
                        <span class="review">{{ $post->created_at->diffForHumans() }}</span>
                        <span class="date-time">{{ $post->created_at->toFormattedDateString() }}</span>
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox_8tvu"></div>
                        <p>{!! $post->post_details !!}</p>

                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox_8tvu"></div>
                    </div>
                    <div class="blog-write-comment outer-bottom-xs outer-top-xs">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Leave A Comment</h4>
                            </div>
                            <div class="col-md-4">
                                <form class="register-form" role="form">
                                    <div class="form-group">
                                    <label class="info-title" for="exampleInputName">Your Name <span>*</span></label>
                                    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="">
                                  </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form class="register-form" role="form">
                                    <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
                                  </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form class="register-form" role="form">
                                    <div class="form-group">
                                    <label class="info-title" for="exampleInputTitle">Title <span>*</span></label>
                                    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="">
                                  </div>
                                </form>
                            </div>
                            <div class="col-md-12">
                                <form class="register-form" role="form">
                                    <div class="form-group">
                                    <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
                                    <textarea class="form-control unicase-form-control" id="exampleInputComments" ></textarea>
                                  </div>
                                </form>
                            </div>
                            <div class="col-md-12 outer-bottom-small m-t-20">
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit Comment</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-3 sidebar">

                    <div class="sidebar-module-container">
                        <div class="search-area outer-bottom-small">
                            <form>
                                <div class="control-group">
                                    <input placeholder="Type to search" class="search-field">
                                    <a href="#" class="search-button"></a>   
                                </div>
                            </form>
                        </div>		

                        <div class="home-banner outer-top-n outer-bottom-xs">
                            <img src="{{ asset('FrontEnd/assets/images/banners/LHS-banner.jpg ') }}" alt="Image">
                        </div>
                        <!-- ==============================================CATEGORY============================================== -->
                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                            <h3 class="section-title">Category</h3>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="accordion">
                                    @foreach($blogcategory as $category)
                                    <ul class="list-group">
                                        <li class="list-group-item">{{ $category->blog_category_name }}</li>
                                    </ul>
                                    @endforeach
                                </div><!-- /.accordion -->
                            </div><!-- /.sidebar-widget-body -->
                        </div><!-- /.sidebar-widget -->
                        <!-- ============================================== CATEGORY : END ============================================== -->						<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                            <h3 class="section-title">tab widget</h3>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#popular" data-toggle="tab">popular post</a></li>
                                <li><a href="#recent" data-toggle="tab">recent post</a></li>
                            </ul>
                            <div class="tab-content" style="padding-left:0">
                                <div class="tab-pane active m-t-20" id="popular">
                                    @foreach($popular as $post)
                                    <div class="blog-post inner-bottom-30 " >
                                        <img class="img-responsive" src="{{ asset($post->post_image) }}" alt="">
                                        <h4><a href="{{ url('single-post/'.$post->id.'/'.$post->post_slug) }}">{{ $post->post_title }}</a></h4>
                                        <span class="review">6 Comments</span>
                                        <span class="date-time">{{ $post->created_at->toFormattedDateString() }}</span>
                                        <p></p>

                                    </div>
                                    @endforeach
                                </div>

                                <div class="tab-pane m-t-20" id="recent">
                                   @foreach($recent as $post)
                                    <div class="blog-post inner-bottom-30 " >
                                        <img class="img-responsive" src="{{ asset($post->post_image) }}" alt="">
                                        <h4><a href="{{ url('single-post/'.$post->id.'/'.$post->post_slug) }}">{{ $post->post_title }}</a></h4>
                                        <span class="review">6 Comments</span>
                                        <span class="date-time">{{ $post->created_at->toFormattedDateString() }}</span>
                                        <p></p>

                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- ============================================== PRODUCT TAGS ============================================== -->
                        <!-- ============================================== PRODUCT TAGS : END ============================================== -->					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end body part section -->

@endsection