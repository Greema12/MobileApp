
<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Visat Mobile </title>
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
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Reset Password</h4>
              </div>

              @if (count($errors) > 0)
    <div class="alert alert-primary">
    <strong>Whoops!</strong> There were some problems with your input.
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }} </li>
     
    @endforeach
    </ul>
    </div>
@endif      
              <div class="card-body">
                <p class="text-muted">Enter Your New Password</p>
                <form action="{{URL::to('/')}}/ChangePassword/updatepassword" method="POST">
                    {{ csrf_field() }}    
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input  type="email" class="form-control" name="email"   >
                  </div>
                  <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control " 
                      name="password" >
                  
                  </div>
                  <div class="form-group">
                    <label for="confirm-password">Confirm-Password</label>
                    <input  type="password" class="form-control" name="confirm-password"
                       >
                  </div>
                  <div class="form-group">
                   
                    <button class="btn btn-info">Submit</button>
                    <a href="{{URL::to('/')}}/" class="btn btn-warning" >Cancle</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
 
 
 
   
  <script src="{{asset('assets/js/app.min.js')}}
"></script>
 
  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}
"></script>
  <!-- Custom JS File -->
  <script src="{{asset('assets/js/custom.js')}}
"></script>
</body>


<!-- auth-reset-password.html  21 Nov 2019 04:05:02 GMT -->
</html>