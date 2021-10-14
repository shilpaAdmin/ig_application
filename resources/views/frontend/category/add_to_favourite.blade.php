<script>

    $(document).ready(function () {
        $(document).on('click','.add-to-favourite',function(e){
            e.preventDefault();
            console.log("fevrit token");
            console.log(user);
            console.log(token);
            if( !(typeof user === 'undefined')&& !(typeof token==='undefined') ){
                console.log("calli fav");
                var businessId=$(this).attr('data-businessid')
                $.ajax({
                    url: "{{ route('UserFavouriteBusiness') }}",
                    type:"POST",
                    datatype:"json",
                    headers: {"Authorization": 'Bearer '+token },
                    data: {
                        'RegisterId':user.Id,
                        'ListId':businessId,
                        'created_by':user.Id,
                        'last_updated_by':user.Id,
                        'status':'active'
                    },
                    success:function(response){
                        if(response.Status){
                            swal("Done!","Job Add To Favourite Succesfully..!!","success");
                        }else{
                            swal("Warning", "There is something wrong please try after some time", "error");
                        }
                    },
                    error: function(response) {
                        console.log('error');
                        console.log(response);
                    }
                });
            }
        });

        $("body").on('click','.open-hour-popup',function(e){
            e.preventDefault();
            $('#hours-popup').modal('toggle');
        });

    });
</script>