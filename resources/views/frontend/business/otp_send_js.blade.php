<script>
    $(document).ready(function() {
        $('#Businesscategory').on('change', function() {
            var businesscatID = $(this).val();
            // alert(businesscatID);
            if (businesscatID) {
                $.ajax({
                    url: '/business/sub/category/' + businesscatID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        if (data) {
                            $('#Subcategory').empty();
                            $('#Subcategory').append(
                                '<option value="">--Sub-Category--</option>');
                            $.each(data, function(key, value) {
                                $('select[name="subcategory"]').append(
                                    '<option value="' + key + '">' + value
                                    .name + '</option>');


                            });
                        } else {
                            $('#Subcategory').empty();
                        }
                    }
                });
            } else {
                $('#applicantdata').empty();
            }
        });

        $("body").on('click', '#Getotp', function(event) {


            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            $.ajax({
                url: "{{ route('Business.requestOtp') }}",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {

                },
                success: function(data) {

                    $('#BusinessForm').hide();
                    $('#BusinessFormHideTitle').hide();
                    $('#verifiedEmailForm').hide();
                    $('#verifyform').show();

                }
            })
        });


        //verify otp

        $("body").on('click', '#verifyOtp', function(event) {

            firstbox = $("#firstbox").val();
            secondbox = $("#secondbox").val();
            thirdbox = $("#thirdbox").val();
            fourthbox = $("#fourthbox").val();

            verifyemail = $("#verifyemail").val();


            var str = firstbox + secondbox + thirdbox + fourthbox;


            $.ajax({
                url: "{{ route('Business.otpverify') }}",
                type: 'POST',
                dataType: "json",
                data: {
                    'otp': str,
                    'email': verifyemail
                },
                success: function(response) {

                    $('#verifiedEmailForm').show();
                    $('#verifyform').hide();

                }
            });
        });


        //verified email
        $("body").on('click', '#submitData', function(event) {

            event.preventDefault();
            $('#Business-store').submit();
        });


        $("body").on("keypress", ".otpverify", function(e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            } else {
                $(this).parent().next().find('input').focus();
            }
        });
        $(".inputs").keyup(function() {
            if (this.value.length == this.maxLength) {
                $(this).next('.inputs').focus();
                $(this).parent().next().find('input').focus();
            }
        });
    });
</script>
