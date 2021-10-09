@yield('css')
<link href="{{ URL::asset('assets/css/stokeapp.min.css') }}" id="app-light" rel="stylesheet" type="text/css" />

<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <!-- <li class="menu-title">Menu</li> -->
                <li>
                    <a href="{{ url('/admin/dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>

                        <span>Dashboards</span>
                    </a>

                </li>

                {{-- <li class="menu-title">Modules</li> --}}

                <!-- Quick Guide Sidebar End -->
                {{-- <li>
                    <a href="{{ url('admin/business') }}"
                        class="{{ Request::segment(2) === 'business.create' ? 'active' : '' }} "><i
                            class="mdi mdi-music-note-whole"></i>Business</a>
                </li> --}}

                <li class="menu-title">Modules</li>

                <li>
                    {{-- <a href="{{ url('admin/business') }}"
                        class="{{ Request::segment(2) === 'business.create' ? 'active' : '' }} "><i
                        class="has-arrow waves-effect"></i>Business</a> --}}

                        <a href="javascript: void(0);" class="waves-effect ">
                            <i class="bx bx-briefcase-alt-2"></i>
                            <span>Business</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <?php
                                if(isset($subCategoryData) && !empty($subCategoryData))
                                {
                                        if(count($subCategoryData) > 0)
                                        {
                                                foreach($subCategoryData as $dynamicData)
                                                {
                                        ?>
                                                <li><a href="{{ route('subCategoryList',$dynamicData->id) }}"><i class="mdi mdi-music-note-whole"></i>{{ $dynamicData->name }}</a></li>
                                        <?php
                                                }
                                        }
                                }
                                ?>
                        </ul>
                </li>
                <li>
                    <a href="{{ url('admin/matrimonial') }}"
                        class="{{ Request::segment(2) === 'matrimonial.create' ? 'active' : '' }} "><i class="bx bx-doughnut-chart"></i><span>Matrimonial</span></a>
                </li>

                {{-- <li>
                    <a href="{{ url('admin/faq') }}"
                        class="{{ Request::segment(2) === 'faq.create' ? 'active' : '' }} "><i
                            class="mdi mdi-music-note-whole"></i>FAQ</a>
                </li> --}}
            <li>
               <a href="{{ url('admin/faq') }}"
                  class="{{ Request::segment(2) === 'faq.create' ? 'active' : '' }} ">
				 <i class="bx bx-task"></i><span>FAQ</span></a>
            </li>
            <li>
               <a href="{{ url('admin/forum') }}"
                  class="{{ Request::segment(2) === 'forum.create' ? 'active' : '' }} ">
				  <i class="bx bx-file"></i><span>Fourm</span></a>
            </li>
            <li>
               <a href="{{ url('admin/blog') }}"
                  class="{{ Request::segment(2) === 'blog.create' ? 'active' : '' }} ">
				 <i class="bx bx-detail"></i><span>Blog</span></a>
            </li>
            <li>
               <a href="javascript: void(0);" class="has-arrow waves-effect ">
               <i class="bx bx-book-open"></i>
               <span>Master</span>
               </a>
               <ul class="sub-menu" aria-expanded="false">
                  <li>
                     <a href="{{ url('admin/tags') }}"
                        class="{{ Request::segment(2) === 'tags.create' ? 'active' : '' }} "><i
                        class="mdi mdi-music-note-whole"></i><span>Tags</span></a>
                  </li>
                  <li>
                     <a href="{{ url('admin/tagsforum') }}"
                        class="{{ Request::segment(2) === 'tagsforum.create' ? 'active' : '' }} "><i
                        class="mdi mdi-music-note-whole"></i><span>Tags Forum</span></a>
                  </li>
                  <li>
                     <a href="{{ url('admin/carrier') }}"
                        class="{{ Request::segment(2) === 'carrier.create' ? 'active' : '' }} "><i
                        class="mdi mdi-music-note-whole"></i><span>Carrier</span></a>
                  </li>
                  <li><a href="{{ url('admin/category') }}"
                     class="{{ Request::segment(2) === 'category.create' ? 'active' : '' }} "><i
                     class="mdi mdi-music-note-whole"></i><span>Category</span></a></li>
                  <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect ">
                     <i class="fa fa-map-marker" style="font-size: 12px;" aria-hidden="true"></i>
                     <span>Location</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ url('admin/city') }}"
                                class="{{ Request::segment(2) === 'city.create' ? 'active' : '' }} "><i
                                    class="mdi mdi-music-note-whole"></i>City</a>
                        </li>

                        <li>
                            <a href="{{ url('admin/country') }}"
                                class="{{ Request::segment(2) === 'country.create' ? 'active' : '' }} "><i
                                    class="mdi mdi-music-note-whole"></i>Country</a>
                        </li>
                     </ul>
                  </li>
                  <!-- <li>
                     <a href="{{ url('admin/legalpages') }}"
                        class="{{ Request::segment(2) === 'legalpages.create' ? 'active' : '' }} ">
						<i class="mdi mdi-music-note-whole"></i><span>Legal Pages</span></a>
                  </li> -->
               </ul>
            </li>
            <li>
               <a href="{{ url('admin/advertisement') }}"
                  class="{{ Request::segment(2) === 'advertisement.create' ? 'active' : '' }} ">
				  <i class="bx bx-bolt-circle"></i><span>Advertisment</span></a>
            </li>
            <!-- <li>
               <a href="{{ url('admin/notifications') }}"
                  class="{{ Request::segment(2) === 'notifications.create' ? 'active' : '' }} ">
				  <i class="bx bx-notification"></i><span>Notifications</span></a>
            </li> -->
            <li>
               <a href="{{ url('admin/testimonial') }}"
                  class="{{ Request::segment(2) === 'testimonial.create' ? 'active' : '' }} ">
				  <i class="bx bx-user-circle"></i><span>Testimonial</span></a>
            </li>
            <!--<li>
               <a href="javascript: void(0);" class="has-arrow waves-effect">
                   <i class="bx bx-store"></i>
                   <span key="t-ecommerce">Ecommerce</span>
               </a>
               <ul class="sub-menu" aria-expanded="false">
                   <li><a href="https://themesbrand.com/skote/layouts/ecommerce-products.html" key="t-products">Products</a></li>
                   <li><a href="https://themesbrand.com/skote/layouts/ecommerce-product-detail.html" key="t-product-detail">Product Detail</a></li>
                   <li><a href="https://themesbrand.com/skote/layouts/ecommerce-orders.html" key="t-orders">Orders</a></li>
                   <li><a href="https://themesbrand.com/skote/layouts/ecommerce-customers.html" key="t-customers">Customers</a></li>
                   <li><a href="https://themesbrand.com/skote/layouts/ecommerce-cart.html" key="t-cart">Cart</a></li>
                   <li><a href="https://themesbrand.com/skote/layouts/ecommerce-checkout.html" key="t-checkout">Checkout</a></li>
                   <li><a href="https://themesbrand.com/skote/layouts/ecommerce-shops.html" key="t-shops">Shops</a></li>
                   <li><a href="https://themesbrand.com/skote/layouts/ecommerce-add-product.html" key="t-add-product">Add Product</a></li>
               </ul>
               </li>-->
         </ul>
      </div>
      <!-- Sidebar -->
   </div>
</div>
<!-- Left Sidebar End -->
