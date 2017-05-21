<!DOCTYPE html>
<html>


<!-- Mirrored from preview.byaviators.com/template/realsite/admin-login.html by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 07 May 2017 11:39:07 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <link rel="stylesheet" type="text/css" href="../../../fonts.googleapis.com/css1e8b.css?family=Roboto:400,300,500,700&amp;subset=latin,latin-ext">
    <link rel="stylesheet" type="text/css" href="../../../fonts.googleapis.com/csse3e5.css?family=Montserrat:400,700">
    <link rel="stylesheet" type="text/css" href="assets/libraries/Font-Awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/libraries/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="assets/libraries/bootstrap-fileinput/css/fileinput.min.css">
    <link rel="stylesheet" type="text/css" href="assets/libraries/nvd3/nv.d3.min.css">
    <link rel="stylesheet" type="text/css" href="assets/libraries/OwlCarousel/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="assets/css/realsite-admin.css">

    <title>login</title>
</head>

<body class="">
    <div class="admin-landing-image-source"></div>
    <div class="admin-landing-image-cover"></div>

    <div class="admin-wrapper">
        <div class="admin-navigation">
    <div class="admin-navigation-inner">
        <nav>
            <ul class="menu">
                <li class="avatar">
                    <a href="#">
                        <img src="assets/img/tmp/agents/female.jpg" alt="">

                        <span class="avatar-content">
                            <span class="avatar-title">Lisa Peterson</span>
                            <span class="avatar-subtitle">Project Manager</span>
                        </span><!-- /.avatar-content -->
                    </a>
                </li>

                <li class="">
                    <a href="admin-dashboard.html"><strong><i class="fa fa-dashboard"></i></strong> <span>Dashboard</span></a>
                </li>

                <li class="">
                    <a href="admin-properties.html"><strong><i class="fa fa-building"></i></strong> <span>Properties</span></a>
                </li>

                <li class="">
                    <a href="admin-property-browser.html"><strong><i class="fa fa-th-list"></i></strong> <span>Property Browser</span></a>
                </li>

                <li class="">
                    <a href="admin-agencies.html"><strong><i class="fa fa-briefcase"></i></strong> <span>Agencies</span></a>
                </li>

                <li class="">
                    <a href="admin-gallery.html"><strong><i class="fa fa-file"></i></strong> <span>Media Files</span></a>
                </li>

                <li class="">
                    <a href="admin-map.html"><strong><i class="fa fa-globe"></i></strong> <span>Google Map</span></a>
                </li>

                <li class="">
                    <a href="admin-people.html"><strong><i class="fa fa-users"></i></strong> <span>People</span></a>
                </li>

                <li class="">
                    <a href="admin-property-add.html"><strong><i class="fa fa-pencil"></i></strong> <span>Add Property</span></a>
                </li>

                <li>
                    <a href="admin-login.html"><strong><i class="fa fa-sign-out"></i></strong> <span>Logout</span></a>
                </li>
            </ul>
        </nav>
        
        <div class="projects">
            <h2>Projects</h2>

            <ul>
                <li class="orange"><a href="#">Web Analytics</a></li>
                <li class="green"><a href="#">Custom Development</a></li>
                <li class="lime"><a href="#">Property Filtering</a></li>
                <li class="deep-orange"><a href="#">Social Marketing</a></li>
                <li class="yellow"><a href="#">Agents Management</a></li>
            </ul>
        </div><!-- /.projects -->
        <div class="layer"></div>
    </div><!-- /.admin-navigation-inner -->
