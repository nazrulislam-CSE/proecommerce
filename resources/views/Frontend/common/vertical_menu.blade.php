<!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">

            <ul class="nav">

              @foreach($categories as $category)
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{ $category->category_icon }}" aria-hidden="true"></i>{{ $category->category_name }}</a>
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    @php
                      $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name','DESC')->where('status','=', 1)->get();
                    @endphp
                    <div class="row">
                    @foreach($subcategories as $subcategory)
                      <div class="col-sm-12 col-md-3">
                        <a href="{{ url('subcategory-product/'.$subcategory->id.'/'.$subcategory->subcategory_slug) }}">
                          <h2 class="title">{{ $subcategory->subcategory_name }}</h2>
                        </a>
                        <ul class="links list-unstyled">
                          @php
                            $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name','DESC')->where('status','=',1)->get();
                          @endphp

                          @foreach($subsubcategories as $subsubcategory)
                          <li><a href="{{ url('subsubcategory-product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug) }}">{{ $subsubcategory->subsubcategory_name }}</a></li>
                          @endforeach
                        </ul>
                      </div>
                     @endforeach
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              @endforeach
              
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu --> 
        <!-- ================================== TOP NAVIGATION : END ================================== --> 