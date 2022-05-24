@extends('frontend.main_master')
@section('content')

@section('title')
User Dashboard Page
@endsection
<div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class='active'>User Dashboard</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
   </div><!-- /.breadcrumb -->
  
<div class="body-content">
    <div class="container">
        <div class="row">
            
            @include('frontend.common.user_sidebar')

            <div class="col-md-2">
                
            </div> <!-- // end col md 2 -->


            <div class="col-md-6">
              <div class="card">
                <h3 class="text-center"><span class="text-danger">Hi....</span><strong>{{ Auth::user()->name }}</strong> Welcome To Easy Online Shop </h3>
                
              </div>


                
            </div> <!-- // end col md 6 -->
            
        </div> <!-- // end row -->
        
    </div>
    
</div>
 

@endsection