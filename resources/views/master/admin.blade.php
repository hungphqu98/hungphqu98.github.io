<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Techy | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('public/admin')}}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{url('public/admin')}}/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{url('public/admin')}}/css/AdminLTE.css">
  <link rel="stylesheet" href="{{url('public/admin')}}/css/_all-skins.min.css">
  <link rel="stylesheet" href="{{url('public/admin')}}/css/jquery-ui.css">
  <link rel="stylesheet" href="{{url('public/admin')}}/css/style.css" />
  <script src="{{url('public/admin')}}/js/angular.min.js"></script>
  <script src="{{url('public/admin')}}/js/app.js"></script>
  <script>
    function base_url(){
      return "{{url('')}}";
    }
    function akey(){
      return "{{url('')}}";
    }
  </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ route('admin.index') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
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
              <span class="hidden-xs">{{strstr(Auth::user()->email,'@',true)}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header"> 
                <p>
                  Phan Quang Hưng - Web Developer
                  <small>Studying since 2019</small>
                </p>
                <div>
                <a href="{{ route('admin.account.change') }}" class="btn btn-default btn-flat">Change password</a></div>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row motto">
                  <div class="col-xs-12 text-center">
                    <a href="">“Whatever you do, do it well.”</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('admin.account') }}" class="btn btn-default btn-flat">Manage admin</a>
                </div>

                  
                <div class="pull-right">
                  <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('')}}/public/admin/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{strstr(Auth::user()->email,'@',true)}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="{{ route('admin.index') }}">
            <i class="fa fa-th"></i> <span>Trang chính</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-headphones"></i> <span>Sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.product') }}"><i class="fa fa-list"></i>Danh sách sản phẩm</a></li>
            <li><a href="{{ route('admin.product.add') }}"><i class="fa fa-plus"></i>Thêm sản phẩm mới</a></li>
            <li><a href="{{ route('admin.product.hot') }}"><i class="fa fa-fire"></i>Sản phẩm bán chạy</a></li>
            <li><a href="{{ route('admin.comment') }}"><i class="fa fa-star"></i>Quản lý đánh giá</a></li>
            <li><a href="{{ route('admin.category') }}"><i class="fa fa-suitcase"></i>Quản lý danh mục</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Banner</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.banner') }}"><i class="fa fa-list"></i> Danh sách banner</a></li>
            <li><a href="{{ route('admin.banner.add') }}"><i class="fa fa-plus"></i> Thêm banner</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tags"></i> <span>Đơn hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.orders') }}"><i class="fa fa-list"></i> Danh sách đơn hàng</a></li>
            <li><a href="{{ route('admin.orders.confirm') }}"><i class="fa fa-check-square"></i> Xác nhận đơn hàng</a></li>
          </ul>
        </li>
        <li>
          <a href="{{ route('admin.users') }}">
            <i class="fa fa-users"></i> <span>Khách hàng<?span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('title')
      </h1>
     
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
        @if(Session::has('success'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('success')}}
          </div>
        @endif
        @if(Session::has('error'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('error')}}
          </div>
          @endif
          
          @yield('main')
        </div>
        <!-- /.box-body -->
       
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2019 - 2020 <a href="https://adminlte.io">{{$copyright}}</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="{{url('public/admin')}}/js/jquery.min.js"></script>
<script src="{{url('public/admin')}}/js/jquery-ui.js"></script>
<script src="{{url('public/admin')}}/js/bootstrap.min.js"></script>
<script src="{{url('public/admin')}}/js/adminlte.min.js"></script>
<script src="{{url('public/admin')}}/js/dashboard.js"></script>
<script src="{{url('public/admin')}}/tinymce/tinymce.min.js"></script>
<script src="{{url('public/admin')}}/tinymce/config.js"></script>
<script src="{{url('public/admin')}}/js/function.js"></script>
</body>
</html>
