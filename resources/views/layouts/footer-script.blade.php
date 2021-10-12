<!-- JAVASCRIPT -->
<script src="{{ URL::asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/pages/bootstrap.bundle.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/metismenu/metismenu.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/pages/sweetalert.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/pages/sweetalert.js')}}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.nestable.js')}}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.nestable.min.js')}}"></script>
<!-- Init js-->
<script src="{{ URL::asset('assets/js/pages/datatables.init.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/pages/daterangepicker.min.js')}}"></script>


@yield('script')
<!-- App js -->
<script src="{{ URL::asset('assets/js/app.min.js')}}"></script>
<script>

    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });

    function openNav()
    {
        //document.getElementById("custom_saction_filter").style.right = "0";
        var x = document.getElementById("custom_saction_filter");
        if (x.style.right === "")
        {
            document.getElementById("custom_saction_filter").style.right = "0";
        }
        else if (x.style.right === "0px")
        {
            document.getElementById("custom_saction_filter").style.right = "-280px";
        }
        else if (x.style.right === "-280px")
        {
            document.getElementById("custom_saction_filter").style.right = "0";
        }
    }

    function closeNav()
    {
       document.getElementById("custom_saction_filter").style.right = "-280px";
    }

</script>

@yield('script-bottom')
