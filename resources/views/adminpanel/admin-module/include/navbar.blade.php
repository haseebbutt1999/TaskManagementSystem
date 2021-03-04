{{--<div id="page-container" class="sidebar-o sidebar-dark side-overlay-hover enable-page-overlay side-scroll page-header-fixed">--}}

{{--<!-- Header -->--}}
{{--<header id="page-header">--}}
{{--    <!-- Header Content -->--}}
{{--    <div class="content-header">--}}
{{--        <!-- Left Section -->--}}
{{--        <div class="d-flex align-items-center">--}}
{{--            <!-- Toggle Sidebar -->--}}
{{--            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->--}}
{{--            <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">--}}
{{--                <i class="fa fa-fw fa-bars"></i>--}}
{{--            </button>--}}
{{--            <!-- END Toggle Sidebar -->--}}

{{--            <!-- Toggle Mini Sidebar -->--}}
{{--            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->--}}
{{--            <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">--}}
{{--                <i class="fa fa-fw fa-ellipsis-v"></i>--}}
{{--            </button>--}}
{{--            <!-- END Toggle Mini Sidebar -->--}}

{{--            <!-- Apps Modal -->--}}
{{--            <!-- Opens the Apps modal found at the bottom of the page, after footer’s markup -->--}}
{{--            <button type="button" class="btn btn-sm btn-dual mr-2" data-toggle="modal" data-target="#one-modal-apps">--}}
{{--                <i class="si si-grid"></i>--}}
{{--            </button>--}}
{{--            <!-- END Apps Modal -->--}}

{{--            <!-- Open Search Section (visible on smaller screens) -->--}}
{{--            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->--}}
{{--            <button type="button" class="btn btn-sm btn-dual d-sm-none" data-toggle="layout" data-action="header_search_on">--}}
{{--                <i class="si si-magnifier"></i>--}}
{{--            </button>--}}
{{--            <!-- END Open Search Section -->--}}

{{--            <!-- Search Form (visible on larger screens) -->--}}
{{--            <form class="d-none d-sm-inline-block" action="be_pages_generic_search.html" method="POST">--}}
{{--                <div class="input-group input-group-sm">--}}
{{--                    <input type="text" class="form-control form-control-alt" placeholder="Search.." id="page-header-search-input2" name="page-header-search-input2">--}}
{{--                    <div class="input-group-append">--}}
{{--                                    <span class="input-group-text bg-body border-0">--}}
{{--                                        <i class="si si-magnifier"></i>--}}
{{--                                    </span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--            <!-- END Search Form -->--}}
{{--        </div>--}}
{{--        <!-- END Left Section -->--}}

{{--        <!-- Right Section -->--}}
{{--        <div class="d-flex align-items-center">--}}
{{--            <!-- User Dropdown -->--}}
{{--            <div class="dropdown d-inline-block ml-2">--}}
{{--                <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                    <img class="rounded" src="{{asset('oneui_assets/media/avatars/avatar10.jpg')}}" alt="Header Avatar" style="width: 18px;">--}}
{{--                    <span class="d-none d-sm-inline-block ml-1">Adam</span>--}}
{{--                    <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>--}}
{{--                </button>--}}
{{--                <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">--}}
{{--                    <div class="p-3 text-center bg-primary">--}}
{{--                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{asset('oneui_assets/assets/media/avatars/avatar10.jpg')}}" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="p-2">--}}
{{--                        <h5 class="dropdown-header text-uppercase">User Options</h5>--}}
{{--                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_inbox.html">--}}
{{--                            <span>Inbox</span>--}}
{{--                            <span>--}}
{{--                                            <span class="badge badge-pill badge-primary">3</span>--}}
{{--                                            <i class="si si-envelope-open ml-1"></i>--}}
{{--                                        </span>--}}
{{--                        </a>--}}
{{--                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_profile.html">--}}
{{--                            <span>Profile</span>--}}
{{--                            <span>--}}
{{--                                            <span class="badge badge-pill badge-success">1</span>--}}
{{--                                            <i class="si si-user ml-1"></i>--}}
{{--                                        </span>--}}
{{--                        </a>--}}
{{--                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">--}}
{{--                            <span>Settings</span>--}}
{{--                            <i class="si si-settings"></i>--}}
{{--                        </a>--}}
{{--                        <div role="separator" class="dropdown-divider"></div>--}}
{{--                        <h5 class="dropdown-header text-uppercase">Actions</h5>--}}
{{--                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="op_auth_lock.html">--}}
{{--                            <span>Lock Account</span>--}}
{{--                            <i class="si si-lock ml-1"></i>--}}
{{--                        </a>--}}
{{--                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{route('logout')}}">--}}
{{--                            <span>Log Out</span>--}}
{{--                            <i class="si si-logout ml-1"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- END User Dropdown -->--}}

{{--            <!-- Notifications Dropdown -->--}}
{{--            <div class="dropdown d-inline-block ml-2">--}}
{{--                <button type="button" class="btn btn-sm btn-dual" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                    <i class="si si-bell"></i>--}}
{{--                    <span class="badge badge-primary badge-pill">6</span>--}}
{{--                </button>--}}
{{--                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-notifications-dropdown">--}}
{{--                    <div class="p-2 bg-primary text-center">--}}
{{--                        <h5 class="dropdown-header text-uppercase text-white">Notifications</h5>--}}
{{--                    </div>--}}
{{--                    <ul class="nav-items mb-0">--}}
{{--                        <li>--}}
{{--                            <a class="text-dark media py-2" href="javascript:void(0)">--}}
{{--                                <div class="mr-2 ml-3">--}}
{{--                                    <i class="fa fa-fw fa-check-circle text-success"></i>--}}
{{--                                </div>--}}
{{--                                <div class="media-body pr-2">--}}
{{--                                    <div class="font-w600">You have a new follower</div>--}}
{{--                                    <small class="text-muted">15 min ago</small>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a class="text-dark media py-2" href="javascript:void(0)">--}}
{{--                                <div class="mr-2 ml-3">--}}
{{--                                    <i class="fa fa-fw fa-plus-circle text-info"></i>--}}
{{--                                </div>--}}
{{--                                <div class="media-body pr-2">--}}
{{--                                    <div class="font-w600">1 new sale, keep it up</div>--}}
{{--                                    <small class="text-muted">22 min ago</small>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a class="text-dark media py-2" href="javascript:void(0)">--}}
{{--                                <div class="mr-2 ml-3">--}}
{{--                                    <i class="fa fa-fw fa-times-circle text-danger"></i>--}}
{{--                                </div>--}}
{{--                                <div class="media-body pr-2">--}}
{{--                                    <div class="font-w600">Update failed, restart server</div>--}}
{{--                                    <small class="text-muted">26 min ago</small>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a class="text-dark media py-2" href="javascript:void(0)">--}}
{{--                                <div class="mr-2 ml-3">--}}
{{--                                    <i class="fa fa-fw fa-plus-circle text-info"></i>--}}
{{--                                </div>--}}
{{--                                <div class="media-body pr-2">--}}
{{--                                    <div class="font-w600">2 new sales, keep it up</div>--}}
{{--                                    <small class="text-muted">33 min ago</small>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a class="text-dark media py-2" href="javascript:void(0)">--}}
{{--                                <div class="mr-2 ml-3">--}}
{{--                                    <i class="fa fa-fw fa-user-plus text-success"></i>--}}
{{--                                </div>--}}
{{--                                <div class="media-body pr-2">--}}
{{--                                    <div class="font-w600">You have a new subscriber</div>--}}
{{--                                    <small class="text-muted">41 min ago</small>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a class="text-dark media py-2" href="javascript:void(0)">--}}
{{--                                <div class="mr-2 ml-3">--}}
{{--                                    <i class="fa fa-fw fa-check-circle text-success"></i>--}}
{{--                                </div>--}}
{{--                                <div class="media-body pr-2">--}}
{{--                                    <div class="font-w600">You have a new follower</div>--}}
{{--                                    <small class="text-muted">42 min ago</small>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <div class="p-2 border-top">--}}
{{--                        <a class="btn btn-sm btn-light btn-block text-center" href="javascript:void(0)">--}}
{{--                            <i class="fa fa-fw fa-arrow-down mr-1"></i> Load More..--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- END Notifications Dropdown -->--}}

{{--            <!-- Toggle Side Overlay -->--}}
{{--            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->--}}
{{--            <button type="button" class="btn btn-sm btn-dual ml-2" data-toggle="layout" data-action="side_overlay_toggle">--}}
{{--                <i class="fa fa-fw fa-list-ul fa-flip-horizontal"></i>--}}
{{--            </button>--}}
{{--            <!-- END Toggle Side Overlay -->--}}
{{--        </div>--}}
{{--        <!-- END Right Section -->--}}
{{--    </div>--}}
{{--    <!-- END Header Content -->--}}

{{--    <!-- Header Search -->--}}
{{--    <div id="page-header-search" class="overlay-header bg-white">--}}
{{--        <div class="content-header">--}}
{{--            <form class="w-100" action="be_pages_generic_search.html" method="POST">--}}
{{--                <div class="input-group input-group-sm">--}}
{{--                    <div class="input-group-prepend">--}}
{{--                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->--}}
{{--                        <button type="button" class="btn btn-danger" data-toggle="layout" data-action="header_search_off">--}}
{{--                            <i class="fa fa-fw fa-times-circle"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- END Header Search -->--}}

{{--    <!-- Header Loader -->--}}
{{--    <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->--}}
{{--    <div id="page-header-loader" class="overlay-header bg-white">--}}
{{--        <div class="content-header">--}}
{{--            <div class="w-100 text-center">--}}
{{--                <i class="fa fa-fw fa-circle-notch fa-spin"></i>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- END Header Loader -->--}}
{{--</header>--}}
{{--<!-- END Header -->--}}


<body id="custom-body">
<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->
    <div class="header">

        <!-- Logo -->
        <div class="header-left">
            <a href="https://smarthr.dreamguystech.com/blue/index.html" class="logo">
                <img src="https://smarthr.dreamguystech.com/blue/assets/img/logo.png" width="40" height="40" alt="">
            </a>
        </div>
        <!-- /Logo -->

        <a id="toggle_btn" href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
        </a>

        <!-- Header Title -->
        <div class="page-title-box">
            <h3>Dreamguy's Technologies</h3>
        </div>
        <!-- /Header Title -->

        <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

        <!-- Header Menu -->
        <ul class="nav user-menu">

            <!-- Search -->
            <li class="nav-item">
                <div class="top-nav-search">
                    <a href="javascript:void(0);" class="responsive-search">
                        <i class="fa fa-search"></i>
                    </a>
                    <form action="https://smarthr.dreamguystech.com/blue/search.html">
                        <input class="form-control" type="text" placeholder="Search here">
                        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </li>
            <!-- /Search -->

            <!-- Flag -->
            <li class="nav-item dropdown has-arrow flag-nav">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                    <img src="https://smarthr.dreamguystech.com/blue/assets/img/flags/us.png" alt="" height="20"> <span>English</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="https://smarthr.dreamguystech.com/blue/assets/img/flags/us.png" alt="" height="16"> English
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="https://smarthr.dreamguystech.com/blue/assets/img/flags/fr.png" alt="" height="16"> French
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="https://smarthr.dreamguystech.com/blue/assets/img/flags/es.png" alt="" height="16"> Spanish
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="https://smarthr.dreamguystech.com/blue/assets/img/flags/de.png" alt="" height="16"> German
                    </a>
                </div>
            </li>
            <!-- /Flag -->

            <!-- Notifications -->
            <li class="nav-item dropdown">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i> <span class="badge badge-pill">3</span>
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span class="notification-title">Notifications</span>
                        <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                    </div>
                    <div class="noti-content">
                        <ul class="notification-list">
                            <li class="notification-message">
                                <a href="https://smarthr.dreamguystech.com/blue/activities.html">
                                    <div class="media">
												<span class="avatar">
													<img alt="" src="https://smarthr.dreamguystech.com/blue/assets/img/profiles/avatar-02.jpg">
												</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
                                            <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="https://smarthr.dreamguystech.com/blue/activities.html">
                                    <div class="media">
												<span class="avatar">
													<img alt="" src="https://smarthr.dreamguystech.com/blue/assets/img/profiles/avatar-03.jpg">
												</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
                                            <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="https://smarthr.dreamguystech.com/blue/activities.html">
                                    <div class="media">
												<span class="avatar">
													<img alt="" src="https://smarthr.dreamguystech.com/blue/assets/img/profiles/avatar-06.jpg">
												</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
                                            <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="https://smarthr.dreamguystech.com/blue/activities.html">
                                    <div class="media">
												<span class="avatar">
													<img alt="" src="https://smarthr.dreamguystech.com/blue/assets/img/profiles/avatar-17.jpg">
												</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
                                            <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="https://smarthr.dreamguystech.com/blue/activities.html">
                                    <div class="media">
												<span class="avatar">
													<img alt="" src="https://smarthr.dreamguystech.com/blue/assets/img/profiles/avatar-13.jpg">
												</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
                                            <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="https://smarthr.dreamguystech.com/blue/activities.html">View all Notifications</a>
                    </div>
                </div>
            </li>
            <!-- /Notifications -->

            <!-- Message Notifications -->
            <li class="nav-item dropdown">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <i class="fa fa-comment-o"></i> <span class="badge badge-pill">8</span>
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span class="notification-title">Messages</span>
                        <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                    </div>
                    <div class="noti-content">
                        <ul class="notification-list">
                            <li class="notification-message">
                                <a href="https://smarthr.dreamguystech.com/blue/chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
													<span class="avatar">
														<img alt="" src="https://smarthr.dreamguystech.com/blue/assets/img/profiles/avatar-09.jpg">
													</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Richard Miles </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="https://smarthr.dreamguystech.com/blue/chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
													<span class="avatar">
														<img alt="" src="https://smarthr.dreamguystech.com/blue/assets/img/profiles/avatar-02.jpg">
													</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">John Doe</span>
                                            <span class="message-time">6 Mar</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="https://smarthr.dreamguystech.com/blue/chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
													<span class="avatar">
														<img alt="" src="https://smarthr.dreamguystech.com/blue/assets/img/profiles/avatar-03.jpg">
													</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Tarah Shropshire </span>
                                            <span class="message-time">5 Mar</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="https://smarthr.dreamguystech.com/blue/chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
													<span class="avatar">
														<img alt="" src="https://smarthr.dreamguystech.com/blue/assets/img/profiles/avatar-05.jpg">
													</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Mike Litorus</span>
                                            <span class="message-time">3 Mar</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="https://smarthr.dreamguystech.com/blue/chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
													<span class="avatar">
														<img alt="" src="https://smarthr.dreamguystech.com/blue/assets/img/profiles/avatar-08.jpg">
													</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Catherine Manseau </span>
                                            <span class="message-time">27 Feb</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="https://smarthr.dreamguystech.com/blue/chat.html">View all Messages</a>
                    </div>
                </div>
            </li>
            <!-- /Message Notifications -->

            <li class="nav-item dropdown has-arrow main-drop">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img src="https://smarthr.dreamguystech.com/blue/assets/img/profiles/avatar-21.jpg" alt="">
							<span class="status online"></span></span>
                    <span>Admin</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="https://smarthr.dreamguystech.com/blue/profile.html">My Profile</a>
                    <a class="dropdown-item" href="https://smarthr.dreamguystech.com/blue/settings.html">Settings</a>
                    <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                </div>
            </li>
        </ul>
        <!-- /Header Menu -->

        <!-- Mobile Menu -->
        <div class="dropdown mobile-user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="https://smarthr.dreamguystech.com/blue/profile.html">My Profile</a>
                <a class="dropdown-item" href="https://smarthr.dreamguystech.com/blue/settings.html">Settings</a>
                <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
            </div>
        </div>
        <!-- /Mobile Menu -->

    </div>
    <!-- /Header -->
