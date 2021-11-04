<html lang="en"><head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>O-CLEARNACE</title>

  <!-- Custom fonts for this template-->
  <link href="css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color: #cce6ff !important;">

  <div class="container" style="margin-top: 50px;">

    <!-- Outer Row -->
    <div class="row justify-content-center">
      <h1><b><center>ACD HIGH SCHOOL ONLINE CLEARANCE</center></b></h1><br>
      <div class="col-xl-10 col-lg-12 col-md-9">
          <!-- Alert -->
        <div class="alert alert-danger" id="alert" style="display:none;" role="alert">
                {{$errors->first()}}
        </div>
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-md-6 left-side" style="padding-left: 20px;">
                <center><img src="img/logo.png" class="img-responsive" style="margin-top: 50px !important; height: 200px; width: 200px;"></center>
                <br>
                <h3><b><center>HIGH SCHOOL DEPARTMENT</center></b></h3>
              </div>
              <div style="background-color: #337ab7; !important;" class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4" style="color:white !important;">My Account</h1>
                  </div>
                  <!-- LOGIN FORM-->
                  <form class="user" action="{{route('login')}}" method=" ">
                  @csrf
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail" placeholder="Username" name="username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password">
                    </div>
                        <button style="border-color: white !important;" class="btn btn-success btn-block">Login</button>
                    <br>
                    <div class="dropdown-divider"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="js/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <script> 
    $('document').ready(function(){
        @if($errors->any())
            $("#alert").fadeIn(500).delay(3000).fadeOut(500);
        @endif
    })
    
  </script>



</body></html>