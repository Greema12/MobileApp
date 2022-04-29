<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Mobile_Sales </title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}
">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}
">

  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}
">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}
">
  <link rel='shortcut icon' type='image/x-icon' href="{{asset('assets/img/faviconnn.ico')}}
" />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                                        collapse-btn"> <i data-feather="align-justify"></i></a></li>
                
              </ul>
        </div>
        <ul class="navbar-nav navbar-right">
        
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user" style="color:#000000;"> {{ Auth::user()->name }}</a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title" ><a href="{{URL::to('/')}}/dashboard" style="color:#000000; font: 12px Arial, sans-serif;">  Hello Admin</a></div>
             <div class="dropdown-divider"></div>
              <div class="dropdown-title">
                <a href="{{URL::to('/')}}/ChangePassword/changepassword" style="color:#000000;font: 12px Arial, sans-serif;">Change Password</a>
                </div>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <link rel="stylesheet" href="{{asset('assets/bundles/datatables/datatables.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">


      <!--leftmenu-->
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{URL::to('/')}}/dashboard"> <img src="{{ URL::to('/') }}/assets/img/users/Visat_icon2.png" class="header-logo"> 
           
            <span
              class="logo-name" style=" ">Mobile_Sales</span> </a>
          </div>
          <ul class="sidebar-menu">
            <!-- <li class="menu-header">Main</li> -->
            
            <li class="dropdown ">
              <a href="{{URL::to('/')}}/dashboard" class="nav-link"><i data-feather="monitor"></i><span >Dashboard</span></a>
            </li>
            <li class="dropdown ">
              <a href="{{URL::to('/')}}/Purchase/purchase" class="nav-link"><i data-feather="grid"></i><span >Purchase</span></a>
            </li>
           
             <li class="dropdown ">
                <a href="{{URL::to('/')}}/Sales/forsales" class="nav-link"><i data-feather="grid"></i><span >Forsale</span></a>
              </li>
            
              <li class="dropdown ">
                <a href="{{URL::to('/')}}/Sales/soldout" class="nav-link"><i data-feather="grid"></i><span >Soldout</span></a>
              </li>
             
          
          

          
          
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>


   <div class="main-content">
    <section class="section">
      <div class="section-body">
      {{--  <div class="row">
          <div class=" col-md-18 col-lg-18">
            <div class="card"> --}}
             
              @yield('content')  
            
             
              </div>
              



{{--     
        </div>
       
        </div>
       
        </div>--}}
      </div>
    </section>
    
    </div>  
  


      
      <!--footer -->
      <footer class="main-footer">
        <div class="footer-left">
          <a href="#" >Mobile_Sales_admin</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  
  <script src="{{asset('assets/js/app.min.js')}}
"></script>
  <!-- JS Libraies -->
  <script src="{{asset('assets/bundles/apexcharts/apexcharts.min.js')}}
"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('assets/js/page/index.js')}}
"></script>
  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}
"></script>
  <!-- Custom JS File -->
  <script src="{{asset('assets/js/custom.js')}}
"></script>
<script src="{{asset('assets/bundles/datatables/datatables.min.js')}}"></script>
<script src="{{asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/bundles/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Page Specific JS File -->
<script src="{{asset('assets/js/page/datatables.js')}}"></script>

</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>

  <!-- JS Libraies -->
  <script src="{{asset('assets/bundles/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('assets/js/page/advance-table.js')}}"></script>
  