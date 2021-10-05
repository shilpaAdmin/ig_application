
<!-- JAVASCRIPT -->
    <script src="{{ URL::asset('assets/frontend/js/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('assets/frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ URL::asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{ URL::asset('assets/frontend/js/waypoints.min.js')}}"></script>
    <script src="{{ URL::asset('assets/frontend/js/jquery.counterup.min.js')}}"></script>
    <script src="{{ URL::asset('assets/frontend/js/TweenMax.min.js')}}"></script>
    <script src="{{ URL::asset('assets/frontend/js/wow.js')}}"></script>
    <script src="{{ URL::asset('assets/frontend/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ URL::asset('assets/frontend/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{ URL::asset('assets/frontend/js/swiper.min.js')}}"></script>
    <script src="{{ URL::asset('assets/frontend/js/typed-2.0.11.js')}}"></script>
    <script src="{{ URL::asset('assets/frontend/js/vegas.min.js')}}"></script>
    <script src="{{ URL::asset('assets/frontend/js/jquery.validate.min.js')}}"></script>
    <script src="{{ URL::asset('assets/frontend/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ URL::asset('assets/frontend/js/countdown.min.js')}}"></script>
    <script src="{{ URL::asset('assets/frontend/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{ URL::asset('assets/frontend/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ URL::asset('assets/frontend/js/nouislider.min.js')}}"></script>
    <script src="{{ URL::asset('assets/frontend/js/isotope.js')}}"></script>
    <script src="{{ URL::asset('assets/frontend/js/appear.js')}}"></script>


    <!-- template scripts -->
    <script src="{{ URL::asset('assets/frontend/js/theme.js')}}"></script>
@yield('script')
<script>
    $(document).ready(function(){
        $(function()
        {
            $.ajaxSetup({
            headers:{'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            });
        });

        $.ajax({
            type:'GET',
            url:'{{route("CategoryData")}}',
            dataType:'json',
            async:true,
            beforeSend : function()
            {
                $("#fullImageDivLoader img").show();	// Show loader
            },
            success:function(data)
            {
                $("#fullImageDivLoader img").hide();	// Show loader
                var html='';
                $.each(data.Result, function (i) {
                    /*$.each(data.Result[i], function (key, val) {
                     //alert(key + val);
                        alert()
                    });*/

                    var arr=[17,67,69,68];

                    var id=data.Result[i]['Id'];
                    var name=data.Result[i]['Name'];
                    var icon=data.Result[i]['Icon'];
                    console.log(data.Result[i]['Icon']);

                    html+='<div class="col-xl-2 col-lg-4 col-md-6"><div class="explore_categories_single wow fadeInUp animated" data-wow-delay="0ms"data-wow-duration="1200ms"style="visibility: visible; animation-duration: 1200ms; animation-delay: 0ms; animation-name: fadeInUp;"><div class="explore_categories_image"><img src='+icon+' alt=""></div><div class="explore_categories_content"><h3>'+name+'</h3><p>0 Listings</p><button class="explore_categories_arrow"><span type="button" data-toggle="modal" data-target="#exampleModal"class="icon-right-arrow"></span></button></div></div></div>';
                });
                $('.catagorimain').html(html);

               /* <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                              aria-hidden="true">
                              <div class="modal-dialog modal-lg modal-dialog-centered">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Housing Categories</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <div class="w-50 float-left"> <a class=" a_cat_color" href="housing-listing-grid.html"><i class="fas fa-angle-right"></i> House For Rent</a> </div>
                                          <div class="w-50 float-left"> <a class=" a_cat_color" href="#"> <i class="fas fa-angle-right"></i> AC Service & Repair</a> </div>
                                          <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Washing Machine Repairs</a> </div>
                                          <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Air Cooler Dealers</a> </div>
                                          <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Audio Visual Equipment Dealers</a> </div>
                                          <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Industrial Voltage Stabilizers Dealers</a> </div>
                                          <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Solar Water Heaters</a> </div>
                                          <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Fire Fighting Equipment</a> </div>

                                          <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Washing machine dealers</a> </div>
                                          <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Microwave Oven Dealers</a> </div>
                                          <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Firefighting Equipment Dealers</a> </div>
                                          <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Water Dispenser Dealers</a> </div>
                                          <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Modular Kitchen Dealers</a> </div>

                                          <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Generators Dealers</a> </div>
                                          <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Gas Water Heater Dealers</a> </div>
                                          <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Sign Board Agencies</a> </div>
                                          <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Mixer Grinder Dealers</a> </div>



                                      </div>
                                  </div>
                              </div>
                          </div>*/
            },
            error:function(XMLHttpRequest, errorStatus, errorThrown)
            {
                console.log("XHR :: "+JSON.stringify(XMLHttpRequest));
                console.log("Status :: "+errorStatus);
                console.log("error :: "+errorThrown);
                $("#fullImageDivError").text('There is something wrong. Please try again');
                $("#fullImageDivError").show();
            }
        });
    });
</script>
<!-- App js -->
<!--<script src="{{ URL::asset('assets/js/app.min.js')}}"></script>-->
@yield('script-bottom')
