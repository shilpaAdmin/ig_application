<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <!-- <li class="menu-title">Menu</li> -->
                <li>
                    <a href="{{ url('') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>

                        <span>Dashboards</span>
                    </a>

                </li>

                <li class="menu-title">Modules</li>

                <!-- Quick Guide Sidebar End -->
                <li><a href="{{ url('admin/category') }}"
                    class="{{ (Request::segment(2) === 'category.create' ? 'active' : '') }} "><i
                    class="mdi mdi-music-note-whole"></i>Category</a></li>

                <li>
                    <a href="{{ url('admin/tags') }}"
                    class="{{ (Request::segment(2) === 'tags.create' ? 'active' : '') }} "><i
                    class="mdi mdi-music-note-whole"></i>Tags</a>
                </li>

                <li>
                    <a href="{{ url('admin/business') }}"
                    class="{{ (Request::segment(2) === 'business.create' ? 'active' : '') }} "><i
                    class="mdi mdi-music-note-whole"></i>Business</a>
                </li>

                <li>
                    <a href="{{ url('admin/matrimonial') }}"
                    class="{{ (Request::segment(2) === 'matrimonial.create' ? 'active' : '') }} "><i
                    class="mdi mdi-music-note-whole"></i>Matrimonial</a>
                </li>

                <li>
                    <a href="{{ url('admin/advertisement') }}"
                    class="{{ (Request::segment(2) === 'advertisement.create' ? 'active' : '') }} "><i
                    class="mdi mdi-music-note-whole"></i>Advertisment</a>
                </li>

                <li>
                    <a href="{{ url('admin/forum') }}"
                    class="{{ (Request::segment(2) === 'forum.create' ? 'active' : '') }} "><i
                    class="mdi mdi-music-note-whole"></i>Fourm</a>
                </li>

                <li>
                    <a href="{{ url('admin/faq') }}"
                    class="{{ (Request::segment(2) === 'faq.create' ? 'active' : '') }} "><i
                    class="mdi mdi-music-note-whole"></i>FAQ</a>
                </li>

                <li>
                    <a href="{{ url('admin/blog') }}"
                    class="{{ (Request::segment(2) === 'blog.create' ? 'active' : '') }} "><i
                    class="mdi mdi-music-note-whole"></i>Blog</a>
                </li>

                <li>
                    <a href="{{ url('admin/carrier') }}"
                    class="{{ (Request::segment(2) === 'carrier.create' ? 'active' : '') }} "><i
                    class="mdi mdi-music-note-whole"></i>Carrier</a>
                </li>
                <li>
                    <a href="{{ url('admin/tagsforum') }}"
                    class="{{ (Request::segment(2) === 'tagsforum.create' ? 'active' : '') }} "><i
                    class="mdi mdi-music-note-whole"></i>Tags Forum</a>
                </li>

                <li>
                    <a href="{{ url('admin/testmonial') }}"
                    class="{{ (Request::segment(2) === 'testmonial.create' ? 'active' : '') }} "><i
                    class="mdi mdi-music-note-whole"></i>Testmonial</a>
                </li>

                <li>
                    <a href="{{ url('admin/legalpages') }}"
                    class="{{ (Request::segment(2) === 'legalpages.create' ? 'active' : '') }} "><i
                    class="mdi mdi-music-note-whole"></i>Legal Pages</a>
                </li>

                <li>
                    <a href="{{ url('admin/notifications') }}"
                    class="{{ (Request::segment(2) === 'notifications.create' ? 'active' : '') }} "><i
                    class="mdi mdi-music-note-whole"></i>Notifications</a>
                </li>

                <li>
                    <a href="{{ url('admin/location') }}"
                    class="{{ (Request::segment(2) === 'location.create' ? 'active' : '') }} "><i
                    class="mdi mdi-music-note-whole"></i>Location</a>
                </li>


                <!-- Setting Sidebar Start -->

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
