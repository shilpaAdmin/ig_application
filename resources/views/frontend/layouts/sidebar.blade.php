<!-- ========== Left Sidebar Start ========== -->
<?php

// echo "<pre>"; print_r($mediaLibraryMasterData);
// exit;
$saleLibraryArray = $gujaratiLibraryArray = $englishLibraryArray  = $stockLibraryArray = array();
if(isset($mediaLibraryMasterData) && !empty($mediaLibraryMasterData))
{
    $q = 0;
    foreach($mediaLibraryMasterData as $tempDataFetch)
    {
        if($tempDataFetch->news_room_sale == 'news room'  && $tempDataFetch->media_type == 'stock up')
        {
            $stockLibraryArray[$q]['categoryId'] = $tempDataFetch->id;
            $stockLibraryArray[$q]['categoryPermalink'] = $tempDataFetch->permalink;
            $stockLibraryArray[$q]['categoryName'] = ucwords($tempDataFetch->library_name);
            $q++;
        }

        if($tempDataFetch->news_room_sale == 'news room'  && $tempDataFetch->media_type == 'english')
        {
            $englishLibraryArray[$q]['categoryId'] = $tempDataFetch->id;
            $englishLibraryArray[$q]['categoryPermalink'] = $tempDataFetch->permalink;
            $englishLibraryArray[$q]['categoryName'] = ucwords($tempDataFetch->library_name);
            $q++;
        }

        if($tempDataFetch->news_room_sale == 'news room'  && $tempDataFetch->media_type == 'gujarati')
        {
            $gujaratiLibraryArray[$q]['categoryId'] = $tempDataFetch->id;
            $gujaratiLibraryArray[$q]['categoryPermalink'] = $tempDataFetch->permalink;
            $gujaratiLibraryArray[$q]['categoryName'] = ucwords($tempDataFetch->library_name);
            $q++;
        }

        if($tempDataFetch->news_room_sale == 'sale')
        {
            $saleLibraryArray[$q]['categoryId'] = $tempDataFetch->id;
            $saleLibraryArray[$q]['categoryPermalink'] = $tempDataFetch->permalink;
            $saleLibraryArray[$q]['categoryName'] = ucwords($tempDataFetch->library_name);
            $q++;
        }
    }
    //  echo "<pre>"; print_r($stockLibraryArray);
}
?>
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <!-- <li class="menu-title">Menu</li> -->

                <li>
                    <a href="{{ url('/index') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>

                        <span>Dashboards</span>
                    </a>

                </li>

                <li class="menu-title">Modules</li>

                <!-- News Room Sidebar Start -->
                <!-- <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-news"></i>
                        <span>News Room</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="javascript: void(0);"><i class="bx bx-radio-circle-marked"></i>Story Planner</a>
                        </li>
                        <li><a href="javascript: void(0);"><i class="bx bx-radio-circle-marked"></i>Run Order</a></li>
                        <li><a href="javascript: void(0);"><i class="bx bx-radio-circle-marked"></i>Timeline</a></li>
                    </ul>
                </li> -->
                {{--
                @if(Request::segment(1) === 'newsroom' || Request::segment(1) === 'newsroom-gujarati' || Request::segment(1) === 'newsroom-justIn' || Request::segment(1) == '' || Request::segment(1) == 'index' || Request::segment(1) == 'advertisement' || Request::segment(1) == 'courier' || Request::segment(1) == 'pixie' || Request::segment(2) == 'storyLibrary' || Request::segment(2) == 'documentsLibrary' || Request::segment(2) == 'advtMediaLibrary' || Request::segment(2) == 'logoMediaLibrary' || Request::segment(1) === 'library')
                <li class="{{ (Request::segment(1) === 'newsroom' ? 'mm-active' : '') }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect ">
                        <i class="bx bxs-news"></i>
                        <span>News Room English</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('newsroom/story_english/create') }}"><i class="bx bx-radio-circle-marked"></i>New Story Feed</a></li>
						<li><a href="{{ url('newsroom/story_english/createCard') }}"><i class="bx bx-radio-circle-marked"></i>New Story Feed Version 1</a></li>
                        <li><a href="{{ url('newsroom/assignstorylist_english') }}"><i class="bx bx-radio-circle-marked"></i>Story Planner</a></li>
                        <li><a href="{{ url('newsroom/story_english') }}"><i class="bx bx-radio-circle-marked"></i>Story Hub</a></li>
                        <li style="border-bottom:dashed 0.25px #79829c;"><a href="{{ url('newsroom/manage_timeline_english') }}"><i class="bx bx-radio-circle-marked"></i>Manage Timeline</a>

                        <li><a href="{{ url('newsroom/notificationfeed_english') }}"><i class="bx bx-radio-circle-marked"></i>Notification Hub</a></li>
                        <li style="border-bottom:dashed 0.25px #79829c;"><a href="{{ url('newsroom/breaking_news_english') }}"><i class="bx bx-radio-circle-marked"></i>Breaking News Hub</a></li>
                        <?php
                        if(count($englishLibraryArray) > 0)
                        {
                            foreach($englishLibraryArray as $dynamicData)
                            {
                        ?>
                            <li><a href="{{ route('library', [$dynamicData['categoryPermalink'],$dynamicData['categoryId']]) }}"><i class="bx bx-radio-circle-marked"></i>{{ $dynamicData['categoryName'] }}</a></li>
                        <?php
                            }
                        }
                        ?>
                        <!-- <li style="border-bottom:dashed 0.25px #79829c;"><a href="{{ url('newsroom/justInTimeline') }}"><i class="bx bx-radio-circle-marked"></i>Just-In Timeline</a></li> -->
                        <li ><a href="{{ url('newsroom/advertisement_english') }}"><i class="bx bx-radio-circle-marked"></i>Advertisement</a></li>
                        <li><a href="#"><i class="bx bx-radio-circle-marked"></i>Manage Live</a></li>
                        <li><a href="{{ url('newsroom/cube_english') }}"><i class="bx bx-radio-circle-marked"></i>Manage Cube</a></li>
                        
                    </ul>
                </li>	
                <li class="{{ (Request::segment(1) === 'newsroom-gujarati' ? 'mm-active' : '') }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect ">
                        <i class="bx bx-news"></i>
                        <span>News Room Gujarati</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('newsroom-gujarati/story/create') }}"><i class="bx bx-radio-circle-marked"></i>New Story Feed</a></li>
                        <li><a href="{{ url('newsroom-gujarati/story/createCard') }}"><i class="bx bx-radio-circle-marked"></i>New Story Feed Version 1</a></li>
                        <li><a href="{{ url('newsroom-gujarati/assignstorylist') }}"><i class="bx bx-radio-circle-marked"></i>Story Planner</a></li>
                        <li><a href="{{ url('newsroom-gujarati/story') }}"><i class="bx bx-radio-circle-marked"></i>Story Hub</a></li>
                        <li style="border-bottom:dashed 0.25px #79829c;"><a href="{{ url('newsroom-gujarati/manage_timeline') }}"><i class="bx bx-radio-circle-marked"></i>Manage Timeline</a>

                        <li><a href="{{ url('newsroom-gujarati/notificationfeed') }}"><i class="bx bx-radio-circle-marked"></i>Notification Hub</a></li>
                        <?php
                        if(count($gujaratiLibraryArray) > 0)
                        {
                            foreach($gujaratiLibraryArray as $dynamicData)
                            {
                        ?>
                            <li><a href="{{ route('library', [$dynamicData['categoryPermalink'],$dynamicData['categoryId']]) }}"><i class="bx bx-radio-circle-marked"></i>{{ $dynamicData['categoryName'] }}</a></li>
                        <?php
                            }
                        }
                        ?>
                        <li style="border-bottom:dashed 0.25px #79829c;"><a href="{{ url('newsroom-gujarati/breaking_news') }}"><i class="bx bx-radio-circle-marked"></i>Breaking News Hub</a></li>
                        <!-- <li style="border-bottom:dashed 0.25px #79829c;"><a href="{{ url('newsroom-gujarati/justInTimeline') }}"><i class="bx bx-radio-circle-marked"></i>Just-In Timeline</a></li> -->
                        <li><a href="{{ url('newsroom-gujarati/advertisement') }}"><i class="bx bx-radio-circle-marked"></i>Advertisement</a></li>
                        <li><a href="#"><i class="bx bx-radio-circle-marked"></i>Manage Live</a></li>
                        <li><a href="{{ url('newsroom-gujarati/cube') }}"><i class="bx bx-radio-circle-marked"></i>Manage Cube</a></li>
                    </ul>
                </li>
				
                <li class="{{ (Request::segment(1) === 'newsroom-justIn' ? 'mm-active' : '') }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect ">
                        <i class="bx bxs-bar-chart-alt-2"></i>
                        <span>News Room StockUp</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('newsroom-justIn/justInTimeline_justin') }}"><i class="bx bx-radio-circle-marked"></i>News Widget</a></li>
                        <li><a href="{{ url('newsroom-justIn/story_bank') }}"><i class="bx bx-radio-circle-marked"></i>Story Bank</a></li>
                        <li><a href="{{ url('newsroom-justIn/story_justin') }}"><i class="bx bx-radio-circle-marked"></i>Story Hub</a></li>
                        <li><a href="{{ url('newsroom-justIn/stories') }}"><i class="bx bx-radio-circle-marked"></i>Story Timeline Preview</a></li>
                        <li><a href="{{ url('newsroom-justIn/storyCountsList') }}"><i class="bx bx-radio-circle-marked"></i>Story Counter</a></li>
                        <li style="border-bottom:dashed 0.25px #79829c;"><a href="{{ url('newsroom-justIn/justInManageTimeline_justin') }}"><i class="bx bx-radio-circle-marked"></i>News Flashcard</a></li>
                        <li><a href="{{ route('storyLibrary') }}"><i class="bx bx-radio-circle-marked"></i>Story Library</a></li>
                        <li><a href="{{ route('documentsLibrary') }}"><i class="bx bx-radio-circle-marked"></i>Photo Video Library</a></li>
                    <?php
                    if(isset($stockLibraryArray) && !empty($stockLibraryArray))
                    {
                            if(count($stockLibraryArray) > 0)
                            {
                                    foreach($stockLibraryArray as $dynamicData)
                                    {
                            ?>
                                    <li><a href="{{ route('library', [$dynamicData['categoryPermalink'],$dynamicData['categoryId']]) }}"><i class="bx bx-radio-circle-marked"></i>{{ $dynamicData['categoryName'] }}</a></li>
                            <?php
                                    }
                            }
                    }
                    ?>
                        <li style="border-bottom:dashed 0.25px #79829c;">
                            <a href="{{ route('logoMediaLibrary') }}" ><i class="bx bx-radio-circle-marked"></i>Company Logo Library</a>
                        </li>
                        <li><a href="{{ url('newsroom-justIn/event') }}"><i class="bx bx-radio-circle-marked"></i>App Live - Management</a></li>
                        <li><a href="{{ url('newsroom-justIn/kyc') }}"><i class="bx bx-radio-circle-marked"></i>KYC</a></li>
			<li><a href="{{ url('newsroom-justIn/breaking_news_justin') }}"><i class="bx bx-radio-circle-marked"></i>Breaking News Hub</a></li>			
                       <li><a href="{{ url('newsroom-justIn/notificationfeed_justin') }}"><i class="bx bx-radio-circle-marked"></i>Notification</a></li>
                        
                        <li><a href="{{ url('newsroom-justIn/cube_justin') }}"><i class="bx bx-radio-circle-marked"></i>Manage Cube</a></li>
                        <li>
                            <a href="{{ url('newsroom-justIn/poll') }}" class="waves-effect">
                                <i class="bx bx-radio-circle-marked"></i>
                                <span>Poll</span>
                            </a>
                        </li>
                        <li style="border-bottom:dashed 0.25px #79829c;">
                            <a href="{{ url('newsroom-justIn/survey') }}" class="waves-effect">
                                <i class="bx bx-radio-circle-marked"></i>
                                <span>Survey</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('pixie/managePixie') }}" ><i class="bx bx-radio-circle-marked"></i>Photo Editor</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-bot"></i>
                        <span>Advertisement</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ url('advertisement/advertisementManage/create') }}" ><i class="bx bx-radio-circle-marked"></i>ADVT Widgets</a>
                        </li>
                        <li>
                            <a href="{{ url('advertisement/advertisementManage/advtBank') }}" ><i class="bx bx-radio-circle-marked"></i>ADVT Bank</a>
                        </li>
                        <li>
                            <a href="{{ url('advertisement/advertisementManage') }}" ><i class="bx bx-radio-circle-marked"></i>ADVT Hub</a>
                        </li>
                        <li>
                            <a href="{{ url('advertisement/advertisementManage/advtTimeline') }}" ><i class="bx bx-radio-circle-marked"></i>ADVT Timeline Preview</a>
                        </li>
                        <li>
                            <a href="{{ url('advertisement/advertisementManage/getAdvtCounts') }}" ><i class="bx bx-radio-circle-marked"></i>ADVT Counter</a>
                        </li>
                        <?php
                        if(count($saleLibraryArray) > 0)
                        {
                            foreach($saleLibraryArray as $dynamicData)
                            {
                        ?>
                            <li><a href="{{ route('library', [$dynamicData['categoryPermalink'],$dynamicData['categoryId']]) }}"><i class="bx bx-radio-circle-marked"></i>{{ $dynamicData['categoryName'] }}</a></li>
                        <?php
                            }
                        }
                        ?>
                        <li>
                            <a href="{{ route('advtMediaLibrary') }}" ><i class="bx bx-radio-circle-marked"></i>ADVT Media Library</a>
                        </li>
                        <!--<li><a href="{{ url('advertisement/startup_screen_advertisement_justin') }}" ><i class="bx bx-radio-circle-marked"></i>Startup Screen Ad</a></li> -->
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-briefcase-alt-2"></i>
                        <span>Courier</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li>
                            <a href="{{ url('courier/inwardManage') }}" ><i class="bx bx-radio-circle-marked"></i>Inward</a>
                        </li>
                        <li><a href="{{ url('courier/outwardManage') }}" ><i class="bx bx-radio-circle-marked"></i>Outward</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-detail"></i>
                        <span>Story Editor</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li>
                            <a href="{{ url('pixie/managePixie') }}" ><i class="bx bx-radio-circle-marked"></i>Editor</a>
                        </li>
                    </ul>
                </li>
                
                @endif
                <!-- News Room Sidebar End -->
                <li>
                    <a href="{{ url('notebookadd') }}" class="waves-effect">
                        <i class="bx bxs-notepad"></i>
                        <span>Notebook</span>
                    </a>
                </li>

                <!-- Sales Operation Sidebar Start -->
                @if(Request::segment(1) === 'sales' || Request::segment(1) == '' || Request::segment(1) == 'index')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-briefcase"></i>
                        <span>Sales Operation</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="{{ (Request::segment(2) === 'customeradd' ? 'mm-active' : '') }}"><a
                                href="{{ url('sales/customer') }}"
                                class="{{ (Request::segment(2) === 'customeradd' ? 'active' : '') }}"><i
                                    class="bx bx-radio-circle-marked"></i>Customer</a></li>
                        <li class="{{ (Request::segment(2) === 'cinvoiceadd' ? 'mm-active' : '') }}"><a
                                href="{{ url('sales/invoice') }}"
                                class="{{ (Request::segment(2) === 'cinvoiceadd' ? 'active' : '') }}"><i
                                    class="bx bx-radio-circle-marked"></i>Invoice</a></li>
                    </ul>
                </li>
                @endif
                <!-- Sales Operation Sidebar End -->

                <!-- Marketing & Promotion Sidebar Start -->
                @if(Request::segment(1) === 'marketingPromotion' || Request::segment(1) == '' || Request::segment(1) ==
                'index')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-megaphone"></i>
                        <span>Marketing & Promotion</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="{{ (Request::segment(2) === 'myapppromotionadd' ? 'mm-active' : '') }}"><a
                                href="{{ url('marketingPromotion/promotionTracking') }}"
                                class="{{ (Request::segment(2) === 'myapppromotionadd' ? 'active' : '') }}"><i
                                    class="bx bx-radio-circle-marked"></i>Promotion &
                                Tracking</a></li>
                        <li class="{{ (Request::segment(2) === 'competitionadd' ? 'mm-active' : '') }}"><a
                                href="{{ url('marketingPromotion/competitionTracking') }}"
                                class="{{ (Request::segment(2) === 'competitionadd' ? 'active' : '') }}"><i
                                    class="bx bx-radio-circle-marked"></i>Competition Tracking</a>
                        </li>
                    </ul>
                </li>
                @endif
                <!-- Marketing & Promotion Sidebar End -->

                <!-- HR & Admin Sidebar Start -->
                @if(Request::segment(1) === 'hradmin' || Request::segment(1) == '' || Request::segment(1) == 'index')
                <li class="{{ (Request::segment(1) === 'hradmin' ? 'mm-active' : '') }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-plus"></i>
                        <span>HR & Admin</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <!--<li><a href="javascript: void(0);"><i class="bx bx-radio-circle-marked"></i>Dashboard</a></li>-->
                        <li
                            class="{{ (Request::segment(2) === 'employeeadd' ? 'mm-active' : (Request::segment(2) === 'employeeview' ? 'mm-active' : '') ) }}">
                            <a href="{{ url('hradmin/employeelist') }}"
                                class="{{ (Request::segment(2) === 'employeeadd' ? 'active' : (Request::segment(2) === 'employeeview' ? 'active' : '') )}}"><i
                                    class="bx bx-radio-circle-marked"></i>Employee</a>
                        </li>
                        <li><a href="{{ url('hradmin/jobopeninglist') }}"
                                class="{{ (Request::segment(2) === 'jobopeningadd' ? 'active' : '') }}"><i
                                    class="bx bx-radio-circle-marked"></i>Job
                                Opening</a></li>


                        <li><a href="javascript: void(0);" class="has-arrow"><i
                                    class="bx bx-radio-circle-marked"></i>Attendance</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('hradmin/manageattendance') }}"><i
                                            class="mdi mdi-music-note-whole"></i>Manage
                                        Attendance</a>
                                </li>
                                <li><a href="{{ url('hradmin/attendanceadd') }}"><i
                                            class="mdi mdi-music-note-whole"></i>Bulk
                                        Attendance</a>
                                </li>
                                <li><a href="{{ url('hradmin/shiftchangelist') }}"><i
                                            class="mdi mdi-music-note-whole"></i>Shift Change</a>
                                </li>
                                <li><a href="{{ url('hradmin/timechangelist') }}"><i
                                            class="mdi mdi-music-note-whole"></i>Time Change</a>
                                </li>
                                <li><a href="{{ url('hradmin/importattendance') }}"><i
                                            class="mdi mdi-music-note-whole"></i>Import
                                        Attendance</a>
                                </li>
                                <li><a href="{{ url('hradmin/attendancelist') }}"><i
                                            class="mdi mdi-music-note-whole"></i>Attendance
                                        Report</a>
                                </li>




                            </ul>
                        </li>

                        <li><a href="javascript: void(0);" class="has-arrow"><i
                                    class="bx bx-radio-circle-marked"></i>Leave</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('hradmin/leaveapplicationlist') }}"><i
                                            class="mdi mdi-music-note-whole"></i>Leave
                                        Applicantion</a></li>
                                <li><a href="{{ url('hradmin/leavecreditadd') }}"><i
                                            class="mdi mdi-music-note-whole"></i>Leave Credit</a>
                                </li>
                                <li><a href="{{ url('hradmin/leavereportlist') }}"><i
                                            class="mdi mdi-music-note-whole"></i>Leave Report</a>
                                </li>
                            </ul>
                        </li>

                        <li
                            class="{{ (Request::segment(2) === 'incrementadd' ? 'mm-active' : (Request::segment(2) === 'deductionadd' ? 'mm-active' : (Request::segment(2) === 'bonusadd' ? 'mm-active' : '') ) ) }}">
                            <a href="javascript: void(0);" class="has-arrow"><i
                                    class="bx bx-radio-circle-marked"></i>Payroll</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('hradmin/payrolllist') }}"><i class="mdi mdi-music-note-whole"></i>
                                        Process Payroll</a>
                                </li>

                                <li><a href="{{ url('hradmin/managesalarylist') }}"><i
                                            class="mdi mdi-music-note-whole"></i> Salary</a></li>
                                <li><a href="{{ url('hradmin/salaryregisterlist') }}"><i
                                            class="mdi mdi-music-note-whole"></i>Salary
                                        Register</a></li>
                                <li><a class="{{ (Request::segment(2) === 'bonusadd' ? 'active' : '') }}"
                                        href="{{ url('hradmin/bonuslist') }}"><i
                                            class="mdi mdi-music-note-whole"></i>Bonus</a></li>
                                <li><a class="{{ (Request::segment(2) === 'deducationadd' ? 'active' : '') }}"
                                        href="{{ url('hradmin/deducationlist') }}"><i
                                            class="mdi mdi-music-note-whole"></i>Deduction</a></li>
                                <li><a class="{{ (Request::segment(2) === 'incrementadd' ? 'active' : '') }}"
                                        href="{{ url('hradmin/incrementlist') }}"><i
                                            class="mdi mdi-music-note-whole"></i>Increment</a></li>
                            </ul>
                        </li>

                        <!-- <li><a href="payrolllist"><i class="mdi mdi-music-note-whole"></i>Payroll</a></li> -->
                    </ul>
                </li>
                @endif
                <!-- HR & Admin Sidebar End -->

                <!-- Accounts & Vendor Sidebar Start -->
                @if(Request::segment(1) === 'accountsvender' || Request::segment(1) == '' || Request::segment(1) ==
                'index')
                <li class="{{ (Request::segment(1) === 'accountsvender' ? 'mm-active' : '') }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user"></i>
                        <span>Accounts & Vendor</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('accountsvender/vendor') }}"
                                class="{{ (Request::segment(2) === 'vendoradd' ? 'active' : '') }}"><i
                                    class="bx bx-radio-circle-marked"></i>Vendor</a></li>
                        <!-- <li><a href="quotationlist"><i class="bx bx-radio-circle-marked"></i>Quotation</a></li> -->
                        <li
                            class="{{ (Request::segment(2) === 'quotationadd' ? 'mm-active' : (Request::segment(2) === 'requestquotationadd' ? 'mm-active' : '') ) }}">
                            <a href="javascript: void(0);" class="has-arrow"><i
                                    class="bx bx-radio-circle-marked"></i>Quotation</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('accountsvender/quotation') }}"
                                    class="{{ (Request::segment(2) === 'quotationadd' ? 'active' : '') }}"><i
                                        class="mdi mdi-music-note-whole"></i>Quotation</a>
                            </li>
                            <li><a href="{{ url('accountsvender/requestQuotation') }}"
                                    class="{{ (Request::segment(2) === 'requestquotationadd' ? 'active' : '') }}"><i
                                        class="mdi mdi-music-note-whole"></i>Request
                                    Quotation</a>
                            </li>
                            </ul>
                        </li>
                        <li><a href="{{ url('accountsvender/purchaseOrder') }}"
                                class="{{ (Request::segment(2) === 'purchaseorderadd' ? 'active' : '') }}"><i
                                    class="bx bx-radio-circle-marked"></i>Purchase Order</a>
                        </li>
                        <li><a href="{{ url('accountsvender/invoiceVendor') }}"
                            class="{{ (Request::segment(2) === 'invoiceadd' ? 'active' : '') }}"><i
                                class="bx bx-radio-circle-marked"></i>Invoice</a></li>
