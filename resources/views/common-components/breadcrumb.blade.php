 <div class="row d-flex align-items-center justify-content-between">
     <div class="col-6">
         <div class="page-title-box ">
             <h4 class="mb-0 font-size-18">{{ $title }}</h4>
             @if(isset($li_2))
             <div class="page-title-right">
                 <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item active">{{ $li_1 }}</li>
                     @if(isset($li_2))
                     <li class="breadcrumb-item">{{ $li_2 }}</li>
                     @endif
                 </ol>
             </div>
             @endif
         </div>
     </div>
     <div class="col-6">
         <div class="d-flex align-items-left justify-content-end">
             @if(isset($add_btn))
             <li class="breadcrumb-item">{{ $add_btn }}</li>
             @endif
         </div>
     </div>

 </div>
 <div class="row">
 </div>