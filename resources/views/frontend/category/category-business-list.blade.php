@extends('frontend.layouts.master')
@section('title') Housing Grid @endsection
@section('content')

    <div class="preloader">
        <img src="{{ URL::asset('assets/frontend/images/loader.png')}}" class="preloader__image" alt="">
    </div><!-- /.preloader -->

    <div class="page-wrapper">

        <section class="listings_three_content">
            <div class="container">


                <div class="filter_by_tags">

                    <div class="row">
                        <div class="col-xl-2 col-md-4">
                            <h3 class="filter_by_tagstitile">Filters <i class="fas fa-chevron-down filtertagicon"></i>
                            </h3>
                        </div>
                    </div>

                    <div class="filter_by_tagsall">

                        <div class="row">
                            <div class="col-xl-12">
                                <form class="listings_one_content_left_form">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="input_box">
                                                <input type="text" name="listing_name"  id="listing_name" placeholder="What are you looking for?">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="input_box">
                                                <div class="dropdown bootstrap-select" style="width: 100%;">
                                                    <select class="selectpicker" data-width="100%" tabindex="-98" name="all-category" id="all-category">
                                                        <option value="" selected="selected">All Categories</option>
                                                        @foreach ($allCategorys as $item)
                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="dropdown-menu " role="combobox">
                                                        <div class="inner show" role="listbox"
                                                            aria-expanded="false" tabindex="-1">
                                                            <ul class="dropdown-menu inner show"></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="input_box">
                                                <div class="dropdown bootstrap-select dropup" style="width: 100%;">
                                                    <select class="selectpicker" data-width="100%" tabindex="-98" name="all-location" id="all-location">
                                                        <option value="" selected="selected">All Location</option>
                                                        @foreach ($allLocations as $item)
                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    {{-- <div class="dropdown-menu" role="combobox"
                                                        style="max-height: 286px; overflow: hidden; min-height: 129px; position: absolute; will-change: transform; min-width: 570px; top: 0px; left: 0px; transform: translate3d(0px, -2px, 0px);"
                                                        x-placement="top-start">
                                                        <div class="inner show" role="listbox"
                                                            aria-expanded="false" tabindex="-1"
                                                            style="max-height: 286px; overflow-y: auto; min-height: 129px;">
                                                            <ul class="dropdown-menu inner show">
                                                                <li class="selected active"><a role="option"
                                                                        class="dropdown-item selected active"
                                                                        aria-disabled="false" tabindex="0"
                                                                        aria-selected="true"><span
                                                                            class="text">All
                                                                            Location</span></a></li>
                                                                <li><a role="option" class="dropdown-item"
                                                                        aria-disabled="false" tabindex="0"
                                                                        aria-selected="false"><span
                                                                            class="text">Default
                                                                            Sorting 1</span></a></li>
                                                                <li><a role="option" class="dropdown-item"
                                                                        aria-disabled="false" tabindex="0"
                                                                        aria-selected="false"><span
                                                                            class="text">Default
                                                                            Sorting 2</span></a></li>
                                                                <li><a role="option" class="dropdown-item"
                                                                        aria-disabled="false" tabindex="0"
                                                                        aria-selected="false"><span
                                                                            class="text">Default
                                                                            Sorting 3</span></a></li>
                                                                <li><a role="option" class="dropdown-item"
                                                                        aria-disabled="false" tabindex="0"
                                                                        aria-selected="false"><span
                                                                            class="text">Default
                                                                            Sorting 4</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="input_box">
                                                <div class="dropdown bootstrap-select" style="width: 100%;">
                                                    <select class="selectpicker" data-width="100%" tabindex="-98" name="type" id="type">
                                                        <option value="" selected="selected">All  Type</option>
                                                        <option value="product">Product</option>
                                                        <option value="service">Service</option>
                                                    </select>
                                                    <div class="dropdown-menu " role="combobox">
                                                        <div class="inner show" role="listbox"
                                                            aria-expanded="false" tabindex="-1">
                                                            <ul class="dropdown-menu inner show"></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @if (isset($tagMaster))
                            <div class="row">
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($tagMaster as $item)
                                    @if ($i==1)
                                        <div class="col-xl-4 col-lg-4">
                                    @endif
                                        <div class="single_tags_check__box checkboxes">
                                            <input type="checkbox" name="{{$item->id}}" id="tag_{{$item->id}}" data-tagid="{{$item->id}}" value="{{$item->id}}">
                                            <label for="tag_{{$item->id}}" data-tagid="{{$item->id}}"><span></span>{{ucwords($item->name)}}</label>
                                        </div>
                                    @if ($i==4)   
                                        </div>  
                                    @endif 
                                    @php
                                        if($i==4){
                                            $i=1;
                                        } else {
                                            $i++;
                                        }
                                    @endphp
                                @endforeach
                            </div>
 
                        @endif
                        {{-- <div class="row">
                            <div class="col-xl-4 col-lg-4">
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="pets-friendly" id="tag_1">
                                    <label for="tag_1"><span></span>Pets Friendly</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="plumbing" id="tag_2" checked="">
                                    <label for="tag_2"><span></span>Car Rent</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="house-cleaning" id="tag_3">
                                    <label for="tag_3"><span></span>House Cleaning</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="business-financing" id="tag_4">
                                    <label for="tag_4"><span></span>Business Financing</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="accepts-credit Cards" id="tag_5">
                                    <label for="tag_5"><span></span>Accepts Credit Cards</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="bike-parking" id="tag_6">
                                    <label for="tag_6"><span></span>Bike Parking</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="coupons" id="tag_7">
                                    <label for="tag_7"><span></span>Coupons</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="parking-street" id="tag_8">
                                    <label for="tag_8"><span></span>Parking Street</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="wireless-internet" id="tag_9">
                                    <label for="tag_9"><span></span>Wireless Internet</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="smoking-allowed" id="tag_10">
                                    <label for="tag_10"><span></span>Smoking Allowed</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="bed-&amp;-breakfast" id="tag_11">
                                    <label for="tag_11"><span></span>Bed &amp; Breakfast</label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="listings_btn pb-2">
                                    <a href="#" class="thm-btn px-3 filter-category"><span
                                            class="icon-magnifying-glass"></span>Search</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>





        <section class="filter">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="filter_inner_content">
                            <div class="left">
                                <div class="left_icon">
                                    {{-- <a href="listings1.html" class="icon-grid active"></a>
                                    <a href="{{ route('HousingListingList') }}" class="list-icon icon-list"></a> --}}
                                    <a href="#" class="icon-grid active data-view" data-view="1"></a>
                                    <a href="#" class="list-icon icon-list data-view" data-view="0"></a>
                                </div>
                                <div class="left_text">
                                    <h4>Showing <span id="totalRecords">{{$total ? $total: 0 }}</span> Results </h4>
                                </div>
                            </div>
                            <div class="right">
                                <div class="shorting">
                                    <div class="dropdown bootstrap-select" style="width: 100%;">
                                        <select  class="selectpicker" data-width="100%" tabindex="-98" name='sortingBy' id="sortingBy">
                                            <option value="name" selected="selected">Sort By Name</option>
                                            <option value="type" >Sort By Type</option>
                                            <option value="actual_price" >Sort By Price</option>
                                            <option value="actual_price_unit" >Sort By Price Unit</option>
                                            <option value="payment_mode" >Sort By Payment Mode</option>
                                            {{-- <option selected="selected">Default Sorting</option>
                                            <option>Default Sorting 1</option>
                                            <option>Default Sorting 2</option>
                                            <option>Default Sorting 3</option>
                                            <option>Default Sorting 4</option> --}}
                                        </select>
                                        <div class="dropdown-menu " role="combobox">
                                            <div class="inner show" role="listbox" aria-expanded="false"
                                                tabindex="-1">
                                                <ul class="dropdown-menu inner show"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="listings_three-page mt-5 mb-5">
            <div class="container">
                <div class="row" id="results">
                    {{-- append list here --}}
                </div>
                <div class="ajax-loading" style="text-align:center;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATYAAACjCAMAAAA3vsLfAAAAz1BMVEX////6+vr89PT+/Pz87OL86Nr89vaxvIL4sXv8///l6NbM1c2istT4r3b2l3f9lamwwdft8OX+9/SYlcuwu9XV2uajtNLO1eS4xNfz8+z19fGxvIXM07utuXyyvIrEy6j98Ov66ur707n84c/f3sb3pmW2wZX5u4z3rob5wJb4q2/86OP5y6/71b398+z64uH219L3p4v1nYD6vK32kXH2tKH2oZP1zcP4s6r1w7T7sbj9i6L7nq7Y2tX4xsjh5eXh5+38v8mpq9Khnc61tNbzoKeKAAACnElEQVR4nO3Za1PaQBiG4d0EA4EECKBgkIq1Vm1toK2lrVCh6P//Td1NsuXUAn6KGe7LmRw2+bDzzLuHoBAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgJyz7ax7kEe2ZZHbC5yexifHspz4gqrbR9jtnemzia1RKJDbbkGvGOdmKSJOrdDIuk85EL4pFnuBqTZbpUa17eO8WCyem9j6KrV+1j3KhUDF1rXTlZRi2+3i7aWO6F2v15XpCmpmtkZEeP9z5ftXdyqe8vsz0xT19XLaP1Iy7Njrdu2XSn5pc93UoR0VMuhQPlg3Orfb9eZCHBuDdIlcubOuP/j+jRW3S/PIjmstSU2uvn+w1mP4eHf7ab09KkRseFfpeGRaQ1K6riuEq+/1n36QPEpaFq8ffM3JZODpWFz3YjCwFvfpVXyyndBZff2wmTlMnYefq9Xql6+WaTe1JaQdlLWGMI0bY/vQpINPHaP7qnb/bdFuYktSK5eXUz5sS9U2SnL77qb3i9jCJLWAajMW4Qjn8sdo9LPvmrAWsckwCspBaEvmttTy0qgXUleYBXQpUHVQn/Zplqyk/+L0Nz4HpCMZllsNHsbjibPaJiuVyi/+HbPF47hWq03WPgl0bJXKNJse5cFQpzZ+XG+ekttWOrXaUF3M/o5TGapDGOeWXb9euYfa5Lcaoc68OTdNnXpb/9A7pdp2em42n9Reo9WSOrZ6J+v+5EO72dTVdux5x3FsdepsH3MVW1uIlue11CynYuuw+dht9qSKTQ3PE887UbOaLje2urvN1Mw2EyY2EarcZtn2KBfs1rPedIiO58WLQdhuZ9uhfGl7Hnm9nN1hKQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACA3PsD/R0hdMCZUboAAAAASUVORK5CYII=" /></div>
            </div>
        </section>
    </div><!-- /.page-wrapper -->


    @section('script')

    <script>
        $(document).ready(function(){
            
            var selectedTags = [];
            var name='';
            var categoryId ='';
            var locationId = '';
            var type = '';
            var filter = true;
            var page = 1;
            var viewData=1;
            var hasLoadMore=true;
            var orderBy='name';
            loadMore(page,viewData);

            // scroll events
            $(window).scroll(function() { 

                if($(window).scrollTop() + $(window).height() >= ( $(document).height() - $('.site-footer').height() )) { 
                    page++; 
                    if(hasLoadMore){
                        var queryStr=getFilterQueryString();
                       
                        loadMore(page,viewData); 
                    } 
                }
            });  

            // load more data
            function loadMore(page,viewData,filter='',orderBy){
                var url="{!!route('category.business-list',['slug'=>$slug])!!}";
                    url+='?page='+page+'&viewData='+viewData;
                if (typeof filter != "undefined"  && filter!=""  ) {
                    url+=filter;
                }

                $.ajax({    
                    type: 'get',
                    url:url ,
                    dataType: 'json',
                    async: true,
                    beforeSend: function() {
                        $('.ajax-loading').show();
                    },
                    success: function(data) {
                        $("#totalRecords").text(data.total);   
                        if(data.html.length == 0){
                            // $('.ajax-loading').html("No more records!");
                            hasLoadMore=false;
                            return;
                        }
                        $("#results").append(data.html);          
                    },
                    error: function(XMLHttpRequest, errorStatus, errorThrown) {
                        console.log("XHR :: " + JSON.stringify(XMLHttpRequest));
                        console.log("Status :: " + errorStatus);
                        console.log("error :: " + errorThrown);
                    },
                    complete: function() {
                        $('.ajax-loading').hide(); 
                    },
                });
            }

            //  show grid or list view 
            $(document).on('click','.data-view',function(e) {
                e.preventDefault();
                var queryStr=getFilterQueryString();
                
                $('.ajax-loading').hide(); 
                viewData = $(this).attr("data-view");
                $('.data-view').removeClass('active');
                $(this).addClass('active');
                page = 1;
                hasLoadMore=true;
                $("#results").html('');
                loadMore(page,viewData,queryStr);
            });
            
            // filter 
            $("body .filter_by_tagstitile").click(function() {
                $(".filter_by_tagsall").toggle();
            });


            //  filter categorys
            $(".filter-category").click(function(e){
                e.preventDefault();
                var queryStr=getFilterQueryString();
                page = 1;
                hasLoadMore=true;
                $("#results").html('');
                loadMore(page,viewData,queryStr); 
            });

            function getFilterQueryString()
            {
                selectedTags = [];
                $('input[type=checkbox]').each(function() {
                    if ($(this).is(":checked")) {
                        selectedTags.push($(this).attr('name'));
                    }
                });
                
                name = $("#listing_name").val();
                categoryId = $('#all-category').find(":selected").val();
                locationId = $('#all-location').find(":selected").val();
                type = $('#type').find(":selected").val();
                filter =true;

                var queryStr='';
                if (typeof name != "undefined"  && name!=""  ) {
                    queryStr+='&name='+name;
                }
                if (typeof categoryId != "undefined"  && categoryId!=""  ) {
                    queryStr+='&categoryId='+categoryId;
                }
                if (typeof locationId != "undefined"  && locationId!=""  ) {
                    queryStr+='&locationId='+locationId;
                }
                if (typeof type != "undefined"  && type!=""  ) {
                    queryStr+='&type='+type;
                }
                if(typeof selectedTags != "undefined" && selectedTags.length > 0){
                    var tagStr=selectedTags.toString();
                    queryStr+='&tagsId='+tagStr;
                }

                orderBy = $("#sortingBy option:selected").val();
                if (typeof orderBy != "undefined"  && orderBy!=""  ) {
                    queryStr+='&orderBy='+orderBy;
                }
                return queryStr;
            }

            $('#sortingBy').on('change', function(e) {
                e.preventDefault();
                var queryStr=getFilterQueryString();
                page = 1;
                hasLoadMore=true;
                $("#results").html('');
                loadMore(page,viewData,queryStr); 
            });
        });
    </script>
    @endsection


@endsection
