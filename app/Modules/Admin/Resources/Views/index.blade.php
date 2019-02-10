
<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>AbsoluteAdmin - A Responsive Bootstrap 3 Admin Dashboard Template</title>
    <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
    <meta name="description" content="AbsoluteAdmin - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="AbsoluteAdmin">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @stack('styles')

    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>

    <!-- FullCalendar Plugin CSS -->
    <link href="{{ asset('vendor/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="{{ asset('assets/skin/default_skin/css/theme.css') }}" rel="stylesheet" type="text/css">

    <!-- Admin Forms CSS -->
    <link href="{{ asset('assets/admin-tools/admin-forms/css/admin-forms.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Favicon -->
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="shortcut icon">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>

<body class="dashboard-page">

<!-------------------------------------------------------------+
  <body> Helper Classes:
---------------------------------------------------------------+
  '.sb-l-o' - Sets Left Sidebar to "open"
  '.sb-l-m' - Sets Left Sidebar to "minified"
  '.sb-l-c' - Sets Left Sidebar to "closed"

  '.sb-r-o' - Sets Right Sidebar to "open"
  '.sb-r-c' - Sets Right Sidebar to "closed"
---------------------------------------------------------------+
 Example: <body class="example-page sb-l-o sb-r-c">
 Results: Sidebar left Open, Sidebar right Closed
--------------------------------------------------------------->

<!-- Start: Theme Preview Pane -->
<div id="skin-toolbox">
    <div class="panel">
        <div class="panel-heading">
        <span class="panel-icon">
          <i class="fa fa-gear text-primary"></i>
        </span>
            <span class="panel-title"> Theme Options</span>
        </div>
        <div class="panel-body pn">
            <ul class="nav nav-list nav-list-sm pl15 pt10" role="tablist">
                <li class="active">
                    <a href="#toolbox-header" role="tab" data-toggle="tab">Navbar</a>
                </li>
                <li>
                    <a href="#toolbox-sidebar" role="tab" data-toggle="tab">Sidebar</a>
                </li>
                <li>
                    <a href="#toolbox-settings" role="tab" data-toggle="tab">Misc</a>
                </li>
            </ul>
            <div class="tab-content p20 ptn pb15">
                <div role="tabpanel" class="tab-pane active" id="toolbox-header">
                    <form id="toolbox-header-skin">
                        <h4 class="mv20">Header Skins</h4>
                        <div class="skin-toolbox-swatches">
                            <div class="checkbox-custom checkbox-disabled fill mb5">
                                <input type="radio" name="headerSkin" id="headerSkin8" checked value="">
                                <label for="headerSkin8">Light</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-primary mb5">
                                <input type="radio" name="headerSkin" id="headerSkin1" value="bg-primary">
                                <label for="headerSkin1">Primary</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-info mb5">
                                <input type="radio" name="headerSkin" id="headerSkin3" value="bg-info">
                                <label for="headerSkin3">Info</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-warning mb5">
                                <input type="radio" name="headerSkin" id="headerSkin4" value="bg-warning">
                                <label for="headerSkin4">Warning</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-danger mb5">
                                <input type="radio" name="headerSkin" id="headerSkin5" value="bg-danger">
                                <label for="headerSkin5">Danger</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-alert mb5">
                                <input type="radio" name="headerSkin" id="headerSkin6" value="bg-alert">
                                <label for="headerSkin6">Alert</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-system mb5">
                                <input type="radio" name="headerSkin" id="headerSkin7" value="bg-system">
                                <label for="headerSkin7">System</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-success mb5">
                                <input type="radio" name="headerSkin" id="headerSkin2" value="bg-success">
                                <label for="headerSkin2">Success</label>
                            </div>
                            <div class="checkbox-custom fill mb5">
                                <input type="radio" name="headerSkin" id="headerSkin9" value="bg-dark">
                                <label for="headerSkin9">Dark</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="toolbox-sidebar">
                    <form id="toolbox-sidebar-skin">
                        <h4 class="mv20">Sidebar Skins</h4>
                        <div class="skin-toolbox-swatches">
                            <div class="checkbox-custom fill mb5">
                                <input type="radio" name="sidebarSkin" checked id="sidebarSkin3" value="">
                                <label for="sidebarSkin3">Dark</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-disabled mb5">
                                <input type="radio" name="sidebarSkin" id="sidebarSkin1" value="sidebar-light">
                                <label for="sidebarSkin1">Light</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-light mb5">
                                <input type="radio" name="sidebarSkin" id="sidebarSkin2" value="sidebar-light light">
                                <label for="sidebarSkin2">Lighter</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="toolbox-settings">
                    <form id="toolbox-settings-misc">
                        <h4 class="mv20 mtn">Layout Options</h4>
                        <div class="form-group">
                            <div class="checkbox-custom fill mb5">
                                <input type="checkbox" checked="" id="header-option">
                                <label for="header-option">Fixed Header</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom fill mb5">
                                <input type="checkbox" checked="" id="sidebar-option">
                                <label for="sidebar-option">Fixed Sidebar</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom fill mb5">
                                <input type="checkbox" id="breadcrumb-option">
                                <label for="breadcrumb-option">Fixed Breadcrumbs</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom fill mb5">
                                <input type="checkbox" id="breadcrumb-hidden">
                                <label for="breadcrumb-hidden">Hide Breadcrumbs</label>
                            </div>
                        </div>
                        <h4 class="mv20">Layout Options</h4>
                        <div class="form-group">
                            <div class="radio-custom mb5">
                                <input type="radio" id="fullwidth-option" checked name="layout-option">
                                <label for="fullwidth-option">Fullwidth Layout</label>
                            </div>
                        </div>
                        <div class="form-group mb20">
                            <div class="radio-custom radio-disabled mb5">
                                <input type="radio" id="boxed-option" name="layout-option" disabled>
                                <label for="boxed-option">Boxed Layout
                                    <b class="text-muted">(Coming Soon)</b>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="form-group mn br-t p15">
                <a href="#" id="clearLocalStorage" class="btn btn-primary btn-block pb10 pt10">Clear LocalStorage</a>
            </div>
        </div>
    </div>
