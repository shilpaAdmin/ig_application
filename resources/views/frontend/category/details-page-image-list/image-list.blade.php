<div class="container-full-width">
    <div class="thm__owl-carousel owl-carousel owl-theme" data-options='{"margin":3, "loop": true, "smartSpeed": 700, "autoplay": true, "autoplayHoverPause": true, "autoplayTimeout": 5000, "items": 3,"responsive": {
        "0": {
            "items": 1
        },
        "480": {
            "items": 2
        },
        "992": {
            "items": 3
        }
    }}'>

    @php
        if (isset($businessData['media_file_json']) && !empty($businessData['media_file_json'])) {
            $attachmentArray = json_decode($businessData['media_file_json'], true);
        } else {
            $attachmentArray = [];
        }
        $q = 1;
    @endphp
    @if (count($attachmentArray) > 0)
      @for ($k = 0; $k < count($attachmentArray); $k++)
      <div class="item">
          <div class="listings_details_main_image_box_single">
              <div class="listings_details_main_image_box__img">
                  <img src="{{ URL::asset('images/business/'.$attachmentArray[$k]['Media'.($k+1)]) }}" alt="">
              </div>
          </div>
      </div>
      @endfor
    @endif
        {{-- <div class="item">
            <div class="listings_details_main_image_box_single">
                <div class="listings_details_main_image_box__img">
                    <img src="{{ URL::asset('assets/frontend/images/listings/tax-1.jpg')}}" alt="">
                </div>
            </div>
        </div>
        <div class="item">
            <div class="listings_details_main_image_box_single">
                <div class="listings_details_main_image_box__img">
                    <img src="{{ URL::asset('assets/frontend/images/listings/tax-2.jpg')}}" alt="">
                </div>
            </div>
        </div>
        <div class="item">
            <div class="listings_details_main_image_box_single">
                <div class="listings_details_main_image_box__img">
                    <img src="{{ URL::asset('assets/frontend/images/listings/tax-3.jpg')}}" alt="">
                </div>
            </div>
        </div> --}}
    </div>
</div>