 
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('/assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin 1</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/kategori') }}">
            <i class="fa fa-files-o"></i>
            <span>Category</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/produks') }}">
            <i class="fa fa-desktop"></i> <span>Product</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ url('/transaction/new') }}">
            <i class="fa fa-shopping-cart"></i> <span>Purchase / In</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/transaction/ext') }}">
            <i class="fa fa-truck"></i> <span>Issuing / Out</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-print"></i> <span>Report</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('/stok') }}"><i class="fa fa-circle-o"></i> Stok</a></li>
              <li><a href="{{ url('/stok/purchase') }}"><i class="fa fa-circle-o"></i> Purchase</a></li>
              <li><a href="{{ url('/stok/issuing') }}"><i class="fa fa-circle-o"></i> Issuing</a></li>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>