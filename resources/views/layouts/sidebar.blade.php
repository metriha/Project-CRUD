<nav class="page-sidebar" data-pages="sidebar">
  <!-- BEGIN SIDEBAR MENU HEADER-->
  <div class="sidebar-header">
    
    <div class="sidebar-header-controls">
      <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu"><i class="fa fa-angle-down fs-16"></i>
      </button>
      <button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
      </button>
    </div>
  </div>
  <!-- END SIDEBAR MENU HEADER-->
  <!-- START SIDEBAR MENU -->
  <div class="sidebar-menu">
    <!-- BEGIN SIDEBAR MENU ITEMS-->
    <ul class="menu-items">
      <li class="m-t-30 ">
        <a href="{{ url('home') }}">
          <span class="title">Dashboard</span>
        </a>
        <span class="bg-success icon-thumbnail"><i class="pg-home"></i></span>
      </li>
      <li class="">
        <a href="{{ route('add')}}">
          <span class="title">Add Album</span>
        </a>
        <span class="icon-thumbnail"><i class="pg-plus"></i></span>
      </li>
     
    </ul>
    <div class="clearfix"></div>
  </div>
  <!-- END SIDEBAR MENU -->
</nav>