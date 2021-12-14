
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>APSURSI | @yield('title')</title> 
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="adminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="adminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="adminLTE/dist/css/skins/_all-skins.min.css">

  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>ASI</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>APSURSI</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
      
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <!-- <img src="../../dist/img/avatar5.jpg" class="img-circle" alt="User Image"> -->

                <p>
                {{ Auth::user()->name }} - {{ Auth::user()->role }}
                </p>
              </li>
              <!-- Menu Footer-->
                <div class="text-center">
                  <a href="{{ route('logout') }}"   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Logout</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
      <!-- NAVIGATION -->
      <div class="navbar-custom-menu">
      </div>
    <!-- NAVIGATION -->

    </nav>
  </header>

  <!-- SIDEBAR -->
  <aside class="main-sidebar">
    <section class="sidebar">>
      <div class="user-panel">
        <div class="pull-left image">
          <img src="adminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>

        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <!-- <li class="header">MAIN NAVIGATION</li> -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        @if(auth()->user()->role == 'Admin')
        <li class="treeview">
          <a href="">
            <i class="fa fa-group"></i> <span>Anggota</span>
          </a>
        </li>
        @endif
        @if(auth()->user()->role == 'Admin')
        <li class="treeview">
          <a href="">
            <i class="fa fa-envelope"></i> <span>Surat Mahasiswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/adm-surat-permohonan"><i class="fa fa-circle-o"></i>Surat permohonan</a></li>
            <li><a href="/adm-surat-berita-acara"><i class="fa fa-circle-o"></i>Surat Berita</a></li>
            <li><a href="/adm-surat-kegiatan"><i class="fa fa-circle-o"></i>Surat Kegiatan</a></li>
            <li><a href="/adm-surat-undangan"><i class="fa fa-circle-o"></i>Surat Undangan</a></li>
            <li><a href="/adm-surat-tugas"><i class="fa fa-circle-o"></i>Suat Tugas</a></li>
          </ul>
        </li>
        @endif
        @if(auth()->user()->role == 'Admin')
        <li class="treeview">
          <a href="">
            <i class="fa fa-envelope"></i> <span>Surat Dosen</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/adm-surat-tugas-dsn"><i class="fa fa-circle-o"></i>Surat tugas dosen</a></li>
          </ul>
        </li>
        @endif
        @if(auth()->user()->role == 'Mahasiswa')
        <li class="treeview">
          <a href="">
            <i class="fa fa-envelope"></i> <span>Surat Mahasiswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/surat-permohonan"><i class="fa fa-circle-o"></i>Surat permohonan</a></li>
            <li><a href="/surat-berita-acara"><i class="fa fa-circle-o"></i>Surat Berita</a></li>
            <li><a href="/surat-kegiatan"><i class="fa fa-circle-o"></i>Surat Kegiatan</a></li>
            <li><a href="/surat-undangan"><i class="fa fa-circle-o"></i>Surat Undangan</a></li>
            <li><a href="/surat-tugas"><i class="fa fa-circle-o"></i>Suat Tugas</a></li>
          </ul>
        </li>
        @endif
        @if(auth()->user()->role == 'Dosen')
        <li class="treeview">
          <a href="">
            <i class="fa fa-envelope"></i> <span>Surat Dosen</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/surat-tugas-dsn"><i class="fa fa-circle-o"></i>Surat tugas dosen</a></li>
          </ul>
        </li>
        @endif
    </section>
  </aside>
  <!-- SIDEBAR -->

  <!-- Breadcrumbs -->
  @yield('breadcrumbs')

    <!-- Breadcrumbs -->

    @yield('content')
    <!-- Main content -->
    
  <!-- Footer -->

<!-- jQuery 3 -->
<script src="adminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="adminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="adminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="adminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="adminLTE/dist/js/demo.js"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
