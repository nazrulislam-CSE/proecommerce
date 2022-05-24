@extends('frontend.main_master')
@section('content')
<div class="breadcrumb">
        <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class='active'>User Change Password</li>
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


           	<div class="col-md-8">
               <div class="card">
                <h3 class="text-center"><span class="text-danger">User Change Password:</span></h3>
                   <div class="card-body">
                       <form method="post" action="{{ route('user.password.update') }}">
                        @csrf

                        <div class="form-group">
                            <label class="info-title" for="oldpassword">Current Password <span class="text-danger">**</span></label>
                            @error('oldpassword')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror()
                            <input type="password" name="oldpassword" id="current_password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="password">New Password <span class="text-danger">**</span></label>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror()
                            <input type="password" name="password" id="password" class="form-control">
                        </div>


                        <div class="form-group">
                            <label class="info-title" for="password_confirmation">Confirm Password <span class="text-danger">**</span></label>
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror()
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>

                        <div class="form-group">            
                           <button type="submit" class="btn btn-danger">Update</button>
                        </div>         
                    </form>     
                   </div>
               </div> 
            </div><!-- // end col-md-8 -->


                
            </div> <!-- // end col md 6 -->
            
        </div> <!-- // end row -->
        
    </div>
@endsection