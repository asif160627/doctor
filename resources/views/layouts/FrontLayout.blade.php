<!DOCTYPE html> 
<html lang="en">
  
<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Jul 2020 05:49:20 GMT -->
<head>
    <meta charset="utf-8">
    <title>DocCare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    
    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">
    <!-- Daterangepikcer CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
    
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fancybox/jquery.fancybox.min.css')}}">
    
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}">
    
    <link rel="stylesheet" href="{{asset('assets/plugins/dropzone/dropzone.min.css')}}">
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  
  </head>
  <body>

    <!-- Main Wrapper -->
    <div class="main-wrapper" id="app"> 
    
      <!-- Header -->
      <header class="header">
        <nav class="navbar navbar-expand-lg header-nav">
          <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
              <span class="bar-icon">
                <span></span>
                <span></span>
                <span></span>
              </span>
            </a>
            <a href="/" class="navbar-brand logo">
              <img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
            </a>
          </div>
          <div class="main-menu-wrapper">
            <div class="menu-header">
              <a href="/" class="menu-logo">
                <img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
              </a>
              <a id="menu_close" class="menu-close" href="javascript:void(0);">
                <i class="fas fa-times"></i>
              </a>
            </div>
            <ul class="main-nav">
              <li class="active">
                <a href="/">Home</a>
              </li>
              <li >
                <a href="{{route('doctors')}}">All Doctors </a>
                
              </li> 
              <li>
                <a href="{{route('allPost')}}">Blog</a>
              </li>
              
              @guest
              <li class="login-link">
              <a class="" href="{{route('login')}}">login </a>
              </li>
               <li class="login-link">
               <a class="" href="{{route('register')}}">Signup </a>
            </li>
            @else

            <li class="has-submenu login-link">
              <a href="#">
              <span class="user-img"><img class="rounded-circle" src="{{asset('assets/img/doctors/doctor-01.jpg')}}" width="31" alt="{{Auth::user()->name}}"> {{Auth::user()->name}}</span><i class="fas fa-chevron-down"></i>
            </a>
               
                <ul class="submenu">
                  <li><a class="dropdown-item" href="{{route(Auth::user()->role.'.dashboard')}}">Dashboard</a></li>
                  <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                  </li>
                </ul>
              </li>

                                
                                  @endguest
            </ul>    
          </div>     
          <ul class="nav header-navbar-rht">
           
             @guest
            <li class="nav-item">
              <a class="nav-link header-login" href="{{route('login')}}">login </a>
               <a class="nav-link header-login ml-2" href="{{route('register')}}">Signup </a>
            </li>
           
              @else


                        <!-- User Menu -->
          <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <span class="user-img"><img class="rounded-circle" src="{{asset('assets/img/doctors/doctor-01.jpg')}}" width="31" alt="Ryan Taylor"> {{Auth::user()->name}}</span>
            </a>
            <div class="dropdown-menu">
              <div class="user-header">
                
                
              </div>
              <a class="dropdown-item" href="{{route(Auth::user()->role.'.dashboard')}}">Dashboard</a>
              <a class="dropdown-item" href="{{route(Auth::user()->role.'.profile-setting')}}">My Profile</a>
               <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-formm" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </div>
                                  </li>
                                  <!-- /User Menu -->

                                
                                  @endguest
                                </ul>
        </nav>
      </header>
      <!-- /Header -->

      @yield('content')

        <!-- Footer -->
      <footer class="footer">
        
        <!-- Footer Top -->
        <div class="footer-top">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-3 col-md-6">
              
                <!-- Footer Widget -->
                <div class="footer-widget footer-about">
                  <div class="footer-logo">
                    <img src="{{asset('assets/img/footer-logo.png')}}" alt="logo">
                  </div>
                  <div class="footer-about-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    <div class="social-icon">
                      <ul>
                        <li>
                          <a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
                        </li>
                        <li>
                          <a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
                        </li>
                        <li>
                          <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li>
                          <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                          <a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- /Footer Widget -->
                
              </div>
              
              <div class="col-lg-3 col-md-6">
              
                <!-- Footer Widget -->
                <div class="footer-widget footer-menu">
                  <h2 class="footer-title">For Patients</h2>
                  <ul>
                    <li><a href="search.html">Search for Doctors</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                    <li><a href="booking.html">Booking</a></li>
                    <li><a href="patient-dashboard.html">Patient Dashboard</a></li>
                  </ul>
                </div>
                <!-- /Footer Widget -->
                
              </div>
              
              <div class="col-lg-3 col-md-6">
              
                <!-- Footer Widget -->
                <div class="footer-widget footer-menu">
                  <h2 class="footer-title">For Doctors</h2>
                  <ul>
                    <li><a href="appointments.html">Appointments</a></li>
                    <li><a href="chat.html">Chat</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="doctor-register.html">Register</a></li>
                    <li><a href="doctor-dashboard.html">Doctor Dashboard</a></li>
                  </ul>
                </div>
                <!-- /Footer Widget -->
                
              </div>
              
              <div class="col-lg-3 col-md-6">
              
                <!-- Footer Widget -->
                <div class="footer-widget footer-contact">
                  <h2 class="footer-title">Contact Us</h2>
                  <div class="footer-contact-info">
                    <div class="footer-address">
                      <span><i class="fas fa-map-marker-alt"></i></span>
                      <p> 3556  Beech Street, San Francisco,<br> California, CA 94108 </p>
                    </div>
                    <p>
                      <i class="fas fa-phone-alt"></i>
                      +1 315 369 5943
                    </p>
                    <p class="mb-0">
                      <i class="fas fa-envelope"></i>
                      doccure@example.com
                    </p>
                  </div>
                </div>
                <!-- /Footer Widget -->
                
              </div>
              
            </div>
          </div>
        </div>
        <!-- /Footer Top -->
        
        <!-- Footer Bottom -->
                <div class="footer-bottom">
          <div class="container-fluid">
          
            <!-- Copyright -->
            <div class="copyright">
              <div class="row">
                <div class="col-md-6 col-lg-6">
                  <div class="copyright-text">
                    <p class="mb-0">&copy; 2020 Doccure. All rights reserved.</p>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                
                  <!-- Copyright Menu -->
                  <div class="copyright-menu">
                    <ul class="policy-menu">
                      <li><a href="term-condition.html">Terms and Conditions</a></li>
                      <li><a href="privacy-policy.html">Policy</a></li>
                    </ul>
                  </div>
                  <!-- /Copyright Menu -->
                  
                </div>
              </div>
            </div>
            <!-- /Copyright -->
            
          </div>
        </div>
        <!-- /Footer Bottom -->
        
      </footer>
      <!-- /Footer -->
       
    </div>
    <!-- /Main Wrapper -->
    
 
    <!-- jQuery -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <!-- jQuery -->
       @yield('js')

    <script src="{{asset('js/fontend.js')}}"></script>
   
 
   
    

   

    <script type="text/javascript">
      $('.dynamic').change(function(){
        if($(this).val() !=''){
          var select=$(this).attr("id");
          var value=$(this).val();
          var dependent=$(this).data('dependent');
          var _token=$('input[name="_token"]').val();
          $.ajax({
            url:"{{route('dynamic')}}",
            method:"POST",
            data:{select:select,value:value,_token:_token,dependent:dependent},
            success:function(result){
              console.log(result);
              var selOpts = "";
            for (i=0;i<result.length;i++)
            {
                var val = result[i];
                selOpts += "<option value='"+val+"'>"+val+"</option>";
            }
            $('#time').append(selOpts);
            }
          })

        }
      });
    </script>
    <script src="https://media.twiliocdn.com/sdk/js/chat/v3.3/twilio-chat.min.js"></script>

  </body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Jul 2020 05:49:20 GMT -->
</html>