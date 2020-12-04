<!doctype html>
<html lang="en" class="no-focus">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Codebase - Bootstrap 4 Admin Template &amp; UI Framework</title>

    <meta name="description"
          content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description"
          content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{asset('assets/media/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('assets/media/favicons/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/media/favicons/apple-touch-icon-180x180.png')}}">
    <!-- END Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Stylesheets -->
    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{asset('assets/css/codebase.min.css')}}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
</head>
<body>
<!-- Page Container -->
<!--
    Available classes for #page-container:

GENERIC

    'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Codebase() -> uiHandleTheme())

SIDEBAR & SIDE OVERLAY

    'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
    'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
    'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
    'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
    'sidebar-inverse'                           Dark themed sidebar

    'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
    'side-overlay-o'                            Visible Side Overlay by default

    'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

    'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

HEADER

    ''                                          Static Header if no class is added
    'page-header-fixed'                         Fixed Header

HEADER STYLE

    ''                                          Classic Header style if no class is added
    'page-header-modern'                        Modern Header style
    'page-header-inverse'                       Dark themed Header (works only with classic Header style)
    'page-header-glass'                         Light themed Header with transparency by default
                                                (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
    'page-header-glass page-header-inverse'     Dark themed Header with transparency by default
                                                (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

MAIN CONTENT LAYOUT

    ''                                          Full width Main Content if no class is added
    'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
    'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
-->
<div id="page-container" class="sidebar-o side-scroll page-header-modern main-content-boxed enable-page-overlay sidebar-inverse">
    <!-- Side Overlay-->
    <aside id="side-overlay">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow">
            <div class="content-header-section align-parent">
                <!-- Close Side Overlay -->
                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout"
                        data-action="side_overlay_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Side Overlay -->

                <!-- User Info -->
                <div class="content-header-item">
                    <a class="img-link mr-5" href="">
                        <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar0.jpg" alt="">
                    </a>
                    <a class="align-middle link-effect text-primary-dark font-w600" href="">Admin</a>
                </div>
                <!-- END User Info -->
            </div>
        </div>
        <!-- END Side Header -->

        <!-- Side Content -->
        <div class="content-side">
            <!-- Search -->
            <div class="block pull-t pull-r-l">
                <div class="block-content block-content-full block-content-sm bg-body-light">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" id="side-overlay-search" name="side-overlay-search"
                                   placeholder="Search..">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary px-10">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Search -->

            <!-- Mini Stats -->
            <div class="block pull-r-l">
                <div class="block-content block-content-full block-content-sm bg-body-light">
                    <div class="row">
                        <div class="col-4">
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Stat</div>
                            <div class="font-size-h4">100</div>
                        </div>
                        <div class="col-4">
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Stat</div>
                            <div class="font-size-h4">200</div>
                        </div>
                        <div class="col-4">
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Stat</div>
                            <div class="font-size-h4">300</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Mini Stats -->

            <!-- Block -->
            <div class="block pull-r-l">
                <div class="block-header bg-body-light">
                    <h3 class="block-title">Title</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <p>Content...</p>
                </div>
            </div>
            <!-- END Block -->
        </div>
        <!-- END Side Content -->
    </aside>
    <!-- END Side Overlay -->

@include('layouts._partials._sidebar')

<!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div class="content-header-section">
                <!-- Toggle Sidebar -->
                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout"
                        data-action="sidebar_toggle">
                    <i class="fa fa-navicon"></i>
                </button>
                <!-- END Toggle Sidebar -->

                <!-- Open Search Section -->
                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout"
                        data-action="header_search_on">
                    <i class="fa fa-search"></i>
                </button>
                <!-- END Open Search Section -->

                <!-- Color Themes (used just for demonstration) -->
                <!-- Themes functionality initialized in Codebase() -> uiHandleTheme() -->
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-circle btn-dual-secondary" id="page-header-themes-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-paint-brush"></i>
                    </button>
                    <div class="dropdown-menu min-width-150" aria-labelledby="page-header-themes-dropdown">
                        <h6 class="dropdown-header text-center">Color Themes</h6>
                        <div class="row no-gutters text-center mb-5">
                            <div class="col-4 mb-5">
                                <a class="text-default" data-toggle="theme" data-theme="default"
                                   href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                            <div class="col-4 mb-5">
                                <a class="text-elegance" data-toggle="theme"
                                   data-theme="assets/css/themes/elegance.min.css" href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                            <div class="col-4 mb-5">
                                <a class="text-pulse" data-toggle="theme" data-theme="assets/css/themes/pulse.min.css"
                                   href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                            <div class="col-4 mb-5">
                                <a class="text-flat" data-toggle="theme" data-theme="assets/css/themes/flat.min.css"
                                   href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                            <div class="col-4 mb-5">
                                <a class="text-corporate" data-toggle="theme"
                                   data-theme="assets/css/themes/corporate.min.css" href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                            <div class="col-4 mb-5">
                                <a class="text-earth" data-toggle="theme" data-theme="assets/css/themes/earth.min.css"
                                   href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout"
                                data-action="sidebar_style_inverse_toggle">Sidebar Style
                        </button>
                    </div>
                </div>
                <!-- END Color Themes -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div class="content-header-section">
                <!-- User Dropdown -->
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        J. Smith<i class="fa fa-angle-down ml-5"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right min-width-150"
                         aria-labelledby="page-header-user-dropdown">
                        <a class="dropdown-item" href="">
                            <i class="si si-user mr-5"></i> Profile
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="">
                            <span><i class="si si-envelope-open mr-5"></i> Inbox</span>
                            <span class="badge badge-primary">3</span>
                        </a>
                        <a class="dropdown-item" href="">
                            <i class="si si-note mr-5"></i> Invoices
                        </a>
                        <div class="dropdown-divider"></div>

                        <!-- Toggle Side Overlay -->
                        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                        <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout"
                           data-action="side_overlay_toggle">
                            <i class="si si-wrench mr-5"></i> Settings
                        </a>
                        <!-- END Side Overlay -->

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="">
                            <i class="si si-logout mr-5"></i> Sign Out
                        </a>
                    </div>
                </div>
                <!-- END User Dropdown -->

                <!-- Toggle Side Overlay -->
                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout"
                        data-action="side_overlay_toggle">
                    <i class="fa fa-tasks"></i>
                </button>
                <!-- END Toggle Side Overlay -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header">
            <div class="content-header content-header-fullrow">
                <form>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <!-- Close Search Section -->
                            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                            <button type="button" class="btn btn-secondary px-15" data-toggle="layout"
                                    data-action="header_search_off">
                                <i class="fa fa-times"></i>
                            </button>
                            <!-- END Close Search Section -->
                        </div>
                        <input type="text" class="form-control" placeholder="Search or hit ESC.."
                               id="page-header-search-input" name="page-header-search-input">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary px-15">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Header Search -->

        <!-- Header Loader -->
        <div id="page-header-loader" class="overlay-header bg-primary">
            <div class="content-header content-header-fullrow text-center">
                <div class="content-header-item">
                    <i class="fa fa-sun-o fa-spin text-white"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            @yield('content')
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="opacity-0">
        <div class="content py-20 font-size-sm clearfix">
            <div class="float-right">
                Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600"
                                                                          href="https://1.envato.market/ydb"
                                                                          target="_blank">pixelcave</a>
            </div>
            <div class="float-left">
                <a class="font-w600" href="https://1.envato.market/95j" target="_blank">Codebase</a> &copy; <span
                    class="js-year-copy"></span>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<!-- Codebase JS -->
<script src="{{asset('assets/js/codebase.core.min.js')}}"></script>
<script src="{{asset('assets/js/codebase.app.min.js')}}"></script>
@yield('vendor-script')
@yield('script')
@stack('js')

</body>
</html>