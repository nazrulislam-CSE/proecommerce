@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar"> 
    
        <div class="user-profile">
      <div class="ulogo">
         <a href="">
          <!-- logo for regular state and mobile devices -->
           <div class="d-flex align-items-center justify-content-center">           
              <img src="{{ asset('backEnd/images/logo-dark.png ') }}" alt="">
              <h3><b>Ecommerce</b></h3>
           </div>
        </a>
      </div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
        
        <li class="{{ ($route == 'admin.dashboard')? 'active':'' }}">
          <a href="{{ route('admin.dashboard') }}">
            <i data-feather="pie-chart"></i>
              <span>Dashboard</span>
          </a>
        </li>  
        
        <li class="treeview 
      

        
        ">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="
            {{ ($route == 'admin.profile')? 'active':'' }}
            {{ ($route == 'admin.profile.edit')? 'active':'' }}
            "><a href="{{ route('admin.profile') }}"><i class="ti-more"></i>Admin Profile</a></li>
            <li class="{{ ($route == 'admin.change.password')? 'active':'' }}"><a href="{{ route('admin.change.password') }}"><i class="ti-more"></i>Change Password</a></li>
          </ul>
        </li> 
        
        <li class="treeview 
        
        ">
          <a href="#" class="nav-link">
            <i data-feather="message-circle"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="
            {{ ($route == 'brand.all')? 'active':'' }}
            {{ ($route == 'brand.edit')? 'active':'' }}
            "><a href="{{ route('brand.all') }}"><i class="ti-more"></i>All Brand</a></li>
          </ul>
        </li>

        <li class="treeview 
       
        ">
          <a href="#" class="nav-link">
            <i data-feather="message-circle"></i>
            <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="
              {{ ($route == 'category.all')? 'active':'' }}
              {{ ($route == 'category.edit')? 'active':'' }}
              "><a href="{{ route('category.all') }}"><i class="ti-more"></i>All Category</a>
            </li>
            <li class="
            {{ ($route == 'subcategory.all')? 'active':'' }}
            {{ ($route == 'subcategory.edit')? 'active':'' }}
            ">
              <a href="{{ route('subcategory.all') }}"><i class="ti-more"></i>All SubCategory</a>
            </li>
            <li class="
            {{ ($route == 'subsubcategory.all')? 'active':'' }}
            {{ ($route == 'subsubcategory.edit')? 'active':'' }}
            ">
              <a href="{{ route('subsubcategory.all') }}"><i class="ti-more"></i>Chield Category</a>
            </li>
          </ul>
        </li>

         <li class="treeview
         
        ">
          <a href="#" class="nav-link">
            <i data-feather="message-circle"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="
            {{ ($route == 'product.add')? 'active':'' }}
  

            "><a href="{{ route('product.add') }}"><i class="ti-more"></i>Add Product</a></li>
            <li class="

            {{ ($route == 'product.manage')? 'active':'' }}
            {{ ($route == 'product.edit')? 'active':'' }}
            ">
              <a href="{{ route('product.manage') }}"><i class="ti-more"></i>Manage Product</a></li>
          </ul>
        </li>

        <li class="treeview 
       
       ">
          <a href="#" class="nav-link">
            <i data-feather="message-circle"></i>
            <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li class="
             {{ ($route == 'pending.orders')? 'active':'' }}
             {{ ($route == 'pending.order.details')? 'active':'' }}
            "><a href="{{ route('pending.orders') }}"><i class="ti-more"></i>Pending Orders</a></li>

            <li class="{{ ($route == 'confirmed.orders')? 'active':'' }}"><a href="{{ route('confirmed.orders') }}"><i class="ti-more"></i>Confirmed Orders</a></li>

            <li class="{{ ($route == 'processing.orders')? 'active':'' }}"><a href="{{ route('processing.orders') }}"><i class="ti-more"></i>Processing Orders</a></li>

            <li class="{{ ($route == 'delivered.orders')? 'active':'' }}"><a href="{{ route('delivered.orders') }}"><i class="ti-more"></i> Delivered Orders</a></li>

            <li class="{{ ($route == 'cancel.orders')? 'active':'' }}"><a href="{{ route('cancel.orders') }}"><i class="ti-more"></i> Cancel Orders</a></li>


          </ul>
        </li>

        <li class="treeview 
       
       ">
          <a href="#" class="nav-link">
            <i data-feather="message-circle"></i>
            <span>All Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="
            {{ ($route == 'all-reports')? 'active':'' }}
            {{ ($route == 'search-by-date')? 'active':'' }}
            {{ ($route == 'search-by-month')? 'active':'' }}
            {{ ($route == 'search-by-year')? 'active':'' }}

            "><a href="{{ route('all-reports') }}"><i class="ti-more"></i>All Reports</a></li>
          </ul>
        </li>

        <li class="treeview 
       
       ">
          <a href="#" class="nav-link">
            <i data-feather="message-circle"></i>
            <span>Sliders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="
            {{ ($route == 'slider.manage')? 'active':'' }}
            {{ ($route == 'slider.edit')? 'active':'' }}

            "><a href="{{ route('slider.manage') }}"><i class="ti-more"></i>Manage Slider</a></li>
          </ul>
        </li>

        <li class="treeview
      
      ">
          <a href="#" class="nav-link">
            <i data-feather="message-circle"></i>
            <span>Coupons</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="
            {{ ($route == 'coupon.manage')? 'active':'' }}
            {{ ($route == 'coupon.edit')? 'active':'' }}
            "><a href="{{ route('coupon.manage') }}"><i class="ti-more"></i>Manage Coupon</a></li>
          </ul>
        </li>


        <li class="treeview
      
        ">
          <a href="#" class="nav-link">
            <i data-feather="message-circle"></i>
            <span>Shipping Area</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="
            {{ ($route == 'manage.division')? 'active':'' }}
            {{ ($route == 'division.edit')? 'active':'' }}
            "><a href="{{ route('manage.division') }}"><i class="ti-more"></i>Ship Division</a></li>
            <li class="
            {{ ($route == 'manage.district')? 'active':'' }}
            {{ ($route == 'district.edit')? 'active':'' }}
            "><a href="{{ route('manage.district') }}"><i class="ti-more"></i>Ship District</a></li>
            <li class="
            {{ ($route == 'manage.state')? 'active':'' }}
            {{ ($route == 'state.edit')? 'active':'' }}
            "><a href="{{ route('manage.state') }}"><i class="ti-more"></i>Ship State</a></li>
          </ul>
        </li>

        <li class="treeview
        
        ">
          <a href="#" class="nav-link">
            <i data-feather="message-circle"></i>
            <span>All Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'all.user')? 'active':'' }}"><a href="{{ route('all.user') }}"><i class="ti-more"></i>All User</a></li>
          </ul>
        </li>

         <li class="treeview
      
        ">
          <a href="#" class="nav-link">
            <i data-feather="message-circle"></i>
            <span>All Admin User Role</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ route('admin.user_role') }}"><i class="ti-more"></i>All Admin User</a></li>
          </ul>
        </li>

        <li class="treeview
      
       ">
          <a href="#" class="nav-link">
            <i data-feather="message-circle"></i>
            <span>Manage Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="
            {{ ($route == 'blog.category')? 'active':'' }}
            {{ ($route == 'blog.category.edit')? 'active':'' }}
            "><a href="{{ route('blog.category') }}"><i class="ti-more"></i>Blog Category</a></li>
            <li class="
            {{ ($route == 'view.post')? 'active':'' }}
            {{ ($route == 'blog.post.edit')? 'active':'' }}
            "><a href="{{ route('view.post') }}"><i class="ti-more"></i>View Blog Post</a></li>
            <li class="
            {{ ($route == 'view.post.list')? 'active':'' }}
            "><a href="{{ route('view.post.list') }}"><i class="ti-more"></i>View Post list</a></li>
          </ul>
        </li>

        <li class="treeview
       
       ">
          <a href="#" class="nav-link">
            <i data-feather="message-circle"></i>
            <span>Manage Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="
            
            "><a href="{{ route('site.setting') }}"><i class="ti-more"></i>Site Setting</a></li>
            <li class="
           
            "><a href="#"><i class="ti-more"></i>Seo Setting</a></li>
          </ul>
        </li>

        
         <li class="treeview
        
       ">
          <a href="#" class="nav-link">
            <i data-feather="message-circle"></i>
            <span>Review Manage</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="
            {{ ($route == 'pending.review')? 'active':'' }}
            "><a href="{{ route('pending.review') }}"><i class="ti-more"></i>Pending Review</a></li>
            <li class="
            {{ ($route == 'publish.review')? 'active':'' }}
            "><a href="{{ route('publish.review') }}"><i class="ti-more"></i>Publish Review</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="ti-more"></i>Inbox</a></li>
            <li><a href="#"><i class="ti-more"></i>Compose</a></li>
            <li><a href="#"><i class="ti-more"></i>Read</a></li>
          </ul>
        </li>


        <li>
          <a href="{{ route('admin.logout') }}">
            <i data-feather="lock"></i>
            <span>Log Out</span>
          </a>
        </li>
          
      </ul>
    </section>
    <div class="sidebar-footer">
      <!-- item-->
      <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
      <!-- item-->
      <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
      <!-- item-->
      <a href="{{ route('admin.logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
  </aside>