</div><!-- /.admin-navigation -->

        <div class="admin-content">
                <div class="admin-content-image-text">
        <h1>Welcome in Realsite backend</h1>
        <h2>Please click on login to continue, no password required.</h2>
    </div><!-- /.admin-content-image-text -->

    <div class="admin-content-image-call-to-action">
        <i class="fa fa-long-arrow-left"></i>
        <br>
        <span>Click on "Login" to see what's here.</span>
    </div><!-- /.admin-content-image-call-to-action -->

    <div class="admin-content-inner">
        <div class="admin-content-header">
            <div class="admin-content-header-inner">
                <div class="container-fluid">
                    <div class="admin-content-header-logo">
                        <a href="index.html">
                            Realsite
                        </a>
                    </div><!-- /admin-content-header-logo -->

                    <div class="admin-content-header-menu">
                        <ul class="admin-content-header-menu-inner collapse">
                            <li><a href="#">Documentation</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>

                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".admin-content-header-menu-inner">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div><!-- /.admin-content-header-menu  -->
                </div><!-- /.container-fluid -->
            </div><!-- /.admin-content-header-inner -->
        </div><!-- /.admin-content-header -->

        <div class="admin-content-main">
            <div class="admin-content-main-inner">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="chart">
                                <svg></svg>
                            </div><!-- /#chart -->
                        </div>
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <h3 class="page-header">Recent Properties</h3>

                            <div class="row">
    <div class="col-sm-4 col-md-6 col-lg-4">
        <div class="property-preview">
            <div class="property-preview-image">
                <a href="#" class="property-preview-action">
                    <i class="fa fa-times"></i>
                </a><!-- /.property-preview-action -->

                <a href="#">
                    <img src="assets/img/tmp/medium/1.jpg" alt="">
                </a>
            </div><!-- /.property-preview-image -->

            <div class="property-preview-content">
                <h2><a href="#">Apartment</a></h2>
                <a href="#" class="property-preview-action-secondary">Edit</a>
            </div><!-- /.property-preview-content -->
        </div><!-- /.property-preview -->
    </div><!-- /.col-* -->

    <div class="col-sm-4 col-md-6 col-lg-4">
        <div class="property-preview">
            <div class="property-preview-image">
                <a href="#" class="property-preview-action">
                    <i class="fa fa-times"></i>
                </a><!-- /.property-preview-action -->

                <a href="#">
                    <img src="assets/img/tmp/medium/2.jpg" alt="">
                </a>
            </div><!-- /.property-preview-image -->

            <div class="property-preview-content">
                <h2><a href="#">Apartment</a></h2>
                <a href="#" class="property-preview-action-secondary">Edit</a>
            </div><!-- /.property-preview-content -->
        </div><!-- /.property-preview -->
    </div><!-- /.col-* -->

    <div class="col-sm-4 col-md-6 col-lg-4">
        <div class="property-preview">
            <div class="property-preview-image">
                <a href="#" class="property-preview-action">
                    <i class="fa fa-times"></i>
                </a><!-- /.property-preview-action -->

                <a href="#">
                    <img src="assets/img/tmp/medium/3.jpg" alt="">
                </a>
            </div><!-- /.property-preview-image -->

            <div class="property-preview-content">
                <h2><a href="#">Apartment</a></h2>
                <a href="#" class="property-preview-action-secondary">Edit</a>
            </div><!-- /.property-preview-content -->
        </div><!-- /.property-preview -->
    </div><!-- /.col-* -->

    <div class="col-sm-4 col-md-6 col-lg-4">
        <div class="property-preview">
            <div class="property-preview-image">
                <a href="#" class="property-preview-action">
                    <i class="fa fa-times"></i>
                </a><!-- /.property-preview-action -->

                <a href="#">
                    <img src="assets/img/tmp/medium/4.jpg" alt="">
                </a>
            </div><!-- /.property-preview-image -->

            <div class="property-preview-content">
                <h2><a href="#">Aparatment</a></h2>
                <a href="#" class="property-preview-action-secondary">Edit</a>
            </div><!-- /.property-preview-content -->
        </div><!-- /.property-preview -->
    </div><!-- /.col-* -->

    <div class="col-sm-4 col-md-6 col-lg-4">
        <div class="property-preview">
            <div class="property-preview-image">
                <a href="#" class="property-preview-action">
                    <i class="fa fa-times"></i>
                </a><!-- /.property-preview-action -->

                <a href="#">
                    <img src="assets/img/tmp/medium/5.jpg" alt="">
                </a>
            </div><!-- /.property-preview-image -->

            <div class="property-preview-content">
                <h2><a href="#">Apartment</a></h2>
                <a href="#" class="property-preview-action-secondary">Edit</a>
            </div><!-- /.property-preview-content -->
        </div><!-- /.property-preview -->
    </div><!-- /.col-* -->

    <div class="col-sm-4 col-md-6 col-lg-4">
        <div class="property-preview">
            <div class="property-preview-image">
                <a href="#" class="property-preview-action">
                    <i class="fa fa-times"></i>
                </a><!-- /.property-preview-action -->

                <a href="#">
                    <img src="assets/img/tmp/medium/6.jpg" alt="">
                </a>
            </div><!-- /.property-preview-image -->

            <div class="property-preview-content">
                <h2><a href="#">Apartment</a></h2>
                <a href="#" class="property-preview-action-secondary">Edit</a>
            </div><!-- /.property-preview-content -->
        </div><!-- /.property-preview -->
    </div><!-- /.col-* -->
</div><!-- /.row -->
                        </div><!-- /.col-sm-12 -->

                        <div class="col-sm-12 col-md-6">
                            <h3 class="page-header">Recent activity</h3>

<div class="activity">
    <ul>
        <li>
            <div class="icon red">
                <i class="fa fa-times"></i>
            </div><!-- /.icon -->

            <div class="content">
                Property <a href="#">#5432</a> has been published by <a href="#">admin</a>.
            </div><!-- /.content -->
        </li>

        <li>
            <div class="icon cyan">
                <i class="fa fa-pencil"></i>
            </div><!-- /.icon -->

            <div class="content">
                Admin edited property with ID <a href="#">#12345</a>.
            </div><!-- /.content -->
        </li>

        <li>
            <div class="icon teal">
                <i class="fa fa-bug"></i>
            </div><!-- /.icon -->

            <div class="content">
                System has reported 3 new bugs.
            </div><!-- /.content -->
        </li>

        <li>
            <div class="icon orange">
                <i class="fa fa-cc-mastercard"></i>
            </div><!-- /.icon -->

            <div class="content">
                Your debit card will expire in two weeks.
            </div><!-- /.content -->
        </li>

        <li>
            <div class="icon brown">
                <i class="fa fa-users"></i>
            </div><!-- /.icon -->

            <div class="content">
                8 users are avaiting registration confimations.
            </div><!-- /.content -->
        </li>

        <li>
            <div class="icon green">
                <i class="fa fa-paypal"></i>
            </div><!-- /.icon -->

            <div class="content">
                PayPal transaction has been completed. <a href="#">View more</a>
            </div><!-- /.content -->
        </li>

        <li>
            <div class="icon red">
                <i class="fa fa-times"></i>
            </div><!-- /.icon -->

            <div class="content">
                Property <a href="#">#5432</a> has been published by <a href="#">admin</a>.
            </div><!-- /.content -->
        </li>
    </ul>
