<!DOCTYPE html>
<html lang="fr">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 3.1
================================================================================ -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
    <title>Calendar</title>

  <!-- CORE CSS-->
  
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="css/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">


  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/fullcalendar.min.css" type="text/css" rel="stylesheet" media="screen,projection">
</head>

<body>
  <!-- Start Page Loading 
    <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
     End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="container wrapper">


      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">
        
        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey hide-on-large-only">
                <i class="mdi-action-search active"></i>
                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
            </div>
          <div class="container">
            <div class="row">
  
        <div class="col s12 m12 l12 indigo darken-4 white-text">
                <h5 class="breadcrumbs-title">Calendar</h5>
                <ol class="breadcrumbs">
                    <li><a href="index.php" class="white-text">Dashboard</a></li>
                    <li><a href="#" class="white-text">Profil</a></li>
                    <li class="active">Calendar</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
        

        <!--start container-->
        <div class="container">
          <div class="section">

            <div class="divider"></div>
            <div id="full-calendar">              
              <div class="row">
                <div class="col s12 m4 l3">
                  <div id='external-events'>    
                    <h4 class="header">Draggable Courses</h4>
                    <div class='fc-event purple'>MATHS_110</div>
                    <div class='fc-event teal'>INFO_220</div>
                    <div class='fc-event indigo darken-1'>INFO_140</div>
                    <div class='fc-event cyan accent-4'>PROJ_110</div>
                    <div class='fc-event teal accent-4'>LANG_110</div>
                    <div class='fc-event orange accent-3'>LANG_140</div>
                    <div class='fc-event light-blue accent-4'>MATHS_210</div>
                    <p>
                      <input type='checkbox' id='drop-remove' />
                      <label for='drop-remove'>remove after drop</label>
                    </p>
                  </div>
                </div>
                <div class="col s12 m8 l9">
                  <div id='calendar'></div>
                </div>
              </div>
            </div>
            </div>

            <!-- Floating Action Button -->
            <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
                <a class="btn-floating btn-large">
                  <i class="mdi-action-stars"></i>
                </a>
                <ul>
                  <li><a href="#" class="btn-floating red"><i class="large mdi-communication-live-help"></i></a></li>
                  <li><a href="#" class="btn-floating yellow darken-1"><i class="large mdi-device-now-widgets"></i></a></li>
                  <li><a href="#" class="btn-floating green"><i class="large mdi-editor-insert-invitation"></i></a></li>
                  <li><a href="#" class="btn-floating blue"><i class="large mdi-communication-email"></i></a></li>
                </ul>
            </div>
            <!-- Floating Action Button -->
        </div>
        <!--end container-->

      </section>
      <!-- END CONTENT -->

    </div>
    <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->



  <!-- //////////////////////////////////////////////////////////////////////////// -->



    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--prism-->
    <script type="text/javascript" src="js/prism.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/perfect-scrollbar.min.js"></script>
    
    <!-- chartist -->
    <script type="text/javascript" src="js/chartist.min.js"></script>   

    <!-- Calendar Script -->
    <script type="text/javascript" src="js/jquery-ui.custom.min.js"></script>
    <script type="text/javascript" src="js/moment.min.js"></script>
    <script type="text/javascript" src="js/fullcalendar.min.js"></script>
    <script type="text/javascript" src="js/fullcalendar-script.js"></script>

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
    
</body>

</html>