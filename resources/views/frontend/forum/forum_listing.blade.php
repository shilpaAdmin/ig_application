@extends('frontend.layouts.master')
@section('title') Forum @endsection
@section('content')

        <div class="preloader">
            <img src="{{ URL::asset('assets/frontend/images/loader.png')}}" class="preloader__image" alt="">

        </div><!-- /.preloader -->

        <div class="page-wrapper">
            <section class="page-header backgroundimgforum">
                <div class="overlayforcontactbg"></div>
                <div class="container">
                    <h2 class="h2_oth_pgs">Forum listing</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('/')}}">Home</a></li>
                        <li><span>Forum</span></li>
                    </ul>
                </div>
            </section>

            <section class="forum_padding mb-20 pt-5 mt-2 pt-2">
                <div class="container" id="results">
                    {{-- @include('frontend.forum.forum-list')                  --}}
                </div>
                <div class="ajax-loading" style="text-align:center;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATYAAACjCAMAAAA3vsLfAAAAz1BMVEX////6+vr89PT+/Pz87OL86Nr89vaxvIL4sXv8///l6NbM1c2istT4r3b2l3f9lamwwdft8OX+9/SYlcuwu9XV2uajtNLO1eS4xNfz8+z19fGxvIXM07utuXyyvIrEy6j98Ov66ur707n84c/f3sb3pmW2wZX5u4z3rob5wJb4q2/86OP5y6/71b398+z64uH219L3p4v1nYD6vK32kXH2tKH2oZP1zcP4s6r1w7T7sbj9i6L7nq7Y2tX4xsjh5eXh5+38v8mpq9Khnc61tNbzoKeKAAACnElEQVR4nO3Za1PaQBiG4d0EA4EECKBgkIq1Vm1toK2lrVCh6P//Td1NsuXUAn6KGe7LmRw2+bDzzLuHoBAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgJyz7ax7kEe2ZZHbC5yexifHspz4gqrbR9jtnemzia1RKJDbbkGvGOdmKSJOrdDIuk85EL4pFnuBqTZbpUa17eO8WCyem9j6KrV+1j3KhUDF1rXTlZRi2+3i7aWO6F2v15XpCmpmtkZEeP9z5ftXdyqe8vsz0xT19XLaP1Iy7Njrdu2XSn5pc93UoR0VMuhQPlg3Orfb9eZCHBuDdIlcubOuP/j+jRW3S/PIjmstSU2uvn+w1mP4eHf7ab09KkRseFfpeGRaQ1K6riuEq+/1n36QPEpaFq8ffM3JZODpWFz3YjCwFvfpVXyyndBZff2wmTlMnYefq9Xql6+WaTe1JaQdlLWGMI0bY/vQpINPHaP7qnb/bdFuYktSK5eXUz5sS9U2SnL77qb3i9jCJLWAajMW4Qjn8sdo9LPvmrAWsckwCspBaEvmttTy0qgXUleYBXQpUHVQn/Zplqyk/+L0Nz4HpCMZllsNHsbjibPaJiuVyi/+HbPF47hWq03WPgl0bJXKNJse5cFQpzZ+XG+ekttWOrXaUF3M/o5TGapDGOeWXb9euYfa5Lcaoc68OTdNnXpb/9A7pdp2em42n9Reo9WSOrZ6J+v+5EO72dTVdux5x3FsdepsH3MVW1uIlue11CynYuuw+dht9qSKTQ3PE887UbOaLje2urvN1Mw2EyY2EarcZtn2KBfs1rPedIiO58WLQdhuZ9uhfGl7Hnm9nN1hKQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACA3PsD/R0hdMCZUboAAAAASUVORK5CYII=" /></div>
            </section>
        </div><!-- /.page-wrapper -->
@endsection

@section('script')

<script>
    $(document).ready(function(){
        
        var page = 1;
        var hasMoreData=true;
        loadMore(page);

        // scroll events
        $(window).scroll(function() { 
            if($(window).scrollTop() + $(window).height() >= ( $(document).height() - $('.site-footer').height() )) { 
                page++; 
                if(hasMoreData){
                    loadMore(page); 
                }
            }
        });  

        // load more data
        function loadMore(page){
            
            var url="{!!route('ForumList')!!}";
            url+='?page='+page;

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
                        hasMoreData=false;
                        $('.ajax-loading').html("No more records!");
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
@endsection