<!--                        <li>
                            <a href="{{ url('accountsvender/advertisementManage') }}" class="{{ (Request::segment(2) === 'invoiceadd' ? 'active' : '') }}"><i class="bx bx-radio-circle-marked"></i>Advertisement Manage</a>
                        </li>-->
                    </ul>
                </li>
                
                @endif
                <!-- Accounts & Vendor Sidebar End -->

                <!-- Social Media Centre Sidebar Start -->


                <!-- Social Media Centre Sidebar End -->

                <!-- Document Centre Sidebar Start -->
                @if(Request::segment(1) === 'Document Centre' || Request::segment(1) == '' || Request::segment(1) ==
                'index')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-file-plus"></i>
                        <span>Document Centre</span>
                    </a>
                </li>
                @endif
                <!-- Document Centre Sidebar End -->

                <!-- Smart Contact Centre Sidebar Start -->
                @if(Request::segment(1) === 'Smart Contact' || Request::segment(1) == '' || Request::segment(1) ==
                'index')

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-contact"></i>
                        <span>Smart Contact Centre</span>
                    </a>
                </li>
                @endif
                <!-- Smart Contact Centre Sidebar End -->


                <!-- Work From Home Sidebar Start -->
                @if(Request::segment(1) === 'Work From' || Request::segment(1) == '' || Request::segment(1) ==
                'index')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-home"></i>
                        <span>Work From Home</span>
                    </a>
                </li>
                @endif
                <!-- Work From Home Sidebar End -->

                <!-- Online Sidebar Start -->
                @if(Request::segment(1) === 'Online Interview' || Request::segment(1) == '' || Request::segment(1) ==
                'index')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-calendar-check"></i>
                        <span>Online Interview</span>
                    </a>
                </li>
                @endif
                <!-- Online Sidebar End -->


                <!-- Subscription Sidebar Start -->
                @if(Request::segment(1) === 'Subscription' || Request::segment(1) == '' || Request::segment(1) ==
                'index')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-book"></i>
                        <span>Subscription</span>
                    </a>
                </li>
                @endif
                <!-- Subscription Sidebar End -->


                <!-- Website Management Sidebar Start -->
                @if(Request::segment(1) === 'Website' || Request::segment(1) == '' || Request::segment(1) ==
                'index')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-world"></i>
                        <span>Website Management</span>
                    </a>
                </li>
                @endif
                <!-- Website Management Sidebar End -->


                <!-- Story Pool Sidebar Start -->
                @if(Request::segment(1) === 'Story' || Request::segment(1) == '' || Request::segment(1) ==
                'index')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-buoy"></i>
                        <span>Story Pool</span>
                    </a>
                </li>
                @endif
                <!-- Story Pool Sidebar End -->


                <!-- Quick Guide Sidebar Start -->
                @if(Request::segment(1) === 'Quick' || Request::segment(1) == '' || Request::segment(1) ==
                'index')
                <li>
                    <a href="javascript:void(0);" class=" waves-effect">
                        <i class="bx bxs-help-circle"></i>
                        <span>Quick Guide</span>
                    </a>
                </li>
                @endif
                <!-- Quick Guide Sidebar End -->
                <li>
                    <a href="{{ url('emailinbox') }}" class="waves-effect">
                        <i class="bx bx-mail-send"></i>
                        <span>Mail Box</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('chat') }}" class="waves-effect">
                        <i class="bx bxs-message-rounded-dots"></i>
                        <span>Messanger</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('taskmodule/task') }}" class="waves-effect">
                        <i class="bx bx-task"></i>
                        <span>Task</span>
                    </a>
                </li>
               
                {{-- <li class="{{ (Request::segment(1) === 'taskmodule' ? 'mm-active' : '') }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user"></i>
                        <span>Task</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        
                        <li
                            class="{{ (Request::segment(2) === 'quotationadd' ? 'mm-active' : Request::segment(2) === 'requestquotationadd' ? 'mm-active' : '') }}">
                            
                            <ul class="sub-menu" aria-expanded="true">
                                <li>
                                    <a href="{{ url('taskmodule/task') }}" class="waves-effect">
                                        <i class="bx bx-task"></i>
                                        <span>Task</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('taskmodule/task/taskdetail') }}" class="waves-effect">
                                        <i class="bx bx-task"></i>
                                        <span>Task detail</span>
                                    </a>
                                </li>
                            </li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}
                
                
				<!--<li>
                    <a href="{{ url('agoraEvent/event') }}" class="waves-effect">
                        <i class="bx bx-poll"></i>
                        <span>Agora Events</span>
                    </a>
                </li> -->
                
                <!-- Setting Sidebar Start -->
                @if(Request::segment(1) === 'setting' || Request::segment(1) == '' || Request::segment(1) == 'index')
                <li class="{{ (Request::segment(1) === 'setting' ? 'mm-active' : '') }} ">
                    <a href="" class="has-arrow waves-effect">
                        <i class="bx bxs-cog"></i>
                        <span>Setting</span>
                    </a>
                    <ul class="sub-menu {{ (Request::segment(1) === 'setting' ? 'mm-collapse mm-show' : '') }}"
                        aria-expanded="true">
                        <li>
                            </ul>
                        </li>
                        <!--<li><a href="javascript: void(0);" class="has-arrow"><i class="bx bx-bullseye"></i>News Room</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('setting/timeline') }}"><i
                                            class="bx bx-radio-circle-marked"></i>Timeline
                                        Category</a></li>
                                <li><a href="{{ url('setting/story_type') }}"><i
                                            class="bx bx-radio-circle-marked"></i>Story Type</a></li>
                            </ul>
                        </li>-->
                        <li>
                            {{--class="{{ (Request::segment(2) === 'departmentadd' ? 'mm-active' : Request::segment(2) === 'designationadd' ? 'mm-active' : Request::segment(2) === 'employeetypeadd' ? 'mm-active' : Request::segment(2) === 'shiftadd' ? 'mm-active' : Request::segment(2) === 'leavetypeadd' ? 'mm-active' : Request::segment(2) === 'employeetypeadd' ? 'mm-active' : Request::segment(2) === 'allowanceadd' ? 'mm-active' : Request::segment(2) === 'professionaltaxadd' ? 'mm-active' : Request::segment(2) === 'deductiontypeadd' ? 'mm-active' : Request::segment(2) === 'holidayadd' ? 'mm-active' : '') }} ">--}}
                            <!--<a href="javascript: void(0);"
                                {{--class="has-arrow {{ (Request::segment(2) === 'departmentadd' ? 'mm-active' : Request::segment(2) === 'designationadd' ? 'mm-active' : Request::segment(2) === 'employeetypeadd' ? 'mm-active' : Request::segment(2) === 'shiftadd' ? 'mm-active' : Request::segment(2) === 'leavetypeadd' ? 'mm-active' : Request::segment(2) === 'employeetypeadd' ? 'mm-active' : Request::segment(2) === 'allowanceadd' ? 'mm-active' : Request::segment(2) === 'professionaltaxadd' ? 'mm-active' : Request::segment(2) === 'deductiontypeadd' ? 'mm-active' : Request::segment(2) === 'holidayadd' ? 'mm-active' : '') }}">--}}
                                <i
                                    class="bx bx-radio-circle-marked"></i>HR</a>-->
                                    <ul class="sub-menu" aria-expanded="true">
                                        
                                    </ul>
                        </li>
                        <li>
                            {{--class="{{ (Request::segment(2) === 'bankadd' ? 'mm-active' : Request::segment(2) === 'businesscategoryadd' ? 'mm-active' : Request::segment(2) === 'paymentmodeadd' ? 'mm-active' : '') }} ">--}}
                            <!--<a href="javascript: void(0);"
                                {{--class="has-arrow {{ (Request::segment(2) === 'bankadd' ? 'mm-active' : Request::segment(2) === 'businesscategoryadd' ? 'mm-active' : Request::segment(2) === 'paymentmodeadd' ? 'mm-active' : '') }} ">--}}
                                <i
                                    class="bx bx-bullseye"></i>Accounts</a>-->
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ url('setting/category') }}"
                                    class="{{ (Request::segment(2) === 'allowedfileadd' ? 'active' : '') }} "><i
                                    class="mdi mdi-music-note-whole"></i>Category</a></li>
                                
                                <li>
                                    <a href="{{ url('setting/tags') }}"
                                    class="{{ (Request::segment(2) === 'allowedfileadd' ? 'active' : '') }} "><i
                                    class="mdi mdi-music-note-whole"></i>Tags</a>
                                </li>
                                
                                <li>
                                    <a href="{{ url('setting/business') }}"
                                    class="{{ (Request::segment(2) === 'allowedfileadd' ? 'active' : '') }} "><i
                                    class="mdi mdi-music-note-whole"></i>Business</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                @endif
                <li class="{{ (Request::segment(1) === 'setting' ? 'mm-active' : '') }} ">
                </li>
                <!-- Setting Sidebar End -->

                <!-- <li class="menu-title">MY MENU</li>

                <li>
                    <a href="usertype" class=" waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span>User Type</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Locality</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="country">Country</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Department</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="departmentlist">Department</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Designation</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="designationlist">Designation</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Shift</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="shift">Shift</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Leave Type</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="leavetypelist">Leave Type</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Allowance</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="allowancelist">Allowance</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Professional Tax</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="professionaltaxlist">Professional Tax</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Employee Type</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="employeetypelist">Employee Type</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Deduction Type</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="deductiontypelist">Deduction Type</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Holiday</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="holidaylist">Holiday</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Document Type</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="documenttypelist">Document Type</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Allowed File Type</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="allowedfilelist">Allowed File Type</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Job Opening</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="jobopeninglist">Job Opening</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Applicant List</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="applicantlist">Applicant List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Attendance</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="attendancelist">Attendance</a></li>
                        <li><a href="shiftchangelist">Shift Change</a></li>
                        <li><a href="timechangelist">Time Change</a></li>
                        <li><a href="importattendance">Import Attendance</a></li>
                    </ul>

                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="banklist">Bank List</a></li>
                        <li><a href="businesscategorylist">Business Category</a></li>
                        <li><a href="paymentmodelist">Payment Mode</a></li>

                    </ul>

                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Orders</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="purchaseorderlist">Purchase</a></li>


                    </ul>

                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Customer</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="customerlist">Customer</a></li>
                        <li><a href="cinvoicelist">Invoice</a></li>


                    </ul>

                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Payroll</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="payroll">Dashboard</a></li>


                    </ul>

                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Employee</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="employeelist">Employee List</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Vendor</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="vendorlist">Vendor List</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Invoice</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="invoicelist">Invoice List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Quotation</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="quotationlist">Quotation List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Request Quotation</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="requestquotationlist">Request Quotation List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Leave Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="leaveapplicationlist">Leave Applicantion</a></li>
                        <li><a href="leavecreditadd">Leave Credit</a></li>
                        <li><a href="leavereportlist">Leave Report</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Attendance</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="attendancelist">Attendance Report</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Payroll Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="payrolllist">Process Payroll</a></li>
                        <li><a href="managesalarylist">Manage Salary</a></li>
                        <li><a href="salaryregisterlist">Salary Register</a></li>
                        <li><a href="bonuslist">Manage Bonus</a></li>
                        <li><a href="deducationlist">Manage Deduction</a></li>
                        <li><a href="incrementlist">Manage Increment</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Download From</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="formsixteenadd">From-16</a></li>
                    </ul>
                </li> -->





            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->