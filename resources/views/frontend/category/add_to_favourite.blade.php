<script>

    $(document).ready(function () {
        $(document).on('click','.add-to-favourite',function(e){
            e.preventDefault();
            
            console.log("fevrit token");
            console.log("calli fav");
            console.log(user);

            var $this= $(this);
            var businessId=$(this).attr('data-businessid')

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
            });

            $.ajax({
                url: "{{ route('user.businessfevourite') }}",
                type:"POST",
                datatype:"json",
                data: {
                    'RegisterId':user['user']['Id'],
                    'ListId':businessId,
                    'created_by':user['user']['Id'],
                    'last_updated_by':user['user']['Id'],
                    'status':'active'
                },
                success:function(response){
                    if(response.unfavourite){
                        $this.addClass('empty_heart_icon');
                    } else {
                        $this.removeClass('empty_heart_icon');
                    }
                },
                error: function(response) {
                    console.log('error');
                    console.log(response);
                }
            });
           
        });

        $("body").on('click','.open-hour-popup',function(e){
            e.preventDefault();
            $('#hours-popup').modal('toggle');
        });

    });
</script>