</div>
<!-- End: Theme Preview Pane -->

<!-- Start: Main -->
<div id="main">



    <!-- Start: Header -->
    @include('admin::component.header')
    <!-- End: Header -->



    <!-- Start: Sidebar -->
    @include('admin::component.sidebar_left')
    <!-- End: Sidebar Left -->

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

        <!-- Start: Topbar-Dropdown -->
        @include('admin::component.topbar_dropdown')
        <!-- End: Topbar-Dropdown -->

        <!-- Start: Topbar -->
        @include('admin::component.topbar')
        <!-- End: Topbar -->

        <!-- Begin: Content -->
        @include('admin::content')
        <!-- End: Content -->

        <!-- Begin: Page Footer -->
        @include('admin::component.footer')
        <!-- End: Page Footer -->

    </section>
    <!-- End: Content-Wrapper -->

    <!-- Start: Right Sidebar -->
    @include('admin::component.sidebar_right')
    <!-- End: Right Sidebar -->

</div>
<!-- End: Main -->

<!-- BEGIN: PAGE SCRIPTS -->
@stack('scripts')

<!-- jQuery -->
<script src="{{ asset('vendor/jquery/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

<!-- HighCharts Plugin -->
<script src="{{ asset('vendor/plugins/highcharts/highcharts.js') }}"></script>

<!-- JvectorMap Plugin + US Map (more maps in plugin/assets folder) -->
<script src="{{ asset('vendor/plugins/jvectormap/jquery.jvectormap.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js') }}"></script>

<!-- FullCalendar Plugin + moment Dependency -->
<script src="{{ asset('vendor/plugins/fullcalendar/lib/moment.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/fullcalendar/fullcalendar.min.js') }}"></script>

