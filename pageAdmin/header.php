<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir PHP</title>

    <!-- Bootstrap core CSS -->
    <!-- <link href="assets/css/bootstrap.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!--external css-->
    <link href="assets/font-awesome/css/all.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/fontawesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/datatables/dataTables.bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">
    
    <!-- SweetAlert Popup -->
		<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- <link href="assets/css/style-responsive.css" rel="stylesheet"> -->
        
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/datatables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="assets/datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="assets/js/jquery-2.2.3.min.js"></script>

    <!--  jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    
    <!-- Date Range Picker -->
    <!-- Include Required Prerequisites -->
    <!-- <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script> -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" /> -->
    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
        
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .daterangepicker .input-mini.active {
      background-color: #faf37b;
      }
      .daterangepicker td.in-range {
      background-color: #faf37b;
      }
      .daterangepicker td.active, .daterangepicker td.active:hover {
      background-color: #feb101;
      }
      .btn:focus {
        outline: none;
      }

      .active{
        color: #F0F8FF;
        background-color:#000000;
      }
      .auto-kasir{
        width: 100%;
        padding: 10px 15px;
        text-transform: capitalize;
        transition: 0.3s;
        /* margin-left: 3em; */
        color: #000000;
      }
      .auto-kasir:hover{
        color: #F0F8FF;
        background-color:#000000;
        padding: 10px 18px;
        /* margin-left: -4em; */
      }

      .auto-result{
        padding: 0px;
        width: auto;
      }

      #search-result, #search-result2{
        cursor: pointer;
        position:absolute; 
        background-color:#feb101;
        /* margin-left: -1em; */}
      .header{
        background:#000000;
        color:#F0F8FF;}
      #main-content{
        background:#fff;}
      #hidden{
        display:none
      }
    </style>
</head>
<body>
<section id="container">
      <header class="header black-bg">
                  <div class="sidebar-toggle-box">
                      <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                  </div>
                <!--logo start-->
                <a href="admin.php" class="logo"><b>Janti Park</b> <small style="padding-left:5px;font-size:13px;">Ngendo, Janti, Kecamatan Polanharjo, Kabupaten Klaten, Jawa Tengah 57474</small></a>
                <!--logo end-->
                <!-- <div class="nav notify-row" id="top_menu">
                </div> -->
                <div class="top-menu">
                  <ul class="nav pull-right top-menu">
                        <li><a class="logout" href="logout.php">Logout</a></li>
                  </ul>
                </div>
            </header>