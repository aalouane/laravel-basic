<div class="vertical-menu">

  <div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
      <!-- Left Menu Start -->
      <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
          <a href="index.html" class="waves-effect">
            <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
            <span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="false">
            <i class="ri-layout-3-line"></i>
            <span>Home Slide Setup</span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="{{ route('home.slide')}}" class="">Home Slide</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="false">
            <i class="ri-layout-3-line"></i>
            <span>About Page Setup</span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="{{ route('about.page')}}" class="">About Page</a>
              <a href="{{ route('about.multi.image')}}" class="">Multi Images</a>
              <a href="{{ route('all.multi.image')}}" class="">All Multi Images</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="false">
            <i class="ri-layout-3-line"></i>
            <span>Portfolio Page Setup</span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="{{ route('all.portfolio')}}" class="">All Portfolio</a>
              <a href="{{ route('add.portfolio')}}" class="">Add Portfolio</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="false">
            <i class="ri-layout-3-line"></i>
            <span>Blog Category</span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="{{ route('all.blog.category')}}" class="">All Blog Category</a>
              <a href="{{ route('add.blog.category')}}" class="">Add Blog Category</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="false">
            <i class="ri-layout-3-line"></i>
            <span>Blog</span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="{{ route('all.blog')}}" class="">All Blog</a>
              <a href="{{ route('add.blog')}}" class="">Add Blog</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="false">
            <i class="ri-layout-3-line"></i>
            <span>Footer Setup</span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="{{ route('footer')}}" class="">All Footer</a>
            </li>
          </ul>
        </li>


        <li class="menu-title">Pages</li>

        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-account-circle-line"></i>
            <span>Authentication</span>
          </a>
          <ul class="sub-menu" aria-expanded="false">
            <li><a href="auth-login.html">Login</a></li>
            <li><a href="auth-register.html">Register</a></li>
            <li><a href="auth-recoverpw.html">Recover Password</a></li>
            <li><a href="auth-lock-screen.html">Lock Screen</a></li>
          </ul>
        </li>

        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-profile-line"></i>
            <span>Utility</span>
          </a>
          <ul class="sub-menu" aria-expanded="false">
            <li><a href="pages-starter.html">Starter Page</a></li>
            <li><a href="pages-timeline.html">Timeline</a></li>
            <li><a href="pages-directory.html">Directory</a></li>
            <li><a href="pages-invoice.html">Invoice</a></li>
            <li><a href="pages-404.html">Error 404</a></li>
            <li><a href="pages-500.html">Error 500</a></li>
          </ul>
        </li>

      </ul>
    </div>
    <!-- Sidebar -->
  </div>
</div>