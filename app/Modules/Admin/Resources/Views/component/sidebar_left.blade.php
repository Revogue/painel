<!-----------------------------------------------------------------+
      "#sidebar_left" Helper Classes:
   -------------------------------------------------------------------+
      * Positioning Classes:
       '.affix' - Sets Sidebar Left to the fixed position

      * Available Skin Classes:
        .sidebar-dark (default no class needed)
        .sidebar-light
        .sidebar-light.light
   -------------------------------------------------------------------+
      Example: <aside id="sidebar_left" class="affix sidebar-light">
      Results: Fixed Left Sidebar with light/white background
   ------------------------------------------------------------------->

<aside id="sidebar_left" class="nano nano-light affix">

    <!-- Start: Sidebar Left Content -->
    <div class="sidebar-left-content nano-content">

        <!-- Start: Sidebar Header -->
        <header class="sidebar-header">

            <!-- Sidebar Widget - Author -->
            <div class="sidebar-widget author-widget">
                <div class="media">
                    <a class="media-left" href="#">
                        <img src="/assets/img/avatars/3.jpg" class="img-responsive">
                    </a>
                    <div class="media-body">
                        <div class="media-links">
                            <a href="#" class="sidebar-menu-toggle">User Menu -</a> <a href="pages_login(alt).html">Logout</a>
                        </div>
                        <div class="media-author">Michael Richards</div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Widget - Menu (slidedown) -->
            <div class="sidebar-widget menu-widget">
                <div class="row text-center mbn">
                    <div class="col-xs-4">
                        <a href="dashboard.html" class="text-primary" data-toggle="tooltip" data-placement="top" title="Dashboard">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_messages.html" class="text-info" data-toggle="tooltip" data-placement="top" title="Messages">
                            <span class="glyphicon glyphicon-inbox"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_profile.html" class="text-alert" data-toggle="tooltip" data-placement="top" title="Tasks">
                            <span class="glyphicon glyphicon-bell"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_timeline.html" class="text-system" data-toggle="tooltip" data-placement="top" title="Activity">
                            <span class="fa fa-desktop"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_profile.html" class="text-danger" data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="fa fa-gears"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_gallery.html" class="text-warning" data-toggle="tooltip" data-placement="top" title="Cron Jobs">
                            <span class="fa fa-flask"></span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sidebar Widget - Search (hidden) -->
            <div class="sidebar-widget search-widget hidden">
                <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-search"></i>
              </span>
                    <input type="text" id="sidebar-search" class="form-control" placeholder="Search...">
                </div>
            </div>

        </header>
        <!-- End: Sidebar Header -->

        <!-- Start: Sidebar Menu -->

        {!! $bulmaMenu->render('absoluteAdmin') !!}


        <!-- End: Sidebar Menu -->

        <!-- Start: Sidebar Collapse Button -->
        <div class="sidebar-toggle-mini">
            <a href="#">
                <span class="fa fa-sign-out"></span>
            </a>
        </div>
        <!-- End: Sidebar Collapse Button -->

    </div>
    <!-- End: Sidebar Left Content -->

</aside>