</div><!-- /.activity -->
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div><!-- /.admin-content-main-inner -->
        </div><!-- /.admin-content-main -->

        <div class="admin-content-footer">
            <div class="admin-content-footer-inner">
                <div class="container-fluid">
                    <div class="admin-content-footer-left">
                        &copy; 2017 Realsite - Material Real Esteate Template. All rights reserved.
                    </div><!-- /.admin-content-footer-left -->

                    <div class="admin-content-footer-right">
                        Created by <a href="http://byaviators.com/">Aviators</a>
                    </div><!-- /.admin-content-footer-right -->
                </div><!-- /.container-fluid -->
            </div><!-- /.admin-content-footer-inner -->
        </div><!-- /.admin-content-footer -->
    </div><!-- /.admin-content-inner -->
        </div><!-- /.admin-content -->

        <div class="admin-sidebar-secondary">
            <div class="admin-sidebar-secondary-inner">
                <div class="admin-sidebar-secondary-inner-top">
                    <h1>Realsite Admin</h1>

                    <form method="post" action="http://preview.byaviators.com/template/realsite/admin-login.html?">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="E-mail">
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password">
                        </div><!-- /.form-group -->

                        <button type="submit" class="btn btn-xl pull-right">Login</button>
                    </form>
                </div><!-- /.admin-sidebar-secondary-inner-top -->

                <div class="admin-sidebar-secondary-inner-bottom">
                    <div class="admin-sidebar-footer">
                        <div class="admin-sidebar-info">
                            <strong>Additional Actions</strong>

                            <ul>
                                <li><a href="#">Register</a></li>
                                <li><a href="#">Lost password</a></li>
                                <li><a href="#">Support</a></li>
                            </ul>
                        </div><!-- /.admin-landing -->

                        <p>
                            &copy; 2017 Realsite - Material Real Estate Template. All rights reserved. Created by <a href="http://byaviators.com/">Aviators</a>
                        </p>
                    </div><!-- /.admin-landing-content-footer -->
                </div><!-- /.admin-sidebar-secondary-inner-bottom -->
            </div><!-- /.admin-sidebar-secondary-inner -->
        </div><!-- /.admin-sidebar-secondary -->
    </div><!-- /.admin-landing-wrapper -->

    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/libraries/jquery-transit/jquery.transit.js"></script>

    <script type="text/javascript" src="assets/libraries/bootstrap/assets/javascripts/bootstrap/transition.js"></script>
    <script type="text/javascript" src="assets/libraries/bootstrap/assets/javascripts/bootstrap/dropdown.js"></script>
    <script type="text/javascript" src="assets/libraries/bootstrap/assets/javascripts/bootstrap/collapse.js"></script>
    <script type="text/javascript" src="assets/libraries/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="assets/libraries/bootstrap-fileinput/js/fileinput.min.js"></script>

    <script type="text/javascript" src="assets/libraries/autosize/jquery.autosize.js"></script>
    <script type="text/javascript" src="assets/libraries/isotope/dist/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="assets/libraries/OwlCarousel/owl-carousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="assets/libraries/jquery.scrollTo/jquery.scrollTo.min.js"></script>

    <script src="http://maps.googleapis.com/maps/api/js?libraries=weather,geometry,visualization,places,drawing&amp;sensor=false" type="text/javascript"></script>
    <script type="text/javascript" src="assets/libraries/jquery-google-map/infobox.js"></script>
    <script type="text/javascript" src="assets/libraries/jquery-google-map/markerclusterer.js"></script>
    <script type="text/javascript" src="assets/libraries/jquery-google-map/jquery-google-map.js"></script>

    <script type="text/javascript" src="assets/libraries/nvd3/lib/d3.v3.js"></script>
    <script type="text/javascript" src="assets/libraries/nvd3/nv.d3.min.js"></script>
    <script type="text/javascript" src="assets/libraries/nvd3/examples/stream_layers.js"></script>

    <script type="text/javascript" src="assets/js/realsite-admin.js"></script>
    <script type="text/javascript" src="assets/js/map.js"></script>

</body>

<!-- Mirrored from preview.byaviators.com/template/realsite/admin-login.html by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 07 May 2017 11:41:17 GMT -->
</html>
