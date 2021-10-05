<?php
$storyListArray = array('top_news'=>'Top News','news_update'=>'News Update','justin'=>'Justin',
        'video_header_videoline'=>'Video Header Videoline','photo_header_photoline'=>'Photo Header Photoline',
        'photo_photoline'=>'Photo Photoline','photo_album'=>'Photo Album',
        'text_with_header'=>'Text With Header','big_headlines'=>'Big Headlines',
        'thread'=>'Thread','audio'=>'Audio','story_album'=>'Story Album','poll_performance'=>'Poll Performance',
        'company_headlines'=>'Company Headlines','contact_card'=>'Contact Card','stoke_up'=>'Stoke Up',
        'full_screen'=>'Full Screen','weekend'=>'Weekend','heading_with_two_photo'=>'Heading With Two Photo',
        'stokes_scroll'=>'Stokes Scroll','heading_with_stokes'=>'Heading With Stokes','bullets'=>'Bullets',
        'big_box'=>'Big Box','short'=>'Short','five_question'=>'Five Question','heading_with_four_photo'=>'Heading With Four Photo','before_and_after'=>'Before And After','headlines'=>'Headlines','photo_mapping'=>'Photo Mapping','remind_me'=>'Remind Me','insider'=>'Insider','spliter'=>'Spliter','count_down'=>'Count Down','breaking_news'=>'Breaking News','poll'=>'Poll','survey'=>'Survey','cube'=>'Cube','notification'=>'Notification');
?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" id="mainButtonId" style="display:none;">
</button>

<!-- Story Type Modal Starts -->
<div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
<div class="modal-content">
   <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Select Story Type</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <div class="switcher switch_box" style="padding-left: 8px;">
            <a href="javascript:;" id="grid-view" class="grid-view active-grid" onclick="changeGrid('grid_view')"><i class="mdi mdi-view-grid-outline"></i></a>
            <a href="javascript:;" class="list-view" id="list-view" onclick="changeGrid('list_view')"><i class="mdi mdi-format-list-bulleted"></i></a>
         </div>
      </button>
      <a href="javascript:;" id="closePopupHrefId" onclick="closeStoryTypePopup('add_page')" class="close"><i class="mdi mdi-close-circle-outline"></i></a>
   </div>
   <div class="modal-body">
      <div class="row  align-items-end">
         <div class="col-12 p-0" >
            <div class="story_list">
               <div id="block-listings">
                  <ul class="listings grid switch_radio" id="storyListUlId" style="padding:0px;" >
                     <div class="main_parent" style="padding:10px;">
                        @foreach($storyListArray as $key=>$value)
                        <li class="" id="storyLiId_{{$key}}">
                           <div class="form-check">
                              <div class="news_list">
                                 <input class="form-check-input" type="radio" name="storyTypeList" id="newstype" value="{{ $key }}" >
                                 <img src="../../../images/storyListIcon/svgtopng/{{$key}}.png" alt="" srcset="" style="width:20px; margin: 0 auto; margin-bottom: 5px;">
                                 <label class="form-check-label" for="storyTypeList{{$key}}" id="storyTypeListLabel{{$key}}">
                                 {{$value}}
                                 </label>
                              </div>
                           </div>
                        </li>
                        @endforeach
                        <div>
                  </ul>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Story Type Modal Ends -->