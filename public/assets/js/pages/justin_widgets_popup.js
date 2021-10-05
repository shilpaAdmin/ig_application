//showStoryTypePopup('first_time');
    function showStoryTypePopup(action)
    {
        //alert('action ::: '+action);
        $("#exampleModalCenter").show();
        $("body").append('<div class="modal-backdrop fade show"></div>');
    }
	
    $("input[name='storyTypeList']").change(function()
    {
        var storyType = $(this).val();
        var storyListText = $("#storyTypeListLabel"+storyType).text();
        $("#selectedStoryType").text(storyListText);
        
        switch(this.value)
        {
            case 'breaking_news':
                var url = "/newsroom-justIn/breaking_news_justin";                    
            break;
            case 'poll':
                var url = "/newsroom-justIn/poll";
            break;
            case 'survey':
                var url = "/newsroom-justIn/survey";
            break;
            case 'cube':
                var url = "/newsroom-justIn/cube_justin";
            break;
            case 'notification':
                var url = "/newsroom-justIn/notificationfeed_justin";
            break;
            default:
                var url = "/newsroom-justIn/justInTimeline_justin";
            break;
        }
        window.open(url,"_self");
    });
    function closeStoryTypePopup(callFrom)
    {
        $("#exampleModalCenter").hide();
        $(".modal-backdrop").remove();
    }
    function changeGrid(mode)
{
    //alert('if :::: '+mode);
    $("input[name='storyTypeList']").removeClass();
    if(mode == 'grid_view')
    {
        $("input[name='storyTypeList']").addClass('form-check-input');
    }
}
var 
    // General purpose vars
    $htmlBody = $('html, body'),
    $window = $(window),
    $document = $(document),
    $switcher = $('.switcher'),

    // Switcher
    switcher = function() {
        $switcher.find('a').click( function(e) {
          var $target = $(e.currentTarget);
          if(!$target.hasClass('active-grid')) {
            $switcher.find('a').toggleClass('active-grid');
            $('#block-listings ul').toggleClass('list grid');
          }
        });
    },

    ready = function() {
        //externalLinks();
        switcher();
    };

$document.ready(ready);