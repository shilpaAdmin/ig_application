


<!-- model -->
<div class="modal fade" id="hours-popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hours Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <div class="row">
               <div class="col-md-12">
                   @if (isset($hoursData))
                        <ul>
                            @php
                                $weekStr=[];
                            @endphp
                            @foreach ($hoursData as $key =>$hour)
                                @php
                                
                                    if("DisplaySun"==$key){
                                        $weekStr['g']="Sunday ".$hour;
                                    } else if("DisplayMon"==$key){
                                        $weekStr['a']="Monday  ".$hour;
                                    } else  if("DisplayTue"==$key){
                                        $weekStr['b']="Tuesday ".$hour;
                                    } else  if("DisplayWed"==$key){
                                        $weekStr['c']="Wednesday ".$hour;
                                    } else  if("DisplayThur"==$key){
                                        $weekStr['d']="Thursday ".$hour;
                                    } else  if("DisplayFri"==$key){
                                        $weekStr['e']="Friday ".$hour;
                                    } else if("DisplaySat"==$key){
                                        $weekStr['f']="Saturday ".$hour;
                                    }
                                
                                    
                                @endphp
                            @endforeach
                            @php
                                 ksort($weekStr);
                            @endphp
                            @foreach ($weekStr as $item)
                                <li>{{$item}}</li>
                            @endforeach
                        </ul>
                   @endif
               </div>
           </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary background_green" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>