@extends('Layout.master')
   
@section('content')              
  <!-- Main Content -->

    
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Total Purchase</h5>
                          <?php
                          $countpurchase = DB::table('purchase_bill')->count('sale_action');
                          ?>
                          <h2 class="mb-3 font-18">{{ $countpurchase}}</h2>
                          {{-- <p class="mb-0"><span class="col-green">10%</span> Increase</p> --}}
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15"> Total Sales</h5>
                          <?php
                          $countsale = DB::table('purchase_bill')->where('sale_action','sale')->count();
                          ?>
                          <h2 class="mb-3 font-18">{{ $countsale}}</h2>
                          {{-- <p class="mb-0"><span class="col-orange">09%</span> Decrease</p> --}}
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/2.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Sales Out</h5>
                          <?php
                          $count = DB::table('purchase_bill')->where('sale_action','saleout')->count();
                          ?>
                          <h2 class="mb-3 font-18">{{ $count }}</h2>
                          {{-- <p class="mb-0"><span class="col-green">18%</span>
                            Increase</p> --}}
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/3.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
         
         
          
        </section>
       
      </div>
     

<!-- index.html  21 Nov 2019 03:47:04 GMT -->

@endsection