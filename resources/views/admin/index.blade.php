@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">                          
                            <div class="icon bg-primary-light rounded w-60 h-60">
                                <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Today's Sale</p>
                                <h3 class="text-white mb-0 font-weight-500 count">$0<small class="text-success"><i class="fa fa-caret-up"></i> Used</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">                          
                            <div class="icon bg-warning-light rounded w-60 h-60">
                                <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Monthly</p>
                                <h3 class="text-white mb-0 font-weight-500 count">$7870 <small class="text-success"><i class="fa fa-caret-up"></i> Used</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">                          
                            <div class="icon bg-info-light rounded w-60 h-60">
                                <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Yearly Sale</p>
                                <h3 class="text-white mb-0 font-weight-500">$7870 <small class="text-danger"><i class="fa fa-caret-down"></i>Used</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">                          
                            <div class="icon bg-danger-light rounded w-60 h-60">
                                <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Pending Orders</p>
                                <h3 class="text-white mb-0 font-weight-500">3 <small class="text-danger"><i class="fa fa-caret-up"></i> Used</small></h3>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-xl-6 col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">
                                Earning Summary
                            </h4>
                        </div>
                        <div class="box-body py-0">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="box no-shadow mb-0">
                                        <div class="box-body px-0">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <div>
                                                    <div id="chart41"></div>
                                                </div>
                                                <div>
                                                    <h5>Top Order</h5>
                                                    <h4 class="text-white my-0 font-weight-500">$39k</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="charts_widget_43_chart"></div>                         
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-7 col-xl-6 col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Recent Stats</h4>
                        </div>
                        <div class="box-body">
                            <div id="recent_trend"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
      </div>
  </div>
  <!-- /.content-wrapper -->
@endsection
