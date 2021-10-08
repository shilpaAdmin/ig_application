@yield('css')
<link href="{{ URL::asset('assets/css/stokeapp.min.css')}}" id="app-light" rel="stylesheet" type="text/css" />

<!-- App Css-->
        <!--<link href="https://themesbrand.com/skote/layouts/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />--

<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
   <div data-simplebar class="h-100">
      <!--- Sidemenu -->
      <div id="sidebar-menu">
         <!-- Left Menu Start -->
         <ul class="metismenu list-unstyled" id="side-menu">
	
            <li>
               <a href="{{ url('admin/dashboard') }}" class="waves-effect">
               <i class="bx bx-home-circle"></i>
               <span key="t-dashboards">Dashboards</span>
               </a>
            </li>
            <li class="menu-title">Modules</li>
             <li>
                    <a href="{{ url('admin/business') }}"
                        class="{{ Request::segment(2) === 'business.create' ? 'active' : '' }} ">
						<i class="bx bx-briefcase-alt-2"></i><span>Business</span></a>
                </li>

                <li>
                    <a href="{{ url('admin/matrimonial') }}"
                        class="{{ Request::segment(2) === 'matrimonial.create' ? 'active' : '' }} ">
						<i class="bx bx-tone"></i><span>Matrimonial</span></a>
                </li>

                <li>
                    <a href="{{ url('admin/forum') }}"
                        class="{{ Request::segment(2) === 'forum.create' ? 'active' : '' }} "><i
                            class="mdi mdi-music-note-whole"></i>Fourm</a>
                </li>


                <li>
                    <a href="{{ url('admin/blog') }}"
                        class="{{ Request::segment(2) === 'blog.create' ? 'active' : '' }} "><i
                            class="mdi mdi-music-note-whole"></i>Blog</a>
                </li>
                <li>
                    <a href="{{ url('admin/user') }}"
                        class="{{ Request::segment(2) === 'user' ? 'active' : '' }} "><i
                            class="mdi mdi-music-note-whole"></i>User List</a>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect ">
                        <i class="bx bx-check-double"></i>
                        <span>Master</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li>
                           <a href="{{ url('admin/country') }}"><i
                              class="bx bx-radio-circle-marked"></i><span>Country</span></a>
                        </li>
                        <li>
                           <a href="{{ url('admin/city') }}"><i
                              class="bx bx-radio-circle-marked"></i><span>City</span></a>
                        </li>

                        <li>
                            <a href="{{ url('admin/carrier') }}"
                                class="{{ Request::segment(2) === 'carrier.create' ? 'active' : '' }} "><i
                                    class="mdi mdi-music-note-whole"></i>Carrier</a>
                        </li>

                        <li><a href="{{ url('admin/category') }}"
                                class="{{ Request::segment(2) === 'category.create' ? 'active' : '' }} "><i
                                    class="mdi mdi-music-note-whole"></i>Category</a></li>

                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow waves-effect ">
                                            <i class="fa fa-map-marker" style="font-size: 12px;" aria-hidden="true"></i>
                                            <span>Location</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li>
                                                <a href="{{ url('admin/country') }}"><i
                                                        class="bx bx-radio-circle-marked"></i>Country</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('admin/city') }}"><i
                                                        class="bx bx-radio-circle-marked"></i>City</a>
                                            </li>
                                        </ul>
                                    </li>


                        <li>
                            <a href="{{ url('admin/legalpages') }}"
                                class="{{ Request::segment(2) === 'legalpages.create' ? 'active' : '' }} "><i
                                    class="mdi mdi-music-note-whole"></i>Legal Pages</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="{{ url('admin/advertisement') }}"
                        class="{{ Request::segment(2) === 'advertisement.create' ? 'active' : '' }} "><i
                            class="mdi mdi-music-note-whole"></i>Advertisment</a>
                </li>

                <li>
                    <a href="{{ url('admin/notifications') }}"
                        class="{{ Request::segment(2) === 'notifications.create' ? 'active' : '' }} "><i
                            class="mdi mdi-music-note-whole"></i>Notifications</a>
                </li>

                <li>
                    <a href="{{ url('admin/testimonial') }}"
                        class="{{ Request::segment(2) === 'testimonial.create' ? 'active' : '' }} "><i
                            class="mdi mdi-music-note-whole"></i>Testmonial</a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->