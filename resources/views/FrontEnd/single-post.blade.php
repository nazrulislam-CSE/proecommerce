<!DOCTYPE html>
<html lang="en">
@php
$seo = App\Models\Seo::find(1);
@endphp
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="{{ $seo->meta_description }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="{{ $seo->meta_author }}">
<meta name="keywords" content="{{ $seo->meta_keyword }}">
<meta name="robots" content="all">
<!-- // Google Analytics Code // -->
<script>
  {{ $seo->google_analytics }}
</script>

<title>{{ $seo->meta_title }}</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/bootstrap.min.css ') }}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/main.css ') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/blue.css ') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/owl.carousel.css ') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/owl.transitions.css ') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/animate.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/rateit.css ') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/bootstrap-select.min.css ') }}">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontEnd/assets/css/font-awesome.css ') }}">

        <!-- Fonts --> 
        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


    </head>
    <body class="cnt-home">
        <!-- ============================================== HEADER ============================================== -->
        @include('includes.header')
        <!-- ============================================== HEADER : END ============================================== -->
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
        <!-- ============================================================= FOOTER ============================================================= -->
        @include('includes.footer')
        <!-- ============================================================= FOOTER : END============================================================= -->


        <!-- For demo purposes – can be removed on production -->


        <!-- For demo purposes – can be removed on production : End -->

        <!-- JavaScripts placed at the end of the document so the pages load faster --> 
    <script src="{{ asset('frontEnd/assets/js/jquery-1.11.1.min.js ') }}"></script> 
    <script src="{{ asset('frontEnd/assets/js/bootstrap.min.js ') }}"></script> 
    <script src="{{ asset('frontEnd/assets/js/bootstrap-hover-dropdown.min.js ') }}"></script> 
    <script src="{{ asset('frontEnd/assets/js/owl.carousel.min.js ') }}"></script> 
    <script src="{{ asset('frontEnd/assets/js/echo.min.js ') }}"></script> 
    <script src="{{ asset('frontEnd/assets/js/jquery.easing-1.3.min.js ') }}"></script> 
    <script src="{{ asset('frontEnd/assets/js/bootstrap-slider.min.js ') }}"></script> 
    <script src="{{ asset('frontEnd/assets/js/jquery.rateit.min.js ') }}"></script> 
    <script type="text/javascript" src="{{ asset('frontEnd/assets/js/lightbox.min.js ') }}"></script> 
    <script src="{{ asset('frontEnd/assets/js/bootstrap-select.min.js ') }}"></script> 
    <script src="{{ asset('frontEnd/assets/js/wow.min.js ') }}"></script> 
    <script src="{{ asset('frontEnd/assets/js/scripts.js ') }}"></script>
    <!-- sweetalert js -->
    <script src="{{ asset('frontEnd/assets/sweetalert2@11.js ') }}"></script>
    <!-- online link sweetalert js -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- socila addthis link -->
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e4b85f98de5201f"></script>
    <script type="text/javascript" src="{{asset('frontEnd/toastr/addthis_widget.js') }}"></script>



    </body>

</html>
