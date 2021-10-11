<script>
    $(document).ready(function(){
       
        var page = 1;
        var hasMoreBlog=true;
        loadMore(page,id,search);

        // scroll events
        $(window).scroll(function() { 
            if($(window).scrollTop() + $(window).height() >= ( $(document).height() - $('.site-footer').height() )) { 
                page++; 
                if(hasMoreBlog){
                    loadMore(page,id,search); 
                }
                
            }
        });  

        // load more data
        function loadMore(page,id){
          
            var url="{{route('blog.list')}}";
                url+='?page='+page;
                if(id !="") {
                    url+="&id="+id;
                }
                if(search !="") {
                    url+="&search="+search;
                }

            $.ajax({
                    type: 'get',
                    url:url ,
                    dataType: 'json',
                    async: true,
                    beforeSend: function() {
                        $('.ajax-loading').show();
                    },
                    success: function(data) {
                    
                        if(data.html.length == 0){
                            $('.ajax-loading').html("No More Blogs..!!!");
                            hasMoreBlog=false;
                            return;
                        }
                        $("#results").append(data.html);          
                    },
                    error: function(XMLHttpRequest, errorStatus, errorThrown) {
                        console.log("XHR :: " + JSON.stringify(XMLHttpRequest));
                        console.log("Status :: " + errorStatus);
                        console.log("error :: " + errorThrown);
                    },
                    complete: function() {
                        $('.ajax-loading').hide(); 
                    },
                });
        }
       
    });
</script>