<!-- Theme Javascript -->
<script src="{{ asset('assets/js/utility/utility.js') }}"></script>
<script src="{{ asset('assets/js/demo/demo.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- Widget Javascript -->
<script src="{{ asset('assets/js/demo/widgets.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {

        "use strict";

        // Init Demo JS
        Demo.init();


        // Init Theme Core
        Core.init();


        // Init Widget Demo JS
        // demoHighCharts.init();

        // Because we are using Admin Panels we use the OnFinish
        // callback to activate the demoWidgets. It's smoother if
        // we let the panels be moved and organized before
        // filling them with content from various plugins

        // Init plugins used on this page
        // HighCharts, JvectorMap, Admin Panels

        // Init Admin Panels on widgets inside the ".admin-panels" container
        $('.admin-panels').adminpanel({
            grid: '.admin-grid',
            draggable: true,
            preserveGrid: true,
            // mobile: true,
            onStart: function() {
                // Do something before AdminPanels runs
            },
            onFinish: function() {
                $('.admin-panels').addClass('animated fadeIn').removeClass('fade-onload');

                // Init the rest of the plugins now that the panels
                // have had a chance to be moved and organized.
                // It's less taxing to organize empty panels
                demoHighCharts.init();
                runVectorMaps(); // function below
            },
            onSave: function() {
                $(window).trigger('resize');
            }
        });


        // Init plugins for ".calendar-widget"
        // plugins: FullCalendar
        //
        $('#calendar-widget').fullCalendar({
            // contentHeight: 397,
            editable: true,
            events: [{
                title: 'Sony Meeting',
                start: '2015-05-1',
                end: '2015-05-3',
                className: 'fc-event-success',
            }, {
                title: 'Conference',
                start: '2015-05-11',
                end: '2015-05-13',
                className: 'fc-event-warning'
            }, {
                title: 'Lunch Testing',
                start: '2015-05-21',
                end: '2015-05-23',
                className: 'fc-event-primary'
            },
            ],
            eventRender: function(event, element) {
                // create event tooltip using bootstrap tooltips
                $(element).attr("data-original-title", event.title);
                $(element).tooltip({
                    container: 'body',
                    delay: {
                        "show": 100,
                        "hide": 200
                    }
                });
                // create a tooltip auto close timer
                $(element).on('show.bs.tooltip', function() {
                    var autoClose = setTimeout(function() {
                        $('.tooltip').fadeOut();
                    }, 3500);
                });
            }
        });


        // Init plugins for ".task-widget"
        // plugins: Custom Functions + jQuery Sortable
        //
        var taskWidget = $('div.task-widget');
        var taskItems = taskWidget.find('li.task-item');
        var currentItems = taskWidget.find('ul.task-current');
        var completedItems = taskWidget.find('ul.task-completed');

        // Init jQuery Sortable on Task Widget
        taskWidget.sortable({
            items: taskItems, // only init sortable on list items (not labels)
            handle: '.task-menu',
            axis: 'y',
            connectWith: ".task-list",
            update: function( event, ui ) {
                var Item = ui.item;
                var ParentList = Item.parent();

                // If item is already checked move it to "current items list"
                if (ParentList.hasClass('task-current')) {
                    Item.removeClass('item-checked').find('input[type="checkbox"]').prop('checked', false);
                }
                if (ParentList.hasClass('task-completed')) {
                    Item.addClass('item-checked').find('input[type="checkbox"]').prop('checked', true);
                }

            }
        });

        // Custom Functions to handle/assign list filter behavior
        taskItems.on('click', function(e) {
            e.preventDefault();
            var This = $(this);
            var Target = $(e.target);

            if (Target.is('.task-menu') && Target.parents('.task-completed').length) {
                This.remove();
                return;
            }

            if (Target.parents('.task-handle').length) {
                // If item is already checked move it to "current items list"
                if (This.hasClass('item-checked')) {
                    This.removeClass('item-checked').find('input[type="checkbox"]').prop('checked', false);
                }
                // Otherwise move it to the "completed items list"
                else {
                    This.addClass('item-checked').find('input[type="checkbox"]').prop('checked', true);
                }
            }

        });


        var highColors = [bgSystem, bgSuccess, bgWarning, bgPrimary];

        // Chart data
        var seriesData = [{
            name: 'Phones',
            data: [5.0, 9, 17, 22, 19, 11.5, 5.2, 9.5, 11.3, 15.3, 19.9, 24.6]
        }, {
            name: 'Notebooks',
            data: [2.9, 3.2, 4.7, 5.5, 8.9, 12.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }, {
            name: 'Desktops',
            data: [15, 19, 22.7, 29.3, 22.0, 17.0, 23.8, 19.1, 22.1, 14.1, 11.6, 7.5]
        }, {
            name: 'Music Players',
            data: [11, 6, 5, 15, 17.0, 22.0, 30.8, 24.1, 14.1, 11.1, 9.6, 6.5]
        }];

        var ecomChart = $('#ecommerce_chart1');
        if (ecomChart.length) {
            ecomChart.highcharts({
                credits: false,
                colors: highColors,
                chart: {
                    backgroundColor: 'transparent',
                    className: '',
                    type: 'line',
                    zoomType: 'x',
                    panning: true,
                    panKey: 'shift',
                    marginTop: 45,
                    marginRight: 1,
                },
                title: {
                    text: null
                },
                xAxis: {
                    gridLineColor: '#EEE',
                    lineColor: '#EEE',
                    tickColor: '#EEE',
                    categories: ['Jan', 'Feb', 'Mar', 'Apr',
                        'May', 'Jun', 'Jul', 'Aug',
                        'Sep', 'Oct', 'Nov', 'Dec'
                    ]
                },
                yAxis: {
                    min: 0,
                    tickInterval: 5,
                    gridLineColor: '#EEE',
                    title: {
                        text: null,
                    }
                },
                plotOptions: {
                    spline: {
                        lineWidth: 3,
                    },
                    area: {
                        fillOpacity: 0.2
                    }
                },
                legend: {
                    enabled: true,
                    floating: false,
                    align: 'right',
                    verticalAlign: 'top',
                    x: -15
                },
                series: seriesData
            });
        }

        // Widget VectorMap
        function runVectorMaps() {

            // Jvector Map Plugin
            var runJvectorMap = function() {
                // Data set
                var mapData = [900, 700, 350, 500];
                // Init Jvector Map
                $('#WidgetMap').vectorMap({
                    map: 'us_lcc_en',
                    //regionsSelectable: true,
                    backgroundColor: 'transparent',
                    series: {
                        markers: [{
                            attribute: 'r',
                            scale: [3, 7],
                            values: mapData
                        }]
                    },
                    regionStyle: {
                        initial: {
                            fill: '#E8E8E8'
                        },
                        hover: {
                            "fill-opacity": 0.3
                        }
                    },
                    markers: [{
                        latLng: [37.78, -122.41],
                        name: 'San Francisco,CA'
                    }, {
                        latLng: [36.73, -103.98],
                        name: 'Texas,TX'
                    }, {
                        latLng: [38.62, -90.19],
                        name: 'St. Louis,MO'
                    }, {
                        latLng: [40.67, -73.94],
                        name: 'New York City,NY'
                    }],
                    markerStyle: {
                        initial: {
                            fill: '#a288d5',
                            stroke: '#b49ae0',
                            "fill-opacity": 1,
                            "stroke-width": 10,
                            "stroke-opacity": 0.3,
                            r: 3
                        },
                        hover: {
                            stroke: 'black',
                            "stroke-width": 2
                        },
                        selected: {
                            fill: 'blue'
                        },
                        selectedHover: {}
                    },
                });
                // Manual code to alter the Vector map plugin to
                // allow for individual coloring of countries
                var states = ['US-CA', 'US-TX', 'US-MO',
                    'US-NY'
                ];
                var colors = [bgInfo, bgPrimaryLr, bgSuccessLr, bgWarningLr];
                var colors2 = [bgInfo, bgPrimary, bgSuccess, bgWarning];
                $.each(states, function(i, e) {
                    $("#WidgetMap path[data-code=" + e + "]").css({
                        fill: colors[i]
                    });
                });
                $('#WidgetMap').find('.jvectormap-marker')
                    .each(function(i, e) {
                        $(e).css({
                            fill: colors2[i],
                            stroke: colors2[i]
                        });
                    });
            }

            if ($('#WidgetMap').length) {
                runJvectorMap();
            }
        }

    });
</script>
<!-- END: PAGE SCRIPTS -->

</body>

</html>
