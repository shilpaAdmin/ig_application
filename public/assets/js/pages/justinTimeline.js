/* https://codepen.io/j2trumpet/pen/pjowjK */
/* https://jsfiddle.net/mkjw5raq/1/ */
var $repeater = $('.repeaterBullets').repeater({
    repeaters: [{
        selector: '.inner-repeater',
        show: function () {
        $(this).slideDown();
        },
        hide: function (deleteElement) {
            if (confirm('Are you sure you want to delete this element?')) {
                $(this).slideUp(deleteElement);
            }
        },
        isFirstItemUndeletable: true,
        repeaters: [{ 
            selector: '.deep-inner-repeater',
            show: function () {
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                if (confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            isFirstItemUndeletable: true,
        }]
    }],
});
var isShowOnlyAudio = 0;
var isCreditLogoCall = 0;
var assignAspectRatio = 1;
var currentImageMappingPoint = '';
var headingOrSubHeading = '';

function point_it(event)
{
    pos_x = event.offsetX?(event.offsetX):event.pageX-document.getElementById("canvas").offsetLeft;
    pos_y = event.offsetY?(event.offsetY):event.pageY-document.getElementById("canvas").offsetTop;
    //alert('pos_x ::: '+pos_x+' pos_y ::: '+pos_y);
    document.getElementById("cross").style.left = (pos_x - 6).toString() + "px";
    document.getElementById("cross").style.top = (pos_y - 10).toString() + "px";
    document.getElementById("cross").style.visibility = "visible" ;
    
//    var photoMappingHeadingCount = $("input[name*=photoMappingHeading]").length;
//    for(var k =0; k < photoMappingHeadingCount; k++)
//    {
//        var photoMappingHeading = $('input[name="group-i['+k+'][photoMappingHeading]"]').val();
//        var photoMappingSubHeading = $('input[name="group-i['+k+'][photoMappingSubHeading]"]').val();
//    }
    if(currentImageMappingPoint != '')
    {
        var photoMappingHeadingX = currentImageMappingPoint+'[photoMappingHeadingX]';
        var photoMappingHeadingY = currentImageMappingPoint+'[photoMappingHeadingY]';
        
        var photoMappingSubHeadingX = currentImageMappingPoint+'[photoMappingSubHeadingX]';
        var photoMappingSubHeadingY = currentImageMappingPoint+'[photoMappingSubHeadingY]';
        
        if(headingOrSubHeading == 'heading')
        {
            $('input[name="'+photoMappingHeadingX+'"]').val(pos_x);
            $('input[name="'+photoMappingHeadingY+'"]').val(pos_y);
        }
        else
        {
            $('input[name="'+photoMappingSubHeadingX+'"]').val(pos_x);
            $('input[name="'+photoMappingSubHeadingY+'"]').val(pos_y);
        }
    }
    addTextOnImage('','','afterImage');
}
function addTextOnImage(input,action,mode)
{
    //alert('input ::: '+input+' action ::: '+action+' mode ::: '+mode);
    if(mode != 'afterImage')
    {
        var currentName = $(input).attr('name');
        var counterNumber = currentName.substring(0, 10);
        currentImageMappingPoint = counterNumber;
        headingOrSubHeading = action;
    }
    var canvas = document.getElementById('canvas'),
    ctx = canvas.getContext('2d');
    canvas.width = $('#photoMappingImageId').width();
    console.log('canvas.width :::: '+canvas.width);
    canvas.crossOrigin = "Anonymous";
    canvas.height = $('#photoMappingImageId').height();
    //ctx.drawImage($('#photoMappingImageId').get(0), 0, 0);
    ctx.clearRect(0,0,canvas.width,canvas.height);
    
    var imgMapping = new Image();
    imgMapping.src= $('#photoMappingImageId').attr('src');
   // alert(imgMapping.src);
    ctx.drawImage(imgMapping,0,0,imgMapping.width,imgMapping.height,0,0,307,307);
    
    var photoMappingHeadingCount = $("label[name*=photoMappingHeadingLabelId]").length;
    for(var k =0; k < photoMappingHeadingCount; k++)
    {
        var photoMappingHeading = $('input[name="group-i['+k+'][photoMappingHeading]"]').val();
        var photoMappingSubHeading = $('input[name="group-i['+k+'][photoMappingSubHeading]"]').val();
        var photoMappingHeadingX = $('input[name="group-i['+k+'][photoMappingHeadingX]"]').val();
        var photoMappingHeadingY = $('input[name="group-i['+k+'][photoMappingHeadingY]"]').val();
        var photoMappingSubHeadingX = $('input[name="group-i['+k+'][photoMappingSubHeadingX]"]').val();
        var photoMappingSubHeadingY = $('input[name="group-i['+k+'][photoMappingSubHeadingY]"]').val();
        var photoMappingHeadingColor = $('select[name="group-i['+k+'][photoMappingHeadingColor]"]').val();
        var photoMappingSubHeadingColor = $('select[name="group-i['+k+'][photoMappingSubHeadingColor]"]').val();
        
        for(var p =0; p <= 1; p++)
        {
            console.log('p '+p);
            if(p == 0)
            {
                ctx.font = "16px Verdana";
                console.log('heading ::: '+ctx.font+' action '+action+' p ::: '+p);
            } 
            else
            {
                ctx.font = "12px Verdana";
                console.log('sub heading ::: '+ctx.font+' action '+action+' p ::: '+p);
            }
            if(p == 0)
            {
                ctx.fillStyle = photoMappingHeadingColor;
            }
            else
            {
                ctx.fillStyle = photoMappingSubHeadingColor;
            }
            if(p == 0)
            {
                if(photoMappingHeadingX != '' && photoMappingHeadingY != '')
                {
                    ctx.fillText(photoMappingHeading, photoMappingHeadingX, photoMappingHeadingY);
                }
                else
                {
                    ctx.fillText(photoMappingHeading, 10, 50);
                }
            }
            else
            {
                if(photoMappingSubHeadingX != '' && photoMappingSubHeadingY != '')
                {
                    ctx.fillText(photoMappingSubHeading, photoMappingSubHeadingX, photoMappingSubHeadingY);
                }
                else
                {
                    ctx.fillText(photoMappingSubHeading, 10, 50);
                }
            }
        }
    }
}
$(document).ready(function()
{
    
    $("#timepicker").change(function()
    {
        checkFutureDateValidation();
        previewFunction();
    });

    $("#modal").modal({
        backdrop: 'static',
        keyboard: false
    });
        
    $(".addDescription").on('click' ,function()
    {
        updateAddButtonName('story');
    });
    $("#multipleImagesAddDivId").on('click' ,function()
    {
        updateAddButtonName('story');
    });
    $(".addThreadDescription").on('click' ,function()
    {
        updateAddButtonName('story');
    });
    $(".addStockForm").on('click' ,function()
    {
        updateAddButtonName('stock_form');
    });
    $(".addPollPerformanceForm").on('click' ,function()
    {
        updateAddButtonName('poll_performance');
    });
    $(".addStokeUpForm").on('click' ,function()
    {
        updateAddButtonName('stoke_up_form');
    });
    $(".addWeekendForm").on('click' ,function()
    {
        updateAddButtonName('weekend_form');
    });
    $(".addQuestionAnswerForm").on('click' ,function()
    {
        updateAddButtonName('question_answer');
    });
    $(".addAfterDescription").on('click' ,function()
    {
        updateAddButtonName('after_pointer');
    });
    $(".addPhotoMapping").on('click' ,function()
    {
        updateAddButtonName('photo_mapping');
    });
    $(".addBulletsPointerButtonId").on('click' ,function()
    {
        headlinesPointerCounter = $(this).parent().parent().find('textarea[name*=txtBulletDescription]').length;
        updateAddButtonName('bullets_pointer');
    });
    $(".addBulletsHeadlineButtonId").on('click' ,function()
    {
        updateAddButtonName('bullets_heading');
        $(".addBulletsPointerButtonId").on('click' ,function()
        {
            headlinesPointerCounter = $(this).parent().parent().find('textarea[name*=txtBulletDescription]').length;
            updateAddButtonName('bullets_pointer');
        });
    });
    
  $("#accordion").click(function(){
    $("news_action").toggle();
  });
});


var today = new Date(); 
var dd = today.getDate(); 
var mm = today.getMonth()+1; //January is 0! 
var yyyy = today.getFullYear(); 
if(dd<10){ dd='0'+dd } 
if(mm<10){ mm='0'+mm } 
var currentTimeWithJs = today.getHours()+':'+today.getMinutes();
var today = dd+'/'+mm+'/'+yyyy; 

var tempToday = mm+'/'+dd+'/'+yyyy; 
var currentToday = yyyy+'-'+mm+'-'+dd; 
if(editMinDate != '')
{
    if(today > editMinDate)
        today =  editMinDate;  
}
$("#just_date").daterangepicker({
   locale: {
         format: 'DD/MM/YYYY',
   },
    singleDatePicker: true,
    showDropdowns: true,
    autoApply: true,
    minDate:today
    },function(start, end, label) 
    {
        checkFutureDateValidation();
        hideErrorMessage('errorJustDate');
    });
 
 $("#countDownDateTime").daterangepicker({
   locale: {
         format: 'DD/MM/YYYY hh:mm A',
   },
    timePicker: true,
    singleDatePicker: true,
    showDropdowns: true,
    autoApply: true,
    minDate:today+' '+currentTimeWithJs
    },function(start, end, label) 
    {
        countdown();
        hideErrorMessage('errorCountDownDateTime');
});
$("#story_date").daterangepicker({
    locale: {
        format: 'DD/MM/YYYY',
    },
    singleDatePicker: true,
    showDropdowns: true,
    autoApply: true,
});
    
    document.getElementById("audio_file").addEventListener("change", handleFiles, false);
    function handleFiles(event) 
    {
        pageLoad = 0;
        if(isAudio($('#audio_file').val()))
        {
            $("#hdnAudioFile").val(1);
            $("#dummyAudioFileAudioId").hide();
            $("#userAudioFileAudioId").show();
            var files = event.target.files;
            $("#audioSourceId").attr("src", URL.createObjectURL(files[0]));
            $("#userAudioFileAudioId").trigger('load');
            
            var fileSize = files[0].size;
            var imageSizeInMb = (fileSize / (1024*1024)).toFixed(2)+' MB';
                
            $('#audioFileNameLabel').text('Image name : ');
            $('#audioFileNameSpan').text(' '+files[0].name);
            $('#audioFileNameLabel').show();

            $('#audioFileSizeLabel').text('Image Size : ');
            $('#audioFileSizeSpan').text(imageSizeInMb);
            $('#audioFileSizeLabel').show();
        }
        else
        {
            $("#hdnAudioFile").val(0);
            $("#dummyAudioFileAudioId").show();
            $("#userAudioFileAudioId").hide();
            swal("Sorry", "Sorry you can upload only audio", "error");
            $("#audio_file").val(null);
        }
    }
    function closeStoryTypePopup(callFrom)
    {
        if(callFrom == 'add_page')
        {
            var storyTypeList = $('input[name="storyTypeList"]:checked').val();
            if(storyTypeList == undefined)
            {
                $('input:radio[name="storyTypeList"][value=top_news]').prop('checked', true).trigger("change");

            }
        }
        
        $("#exampleModalCenter").hide();
        $(".modal-backdrop").remove();
    }
    function showStoryTypePopup(action)
    {
        if(action == 'first_time')
        {
            $("#passcodeModal").show();
            $("body").append('<div class="modal-backdrop fade show"></div>');
        }
        else
        {
            $("#exampleModalCenter").show();
            $("body").append('<div class="modal-backdrop fade show"></div>');
        }
    }
    
    function showLibraryImagesPopup(mode,input)
    {
        isShowOnlyAudio = isCreditLogoCall = isShowOnlyAudio = 0;
        if(mode == 1)
        {
            isShowOnlyAudio = 1;
        }
        else if(mode == 2)
        {
            isCreditLogoCall = 1;
        }
        else
        {
            isShowOnlyAudio = 0;
        }
        if(mode == 0)
        {
            var currentFileImageName = $(input).attr('name');
            var counterNumber = currentFileImageName.substring(0, 10);

            $("#hdnMultipleImagesCurrentInput").val(currentFileImageName);
        }
        
        $("#imagesModalCenter").show();
        $("body").append('<div class="modal-backdrop fade show"></div>');
        $("#hdnPageNumber").val(1);
        $("#hdnSearchKeyword").val('');
        $("#hdnSearchCategoryId").val('');
        $("#txtSearchKeyword").val('');
        getAllLibraryImages();
    }
    $('#credit_logo').change(function () 
    {
        $("#hdnIsCreditLogoAdded").val(0);
        pageLoad = 0;
        
        if(isImage($('#credit_logo').val()) === false)
        {
            isCreditLogoCall = 0;
            $('#creditLogoImageNameSpan').text('');
            $('#creditLogoImageNameLabel').show();
            $('#creditLogoImageSizeSpan').text('');
            $('#creditLogoImageSizeLabel').show();
            $('#credit_logo').val(null);
            swal("Sorry", "You can select only image", "error");
            
            $('img[name="creditFilePreviewImgId"]').attr("src", '');
            $('img[name="creditFilePreviewImgId"]').hide();
            $('div[name="creditFilePreviewDivId"]').hide();
        
            $("#dummySecondPhotoLiId img").attr("src", '../../../assets/images/Modi-16-1.jpg');
            $("#dummyAfterPhotoLiId img").attr("src", '../../../assets/images/Modi-16-1.jpg');
            return false;
        }
        else
        {
            $("#hdnIsCreditLogoAdded").val(1);
            isCreditLogoCall = 1;
            var reader;
            var file;
            var url;

            file = $('#credit_logo')[0].files[0];
            var fileSize = file.size;
            var imageSizeInMb = (fileSize / (1024*1024)).toFixed(2)+' MB';
            //var imageSizeInMb = Math.floor(fileSize/1024000); // its on MB
            var done = function (url) 
            {
                image.src = url;
                if (/^image\/\w+/.test(file.type))
                {
                    $("#modalLabel").text(file.name);
                    $('#creditLogoImageNameLabel').text('Image name : ');
                    $('#creditLogoImageNameSpan').text(' '+file.name);
                    $('#creditLogoImageNameLabel').show();

                    $('#creditLogoImageSizeLabel').text('Image Size : ');
                    $('#creditLogoImageSizeSpan').text(imageSizeInMb);
                    $('#creditLogoImageSizeLabel').show();
                    
                    $('div[name*="selectImagePhotoDivName"]').removeClass();
                    var storyTypeList = $('input[name="storyTypeList"]:checked').val();
                    if(storyTypeList == 'full_screen' || storyTypeList == 'weekend' 
                            || storyTypeList == 'before_and_after' || storyTypeList == 'heading_with_two_photo')
                    {
                        $('div[name*="selectImagePhotoDivName"]').addClass('select-Image-photo-weekend');
                        assignAspectRatio = 9/16;
                    }
                    else if(storyTypeList == 'spliter')
                    {
                        $('div[name*="selectImagePhotoDivName"]').addClass('select-Image-photo-spliter');
                        assignAspectRatio = 16/9;
                    }
                    else
                    {
                        $('div[name*="selectImagePhotoDivName"]').addClass('select-Image-photo');
                        assignAspectRatio = 1;
                    }
                    $modal.modal('show');
                }
            };
            if (URL) 
            {
                done(URL.createObjectURL(file));
            } 
            else if (FileReader) 
            {
                reader = new FileReader();
                reader.onload = function (e) 
                {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });
    $('#image_file').change(function () 
    {
        $("#hdnIsImageOrVideoAdded").val(0);
        pageLoad = 0;
        var currentFileImageName = $(this).attr('name');
        var counterNumber = currentFileImageName.substring(8, 9);
        
        var storyTypeList = $('input[name="storyTypeList"]:checked').val();
        if(storyTypeList != 'photo_album')
        {
            if((storyTypeList == 'top_news' || storyTypeList == 'poll_performance' || 
                    storyTypeList == 'company_headlines' || storyTypeList == 'thread') && 
                    isImage($('#image_file').val()) === false && isVideo($('#image_file').val()) === false)
            
            {
                $('span[name*="imageNameSpan"]').text('');
                $('label[name*="imageNameLabel"]').hide();

                $('span[name*="imageSizeSpan"]').text('');
                $('label[name*="imageSizeLabel"]').hide();
                
                $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", '');
                $('div[name="group-a[0][imageFilePreviewDivId]"]').hide();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
        
                swal("Sorry", "You can select only image or video", "error");
                $('#image_file').val(null);
                return false;
            }
            else if(storyTypeList == 'video_header_videoline' && isVideo($('#image_file').val()) === false)
            {
                $('span[name*="imageNameSpan"]').text('');
                $('label[name*="imageNameLabel"]').hide();

                $('span[name*="imageSizeSpan"]').text('');
                $('label[name*="imageSizeLabel"]').hide();
        
                $("#userVideoFileVideoId source").attr("src", '');
                $("#userVideoFileVideoId").hide();
                $("#dummyVideoFileVideoId").show();
                
                $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", '');
                $('div[name="group-a[0][imageFilePreviewDivId]"]').hide();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
        
                swal("Sorry", "You can select only video", "error");
                $('#image_file').val(null);
                return false;
            }
            else if((storyTypeList == 'photo_header_photoline' || storyTypeList == 'photo_photoline' || 
                    storyTypeList == 'full_screen' || storyTypeList == 'spliter' || storyTypeList == 'contact_card' 
                    || storyTypeList == 'heading_with_two_photo' || storyTypeList == 'before_and_after' 
                    || storyTypeList == 'text_with_color_dots' 
                    || storyTypeList == 'audio' || storyTypeList == 'five_question' || storyTypeList == 'big_box' 
                    || storyTypeList == 'photo_mapping' || storyTypeList == 'insider') 
                    && isImage($('#image_file').val()) === false)
            {
                $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", '');
                $('div[name="group-a[0][imageFilePreviewDivId]"]').hide();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
        
                $('span[name*="imageNameSpan"]').text('');
                $('label[name*="imageNameLabel"]').hide();

                $('span[name*="imageSizeSpan"]').text('');
                $('label[name*="imageSizeLabel"]').hide();
        
                $("#photoHeaderPhotolineImageId").attr("src", '');
                $("#dummyPhotoHeaderPhotolineImage").show();
                $("#userPhotoHeaderPhotolineImage").hide();

                $("#photoPhotolineImageId").attr("src", '');
                $("#dummyPhotoPhotolineImage").show();
                $("#userPhotoPhotolineImage").hide();
                
                $("#userAudioImageId").attr("src", '');
                $("#dummyAudioImageId").show();
                $("#userAudioImageId").hide();
                
                $("#userTextWithColorDotsImage").attr("src", '');
                $("#dummyTextWithColorDotsImage").show();
                $("#userTextWithColorDotsImage").hide();
                
                $("#contactCardImageId").attr("src", '');
                $("#contactCardDummyUserImageOrVideo").hide();
                $("#contactCardDummyDetailImageOrVideo").show();

                $("#bigBoxImageId").attr("src", '');
                $("#dummyBigBoxImage").show();
                $("#userBigBoxImage").hide();

                $("#fiveQuestionImageId").attr("src", '');
                $("#dummyFiveQuestionImage").show();
                $("#userFiveQuestionImage").hide();

                swal("Sorry", "You can select only image", "error");
                $('#image_file').val(null);
                return false;
            }
            else if(isImage($('#image_file').val()) || isVideo($('#image_file').val()))
            {  
                $("#hdnIsImageOrVideoAdded").val(1);
                var reader;
                var file;
                var url;

                file = $('#image_file')[0].files[0];
                var fileSize = file.size;
                var imageSizeInMb = (fileSize / (1024*1024)).toFixed(2)+' MB';
                //var imageSizeInMb = Math.floor(fileSize/1024000); // its on MB
                var done = function (url) 
                {
                    image.src = url;
                    if (/^image\/\w+/.test(file.type))
                    {
                        $("#modalLabel").text(file.name);
                        $('label[name="group-a[0][imageNameLabel]"]').text('Image name : ');
                                
                        $('span[name="group-a[0][imageNameSpan]"]').text(' '+file.name);
                        $('label[name="group-a[0][imageNameLabel]"]').show();
                        
                        $('label[name="group-a[0][imageSizeLabel]"]').text('Image Size : ');
                        $('span[name="group-a[0][imageSizeSpan]"]').text(imageSizeInMb);
                        $('label[name="group-a[0][imageSizeLabel]"]').show();
                         
                        $('div[name*="selectImagePhotoDivName"]').removeClass();
                        var storyTypeList = $('input[name="storyTypeList"]:checked').val();
                        if(storyTypeList == 'full_screen' || storyTypeList == 'weekend' 
                                || storyTypeList == 'before_and_after' || storyTypeList == 'heading_with_two_photo')
                        {
                            $('div[name*="selectImagePhotoDivName"]').addClass('select-Image-photo-weekend');
                            assignAspectRatio = 9/16;
                        }
                        else if(storyTypeList == 'spliter')
                        {
                            $('div[name*="selectImagePhotoDivName"]').addClass('select-Image-photo-spliter');
                            assignAspectRatio = 16/9;
                        }
                        else
                        {
                            $('div[name*="selectImagePhotoDivName"]').addClass('select-Image-photo');
                            assignAspectRatio = 1;
                        }
                        $modal.modal('show');
                    }
                };
                if (URL) 
                {
                    done(URL.createObjectURL(file));
                } 
                else if (FileReader) 
                {
                    reader = new FileReader();
                    reader.onload = function (e) 
                    {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
                if((/^video\/\w+/.test(file.type))) 
                {
                    handleVideoStorywise(storyTypeList,image.src,URL,imageSizeInMb,file.name,file,'upload');
                    
                    
                }
            }
        }
    });
    function displayMultipleImages(input)
    {
        var storyTypeList = $('input[name="storyTypeList"]:checked').val();
        var getImageName = $(input).closest('.row').find('#image_file').attr('name');
        
        var counterNumber = getImageName.substring(0, 10);
        var imageNameLabel = counterNumber+'[imageNameLabel]';
        var imageNameSpan = counterNumber+'[imageNameSpan]';
        var imageSizeLabel = counterNumber+'[imageSizeLabel]';
        var imageSizeSpan = counterNumber+'[imageSizeSpan]';
        
        var imageFilePreviewImgId= counterNumber+'[imageFilePreviewImgId]';
        var imageFilePreviewDivId= counterNumber+'[imageFilePreviewDivId]';
        var imageFilePreviewVideoId= counterNumber+'[imageFilePreviewVideoId]';
        if(storyTypeList == 'photo_album' || storyTypeList == 'story_album')
        {
            if(isImage(input.files[0].name) === false)
            {
                $('span[name="'+imageNameSpan+'"]').text('');
                $('label[name="'+imageNameLabel+'"]').hide();
                $('span[name="'+imageSizeSpan+'"]').text('');
                $('label[name="'+imageSizeLabel+'"]').hide();
                
                $('img[name="'+imageFilePreviewImgId+'"]').attr("src", '');
                $('div[name="'+imageFilePreviewDivId+'"]').hide();
                $('video[name="'+imageFilePreviewVideoId+'"] source').attr("src", '');
                $('video[name="'+imageFilePreviewVideoId+'"]').hide();
                
                swal("Sorry", "You can select only image", "error");
                $('#image_file').val(null);
                return false;
            }
            else
            { 
                if (input.files && input.files[0])
                {
                    var done = function (url) 
                    {
                        image.src = url;
                        if (/^image\/\w+/.test(input.files[0].type))
                        {
                            var fileSize = input.files[0].size;
                            var imageSizeInMb = (fileSize / (1024*1024)).toFixed(2)+' MB';
                            $('label[name="'+imageNameLabel+'"]').text('Image name : ');
                            $('span[name="'+imageNameSpan+'"]').text(' '+input.files[0].name);
                            $('label[name="'+imageNameLabel+'"]').show();
                            
                            $('label[name="'+imageSizeLabel+'"]').text('Image Size : ');
                            $('span[name="'+imageSizeSpan+'"]').text(imageSizeInMb);
                            $('label[name="'+imageSizeLabel+'"]').show();
                        
                            $("#hdnMultipleImagesCurrentInput").val(getImageName);
                            $('div[name*="selectImagePhotoDivName"]').removeClass();
                            var storyTypeList = $('input[name="storyTypeList"]:checked').val();
                            if(storyTypeList == 'full_screen' || storyTypeList == 'weekend' 
                                    || storyTypeList == 'before_and_after' || storyTypeList == 'heading_with_two_photo')
                            {
                                $('div[name*="selectImagePhotoDivName"]').addClass('select-Image-photo-weekend');
                                assignAspectRatio = 9/16;
                            }
                            else if(storyTypeList == 'spliter')
                            {
                                $('div[name*="selectImagePhotoDivName"]').addClass('select-Image-photo-spliter');
                                assignAspectRatio = 16/9;
                            }
                            else
                            {
                                $('div[name*="selectImagePhotoDivName"]').addClass('select-Image-photo');
                                assignAspectRatio = 1;
                            }
                            
                            $modal.modal('show');
                            $("#modalLabel").text(input.files[0].name);
                        }
                    };
                    if (URL) 
                    {
                        done(URL.createObjectURL(input.files[0]));
                    } 
                    else if (FileReader) 
                    {
                        reader = new FileReader();
                        reader.onload = function (e) 
                        {
                            done(reader.result);
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            }  
        }
    }
    function handleVideoStorywise(storyTypeList,imageSource,URL,imageSizeInMb,fileName,file,action)
    {
        pageLoad = 0;
        $('.cropped_cover_photo').val('');
        switch(storyTypeList)
        {
            case 'top_news':
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').show();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", imageSource);
                $('video[name="group-a[0][imageFilePreviewVideoId]"]')[0].load();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').show();
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                
                $("#userDetailVideoId source").attr("src", imageSource);
                $("#userDetailVideoId")[0].load();
                if(action == 'select')
                    $("#userDetailVideoId")[0].play();
                $("#dummyDetailImageOrVideo").hide();
                $("#userDetailImageOrVideo").hide();
                $("#userDetailVideoId").show();
            break;
            case 'poll_performance':
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').show();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", imageSource);
                $('video[name="group-a[0][imageFilePreviewVideoId]"]')[0].load();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').show();
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                
                $("#userDetailVideoId source").attr("src", imageSource);
                $("#userDetailVideoId")[0].load();
                if(action == 'select')
                    $("#userDetailVideoId")[0].play();
                $("#dummyDetailImageOrVideo").hide();
                $("#userDetailImageOrVideo").hide();
                $("#userDetailVideoId").show();
            break;
            case 'company_headlines':
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').show();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", imageSource);
                $('video[name="group-a[0][imageFilePreviewVideoId]"]')[0].load();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').show();
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                
                $("#userDetailVideoId source").attr("src", imageSource);
                $("#userDetailVideoId")[0].load();
                if(action == 'select')
                    $("#userDetailVideoId")[0].play();
                $("#dummyDetailImageOrVideo").hide();
                $("#userDetailImageOrVideo").hide();
                $("#userDetailVideoId").show();
            break;
            case 'video_header_videoline':
                
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').show();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", imageSource);
                $('video[name="group-a[0][imageFilePreviewVideoId]"]')[0].load();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').show();
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                
                $("#userVideoFileVideoId source").attr("src", imageSource);
                $("#userVideoFileVideoId")[0].load();
                if(action == 'select')
                {
                    $("#userVideoFileVideoId")[0].play();
                }  
                $("#dummyVideoFileVideoId").hide();
                $("#userVideoFileVideoId").show();
            break;
            case 'thread':
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').show();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", imageSource);
                $('video[name="group-a[0][imageFilePreviewVideoId]"]')[0].load();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').show();
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                
                $("#userThreadVideoId source").attr("src", imageSource);
                $("#userThreadVideoId")[0].load();
                if(action == 'select')
                    $("#userThreadVideoId")[0].play();
                $("#dummyThreadImageOrVideo").hide();
                $("#userThreadImageOrVideo").hide();
                $("#userThreadVideoId").show();
            break;
            
        }
        
        $('label[name="group-a[0][imageNameLabel]"]').text('Video name : ');
        $('label[name="group-a[0][imageSizeLabel]"]').text('Video Size : ');
        $('span[name="group-a[0][imageNameSpan]"]').text(' '+fileName);
        $('label[name="group-a[0][imageNameLabel]"]').show();
        $('span[name="group-a[0][imageSizeSpan]"]').text(' Size : '+imageSizeInMb);
        $('label[name="group-a[0][imageSizeLabel]"]').show();
            
        if(action == 'upload')
        {
            var url = URL.createObjectURL(file);
            var $video = document.createElement("video");
            $video.src = url;
            $video.addEventListener("loadedmetadata", function () 
            {

            });
        }
    }
    function getExtension(filename) {
        var parts = filename.split('.');
        return parts[parts.length - 1];
    }

    function isImage(filename) {
        var ext = getExtension(filename);
        //console.log(ext);
        switch (ext.toLowerCase()) {
            case 'jpg':
            case 'gif':
            case 'bmp':
            case 'png':
            case 'jpeg':
            case 'gif':
            case 'tiff':
            case 'psd':
            case 'pdf':
            case 'eps':
            case 'al':
            case 'indd':
            case 'raw':
            //etc
            return true;
        }
        return false;
    }

    function isVideo(filename) {
        var ext = getExtension(filename);
        switch (ext.toLowerCase()) {

            case 'mp4':
            // etc
            return true;
        }
        return false;
    }

    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: assignAspectRatio,
            viewMode: 1,
            resizable:false,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function () {
	    cropper.destroy();
	    cropper = null;
    });
    
    $("#crop").click(function()
    {
        canvas = cropper.getCroppedCanvas({
            minWidth: 512,
            minHeight: 512,
            maxWidth: 4096,
            maxHeight: 4096,
            imageSmoothingEnabled: true,
            imageSmoothingQuality: 'high'
        });

        canvas.toBlob(function(blob) 
        {
            var storyTypeList = $('input[name="storyTypeList"]:checked').val();
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob); 
            reader.onloadend = function() 
            {
                var base64data = reader.result;
                if(addEventFileCall == 0) //multiple story upload document
                {
                    if(storyTypeList == 'photo_album' || storyTypeList == 'story_album')
                    {   
                        var hdnMultipleImagesCurrentInput = $("#hdnMultipleImagesCurrentInput").val();
                        var counterNumber = hdnMultipleImagesCurrentInput.substring(0, 10);
                        var croppedCoverPhotoHiddenName = counterNumber+'[cropped_cover_photo]';
                        var cropped_library_image_id = counterNumber+'[cropped_library_image_id]';

                        var imageSizeLabel = counterNumber+'[imageSizeLabel]';
                        var imageSizeSpan = counterNumber+'[imageSizeSpan]';
                        $('input[name="'+croppedCoverPhotoHiddenName+'"]').val(base64data);
                        if(selectMediaLibraryId != '' && selectMediaCategoryId != '')
                        {
                            $('input[name="'+cropped_library_image_id+'"]').val(selectMediaLibraryId+','+selectMediaCategoryId);
                        }
                        else
                        {
                            $('input[name="'+cropped_library_image_id+'"]').val('');
                        }
                        selectMediaLibraryId = '';
                        selectMediaCategoryId = '';
                    }
                    else if(storyTypeList == 'weekend')
                    {   
                        var hdnMultipleImagesCurrentInput = $("#hdnMultipleImagesCurrentInput").val();
                        var counterNumber = hdnMultipleImagesCurrentInput.substring(0, 10);
                        var croppedWeekendCoverPhotoHiddenName = counterNumber+'[weekend_cropped_cover_photo]';
                        var weekend_library_image_id = counterNumber+'[weekend_library_image_id]';
                        $('input[name="'+croppedWeekendCoverPhotoHiddenName+'"]').val(base64data);

                        if(selectMediaLibraryId != '' && selectMediaCategoryId != '')
                        {
                            $('input[name="'+weekend_library_image_id+'"]').val(selectMediaLibraryId+','+selectMediaCategoryId);
                        }
                        else
                        {
                            $('input[name="'+weekend_library_image_id+'"]').val('');
                        }
                        selectMediaLibraryId = '';
                        selectMediaCategoryId = '';

                        previewFunction();
                    }
                    else if(storyTypeList == 'heading_with_four_photo')
                    {   
                        var hdnMultipleImagesCurrentInput = $("#hdnMultipleImagesCurrentInput").val();
                        var counterNumber = hdnMultipleImagesCurrentInput.substring(0, 10);
                        var four_images_cropped_cover_photo = counterNumber+'[four_images_cropped_cover_photo]';
                        var four_images_library_image_id = counterNumber+'[four_images_library_image_id]';

                        $('input[name="'+four_images_cropped_cover_photo+'"]').val(base64data);

                        if(selectMediaLibraryId != '' && selectMediaCategoryId != '')
                        {
                            $('input[name="'+four_images_library_image_id+'"]').val(selectMediaLibraryId+','+selectMediaCategoryId);
                        }
                        else
                        {
                            $('input[name="'+four_images_library_image_id+'"]').val('');
                        }
                        selectMediaLibraryId = '';
                        selectMediaCategoryId = '';

                        var imageNameArray = ['First', 'Second', 'Third','Fourth'];
                        var defaultImageNameArray = ['amitshah.jpg', 'Modi-16-1.jpg', 'rupani.jpg','Gautam_Adani.jpg'];
                        for(var k =0; k < 4; k++)
                        {
                            var imageValue = $('input[name="group-e['+k+'][four_images_cropped_cover_photo]"]').val();

                            if(imageValue != '')
                            {
                                if (imageValue.indexOf(';base64,') > -1)
                                {
                                    $("#dummyFourPhoto"+imageNameArray[k]+"PhotoLiId img").attr("src", imageValue);
                                    
                                    $('img[name="group-e['+k+'][fourImageFilePreviewImgId]"]').attr("src", imageValue);
                                    $('img[name="group-e['+k+'][fourImageFilePreviewImgId]"]').show();
                                    $('div[name="group-e['+k+'][fourImageFilePreviewDivId]"]').show();
                                }
                                else
                                {
                                    var fullPath = '../../../images/just_in_timeline/'+imageValue;
                                    if(isImage(imageValue))
                                    {
                                        $("#dummyFourPhoto"+imageNameArray[k]+"PhotoLiId img").attr("src", fullPath);
                                        
                                        $('img[name="group-e['+k+'][fourImageFilePreviewImgId]"]').attr("src", fullPath);
                                        $('img[name="group-e['+k+'][fourImageFilePreviewImgId]"]').show();
                                        $('div[name="group-e['+k+'][fourImageFilePreviewDivId]"]').show();
                                    }
                                }
                            }
                            else
                            {
                                $('img[name="group-e['+k+'][fourImageFilePreviewImgId]"]').attr("src", '');
                                $('img[name="group-e['+k+'][fourImageFilePreviewImgId]"]').hide();
                                $('div[name="group-e['+k+'][fourImageFilePreviewDivId]"]').hide();
                        
                                var defaultFullPath = '../../../assets/images';
                                $("#dummyFourPhoto"+imageNameArray[k]+"PhotoLiId img").attr("src", defaultFullPath+'/'+defaultImageNameArray[k]);
                            }
                        }

                    }
                    else if((storyTypeList == 'heading_with_two_photo' || storyTypeList == 'before_and_after') && isCreditLogoCall == 1)
                    {
                        $('#cropped_credit_logo').val(base64data);
                        if(selectMediaLibraryId != '' && selectMediaCategoryId != '')
                        {
                            $('input[name="credit_logo_library_image_id"]').val(selectMediaLibraryId+','+selectMediaCategoryId);
                        }
                        else
                        {
                            $('input[name="credit_logo_library_image_id"]').val('');
                        }
                        $('img[name="creditFilePreviewImgId"]').attr("src", base64data);
                        $('img[name="creditFilePreviewImgId"]').show();
                        $('div[name="creditFilePreviewDivId"]').show();
                        
                        selectMediaLibraryId = '';
                        selectMediaCategoryId = '';

                        if(storyTypeList == 'heading_with_two_photo')
                            $("#dummySecondPhotoLiId img").attr("src", base64data);
                        else if(storyTypeList == 'before_and_after')
                            $("#dummyAfterPhotoLiId img").attr("src", base64data);
                    }
                    else
                    {
                        $('input[name="group-a[0][cropped_cover_photo]"]').val(base64data);
                        if(selectMediaLibraryId != '' && selectMediaCategoryId != '')
                        {
                            $('input[name="group-a[0][cropped_library_image_id]"]').val(selectMediaLibraryId+','+selectMediaCategoryId);
                        }
                        else
                        {
                            $('input[name="group-a[0][cropped_library_image_id]"]').val('');
                        }
                        selectMediaLibraryId = '';
                        selectMediaCategoryId = '';
                    }
                }
                
                $modal.modal('hide');
                pageLoad = 0;
                
                switch(storyTypeList)
                {
                    case 'top_news':
                        pageLoad = 0;
                
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", base64data);
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').show();
                        $('div[name="group-a[0][imageFilePreviewDivId]"]').show();
                        $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                        $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                        
                        $("#topNewsImageId").attr("src", base64data).css('display','block').width('100%');
                        $("#dummyDetailImageOrVideo").hide();
                        $("#userDetailImageOrVideo").show();
                        $("#userDetailVideoId").hide();
                        
                    break;
                    case 'insider':
                        pageLoad = 0;
                
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", base64data);
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').show();
                        $('div[name="group-a[0][imageFilePreviewDivId]"]').show();
                        
                        $("#insiderImageId").attr("src", base64data).css('display','block').width('100%');
                        $("#dummyInsiderImage").hide();
                        $("#userInsiderImage").show();
                        
                    break;
                    case 'photo_mapping':
                        pageLoad = 0;
                
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", base64data);
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').show();
                        $('div[name="group-a[0][imageFilePreviewDivId]"]').show();
                        
                        $("#photoMappingImageId").attr("src", base64data).hide();
                        //alert('inisde if');
                        $('input[name="group-i[0][photoMappingHeading]"]').trigger('blur');
                        $("#canvas").trigger('click');
                    break;
                    case 'poll_performance':
                        pageLoad = 0;
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", base64data);
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').show();
                        $('div[name="group-a[0][imageFilePreviewDivId]"]').show();
                        $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                        $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                        
                        $("#topNewsImageId").attr("src", base64data).css('display','block').width('100%');
                        $("#dummyDetailImageOrVideo").hide();
                        $("#userDetailImageOrVideo").show();
                        $("#userDetailVideoId").hide();
                        
                    break;
                    case 'company_headlines':
                        pageLoad = 0;
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", base64data);
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').show();
                        $('div[name="group-a[0][imageFilePreviewDivId]"]').show();
                        $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                        $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                        
                        $("#topNewsImageId").attr("src", base64data).css('display','block').width('100%');
                        $("#dummyDetailImageOrVideo").hide();
                        $("#userDetailImageOrVideo").show();
                        $("#userDetailVideoId").hide();
                    break;
                    
                     case 'thread':
                        if(addEventFileCall == 0)
                        {
                            $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", base64data);
                            $('img[name="group-a[0][imageFilePreviewImgId]"]').show();
                            $('div[name="group-a[0][imageFilePreviewDivId]"]').show();
                            $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                            $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                        
                            $("#threadImageId").attr("src", base64data).css('display','block').width('100%');
                            $("#dummyThreadImageOrVideo").hide();
                            $("#userThreadImageOrVideo").show();
                            $("#userThreadVideoId").hide();
                            
                        }
                    break;
                    case 'audio':
                        pageLoad = 0;
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", base64data);
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').show();
                        $('div[name="group-a[0][imageFilePreviewDivId]"]').show();
                        $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                        $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                        
                        $("#userAudioImageId").attr("src", base64data);
                        $("#dummyAudioImageId").hide();
                        $("#userAudioImageId").show();
                        
                    break;
                    case 'text_with_color_dots':
                        $("#userTextWithColorDotsImage img").attr("src", base64data).css('display','block').width('100%');
                        $("#dummyTextWithColorDotsImage").hide();
                        $("#userTextWithColorDotsImage").show();
                        
                    break;
                    case 'full_screen':
                        pageLoad = 0;
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", base64data);
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').show();
                        $('div[name="group-a[0][imageFilePreviewDivId]"]').show();
                        $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                        $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                        
                        $("#user_full_screen_img_id").attr("src", base64data);
                        $("#dummy_full_screen_div_id").hide();
                        $("#user_full_screen_div_id").show();
                    break;
                    case 'spliter':
                        pageLoad = 0;
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", base64data);
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').show();
                        $('div[name="group-a[0][imageFilePreviewDivId]"]').show();
                        
                        $("#user_spliter_img_id").attr("src", base64data);
                        $("#dummy_spliter_img_div_id").hide();
                        $("#user_spliter_img_div_id").show();
                    break;
                    case 'contact_card':
                        pageLoad = 0;
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", base64data);
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').show();
                        $('div[name="group-a[0][imageFilePreviewDivId]"]').show();
                        $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                        $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                        
                        $("#contactCardImageId").attr("src", base64data);
                        $("#contactCardDummyUserImageOrVideo").show();
                        $("#contactCardDummyDetailImageOrVideo").hide();
                    break;
                    case 'heading_with_two_photo':
                        pageLoad = 0;
                        if(isCreditLogoCall == 0)
                        {
                            $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", base64data);
                            $('img[name="group-a[0][imageFilePreviewImgId]"]').show();
                            $('div[name="group-a[0][imageFilePreviewDivId]"]').show();
                            $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                            $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                        
                            $("#dummyFirstPhotoLiId img").attr("src", base64data);
                        }
                    break;
                    case 'before_and_after':
                        pageLoad = 0;
                        if(isCreditLogoCall == 0)
                        {
                            $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", base64data);
                            $('img[name="group-a[0][imageFilePreviewImgId]"]').show();
                            $('div[name="group-a[0][imageFilePreviewDivId]"]').show();
                            $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                            $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                        
                            $("#dummyBeforePhotoLiId img").attr("src", base64data);
                        }
                    break;
                    
                    case 'big_box':
                        pageLoad = 0;
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", base64data);
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').show();
                        $('div[name="group-a[0][imageFilePreviewDivId]"]').show();
                        $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                        $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                        
                        $("#bigBoxImageId").attr("src", base64data);
                        $("#dummyBigBoxImage").hide();
                        $("#userBigBoxImage").show();
                    break;
                    case 'five_question':
                        pageLoad = 0;
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", base64data);
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').show();
                        $('div[name="group-a[0][imageFilePreviewDivId]"]').show();
                        $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                        $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                        
                        $("#fiveQuestionImageId").attr("src", base64data);
                        $("#dummyFiveQuestionImage").hide();
                        $("#userFiveQuestionImage").show();
                    break;
                    case 'photo_photoline':
                        pageLoad = 0;
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", base64data);
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').show();
                        $('div[name="group-a[0][imageFilePreviewDivId]"]').show();
                        $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                        $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                        
                        $("#photoPhotolineImageId").attr("src", base64data);
                        $("#dummyPhotoPhotolineImage").hide();
                        $("#userPhotoPhotolineImage").show();
                    break;
                    case 'photo_header_photoline':
                        pageLoad = 0;
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", base64data);
                        $('img[name="group-a[0][imageFilePreviewImgId]"]').show();
                        $('div[name="group-a[0][imageFilePreviewDivId]"]').show();
                        $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                        $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                        $("#photoHeaderPhotolineImageId").attr("src", base64data);
                        $("#dummyPhotoHeaderPhotolineImage").hide();
                        $("#userPhotoHeaderPhotolineImage").show();
                    break;
                }
                isCreditLogoCall = 0;
                var counterNumber = $("#hdnCurrentGroupName").val();
                var imgVal = $('.story_document').val(); 
                var tagname = $('.tagname').val();
                var linkDescription = $('.linkDescription').val();
                
                if(((imgVal != '' || linkDescription != '') || tagname!= '') && (storyTypeList == 'thread' || storyTypeList == 'social_media') && (addEventFileCall == 1))
                {
                    var tagType = $('#tagType').val();
                    var tagnameWithHash = "##"+tagname+'##';
                   // var countForDescription = $('textarea[name^="group-a"]').length;
                    
                    var lastTbodyName = $('.mytablebody').last().attr('name');
                    var counterNumber = lastTbodyName.substring(8, 9);
                    var fileName = $('.story_document')[0].files[0].name;
                    
                    var tr = '<tr id="trId_'+counterNumber+'" ><td>'+fileName+'<input type="hidden" name="uploaded_file_name[]" value="'+base64data+'"><input type="hidden" name="uploaded_file_tag_type[]" value="image"></td><td>'+tagnameWithHash+'<input type="hidden" name="uploaded_file_tag[]" value="'+tagnameWithHash+'"></td><td><button type="button" title="" class="btn btn-sm btn-danger mt-2 delete_row" data-original-title="Delete"><i class="bx bx-trash d-block font-size-16"></i></button></td></tr>';
                    $('.mytablebody').last().append(tr);
                    $('.story_document').val(''); 
                    $('.tagname').val('');
                    $('.linkDescription').val(''); 
                    $('#tagtitle').val('');
                    addEventFileCall = 0;
                }
                if(storyTypeList == 'photo_album' || storyTypeList == 'story_album')
                {
                    pageLoad = 0;
                    setPhotoAlbumPreview();
                }
            }
        }, 'image/jpeg', 1);
    })
    function getImageSize(imageURL, callback) {      
   // Create image object to ascertain dimensions.
   var image = new Image();

   // Get image data when loaded.
   image.onload = function() {      
      // No callback? Show error.
      if (!callback) {
         console.log("Error getting image size: no callback. Image URL: " + imageURL);

      // Yes, invoke callback with image size.
      } else {
         callback(this.naturalWidth, this.naturalHeight);
      }
   }

   // Load image.
   image.src = imageURL;
}
    function resetForm()
    {
        $("#hdnIsImageOrVideoAdded").val(0);
        $("#hdnIsCreditLogoAdded").val(0);
        
        $(".invalid-feedback").hide();
    
        $('#threadDescriptionDivId [data-repeater-item]').slice(1).remove();
        $('#timelineDescription [data-repeater-item]').slice(1).remove();
        $('#innerPagesDivId [data-repeater-item]').slice(1).remove();
        $('#weekendFormDivId [data-repeater-item]').slice(1).remove();
        $('#bulletsRepeaterDivId [data-repeater-item]').slice(3).remove();
        
        $('#photoMappingDivId [data-repeater-item]').slice(1).remove();
        $('label[name*="assignLabelDynamically"]').html('Description');
        $("#timelineDescription > label:first-child").text('Description');
        
        $('#justin_slug label').text('Slug');
        
        $("#hdnSelectedBugColour").val('');
        $("#hdnSelectedBugDotColour").val('');
        
        $("#bugColorSettingDivId").hide();
        
        $("#hdnMultipleImagesCurrentInput").val('');
        
        /*All Input field*/
        //$("#bug_color").val('');
        $("#bug_text").val('');
        //$("#bug_dot_color").val('');
        //$("#headline_color").val('');
        //$("#headline_background_color").val('');
        //$("#headline_dot_color").val('');
        $('input[name*="slug"]').val('');
        //$("#slug").val('');
        $('input[name*="title"]').val('');
        $('input[name*="image_file"]').val('');
        $("#linkDescription").val('');
        $('textarea[name*="description"]').val('');
        $("#audio_file").val('');
        
        $('input[name*="txtBulletHeadlines"]').val('');
        $('textarea[name*="txtBulletDescription"]').val('');
        $("#fullName").val('');
        $("#address").val('');
        $("#contactNo").val('');
        $("#email").val('');
        $("#website").val('');
        $("#location").val('');
        $("#designation").val('');
        
        $('input[name*="weekendSlug"]').val('');
        $('input[name*="weekendHeadlines"]').val('');
        $('input[name*="weekend_cropped_cover_photo"]').val('');
        $('input[name*="weekendReporterName"]').val('');
        $('input[name*="weekendReporterCity"]').val('');
        $("input[name*='weekendSelectImageTypeImage']").prop("checked", false);
        
        $('small[name*="weekend_slug_max_characters"]').html('Max 15 Characters');
        $('small[name*="weekend_headlines_max_characters"]').html('Max 100 Characters');
        $('small[name*="weekend_reporter_name_max_characters"]').html('Max 50 Characters');
        $('small[name*="weekend_reporter_city_max_characters"]').html('Max 30 Characters');
        
        $('input[name*="weekendSlug"]').attr('maxlength','15');
        $('input[name*="weekendHeadlines"]').attr('maxlength','100');
        $('input[name*="weekendReporterName"]').attr('maxlength','50');
        $('input[name*="weekendReporterCity"]').attr('maxlength','30');
        $('button[name*="openWeekendLibraryButton"]').hide();
        $('div[name*="weekendUploadImageDivId"]').hide();
        $('span[name*="weekendImageNameSpan"]').text('');
        $('label[name*="weekendImageNameLabel"]').hide();
        $('span[name*="weekendImageSizeSpan"]').text('');
        $('label[name*="weekendImageSizeLabel"]').hide();
        
        /*all preview*/
        $("#news_update_preview_div_id").hide();
        $("#top_news_preview_div_id").hide();
        $("#insider_preview_div_id").hide();
        $("#photo_mapping_preview_div_id").hide();
        $("#justin_preview_div_id").hide();
        $("#video_header_videoline_preview_div_id").hide();
        $("#photo_header_photoline_preview_div_id").hide();
        $("#photo_photoline_preview_div_id").hide();
        $("#photo_album_preview_div_id").hide();
        $("#text_with_header_preview_div_id").hide();
        $("#thread_preview_div_id").hide();
        $("#emoji_and_text_preview_div_id").hide();
        $("#audio_preview_div_id").hide();
        $("#social_media_preview_div_id").hide();
        $("#text_with_color_dots_preview_div_id").hide();
        $("#story_album_preview_div_id").hide();
        $("#big_headlines_preview_div_id").hide();
        $("#short_preview_div_id").hide();
        $("#before_and_after_preview_div_id").hide();
        $("#headlines_preview_div_id").hide();
        $("#remind_me_preview_div_id").hide();
        $("#count_down_preview_div_id").hide();
        
        $("#five_question_preview_div_id").hide();
        $("#heading_with_stokes_preview_div_id").hide();
        $("#heading_with_two_photo_preview_div_id").hide();
        $("#heading_with_four_photo_preview_div_id").hide();
        $("#stock_up_preview_div_id").hide();
        $("#contact_card_preview_div_id").hide();
        $("#stokes_scroll_preview_div_id").hide();
        $("#weekend_preview_div_id").hide();
        $("#big_box_preview_div_id").hide();
        $("#bullets_preview_div_id").hide();
        $("#fullScreenPreviewId").hide();
        $("#spliter_preview_div_id").hide();
        
        $(".pip").remove(); //remove multiple images
        $("#hdnStoryType").val('');
        
        /*top news*/
        $("#userDetailSlug").text('JUST IN');
        $("#userDetailTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
        $("#dummyDetailDescriptionPoints").show();
        $("#userDetailDescriptionPoints").hide();
        $("#topNewsImageId").attr("src", '');
        $("#dummyDetailImageOrVideo").show();
        $("#userDetailImageOrVideo").hide();
        $("#userDetailVideoId").hide();
        $("div[name=topNewsShowHideRedThickLine]").show();
        $("div[name=showHideNewsFirstLogo] img").attr('src','../../../assets/images/logo-light.png');
        $("div[name=showHideNewsFirstLogo]").show();
        $("#logoUploadDivId").hide();
        $("#topNewsReporterNameCity").text('Shilpa Singh, Ahmedabad');
        $("span[name=topNewsPhotoCrediterName]").text('Excelsior');
        $("div[name=topNewsShowHidePhotoCrediterName]").show();
        
        /*insider */
        $("#userInsiderSlug").text('JUST IN');
        $("#userInsiderTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
        $("#dummyInsiderDescriptionPoints").show();
        $("#userInsiderDescriptionPoints").hide();
        $("#insiderImageId").attr("src", '');
        $("#userInsiderImage").hide();
        $("#dummyInsiderImage").show();
        $("div[name=insiderShowHideRedThickLine]").show();
        $("div[name=showHideNewsFirstLogo] img").attr('src','../../../assets/images/logo-light.png');
        $("div[name=showHideNewsFirstLogo]").show();
        $("#logoUploadDivId").hide();
        $("#insiderReporterNameCity").text('Shilpa Singh, Ahmedabad');
        $("span[name=insiderPhotoCrediterName]").text('Excelsior');
        $("div[name=insiderShowHidePhotoCrediterName]").show();
        
        /*news update*/
        $("#dummyNewsUpdateDescriptionPoints").show();
        $("#userNewsUpdateDescriptionPoints").hide();
        $("#userNewsUpdateTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
        $("#userNewsUpdateDate").text('Date: '+currentDateForPreview);
        $("#userNewsUpdateStock").html('');
        $("#dummyNewsUpdateStock").show();
        $("#userNewsUpdateStock").hide();
        
       /*justin*/
        $("#userJustinSlideshow").children().remove();
        $("#userJustinSlideshow ").html(justinSlideShowHtml);
        $("#userJustinSlugId").text('Top News');
        
        /*Video Header Videoline*/
        $("#userVideoTitleId").text('lorem ipsum is simply dummy text of the printing typesetting industry.');
        $("#userVideoSlugId").text('Top News');
        $("#userVideoFileVideoId source").attr("src", '');
        $("#userVideoFileVideoId").hide();
        $("#dummyVideoFileVideoId").show();
        $("#videoPhotoCrediter").show();

        /*Photo Header Photoline*/
        $("#userPhotoHeaderPhotolineSlug").text('Photos');
        $("#userPhotoHeaderPhotolineTitle").text('It has Survived not only five centuries, but also the leap into electronic typesetting.');
        $("#photoHeaderPhotolineImageId").attr("src", '');
        $("#dummyPhotoHeaderPhotolineImage").show();
        $("#userPhotoHeaderPhotolineImage").hide();
        $("div[name=photoHeaderPhotolineShowHideRedThickLine]").show();
        $("div[name=photoHeaderPhotolineShowHidePhotoCrediterName]").show();
        $("span[name=photoHeaderPhotolinePhotoCrediterName]").text('Excelsior');

        /* Photo Photoline*/
        $("#photoPhotolineImageId").attr("src", '');
        $("#dummyPhotoPhotolineImage").show();
        $("#userPhotoPhotolineImage").hide();
        $("#userPhotoPhotolineTitle").text('It has Survived not only five centuries, but also the leap into electronic typesetting.');
       
        $("div[name=photoPhotolineShowHideRedThickLine]").show();
        $("div[name=photoPhotolineShowHidePhotoCrediterName]").show();
        $("span[name=photoPhotolinePhotoCrediterName]").text('Excelsior');

        /*Photo Album */
        $("#userMultipleImagesDivId").children().remove();
        $("#userMultipleImagesDivId").html(multiplePhotoAlbumDummyHtml);
        $("#photoAlbumSlugId").text('Politics');
        
        /*Thread*/
        $("#threadImageId").attr("src", '');
        $("#dummyThreadImageOrVideo").show();
        $("#userThreadImageOrVideo").hide();
        $("#userThreadVideoId").hide();
        $("#userThreadSlug").text('74 independance day');
        $("#userThreadTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
        $("#userThreadDate").text('Date '+currentDateForPreview);
        $("#dummyThreadDescriptionPoints").show();
        $("#userThreadDescriptionPoints").hide();
        $("div[name=threadShowHideRedThickLine]").hide();
        $("div[name=threadShowHidePhotoCrediterName]").show();
        $("span[name=threadPhotoCrediterName]").text('Excelsior');
            
        /* Text With Header/Short */
        $("#userTextWithHeaderSlug").text('JUST IN');
        $("#userTextWithHeaderDescription").html("<strong>Newsfirst</strong>:  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>");
        
        /* Emoji & Text */
        $("#userEmojiAndTextSlug").text('Emoji and Text screen');
        $("#userEmojiAndTextEmojiHtml").html('&#128512;');
        $("#userEmojiAndTextDescription").html("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s");
                  
        /* audio */
        $("#slugAudioFeed").text('interview with Mr.Vijay Rupani');
        $("#timeLineHeadingAudioFeed").html("Coronavirus are a group of related RNA viruses the causes disease in mamamals and birds humans these viruses cause respiratory tract infections a that can range from mild to lethal.Coronaviruses are a Group of related RNA Viruses");
        $("#dummyAudioFileAudioId").show();
        $("#hdnAudioFile").val(0);
        $("#userAudioFileAudioId").hide();
        $("#audioSourceId").attr("src", '');
        $("#userAudioImageId").attr("src", '');
        $("#dummyAudioImageId").show();
        $('#audioFileNameLabel').text('Image name : ');
        $('#audioFileNameSpan').text(' ');
        $('#audioFileNameLabel').hide();

        $('#audioFileSizeLabel').text('Image Size : ');
        $('#audioFileSizeSpan').text('');
        $('#audioFileSizeLabel').hide();
            
        /* social media */
        $("#userSocialMediaSlug").text('74 independance day');
        $("#useSocialMediaTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
         $("#userSocialMediaDescription").html("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.");
        
        $('#image_file').val(null);
        
        /* Text With Color Dots */
        $("#userTextWithColorDotsImage").attr("src", '');
        $("#dummyTextWithColorDotsImage").show();
        $("#userTextWithColorDotsImage").hide();
        $("#userTextWithColorDotsSlug").text('Just IN');
        $("#userTextWithColorDotsTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
        $("#userTextWithColorDotsDescription").html("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s");
        
        /*Story Album */
        $("#StoryAlbumMultipleImagesDivId").children().remove();
        $("#StoryAlbumMultipleImagesDivId").html(multiplePhotoAlbumDummyHtml);
        $("#StoryAlbumSlugId").text('World');
        
        /*big headlines */
        $("#userBigHeadlinesSlug").text('JUST IN');
        $("#userBigHeadlinesTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
        $("#userBigHeadlinesPoints").html("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.");
        
        $('label[name*="imageNameLabel"]').text('Image name : ');
        $('span[name*="imageNameSpan"]').text('');
        $('label[name*="imageNameLabel"]').hide();
        
        $('span[name*="imageSizeSpan"]').text('');
        $('label[name*="imageSizeLabel"]').hide();
        $('input[name="reporterName"]').val('');
        $('input[name="reporterCity"]').val('');

        $('small[name="reporter_name_max_characters"]').html('Max 50 Characters');
        $('small[name="reporter_city_max_characters"]').html('Max 30 Characters');
        $('input[name="reporterName"]').attr('maxlength','100');
        $('input[name="reporterCity"]').attr('maxlength','30');
        
        /* Stoke up form */
        $('#stokeUpFormDivId [data-repeater-item]').slice(1).remove();
        $('input[name="group-a[0][stokeUpName]"]').val('');
        $('input[name="group-a[0][stokeUpPrice]"]').val('');
        $('input[name="group-a[0][stokeUpVariation]"]').val('');
        $('input[name="group-a[0][stokeUpdate]"]').val('');

        $('small[name="group-a[0][stoke_up_name_max_characters]"]').html('Max 30 Characters');
        $('small[name="group-a[0][stoke_up_price_max_characters]"]').html('Max 30 Characters');
        $('small[name="group-a[0][stoke_up_variation_max_characters]"]').html('Max 30 Characters');
        $('small[name="group-a[0][stoke_update_max_characters]"]').html('Max 30 Characters');

        $('input[name="group-a[0][stokeUpName]"]').attr('maxlength','30');
        $('input[name="group-a[0][stokeUpPrice]"]').attr('maxlength','30');
        $('input[name="group-a[0][stokeUpVariation]"]').attr('maxlength','30');
        $('input[name="group-a[0][stokeUpdate]"]').attr('maxlength','30');

        $('input[name="group-a[0][errorStokeUpName]"]').hide();
        $('input[name="group-a[0][errorStokeUpPrice]"]').hide();
        $('input[name="group-a[0][errorStokeUpVariation]"]').hide();
         $('input[name="group-a[0][errorStokeUpdate]"]').hide();
        
        /*spliter*/
        $("#timeLineHeadingSpliterFeed").text('lorem ipsum is simply dummy text of the printing typesetting industry.');
        $("#user_spliter_img_id").attr("src", '');
        $("#user_spliter_img_div_id").hide;
        $("#dummy_spliter_img_div_id").show();
        $("div[name=spliterShowHidePhotoCrediterName]").show();
        $("span[name=spliterPhotoCrediterName]").text('Excelsior');
        
        /* short */
        $("#shortHeadlineH1Id").text('West Bengal Chief');
        $("#shortDescriptionH5Id").html("Lorem Ipsum is simply dummy text of the printing and typesetting industry.");

        /* contact card */
        $("#contactCardNameH1Id").text('Gautam Adani');
        $("#contactCardNameDesignationId").text('CHAIRMAN OF ADANI GROUP');
        $("#contactCardNameAddressId").text('Adani House, Near, Mithakhali Cir, Muslim Society, Navragpura, Ahemedabad, Gujarat');
        $("#contactCardMobileNumberId").text('Call');
        $("#contactCardEmailId").text('Email');
        $("#contactCardWebsiteId").text('Website');
        $("#contactCardDirectionId").text('Direction');

        $("#contactCardImageId").attr("src", '');
        $("#contactCardDummyUserImageOrVideo").hide();
        $("#contactCardDummyDetailImageOrVideo").show();
        $("div[name=contactCardShowHideRedThickLine]").show();
        $("div[name=contactCardShowHidePhotoCrediterName]").show();

        /* Stokes scroll */
        $("#stokesScrollSlugId").text('Stock Market');
        $("#stokesScrollHeadlineId").text('Stock Market LIVE Updates: Auto index is up a percent, while buying also seen');
        $("#userStokesScroll").html('');
        $("#dummyStokesScroll").show();
        $("#userStokesScroll").hide();
        $("#userStokesScrollDescription").show();
        $("#userTwoPhotoDescriptionId").hide();

        /*heading with Stokes */
        $("#headingWithStokesSlugId").text('Stock Market');
        $("#headingWithStokesHeadlineId").text('Stock Market LIVE Updates: Auto index is up a percent, while buying also seen');
        $("#userHeadingWithStokes").html('');
        $("#dummyHeadingWithStokes").show();
        $("#userHeadingWithStokes").hide();

        /* stock up */
        $("#userStockUpUlId").html('');
        $("#dummyStockUpUlId").show();
        $("#userStockUpUlId").hide();
        $("#stockupSlugId").text('Stock Market');
        $("#stockupHeadlinesId").text('Stock Market LIVE Updates: Auto index is up a percent, while buying also seen');

        /* big box */
        $("#bigBoxSlugId").text('Just Bulet');
        $("#bigBoxHeadlineId").text('West Bengal Chief Minister Mamata Banerjee on Wednesday said her');
        $("#bigBoxImageId").attr("src", '');
        $("#userBigBoxImage").hide();
        $("#dummyBigBoxImage").show();
        $("#bigBoxReporterNameCity").text('Yogesh Rewani, Ahmedabad');
        $("div[name=bigBoxShowHideRedThickLine]").show();
        $("div[name=bigBoxShowHidePhotoCrediterName]").show();

        /* heading with 2 photo  */
        $("#twoPhotoSlugId").text('Modi & Mamata');
        $("#twoPhotoHeadlinesId").text('West Bengal Chief Minister Mamata Banerjee on Wednesday said her');
        $("#dummyTwoPhotoDescriptionId").show();
        $("#userTwoPhotoDescriptionId").hide();
        $("#dummyFirstPhotoLiId img").attr("src", '../../../assets/images/Gautam_Adani.jpg');
        $("#dummySecondPhotoLiId img").attr("src", '../../../assets/images/Modi-16-1.jpg');
        
        /*weekedn */
        $("#userWeekendSlideshow").children().remove();
        $("#userWeekendSlideshow ").html(weekendSlideShowHtml);
        
        /* heading with 4 photo */
        $("#fourPhotoSlugId").text('Modi & Mamata');
        $("#fourPhotoHeadlinesId").text('West Bengal Chief Minister Mamata Banerjee on Wednesday said her');
        $("#dummyFourPhotoDescriptionId").show();
        $("#userFourPhotoDescriptionId").hide();
        $("#afterTimelineDescription").hide();
        $("div[name=fourPhotoShowHidePhotoCrediterName]").show();
        var imageNameArray = ['First', 'Second', 'Third','Fourth'];
        $("#fourPhotoReporterNameCity").text('Shilpa Singh Ahmedabad');
        var imageNameArray = ['First', 'Second', 'Third','Fourth'];
        var defaultImageNameArray = ['amitshah.jpg', 'Modi-16-1.jpg', 'rupani.jpg','Gautam_Adani.jpg'];
                    
        for(var k =0; k < 4; k++)
        {
            $('span[name="group-e['+k+'][fourImageNameSpan]"]').text('');
            $('span[name="group-e['+k+'][fourImageNameSpan]"]').text('');
            $('label[name="group-e['+k+'][fourImageNameLabel"]').hide();
            
            $('span[name="group-e['+k+'][fourImageSizeSpan"]').text('');
            $('span[name="group-e['+k+'][fourImageSizeSpan"]').text('');
            $('label[name="group-e['+k+'][fourImageSizeLabel"]').hide();
        
            $('button[name="group-e['+k+'][openLibraryButtonForFourImages]"]').hide();
            $('div[name="group-e['+k+'][imageBrowseForFourImages]"]').hide();
            var defaultFullPath = '../../../assets/images';
            $("#dummyFourPhoto"+imageNameArray[k]+"PhotoLiId img").attr("src", defaultFullPath+'/'+defaultImageNameArray[k]);
        }
        /* five question  */
        $("#fiveQuestionHeadlineId").text('Stock Market LIVE Updates: Auto index is up a percent, while buying also seen');
        $("#fiveQuestionInterviewerNameId").text('Shilpa Singh Ahmedabad');

        $("#fiveQuestionDescription").html("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s");
        
        $("div[name=fiveQuestionShowHideRedThickLine]").show();
        $("div[name=fiveQuestionShowHidePhotoCrediterName]").show();

        var QuestionAnserNameArray = ['first','second','third','fourth','fifth'];
        for(var i =0; i < 5; i++)
        {
            $('input[name="group-d['+i+'][question]"]').val('');
            $('input[name="group-d['+i+'][answer]"]').val('');
            $("#"+QuestionAnserNameArray[i]+"QuestionId").html('<span class="text-bold-size">Question: </span>Aircraft was fllying in from dubai to calicut');
            $("#"+QuestionAnserNameArray[i]+"AnswerId").html('<span class="text-bold-size">Answer: </span>Fire tender and ambulance rushed to the spot more details awaited');
        }
        $("#fiveQuestionImageId").attr("src", '');
        $("#userFiveQuestionImage").hide();
        $("#dummyFiveQuestionImage").show();

        /*bullets*/
        $("#bulletsReporterNameCity").text('Shilpa Singh Ahmedabad');
        $("#bulletsHeadlineId").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
        $("#userBulletsHeadlineId").html('');
        $("#dummyBulletsHeadlineId").show();
        $("#userBulletsHeadlineId").hide();

        /*fullscreen*/
        $("#slugFullScreenFeed").text('Politics');
        $("#timeLineHeadingFullScreenFeed").text('lorem ipsum is simply dummy text of the printing typesetting industry.');
        
        $("#user_full_screen_img_id").attr("src", '');
        $("#dummy_full_screen_div_id").show();
        $("#user_full_screen_div_id").hide();
        $("div[name=fullScreenShowHidePhotoCrediterName]").show();
        $("span[name=fullScreenPhotoCrediterName]").text('Excelsior');
        
        /* before and after */
        $("#beforeAndAfterSlugId").text('Modi & Mamata');
        $("#beforeAndAfterHeadlinesId").text('West Bengal Chief Minister Mamata Banerjee on Wednesday said her');
        $("#dummyBeforeBulletsPoints").show();
        $("#userBeforeBulletsPoints").hide();
        $("#dummyAfterBulletsPoints").show();
        $("#userAfterBulletsPoints").hide();
        $("#dummyBeforePhotoLiId img").attr("src", '../../../assets/images/Gautam_Adani.jpg');
        $("#dummyAfterPhotoLiId img").attr("src", '../../../assets/images/Modi-16-1.jpg');
        $("div[name=beforeAfterLogoShowHide]").show();
        $("#beforeAfterPhotoCrediterName").text('Excelsior');
        $("#beforeAfterPhotoCrediter").show();
        
        /*Photo Mapping */
        $("#photoMappingSlug").text('JUST IN');
        $("#photoMappingTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
        $("#dummyPhotoMappingDescription").show();
        $("#userPhotoMappingDescription").hide();
        $("#photoMappingReporterNameCity").text('Shilpa Singh, Ahmedabad');
        $("#photoMappingImageId").attr('src','../../../assets/images/modi.png');
        
        /*remind me */
        $("#userRemindMeTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
        $("#userRemindMeDescription").html("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, ");
        
        /*remind me */
        $("#userCountDownTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
        $("#userCountDownDescription").html("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, ");
    
        $('#creditLogoImageNameSpan').text('');
        $('#creditLogoImageNameLabel').hide();
        $('#creditLogoImageSizeSpan').text('');
        $('#creditLogoImageSizeLabel').hide();
    }
    $("input[name='storyTypeList']").change(function()
    {
        if(this.value == 'breaking_news' || this.value == 'poll' || this.value == 'survey' 
                || this.value == 'cube' || this.value == 'notification')
        {
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
            }
            window.open(url,"_self");
            //window.open(url, '_blank');
        }
        else
        {
            if(this.value == 'full_screen')
            {
                checkPreviousDataValidation();
            }
            closeStoryTypePopup('change_function');
            showOrHideStoryList('hide');

            pageLoad = 0;
            resetForm();
            setCurrentDate();
            enabledDisableDateTime('disable');
            $("#hdnStoryType").val(this.value);
            setHtmlAccordingToStoryType(this.value);
            setJustDateInPreview(this.value);
            reset();
            startTimer();
        }
    });
    
    function setHtmlAccordingToStoryType(storyType)
    {
        $("#storyListUlId li").removeClass('radiobox_checked');
        $("#storyListUlId li").removeClass('radiobox_checked_list');
        $("#closePopupHrefId").show();
        var storyListText = $("#storyTypeListLabel"+storyType).text();
        //$("#selectedStoryListName").text('('+storyListText+')');
        $("#storyLiId_"+storyType).addClass('radiobox_checked radiobox_checked_list');
        //$('input[name="storyTypeList"]:checked').prop('disabled', true);
        
        $("#selectedStoryType").text(storyListText);
        $("#selectedStoryTypepreview").text(storyListText);
        
        $("#threadDescriptionDivId").hide();
        $("#bugDisplayDivId").hide();
        $("#threadMultipleImagesDivId").hide();
        $("#emojiDivId").hide();
        $("#tagTypeDivId").hide();
        
        $("#headlineColorSectionDivId").hide();
        $("#headline_color_div_id").hide();
        $("#headline_background_color_div_id").hide();
        $("#headline_dot_color_div_id").hide();
        $('#desc_del').hide();
        $('#desc_add').hide();
        $('#multipleImagesDeleteDivId').hide();
        $('#multipleImagesAddDivId').hide();
        $("#timelineAudioDivId").hide();
        $("#selectAudioTypeDivId").hide();
        $("#timelineDescription").hide();
        $("#bigHeadlinesThemeColorDivId").hide();
        $("#bigHeadlinesThemeColorVersion2DivId").hide();
        $("#isHeaderBlinkingDotDivId").hide();
        $("#stockPriceFormDivId").hide();
        $("#isShowDisclaimerDivId").hide();
        $("#positionAndAlignmentDivId").hide();
        
        $("#beforeLabelDivId").hide();
        $("#afterLabelDivId").hide();
       
        if(pageLoad == 0)
        {
            $("#bugColorSettingDivId").hide();
            $('label[name*="assignLabelDynamically"]').html('Headlines');
            $("#isStockFormOpen").prop("checked", false);
            openOrCloseStockForm();
            $("#isShowTag").prop("checked", false);
            showHideTag();
            
            $('input[name=isShowLogoOnTop]').prop('checked',true);
            
            $('input[name=isHeaderBlinkingDot]').prop('checked',false);
            $("#headerBlinkingColorDivId").hide();
            
            $('input[name=isShowPhotoCrediterName]').prop('checked',false);
            $('#photoCrediterName').val('');
            $("#photoCrediterNameDivId").hide();
            
            
            $('input[name=isShowRedColorLine]').prop('checked',false);
            
            $("#courtesyLine").val('');
            
            $("input[name*='isShowDisclaimer']").prop("checked", false);
            $("#companyLogoColorDisplayDivId").hide();
            $("input[name='companyLogoColor']").prop("checked", false);
            $("input[name=companyLogoColor][value='light']").prop('checked', true);
            
            $('input:checkbox[name="isShowNotes"]').prop('checked', false)
            showHideNotes();
            $('input:checkbox[name="isImageNamePlate"]').prop('checked', false)
            $(".imageNamePlateClass").hide();
            $("div[id*='TagText']").hide();
        }
        openOrCloseImageNamePlate();
        selectPhotoCreditorOrNamePlate();
        $('#countDownDateTimeDivId').hide();
        $("input[name*='selectImageTypeImageForCreditLogo']").prop("checked", false);
        $("input[name*='selectImageTypeImageOrVideo']").prop("checked", false);
        $("#reporterNameAndCityDivId").hide();
        $("div[name*='justin_image']").hide();
        $("button[name*='openLibraryButton']").hide();
        $('#hdnSelectedAudioFileName').val('');
        
        $("#isShowLogoOnTopDivId").hide();
        $("#isShowRedColorLineDivId").hide();
        $("#courtesyLineDivId").hide();
        
        $("#logoUploadDivId").hide();
        $("#companyLogoColorDisplayDivId").hide();
        
        $("#nameDivId").hide();
        $("#designationDivId").hide();                
        $("#addressDivId").hide();
        $("#contactCardPersonalInfoDivId").hide();
        $("#selectImageTypeImageDivId").hide();
        $("#selectImageTypeImageRowDivId").hide();
        $("#creditLogoDivId").hide();
        $("#openLibraryButtonForCreditLogo").hide();
        
        $("#isShowPhotoCrediterNameDivId").hide();
        $('div[name*="selectImageTypeImageOrVideoDivId"]').hide();
        $("#stokeUpFormDivId").hide();
        $('label[name*="assignLabelDynamically"]').addClass('descriptionLabel');
        $('#justin_title').hide();
        $('#justin_slug').hide();
        $("#innerPagesDivId").show();
        $('#weekendFormDivId').hide();
        $('label[name*="selectImageTypeImageOrVideoLabelName"]').text('Select Image Type');
        $("#bulletsRepeaterDivId").hide();
        $("#userCapturedDataTypeDivId").hide();
        $("#questionAnswerFormDivId").hide();
        $("#boxHeadingDivId").hide();
        $("#fourPhotoDivId").hide();
        $("#beforeLabelDivId").hide();
        $("#afterLabelDivId").hide();
        $("#isStockFormOpenLabelId").text('Do you want to add stock form ?');
        $('label[name*="stockNameLabel"]').html('Stock Name 1');
        $('label[name*="stockPriceLabelName"]').html('Stock Price 1');
        $('label[name*="stockVariation"]').html('Stock Variation 1');
        $('label[name*="stockColorLabelName"]').html('Stock Color 1');
        $('div[name*=stockColorDivId]').hide();
        $('div[name*=wonLossByDivId]').hide();
        
        $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", '');
        $('div[name="group-a[0][imageFilePreviewDivId]"]').hide();
        $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
        $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
        
        $('img[name="creditFilePreviewImgId"]').attr("src", '');
        $('img[name="creditFilePreviewImgId"]').hide();
        $('div[name="creditFilePreviewDivId"]').hide();
        
        $('img[name*="fourImageFilePreviewImgId"]').attr("src", '');
        $('img[name*="fourImageFilePreviewImgId"]').hide();
        $('div[name*="fourImageFilePreviewDivId"]').hide();
        $('#photoMappingDivId').hide();
        $('div[name*="selectTitleFontColorDivId"]').hide();
        $("#isImageNamePlateDivId").hide();
        
        switch(storyType)
        {
            case 'top_news':
                $("#top_news_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $("div[name*='justin_image'] label:first-child").text('Cover Image / Video');
                $('div[name*="selectImageTypeImageOrVideoDivId"]').show();
                $('#justin_slug').show();
                //$('#desc_del').show();
                $('#desc_add').show();
                $("#isImageNamePlateDivId").show();
                $("#isHeaderBlinkingDotDivId").show();
                $("#checkboxHeaderBlinkingColorDivId").show();
                $("#headerBlinkingColorLabelId").text('Select Color');
                $("#reporterNameAndCityDivId").show();
                $("#stockPriceFormDivId").show();
                $('div[name*=stockColorDivId]').show();
                $("#isShowDisclaimerDivId").show();
                $("#isShowLogoOnTopDivId").show();
                
                $("#companyLogoColorDisplayDivId").show();
                $("#isShowLogoOnTopDivId").show();
                setLogoUpload();
                $("#isShowPhotoCrediterNameDivId").show();
                $("#isShowRedColorLineDivId").show();
                //$("#assignLabelDynamically").html('Points');
                $("#timelineDescription").show();
                if(pageLoad == 0)
                {
                    $('label[name*="assignLabelDynamically"]').html('Pointer 1');
                    $('#description').val('');
                     $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name*="description_max_characters"]').html('Max 200 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 15 Characters');
                }
                $('input[name*="title"]').attr('maxlength','100');
                $('textarea[name*="description"]').attr('maxlength','200');
                $('input[name="slug"]').attr('maxlength','15');
                $(".addDescription").html('<i class="bx bx-plus label-icon"></i> Add New Pointer');
                
                //$('label[name*="assignLabelDynamically"]').removeClass('newsMatterLabel');
                //$('label[name*="assignLabelDynamically"]').addClass('descriptionLabel');
                
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
    
                titleMaxLength = 100;
                descriptionMaxLength = 200;
                slugMaxLength = 15;
            break;
            case 'insider':
                $("#insider_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $("div[name*='justin_image'] label:first-child").text('Cover Image / Video');
                $('div[name*="selectImageTypeImageOrVideoDivId"]').show();
                $('#justin_slug').show();
                //$('#desc_del').show();
                $('#desc_add').show();
                $("#isImageNamePlateDivId").show();
                $("#isHeaderBlinkingDotDivId").show();
                $("#checkboxHeaderBlinkingColorDivId").show();
                $("#headerBlinkingColorLabelId").text('Select Color');
                $("#reporterNameAndCityDivId").show();
                $("#isShowDisclaimerDivId").show();
                $("#companyLogoColorDisplayDivId").show();
                $("#isShowLogoOnTopDivId").show();
                setLogoUpload();
                $("#isShowPhotoCrediterNameDivId").show();
                $("#isShowRedColorLineDivId").show();
                //$("#assignLabelDynamically").html('Points');
                $("#timelineDescription").show();
                if(pageLoad == 0)
                {
                    $('label[name*="assignLabelDynamically"]').html('Pointer 1');
                    $('#description').val('');
                     $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name*="description_max_characters"]').html('Max 200 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 15 Characters');
                }
                $('input[name*="title"]').attr('maxlength','100');
                $('textarea[name*="description"]').attr('maxlength','200');
                $('input[name="slug"]').attr('maxlength','15');
                $(".addDescription").html('<i class="bx bx-plus label-icon"></i> Add New Pointer');
                
                //$('label[name*="assignLabelDynamically"]').removeClass('newsMatterLabel');
                //$('label[name*="assignLabelDynamically"]').addClass('descriptionLabel');
                
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
    
                titleMaxLength = 100;
                descriptionMaxLength = 200;
                slugMaxLength = 15;
            break;
            case 'news_update':
                $("#news_update_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $('div[name*="selectImageTypeImageOrVideoDivId"]').hide();
                $('#justin_slug').hide();
               // $('#desc_del').show();
                $('#desc_add').show();
                $("#timelineDescription").show();
                $("#isHeaderBlinkingDotDivId").show();
                $("#checkboxHeaderBlinkingColorDivId").show();
                $("#headerBlinkingColorLabelId").text('Select Color');
                $("#stockPriceFormDivId").show();
                $('div[name*=stockColorDivId]').show();
                $("#isShowDisclaimerDivId").show();
                if(pageLoad == 0)
                {
                    $('label[name*="assignLabelDynamically"]').html('Pointer 1');
                    $('#description').val('');
                    $('small[name*="title_max_characters"]').html('Max 300 Characters');
                    
                    $('small[name*="description_max_characters"]').html('Max 600 Characters');
                }
                $('textarea[name*="description"]').attr('maxlength','600');
                $('input[name*="title"]').attr('maxlength','300');
                $(".addDescription").html('<i class="bx bx-plus label-icon"></i> Add New Pointer');
                $("div[name*='justin_image'] label:first-child").text('Image / Video');
                 $("#selectAudioTypeDivId").hide();
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
                titleMaxLength = 300;
                descriptionMaxLength = 600;
            break;
            case 'justin':
                $("#justin_preview_div_id").show();
                $('#justin_title').hide();
                $("div[name*='justin_image'] label:first-child").text('Image / Video');
               $('div[name*="selectImageTypeImageOrVideoDivId"]').hide();
                $('#justin_slug').show();
                $('#justin_slug label').text('Header');
                $("#timelineDescription").show();
                $("#isHeaderBlinkingDotDivId").show();
                $("#checkboxHeaderBlinkingColorDivId").show();
                $("#headerBlinkingColorLabelId").text('Select Color');
                $("#stockPriceFormDivId").show();
                $('div[name*=stockColorDivId]').show();
                $("#isShowDisclaimerDivId").show();
                if(pageLoad == 0)
                {
                    $('label[name*="assignLabelDynamically"]').html('Headline 1');
                    $('#description').val('');
                    $('small[name*="description_max_characters"]').html('Max 200 Characters');
                    $('small[name="slug_max_characters"]').html('Max 30 Characters');
                }
                $("#innerPagesDivId").hide();
                $('textarea[name*="description"]').attr('maxlength','200');
                $('input[name="slug"]').attr('maxlength','30');
                $(".addDescription").html('<i class="bx bx-plus label-icon"></i> Add New Headline');
                //$('#desc_del').show();
                $('#desc_add').show();
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
                descriptionMaxLength = 200;
                slugMaxLength = 30;
            break;
            case 'video_header_videoline':
                $("#video_header_videoline_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $('div[name*="selectImageTypeImageOrVideoDivId"]').show();
                $('#justin_slug label').text('Header');
                $("div[name*='justin_image'] label:first-child").text('Video');
                $('#justin_slug').show();
                $("#isHeaderBlinkingDotDivId").show();
                $("#checkboxHeaderBlinkingColorDivId").show();
                $("#headerBlinkingColorLabelId").text('Select Color');
                if(pageLoad == 0)
                {
                    $('#description').val('');
                    $('small[name*="title_max_characters"]').html('Max 50 Characters');
                    
                    $('small[name*="description_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 30 Characters');
                }
                $('input[name*="title"]').attr('maxlength','50');
                $('textarea[name*="description"]').attr('maxlength','100');
                $('input[name="slug"]').attr('maxlength','30');
                $("#companyLogoColorDisplayDivId").show();
                $("#isShowLogoOnTopDivId").show();
                setLogoUpload();
                $("#isShowPhotoCrediterNameDivId").show();
                
                titleMaxLength = 50;
                descriptionMaxLength = 100;
                slugMaxLength = 30;
            break;
            case 'text_with_header':
                $("#text_with_header_preview_div_id").show();
                $('#justin_title').hide();
                $("div[name*='justin_image'] label:first-child").text('Image / Video');
                $('div[name*="selectImageTypeImageOrVideoDivId"]').hide();
                $('#justin_slug').show();
                $('label[name*="assignLabelDynamically"]').html('News Matter');
                $('#justin_slug label').text('Header');
                $('#multipleImagesDeleteDivId').hide();
                $('#multipleImagesAddDivId').hide();
                $("#timelineDescription").show();
                $("#stockPriceFormDivId").show();
                $('div[name*=stockColorDivId]').show();
                $("#isShowDisclaimerDivId").show();
                $("#isHeaderBlinkingDotDivId").show();
                $("#checkboxHeaderBlinkingColorDivId").show();
                $("#headerBlinkingColorLabelId").text('Select Color');
                $("#innerPagesDivId").hide();
                if(pageLoad == 0)
                {
                    $('#description').val('');
                
                    $('small[name*="description_max_characters"]').html('Max 600 Characters');
                   
                    $('small[name="slug_max_characters"]').html('Max 100 Characters');
                }
                $('textarea[name*="description"]').attr('maxlength','600');
                $('input[name="slug"]').attr('maxlength','100');
                descriptionMaxLength = 600;
                slugMaxLength = 100;
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
            break;
            case 'photo_header_photoline':
                $("#photo_header_photoline_preview_div_id").show();
                $('#justin_title').show();
                $("#isImageNamePlateDivId").show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $('div[name*="selectImageTypeImageOrVideoDivId"]').show();
                $('#justin_slug').show();
                $('#justin_slug label').text('Header');
                $('#justin_title label').text('Photoline');
                $("div[name*='justin_image'] label:first-child").text('Cover Image');
                $("#timelineDescription").hide();
                $("#companyLogoColorDisplayDivId").show();
                $("#isShowLogoOnTopDivId").show();
                setLogoUpload();
                $("#isShowPhotoCrediterNameDivId").show();
                $("#isShowRedColorLineDivId").show();
                if(pageLoad == 0)
                {
                    $('#description').val('');
                    $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name*="description_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 30 Characters');
                }
                $('input[name*="title"]').attr('maxlength','100');
                $('textarea[name*="description"]').attr('maxlength','100');
                $('input[name="slug"]').attr('maxlength','30');
                titleMaxLength = 100;
                descriptionMaxLength = 100;
                slugMaxLength = 30;
            break;
            case 'photo_photoline':
                $("#photo_photoline_preview_div_id").show();
                $('#justin_title').show();
                $("#isImageNamePlateDivId").show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $('div[name*="selectImageTypeImageOrVideoDivId"]').show();
                $('#justin_title label').text('Photoline');
                $("div[name*='justin_image'] label:first-child").text('Cover Image');
                $('#justin_slug').hide();
                if(pageLoad == 0)
                {
                    $('#description').val('');
                    $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                }
                $('input[name*="title"]').attr('maxlength','100');
                $("#timelineDescription").hide();
                $("#companyLogoColorDisplayDivId").show();
                $("#isShowLogoOnTopDivId").show();
                setLogoUpload();
                $("#isShowPhotoCrediterNameDivId").show();
                $("#isShowRedColorLineDivId").show();
                titleMaxLength = 100;
                descriptionMaxLength = 100;
                
            break;
            case 'photo_album':
                $("#photo_album_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $('#justin_slug label').text('Header');
                $('#justin_title label').text('Photoline 1');
                $("div[name*='justin_image'] label:first-child").text('Cover Image 1');
                $('div[name*="selectImageTypeImageOrVideoDivId"]').show();
                $('#justin_slug').show();
                $('#multipleImagesDeleteDivId').show();
                $('#multipleImagesAddDivId').show();
                $("#companyLogoColorDisplayDivId").show();
                $("#isShowLogoOnTopDivId").show();
                setLogoUpload();
                $("#isShowPhotoCrediterNameDivId").show();
                $("#isShowRedColorLineDivId").show();
                if(pageLoad == 0)
                {
                    $('#description').val('');
                    $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 30 Characters');
                }
                $('input[name*="title"]').attr('maxlength','100');
                $('input[name="slug"]').attr('maxlength','30');
                $("#multipleImagesAddDivId").html('<i class="bx bx-plus label-icon"></i> Add New Photoline');
                titleMaxLength = 100;
                descriptionMaxLength = 100;
                slugMaxLength = 30;
            break;
            case 'story_album':
                $("#story_album_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $('#justin_slug label').text('Header');
                $('#justin_title label').text('Photoline 1');
                $("div[name*='justin_image'] label:first-child").text('Cover Image 1');
                $('div[name*="selectImageTypeImageOrVideoDivId"]').show();
                $('#justin_slug').show();
                $('#multipleImagesDeleteDivId').show();
                $('#multipleImagesAddDivId').show();
                $("#isHeaderBlinkingDotDivId").show();
                $("#checkboxHeaderBlinkingColorDivId").show();
                $("#headerBlinkingColorLabelId").text('Select Color');
                $("#companyLogoColorDisplayDivId").show();
                $("#isShowLogoOnTopDivId").show();
                setLogoUpload();
                $("#isShowPhotoCrediterNameDivId").show();
                if(pageLoad == 0)
                {
                    $('#description').val('');
                    $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 30 Characters');
                }
                $('input[name*="title"]').attr('maxlength','100');
                $("#multipleImagesAddDivId").html('<i class="bx bx-plus label-icon"></i> Add New Photoline');
                $('input[name="slug"]').attr('maxlength','30');
                titleMaxLength = 100;
                descriptionMaxLength = 100;
                slugMaxLength = 30;
            break;
            case 'thread':
                $("#thread_preview_div_id").show();
                $("#bugDisplayDivId").show();
                $("#isImageNamePlateDivId").show();
                if(pageLoad == 0)
                {
                    $("#bugColorSettingDivId").show();
                }
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $("div[name*='justin_image'] label:first-child").text('Cover Image / Video');
                $('#justin_slug label').text('Header');
                $('#justin_title label').text('Headline');
                $('div[name*="selectImageTypeImageOrVideoDivId"]').show();
                $('#justin_slug').show();
                $("#timelineDescription").hide();
                $("#isHeaderBlinkingDotDivId").show();
                $("#checkboxHeaderBlinkingColorDivId").show();
                $("#headerBlinkingColorLabelId").text('Select Color');
                $("#reporterNameAndCityDivId").show();
                $("#stockPriceFormDivId").show();
                $('div[name*=stockColorDivId]').show();

                $("#isShowDisclaimerDivId").show();
                $("#companyLogoColorDisplayDivId").show();
                $("#isShowLogoOnTopDivId").show();
                setLogoUpload();
                $("#isShowPhotoCrediterNameDivId").show();
                if(pageLoad == 0)
                {
                    $('#threadDescription').val('');
                    $('#description').val('');
                    $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name*="thread_description_max_characters"]').html('Max 200 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 30 Characters');
                }
                $('input[name*="title"]').attr('maxlength','100');
                $('textarea[name*="threadDescription"]').attr('maxlength','200');
                $('input[name="slug"]').attr('maxlength','30');
                $("#tagTypeDivId").show();
                $("#threadDescriptionDivId").show();
                
                $("#threadMultipleImagesDivId").show();
                
                titleMaxLength = 100;
                descriptionMaxLength = 200;
                slugMaxLength = 30;
                
            break;
            case 'emoji_and_text':
                $("#emojiDivId").show();
                $("#emoji_and_text_preview_div_id").show();
                
                $('#justin_title').hide();
                $("div[name*='justin_image'] label:first-child").text('Image / Video');
                $('#justin_slug').show();
                $('#justin_slug label').text('Header');
                $('label[name*="assignLabelDynamically"]').html('News Matter');
                $('#multipleImagesDeleteDivId').hide();
                $('#multipleImagesAddDivId').hide();
                $("#timelineDescription").show();
                if(pageLoad == 0)
                {
                    $('#description').val('');
                    $('small[name*="description_max_characters"]').html('Max 200 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 30 Characters');
                }
                $('textarea[name*="description"]').attr('maxlength','200');
                $('input[name="slug"]').attr('maxlength','30');
                descriptionMaxLength = 200;
                slugMaxLength = 30;
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
            break;
            case 'audio':
                $("#audio_preview_div_id").show();
                $('#justin_title').hide();
                $("div[name*='justin_image'] label:first-child").text('Cover Image');
                $('#justin_slug label').text('Header');
                $('#justin_title label').text('Headline');
                $('label[name*="assignLabelDynamically"]').html('News Matter');
                $('div[name*="selectImageTypeImageOrVideoDivId"]').show();
                $('#justin_slug').show();
                $('#multipleImagesDeleteDivId').hide();
                $('#multipleImagesAddDivId').hide();
                $("#timelineDescription").show();
                $("#isHeaderBlinkingDotDivId").show();
                $("#checkboxHeaderBlinkingColorDivId").show();
                $("#headerBlinkingColorLabelId").text('Select Color');
                $("#reporterNameAndCityDivId").show();
                $("#companyLogoColorDisplayDivId").show();
                $("#isShowLogoOnTopDivId").show();
                setLogoUpload();
                $("#isShowPhotoCrediterNameDivId").show();
                if(pageLoad == 0)
                {
                    $('#description').val('');
                    $('small[name*="description_max_characters"]').html('Max 150 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 30 Characters');
                }
                $('textarea[name*="description"]').attr('maxlength','150');
                $('input[name="slug"]').attr('maxlength','30');
                 $("#selectAudioTypeDivId").show();
                descriptionMaxLength = 150;
                slugMaxLength = 30;
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
            break;
            case 'social_media':
                $("#social_media_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $("div[name*='justin_image'] label:first-child").text('Cover Image');
                $('#justin_slug label').text('Header');
                $('#justin_title label').text('Headline');
                $('label[name*="assignLabelDynamically"]').html('News Matter');
                $('div[name*="selectImageTypeImageOrVideoDivId"]').hide();
                $('#justin_slug').show();
                $('#multipleImagesDeleteDivId').hide();
                $('#multipleImagesAddDivId').hide();
                $("#timelineDescription").show();
                $("#tagTypeDivId").show();
                $("#stockPriceFormDivId").show();
                $('div[name*=stockColorDivId]').show();
                $("#isShowDisclaimerDivId").show();
                if(pageLoad == 0)
                {
                    $('#description').val('');
                    $('small[name*="description_max_characters"]').html('Max 100 Characters');
                    $('small[name*="title_max_characters"]').html('Max 50 Characters');
                    $('small[name="slug_max_characters"]').html('Max 30 Characters');
                    
                    
                }
                $('textarea[name*="description"]').attr('maxlength','100');
                $('input[name*="title"]').attr('maxlength','50');
                $('input[name="slug"]').attr('maxlength','30');
                $("#threadMultipleImagesDivId").show();
                
                titleMaxLength = 50;
                descriptionMaxLength = 100;
                slugMaxLength = 30;
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
            break;
            case 'text_with_color_dots':
                $("#text_with_color_dots_preview_div_id").show();
                $("#headlineColorSectionDivId").show();
                $("#headline_color_div_id").show();
                $("#headline_background_color_div_id").show();
                $("#headline_dot_color_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $("div[name*='justin_image'] label:first-child").text('Cover Image');
                $('#justin_slug label').text('Header');
                $('#justin_title label').text('Headline');
                $('label[name*="assignLabelDynamically"]').html('News Matter');
                $('div[name*="selectImageTypeImageOrVideoDivId"]').show();
                $('#justin_slug').show();
                $("#timelineDescription").show();
                if(pageLoad == 0)
                {
                    $('#description').val('');
                    $('small[name*="title_max_characters"]').html('Max 50 Characters');
                    $('small[name*="description_max_characters"]').html('Max 100 Characters');
                    $('small[name="slug_max_characters"]').html('Max 30 Characters');
                }
                $('input[name*="title"]').attr('maxlength','50');
                $('textarea[name*="description"]').attr('maxlength','100');
                $('input[name="slug"]').attr('maxlength','30');
                titleMaxLength = 50;
                descriptionMaxLength = 100;
                slugMaxLength = 30;
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
            break;
            
            case 'big_headlines':
                $("#big_headlines_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $('div[name*="selectImageTypeImageOrVideoDivId"]').hide();
                $('#justin_slug').show();
                $('label[name*="assignLabelDynamically"]').html('News Matter');
                $("#timelineDescription").show();
                $("#bigHeadlinesThemeColorVersion2DivId").show();
                $("#isHeaderBlinkingDotDivId").show();
                $("#checkboxHeaderBlinkingColorDivId").show();
                $("#headerBlinkingColorLabelId").text('Select Color');
                if(pageLoad == 0)
                {
                    $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    $('#description').val('');
                    $('small[name*="description_max_characters"]').html('Max 180 Characters');
                    $('small[name="slug_max_characters"]').html('Max 15 Characters');
                }
                $("#reporterNameAndCityDivId").show();
                $('input[name*="title"]').attr('maxlength','100');
                $('textarea[name*="description"]').attr('maxlength','180');
                $('input[name="slug"]').attr('maxlength','15');
                $("div[name*='justin_image'] label:first-child").text('Image / Video');
                
                titleMaxLength = 100;
                descriptionMaxLength = 180;
                slugMaxLength = 15;
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
            break;
            case 'headlines':
                $("#headlines_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $('div[name*="selectImageTypeImageOrVideoDivId"]').hide();
                $('#justin_slug').hide();
                $('label[name*="assignLabelDynamically"]').html('News Matter');
                $("#timelineDescription").show();
                $("#bigHeadlinesThemeColorDivId").show();
                $("#isHeaderBlinkingDotDivId").show();
                $("#checkboxHeaderBlinkingColorDivId").show();
                $("#headerBlinkingColorLabelId").text('Select Color');
                if(pageLoad == 0)
                {
                    $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    $('#description').val('');
                    $('small[name*="description_max_characters"]').html('Max 180 Characters');
                    $('small[name="slug_max_characters"]').html('Max 15 Characters');
                }
                $("#reporterNameAndCityDivId").show();
                $('input[name*="title"]').attr('maxlength','100');
                $('textarea[name*="description"]').attr('maxlength','180');
                $('input[name="slug"]').attr('maxlength','15');
                $("div[name*='justin_image'] label:first-child").text('Image / Video');
                
                titleMaxLength = 100;
                descriptionMaxLength = 180;
                slugMaxLength = 15;
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
            break;
            case 'poll_performance':
                $("#top_news_preview_div_id").show();
                $('#justin_title').show();
                $("#isImageNamePlateDivId").show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $("div[name*='justin_image'] label:first-child").text('Cover Image / Video');
                $('div[name*="selectImageTypeImageOrVideoDivId"]').show();
                $('#justin_slug').show();
                //$('#desc_del').show();
                $('#desc_add').show();
                $("#isHeaderBlinkingDotDivId").show();
                $("#checkboxHeaderBlinkingColorDivId").show();
                $("#headerBlinkingColorLabelId").text('Select Color');
                $("#reporterNameAndCityDivId").show();
                $("#stockPriceFormDivId").show();
                //$("#pollperformanceFormDivId").show();
                $('div[name*=wonLossByDivId]').show();
                $('div[name*=wonLossTypeDivId]').show();
                $("#isShowDisclaimerDivId").show();
                $("#companyLogoColorDisplayDivId").show();
                $("#isShowLogoOnTopDivId").show();
                setLogoUpload();
                $("#isShowPhotoCrediterNameDivId").show();
                $("#isShowRedColorLineDivId").show();
                //$("#assignLabelDynamically").html('Points');
                $("#timelineDescription").show();
                $("#isStockFormOpenLabelId").text('Do you want to add poll performance ?');

                if(pageLoad == 0)
                {
                    $('label[name*="assignLabelDynamically"]').html('Pointer 1');
                    $('#description').val('');
                     $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name*="description_max_characters"]').html('Max 200 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 15 Characters');
                }
                $('input[name*="title"]').attr('maxlength','100');
                $('textarea[name*="description"]').attr('maxlength','200');
                $('input[name="slug"]').attr('maxlength','15');
                $(".addDescription").html('<i class="bx bx-plus label-icon"></i> Add New Pointer');
                
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
    
                titleMaxLength = 100;
                descriptionMaxLength = 200;
                slugMaxLength = 15;
            break;
            case 'company_headlines':
                $("#top_news_preview_div_id").show();
                $('#justin_title').show();
                $("#isImageNamePlateDivId").show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $("div[name*='justin_image'] label:first-child").text('Cover Image / Video');
                $('div[name*="selectImageTypeImageOrVideoDivId"]').show();
                $('#justin_slug').show();
                //$('#desc_del').show();
                $('#desc_add').show();
                $("#isHeaderBlinkingDotDivId").show();
                $("#checkboxHeaderBlinkingColorDivId").show();
                $("#headerBlinkingColorLabelId").text('Select Color');
                $("#reporterNameAndCityDivId").show();
                $("#stockPriceFormDivId").show();
                //$("#companyHeadlinesFormDivId").show();
                $("#isShowDisclaimerDivId").show();
                $("#companyLogoColorDisplayDivId").show();
                $("#isShowLogoOnTopDivId").show();
                setLogoUpload();
                $("#isShowPhotoCrediterNameDivId").show();
                $("#isShowRedColorLineDivId").show();
                //$("#assignLabelDynamically").html('Points');
                $("#timelineDescription").show();

                $("#isStockFormOpenLabelId").text('Do you want to add company performance ?');

                if(pageLoad == 0)
                {
                    $('label[name*="assignLabelDynamically"]').html('Pointer 1');
                    $('#description').val('');
                    $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name*="description_max_characters"]').html('Max 200 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 15 Characters');
                }
                $('input[name*="title"]').attr('maxlength','100');
                $('textarea[name*="description"]').attr('maxlength','200');
                $('input[name="slug"]').attr('maxlength','15');
                $(".addDescription").html('<i class="bx bx-plus label-icon"></i> Add New Pointer');
                
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
    
                titleMaxLength = 100;
                descriptionMaxLength = 200;
                slugMaxLength = 15;
            break;
            case 'contact_card':
                $("#contact_card_preview_div_id").show();
                $('#justin_title').hide();
                $('#justin_slug label').text('Header');
                $("div[name*='justin_image'] label:first-child").text('Company Logo');
                $('div[name*="selectImageTypeImageOrVideoDivId"]').show();
                $('label[name*="selectImageTypeImageOrVideoLabelName"]').text('Select Image Type');
               // $("#companyLogoColorDisplayDivId").show();
                $('#justin_slug').show();
                //$('#desc_del').show();
                $('#desc_add').show();
                $("#nameDivId").show();
                $("#nameLabelId").html('Name');
                $("#designationDivId").show();                
                $("#addressDivId").show();
                $("#contactCardPersonalInfoDivId").show();
                $("#selectImageTypeImageDivId").show();
                $("#isShowRedColorLineDivId").show();
                $("#companyLogoColorDisplayDivId").show();
                $("#isShowLogoOnTopDivId").show();
                setLogoUpload();
                $("#isShowPhotoCrediterNameDivId").show();
                if(pageLoad == 0)
                {
                    $('label[name*="assignLabelDynamically"]').html('Pointer 1');
                    $('#description').val('');
                    $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name*="description_max_characters"]').html('Max 200 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 15 Characters');
                }
                $('input[name*="title"]').attr('maxlength','100');
                $('textarea[name*="description"]').attr('maxlength','200');
                $('input[name="slug"]').attr('maxlength','15');
                $(".addDescription").html('<i class="bx bx-plus label-icon"></i> Add New Pointer');
                
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
                
                titleMaxLength = 100;
                descriptionMaxLength = 200;
                slugMaxLength = 15;
            break;
            case 'stoke_up':
                $("#stock_up_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $('#justin_slug label').text('Header');
                $('#justin_slug').show();
                
                if(pageLoad == 0)
                {
                    $('label[name*="assignLabelDynamically"]').html('Description');
                    $('#description').val('');
                    $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name*="description_max_characters"]').html('Max 200 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 15 Characters');
                }
                $("#stokeUpFormDivId").show();
                $('input[name*="title"]').attr('maxlength','100');
                $('textarea[name*="description"]').attr('maxlength','200');
                $('input[name="slug"]').attr('maxlength','15');
                $(".addDescription").html('<i class="bx bx-plus label-icon"></i> Add New Pointer');
                $("#timelineDescription").hide();
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $("#stockPriceFormDivId").hide();
                $("#isShowDisclaimerDivId").show();
                titleMaxLength = 100;
                descriptionMaxLength = 200;
                slugMaxLength = 15;
            break;
            case 'heading_with_two_photo':
                $("#heading_with_two_photo_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $('#justin_slug label').text('Header');
                $("div[name*='justin_image'] label:first-child").text('Cover Image / Video');
                $('label[name*="selectImageTypeImageOrVideoLabelName"]').text('Select Image Type (First)');
                $('label[name*="selectImageTypeImageLabelName"]').text('Select Image Type (Second)');
                $('div[name*="selectImageTypeImageOrVideoDivId"]').show();
                $('#justin_slug').show();
               // $('#desc_del').show();
                $('#desc_add').show();
                $("#reporterNameAndCityDivId").show();
                $("#companyLogoColorDisplayDivId").show();
                $("#isShowLogoOnTopDivId").show();
                setLogoUpload();
                $("#isShowPhotoCrediterNameDivId").show();
                //$("#assignLabelDynamically").html('Points');
                $("#selectImageTypeImageRowDivId").show();
                $("#selectImageTypeImageDivId").show();
                $("#timelineDescription").show();
                if(pageLoad == 0)
                {
                    $('label[name*="assignLabelDynamically"]').html('Pointer 1');
                    $('#description').val('');
                     $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name*="description_max_characters"]').html('Max 200 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 15 Characters');
                }
                $('input[name*="title"]').attr('maxlength','100');
                $('textarea[name*="description"]').attr('maxlength','200');
                $('input[name="slug"]').attr('maxlength','15');
                $(".addDescription").html('<i class="bx bx-plus label-icon"></i> Add New Pointer');
                
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
    
                titleMaxLength = 100;
                descriptionMaxLength = 200;
                slugMaxLength = 15;
            break;
            case 'before_and_after':
                $("#before_and_after_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $('#justin_slug label').text('Header');
                $("div[name*='justin_image'] label:first-child").text('Cover Image / Video');
                $('label[name*="selectImageTypeImageOrVideoLabelName"]').text('Select Image Type (First)');
                $('label[name*="selectImageTypeImageLabelName"]').text('Select Image Type (Second)');
                $('div[name*="selectImageTypeImageOrVideoDivId"]').show();
                $('#justin_slug').show();
                //$('#desc_del').show();
                $('#desc_add').show();
                $("#reporterNameAndCityDivId").show();
                $("#companyLogoColorDisplayDivId").show();
                $("#isShowLogoOnTopDivId").show();
                setLogoUpload();
                $("#isShowPhotoCrediterNameDivId").show();
                $("#afterTimelineDescription").show();
                //$("#assignLabelDynamically").html('Points');
                $("#selectImageTypeImageRowDivId").show();
                $("#selectImageTypeImageDivId").show();
                $("#timelineDescription").show();
                
                $("#beforeLabelDivId").show();
                $("#afterLabelDivId").show();
                
                if(pageLoad == 0)
                {
                    $('label[name*="assignLabelDynamically"]').html('Before Pointer 1');
                    $('label[name*="afterDescriptionLabel"]').html('After Pointer 1');
                    
                    $('#description').val('');
                     $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name*="description_max_characters"]').html('Max 200 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 15 Characters');
                }
                $('input[name*="title"]').attr('maxlength','100');
                $('textarea[name*="description"]').attr('maxlength','200');
                $('input[name="slug"]').attr('maxlength','15');
                $(".addDescription").html('<i class="bx bx-plus label-icon"></i> Add New Pointer');
                
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
    
                titleMaxLength = 100;
                descriptionMaxLength = 200;
                slugMaxLength = 15;
            break;
            case 'heading_with_four_photo':
                $("#heading_with_four_photo_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $('#justin_slug label').text('Header');
                
                $('#justin_slug').show();
                //$('#desc_del').show();
                $('#desc_add').show();
                $("#reporterNameAndCityDivId").show();
                $("#companyLogoColorDisplayDivId").show();
                $("#isShowLogoOnTopDivId").show();
                setLogoUpload();
                $("#isShowPhotoCrediterNameDivId").show();
                //$("#assignLabelDynamically").html('Points');
               
                $("#timelineDescription").show();
                
                $("#fourPhotoDivId").show();
                if(pageLoad == 0)
                {
                    $('label[name*="assignLabelDynamically"]').html('Pointer 1');
                    $('#description').val('');
                     $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name*="description_max_characters"]').html('Max 200 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 15 Characters');
                }
                $('input[name*="title"]').attr('maxlength','100');
                $('textarea[name*="description"]').attr('maxlength','200');
                $('input[name="slug"]').attr('maxlength','15');
                $(".addDescription").html('<i class="bx bx-plus label-icon"></i> Add New Pointer');
                
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
    
                titleMaxLength = 100;
                descriptionMaxLength = 200;
                slugMaxLength = 15;
            break;

            case 'full_screen':
                $("#fullScreenPreviewId").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $("div[name*='justin_image'] label:first-child").text('Cover Image / Video');
                $('div[name*="selectImageTypeImageOrVideoDivId"]').show();
                $('#justin_slug').show();
                $('#desc_del').hide();
                $('#desc_add').hide();
                $("#companyLogoColorDisplayDivId").show();
                $("#isShowLogoOnTopDivId").show();
                setLogoUpload();
                $("#isShowPhotoCrediterNameDivId").show();
                $("#positionAndAlignmentDivId").show();
                //$("#assignLabelDynamically").html('Points');
                $("#timelineDescription").hide();
               // $("#companyLogoColorDisplayDivId").show();
                if(pageLoad == 0)
                {
                    $('label[name*="assignLabelDynamically"]').html('News Matter');
                    $('#description').val('');
                     $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name*="description_max_characters"]').html('Max 200 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 15 Characters');
                }
                $('input[name*="title"]').attr('maxlength','100');
                $('textarea[name*="description"]').attr('maxlength','200');
                $('input[name="slug"]').attr('maxlength','15');
                $(".addDescription").html('<i class="bx bx-plus label-icon"></i> Add New Pointer');
                
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
    
                titleMaxLength = 100;
                descriptionMaxLength = 200;
                slugMaxLength = 15;
            break;
            case 'spliter':
                $("#spliter_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $("div[name*='justin_image'] label:first-child").text('Cover Image');
                $('div[name*="selectImageTypeImageOrVideoDivId"]').show();
                $('#justin_slug').hide();
                $('#desc_del').hide();
                $('#desc_add').hide();
                $("#companyLogoColorDisplayDivId").show();
                $("#isShowLogoOnTopDivId").show();
                setLogoUpload();
                $("#isShowPhotoCrediterNameDivId").show();
                if(pageLoad == 0)
                {
                    $('label[name*="assignLabelDynamically"]').html('News Matter');
                    $('#description').val('');
                     $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name*="description_max_characters"]').html('Max 200 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 15 Characters');
                }
                $('input[name*="title"]').attr('maxlength','100');
                $('textarea[name*="description"]').attr('maxlength','200');
                $('input[name="slug"]').attr('maxlength','15');
                $(".addDescription").html('<i class="bx bx-plus label-icon"></i> Add New Pointer');
                
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
    
                titleMaxLength = 100;
                descriptionMaxLength = 200;
                slugMaxLength = 15;
            break;
            case 'weekend':
                $("#weekend_preview_div_id").show();
               // $("#companyLogoColorDisplayDivId").show();
                $('#weekendFormDivId').show();
                $("#isShowLogoOnTopDivId").show();
                $("#companyLogoColorDisplayDivId").show();
                setLogoUpload();
                $("#isShowPhotoCrediterNameDivId").show();
                $("#innerPagesDivId").hide();
            break;
            case 'stokes_scroll':
                $("#stokes_scroll_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $('#justin_slug label').text('Header');
                $('#justin_slug').show();
               // $('#desc_del').show();
                $('#desc_add').show();
                if(pageLoad == 0)
                {
                    $('label[name*="assignLabelDynamically"]').html('Pointer 1');
                    $('#description').val('');
                    $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name*="description_max_characters"]').html('Max 200 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 15 Characters');
                }
                $("#stokeUpFormDivId").show();
                $('input[name*="title"]').attr('maxlength','100');
                $('textarea[name*="description"]').attr('maxlength','200');
                $('input[name="slug"]').attr('maxlength','15');
                $(".addDescription").html('<i class="bx bx-plus label-icon"></i> Add New Pointer');
                $("#timelineDescription").show();
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
                $("#stockPriceFormDivId").hide();
                $("#isShowDisclaimerDivId").show();
                titleMaxLength = 100;
                descriptionMaxLength = 200;
                slugMaxLength = 15;
            break;
            case 'heading_with_stokes':
                $("#heading_with_stokes_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $('#justin_slug label').text('Header');
                $('#justin_slug').show();
                if(pageLoad == 0)
                {
                    $('label[name*="assignLabelDynamically"]').html('Description');
                    $('#description').val('');
                    $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name*="description_max_characters"]').html('Max 200 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 15 Characters');
                }
                $("#stokeUpFormDivId").show();
                $('input[name*="title"]').attr('maxlength','100');
                $('input[name="slug"]').attr('maxlength','15');
                
                $("#isShowDisclaimerDivId").show();
                titleMaxLength = 100;
                slugMaxLength = 15;
            break;
            case 'bullets':
                $("#bullets_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $('div[name*="selectImageTypeImageOrVideoDivId"]').hide();
                $('#justin_slug').show();
                
                $("#reporterNameAndCityDivId").show();
                $("#bulletsRepeaterDivId").show();
                if(pageLoad == 0)
                {
                    $('label[name*="assignLabelDynamically"]').html('Pointer 1');
                    $('#description').val('');
                    $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name*="description_max_characters"]').html('Max 200 Characters');
                    $('small[name="slug_max_characters"]').html('Max 30 Characters');
                   
                    $('label[name*="stockNameLabel"]').html('Stock Name 1');
                    $('label[name*="stockPriceLabelName"]').html('Stock Price 1');
                    $('label[name*="stockVariation"]').html('Stock Variation 1');
                }
                $('textarea[name*="description"]').attr('maxlength','200');
                $('input[name*="title"]').attr('maxlength','100');
                $('input[name*="slug"]').attr('maxlength','30');
                $(".addDescription").html('<i class="bx bx-plus label-icon"></i> Add New Pointer');
                $("div[name*='justin_image'] label:first-child").text('Image / Video');
                
                $('label[name*="assignLabelDynamically"]').removeClass('newsMatterLabel');
                $('label[name*="assignLabelDynamically"]').addClass('descriptionLabel');
                titleMaxLength = 100;
                descriptionMaxLength = 200;
                slugMaxLength = 30;
            break;
            case 'big_box':
                $("#big_box_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $("div[name*='justin_image'] label:first-child").text('Cover Image / Video');
                $('div[name*="selectImageTypeImageOrVideoDivId"]').show();
                $('#justin_slug').show();
                $("#isImageNamePlateDivId").show();
                $("#companyLogoColorDisplayDivId").show();
                $("#isShowLogoOnTopDivId").show();
                $("#isShowRedColorLineDivId").show();
                setLogoUpload();
                $("#isShowPhotoCrediterNameDivId").show();
                $("#reporterNameAndCityDivId").show();
                $("#isHeaderBlinkingDotDivId").show();
                $("#checkboxHeaderBlinkingColorDivId").hide();
                $("#headerBlinkingColorDivId").show();
                $("#headerBlinkingColorLabelId").text('Select Box Color');

                $("#timelineDescription").hide();
               // $("#companyLogoColorDisplayDivId").show();
                //$('#desc_del').show();
                $('#desc_add').show();
                if(pageLoad == 0)
                {
                    $('label[name*="assignLabelDynamically"]').html('Pointer 1');
                    $('#description').val('');
                    $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name*="description_max_characters"]').html('Max 200 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 15 Characters');
                }
                $('input[name*="title"]').attr('maxlength','100');
                $('textarea[name*="description"]').attr('maxlength','200');
                $('input[name="slug"]').attr('maxlength','15');
                $(".addDescription").html('<i class="bx bx-plus label-icon"></i> Add New Pointer');
                $("#timelineDescription").show();
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $("#boxHeadingDivId").show();

                titleMaxLength = 100;
                descriptionMaxLength = 200;
                slugMaxLength = 15;
            break;
            case 'five_question':
                $("#five_question_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $("div[name*='justin_image'] label:first-child").text('Cover Image / Video');
                $('div[name*="selectImageTypeImageOrVideoDivId"]').show();
                $('#justin_slug').show();
                $("#isShowLogoOnTopDivId").show();
                $("#companyLogoColorDisplayDivId").show();
                setLogoUpload();
                $("#isShowPhotoCrediterNameDivId").show();
                $("#questionAnswerFormDivId").show();
                $("#timelineDescription").show();
                $("#isImageNamePlateDivId").show();
                $('#desc_del').hide();
                $('#desc_add').hide();
                $('label[name*="assignLabelDynamically"]').html('Bottom Info Line');
                if(pageLoad == 0)
                {
                    $('#description').val('');
                    $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name*="description_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 15 Characters');
                }
                $("#nameDivId").show();
                $("#nameLabelId").html('Interviewer Name');

                $('input[name*="title"]').attr('maxlength','100');
                $('textarea[name*="description"]').attr('maxlength','200');
                $('input[name="slug"]').attr('maxlength','15');
                $(".addDescription").html('<i class="bx bx-plus label-icon"></i> Add New Pointer');
                $("#timelineDescription").show();
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');

                titleMaxLength = 100;
                descriptionMaxLength = 100;
                slugMaxLength = 15;
            break;
            case 'short':
                $("#short_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $("#timelineDescription").show();
                $("#userCapturedDataTypeDivId").show();
                if(pageLoad == 0)
                {
                    $('label[name*="assignLabelDynamically"]').html('Description');
                    $('#description').val('');
                    $('small[name*="title_max_characters"]').html('Max 50 Characters');
                    
                    $('small[name*="description_max_characters"]').html('Max 120 Characters');
                }
                $('input[name*="title"]').attr('maxlength','50');
                $('textarea[name*="description"]').attr('maxlength','120');
                $("#timelineDescription").show();
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                titleMaxLength = 50;
                descriptionMaxLength = 120;
            break;
            case 'photo_mapping':
                $("#photo_mapping_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                addTextOnImage('','','afterImage');
                $("div[name*='justin_image'] label:first-child").text('Cover Image / Video');
                $('div[name*="selectImageTypeImageOrVideoDivId"]').show();
                $('#justin_slug').show();
                $('#photoMappingDivId').show();
                $('#desc_add').show();
                $('#photoMappingDeleteId').hide();
                
                $("#isShowDisclaimerDivId").show();
                $("#reporterNameAndCityDivId").show();
                //$("#assignLabelDynamically").html('Points');
                $("#timelineDescription").show();
                if(pageLoad == 0)
                {
                    $('label[name*="assignLabelDynamically"]').html('Pointer 1');
                    $('#description').val('');
                     $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    
                    $('small[name*="description_max_characters"]').html('Max 200 Characters');
                    
                    $('small[name="slug_max_characters"]').html('Max 15 Characters');
                }
                $('input[name*="title"]').attr('maxlength','100');
                $('textarea[name*="description"]').attr('maxlength','200');
                $('input[name="slug"]').attr('maxlength','15');
                $(".addDescription").html('<i class="bx bx-plus label-icon"></i> Add New Pointer');
                
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
    
                titleMaxLength = 100;
                descriptionMaxLength = 200;
                slugMaxLength = 15;
            break;
            case 'remind_me':
                $("#remind_me_preview_div_id").show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $('div[name*="selectImageTypeImageOrVideoDivId"]').hide();
                $('#justin_slug').hide();
                $('label[name*="assignLabelDynamically"]').html('News Matter');
                $("#timelineDescription").show();
                if(pageLoad == 0)
                {
                    $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    $('#description').val('');
                    $('small[name*="description_max_characters"]').html('Max 180 Characters');
                    $('small[name="slug_max_characters"]').html('Max 15 Characters');
                }
                $('input[name*="title"]').attr('maxlength','100');
                $('textarea[name*="description"]').attr('maxlength','180');
                
                titleMaxLength = 100;
                descriptionMaxLength = 180;
                slugMaxLength = 15;
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
            break;
            case 'count_down':
                $("#count_down_preview_div_id").show();
                
                $('#countDownDateTimeDivId').show();
                $('#justin_title').show();
                $('div[name*="selectTitleFontColorDivId"]').show();
                $('div[name*="selectImageTypeImageOrVideoDivId"]').hide();
                $('#justin_slug').hide();
                $('label[name*="assignLabelDynamically"]').html('News Matter');
                $("#timelineDescription").show();
                if(pageLoad == 0)
                {
                    $('small[name*="title_max_characters"]').html('Max 100 Characters');
                    $('#description').val('');
                    $('small[name*="description_max_characters"]').html('Max 180 Characters');
                    $('small[name="slug_max_characters"]').html('Max 15 Characters');
                }
                $('input[name*="title"]').attr('maxlength','100');
                $('textarea[name*="description"]').attr('maxlength','180');
                
                titleMaxLength = 100;
                descriptionMaxLength = 180;
                slugMaxLength = 15;
                $('label[name*="assignLabelDynamically"]').removeClass('descriptionLabel');
                $('label[name*="assignLabelDynamically"]').addClass('newsMatterLabel');
            break;
        }
    }
    function threadPreviewFunction()
    {
        //$( '#txtArea' ).val( $('#txtArea').val().replace( 'sample',  $("#textbox").val() ) );
        
        var threadDescriptionVal = $('textarea[name="group-a[0][threadDescription]"]').val();
        var storyTypeList = $('input[name="storyTypeList"]:checked').val();
        var threadTimepickerVal = $('input[name="group-a[0][threadTimepicker]"]').val();
        var countForDescription = $('textarea[name*=threadDescription]').length;
        var isEventThreadDisplay = 0;
        var descriptionHtmlDisplay = '';
        if(threadDescriptionVal != '' && threadTimepickerVal != '' && storyTypeList == 'thread')
        {
            for(var i =0; i < parseInt(countForDescription); i++)
            {
                var descriptionVal = $('textarea[name="group-a['+i+'][threadDescription]"]').val();
                var threadTimepickerVal = $('input[name="group-a['+i+'][threadTimepicker]"]').val();
                //console.log('descriptionVal :::: '+descriptionVal);
                
                var tableBodyLength = $(".mytablebody tr").length;
                if(tableBodyLength > 0)
                {
                    var descriptionHtml = getThreadDescriptionHtml(descriptionVal);
                }
                else
                {
                    var descriptionHtml = descriptionVal;
                }
                //descriptionHtmlDisplay += descriptionHtml;
                descriptionHtmlDisplay += '<li class="text_mono"><strong>'+threadTimepickerVal+' : '+'</strong>'+descriptionHtml+'</li>';
                isEventThreadDisplay = 1;
            }
        }
        if(pageLoad == 0)
        {
            $("#userDetailDescriptionPoints").html('');
        }
        
        if(isEventThreadDisplay == 1)
        {
            $("#userThreadDescriptionPoints").html(descriptionHtmlDisplay);
            $("#userThreadDescriptionPoints").show();
            $("#dummyThreadDescriptionPoints").hide();
        } 
        else
        {
            $("#dummyThreadDescriptionPoints").show();
            $("#userThreadDescriptionPoints").hide();
        }
    }
    function socialMediaPreviewFunction()
    {
        var storyTypeList = $('input[name="storyTypeList"]:checked').val();
        
        if(storyTypeList == 'social_media')
        {
            var descriptionVal = $('textarea[name="group-a[0][description]"]').val();
            var descriptionHtml = getThreadDescriptionHtml(descriptionVal);
        }
        if(descriptionVal != '')
        {
            $("#userSocialMediaDescription").html(descriptionHtml);
        } 
        else
        {
            $("#userSocialMediaDescription").html("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.");
        }
    }
    function previewFunction()
    {
        var descriptionVal = $('textarea[name="group-a[0][description]"]').val();
        var countForDescription = $('textarea[name*=description]').length;
        var storyTypeList = $('input[name="storyTypeList"]:checked').val();
        
       
        if(storyTypeList == 'top_news'|| storyTypeList == 'poll_performance' || storyTypeList == 'company_headlines' || storyTypeList == 'news_update' 
                || storyTypeList == 'bullets' || storyTypeList == 'justin' || storyTypeList == 'big_box' 
                || storyTypeList == 'short' || storyTypeList == 'heading_with_two_photo' 
                || storyTypeList == 'heading_with_four_photo'  || storyTypeList == 'stokes_scroll' 
                || storyTypeList == 'five_question' || storyTypeList == 'before_and_after' 
                || storyTypeList == 'headlines'  || storyTypeList == 'remind_me' 
                || storyTypeList == 'count_down'
                || storyTypeList == 'big_headlines' || storyTypeList == 'photo_mapping' 
                || storyTypeList == 'insider')
        {
            var descriptionHtml = '';
            for(var i =0; i < parseInt(countForDescription); i++)
            {
                var descriptionVal = $('textarea[name="group-a['+i+'][description]"]').val();
                
                if(descriptionVal != '' && (storyTypeList == 'top_news' || storyTypeList == 'poll_performance' 
            || storyTypeList == 'company_headlines' || storyTypeList == 'news_update' || storyTypeList == 'bullets' 
            || storyTypeList == 'big_box' || storyTypeList == 'heading_with_two_photo' || storyTypeList == 'heading_with_four_photo'
            || storyTypeList == 'stokes_scroll' || storyTypeList == 'before_and_after' 
            || storyTypeList == 'photo_mapping' || storyTypeList == 'insider'))
                {
                    descriptionHtml += '<li class="text_mono">'+descriptionVal+'</li>';
                }
                else if(descriptionVal != '' && (storyTypeList == 'justin'))
                {
                   if(countForDescription == i+1)
                    {
                        descriptionHtml += '<div class="carousel-item active">'+
                        '<h5 class="timeLineHeadingPhotoFeed text_mono">'+descriptionVal+'</h5>'+
                        '</div>';
                    }
                    else
                    {
                        descriptionHtml += '<div class="carousel-item">'+
                        '<h5 class="timeLineHeadingPhotoFeed text_mono">'+descriptionVal+'</h5>'+
                        '</div>';
                    }
                }
            }
        }
        
        var titleVal = $("#title").val();
        var slugVal = $("#slug").val();
        var txtEmojiVal = $('#txtEmoji').val();
        var txtEmoji = $('#txtEmoji').find('option:selected').text();
        var selectTitleFontColor = $('#selectTitleFontColor').val();
        if(storyTypeList == 'company_headlines' || storyTypeList == 'poll_performance')
        {
            var assignStoryName = 'top_news';
        }
        else
        {
            var assignStoryName = storyTypeList;
        }
        $(".imageNamePlateClass").hide();
        if($("#isImageNamePlate").prop('checked') == true)
        {
            var namePlateColor = $("#namePlateColor").val();
            var namePlateBackgroundColor = $("#namePlateBackgroundColor").val();
            var nameFontColor = $("#nameFontColor").val();
            var namePlate = $("#namePlate").val();
            var designationFontColor = $("#designationFontColor").val();
            var designationPlate = $("#designationPlate").val();
            
             $("div[name="+assignStoryName+"NamePlateBackgroundColor]").css({'background-color':namePlateBackgroundColor,'opacity':'0.7'});
            
            $("div[name="+assignStoryName+"NamePlateColor]").css({'background':namePlateColor,'opacity':'inherit'});

            if(namePlate != '')
                $("div[name="+assignStoryName+"NamePlateName] span").text(namePlate);
            else
                $("div[name="+assignStoryName+"NamePlateName] span").text('Mr. Narendra Modi');

            if(designationPlate != '')
                $("div[name="+assignStoryName+"NamePlateDesignation] span").text(designationPlate);
            else
                $("div[name="+assignStoryName+"NamePlateDesignation] span").text('Prime Minister, India');

            $("div[name="+assignStoryName+"NamePlateDesignation] span").css({'color':designationFontColor});
            $("div[name="+assignStoryName+"NamePlateName] span").css({'color':nameFontColor});

            $("div[name="+assignStoryName+"NamePlateColor]").show();
            $("div[name="+assignStoryName+"NamePlateName]").show();
            $("div[name="+assignStoryName+"NamePlateDesignation]").show();
            $("div[name="+assignStoryName+"NamePlateBackgroundColor]").show();
            $(".imageNamePlateClass").show();
        }
        else
        {
            $(".imageNamePlateClass").hide();
            $("div[name="+assignStoryName+"NamePlateColor]").hide();
            $("div[name="+assignStoryName+"NamePlateName]").hide();
            $("div[name="+assignStoryName+"NamePlateDesignation]").hide();
            $("div[name="+assignStoryName+"NamePlateBackgroundColor]").hide();
        }
        
        if($("#isShowTag").prop('checked') == true)
        {
            var txtTagMaster = $("#txtTagMaster").select2('data')[0]['text'];
            var txtTagMasterOther = $("#txtTagMasterOther").val();
            if(txtTagMaster != null)
            {
                if(txtTagMaster  == 'other')
                {
                    if(txtTagMasterOther != '')
                        var finalTagVal = txtTagMasterOther;
                    else
                        var finalTagVal = txtTagMaster;
                }
                else
                {
                    var finalTagVal = txtTagMaster;
                }
            }
            $("div[id=TagText"+assignStoryName+"]").text(finalTagVal);
            $("div[id=TagText"+assignStoryName+"]").show();
        }
        else
        {
            $("div[id=TagText"+assignStoryName+"]").hide();
        }
        
        switch(storyTypeList)
        {
            case 'top_news':
                if(pageLoad == 0)
                {
                    $("#userDetailDescriptionPoints").html('');
                }
                var reporterName = $("#reporterName").val();
                var reporterCity = $("#reporterCity").val();
                var photoCrediterName = $("#photoCrediterName").val();
                
                if(reporterName != '' && reporterCity != '')
                    $("#topNewsReporterNameCity").text(reporterName+', '+reporterCity);
                else
                    $("#topNewsReporterNameCity").text('Shilpa Singh, Ahmedabad');
                
                if(slugVal != '')
                    $("#userDetailSlug").text(slugVal);
                else
                    $("#userDetailSlug").text('JUST IN');
                
                if(titleVal != '')
                {
                    $("#userDetailTitle").css({'color':selectTitleFontColor});
                    $("#userDetailTitle").text(titleVal);
                } 
                else
                    $("#userDetailTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
                
                if($("#isShowLogoOnTop").prop('checked') == true)
                {
                    $("div[name=showHideNewsFirstLogo]").show();
                }
                else
                {
                    $("div[name=showHideNewsFirstLogo]").hide();
                }
                if($("#isShowRedColorLine").prop('checked') == true)
                {
                    $("div[name=topNewsShowHideRedThickLine]").show();
                }
                else
                {
                    $("div[name=topNewsShowHideRedThickLine]").hide();
                }
                if($("#isShowPhotoCrediterName").prop('checked') == true)
                {
                    if(photoCrediterName != '')
                        $("span[name=topNewsPhotoCrediterName]").text(photoCrediterName);
                    else
                        $("span[name=topNewsPhotoCrediterName]").text('Excelsior');
                    
                    $("div[name=topNewsShowHidePhotoCrediterName]").show();
                }
                else
                {
                    $("div[name=topNewsShowHidePhotoCrediterName]").hide();
                }
                
                
                
                if(descriptionHtml != '')
                {
                    $("#userDetailDescriptionPoints").html(descriptionHtml);
                    $("#userDetailDescriptionPoints").show();
                    $("#dummyDetailDescriptionPoints").hide();
                } 
                else
                {
                    $("#dummyDetailDescriptionPoints").show();
                    $("#userDetailDescriptionPoints").hide();
                }
                if(pageLoad == 1)
                {
                    var fullPath = '../../../images/just_in_timeline/'+imageNameFromDB;
                    $("#hdnIsImageOrVideoAdded").val(1);
                    if(isImage(imageNameFromDB))
                    {
                        $("#topNewsImageId").attr("src", fullPath).css('display','block').width('100%');
                        $("#dummyDetailImageOrVideo").hide();
                        $("#userDetailImageOrVideo").show();
                        $("#userDetailVideoId").hide();
                    }
                    else if(isVideo(imageNameFromDB))
                    {
                        $("#userDetailVideoId source").attr("src", fullPath);
                        $("#userDetailVideoId")[0].load();
                        $("#dummyDetailImageOrVideo").hide();
                        $("#userDetailImageOrVideo").hide();
                        $("#userDetailVideoId").show();
                    }
                }
                setJustDateInPreview(storyTypeList);
            break;
            case 'insider':
                if(pageLoad == 0)
                {
                    $("#userInsiderDescriptionPoints").html('');
                }
                var reporterName = $("#reporterName").val();
                var reporterCity = $("#reporterCity").val();
                var photoCrediterName = $("#photoCrediterName").val();
                
                
                if(reporterName != '' && reporterCity != '')
                    $("#insiderReporterNameCity").text(reporterName+', '+reporterCity);
                else
                    $("#insiderReporterNameCity").text('Shilpa Singh, Ahmedabad');
                
                if(slugVal != '')
                    $("#userInsiderSlug").text(slugVal);
                else
                    $("#userInsiderSlug").text('JUST IN');
                
                if(titleVal != '')
                    $("#userInsiderTitle").text(titleVal);
                else
                    $("#userInsiderTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
                
                if($("#isShowLogoOnTop").prop('checked') == true)
                {
                    $("div[name=showHideNewsFirstLogo]").show();
                }
                else
                {
                    $("div[name=showHideNewsFirstLogo]").hide();
                }
                if($("#isShowRedColorLine").prop('checked') == true)
                {
                    $("div[name=insiderShowHideRedThickLine]").show();
                }
                else
                {
                    $("div[name=insiderShowHideRedThickLine]").hide();
                }
                if($("#isShowPhotoCrediterName").prop('checked') == true)
                {
                    if(photoCrediterName != '')
                        $("span[name=insiderPhotoCrediterName]").text(photoCrediterName);
                    else
                        $("span[name=insiderPhotoCrediterName]").text('Excelsior');
                    
                    $("div[name=insiderShowHidePhotoCrediterName]").show();
                }
                else
                {
                    $("div[name=insiderShowHidePhotoCrediterName]").hide();
                }
                
                if(descriptionHtml != '')
                {
                    $("#userInsiderDescriptionPoints").html(descriptionHtml);
                    $("#userInsiderDescriptionPoints").show();
                    $("#dummyInsiderDescriptionPoints").hide();
                } 
                else
                {
                    $("#dummyInsiderDescriptionPoints").show();
                    $("#userInsiderDescriptionPoints").hide();
                }
                if(pageLoad == 1)
                {
                    var fullPath = '../../../images/just_in_timeline/'+imageNameFromDB;
                    $("#hdnIsImageOrVideoAdded").val(1);
                    if(isImage(imageNameFromDB))
                    {
                        $("#insiderImageId").attr("src", fullPath).css('display','block').width('100%');
                        $("#dummyInsiderImage").hide();
                        $("#userInsiderImage").show();
                    }
                }
                setJustDateInPreview(storyTypeList);
            break;
            case 'poll_performance':
                if(pageLoad == 0)
                {
                    $("#userDetailDescriptionPoints").html('');
                }
                var reporterName = $("#reporterName").val();
                var reporterCity = $("#reporterCity").val();
                var photoCrediterName = $("#photoCrediterName").val();
                
                if($("#isShowLogoOnTop").prop('checked') == true)
                {
                    $("div[name=showHideNewsFirstLogo]").show();
                }
                else
                {
                    $("div[name=showHideNewsFirstLogo]").hide();
                }
                if($("#isShowRedColorLine").prop('checked') == true)
                {
                    $("div[name=topNewsShowHideRedThickLine]").show();
                }
                else
                {
                    $("div[name=topNewsShowHideRedThickLine]").hide();
                }
                if($("#isShowPhotoCrediterName").prop('checked') == true)
                {
                    if(photoCrediterName != '')
                        $("span[name=topNewsPhotoCrediterName]").text(photoCrediterName);
                    else
                        $("span[name=topNewsPhotoCrediterName]").text('Excelsior');
                    
                    $("div[name=topNewsShowHidePhotoCrediterName]").show();
                }
                else
                {
                    $("div[name=topNewsShowHidePhotoCrediterName]").hide();
                }
                
                if(reporterName != '' && reporterCity != '')
                    $("#topNewsReporterNameCity").text(reporterName+', '+reporterCity);
                else
                    $("#topNewsReporterNameCity").text('Shilpa Singh, Ahmedabad');
                if(slugVal != '')
                    $("#userDetailSlug").text(slugVal);
                else
                    $("#userDetailSlug").text('JUST IN');
                
                if(titleVal != '')
                {
                    $("#userDetailTitle").css({'color':selectTitleFontColor});
                    $("#userDetailTitle").text(titleVal);
                } 
                else
                    $("#userDetailTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
                
                if(descriptionHtml != '')
                {
                    $("#userDetailDescriptionPoints").html(descriptionHtml);
                    $("#userDetailDescriptionPoints").show();
                    $("#dummyDetailDescriptionPoints").hide();
                } 
                else
                {
                    $("#dummyDetailDescriptionPoints").show();
                    $("#userDetailDescriptionPoints").hide();
                }
                if(pageLoad == 1)
                {
                    var fullPath = '../../../images/just_in_timeline/'+imageNameFromDB;
                    $("#hdnIsImageOrVideoAdded").val(1);
                    if(isImage(imageNameFromDB))
                    {
                        $("#topNewsImageId").attr("src", fullPath).css('display','block').width('100%');
                        $("#dummyDetailImageOrVideo").hide();
                        $("#userDetailImageOrVideo").show();
                        $("#userDetailVideoId").hide();
                    }
                    else if(isVideo(imageNameFromDB))
                    {
                        $("#userDetailVideoId source").attr("src", fullPath);
                        $("#userDetailVideoId")[0].load();
                        $("#dummyDetailImageOrVideo").hide();
                        $("#userDetailImageOrVideo").hide();
                        $("#userDetailVideoId").show();
                    }
                }
                setJustDateInPreview(storyTypeList);
            break;
            case 'company_headlines':
                if(pageLoad == 0)
                {
                    $("#userDetailDescriptionPoints").html('');
                }
                var reporterName = $("#reporterName").val();
                var reporterCity = $("#reporterCity").val();
                var photoCrediterName = $("#photoCrediterName").val();
                
                if($("#isShowLogoOnTop").prop('checked') == true)
                {
                    $("div[name=showHideNewsFirstLogo]").show();
                }
                else
                {
                    $("div[name=showHideNewsFirstLogo]").hide();
                }
                if($("#isShowRedColorLine").prop('checked') == true)
                {
                    $("div[name=topNewsShowHideRedThickLine]").show();
                }
                else
                {
                    $("div[name=topNewsShowHideRedThickLine]").hide();
                }
                if($("#isShowPhotoCrediterName").prop('checked') == true)
                {
                    if(photoCrediterName != '')
                        $("span[name=topNewsPhotoCrediterName]").text(photoCrediterName);
                    else
                        $("span[name=topNewsPhotoCrediterName]").text('Excelsior');
                    
                    $("div[name=topNewsShowHidePhotoCrediterName]").show();
                }
                else
                {
                    $("div[name=topNewsShowHidePhotoCrediterName]").hide();
                }
                
                if(reporterName != '' && reporterCity != '')
                    $("#topNewsReporterNameCity").text(reporterName+', '+reporterCity);
                else
                    $("#topNewsReporterNameCity").text('Shilpa Singh, Ahmedabad'); 
                if(slugVal != '')
                    $("#userDetailSlug").text(slugVal);
                else
                    $("#userDetailSlug").text('JUST IN');
                
                if(titleVal != '')
                {
                    $("#userDetailTitle").css({'color':selectTitleFontColor});
                    $("#userDetailTitle").text(titleVal);
                } 
                else
                    $("#userDetailTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
                
                if(descriptionHtml != '')
                {
                    $("#userDetailDescriptionPoints").html(descriptionHtml);
                    $("#userDetailDescriptionPoints").show();
                    $("#dummyDetailDescriptionPoints").hide();
                } 
                else
                {
                    $("#dummyDetailDescriptionPoints").show();
                    $("#userDetailDescriptionPoints").hide();
                }
                if(pageLoad == 1)
                {
                    var fullPath = '../../../images/just_in_timeline/'+imageNameFromDB;
                    $("#hdnIsImageOrVideoAdded").val(1);
                    if(isImage(imageNameFromDB))
                    {
                        $("#topNewsImageId").attr("src", fullPath).css('display','block').width('100%');
                        $("#dummyDetailImageOrVideo").hide();
                        $("#userDetailImageOrVideo").show();
                        $("#userDetailVideoId").hide();
                    }
                    else if(isVideo(imageNameFromDB))
                    {
                        $("#userDetailVideoId source").attr("src", fullPath);
                        $("#userDetailVideoId")[0].load();
                        $("#dummyDetailImageOrVideo").hide();
                        $("#userDetailImageOrVideo").hide();
                        $("#userDetailVideoId").show();
                    }
                }
                setJustDateInPreview(storyTypeList);
            break;
            case 'news_update':                
                if(pageLoad == 0)
                {
                    $("#userDetailDescriptionPoints").html('');
                }
                
                if(titleVal != '')
                {
                    $("#userNewsUpdateTitle").css({'color':selectTitleFontColor});
                    $("#userNewsUpdateTitle").text(titleVal);
                }
                else
                    $("#userNewsUpdateTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
                
                if(descriptionHtml != '')
                {
                    $("#userNewsUpdateDescriptionPoints").html(descriptionHtml);
                    $("#userNewsUpdateDescriptionPoints").show();
                    $("#dummyNewsUpdateDescriptionPoints").hide();
                } 
                else
                {
                    $("#dummyNewsUpdateDescriptionPoints").show();
                    $("#userNewsUpdateDescriptionPoints").hide();
                }
                if($("#isStockFormOpen").prop('checked') == true)
                {
                    var countForStockName = $('input[name*=stockName]').length;
                    var stockupHtml = '';
                    for(var i =0; i < parseInt(countForStockName); i++)
                    {
                        var pointerCount = i + 1;
                        
                        var stockName = $('input[name="group-a['+i+'][stockName]"]').val();
                        var stockPrice =  $('input[name="group-a['+i+'][stockPrice]"]').val();
                        var stockVariation = $('input[name="group-a['+i+'][stockVariation]"]').val();
                        var stockColor =  $('input[name="group-a['+i+'][stockColor]"]:checked').val();

                        if(stockName != '')
                        {
                            isDataPresent = 1;
                            var stockNameDisplay = stockName;
                        }
                        else
                            var stockNameDisplay = 'Sensex';

                        if(stockPrice != '')
                        {
                            isDataPresent = 1;
                            var stockPriceDisplay = stockPrice;
                        }
                        else
                            var stockPriceDisplay = '48732.55';

                        if(stockVariation != '')
                        {
                            isDataPresent = 1;
                            var stockVariationDisplay = stockVariation;
                        }
                        else
                            var stockVariationDisplay = '0.09';
                        
                        if($('input[name="group-a[' + i + '][stockColor]"]:checked').length > 0)
                        {
                            isDataPresent = 1;
                            if(stockColor == 'red')
                            {
                                var upDownClass= "down";
                                var colorClass= "danger";
                            }
                            else
                            {
                                var upDownClass= "up";
                                var colorClass= "success";
                            }
                        }
                        
                        stockupHtml += '<li>';
                        stockupHtml += '<div class="stock-market-main">';
                        stockupHtml += '<div class="stock-market-left">'+stockNameDisplay+'</div>';
                        stockupHtml += '<div class="stock-market-right">';
                        stockupHtml += '<span class="badge badge-pill badge-soft-'+colorClass+' font-size-11"><i class="bx bxs-'+upDownClass+'-arrow"></i>' +stockPriceDisplay+'</span>';
                        stockupHtml += '<span class="box-color-bg">('+stockVariationDisplay+'%)</span>';
                        stockupHtml += '</div>';
                        stockupHtml += '</div>';
                        stockupHtml += '</li>';
                    }
                    if(isDataPresent == 1)
                    {
                        $("#userNewsUpdateStock").html(stockupHtml);
                        $("#userNewsUpdateStock").show();
                        $("#dummyNewsUpdateStock").hide();
                    }
                    else
                    {
                        $("#userNewsUpdateStock").html('');
                        $("#dummyNewsUpdateStock").show();
                        $("#userNewsUpdateStock").hide();
                    }
                }
                setJustDateInPreview(storyTypeList);
            break;
           
            case 'text_with_header':
                if(slugVal != '')
                    $("#userTextWithHeaderSlug").text(slugVal);
                else
                    $("#userTextWithHeaderSlug").text('JUST IN');
                
                if(descriptionVal != '')
                {
                    $("#userTextWithHeaderDescription").html('<strong>Newsfirst</strong>: '+descriptionVal);
                } 
                else
                {
                    $("#userTextWithHeaderDescription").html("<strong>Newsfirst</strong>:  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>");
                }
                setJustDateInPreview(storyTypeList);
                
            break;
            case 'justin':
                
                $("#userJustinSlideshow").children().remove();
                if(descriptionHtml != '')
                {
                    $("#userJustinSlideshow").html(descriptionHtml);
                } 
                else
                {
                    
                    $("#userJustinSlideshow").html(justinSlideShowHtml);
                }
                
                if(slugVal != '')
                    $("#userJustinSlugId").text(slugVal);
                else
                    $("#userJustinSlugId").text('Top News');
                
            break;
            case 'video_header_videoline':
                if(slugVal != '')
                    $("#userVideoSlugId").text(slugVal);
                else
                    $("#userVideoSlugId").text('Top News');
                
                if(titleVal != '')
                {
                    $("#userVideoTitleId").css({'color':selectTitleFontColor});
                    $("#userVideoTitleId").text(titleVal);
                }
                else
                    $("#userVideoTitleId").text('lorem ipsum is simply dummy text of the printing typesetting industry.');
                
                var photoCrediterName = $("#photoCrediterName").val();
                if($("#isShowPhotoCrediterName").prop('checked') == true)
                {
                    if(photoCrediterName != '')
                        $("#videoPhotoCrediterName").text(photoCrediterName);
                    else
                        $("#videoPhotoCrediterName").text('Excelsior');
                    
                    $("#videoPhotoCrediter").show();
                }
                else
                {
                    $("#videoPhotoCrediter").hide();
                }
                if($("#isShowLogoOnTop").prop('checked') == true)
                {
                    $("div[name=showHideNewsFirstLogo]").show();
                }
                else
                {
                    $("div[name=showHideNewsFirstLogo]").hide();
                }

                if(pageLoad == 1)
                {
                    $("#hdnIsImageOrVideoAdded").val(1);
                    var fullPath = '../../../images/just_in_timeline/'+imageNameFromDB;
                    
                    $("#userVideoFileVideoId source").attr("src", fullPath);
                    $("#userVideoFileVideoId")[0].load();
                    $("#dummyVideoFileVideoId").hide();
                    $("#userVideoFileVideoId").show();
                }
            break;
            case 'photo_header_photoline':
                if(slugVal != '')
                    $("#userPhotoHeaderPhotolineSlug").text(slugVal);
                else
                    $("#userPhotoHeaderPhotolineSlug").text('Photos');
                
                if(titleVal != '')
                {
                    $("#userPhotoHeaderPhotolineTitle").css({'color':selectTitleFontColor});
                    $("#userPhotoHeaderPhotolineTitle").text(titleVal);
                }
                else
                    $("#userPhotoHeaderPhotolineTitle").text('It has Survived not only five centuries, but also the leap into electronic typesetting.');
                
                if($("#isShowLogoOnTop").prop('checked') == true)
                {
                    $("div[name=showHideNewsFirstLogo]").show();
                }
                else
                {
                    $("div[name=showHideNewsFirstLogo]").hide();
                }
                if($("#isShowRedColorLine").prop('checked') == true)
                {
                    $("div[name=photoHeaderPhotolineShowHideRedThickLine]").show();
                }
                else
                {
                    $("div[name=photoHeaderPhotolineShowHideRedThickLine]").hide();
                }
                var photoCrediterName = $("#photoCrediterName").val();
                if($("#isShowPhotoCrediterName").prop('checked') == true)
                {
                    if(photoCrediterName != '')
                        $("span[name=photoHeaderPhotolinePhotoCrediterName]").text(photoCrediterName);
                    else
                        $("span[name=photoHeaderPhotolinePhotoCrediterName]").text('Excelsior');
                    
                    $("div[name=photoHeaderPhotolineShowHidePhotoCrediterName]").show();
                }
                else
                {
                    $("div[name=photoHeaderPhotolineShowHidePhotoCrediterName]").hide();
                }
                
                if(pageLoad == 1)
                {
                    $("#hdnIsImageOrVideoAdded").val(1);
                    var fullPath = '../../../images/just_in_timeline/'+imageNameFromDB;
                    $("#photoHeaderPhotolineImageId").attr("src", fullPath).css('display','block').width('100%');
                    $("#dummyPhotoHeaderPhotolineImage").hide();
                    $("#userPhotoHeaderPhotolineImage").show();
                }
                break;
            case 'photo_photoline':
                if(titleVal != '')
                {
                    $("#userPhotoPhotolineTitle").css({'color':selectTitleFontColor});
                    $("#userPhotoPhotolineTitle").text(titleVal);
                }
                else
                    $("#userPhotoPhotolineTitle").text('It has Survived not only five centuries, but also the leap into electronic typesetting.');
                
                if($("#isShowLogoOnTop").prop('checked') == true)
                {
                    $("div[name=showHideNewsFirstLogo]").show();
                }
                else
                {
                    $("div[name=showHideNewsFirstLogo]").hide();
                }
                if($("#isShowRedColorLine").prop('checked') == true)
                {
                    $("div[name=photoPhotolineShowHideRedThickLine]").show();
                }
                else
                {
                    $("div[name=photoPhotolineShowHideRedThickLine]").hide();
                }
                var photoCrediterName = $("#photoCrediterName").val();
                if($("#isShowPhotoCrediterName").prop('checked') == true)
                {
                    if(photoCrediterName != '')
                        $("span[name=photoPhotolinePhotoCrediterName]").text(photoCrediterName);
                    else
                        $("span[name=photoPhotolinePhotoCrediterName]").text('Excelsior');
                    
                    $("div[name=photoPhotolineShowHidePhotoCrediterName]").show();
                }
                else
                {
                    $("div[name=photoPhotolineShowHidePhotoCrediterName]").hide();
                }
                
                if(pageLoad == 1)
                {
                    $("#hdnIsImageOrVideoAdded").val(1);
                    var fullPath = '../../../images/just_in_timeline/'+imageNameFromDB;
                    $("#photoPhotolineImageId").attr("src", fullPath).css('display','block').width('100%');
                    $("#dummyPhotoPhotolineImage").hide();
                    $("#userPhotoPhotolineImage").show();
                }
            break;
            case 'photo_album':
                 if(slugVal != '')
                    $("#photoAlbumSlugId").text(slugVal);
                else
                    $("#photoAlbumSlugId").text('Politics');
            break;
            case 'story_album':
                if(slugVal != '')
                    $("#StoryAlbumSlugId").text(slugVal);
                else
                    $("#StoryAlbumSlugId").text('World');
            break;
            case 'emoji_and_text':
                if(slugVal != '')
                    $("#userEmojiAndTextSlug").text(slugVal);
                else
                    $("#userEmojiAndTextSlug").text('Emoji and Text screen');
                
                if(descriptionVal != '')
                {
                    $("#userEmojiAndTextDescription").html(descriptionVal);
                } 
                else
                {
                    $("#userEmojiAndTextDescription").html("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s");
                }
                if(txtEmojiVal != '')
                    $("#userEmojiAndTextEmojiHtml").html(txtEmoji);
                else
                    $("#userEmojiAndTextEmojiHtml").html('&#128512;');
                
            break;
            case 'thread':
                if($("#isShowLogoOnTop").prop('checked') == true)
                {
                    $("div[name=showHideNewsFirstLogo]").show();
                }
                else
                {
                    $("div[name=showHideNewsFirstLogo]").hide();
                }
                if($("#isShowRedColorLine").prop('checked') == true)
                {
                    $("div[name=threadShowHideRedThickLine]").show();
                }
                else
                {
                    $("div[name=threadShowHideRedThickLine]").hide();
                }
                var photoCrediterName = $("#photoCrediterName").val();
                if($("#isShowPhotoCrediterName").prop('checked') == true)
                {
                    if(photoCrediterName != '')
                        $("span[name=threadPhotoCrediterName]").text(photoCrediterName);
                    else
                        $("span[name=threadPhotoCrediterName]").text('Excelsior');
                    
                    $("div[name=threadShowHidePhotoCrediterName]").show();
                }
                else
                {
                    $("div[name=threadShowHidePhotoCrediterName]").hide();
                }
                if(slugVal != '')
                    $("#userThreadSlug").text(slugVal);
                else
                    $("#userThreadSlug").text('74 independance day');

                if(titleVal != '')
                {
                    $("#userThreadTitle").css({'color':selectTitleFontColor});
                    $("#userThreadTitle").text(titleVal);
                }
                else
                    $("#userThreadTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
                setJustDateInPreview(storyTypeList);
                
                if(pageLoad == 1)
                {
                    $("#hdnIsImageOrVideoAdded").val(1);
                    var fullPath = '../../../images/just_in_timeline/'+imageNameFromDB;
                    if(isImage(imageNameFromDB))
                    {
                        $("#threadImageId").attr("src", fullPath).css('display','block').width('100%');
                        $("#dummyThreadImageOrVideo").hide();
                        $("#userThreadImageOrVideo").show();
                        $("#userThreadVideoId").hide();
                    }
                    else if(isVideo(imageNameFromDB))
                    {
                        $("#userThreadVideoId source").attr("src", fullPath);
                        $("#userThreadVideoId")[0].load();
                        $("#dummyThreadImageOrVideo").hide();
                        $("#userThreadImageOrVideo").hide();
                        $("#userThreadVideoId").show();
                    }
                }
                
            break;
            case 'audio':
                if(slugVal != '')
                    $("#slugAudioFeed").text(slugVal);
                else
                    $("#slugAudioFeed").text('interview with Mr.Vijay Rupani');
                
                if(descriptionVal != '')
                {
                    $("#timeLineHeadingAudioFeed").html(descriptionVal);
                } 
                else
                {
                    $("#timeLineHeadingAudioFeed").html("Coronavirus are a group of related RNA viruses the causes disease in mamamals and birds humans these viruses cause respiratory tract infections a that can range from mild to lethal.Coronaviruses are a Group of related RNA Viruses");
                }
                
                if(pageLoad == 1)
                {
                    $("#hdnIsImageOrVideoAdded").val(1);
                    var fullPath = '../../../images/just_in_timeline/'+imageNameFromDB;
                    var audioFullPath = '../../../images/just_in_timeline/'+audioFileNameFromDB;
                    if(isImage(imageNameFromDB))
                    {
                        $("#userAudioImageId").attr("src", fullPath).css('display','block');
                        $("#dummyAudioImageId").hide();
                        $("#userAudioImageId").show();
                    }
                    if(isAudio(audioFileNameFromDB))
                    {
                        $("#hdnAudioFile").val(1);
                        $("#dummyAudioFileAudioId").hide();
                        $("#userAudioFileAudioId").show();
                        $("#audioSourceId").attr("src", audioFullPath);
                        $("#userAudioFileAudioId").trigger('load');
                        
                        $('#audioFileNameLabel').text('Image name : ');
                        
                    }
                }
            break;
            case 'social_media':
                if(slugVal != '')
                    $("#userSocialMediaSlug").text(slugVal);
                else
                    $("#userSocialMediaSlug").text('74 independance day');
                
                if(titleVal != '')
                {
                    $("#useSocialMediaTitle").css({'color':selectTitleFontColor});
                    $("#useSocialMediaTitle").text(titleVal);
                }
                else
                    $("#useSocialMediaTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
            break;
            case 'text_with_color_dots':
                if(slugVal != '')
                    $("#userTextWithColorDotsSlug").text(slugVal);
                else
                    $("#userTextWithColorDotsSlug").text('Just IN');
            
                if(titleVal != '')
                {
                    $("#userTextWithColorDotsTitle").css({'color':selectTitleFontColor});
                    $("#userTextWithColorDotsTitle").text(titleVal);
                }
                else
                    $("#userTextWithColorDotsTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
                
                if(descriptionVal != '')
                {
                    $("#userTextWithColorDotsDescription").html(descriptionVal);
                } 
                else
                {
                    $("#userTextWithColorDotsDescription").html("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s");
                }
                if(pageLoad == 1)
                {
                    $("#hdnIsImageOrVideoAdded").val(1);
                    var fullPath = '../../../images/just_in_timeline/'+imageNameFromDB;
                    $("#userTextWithColorDotsImage img").attr("src", fullPath).css('display','block').width('100%');
                    $("#dummyTextWithColorDotsImage").hide();
                    $("#userTextWithColorDotsImage").show();
                }
            break;
            case 'big_headlines':
                $("#userBigHeadlinesPoints").html('');

                if(slugVal != '')
                    $("#userBigHeadlinesSlug").text(slugVal);
                else
                    $("#userBigHeadlinesSlug").text('JUST IN');
                
                if(titleVal != '')
                {
                    $("#userBigHeadlinesTitle").css({'color':selectTitleFontColor});
                    $("#userBigHeadlinesTitle").text(titleVal);
                }
                else
                    $("#userBigHeadlinesTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');

                if(descriptionVal != '')
                {
                    $("#userBigHeadlinesPoints").html(descriptionVal);
                } 
                else
                {
                    $("#userBigHeadlinesPoints").html("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.");
                }
                var selectThemeBackgroundColor = $("#selectThemeBackgroundColor").val();
                if(selectThemeBackgroundColor != '')
                {
                    if(selectThemeBackgroundColor == '#efefef' || selectThemeBackgroundColor == '#f8f7f7' 
                        || selectThemeBackgroundColor == '#e2dbd2')
                    {
                        $("#backgroundChangeDivId").css("background-color", selectThemeBackgroundColor);
                        $("#userBigHeadlinesSlug").css("color", '#000000');
                        $("#bigHeadlinesDateTime").css("color", '#000000');
                        $("#userBigHeadlinesPoints").css("color", '#000000');
                    }
                    else
                    {
                        $("#backgroundChangeDivId").css("background-color", selectThemeBackgroundColor);
                        $("#userBigHeadlinesSlug").css("color", '#f5eeee');
                        $("#bigHeadlinesDateTime").css("color", '#f5eeee');
                        $("#userBigHeadlinesPoints").css("color", '#ffffff');
                    } 
                }
                setJustDateInPreview(storyTypeList);
            break;
            case 'headlines':
                $("#userHeadlinesPoints").html('');

                if(titleVal != '')
                {
                    $("#userHeadlinesTitle").css({'color':selectTitleFontColor});
                    $("#userHeadlinesTitle").text(titleVal);
                }
                else
                    $("#userHeadlinesTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
                
                var bigHeadlinesThemeColor = $("#bigHeadlinesThemeColor").val();
                //alert('bigHeadlinesThemeColor ::: '+bigHeadlinesThemeColor);
                if(bigHeadlinesThemeColor != '')
                {
                    if(bigHeadlinesThemeColor == 'navyblue')
                    {
                        $("#headlinesBackgroundChangeDivId").css("background-color", '#000080');
                        $("#headlinesDateTime").css("color", '#f5eeee');
                        $("#userHeadlinesPoints").css("color", '#ffffff');
                    }  
                    else if(bigHeadlinesThemeColor == 'black')
                    {
                        $("#headlinesBackgroundChangeDivId").css("background-color", '#000000');
                        $("#headlinesDateTime").css("color", '#f5eeee');
                        $("#userHeadlinesPoints").css("color", '#ffffff');
                    } 
                    else if(bigHeadlinesThemeColor == 'white')
                    {
                        $("#headlinesBackgroundChangeDivId").css("background-color", '#ffffff');
                        $("#headlinesDateTime").css("color", '#000000');
                        $("#userHeadlinesPoints").css("color", '#000000');
                    } 
                }
                
                if(descriptionVal != '')
                {
                    $("#userHeadlinesPoints").html(descriptionVal);
                } 
                else
                {
                    $("#userHeadlinesPoints").html("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.");
                }
                 setJustDateInPreview(storyTypeList);
            break;
            case 'remind_me':
                $("#userRemindMeDescription").html('');

                if(titleVal != '')
                {
                    $("#userRemindMeTitle").css({'color':selectTitleFontColor});
                    $("#userRemindMeTitle").text(titleVal);
                }
                else
                    $("#userRemindMeTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
                
                if(descriptionVal != '')
                {
                    $("#userRemindMeDescription").html(descriptionVal);
                } 
                else
                {
                    $("#userRemindMeDescription").html("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, ");
                }
            break;
            case 'count_down':
                $("#userCountDownDescription").html('');

                if(titleVal != '')
                {
                    $("#userCountDownTitle").css({'color':selectTitleFontColor});
                    $("#userCountDownTitle").text(titleVal);
                }
                else
                    $("#userCountDownTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
                
                if(descriptionVal != '')
                {
                    $("#userCountDownDescription").html(descriptionVal);
                } 
                else
                {
                    $("#userCountDownDescription").html("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it");
                }
                setJustDateInPreview(storyTypeList);
            break;
            case 'full_screen':
                
                if($("#isShowLogoOnTop").prop('checked') == true)
                {
                    $("div[name=showHideNewsFirstLogo]").show();
                }
                else
                {
                    $("div[name=showHideNewsFirstLogo]").hide();
                }
                var photoCrediterName = $("#photoCrediterName").val();
                if($("#isShowPhotoCrediterName").prop('checked') == true)
                {
                    if(photoCrediterName != '')
                        $("span[name=fullScreenPhotoCrediterName]").text(photoCrediterName);
                    else
                        $("span[name=fullScreenPhotoCrediterName]").text('Excelsior');
                    
                    $("div[name=fullScreenShowHidePhotoCrediterName]").show();
                }
                else
                {
                    $("div[name=fullScreenShowHidePhotoCrediterName]").hide();
                }
                if(slugVal != '')
                    $("#slugFullScreenFeed").text(slugVal);
                else
                    $("#slugFullScreenFeed").text('Politics');
                
                if(titleVal != '')
                {
                    $("#timeLineHeadingFullScreenFeed").css({'color':selectTitleFontColor});
                    $("#timeLineHeadingFullScreenFeed").text(titleVal);
                }
                else
                    $("#timeLineHeadingFullScreenFeed").text('lorem ipsum is simply dummy text of the printing typesetting industry.');
                
                if(pageLoad == 1)
                {
                    $("#hdnIsImageOrVideoAdded").val(1);
                    var fullPath = '../../../images/just_in_timeline/'+imageNameFromDB;
                    $("#user_full_screen_img_id").attr("src", fullPath).css('display','block').width('100%');
                    $("#dummy_full_screen_div_id").hide();
                    $("#user_full_screen_div_id").show();
                }
            break;
            case 'spliter':
                
                if($("#isShowLogoOnTop").prop('checked') == true)
                {
                    $("div[name=showHideNewsFirstLogo]").show();
                }
                else
                {
                    $("div[name=showHideNewsFirstLogo]").hide();
                }
                var photoCrediterName = $("#photoCrediterName").val();
                if($("#isShowPhotoCrediterName").prop('checked') == true)
                {
                    if(photoCrediterName != '')
                        $("span[name=spliterPhotoCrediterName]").text(photoCrediterName);
                    else
                        $("span[name=spliterPhotoCrediterName]").text('Excelsior');
                    
                    $("div[name=spliterShowHidePhotoCrediterName]").show();
                }
                else
                {
                    $("div[name=spliterShowHidePhotoCrediterName]").hide();
                }
                
                if(titleVal != '')
                {
                    $("#timeLineHeadingSpliterFeed").css({'color':selectTitleFontColor});
                    $("#timeLineHeadingSpliterFeed").text(titleVal);
                }
                else
                    $("#timeLineHeadingSpliterFeed").text('lorem ipsum is simply dummy text of the printing typesetting industry.');
                
                if(pageLoad == 1)
                {
                    $("#hdnIsImageOrVideoAdded").val(1);
                    var fullPath = '../../../images/just_in_timeline/'+imageNameFromDB;
                    $("#user_spliter_img_id").attr("src", fullPath);
                    $("#dummy_spliter_img_div_id").hide();
                    $("#user_spliter_img_div_id").show();
                }
            break;
            case 'weekend':
                var weekendHtml = '';
                var countForWeekendSlug = $('input[name*=weekendSlug]').length;
                var isWeekendDataPresent = 0;
                for(var i =0; i < parseInt(countForWeekendSlug); i++)
                {
                    var weekendSlug = $('input[name="group-b['+i+'][weekendSlug]"]').val();
                    var weekendHeadlines = $('input[name="group-b['+i+'][weekendHeadlines]"]').val();
                    var weekend_cropped_cover_photo = $('input[name="group-b['+i+'][weekend_cropped_cover_photo]"]').val();
                    
                    if(weekendSlug != '')
                    {
                        isWeekendDataPresent = 1;
                        var slugDisplay = weekendSlug;
                    }
                    else
                    {
                        var slugDisplay = 'Politics';
                    }
                    if(weekendHeadlines != '')
                    {
                        isWeekendDataPresent = 1;
                        var headlinesDisplay = weekendHeadlines;
                    }
                    else
                    {
                        var headlinesDisplay = 'lorem ipsum is simply dummy text of the printing typesetting industry.';
                    }
                    if(weekend_cropped_cover_photo != '')
                    {
                        isWeekendDataPresent = 1;
                        var weekendImage = weekend_cropped_cover_photo;
                        
                        $('img[name="group-b['+i+'][weekendFilePreviewImgId]"]').attr("src", weekendImage);
                        $('div[name="group-b['+i+'][weekendFilePreviewDivId]"]').show();
                    }
                    else
                    {
                        $('img[name="group-b['+i+'][weekendFilePreviewImgId]"]').attr("src", '');
                        $('div[name="group-b['+i+'][weekendFilePreviewDivId]"]').hide();
                        var weekendImage = "../../../assets/images/amitshah.jpg";
                    }
                    if(isWeekendDataPresent == 1)
                    {
                        weekendHtml += '<div class="carousel-item active">'+
                            '<div class="topbar">'+
                            '</div>'+
                            '<div class="big_news_img" >'+
                               '<img src="'+weekendImage+'">'+
                            '</div>'+
                            '<div class="content_card content_over">'+
                               '<h5>'+slugDisplay+'</h5>'+
                               '<h1>'+headlinesDisplay+'</h1>'+
                               '<div class="publish_time">'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                    }
                }
                $("#userWeekendSlideshow").children().remove();
                if(weekendHtml != '')
                {
                    $("#userWeekendSlideshow").html(weekendHtml);
                    $("#userWeekendSlideshow .carousel-item").removeClass('active');
                    $('#userWeekendSlideshow .carousel-item').first().addClass('active');
                } 
                else
                {
                    $("#userWeekendSlideshow").html(weekendSlideShowHtml);
                }
            break;
            case 'short':
                var hdnUserCapturedDataType = $("#hdnUserCapturedDataType").val();
                if(titleVal != '')
                {
                    $("#shortHeadlineH1Id").css({'color':selectTitleFontColor});
                    $("#shortHeadlineH1Id").text(titleVal);
                }
                else
                    $("#shortHeadlineH1Id").text('West Bengal Chief');

                if(descriptionVal != '')
                {
                    $("#shortDescriptionH5Id").html(descriptionVal);
                } 
                else
                {
                    $("#shortDescriptionH5Id").html("Lorem Ipsum is simply dummy text of the printing and typesetting industry.");
                }
                if(hdnUserCapturedDataType == 'email')
                {
                    $("#emailShowInShort").show();
                    $("#phoneNumberShowInShort").hide();
                }
                else if(hdnUserCapturedDataType == 'phone')
                {
                    $("#emailShowInShort").hide();
                    $("#phoneNumberShowInShort").show();
                }
            break;
            case 'big_box':
                if(pageLoad == 0)
                {
                    $("#userBigBoxDescription").html('');
                }
                if($("#isShowLogoOnTop").prop('checked') == true)
                {
                    $("div[name=showHideNewsFirstLogo]").show();
                }
                else
                {
                    $("div[name=showHideNewsFirstLogo]").hide();
                }
                if($("#isShowRedColorLine").prop('checked') == true)
                {
                    $("div[name=bigBoxShowHideRedThickLine]").show();
                }
                else
                {
                    $("div[name=bigBoxShowHideRedThickLine]").hide();
                }
                var photoCrediterName = $("#photoCrediterName").val();
                if($("#isShowPhotoCrediterName").prop('checked') == true)
                {
                    if(photoCrediterName != '')
                        $("span[name=bigBoxPhotoCrediterName]").text(photoCrediterName);
                    else
                        $("span[name=bigBoxPhotoCrediterName]").text('Excelsior');
                    
                    $("div[name=bigBoxShowHidePhotoCrediterName]").show();
                }
                else
                {
                    $("div[name=bigBoxShowHidePhotoCrediterName]").hide();
                }
                var reporterName = $("#reporterName").val();
                var reporterCity = $("#reporterCity").val();

                if(reporterName != '' && reporterCity != '')
                    $("#bigBoxReporterNameCity").text(reporterName+', '+reporterCity);
                else
                    $("#bigBoxReporterNameCity").text('Yogesh Rewani, Ahmedabad');

                if(slugVal != '')
                    $("#bigBoxSlugId").text(slugVal);
                else
                    $("#bigBoxSlugId").text('JUST IN');
                
                if(titleVal != '')
                {
                    $("#bigBoxHeadlineId").css({'color':selectTitleFontColor});
                    $("#bigBoxHeadlineId").text(titleVal);
                }
                else
                    $("#bigBoxHeadlineId").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
                
                if(descriptionHtml != '')
                {
                    $("#userBigBoxDescription").html(descriptionHtml);
                    $("#userBigBoxDescription").show();
                    $("#dummyBigBoxDescription").hide();
                }
                else
                {
                    $("#dummyBigBoxDescription").show();
                    $("#userBigBoxDescription").hide();
                }
                if(pageLoad == 1)
                {
                    var fullPath = '../../../images/just_in_timeline/'+imageNameFromDB;
                    $("#hdnIsImageOrVideoAdded").val(1);
                    if(isImage(imageNameFromDB))
                    {
                        $("#bigBoxImageId").attr("src", fullPath).css('display','block').width('100%');
                        $("#dummyBigBoxImage").hide();
                        $("#userBigBoxImage").show();
                    }
                }
                setJustDateInPreview(storyTypeList);
            break;
            case 'contact_card':
                if($("#isShowLogoOnTop").prop('checked') == true)
                {
                    $("div[name=showHideNewsFirstLogo]").show();
                }
                else
                {
                    $("div[name=showHideNewsFirstLogo]").hide();
                }
                if($("#isShowRedColorLine").prop('checked') == true)
                {
                    $("div[name=contactCardShowHideRedThickLine]").show();
                }
                else
                {
                    $("div[name=contactCardShowHideRedThickLine]").hide();
                }
                var photoCrediterName = $("#photoCrediterName").val();
                if($("#isShowPhotoCrediterName").prop('checked') == true)
                {
                    if(photoCrediterName != '')
                        $("span[name=contactCardPhotoCrediterName]").text(photoCrediterName);
                    else
                        $("span[name=contactCardPhotoCrediterName]").text('Excelsior');
                    
                    $("div[name=contactCardShowHidePhotoCrediterName]").show();
                }
                else
                {
                    $("div[name=contactCardShowHidePhotoCrediterName]").hide();
                }
                var fullName = $("#fullName").val();
                var address = $("#address").val();
                var contactNo = $("#contactNo").val();
                var email = $("#email").val();
                var website = $("#website").val();
                var location = $("#location").val();
                var designation = $("#designation").val();

                if(fullName != '')
                    $("#contactCardNameH1Id").text(fullName);
                else
                    $("#contactCardNameH1Id").text('Gautam Adani');

                if(designation != '')
                    $("#contactCardNameDesignationId").text(designation);
                else
                    $("#contactCardNameDesignationId").text('CHAIRMAN OF ADANI GROUP');

                if(address != '')
                    $("#contactCardNameAddressId").text(address);
                else
                    $("#contactCardNameAddressId").text('Adani House, Near, Mithakhali Cir, Muslim Society, Navragpura, Ahemedabad, Gujarat');

                if(contactNo != '')
                    $("#contactCardMobileNumberId").text(contactNo);
                else
                    $("#contactCardMobileNumberId").text('Call');

                
                if(email != '')
                    $("#contactCardEmailId").text(email);
                else
                    $("#contactCardEmailId").text('Email');
                
                if(website != '')
                    $("#contactCardWebsiteId").text(website);
                else
                    $("#contactCardWebsiteId").text('Website');

                if(location != '')
                    $("#contactCardDirectionId").text(location);
                else
                    $("#contactCardDirectionId").text('Direction');
                
                if(pageLoad == 1)
                {
                    var fullPath = '../../../images/just_in_timeline/'+imageNameFromDB;
                    $("#hdnIsImageOrVideoAdded").val(1);
                    if(isImage(imageNameFromDB))
                    {
                        $("#contactCardImageId").attr("src", fullPath).width('100%');
                        $("#contactCardDummyUserImageOrVideo").show();
                        $("#contactCardDummyDetailImageOrVideo").hide();
                    }
                }
                setJustDateInPreview(storyTypeList);
            break;
            case 'stoke_up':
                var isDataPresent = 0;
                
                if(slugVal != '')
                    $("#stockupSlugId").text(slugVal);
                else
                    $("#stockupSlugId").text('Stock Market');
                
                if(titleVal != '')
                {
                    $("#stockupHeadlinesId").css({'color':selectTitleFontColor});
                    $("#stockupHeadlinesId").text(titleVal);
                }
                else
                    $("#stockupHeadlinesId").text('Stock Market LIVE Updates: Auto index is up a percent, while buying also seen');

                var countForStokeUpName = $('input[name*=stokeUpName]').length;
                var stockupHtml = '';
                for(var i =0; i < parseInt(countForStokeUpName); i++)
                {
                    var pointerCount = i + 1;
                    // alert(pointerCount);
                    var stokeUpName = $('input[name="group-a['+i+'][stokeUpName]"]').val();
                    var stokeUpPrice =  $('input[name="group-a['+i+'][stokeUpPrice]"]').val();
                    var stokeUpdate = $('input[name="group-a['+i+'][stokeUpdate]"]').val();
                    var stokeVariationType = $('input[name="group-a['+i+'][stokeVariationType][]"]').is(':checked'); 
                    var stokeUpVariation =  $('input[name="group-a['+i+'][stokeUpVariation]"]').val();

                    //alert('stokeVariationType :::: '+stokeVariationType);
                    if(stokeUpName != '')
                    {
                        isDataPresent = 1;
                        var stockNameDisplay = stokeUpName;
                    }
                    else
                        var stockNameDisplay = 'Sensex';

                    if(stokeUpPrice != '')
                    {
                        isDataPresent = 1;
                        var stockPriceDisplay = stokeUpPrice;
                    }
                    else
                        var stockPriceDisplay = '48732.55';

                    if(stokeUpdate != '')
                    {
                        isDataPresent = 1;
                        var stockUpdateDisplay = stokeUpdate;
                    }
                    else
                        var stockUpdateDisplay = '141.75';

                    if(stokeUpVariation != '')
                    {
                        isDataPresent = 1;
                        var stockVariationDisplay = stokeUpVariation;
                    }
                    else
                        var stockVariationDisplay = '0.09';

                    if(stokeVariationType == 1)
                    {
                        var upDownClass= "down";
                        var colorClass= "danger";
                    }
                    else
                    {
                        var upDownClass= "up";
                        var colorClass= "success";
                    }
                    stockupHtml += '<li>';
                    stockupHtml += '<div class="stock-market-main">';
                    stockupHtml += '<div class="stock-market-left">'+stockNameDisplay+'</div>';
                    stockupHtml += '<div class="stock-market-right">';
                    stockupHtml += '<span>'+stockPriceDisplay+'</span>';
                    stockupHtml += '<span class="badge badge-pill badge-soft-'+colorClass+' font-size-11"><i class="bx bxs-'+upDownClass+'-arrow"></i> ' +stokeUpdate+'('+stockVariationDisplay+'%)</span>';
                    stockupHtml += '</div>';
                    stockupHtml += '</div>';
                    stockupHtml += '</li>';
                    stockupHtml += '<div class="stock-market-border">&nbsp;</div>';
                    setJustDateInPreview(storyTypeList);
                }
                if(isDataPresent == 1)
                {
                    $("#userStockUpUlId").html(stockupHtml);
                    $("#userStockUpUlId").show();
                    $("#dummyStockUpUlId").hide();
                }
                else
                {
                    $("#userStockUpUlId").html('');
                    $("#dummyStockUpUlId").show();
                    $("#userStockUpUlId").hide();
                }
                if(pageLoad == 1)
                {
                    
                }
                setJustDateInPreview(storyTypeList);
            break;
            case 'stokes_scroll':
                var isDataPresent = 0;
                
                if(slugVal != '')
                    $("#stokesScrollSlugId").text(slugVal);
                else
                    $("#stokesScrollSlugId").text('Stock Market');
                
                if(titleVal != '')
                {
                    $("#stokesScrollHeadlineId").css({'color':selectTitleFontColor});
                    $("#stokesScrollHeadlineId").text(titleVal);
                }
                else
                    $("#stokesScrollHeadlineId").text('Stock Market LIVE Updates: Auto index is up a percent, while buying also seen');

                var countForStokeUpName = $('input[name*=stokeUpName]').length;
                var stockupHtml = '';
                for(var i =0; i < parseInt(countForStokeUpName); i++)
                {
                    var pointerCount = i + 1;
                    // alert(pointerCount);
                    var stokeUpName = $('input[name="group-a['+i+'][stokeUpName]"]').val();
                    var stokeUpPrice =  $('input[name="group-a['+i+'][stokeUpPrice]"]').val();
                    var stokeUpdate = $('input[name="group-a['+i+'][stokeUpdate]"]').val();
                    var stokeVariationType = $('input[name="group-a['+i+'][stokeVariationType][]"]').is(':checked'); 
                    var stokeUpVariation =  $('input[name="group-a['+i+'][stokeUpVariation]"]').val();

                    //alert('stokeVariationType :::: '+stokeVariationType);
                    if(stokeUpName != '')
                    {
                        isDataPresent = 1;
                        var stockNameDisplay = stokeUpName;
                    }
                    else
                        var stockNameDisplay = 'Sensex';

                    if(stokeUpPrice != '')
                    {
                        isDataPresent = 1;
                        var stockPriceDisplay = stokeUpPrice;
                    }
                    else
                        var stockPriceDisplay = '48732.55';

                    if(stokeUpdate != '')
                    {
                        isDataPresent = 1;
                        var stockUpdateDisplay = stokeUpdate;
                    }
                    else
                        var stockUpdateDisplay = '141.75';

                    if(stokeUpVariation != '')
                    {
                        isDataPresent = 1;
                        var stockVariationDisplay = stokeUpVariation;
                    }
                    else
                        var stockVariationDisplay = '0.09';

                    if(stokeVariationType == 1)
                    {
                        var upDownClass= "down";
                        var colorClass= "danger";
                    }
                    else
                    {
                        var upDownClass= "up";
                        var colorClass= "success";
                    }
                    
                    stockupHtml += '<li>';
                    stockupHtml += '<div class="stock-market-main">';
                    stockupHtml += '<div class="stock-market-left">'+stockNameDisplay+'</div>';
                    stockupHtml += '<div class="stock-market-right">';
                    stockupHtml += '<span>'+stockPriceDisplay+'</span>';
                    stockupHtml += '<span class="badge badge-pill badge-soft-'+colorClass+' font-size-11"><i class="bx bxs-'+upDownClass+'-arrow"></i> ' +stokeUpdate+'('+stockVariationDisplay+'%)</span>';
                    stockupHtml += '</div>';
                    stockupHtml += '</div>';
                    stockupHtml += '</li>';
                }
                if(isDataPresent == 1)
                {
                    $("#userStokesScroll").html(stockupHtml);
                    $("#userStokesScroll").show();
                    $("#dummyStokesScroll").hide();
                }
                else
                {
                    $("#userStokesScroll").html('');
                    $("#dummyStokesScroll").show();
                    $("#userStokesScroll").hide();
                }
                if(descriptionHtml != '')
                {
                    //alert('if');
                    $("#userStokesScrollDescription").html(descriptionHtml);
                    $("#userStokesScrollDescription").show();
                    $("#dummyStokesScrollDescription").hide();
                } 
                else
                {
                    //alert('else');
                    $("#dummyStokesScrollDescription").show();
                    $("#userStokesScrollDescription").hide();
                }
                setJustDateInPreview(storyTypeList);
            break;
            case 'heading_with_stokes':
                var isDataPresent = 0;
                
                if(slugVal != '')
                    $("#headingWithStokesSlugId").text(slugVal);
                else
                    $("#headingWithStokesSlugId").text('Stock Market');
                
                if(titleVal != '')
                {
                    $("#headingWithStokesHeadlineId").css({'color':selectTitleFontColor});
                    $("#headingWithStokesHeadlineId").text(titleVal);
                }
                else
                    $("#headingWithStokesHeadlineId").text('Stock Market LIVE Updates: Auto index is up a percent, while buying also seen');

                var countForStokeUpName = $('input[name*=stokeUpName]').length;
                var stockupHtml = '';
                for(var i =0; i < parseInt(countForStokeUpName); i++)
                {
                    var pointerCount = i + 1;
                    // alert(pointerCount);
                    var stokeUpName = $('input[name="group-a['+i+'][stokeUpName]"]').val();
                    var stokeUpPrice =  $('input[name="group-a['+i+'][stokeUpPrice]"]').val();
                    var stokeUpdate = $('input[name="group-a['+i+'][stokeUpdate]"]').val();
                    var stokeVariationType = $('input[name="group-a['+i+'][stokeVariationType][]"]').is(':checked'); 
                    var stokeUpVariation =  $('input[name="group-a['+i+'][stokeUpVariation]"]').val();

                    //alert('stokeVariationType :::: '+stokeVariationType);
                    if(stokeUpName != '')
                    {
                        isDataPresent = 1;
                        var stockNameDisplay = stokeUpName;
                    }
                    else
                        var stockNameDisplay = 'Sensex';

                    if(stokeUpPrice != '')
                    {
                        isDataPresent = 1;
                        var stockPriceDisplay = stokeUpPrice;
                    }
                    else
                        var stockPriceDisplay = '48732.55';

                    if(stokeUpdate != '')
                    {
                        isDataPresent = 1;
                        var stockUpdateDisplay = stokeUpdate;
                    }
                    else
                        var stockUpdateDisplay = '141.75';

                    if(stokeUpVariation != '')
                    {
                        isDataPresent = 1;
                        var stockVariationDisplay = stokeUpVariation;
                    }
                    else
                        var stockVariationDisplay = '0.09';

                    if(stokeVariationType == 1)
                    {
                        var upDownClass= "down";
                        var colorClass= "danger";
                    }
                    else
                    {
                        var upDownClass= "up";
                        var colorClass= "success";
                    }
                    
                    stockupHtml += '<li>';
                    stockupHtml += '<div class="stock-market-main">';
                    stockupHtml += '<div class="stock-market-left">'+stockNameDisplay+'</div>';
                    stockupHtml += '<div class="stock-market-right">';
                    stockupHtml += '<span>'+stockPriceDisplay+'</span>';
                    stockupHtml += '<span class="badge badge-pill badge-soft-'+colorClass+' font-size-11"><i class="bx bxs-'+upDownClass+'-arrow"></i> ' +stokeUpdate+'('+stockVariationDisplay+'%)</span>';
                    stockupHtml += '</div>';
                    stockupHtml += '</div>';
                    stockupHtml += '</li>';
                }
                if(isDataPresent == 1)
                {
                    $("#userHeadingWithStokes").html(stockupHtml);
                    $("#userHeadingWithStokes").show();
                    $("#dummyHeadingWithStokes").hide();
                }
                else
                {
                    $("#userHeadingWithStokes").html('');
                    $("#dummyHeadingWithStokes").show();
                    $("#userHeadingWithStokes").hide();
                }
                setJustDateInPreview(storyTypeList);
            break;
            case 'bullets':                
                
                var reporterName = $("#reporterName").val();
                var reporterCity = $("#reporterCity").val();

                if(reporterName != '' && reporterCity != '')
                    $("#bulletsReporterNameCity").text(reporterName+', '+reporterCity);
                else
                    $("#bulletsReporterNameCity").text('Shilpa Singh Ahmedabad');

                if(titleVal != '')
                {
                    $("#bulletsHeadlineId").css({'color':selectTitleFontColor});
                    $("#bulletsHeadlineId").text(titleVal);
                }
                else
                    $("#bulletsHeadlineId").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
                //alert('descriptionVal :::: '+descriptionVal+' ::: descriptionHtml '+descriptionHtml);

                var counterBulletHeadlines = $('input[name*=txtBulletHeadlines]').length;
                var bulletsHtml = '';
                var isOverAllDataPresent = 0;
                for(var i =0; i < parseInt(counterBulletHeadlines); i++)
                {
                    var txtBulletHeadlines = $('input[name="group-x[0][group-y]['+i+'][txtBulletHeadlines]"]').val();
                    //console.log(' txtBulletHeadlines i :::: '+txtBulletHeadlines+' i ::: '+i );
                    if(txtBulletHeadlines != '')
                    {
                        isOverAllDataPresent = 1;
                        var displayBulletHeadline = txtBulletHeadlines;
                    }
                    else
                    {
                        var displayBulletHeadline = 'lorem ipsum is simply dummy text of the printing typesetting industry.';
                    }
                    bulletsHtml += '<div class="content_card video_content pb-0" >';
                        bulletsHtml += '<h3 class="timeLineHeadingVideoFeed">'+displayBulletHeadline+'</h3>';
                    bulletsHtml += '</div>';
                    bulletsHtml += '<div class="news_action">';
                    bulletsHtml += '<ul class="dummyStoryPointsUl mb-0">';
                    var isDataPresent = 0;
                    for(var j =0; j < 8; j++)
                    {
                        var multipleDescription = $('textarea[name="group-x[0][group-y]['+i+'][group-z]['+j+'][txtBulletDescription]"]').val();
                        if(multipleDescription != undefined)
                        {
                           // console.log(' iniside if 1:::: '+multipleDescription);
                            if(multipleDescription != '')
                            {
                               // console.log(' iniside if 2:::: '+multipleDescription);
                                isDataPresent = 1;
                                isOverAllDataPresent = 1;

                                bulletsHtml += '<li class="text_mono">'+multipleDescription+'</li>';
                            }
                        }
                    }
                    if(isDataPresent == 0)
                    {
                        //console.log(' iniside if 3:::: ');
                        bulletsHtml += '<li class="text_mono">Aircraft was fllying in from dubai to calicut</li>';
                        bulletsHtml += '<li class="text_mono">Fire tender and ambulance rushed to the spot more details awaited</li>';
                    }
                    bulletsHtml += '</ul>';
                    bulletsHtml += '</div>';
                }
                if(isOverAllDataPresent == 1)
                {
                    //console.log(' iniside if 4:::: ');

                    $("#userBulletsHeadlineId").html(bulletsHtml);
                    $("#userBulletsHeadlineId").show();
                    $("#dummyBulletsHeadlineId").hide();
                }
                else
                {
                    //console.log(' iniside if5:::: ');
                    $("#userBulletsHeadlineId").html('');
                    $("#dummyBulletsHeadlineId").show();
                    $("#userBulletsHeadlineId").hide();
                }
                setJustDateInPreview(storyTypeList);
            break;
            case 'heading_with_two_photo':
                //alert(slugVal + '  '+titleVal);
                if(slugVal != '')
                    $("#twoPhotoSlugId").text(slugVal);
                else
                    $("#twoPhotoSlugId").text('Modi & Mamata');
                
                if(titleVal != '')
                {
                    $("#twoPhotoHeadlinesId").css({'color':selectTitleFontColor});
                    $("#twoPhotoHeadlinesId").text(titleVal);
                }
                else
                    $("#twoPhotoHeadlinesId").text('West Bengal Chief Minister Mamata Banerjee on Wednesday said her');

                if(descriptionHtml != '')
                {
                    //alert('if');
                    $("#userTwoPhotoDescriptionId").html(descriptionHtml);
                    $("#userTwoPhotoDescriptionId").show();
                    $("#dummyTwoPhotoDescriptionId").hide();
                } 
                else
                {
                    //alert('else');
                    $("#dummyTwoPhotoDescriptionId").show();
                    $("#userTwoPhotoDescriptionId").hide();
                }
                if(pageLoad == 1)
                {
                    $("#hdnIsImageOrVideoAdded").val(1);

                    var fullPath = '../../../images/just_in_timeline/'+imageNameFromDB;
                   // alert(fullPath+' ::: '+imageNameFromDB);
                    if(isImage(imageNameFromDB))
                    {
                        //alert('if');
                        $("#dummyFirstPhotoLiId img").attr("src", fullPath).width('100%');
                    }

                    $("#hdnIsCreditLogoAdded").val(1);

                    var fullPath = '../../../images/just_in_timeline/'+secondImageNameFromDB;
                   // alert(fullPath+' ::: '+imageNameFromDB);
                    if(isImage(secondImageNameFromDB))
                    {
                        //alert('if');
                        $("#dummySecondPhotoLiId img").attr("src", fullPath).width('100%');
                    }
                }
                setJustDateInPreview(storyTypeList);
            break;
            case 'before_and_after':
                //alert(slugVal + '  '+titleVal);
                if(slugVal != '')
                    $("#beforeAndAfterSlugId").text(slugVal);
                else
                    $("#beforeAndAfterSlugId").text('Modi & Mamata');
                
                var afterHeading = $("#afterHeading").val();
                var beforeHeading = $("#beforeHeading").val();
                 
                if(afterHeading != '')
                    $("#previewAfterLabelId").text(afterHeading);
                else
                    $("#previewAfterLabelId").text('After');
                
                if(beforeHeading != '')
                    $("#previewBeforeLabelId").text(beforeHeading);
                else
                    $("#previewBeforeLabelId").text('Before');
                
                if($("#isShowLogoOnTop").prop('checked') == true)
                {
                    $("div[name=showHideNewsFirstLogo]").show();
                }
                else
                {
                    $("div[name=showHideNewsFirstLogo]").hide();
                }
                
                if(titleVal != '')
                {
                    $("#beforeAndAfterHeadlinesId").css({'color':selectTitleFontColor});
                    $("#beforeAndAfterHeadlinesId").text(titleVal);
                }
                else
                    $("#beforeAndAfterHeadlinesId").text('West Bengal Chief Minister Mamata Banerjee on Wednesday said her');

                if(descriptionHtml != '')
                {
                    //alert('if');
                    $("#userBeforeBulletsPoints").html(descriptionHtml);
                    $("#userBeforeBulletsPoints").show();
                    $("#dummyBeforeBulletsPoints").hide();
                } 
                else
                {
                    //alert('else');
                    $("#dummyBeforeBulletsPoints").show();
                    $("#userBeforeBulletsPoints").hide();
                }
                if(pageLoad == 1)
                {
                    $("#hdnIsImageOrVideoAdded").val(1);

                    var fullPath = '../../../images/just_in_timeline/'+imageNameFromDB;
                   // alert(fullPath+' ::: '+imageNameFromDB);
                    if(isImage(imageNameFromDB))
                    {
                        //alert('if');
                        $("#dummyBeforePhotoLiId img").attr("src", fullPath).width('100%');
                    }

                    $("#hdnIsCreditLogoAdded").val(1);

                    var fullPath = '../../../images/just_in_timeline/'+secondImageNameFromDB;
                   // alert(fullPath+' ::: '+imageNameFromDB);
                    if(isImage(secondImageNameFromDB))
                    {
                        //alert('if');
                        $("#dummyAfterPhotoLiId img").attr("src", fullPath).width('100%');
                    }
                }
                setJustDateInPreview(storyTypeList);
            break;
            case 'heading_with_four_photo':
                //alert(slugVal + '  '+titleVal);
                var reporterName = $("#reporterName").val();
                var reporterCity = $("#reporterCity").val();

                if(reporterName != '' && reporterCity != '')
                    $("#fourPhotoReporterNameCity").text(reporterName+', '+reporterCity);
                else
                    $("#fourPhotoReporterNameCity").text('Shilpa Singh Ahmedabad');
                
                if($("#isShowLogoOnTop").prop('checked') == true)
                {
                    $("div[name=showHideNewsFirstLogo]").show();
                }
                else
                {
                    $("div[name=showHideNewsFirstLogo]").hide();
                }
                var photoCrediterName = $("#photoCrediterName").val();
                if($("#isShowPhotoCrediterName").prop('checked') == true)
                {
                    if(photoCrediterName != '')
                        $("span[name=fourPhotoPhotoCrediterName]").text(photoCrediterName);
                    else
                        $("span[name=fourPhotoPhotoCrediterName]").text('Excelsior');
                    
                    $("div[name=fourPhotoShowHidePhotoCrediterName]").show();
                }
                else
                {
                    $("div[name=fourPhotoShowHidePhotoCrediterName]").hide();
                }
                
                if(slugVal != '')
                    $("#fourPhotoSlugId").text(slugVal);
                else
                    $("#fourPhotoSlugId").text('Modi & Mamata');
                
                if(titleVal != '')
                {
                    $("#fourPhotoHeadlinesId").css({'color':selectTitleFontColor});
                    $("#fourPhotoHeadlinesId").text(titleVal);
                }
                else
                    $("#fourPhotoHeadlinesId").text('West Bengal Chief Minister Mamata Banerjee on Wednesday said her');

                if(descriptionHtml != '')
                {
                    //alert('if');
                    $("#userFourPhotoDescriptionId").html(descriptionHtml);
                    $("#userFourPhotoDescriptionId").show();
                    $("#dummyFourPhotoDescriptionId").hide();
                } 
                else
                {
                    //alert('else');
                    $("#dummyFourPhotoDescriptionId").show();
                    $("#userFourPhotoDescriptionId").hide();
                }
                if(pageLoad == 1)
                {
                    var imageNameArray = ['First', 'Second', 'Third','Fourth'];
                    var defaultImageNameArray = ['amitshah.jpg', 'Modi-16-1.jpg', 'rupani.jpg','Gautam_Adani.jpg'];
                    for(var k =0; k < 4; k++)
                    {
                        var imageValue = $('input[name="group-e['+k+'][four_images_cropped_cover_photo]"]').val();
                        var fullPath = '../../../images/just_in_timeline/'+imageValue;
                        var defaultFullPath = '../../../assets/images';
                        
                        if(isImage(imageValue))
                        {
                            $("#dummyFourPhoto"+imageNameArray[k]+"PhotoLiId img").attr("src", fullPath);
                        }
                        else
                        {
                            $("#dummyFourPhoto"+imageNameArray[k]+"PhotoLiId img").attr("src", defaultFullPath+'/'+defaultImageNameArray[k]);
                        }
                    }
                }
                 setJustDateInPreview(storyTypeList);
            break;
            case 'five_question':
                
                if($("#isShowLogoOnTop").prop('checked') == true)
                {
                    $("div[name=showHideNewsFirstLogo]").show();
                }
                else
                {
                    $("div[name=showHideNewsFirstLogo]").hide();
                }
                if($("#isShowRedColorLine").prop('checked') == true)
                {
                    $("div[name=fiveQuestionShowHideRedThickLine]").show();
                }
                else
                {
                    $("div[name=fiveQuestionShowHideRedThickLine]").hide();
                }
                var photoCrediterName = $("#photoCrediterName").val();
                if($("#isShowPhotoCrediterName").prop('checked') == true)
                {
                    if(photoCrediterName != '')
                        $("span[name=fiveQuestionPhotoCrediterName]").text(photoCrediterName);
                    else
                        $("span[name=fiveQuestionPhotoCrediterName]").text('Excelsior');
                    
                    $("div[name=fiveQuestionShowHidePhotoCrediterName]").show();
                }
                else
                {
                    $("div[name=fiveQuestionShowHidePhotoCrediterName]").hide();
                }
                
                var fullName = $("#fullName").val();

                if(titleVal != '')
                {
                    $("#fiveQuestionHeadlineId").css({'color':selectTitleFontColor});
                    $("#fiveQuestionHeadlineId").text(titleVal);
                }
                else
                    $("#fiveQuestionHeadlineId").text('Stock Market LIVE Updates: Auto index is up a percent, while buying also seen');

                if(fullName != '')
                    $("#fiveQuestionInterviewerNameId").text(fullName);
                else
                    $("#fiveQuestionInterviewerNameId").text('Shilpa Singh Ahmedabad');

                var QuestionAnserNameArray = ['first','second','third','fourth','fifth'];
                for(var i =0; i < 5; i++)
                {
                    var question = $('input[name="group-d['+i+'][question]"]').val();
                    var answer = $('input[name="group-d['+i+'][answer]"]').val();
                    //alert('question :::: '+question+' ::: answer '+answer);
                    if(question != '')
                    {
                        $("#"+QuestionAnserNameArray[i]+"QuestionId").html('<span class="text-bold-size">Question: </span>'+question);
                    }
                    else
                    {
                        $("#"+QuestionAnserNameArray[i]+"QuestionId").html('<span class="text-bold-size">Question: </span>Aircraft was fllying in from dubai to calicut');
                    }
                    if(answer != '')
                    {
                        $("#"+QuestionAnserNameArray[i]+"AnswerId").html('<span class="text-bold-size">Question: </span>'+answer);
                    }
                    else
                    {
                        $("#"+QuestionAnserNameArray[i]+"AnswerId").html('<span class="text-bold-size">Answer: </span>Fire tender and ambulance rushed to the spot more details awaited');
                    }
                }
                if(descriptionVal != '')
                {
                    $("#fiveQuestionDescription").html(descriptionVal);
                } 
                else
                {
                    $("#fiveQuestionDescription").html("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s");
                }
                if(pageLoad == 1)
                {
                    $("#hdnIsImageOrVideoAdded").val(1);

                    var fullPath = imageNameFromDB;
                    //alert(fullPath+' ::: '+imageNameFromDB);
                    if(isImage(imageNameFromDB))
                    {
                        //alert('if');
                        $("#fiveQuestionImageId").attr("src", fullPath).width('100%');
                        $("#userFiveQuestionImage").show();
                        $("#dummyFiveQuestionImage").hide();
                    }
                }
                setJustDateInPreview(storyTypeList);
            break;
            case 'photo_mapping':
                if(pageLoad == 0)
                {
                    $("#userPhotoMappingDescription").html('');
                }
                var photoCrediterName = $("#photoCrediterName").val();
                var reporterName = $("#reporterName").val();
                var reporterCity = $("#reporterCity").val();
                
                if(reporterName != '' && reporterCity != '')
                    $("#photoMappingReporterNameCity").text(reporterName+', '+reporterCity);
                else
                    $("#photoMappingReporterNameCity").text('Shilpa Singh, Ahmedabad');
                
                if(slugVal != '')
                    $("#photoMappingSlug").text(slugVal);
                else
                    $("#photoMappingSlug").text('JUST IN');
                
                if(titleVal != '')
                {
                    $("#photoMappingTitle").css({'color':selectTitleFontColor});
                    $("#photoMappingTitle").text(titleVal);
                }
                else
                    $("#photoMappingTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
                
                
                if(descriptionHtml != '')
                {
                    $("#userPhotoMappingDescription").html(descriptionHtml);
                    $("#userPhotoMappingDescription").show();
                    $("#dummyPhotoMappingDescription").hide();
                } 
                else
                {
                    $("#dummyPhotoMappingDescription").show();
                    $("#userPhotoMappingDescription").hide();
                }
                if(pageLoad == 1)
                {
                    var fullPath = '../../../images/just_in_timeline/'+imageNameFromDB;
                    $("#hdnIsImageOrVideoAdded").val(1);
                    if(isImage(imageNameFromDB))
                    {
                        $("#photoMappingImageId").attr("src", fullPath).css('display','none');
                    }
                }
                setJustDateInPreview(storyTypeList);
            break;
            
        }
        isEventThreadDisplay = 0;
    }
    
    function setPhotoAlbumPreview()
    {
        var countForSpanImages = $('div[name*="selectImageTypeImageOrVideoDivId"]').length;
        var storyTypeList = $('input[name="storyTypeList"]:checked').val();
       // alert('countForSpanImages ::: '+countForSpanImages);
        //var counter = parseInt(countForSpanImages) + 1;
        var counter = parseInt(countForSpanImages);
        if(storyTypeList == 'photo_album')
            $("#userMultipleImagesDivId").children().remove();
        else if(storyTypeList == 'story_album')
            $("#StoryAlbumMultipleImagesDivId").children().remove();
        //$("#userMultipleImagesDivId").html(multiplePhotoAlbumDummyHtml);
        
        //alert('counter :::: '+counter);
        for(var i =0; i < parseInt(counter); i++)
        {
            var imageName = $('input[name="group-a['+i+'][cropped_cover_photo]"]').val();
//            if(imageName != '')
//            {
                var hdnImageId = $('input[name="group-a['+i+'][cropped_cover_photo]"]').attr('id');
            // alert(hdnImageId);
                var titleVal = $('input[name="group-a['+i+'][title]"]').val();
                var selectTitleFontColor = $('select[name="group-a['+i+'][selectTitleFontColor]"]').val();
                var imageNameFromDB = '';
                if(hdnImageId != undefined)
                {
                    if (hdnImageId.indexOf('_') > -1)
                    {
                        //alert("hello found inside your_string");
                        var tempImageId = hdnImageId.split("_");
                        imageNameFromDB = tempImageId[1];
                    }
                }

                if(imageNameFromDB == imageName)
                {
                    //alert('if  '+imageNameFromDB+' ::: '+imageName);
                    var imagePath = '../../../images/just_in_timeline/'+imageName;
                }
                else
                {
                    //alert('else  '+imageNameFromDB+' ::: '+imageName);
                    var imagePath = imageName;
                }
                if(imageName != '')
                {
                    $('img[name="group-a['+i+'][imageFilePreviewImgId]"]').attr("src", imagePath);
                    $('div[name="group-a['+i+'][imageFilePreviewDivId]"]').show();
                    $('img[name="group-a['+i+'][imageFilePreviewImgId]"]').show();
                    $('video[name="group-a['+i+'][imageFilePreviewVideoId]"] source').attr("src", '');
                    $('video[name="group-a['+i+'][imageFilePreviewVideoId]"]').hide();
                }
                
             //alert('imagePath :::: '+imagePath);
                var imageCounter = i + parseInt(1);

               // console.log('imageCounter :::: '+imageCounter); 
                //$('.carousel').carousel({interval:false});
               // $("#carouselExampleControls #userMultipleImagesDivId").carousel("pause").removeData();
                if($("#isShowLogoOnTop").prop('checked') == true)
                    var logoOnTopDisplay = "display:block";
                else
                    var logoOnTopDisplay = "display:none";

                if($("#isShowRedColorLine").prop('checked') == true)
                    var redColorDisplay = "display:block";
                else
                    var redColorDisplay = "display:none";

                if($("#isShowPhotoCrediterName").prop('checked') == true)
                {
                    var photoCrediterDisplay = "display:block";
                    var photoCrediterName = $("#photoCrediterName").val();
                }
                else
                {
                    var photoCrediterDisplay = "display:none";
                }
                

                var tempCounter = parseInt(parseInt(counter - imageCounter) + 1);
                var imageHtml = "<div class=\"carousel-item active\" id=\"user_display_multiple_images_" + imageCounter + "\" >" +
                      "<img class=\"d-block img-fluid\" src=\"" + imagePath + "\"  alt=\"First slide\" >" +
                      "<div class=\"slider_num_of\" id=\"user_display_multiple_images_counter_" + imageCounter + "\">" +
                          tempCounter+"/"+counter+"" +
                      "</div>" +
                        '<div class="cortesy_line" style="'+photoCrediterDisplay+'"><p>Photo Credit: <span>'+photoCrediterName+'</span></p></div>'+
                        '<div class="red_line" style="'+redColorDisplay+'"><span></span></div>'+
                        '<div class="logo_position" style="'+logoOnTopDisplay+'"><img src="../../../assets/images/logo-light.png" alt="" height="19"></div>'+
                      '<h5 style="color:'+selectTitleFontColor+'" class=\"timeLineHeadingPhotoFeed\">'+titleVal+'</h5>' +
                  "</div>";

                if(storyTypeList == 'photo_album')
                {
                    $("#userMultipleImagesDivId .carousel-item").removeClass('active');
                    $("#userMultipleImagesDivId").prepend(imageHtml);
                }
                else if(storyTypeList == 'story_album')
                {
                    $("#StoryAlbumMultipleImagesDivId .carousel-item").removeClass('active');
                    $("#StoryAlbumMultipleImagesDivId").prepend(imageHtml);
                }
//            }
        }
        if(countForSpanImages == 1)
        {
            var imageHiddenData = $('input[name="group-a[0][cropped_cover_photo]"]').val();
            var imageData = $('input[name="group-a[0][image_file]"]').val();
            if(imageHiddenData == '' && imageData == '')
            {
                $("#userMultipleImagesDivId").children().remove();
                $("#userMultipleImagesDivId").html(multiplePhotoAlbumDummyHtml);
                $("#StoryAlbumMultipleImagesDivId").children().remove();
                $("#StoryAlbumMultipleImagesDivId").html(multiplePhotoAlbumDummyHtml);
            }
        }
        
        //$("#userMultipleImagesDivId").show();
        $('#carouselExampleControls').carousel();
    }
    $(document).on("click", ".deleteDescription", function()
    {
        //alert('delete');
        setTimeout( function()
        { 
            updateAddButtonName('story');
            previewFunction();
        }, 2000);
        
    });
    $(document).on("click", ".deletePollPerformanceForm", function()
    {
        //alert('delete');
        setTimeout( function()
        { 
            updateAddButtonName('poll_performance');
            previewFunction();
        }, 2000);
        
    });
    $(document).on("click", ".photoMappingDelete", function()
    {
        setTimeout( function()
        { 
            updateAddButtonName('photo_mapping');
            previewFunction();
        }, 2000);
        
    });
    
    $(document).on("click", ".afterDeleteDescription", function()
    {
        //alert('delete');
        setTimeout( function()
        { 
            updateAddButtonName('after_pointer');
            afterDescriptionPreviewFunction();
        }, 2000);
        
    });
    
    $(document).on("click", ".deleteThreadDescription", function()
    {
        //alert('delete');
        setTimeout( function()
        { 
            threadPreviewFunction();

        }, 2000);
    });
    
    $(document).on("click", ".deleteMultipleImages", function()
    {
        setTimeout( function()
        {
            pageLoad = 0;
            setPhotoAlbumPreview();
            updateAddButtonName('story');
        }, 2000);
    });
    $(document).on("click", ".deleteStockForm", function()
    {
        //alert('delete');
        setTimeout( function()
        { 
            updateAddButtonName('stock_form');
            previewFunction();
        }, 2000);
        
    });
    $(document).on("click", ".deleteWeekendForm", function()
    {
        //alert('delete');
        setTimeout( function()
        { 
            updateAddButtonName('weekend_form');
            previewFunction();
        }, 2000);
        
    });
    
    $(document).on("click", ".deleteStokeUpForm", function()
    {
        //alert('delete');
        setTimeout( function()
        { 
            updateAddButtonName('stoke_up_form');
            previewFunction();
        }, 2000);
        
    });
    $(document).on("click", ".deleteOption", function()
    {
        //alert('delete');
        setTimeout( function()
        { 
            updateAddButtonName('bullets_pointer');
            previewFunction();
        }, 2000);
    });
    $(document).on("click", ".deleteBulletsHeadlines", function()
    {
        //alert('delete');
        setTimeout( function()
        { 
            updateAddButtonName('bullets_heading');
            previewFunction();
        }, 2000);
    });
    function setJustDateInPreview(storyTypeList)
    {
        var justinDate = $("#just_date").val();
        var timepicker = $("#timepicker").val();
       // alert('justinDate :::: '+justinDate);
        finalJustinDate = '';
        if(justinDate != '')
        {
            var splitJustinDate = justinDate.split('/');
            var finalJustinDate = splitJustinDate[1]+'/'+splitJustinDate[0]+'/'+splitJustinDate[2];
        }
        
        if(justinDate != '' && finalJustinDate != '')
        {
            var d = new Date(finalJustinDate);
            //alert('d ::: '+d);
            var selectedDate = d.getDate();
            var selectedMonth = d.getMonth();
            selectedMonth++;

            //alert('selectedMonth ::: '+selectedMonth);
            var selectedMonthLength = selectedMonth.toString().length;
            var monthNames = [ "January", "February", "March", "April", "May", "June",
"July", "August", "September", "October", "November", "December" ];
            var selectMonthName = monthNames[selectedMonth - 1];
            if(selectedMonthLength == 1)
            {
                selectedMonth = '0'+selectedMonth;
            }
            var selectedYear = d.getFullYear();
            var date = selectedDate + "-" + selectedMonth + "-" + selectedYear;
            var fullDateTimeFormate = selectedDate + " " + selectMonthName + ", " + selectedYear+' '+timepicker;
            //alert(fullDateTimeFormate);
           switch(storyTypeList)
           {
                case 'thread':
                   $("#userThreadDate").text('Date '+date);
                break;
                case 'news_update':
                   $("#userNewsUpdateDate").text(fullDateTimeFormate);
                break;
                case 'heading_with_four_photo':
                   $("#headingWithFourPhotoDateTime").text(fullDateTimeFormate);
                break;
                case 'five_question':
                   $("#fiveQuestionDateTime").text(fullDateTimeFormate);
                break;
                case 'big_box':
                   $("#bigBoxDateTime").text(fullDateTimeFormate);
                break;
                case 'bullets':
                   $("#bulletsDateTime").text(fullDateTimeFormate);
                break;
                case 'heading_with_stokes':
                   $("#headingWithStokesDateTime").text(fullDateTimeFormate);
                break;
                case 'stokes_scroll':
                   $("#stokesScrollDateTime").text(fullDateTimeFormate);
                break;
                case 'heading_with_two_photo':
                   $("#headingWithTwoPhotoDateTime").text(fullDateTimeFormate);
                break;
                case 'before_and_after':
                   $("#beforeAndAfterDateTime").text(fullDateTimeFormate);
                break;
                case 'top_news':
                   $("#topNewsDateTime").text(fullDateTimeFormate);
                break;
                case 'insider':
                   $("#insiderDateTime").text(fullDateTimeFormate);
                break;
                case 'company_headlines':
                   $("#topNewsDateTime").text(fullDateTimeFormate);
                break;
                case 'poll_performance':
                   $("#topNewsDateTime").text(fullDateTimeFormate);
                break;
                case 'text_with_header':
                   $("#textWithHeaderDateTime").text(fullDateTimeFormate);
                break;
                case 'big_headlines':
                   $("#bigHeadlinesDateTime").text(fullDateTimeFormate);
                break;
                case 'contact_card':
                   $("#contactCardDateTime").text(fullDateTimeFormate);
                break;
                case 'stoke_up':
                   $("#stockUpDateTime").text(fullDateTimeFormate);
                break;
                case 'headlines':
                   $("#headlinesDateTime").text(fullDateTimeFormate);
                break;
                case 'photo_mapping':
                   $("#photoMappingDateTime").text(fullDateTimeFormate);
                break;
                case 'count_down':
                   $("#countDownDateTime").text(fullDateTimeFormate);
                break;
                
           }
        }
        else
        {
            switch(storyTypeList)
            {
                case 'top_news':
                   $("#topNewsDateTime").text(currentDateTimeForPreview);
                break;
                case 'insider':
                   $("#insiderDateTime").text(currentDateTimeForPreview);
                break;
                case 'company_headlines':
                   $("#topNewsDateTime").text(currentDateTimeForPreview);
                break;
                case 'poll_performance':
                   $("#topNewsDateTime").text(currentDateTimeForPreview);
                break;
                case 'thread':
                   $("#userThreadDate").text('Date '+currentDateForPreview);
                break;
                case 'news_update':
                   $("#userNewsUpdateDate").text(currentDateTimeForPreview);
                break;
                case 'heading_with_four_photo':
                   $("#headingWithFourPhotoDateTime").text(currentDateTimeForPreview);
                break;
                case 'five_question':
                   $("#fiveQuestionDateTime").text(currentDateTimeForPreview);
                break;
                case 'big_box':
                   $("#bigBoxDateTime").text(currentDateTimeForPreview);
                break;
                case 'bullets':
                   $("#bulletsDateTime").text(currentDateTimeForPreview);
                break;
                case 'heading_with_stokes':
                   $("#headingWithStokesDateTime").text(currentDateTimeForPreview);
                break;
                case 'stokes_scroll':
                   $("#stokesScrollDateTime").text(currentDateTimeForPreview);
                break;
                case 'heading_with_two_photo':
                   $("#headingWithTwoPhotoDateTime").text(currentDateTimeForPreview);
                break;
                case 'before_and_after':
                   $("#beforeAndAfterDateTime").text(currentDateTimeForPreview);
                break;
                case 'text_with_header':
                   $("#textWithHeaderDateTime").text(currentDateTimeForPreview);
                break;
                case 'contact_card':
                   $("#contactCardDateTime").text(currentDateTimeForPreview);
                break;
                case 'stoke_up':
                   $("#stockUpDateTime").text(currentDateTimeForPreview);
                break;
                case 'headlines':
                   $("#headlinesDateTime").text(currentDateTimeForPreview);
                break;
                case 'photo_mapping':
                   $("#photoMappingDateTime").text(currentDateTimeForPreview);
                break;
                case 'count_down':
                   $("#countDownDateTime").text(currentDateTimeForPreview);
                break;
            }
        }
    }
    function isAudio(filename) 
    {
        var ext = getExtension(filename);
        switch (ext.toLowerCase()) 
        {
            case 'mp3':
            // etc
            return true;
        }
        return false;
    }
    function showOrHideStoryList(action)
{
    if(action == 'show')
    {
//        $("#showStoryList").hide();
//        $("#hideStoryList").show();
        //$("#fullFormDivId").hide();
        //$("#block-listings").show();
    }
    else
    {
//        $("#showStoryList").show();
//        $("#hideStoryList").hide();
        //$("#fullFormDivId").show();
        //$("#block-listings").hide();
    }
}
//    function showOrHideStoryList(action)
//    {
//        if(action == 'show')
//        {
//    //        $("#showStoryList").hide();
//    //        $("#hideStoryList").show();
//            $("#fullFormDivId").hide();
//            $("#block-listings").show();
//        }
//        else
//        {
//    //        $("#showStoryList").show();
//    //        $("#hideStoryList").hide();
//            $("#fullFormDivId").show();
//            $("#block-listings").hide();
//        }
//    }
    function showDateFilter()
    {
        $("#dateFilterDivId").toggle();
        $("#dateFilterSearchButtonId").toggle();
    }
    function setSelectedDate()
    {
        var storyDate = $("#story_date").val();
        if(storyDate != '' && storyDate != undefined)
            $("#selectedDateHrefId").text('Date : '+storyDate);
    }

    

$(document).on("click", ".addfile", function(e)
{
    //pageLoad = 0;
    //alert('inside if');
    var buttonName = $(this).attr('name');
    var counterNumber = buttonName.substring(8, 9);
    //alert('buttonName ::: '+buttonName+' counterNumber :::: '+counterNumber);
    var storyTypeList = $('input[name="storyTypeList"]:checked').val();
        
    if(storyTypeList == undefined)
    {
        swal("Sorry", "Please select story type first", "error");
    }
    else
    {
        var imgVal = $('.story_document').val();
        var linkDescription = $('.linkDescription').val();
        var tagname = $('.tagname').val();
        var tagType = $('#tagType').val();
       // alert('imgVal :::: '+imgVal+' linkDescription :::: '+linkDescription);
        
        if((imgVal == '' || linkDescription == '') && (tagname == '')) 
        { 
            swal("Sorry", "Please add image/link and tagname first", "error");
        } 
        else
        {
            //var check = check_needed_document(); //coment by SS 5 march 2021
            if(tagType == 'image')
            {
                var reader;
                var file;
                var url;
                var base64data = '';
                //file = $('input[name="group-a['+counterNumber+'][story_file_upload]')[0].files[0];
                file = $('.story_document')[0].files[0];
               
                
                
                var done = function (url) 
                {
                    image.src = url;
                    if (/^image\/\w+/.test(file.type))
                    {
                        $("#hdnCurrentGroupName").val(counterNumber);
                        addEventFileCall = 1;
                        $("#modalLabel").text(file.name);
                        
                        $('div[name*="selectImagePhotoDivName"]').removeClass();
                        var storyTypeList = $('input[name="storyTypeList"]:checked').val();
                        if(storyTypeList == 'full_screen' || storyTypeList == 'weekend' 
                                || storyTypeList == 'before_and_after' || storyTypeList == 'heading_with_two_photo')
                        {
                            $('div[name*="selectImagePhotoDivName"]').addClass('select-Image-photo-weekend');
                            assignAspectRatio = 9/16;
                        }
                        else if(storyTypeList == 'spliter')
                        {
                            $('div[name*="selectImagePhotoDivName"]').addClass('select-Image-photo-spliter');
                            assignAspectRatio = 16/9;
                        }
                        else
                        {
                            $('div[name*="selectImagePhotoDivName"]').addClass('select-Image-photo');
                            assignAspectRatio = 1;
                        }
                        
                        $modal.modal('show');
                    }
                };
                if (URL) 
                {
                    //alert('else');
                    done(URL.createObjectURL(file));
                } 
                else if (FileReader) 
                {
                    //alert('if');
                    reader = new FileReader();
                    reader.onload = function (e) 
                    {
                        done(reader.result);
                        base64data = reader.result;
                    };
                    reader.readAsDataURL(file);
                }
                if(/^video\/\w+/.test(file.type))
                {
                    var videoReader = new FileReader();
                    videoReader.readAsDataURL(file); 
                    videoReader.onloadend = function()
                    {
                        //alert('event inside video');
                        var base64data = videoReader.result;	
                        //alert('base64data :::: '+base64data);
                        var name = file.name;
                        var tagnameWithHash = "##"+tagname+'##';

                        var tr = '<tr><td>'+name+'<input type="hidden" name="uploaded_file_name[]" value="'+base64data+'">'+
                        '<input type="hidden" name="uploaded_file_tag_type[]" value="video"></td>'+
                        '<td>'+tagnameWithHash+'<input type="hidden" name="uploaded_file_tag[]" value="'+tagnameWithHash+'"></td>'+
                        '<td><button type="button" title="" class="btn btn-sm btn-danger mt-2 delete_row" data-original-title="Delete">'+
                        '<i class="bx bx-trash d-block font-size-16"></i></button></td></tr>';

                        $('.mytablebody').last().append(tr);

                        $('.story_document').val(''); 
                        $('.tagname').val('');
                        $('#tagtitle').val('');
                    }
                }
            }
            else if(tagType == 'link')
            {
                var linkDescriptionVal = $('.linkDescription').val();
                
                //var tempDisplayImageValue = displayDescription(linkDescriptionVal,20);
                
                //alert('tempDisplayImageValue ::: '+tempDisplayImageValue);
                linkDescriptionVal = $.base64.encode(linkDescriptionVal);
                tempDisplayImageValue = 'Link';
               // console.log(linkDescriptionVal);
                
                var tagnameWithHash = "##"+tagname+'##';
                var tr = '<tr><td>'+tempDisplayImageValue+'<input type="hidden" name="uploaded_file_name[]" value="'+linkDescriptionVal+'">'+
                    '<input type="hidden" name="uploaded_file_tag_type[]" value="link"></td>'+
                    '<td>'+tagnameWithHash+'<input type="hidden" name="uploaded_file_tag[]" value="'+tagnameWithHash+'"></td>'+
                    '<td><button type="button" title="" class="btn btn-sm btn-danger mt-2 delete_row" data-original-title="Delete">'+
                    '<i class="bx bx-trash d-block font-size-16"></i></button></td></tr>';
                    
                    $('.mytablebody').last().append(tr);

                    $('.linkDescription').val(''); 
                    $('.story_document').val(''); 
                    $('.tagname').val('');
                    $('#tagtitle').val('');
            }
        }
    }

});
function getThreadDescriptionHtml(descriptionVal)
{
    var myContent = descriptionVal;
    var tagLength = $(".mytablebody tr").length;
    var imageOrVideoHtml = '';
    var tagName = '';
    var newHTML = '';
    var imageData = '';
    
    $(".mytablebody > tr > td").each(function(i)
    {
        
        if( $(this).find("input[name='uploaded_file_name[]']").length )  
        {
            imageData = $(this).find("input[name='uploaded_file_name[]']").val();
            imageBrowseName = $(this).text();
            var tagType = $(this).find("input[name='uploaded_file_tag_type[]']").val();
            var hdnImageId = $(this).find("input[name='uploaded_file_name[]']").attr('id');
            
            var imageNameFromDB = '';
            if(hdnImageId != undefined)
            {
                if (hdnImageId.indexOf('_') > -1)
                {
                    //alert("hello found inside your_string");
                    var tempImageId = hdnImageId.split("_");
                    imageNameFromDB = tempImageId[1];
                }
            }
            
            if(tagType == 'image' || tagType == 'video')
            {
                //alert(' if  ::: '+tagType+' imageBrowseName :::: '+imageBrowseName);
                if(tagType == 'image')
                {
                    //alert(' if  ::: '+tagType+' imageBrowseName :::: '+imageBrowseName);
                    //console.log('is image');
                    if(imageNameFromDB == imageData)
                    {
                        //alert('if  '+imageNameFromDB+' ::: '+imageName);
                        var imagePath = '../../../images/just_in_timeline/'+imageData;
                    }
                    else
                    {
                        //alert('else  '+imageNameFromDB+' ::: '+imageName);
                        var imagePath = imageData;
                    }
                    imageOrVideoHtml = '<img src="'+imagePath+'" alt="'+tagName+'"  width="342" height="228">';
                }
                else if(tagType == 'video')
                {
                    if(imageNameFromDB == imageData)
                    {
                        //alert('if  '+imageNameFromDB+' ::: '+imageName);
                        var imagePath = '../../../images/just_in_timeline/'+imageData;
                    }
                    else
                    {
                        //alert('else  '+imageNameFromDB+' ::: '+imageName);
                        var imagePath = imageData;
                    }
                    imageOrVideoHtml = '';
                    imageOrVideoHtml += '<video width="100%" controls width="342" height="228">';
                        imageOrVideoHtml += '<source src="'+imagePath+'" type="video/mp4" width="342" height="228">';
                        imageOrVideoHtml += 'Your browser does not support HTML video.';
                    imageOrVideoHtml += '</video>';

                    //console.log('is video :::: '+imageOrVideoHtml);
                }
                else if(isAudio(imageBrowseName))
                {
                    imageOrVideoHtml = '';
                    imageOrVideoHtml += '<audio controls>';
                        imageOrVideoHtml += '<source src="'+imageData+'" />';
                    imageOrVideoHtml += '</audio>';
                    //console.log('is not image or not video ');
                }
            }
            else
            {
                //alert(' base64::::: '+imageData);
                var decodeHtmlData = $.base64.decode(imageData);
                imageOrVideoHtml = decodeHtmlData;
            }
        }
        if( $(this).find("input[name='uploaded_file_tag[]']").length )  
        {
            tagName = $(this).find("input[name='uploaded_file_tag[]']").val();
        }
        else
        {
            tagName = '';
        }
        //alert(' inside imageOrVideoHtml :::: '+imageOrVideoHtml+' tagName :::: '+tagName);
        if(tagName != '' && imageData != '')
        {             
            if(newHTML != '')
            {
                newHTML = newHTML.replace(tagName,imageOrVideoHtml);
            }
            else
            {
                newHTML = descriptionVal.replace(tagName,imageOrVideoHtml);
            }
            //alert(' inside if newHTML :::: '+newHTML);
            imageData = tagName = imageOrVideoHtml = '';
        }
        else if(newHTML == '')
        {
            newHTML = descriptionVal;
            //alert(' inside else newHTML :::: '+newHTML);
        }
    });
    if(newHTML == '')
    {
        newHTML = descriptionVal;
        //console.log(' outside newHTML :::: '+newHTML);
    }
   // alert('newHTML :::: '+newHTML);
    return newHTML;
}
function isHTML(str) {
  var a = document.createElement('div');
  a.innerHTML = str;

  for (var c = a.childNodes, i = c.length; i--; ) {
    if (c[i].nodeType == 1) return true; 
  }

  return false;
}
function htmlUnescape(str){
    return str
        .replace(/&quot;/g, '"')
        .replace(/&#39;/g, "'")
        .replace(/&lt;/g, '<')
        .replace(/&gt;/g, '>')
        .replace(/&amp;/g, '&');
}
function decodeEntities(input) {
  var y = document.createElement('textarea');
  y.innerHTML = input;
  return y.value;
}
function htmlDecode(input)
{
    var doc = new DOMParser().parseFromString(input, "text/html");
    return doc.documentElement.textContent;
//  var e = document.createElement('textarea');
//  e.innerHTML = input;
//  // handle case of empty input
//  return e.childNodes.length === 0 ? "" : e.childNodes[0].nodeValue;
}

function StripTags(string) 
{
    var decoded_string = $("<div/>").html(string).text();
    return $("<div/>").html(decoded_string).text();
}
$(document).on("click", ".delete_row", function()
{
    $(this).parent().parent().remove();
    threadPreviewFunction();
});
function bugDisplayOrNot(action)
{
    //alert(action);
    if(action == 'yes')
    {
        $("#hdnIsBugDisplay").val('yes');
        $("#bugColorSettingDivId").show();
    }
    else if(action == 'no')
    {
        $("#hdnIsBugDisplay").val('no');
        $("#bugColorSettingDivId").hide();
    }
}

function userCapturedDataFrom(action)
{
    //alert(action);
    $("#hdnUserCapturedDataType").val(action);
}
function tagTypeLinkeOrImage(mode)
{
    if(mode == 'image')
    {
        $("#imageUploadType").show();
        $("#EmbededCodeType").hide();
    }
    else if(mode == 'link')
    {
        $("#imageUploadType").hide();
        $("#EmbededCodeType").show();
    }
}

    function setCurrentDate()
    {
        //alert('if');
        var d = new Date();
        var curr_date = d.getDate();
        var curr_month = d.getMonth();
        curr_month++;
        var month = ("0" + (curr_month)).slice(-2);
        var date1 = ("0" + (curr_date)).slice(-2);
        var curr_year = d.getFullYear();

        var date = date1 + "/" + month + "/" + curr_year;
        var time = formatAMPM(new Date);
        //console.log(date);
        $("#just_date").val(date);
        $("#timepicker").val(time);
    }
    function formatAMPM(date) 
    {
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0' + minutes : minutes;
        var strTime = hours + ':' + minutes + ' ' + ampm;
        return strTime;
    }
    function countCharForBullet()
    {

    }
    function countChar(action,mode,txtName) 
    {
       //console.log('action :::: '+action);
       //console.log('mode :::: '+mode);
       //console.log('txtName :::: '+txtName);
        if(txtName != '')
        {
            var attrName = txtName;
        }
        else
        {
            var attrName = $(action).attr('name');
        }
        if(mode == 'title' ||  mode == 'slug' ||  mode == 'stockName' ||  mode == 'stockPrice' 
            || mode == 'stockVariation' ||  mode == 'reporterCity' ||  mode == 'reporterName' 
            || mode == 'contactNo' ||   mode == 'location'
            || mode == 'website' ||  mode == 'fullName' ||  mode == 'address' ||  mode == 'designation'
            || mode == 'courtesyLine' || mode == 'photoCrediterName'||  mode == 'stokeUpName'
            || mode == 'stokeUpPrice' || mode == 'stokeUpVariation' || mode == 'stokeUpdate' || mode == 'weekendSlug'|| 
            mode == 'weekendHeadlines' || mode == 'weekendReporterName' || mode == 'weekendReporterCity'
            ||  mode == 'txtBulletHeadlines' ||  mode == 'boxHeading' ||  mode == 'question'  
            ||  mode == 'answer' ||  mode == 'afterHeading'  ||  mode == 'beforeHeading' ||  mode == 'pollYear'
            ||  mode == 'consistency' ||  mode == 'wonlose' ||  mode == 'companyYear' ||  mode == 'profitLossOfData'
            || mode == 'txtTagMasterOther' ||  mode == 'photoMappingHeading'
            || mode == 'photoMappingSubHeading' || mode == 'namePlate' || mode == 'designationPlate')
    
        {
            var txtIdValue = $('input[name="'+attrName+'"]').val();
        }
        else if(mode == 'description' || mode == 'threadDesc' || mode == 'txtBulletDescription' 
                ||  mode == 'afterDescription')
        {
            var txtIdValue = $('textarea[name="'+attrName+'"]').val();
        }
        console.log('txtIdValue :::: '+txtIdValue+' attrName :::: '+attrName);

        var txtIdValueLen = txtIdValue.length;
        if(mode == 'txtBulletHeadlines')
        {
            var counterNumber = attrName.substring(0, 22);
        }
        else
        {
            var counterNumber = attrName.substring(0, 10);
        }
        console.log('counterNumber :::: '+counterNumber);
        
        
        if(mode == 'title')
        {
            var title_max_characters = counterNumber+'[title_max_characters]';
            $('small[name="'+title_max_characters+'"]').html(titleMaxLength - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'txtTagMasterOther')
        {
            $('small[name="txtTagMasterOther_max_characters"]').html(30 - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'namePlate')
        {
            $('small[name="namePlate_max_characters"]').html(20 - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'designationPlate')
        {
            $('small[name="designationPlate_max_characters"]').html(30 - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'photoMappingHeading')
        {
            var photoMappingHeading = counterNumber+'[photoMappingHeading_max_characters]';
            $('small[name="'+photoMappingHeading+'"]').html(30 - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'photoMappingSubHeading')
        {
             var photoMappingSubHeading = counterNumber+'[photoMappingSubHeading_max_characters]';
             $('small[name="'+photoMappingSubHeading+'"]').html(50 - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'description')
        {
            var description_max_characters = counterNumber+'[description_max_characters]';
            $('small[name="'+description_max_characters+'"]').html(descriptionMaxLength - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'afterDescription')
        {
            var after_description_max_characters = counterNumber+'[after_description_max_characters]';
            $('small[name="'+after_description_max_characters+'"]').html(200 - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'threadDesc')
        {
            var thread_description_max_characters = counterNumber+'[thread_description_max_characters]';
            $('small[name="'+thread_description_max_characters+'"]').html(descriptionMaxLength - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'slug')
        {
            $('small[name="slug_max_characters"]').html(slugMaxLength - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'boxHeading')
        {
            $('small[name="box_heading_max_characters"]').html(15 - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'beforeHeading')
        {
            $('small[name="before_heading_max_characters"]').html(15 - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'afterHeading')
        {
            $('small[name="after_heading_max_characters"]').html(15 - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'reporterName')
        {
            $('small[name="reporter_name_max_characters"]').html(50 - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'reporterCity')
        {
            $('small[name="reporter_city_max_characters"]').html(30 - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'stockName')
        {
            var stock_name_max_characters = counterNumber+'[stock_name_max_characters]';
            //console.log('inisde stockName ::: '+(100 - parseInt(txtIdValueLen)));
            $('small[name="'+stock_name_max_characters+'"]').html((100 - parseInt(txtIdValueLen))+' Characters Remaining');
        }
        else if(mode == 'stockPrice')
        {
            var stock_price_max_characters = counterNumber+'[stock_price_max_characters]';
            //console.log('inisde stockPrice ::: '+100 - txtIdValueLen);
            $('small[name="'+stock_price_max_characters+'"]').html((30 - parseInt(txtIdValueLen))+' Characters Remaining');
        }
        else if(mode == 'stockVariation')
        {
            var stock_variation_max_characters = counterNumber+'[stock_variation_max_characters]';
            //console.log('inisde stockPrice ::: '+100 - txtIdValueLen);
            $('small[name="'+stock_variation_max_characters+'"]').html((30 - parseInt(txtIdValueLen))+' Characters Remaining');
        }
        else if(mode == 'wonLossBy')
        {
            var wonLossBy_max_characters = counterNumber+'[wonLossBy_max_characters]';
            //console.log('inisde stockPrice ::: '+100 - txtIdValueLen);
            $('small[name="'+wonLossBy_max_characters+'"]').html((30 - parseInt(txtIdValueLen))+' Characters Remaining');
        }
        else if(mode == 'courtesyLine')
        {
            $('small[name="courtesy_line_max_characters"]').html(50 - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'contactNo')
        {
            $('small[name="contact_number_max_characters"]').html(15 - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'location')
        {
            $('small[name="location_max_characters"]').html(150 - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'website')
        {
            $('small[name="website_max_characters"]').html(150 - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'fullName')
        {
            $('small[name="full_name_max_characters"]').html(70 - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'address')
        {
            $('small[name="address_max_characters"]').html(150 - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'designation')
        {
            $('small[name="designation_max_characters"]').html(30 - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'photoCrediterName')
        {
            $('small[name="photo_crediter_name_max_characters"]').html(30 - txtIdValueLen+' Characters Remaining');
        }
        else if(mode == 'stokeUpName')
        {
            var stoke_up_name_max_characters = counterNumber+'[stoke_up_name_max_characters]';
            //console.log('inisde stockName ::: '+(100 - parseInt(txtIdValueLen)));
            $('small[name="'+stoke_up_name_max_characters+'"]').html((30 - parseInt(txtIdValueLen))+' Characters Remaining');
        }
        else if(mode == 'stokeUpPrice')
        {
            var stoke_up_price_max_characters = counterNumber+'[stoke_up_price_max_characters]';
            //console.log('inisde stockPrice ::: '+100 - txtIdValueLen);
            $('small[name="'+stoke_up_price_max_characters+'"]').html((30 - parseInt(txtIdValueLen))+' Characters Remaining');
        }
        else if(mode == 'stokeUpVariation')
        {
            var stoke_up_variation_max_characters = counterNumber+'[stoke_up_variation_max_characters]';
            //console.log('inisde stockPrice ::: '+100 - txtIdValueLen);
            $('small[name="'+stoke_up_variation_max_characters+'"]').html((30 - parseInt(txtIdValueLen))+' Characters Remaining');
        }
        else if(mode == 'stokeUpdate')
        {
            var stoke_update_max_characters = counterNumber+'[stoke_update_max_characters]';
            //console.log('inisde stockPrice ::: '+100 - txtIdValueLen);
            $('small[name="'+stoke_update_max_characters+'"]').html((30 - parseInt(txtIdValueLen))+' Characters Remaining');
        }
        else if(mode == 'weekendSlug')
        {
            var weekend_slug_max_characters = counterNumber+'[weekend_slug_max_characters]';
            //console.log('inisde stockName ::: '+(100 - parseInt(txtIdValueLen)));
            $('small[name="'+weekend_slug_max_characters+'"]').html((15 - parseInt(txtIdValueLen))+' Characters Remaining');
        }
        else if(mode == 'weekendHeadlines')
        {
            var weekend_headlines_max_characters = counterNumber+'[weekend_headlines_max_characters]';
            //console.log('inisde stockPrice ::: '+100 - txtIdValueLen);
            $('small[name="'+weekend_headlines_max_characters+'"]').html((100 - parseInt(txtIdValueLen))+' Characters Remaining');
        }
        else if(mode == 'weekendReporterName')
        {
            var weekend_reporter_name_max_characters = counterNumber+'[weekend_reporter_name_max_characters]';
            //console.log('inisde stockPrice ::: '+100 - txtIdValueLen);
            $('small[name="'+weekend_reporter_name_max_characters+'"]').html((50 - parseInt(txtIdValueLen))+' Characters Remaining');
        }
        else if(mode == 'weekendReporterCity')
        {
            var weekend_reporter_city_max_characters = counterNumber+'[weekend_reporter_city_max_characters]';
            //console.log('inisde stockPrice ::: '+100 - txtIdValueLen);
            $('small[name="'+weekend_reporter_city_max_characters+'"]').html((30 - parseInt(txtIdValueLen))+' Characters Remaining');
        }
        else if(mode == 'txtBulletHeadlines')
        {
            var txtBulletHeadlines_max_characters = counterNumber+'[txtBulletHeadlines_max_characters]';
            console.log('inisde txtBulletHeadlines_max_characters ::: '+100 - txtIdValueLen);
            $('small[name="'+txtBulletHeadlines_max_characters+'"]').html((100 - parseInt(txtIdValueLen))+' Characters Remaining');
        }
        else if(mode == 'txtBulletDescription')
        {
            var txtBulletDescription_max_characters = counterNumber+'[txtBulletDescription_max_characters]';
            console.log('inisde txtBulletDescription_max_characters ::: '+200 - txtIdValueLen);
            $('small[name="'+txtBulletDescription_max_characters+'"]').html((200 - parseInt(txtIdValueLen))+' Characters Remaining');
        }
        else if(mode == 'question')
        {
            var question_max_characters = counterNumber+'[question_max_characters]';
            //console.log('inisde stockPrice ::: '+100 - txtIdValueLen);
            $('small[name="'+question_max_characters+'"]').html((100 - parseInt(txtIdValueLen))+' Characters Remaining');
        }
        else if(mode == 'answer')
        {
            var answer_max_characters = counterNumber+'[answer_max_characters]';
            //console.log('inisde stockPrice ::: '+100 - txtIdValueLen);
            $('small[name="'+answer_max_characters+'"]').html((100 - parseInt(txtIdValueLen))+' Characters Remaining');
        }
        else if(mode == 'pollYear')
        {
            var pollYear_max_characters = counterNumber+'[pollYear_max_characters]';
            //console.log('inisde stockPrice ::: '+100 - txtIdValueLen);
            $('small[name="'+pollYear_max_characters+'"]').html((30 - parseInt(txtIdValueLen))+' Characters Remaining');
        }
        else if(mode == 'consistency')
        {
            var consistency_max_characters = counterNumber+'[consistency_max_characters]';
            //console.log('inisde stockPrice ::: '+100 - txtIdValueLen);
            $('small[name="'+consistency_max_characters+'"]').html((30 - parseInt(txtIdValueLen))+' Characters Remaining');
        }
        else if(mode == 'wonlose')
        {
            var wonlose_max_characters = counterNumber+'[wonlose_max_characters]';
            //console.log('inisde stockPrice ::: '+100 - txtIdValueLen);
            $('small[name="'+wonlose_max_characters+'"]').html((30 - parseInt(txtIdValueLen))+' Characters Remaining');
        }
        else if(mode == 'companyYear')
        {
            var companyYear_max_characters = counterNumber+'[companyYear_max_characters]';
            //console.log('inisde stockPrice ::: '+100 - txtIdValueLen);
            $('small[name="'+companyYear_max_characters+'"]').html((30 - parseInt(txtIdValueLen))+' Characters Remaining');
        }
        else if(mode == 'profitLossOfData')
        {
            var profitLossOfData_max_characters = counterNumber+'[profitLossOfData_max_characters]';
            //console.log('inisde stockPrice ::: '+100 - txtIdValueLen);
            $('small[name="'+profitLossOfData_max_characters+'"]').html((30 - parseInt(txtIdValueLen))+' Characters Remaining');
        }
    }

function updateAddButtonName(action)
{
    var storyTypeList = $('input[name="storyTypeList"]:checked').val();
    if(action == 'photo_mapping')
    {
        var countForPhotoMapping = $('label[name*=photoMappingHeadingLabelId]').length;
        for(var i =0; i < parseInt(countForPhotoMapping); i++)
        {
            var pointerCount = i + 1;
            if(pointerCount > 1)
            {
                $('button[name="group-i['+i+'][photoMappingDeleteId]"]').show();
            }
            else
            {
                $('button[name="group-i['+i+'][photoMappingDeleteId]"]').hide();
                
            }
            var photoMappingHeadingColor = $('select[name="group-i['+i+'][photoMappingHeadingColor]"]').val();
            
            if(photoMappingHeadingColor == null)
            {
                $('select[name="group-i['+i+'][photoMappingHeadingColor]"]').val('#ab0113');
            }
            
            var photoMappingSubHeadingColor = $('select[name="group-i['+i+'][photoMappingSubHeadingColor]"]').val();
            
            if(photoMappingSubHeadingColor == null)
            {
                $('select[name="group-i['+i+'][photoMappingSubHeadingColor]"]').val('#ab0113');
            }
            $('label[name="group-i['+i+'][photoMappingHeadingLabelId]"]').html('Heading '+pointerCount);
            $('small[name="group-i['+i+'][photoMappingHeading_max_characters]"]').html('Max 30 Characters');
            $('input[name="group-i['+i+'][photoMappingHeading]"]').attr('maxlength','30');
            
            $('label[name="group-i['+i+'][photoMappingSubHeadingLabelId]"]').html('Sub Heading '+pointerCount);
            $('small[name="group-i['+i+'][photoMappingSubHeading_max_characters]"]').html('Max 50 Characters');
            $('input[name="group-i['+i+'][photoMappingSubHeading]"]').attr('maxlength','50');
            
            $('label[name="group-i['+i+'][photoMappingHeadingColorLabelId]"]').html('Select Heading Font Color '+pointerCount);
            $('label[name="group-i['+i+'][photoMappingSubHeadingColorLabelId]"]').html('Select Sub Heading Font Color  '+pointerCount);
            
            $('label[name="group-i['+i+'][photoMappingHeadingAsixLabelId]"]').html('Heading Image Axis '+pointerCount);
            $('label[name="group-i['+i+'][photoMappingSubHeadingAxisLabelId]"]').html('Sub Heading Image Axis '+pointerCount);
            countChar('','photoMappingHeading','group-i['+i+'][photoMappingHeading]');
            countChar('','photoMappingSubHeading','group-i['+i+'][photoMappingSubHeading]');
        }
    }
    else if(action == 'story')
    {
        var countForEvent = $('input[name*=threadTimepicker]').length;
        var countForTitle = $('input[name*=title]').length;
        var countForDescription = $('textarea[name*=description]').length;
       // console.log('storyTypeList :::: '+storyTypeList);
        if(storyTypeList == 'top_news' || storyTypeList == 'poll_performance' 
            || storyTypeList == 'company_headlines' || storyTypeList == 'justin' 
            || storyTypeList == 'heading_with_two_photo' || storyTypeList == 'before_and_after' || storyTypeList == 'bullets' 
            || storyTypeList == 'stokes_scroll' || storyTypeList == 'big_box' || storyTypeList == 'heading_with_four_photo' 
            || storyTypeList == 'photo_mapping' || storyTypeList == 'insider')
        {
            //alert(countForDescription);
            for(var i =0; i < parseInt(countForDescription); i++)
            {
                var pointerCount = i + 1;
                if(storyTypeList == 'justin')
                    var finalLabel = 'Headline '+pointerCount;
                else if(storyTypeList == 'before_and_after')
                    var finalLabel = 'Before Pointer '+pointerCount;
                else
                    var finalLabel = 'Pointer '+pointerCount;

                if(pointerCount > 1)
                {
                    $('button[name="group-a['+i+'][deleteDescriptionButton]"]').show();
                }
                else
                {
                    $('button[name="group-a['+i+'][deleteDescriptionButton]"]').hide();
                }
                    //alert('finalLabel :::: '+finalLabel);
                $('label[name="group-a['+i+'][assignLabelDynamically]"]').html(finalLabel);
                $('small[name="group-a['+i+'][description_max_characters]"]').html('Max 200 Characters');
                $('textarea[name="group-a['+i+'][description]"]').attr('maxlength','200');

                countChar('','description','group-a['+i+'][description]');
            }
        }
        else if(storyTypeList == 'news_update')
        {
            for(var i =0; i < parseInt(countForDescription); i++)
            {
                var pointerCount = i + 1;
                if(pointerCount > 1)
                {
                    $('button[name="group-a['+i+'][deleteDescriptionButton]"]').show();
                }
                else
                {
                    $('button[name="group-a['+i+'][deleteDescriptionButton]"]').hide();
                }
                var finalLabel = 'Pointer '+pointerCount;

                //alert('finalLabel :::: '+finalLabel);
                $('label[name="group-a['+i+'][assignLabelDynamically]"]').html(finalLabel);
                $('small[name="group-a['+i+'][description_max_characters]"]').html('Max 600 Characters');
                $('textarea[name="group-a['+i+'][description]"]').attr('maxlength','600');

                countChar('','description','group-a['+i+'][description]');
            }
        }
        else if(storyTypeList == 'photo_album' || storyTypeList == 'story_album')
        {
            $('div[name*="selectTitleFontColorDivId"]').show();
            for(var i =0; i < parseInt(countForTitle); i++)
            {
                var selectTitleFontColor = $('select[name="group-a['+i+'][selectTitleFontColor]"]').val();
            
                if(selectTitleFontColor == null)
                {
                    $('select[name="group-a['+i+'][selectTitleFontColor]"]').val('#000000');
                }
            
                var pointerCount = i + 1;
                $('label[name="group-a['+i+'][titleLabelName]"]').html('Photoline '+pointerCount);
                $('input[name="group-a['+i+'][title]"]').attr('maxlength','100');
                $('small[name="group-a['+i+'][title_max_characters]"]').html('Max 100 Characters');
                $('label[name="group-a['+i+'][coverImageLabelName]"]').html('Cover Image '+pointerCount);
                countChar('','title','group-a['+i+'][title]');
            }
        }
        else if(storyTypeList == 'thread')
        {
            for(var i =0; i < parseInt(countForEvent); i++)
            {
                var pointerCount = i + 1;
                $('label[name="group-a['+i+'][eventLabelName]"]').html('Event '+pointerCount);
                $('label[name="group-a['+i+'][eventDescriptionLabelName]"]').html('News Matter '+pointerCount);

                $('small[name="group-a['+i+'][thread_description_max_characters]"]').html('Max 200 Characters');
                $('textarea[name="group-a['+i+'][threadDescription]"]').attr('maxlength','200');

                countChar('','threadDesc','group-a['+i+'][threadDescription]');
            }
        }
    }
    else if(action == 'bullets_pointer')
    {
        var counterBulletHeadlines = $('input[name*=txtBulletHeadlines]').length;
        
        //console.log('counterBulletHeadlines :::: '+counterBulletHeadlines);
        //console.log('headlinesPointerCounter :::: '+headlinesPointerCounter);

        for(var i =0; i < parseInt(counterBulletHeadlines); i++)
        {
            for(var j =0; j < parseInt(headlinesPointerCounter); j++)
            {
                var pointerCount = j + 1;
                $('label[name="group-x[0][group-y]['+i+'][group-z]['+j+'][optionLabel]"]').html('Pointer '+pointerCount);
                
                $('small[name="group-x[0][group-y]['+i+'][group-z]['+j+'][txtBulletDescription_max_characters]"]').html('Max 200 Characters');
                
                $('input[name="group-x[0][group-y]['+i+'][group-z]['+j+'][txtBulletDescription]"]').attr('maxlength','200');

                //countChar('','txtBulletDescription','group-x[0][group-y]['+i+'][group-z]['+j+'][txtBulletDescription]');
            }
        }
    }
    else if(action == 'bullets_heading')
    {
        var txtBulletHeadlines = $('input[name*=txtBulletHeadlines]').length;
        //alert('txtBulletHeadlines :::: '+txtBulletHeadlines);
        for(var i =0; i < parseInt(txtBulletHeadlines); i++)
        {
            var pointerCount = i + 1;
            var j = i + 0;
            //console.log('j ::: '+j);
            $('label[name="group-x[0][group-y]['+i+'][bulletHeadlinesLabel]').html('Pointer Headlines '+pointerCount);
            
            $('small[name="group-x[0][group-y]['+i+'][txtBulletHeadlines_max_characters]"]').html('Max 100 Characters');
            
            $('input[name="group-x[0][group-y]['+i+'][txtBulletHeadlines]"]').attr('maxlength','100');

            countChar('','txtBulletHeadlines','group-x[0][group-y]['+i+'][txtBulletHeadlines]');
        }
    }
    else if(action == 'stock_form')
    {
        var countForStockName = $('input[name*=stockName]').length;
        //alert('countForStockName :::: '+countForStockName);
        for(var i =0; i < parseInt(countForStockName); i++)
        {
            var pointerCount = i + 1;
           // alert(pointerCount);
            if(pointerCount > 1)
            {
                $('button[name="group-a['+i+'][deleteStockFormButton]"]').show();
            }
            else
            {
                $('button[name="group-a['+i+'][deleteStockFormButton]"]').hide();
            }
            $('label[name="group-a['+i+'][stockNameLabel]"]').html('Stock Name '+pointerCount);
            $('label[name="group-a['+i+'][stockPriceLabelName]"]').html('Stock Price '+pointerCount);
            $('label[name="group-a['+i+'][stockVariationLabelName]"]').html('Stock Variation '+pointerCount);
            $('label[name="group-a['+i+'][stockColorLabelName]"]').html('Stock Color '+pointerCount);

            $('small[name="group-a['+i+'][stock_name_max_characters]"]').html('Max 100 Characters');
            $('small[name="group-a['+i+'][stock_price_max_characters]"]').html('Max 30 Characters');
            $('small[name="group-a['+i+'][stock_variation_max_characters]"]').html('Max 30 Characters');
            
            
            $('input[name="group-a['+i+'][stockName]"]').attr('maxlength','100');
            $('input[name="group-a['+i+'][stockPrice]"]').attr('maxlength','30');
            $('input[name="group-a['+i+'][stockVariation"]').attr('maxlength','30');

            countChar('','stockName','group-a['+i+'][stockName]');
            countChar('','stockPrice','group-a['+i+'][stockPrice]');
            countChar('','stockVariation','group-a['+i+'][stockVariation]');
        }
    }
    else if(action == 'company_headlines')
    {
        var countForcompanyYear = $('input[name*=companyYear]').length;
        //alert('countForStockName :::: '+countForStockName);
        for(var i =0; i < parseInt(countForcompanyYear); i++)
        {
            var pointerCount = i + 1;
           // alert(pointerCount);
            // if(pointerCount > 1)
            // {
            //     $('button[name="group-a['+i+'][deleteStockFormButton]"]').show();
            // }
            // else
            // {
            //     $('button[name="group-a['+i+'][deleteStockFormButton]"]').hide();
            // }
            $('label[name="group-h['+i+'][yearLabelName]"]').html('Year '+pointerCount);
            $('label[name="group-h['+i+'][profitLossTypeLabelName]"]').html('Type '+pointerCount);
            $('label[name="group-h['+i+'][profitLossOfLabelName]"]').html('Profit/Loss of '+pointerCount);

            $('small[name="group-h['+i+'][companyYear_max_characters]"]').html('Max 30 Characters');
            $('small[name="group-h['+i+'][profitLossOfData_max_characters]"]').html('Max 30 Characters');

            $('input[name="group-h['+i+'][companyYear]"]').attr('maxlength','30');
            $('input[name="group-h['+i+'][profitLossOfData"]').attr('maxlength','30');

            countChar('','companyYear','group-h['+i+'][companyYear]');
            countChar('','wonlose','group-h['+i+'][profitLossOfData]');
        }
    }
    else if(action == 'poll_performance')
    {
        var countForconsistency = $('input[name*=consistency]').length;
        //alert('countForStockName :::: '+countForStockName);
        for(var i =0; i < parseInt(countForconsistency); i++)
        {
            var pointerCount = i + 1;
           // alert(pointerCount);
            if(pointerCount > 1)
            {
                $('button[name="group-a['+i+'][deleteStockFormButton]"]').show();
            }
            else
            {
                $('button[name="group-a['+i+'][deleteStockFormButton]"]').hide();
            }
            $('label[name="group-g['+i+'][consistencyLabelName]"]').html('Consistency '+pointerCount);
            $('label[name="group-g['+i+'][pollYearLabelName]"]').html('Year '+pointerCount);
            $('label[name="group-g['+i+'][pollTypeLabelName]"]').html('Type '+pointerCount);
            $('label[name="group-g['+i+'][wonloseByLabelName]"]').html('Won/Lose by '+pointerCount);
            
            $('small[name="group-g['+i+'][consistency_max_characters]"]').html('Max 30 Characters');
            $('small[name="group-g['+i+'][pollYear_max_characters]"]').html('Max 30 Characters');
            $('small[name="group-g['+i+'][wonlose_max_characters]"]').html('Max 30 Characters');

            $('input[name="group-g['+i+'][pollYear]"]').attr('maxlength','30');
            $('input[name="group-g['+i+'][consistency]"]').attr('maxlength','30');
            $('input[name="group-g['+i+'][wonlose"]').attr('maxlength','30');

            countChar('','pollYear','group-g['+i+'][pollYear]');
            countChar('','consistency','group-g['+i+'][consistency]');
            countChar('','wonlose','group-g['+i+'][wonlose]');
        }
    }
    else if(action == 'stoke_up_form')
    {
        var countForStokeUpName = $('input[name*=stokeUpName]').length;
        for(var i =0; i < parseInt(countForStokeUpName); i++)
        {
            var pointerCount = i + 1;
           // alert(pointerCount);
            if(pointerCount > 1)
            {
                $('button[name="group-a['+i+'][deleteStokeUpFormButton]"]').show();
            }
            else
            {
                $('button[name="group-a['+i+'][deleteStokeUpFormButton]"]').hide();
            }
            //alert('storyTypeList :::: '+storyTypeList);
               // alert('else');
            $('label[name="group-a['+i+'][stokeUpNameLabel]"]').html('Stock Name '+pointerCount);
            $('label[name="group-a['+i+'][stokeUpPriceLabelName]"]').html('Stock Price '+pointerCount);
            $('label[name="group-a['+i+'][stokeUpVariationLabelName]"]').html('Stock Variation '+pointerCount);
            $('label[name="group-a['+i+'][stokeUpVariationTypeLabelName]"]').html('Stock Update '+pointerCount);
            
            $('small[name="group-a['+i+'][stoke_up_name_max_characters]"]').html('Max 30 Characters');
            $('small[name="group-a['+i+'][stoke_up_price_max_characters]"]').html('Max 30 Characters');
            $('small[name="group-a['+i+'][stoke_up_variation_max_characters]"]').html('Max 30 Characters');
            $('small[name="group-a['+i+'][stoke_update_max_characters]"]').html('Max 30 Characters');
            
            $('input[name="group-a['+i+'][stokeUpName]"]').attr('maxlength','30');
            $('input[name="group-a['+i+'][stokeUpPrice]"]').attr('maxlength','30');
            $('input[name="group-a['+i+'][stokeUpVariation"]').attr('maxlength','30');
            $('input[name="group-a['+i+'][stokeUpdate"]').attr('maxlength','30');

            countChar('','stokeUpName','group-a['+i+'][stokeUpName]');
            countChar('','stokeUpPrice','group-a['+i+'][stokeUpPrice]');
            countChar('','stokeUpVariation','group-a['+i+'][stokeUpVariation]');
            countChar('','stokeUpdate','group-a['+i+'][stokeUpdate]');
        }
    }
    else if(action == 'weekend_form')
    {
        var countForWeekendSlug = $('input[name*=weekendSlug]').length;
        //alert('countForStockName :::: '+countForStockName);
        for(var i =0; i < parseInt(countForWeekendSlug); i++)
        {
            var pointerCount = i + 1;
           // alert(pointerCount);
            if(pointerCount > 1)
            {
                $('button[name="group-b['+i+'][deleteWeekendFormButton]"]').show();
            }
            else
            {
                $('button[name="group-b['+i+'][deleteWeekendFormButton]"]').hide();
            }
            
            $('label[name="group-b['+i+'][weekendSlugLabel]"]').html('Slug '+pointerCount);
            $('label[name="group-b['+i+'][weekendHeadlinesLabel]"]').html('Headlines '+pointerCount);
            $('label[name="group-b['+i+'][weekendReporterLabelName]"]').html('Reporter Name '+pointerCount);
            $('label[name="group-b['+i+'][weekendReporterCityLabelName]"]').html('Reporter City '+pointerCount);
            $('label[name="group-b['+i+'][weekendPositionLabelName]"]').html('Position '+pointerCount);
            $('label[name="group-b['+i+'][weekendAlignmentLabelName]"]').html('Alignment '+pointerCount);
            $('label[name="group-b['+i+'][weekendSelectImageTypeImageLabelName]"]').html('Select Image Type '+pointerCount);
            
            $('small[name="group-b['+i+'][weekend_slug_max_characters]"]').html('Max 15 Characters');
            $('small[name="group-b['+i+'][weekend_headlines_max_characters]"]').html('Max 100 Characters');
            $('small[name="group-b['+i+'][weekend_reporter_name_max_characters]"]').html('Max 50 Characters');
            $('small[name="group-b['+i+'][weekend_reporter_city_max_characters]"]').html('Max 30 Characters');
            
            $('input[name="group-b['+i+'][weekendSlug]"]').attr('maxlength','15');
            $('input[name="group-b['+i+'][weekendHeadlines]"]').attr('maxlength','100');
            $('input[name="group-b['+i+'][weekendReporterName"]').attr('maxlength','50');
            $('input[name="group-b['+i+'][weekendReporterCity"]').attr('maxlength','30');
             
            countChar('','weekendSlug','group-b['+i+'][weekendSlug]');
            countChar('','weekendHeadlines','group-b['+i+'][weekendHeadlines]');
            countChar('','weekendReporterName','group-b['+i+'][weekendReporterName]');
            countChar('','weekendReporterCity','group-b['+i+'][weekendReporterCity]');
        }
    }
    else if(action == 'after_pointer')
    {
        var countForDescription = $('textarea[name*=afterDescription]').length;
        //alert('countForStockName :::: '+countForStockName);
        for(var i =0; i < parseInt(countForDescription); i++)
        {
            var pointerCount = i + 1;
            var finalLabel = 'After Pointer '+pointerCount;
            
            //alert('finalLabel :::: '+finalLabel);
            $('label[name="group-f['+i+'][afterDescriptionLabel]"]').html(finalLabel);
            $('small[name="group-f['+i+'][after_description_max_characters]"]').html('Max 200 Characters');
            $('textarea[name="group-f['+i+'][afterDescription]"]').attr('maxlength','200');

            countChar('','afterDescription','group-f['+i+'][afterDescription]');
        }
    }
}
function submitForm()
{
    var isValid = checkValidationManually();
    //alert(isValid);
    
    if(isValid)
    {
        stopTimer();
        
        var hour = $("#hour").text();
        var min = $("#min").text();
        var sec = $("#sec").text();
        //var milisec = $("#milisec").text();
        
        $("#hdnTotalTimeTaken").val(hour+':'+min+':'+sec);
        $("#pageloader").fadeIn();
        $("#justin_timeline_justin_form").submit();
    }
}


function setFormJSON(setStatus)
{
    $("#hdnJustinStatus").val(setStatus);
    $('#timepicker').prop('disabled', false);
    $('#just_date').prop('disabled', false);
    submitForm();
}
function getEmojiText()
{
    var txtEmojiVal = $('#txtEmoji').val();
    var txtEmoji = $('#txtEmoji').find('option:selected').text();
    
   // alert(txtEmojiVal+' txtEmojiVal '+' txtEmoji ::: '+txtEmoji);
    
    if(txtEmojiVal != '' && txtEmojiVal != undefined)
    {
       // var splitValue = txtEmoji.split('#');
       // var finalValue = splitValue[1].replace(/;/g, "");

       // alert('finalValue :::: '+finalValue);
        $("#hdnTxtEmojiHtmlCode").val(txtEmojiVal);
    }
}
    
function enabledDisableDateTime(mode)
{   
    if(mode == 'enable')
    {
        $('#changeDateTimeEnable').hide();
        $('#changeDateTimeDisable').show();
        
        $('#timepicker').prop('disabled', false);
        $('#just_date').prop('disabled', false);
        
        $("#timepicker").attr("readonly", false); 
        $("#just_date").attr("readonly", false); 
    }
    else
    {
        $('#changeDateTimeEnable').show();
        $('#changeDateTimeDisable').hide();
        
        $('#timepicker').prop('disabled', true);
        $('#just_date').prop('disabled', true);
        
        $("#timepicker").attr("readonly", true); 
        $("#just_date").attr("readonly", true); 
    }
}
function cancelCropImage()
{
    var storyTypeList = $('input[name="storyTypeList"]:checked').val();
    if((storyTypeList == 'heading_with_two_photo' || storyTypeList == 'before_and_after') && isCreditLogoCall == 1)
    {
        $('img[name="creditFilePreviewImgId"]').attr("src", '');
        $('img[name="creditFilePreviewImgId"]').hide();
        $('div[name="creditFilePreviewDivId"]').hide();
                        
        $("#hdnIsCreditLogoAdded").val(0);
        isCreditLogoCall = 0;
        
        $('#creditLogoImageNameSpan').text('');
        $('#creditLogoImageNameLabel').hide();
        $('#creditLogoImageSizeSpan').text('');
        $('#creditLogoImageSizeLabel').hide();
        $('#credit_logo').val('');
        $('#cropped_credit_logo').val('');
        $('#hdnSelectedFileNameForCreditLogo').val('');
        $('#hdnSelectedFileTypeForCreditLogo').val('');

        $("#dummySecondPhotoLiId img").attr("src", '../../../assets/images/Modi-16-1.jpg');
        $("#dummyAfterPhotoLiId img").attr("src", '../../../assets/images/Modi-16-1.jpg');
        
    }
    else if(storyTypeList == 'story_album' || storyTypeList == 'photo_album')
    {
        var countForSpanImages = $('input[name*="image_file"]').length;
        var hdnMultipleImagesCurrentInput = $("#hdnMultipleImagesCurrentInput").val();
        var counterNumber = hdnMultipleImagesCurrentInput.substring(0, 10);

        var tempCounterNumber = hdnMultipleImagesCurrentInput.substring(0, 10);

        var croppedCoverPhotoHiddenName = counterNumber+'[cropped_cover_photo]';
        var croppedCoverPhoto = counterNumber+'[image_file]';
        var hdnSelectedFileName = counterNumber+'[hdnSelectedFileName]';
        var hdnSelectedFileType = counterNumber+'[hdnSelectedFileType]';
        
        var imageFilePreviewImgId = counterNumber+'[imageFilePreviewImgId]';
        var imageFilePreviewDivId = counterNumber+'[imageFilePreviewDivId]';
        var imageFilePreviewVideoId = counterNumber+'[imageFilePreviewVideoId]';
        
        $('input[name="'+croppedCoverPhotoHiddenName+'"]').val('');
        $('input[name="'+croppedCoverPhoto+'"]').val('');
        
        $('input[name="'+hdnSelectedFileName+'"]').val('');
        $('input[name="'+hdnSelectedFileType+'"]').val('');
        
        $('img[name="'+imageFilePreviewImgId+'"]').attr("src", '');
        $('img[name="'+imageFilePreviewImgId+'"]').hide();
        $('div[name="'+imageFilePreviewDivId+'"]').hide();
        $('video[name="'+imageFilePreviewVideoId+'"] source').attr("src", '');
        $('video[name="'+imageFilePreviewVideoId+'"]').hide();
        
        var imageNameLabel = counterNumber+'[imageNameLabel]';
        var imageNameSpan = counterNumber+'[imageNameSpan]';
        var imageSizeLabel = counterNumber+'[imageSizeLabel]';
        var imageSizeSpan = counterNumber+'[imageSizeSpan]';
        
        $('label[name="'+imageNameLabel+'"]').text('Image name : ');
        $('span[name="'+imageNameSpan+'"]').text('');
        $('label[name="'+imageNameLabel+'"]').hide();
        
        $('label[name="'+imageSizeLabel+'"]').text('Image Size : ');
        $('span[name="'+imageSizeSpan+'"]').text('');
        $('label[name="'+imageSizeLabel+'"]').hide();
        if(countForSpanImages == 1)
        {
            $("#userMultipleImagesDivId").children().remove();
            $("#userMultipleImagesDivId").html(multiplePhotoAlbumDummyHtml);
            $("#StoryAlbumMultipleImagesDivId").children().remove();
            $("#StoryAlbumMultipleImagesDivId").html(multiplePhotoAlbumDummyHtml);
        }
        else
        {
            setPhotoAlbumPreview();
        }
    }
    else if(storyTypeList == 'heading_with_four_photo')
    {
        var countForSpanImages = $('input[name*="four_images_file"]').length;
        var hdnMultipleImagesCurrentInput = $("#hdnMultipleImagesCurrentInput").val();
        var counterNumber = hdnMultipleImagesCurrentInput.substring(0, 10);

        var tempCounterNumber = hdnMultipleImagesCurrentInput.substring(0, 10);

        var croppedCoverPhotoHiddenName = counterNumber+'[four_images_file]';
        var croppedCoverPhoto = counterNumber+'[four_images_cropped_cover_photo]';
        
        $('input[name="'+croppedCoverPhotoHiddenName+'"]').val('');
        $('input[name="'+croppedCoverPhoto+'"]').val('');
        
        var fourImageNameLabel = counterNumber+'[fourImageNameLabel]';
        var fourImageNameSpan = counterNumber+'[fourImageNameSpan]';
        var fourImageSizeLabel = counterNumber+'[fourImageSizeLabel]';
        var fourImageSizeSpan = counterNumber+'[fourImageSizeSpan]';
        
        $('label[name="'+fourImageNameLabel+'"]').text('Image name : ');
        $('span[name="'+fourImageNameSpan+'"]').text('');
        $('label[name="'+fourImageNameLabel+'"]').hide();
        $('label[name="'+fourImageSizeLabel+'"]').text('Image Size : ');
        $('span[name="'+fourImageSizeSpan+'"]').text('');
        $('label[name="'+fourImageSizeLabel+'"]').hide();

        var imageNameArray = ['First', 'Second', 'Third','Fourth'];
        var defaultImageNameArray = ['amitshah.jpg', 'Modi-16-1.jpg', 'rupani.jpg','Gautam_Adani.jpg'];
        for(var k =0; k < 4; k++)
        {
            var imageValue = $('input[name="group-e['+k+'][four_images_cropped_cover_photo]"]').val();
            
            if(imageValue != '')
            {
                if (imageValue.indexOf(';base64,') > -1)
                {
                    $("#dummyFourPhoto"+imageNameArray[k]+"PhotoLiId img").attr("src", imageValue);
                    $('img[name="group-e['+k+'][fourImageFilePreviewImgId]"]').attr("src", imageValue);
                    $('img[name="group-e['+k+'][fourImageFilePreviewImgId]"]').show();
                    $('div[name="group-e['+k+'][fourImageFilePreviewDivId]"]').show();
                }
                else
                {
                    var fullPath = '../../../images/just_in_timeline/'+imageValue;
                    if(isImage(imageValue))
                    {
                        $("#dummyFourPhoto"+imageNameArray[k]+"PhotoLiId img").attr("src", fullPath);
                        $('img[name="group-e['+k+'][fourImageFilePreviewImgId]"]').attr("src", fullPath);
                        $('img[name="group-e['+k+'][fourImageFilePreviewImgId]"]').show();
                        $('div[name="group-e['+k+'][fourImageFilePreviewDivId]"]').show();
                    }
                }
            }
            else
            {
                $('img[name="group-e['+k+'][fourImageFilePreviewImgId]"]').attr("src", '');
                $('img[name="group-e['+k+'][fourImageFilePreviewImgId]"]').hide();
                $('div[name="group-e['+k+'][fourImageFilePreviewDivId]"]').hide();
                        
                var defaultFullPath = '../../../assets/images';
                $("#dummyFourPhoto"+imageNameArray[k]+"PhotoLiId img").attr("src", defaultFullPath+'/'+defaultImageNameArray[k]);
            }
        }
    }
    else if(storyTypeList == 'weekend')
    {
        var countForSpanImages = $('input[name*="four_images_file"]').length;
        var hdnMultipleImagesCurrentInput = $("#hdnMultipleImagesCurrentInput").val();
        var counterNumber = hdnMultipleImagesCurrentInput.substring(0, 10);

        var tempCounterNumber = hdnMultipleImagesCurrentInput.substring(0, 10);

        var croppedCoverPhotoHiddenName = counterNumber+'[weekend_image_file]';
        var croppedCoverPhoto = counterNumber+'[weekend_cropped_cover_photo]';
        $('input[name="'+croppedCoverPhotoHiddenName+'"]').val('');
        $('input[name="'+croppedCoverPhoto+'"]').val('');
        
        var weekendImageNameLabel = counterNumber+'[weekendImageNameLabel]';
        var weekendImageNameSpan = counterNumber+'[weekendImageNameSpan]';
        var weekendImageSizeLabel = counterNumber+'[weekendImageSizeLabel]';
        var weekendImageSizeSpan = counterNumber+'[weekendImageSizeSpan]';
        
        $('label[name="'+weekendImageNameLabel+'"]').text('Image name : ');
        $('span[name="'+weekendImageNameSpan+'"]').text('');
        $('label[name="'+weekendImageNameLabel+'"]').hide();
        $('label[name="'+weekendImageSizeLabel+'"]').text('Image Size : ');
        $('span[name="'+weekendImageSizeSpan+'"]').text('');
        $('label[name="'+weekendImageSizeLabel+'"]').hide();
        previewFunction();
    }
    else
    {
        $("#hdnIsImageOrVideoAdded").val(0);
        
        switch(storyTypeList)
        {
            case 'top_news':
                
                $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", '');
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').hide();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                
                $("#topNewsImageId").attr("src", '');
                console.log('inside top news');
                $("#userDetailVideoId source").attr("src", '');
                $("#dummyDetailImageOrVideo").show();
                $("#userDetailImageOrVideo").hide();
                $("#userDetailVideoId").hide();
            break;
            case 'insider':
                
                $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", '');
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').hide();
                
                $("#insiderImageId").attr("src", '');
                console.log('inside top news');
                $("#dummyInsiderImage").show();
                $("#userInsiderImage").hide();
            break;
            case 'photo_mapping':
                
                $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", '');
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').hide();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                
                $("#photoMappingImageId").attr('src','../../../assets/images/modi.png')
            break;
            
            case 'poll_performance':
                $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", '');
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').hide();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                
                $("#topNewsImageId").attr("src", '');
                console.log('inside top news');
                $("#userDetailVideoId source").attr("src", '');
                $("#dummyDetailImageOrVideo").show();
                $("#userDetailImageOrVideo").hide();
                $("#userDetailVideoId").hide();
            break;
            case 'company_headlines':
                $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", '');
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').hide();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                $("#topNewsImageId").attr("src", '');
                console.log('inside top news');
                $("#userDetailVideoId source").attr("src", '');
                $("#dummyDetailImageOrVideo").show();
                $("#userDetailImageOrVideo").hide();
                $("#userDetailVideoId").hide();
            break;
            case 'photo_header_photoline':
                $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", '');
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').hide();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                
                $("#photoHeaderPhotolineImageId").attr("src", '');
                $("#dummyPhotoHeaderPhotolineImage").show();
                $("#userPhotoHeaderPhotolineImage").hide();
            break;
            case 'photo_photoline':
                $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", '');
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').hide();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                
                $("#photoPhotolineImageId").attr("src", '');
                $("#dummyPhotoPhotolineImage").show();
                $("#userPhotoPhotolineImage").hide();
            break;
            case 'thread':
                $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", '');
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').hide();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                
                $("#threadImageId").attr("src", '');
                $("#dummyThreadImageOrVideo").show();
                $("#userThreadImageOrVideo").hide();
                $("#userThreadVideoId").hide();
            break;
            case 'text_with_color_dots':
                $("#userTextWithColorDotsImage").attr("src", '');
                $("#dummyTextWithColorDotsImage").show();
                $("#userTextWithColorDotsImage").hide();
            break;
            case 'audio':
                $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", '');
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').hide();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                
                $("#userAudioImageId").attr("src", '');
                $("#dummyAudioImageId").show();
            break;
            case 'video_header_videoline':
                
                $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", '');
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').hide();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                
                $("#userVideoFileVideoId source").attr("src", '');
                $("#userVideoFileVideoId").hide();
                $("#dummyVideoFileVideoId").show();
            break;
            case 'full_screen':
                
                $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", '');
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').hide();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                
                $("#user_full_screen_img_id").attr("src", '');
                $("#user_full_screen_div_id").hide();
                $("#dummy_full_screen_div_id").show();
            break;
            case 'spliter':
                
                $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", '');
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').hide();
                
                $("#user_spliter_img_id").attr("src", '');
                $("#user_spliter_img_div_id").hide;
                $("#dummy_spliter_img_div_id").show();
            break;
            case 'contact_card':
                $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", '');
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').hide();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                
                $("#contactCardImageId").attr("src", '');
                $("#contactCardDummyUserImageOrVideo").hide();
                $("#contactCardDummyDetailImageOrVideo").show();
            break;
            case 'heading_with_two_photo':
                $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", '');
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').hide();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                
                $("#dummyFirstPhotoLiId img").attr("src", '../../../assets/images/Gautam_Adani.jpg');
            break;
            case 'before_and_after':
                $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", '');
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').hide();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                
                $("#dummyBeforePhotoLiId img").attr("src", '../../../assets/images/Gautam_Adani.jpg');
            break;
            case 'big_box':
                
                $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", '');
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').hide();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                
                $("#bigBoxImageId").attr("src", '');
                $("#userBigBoxImage").hide();
                $("#dummyBigBoxImage").show();
            break;
            case 'five_question':
                $('img[name="group-a[0][imageFilePreviewImgId]"]').attr("src", '');
                $('img[name="group-a[0][imageFilePreviewImgId]"]').hide();
                $('div[name="group-a[0][imageFilePreviewDivId]"]').hide();
                $('video[name="group-a[0][imageFilePreviewVideoId]"] source').attr("src", '');
                $('video[name="group-a[0][imageFilePreviewVideoId]"]').hide();
                
                $("#fiveQuestionImageId").attr("src", '');
                $("#userFiveQuestionImage").hide();
                $("#dummyFiveQuestionImage").show();
            break;
        }
        $('input[name="group-a[0][image_file]"]').val('');
        $('input[name="group-a[0][cropped_cover_photo]"]').val('');
        
        $('input[name="group-a[0][hdnSelectedFileName]"]').val('');
        $('input[name="group-a[0][hdnSelectedFileType]"]').val('');
    
        $('span[name*="imageNameSpan"]').text('');
        $('label[name*="imageNameLabel"]').hide();
        
        $('span[name*="imageSizeSpan"]').text('');
        $('label[name*="imageSizeLabel"]').hide();
    }
    
    $modal.modal('hide'); 
}
function checkValidationManually()
{
    var isValid = true;
    var storyTypeList = $('input[name="storyTypeList"]:checked').val();
    var slug = $("#slug").val();
    var titleLength = $('input[name*="title"]').length;
    var imageLength = $('input[name*="image_file"]').length;
    var descriptionLength = $('textarea[name*="description"]').length;
    var threadLength = $('input[name*="threadTimepicker"]').length;
    var hdnIsImageOrVideoAdded = $("#hdnIsImageOrVideoAdded").val();
    var reporterCity = $("#reporterCity").val();
    var reporterName = $("#reporterName").val();
    var justDate = $("#just_date").val();
    
    if(storyTypeList == 'photo_mapping')
    {
        var photoMappingHeadingCount = $("label[name*=photoMappingHeadingLabelId]").length;
        for(var k =0; k < photoMappingHeadingCount; k++)
        {
            var photoMappingHeading = $('input[name="group-i['+k+'][photoMappingHeading]"]').val();
            var photoMappingSubHeading = $('input[name="group-i['+k+'][photoMappingSubHeading]"]').val();
            var photoMappingHeadingX = $('input[name="group-i['+k+'][photoMappingHeadingX]"]').val();
            var photoMappingHeadingY = $('input[name="group-i['+k+'][photoMappingHeadingY]"]').val();
            var photoMappingSubHeadingX = $('input[name="group-i['+k+'][photoMappingSubHeadingX]"]').val();
            var photoMappingSubHeadingY = $('input[name="group-i['+k+'][photoMappingSubHeadingY]"]').val();
            var photoMappingHeadingColor = $('select[name="group-i['+k+'][photoMappingHeadingColor]"]').val();
            var photoMappingSubHeadingColor = $('select[name="group-i['+k+'][photoMappingSubHeadingColor]"]').val();

            if(photoMappingHeading == '')
            {
                $('div[name="group-i['+k+'][errorPhotoMappingHeading]"]').show();
                isValid = false;
            }
            if(photoMappingSubHeading == '')
            {
                $('div[name="group-i['+k+'][errorPhotoMappingSubHeading]"]').show();
                isValid = false;
            }
        }
    }
       
    if(storyTypeList == 'heading_with_four_photo')
    {
        for(var k =0; k < 4; k++)
        {
            var imageValue = $('input[name="group-e['+k+'][four_images_cropped_cover_photo]"]').val();

            if(imageValue == '')
            {
                $('div[name="group-e['+k+'][errorFourImages]"]').show();
                isValid = false;
            }
        }
    }

    if(storyTypeList == 'big_box')
    {
        var boxHeading = $("#boxHeading").val();
        if(boxHeading == '')
        {
            $('#errorBoxHeading').show();
            isValid = false;
        }
    }
    if(storyTypeList == 'five_question')
    {
        var fullName = $("#fullName").val();
        if(fullName == '')
        {
            $("#errorFullName").show();
            isValid = false;
        }
        for(var j =0; j < 5; j++)
        {
            var question = $('input[name="group-d['+j+'][question]"]').val();
            var answer = $('input[name="group-d['+j+'][answer]"]').val();

            if(question == '')
            {
                $('div[name="group-d['+j+'][errorQuestion]"]').show();
                isValid = false;
            }
            if(answer == '')
            {
                $('div[name="group-d['+j+'][errorAnswer]"]').show();
                isValid = false;
            }
        }
    }
    if(storyTypeList == 'bullets')
    {
        var counterBulletHeadlines = $('input[name*=txtBulletHeadlines]').length;

        for(var i =0; i < parseInt(counterBulletHeadlines); i++)
        {
            var txtBulletHeadlines = $('input[name="group-x[0][group-y]['+i+'][txtBulletHeadlines]"]').val();

            if(txtBulletHeadlines == '')
            {
                $('div[name="group-x[0][group-y]['+i+'][errorTxtBulletHeadlines]"]').show();
                isValid = false;
            }
            for(var j =0; j < parseInt(15); j++)
            {
                var txtBulletHeadlinesPointer = $('textarea[name="group-x[0][group-y]['+i+'][group-z]['+j+'][txtBulletDescription]"]').val();
                console.log('txtBulletHeadlinesPointer :::: '+txtBulletHeadlinesPointer);

                if(txtBulletHeadlinesPointer != undefined)
                {
                    if(txtBulletHeadlinesPointer == '')
                    {
                        $('div[name="group-x[0][group-y]['+i+'][group-z]['+j+'][errorTxtBulletDescription]"]').show();
                        isValid = false;
                    }
                }

                if(txtBulletHeadlinesPointer == undefined)
                {
                    break;
                }
            }
        }
    }
    if(storyTypeList == 'weekend')
    {
        if(justDate != '')
        {
            var splitDate = justDate.split("/");
            var tempMonth = splitDate[1];
            var tempDate = splitDate[0];
            var tempYear = splitDate[2];

            var d = new Date(tempMonth+'/'+tempDate+'/'+tempYear);
            var weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

            var dayName = weekday[d.getDay()];
            if(dayName == 'Monday' || dayName == 'Tuesday' || dayName == 'Wednesday' || dayName == 'Thursday' || dayName == 'Friday')
            {
                $('#errorJustDate').show();
                isValid = false;
            }
        }
        var countForWeekendSlug = $('input[name*=weekendSlug]').length;
        for(var i =0; i < parseInt(countForWeekendSlug); i++)
        {
            var weekendSlug = $('input[name="group-b['+i+'][weekendSlug]"]').val();
            var weekendHeadlines = $('input[name="group-b['+i+'][weekendHeadlines]"]').val();
            var weekend_cropped_cover_photo = $('input[name="group-b['+i+'][weekend_cropped_cover_photo]"]').val();
            var weekendReporterName = $('input[name="group-b['+i+'][weekendReporterName]"]').val();
            var weekendReporterCity = $('input[name="group-b['+i+'][weekendReporterCity]"]').val();
            var weekendPosition = $('select[name="group-b['+i+'][weekendPosition]"]').val();
            var weekendAlignment = $('select[name="group-b['+i+'][weekendAlignment]"]').val();
            
            if(weekendSlug == '')
            {
                $('div[name="group-b['+i+'][errorWeekendSlug]"]').show();
                isValid = false;
            }
            if(weekendHeadlines == '')
            {
                $('div[name="group-b['+i+'][errorWeekendHeadlines]"]').show();
                isValid = false;
            }
            if(weekend_cropped_cover_photo == '')
            {
                $('div[name="group-b['+i+'][errorWeekendCoverImage]"]').show();
                isValid = false;
            }
            if(weekendReporterName == '')
            {
                $('div[name="group-b['+i+'][errorWeekendReporterName]"]').show();
                isValid = false;
            }
            if(weekendReporterCity == '')
            {
                $('div[name="group-b['+i+'][errorWeekendReporterCity]"]').show();
                isValid = false;
            }
            if(weekendPosition == '')
            {
                $('div[name="group-b['+i+'][errorWeekendPosition]"]').show();
                isValid = false;
            }
            if(weekendAlignment == '')
            {
                $('div[name="group-b['+i+'][errorWeekendAlignment]"]').show();
                isValid = false;
            }
        }
    }
    if(storyTypeList == 'contact_card' || storyTypeList == 'heading_with_two_photo' || storyTypeList == 'before_and_after')
    {
        if(storyTypeList == 'contact_card')
        {
            var contactNo = $("#contactNo").val();
            var email = $("#email").val();
            var location = $("#location").val();
            var website = $("#website").val();
            var fullName = $("#fullName").val();
            var designation = $("#designation").val();
            var address = $("#address").val();
            
            if(contactNo == '')
            {
                $("#errorContactNo").show();
                isValid = false;
            }
            if(email == '')
            {
                $("#errorEmail").show();
                isValid = false;
            }
            if(location == '')
            {
                $("#errorLocation").show();
                isValid = false;
            }
            if(website == '')
            {
                $("#errorWebsite").show();
                isValid = false;
            }
            if(fullName == '')
            {
                $("#errorFullName").show();
                isValid = false;
            }
            if(address == '')
            {
                $("#errorAddress").show();
                isValid = false;
            }
            if(designation == '')
            {
                $("#errorDesignation").show();
                isValid = false;
            }
        }
        if(storyTypeList == 'heading_with_two_photo' || storyTypeList == 'before_and_after')
        {
            var hdnIsCreditLogoAdded = $("#hdnIsCreditLogoAdded").val();
            if(hdnIsCreditLogoAdded == 0)
            {
                $("#errorCreditLogo").show();
                isValid = false;
            }
        }
        if(storyTypeList == 'before_and_after')
        {
            var afterHeading = $("#afterHeading").val();
            var beforeHeading = $("#beforeHeading").val();
            
            if(afterHeading == '')
            {
                $("#errorAfterHeading").show();
                isValid = false;
            }
            if(beforeHeading == '')
            {
                $("#errorBeforeHeading").show();
                isValid = false;
            }
        }
    }
    
    if(storyTypeList == 'stoke_up' || storyTypeList == 'heading_with_stokes' || storyTypeList == 'stokes_scroll')
    {
        var countForStokeUpName = $('input[name*=stokeUpName]').length;
        for(var i =0; i < parseInt(countForStokeUpName); i++)
        {
            var stokeUpName = $('input[name="group-a['+i+'][stokeUpName]"]').val();
            var stokeUpPrice = $('input[name="group-a['+i+'][stokeUpPrice]"]').val();
            var stokeUpVariation = $('input[name="group-a['+i+'][stokeUpVariation]"]').val();
            var stokeUpdate = $('input[name="group-a['+i+'][stokeUpdate]"]').val();

            if(stokeUpName == '')
            {
                $('div[name="group-a['+i+'][errorStokeUpName]"]').show();
                isValid = false;
            }
            if(stokeUpPrice == '')
            {
                $('div[name="group-a['+i+'][errorStokeUpPrice]"]').show();
                isValid = false;
            }
            if(stokeUpVariation == '')
            {
                $('div[name="group-a['+i+'][errorStokeUpVariation]"]').show();
                isValid = false;
            }
            if(stokeUpdate == '')
            {
                $('div[name="group-a['+i+'][errorStokeUpdate]"]').show();
                isValid = false;
            }
        }
    }
//    if(storyTypeList == 'thread' || storyTypeList == 'top_news' || storyTypeList == 'poll_performance' 
//            || storyTypeList == 'company_headlines' || storyTypeList == 'big_headlines' 
//            || storyTypeList == 'headlines'
//            || storyTypeList == 'audio'
//            || storyTypeList == 'heading_with_two_photo'  || storyTypeList == 'before_and_after'
//            || storyTypeList == 'bullets' || storyTypeList == 'heading_with_four_photo')
//    {
//        if(reporterCity == '')
//        {
//            $("#errorReporterCity").show();
//            isValid = false;
//        }
//        if(reporterName == '')
//        {
//            $("#errorReporterName").show();
//            isValid = false;
//        }
//    }
    if(storyTypeList == 'audio')
    {
        //var audioFile = $('#audio_file').get(0).files.length;
        var hdnAudioFile = $("#hdnAudioFile").val();
        if(hdnAudioFile == 0)
        {
            $("#errorAudioFile").show();
            isValid = false;
        }
        
    }
    if(storyTypeList == 'headlines')
    {
        var bigHeadlinesThemeColor = $("#bigHeadlinesThemeColor").val();

        if(bigHeadlinesThemeColor == '')
        {
            $("#errorBigHeadlinesThemeColor").show();
            isValid = false;
        }
    }
    if(storyTypeList == 'emoji_and_text')
    {
        var txtEmoji = $("#txtEmoji").val();
        if(txtEmoji == '')
        {
            $("#errorEmojiEmotion").show();
            isValid = false;
        }
    }
    if(storyTypeList == 'thread')
    {
        var bug_color = $("#bug_color").val();
        var bug_text = $("#bug_text").val();
        var bug_dot_color = $("#bug_dot_color").val();
        
        if(bug_color == '')
        {
            $("#errorBugColor").show();
            isValid = false;
        }
        if(bug_text == '')
        {
            $("#errorBugText").show();
            isValid = false;
        }
        if(bug_dot_color == '')
        {
            $("#errorBugDotColor").show();
            isValid = false;
        }
        for(var i =0; i < parseInt(threadLength); i++)
        {
            var threadTimepicker = $('input[name="group-a['+i+'][threadTimepicker]"]').val();
            var threadDescription = $('textarea[name="group-a['+i+'][threadDescription]"]').val();
            
            if(threadTimepicker == '')
            {
                $('div[name="group-a['+i+'][errorThreadTimepicker]"]').show();
                isValid = false;
            }
            if(threadDescription == '')
            {
                $('div[name="group-a['+i+'][errorThreadDescription]"]').show();
                isValid = false;
            }
        }
    }
    if(storyTypeList == 'text_with_color_dots')
    {
        var headline_color = $("#headline_color").val();
        var headline_background_color = $("#headline_background_color").val();
        var headline_dot_color = $("#headline_dot_color").val();
        
        if(headline_color == '')
        {
            $("#errorHeadlineColor").show();
            isValid = false;
        }
        if(headline_background_color == '')
        {
            $("#errorHeadlineBackgroundColor").show();
            isValid = false;
        }
        if(headline_dot_color == '')
        {
            $("#errorHeadlineDotColor").show();
            isValid = false;
        }
    }
    if(storyTypeList == 'top_news' || storyTypeList == 'poll_performance' 
            || storyTypeList == 'company_headlines' || storyTypeList == 'video_header_videoline' || 
            storyTypeList == 'photo_header_videoline' || storyTypeList == 'photo_album' || 
            storyTypeList == 'justin'  || storyTypeList == 'big_headlines' 
            || storyTypeList == 'emoji_and_text' || storyTypeList == 'thread' || storyTypeList == 'text_with_color_dots'  || storyTypeList == 'audio' 
            || storyTypeList == 'social_media' || storyTypeList == 'story_album' 
            || storyTypeList == 'full_screen' || storyTypeList == 'heading_with_two_photo' || storyTypeList == 'before_and_after'
            || storyTypeList == 'heading_with_stokes' || storyTypeList == 'stokes_scroll' || storyTypeList == 'heading_with_four_photo'
            || storyTypeList == 'photo_mapping' || storyTypeList == 'insider')
    {
        if(slug == '')
        {   
            $("#errorSlug").show();
            isValid = false;
        }
    }

    if(storyTypeList == 'top_news' || storyTypeList == 'poll_performance' 
            || storyTypeList == 'company_headlines' || storyTypeList == 'news_update' || storyTypeList == 'video_header_videoline' 
            || storyTypeList == 'photo_header_photoline' || storyTypeList == 'photo_photoline' || storyTypeList == 'photo_album' 
            || storyTypeList == 'big_headlines' || storyTypeList == 'headlines' 
            || storyTypeList == 'remind_me' || storyTypeList == 'count_down' 
            || storyTypeList == 'thread' || storyTypeList == 'text_with_color_dots' 
            || storyTypeList == 'social_media' || storyTypeList == 'story_album' 
            || storyTypeList == 'full_screen' || storyTypeList == 'spliter'  || storyTypeList == 'heading_with_two_photo' || storyTypeList == 'bullets' 
            ||  storyTypeList == 'big_box' ||  storyTypeList == 'short' || storyTypeList == 'heading_with_four_photo'
            || storyTypeList == 'before_and_after' || storyTypeList == 'photo_mapping' || storyTypeList == 'insider')
    {
        for(var i =0; i < parseInt(titleLength); i++)
        {
            var title = $('input[name="group-a['+i+'][title]"]').val();
            if(title == '')
            {
                $('div[name="group-a['+i+'][errorTitle]"]').show();
                isValid = false;
            }
        }
    }
    if(storyTypeList == 'top_news' || storyTypeList == 'poll_performance' 
            || storyTypeList == 'company_headlines' || storyTypeList == 'video_header_videoline' || storyTypeList == 'photo_header_photoline'
            || storyTypeList == 'photo_photoline' || storyTypeList == 'photo_album' || storyTypeList == 'thread' 
            || storyTypeList == 'text_with_color_dots'  || storyTypeList == 'audio' 
            || storyTypeList == 'story_album' || storyTypeList == 'full_screen' || storyTypeList == 'spliter' 
            || storyTypeList == 'heading_with_two_photo' || storyTypeList == 'before_and_after' 
            ||  storyTypeList == 'big_box' || storyTypeList == 'photo_mapping' || storyTypeList == 'insider')
    {
        
        if(storyTypeList == 'photo_album' || storyTypeList == 'story_album')
        {
            for(var i =0; i < parseInt(imageLength); i++)
            {
                //var imageFile = $('input[name="group-a['+i+'][image_file]"]').get(0).files.length;
                var imageFile = $('input[name="group-a['+i+'][cropped_cover_photo]"]').val();
                if(imageFile == '')
                {
                    $('div[name="group-a['+i+'][errorCoverImage]"]').show();
                    isValid = false;
                }
            }
        }
        else
        {
            if(hdnIsImageOrVideoAdded == 0)
            {
                $('div[name="group-a[0][errorCoverImage]"]').show();
                isValid = false;
            }
        }
    }
    if(storyTypeList == 'top_news' || storyTypeList == 'poll_performance' 
            || storyTypeList == 'company_headlines' || storyTypeList == 'news_update' || storyTypeList == 'justin'  || storyTypeList == 'text_with_header' 
        || storyTypeList == 'big_headlines' || storyTypeList == 'headlines' 
        || storyTypeList == 'remind_me' || storyTypeList == 'count_down' 
        || storyTypeList == 'emoji_and_text' || storyTypeList == 'text_with_color_dots'  
        || storyTypeList == 'audio' || storyTypeList == 'social_media' 
        || storyTypeList == 'heading_with_two_photo'  || storyTypeList == 'before_and_after'
        ||  storyTypeList == 'stokes_scroll' ||  storyTypeList == 'big_box' ||  storyTypeList == 'short' || storyTypeList == 'heading_with_four_photo'
        || storyTypeList == 'photo_mapping' || storyTypeList == 'insider')
    {
        for(var i =0; i < parseInt(descriptionLength); i++)
        {
            var description = $('textarea[name="group-a['+i+'][description]"]').val();
            if(description == '')
            {
                $('div[name="group-a['+i+'][errorDescription]"]').show();
                isValid = false;
            }
        }
    }
    if($('input[name=isStockFormOpen]').is(':checked'))
    {
        if(storyTypeList == 'poll_performance')
        {
            var countForconsistency= $('input[name*=consistency]').length;
            for(var i =0; i < parseInt(countForconsistency); i++)
            {
                var pointerCount = i + 1;
                var pollYear = $('input[name="group-g['+i+'][pollYear]"]').val();
                var consistency = $('input[name="group-g['+i+'][consistency]"]').val();
                var wonlose = $('input[name="group-g['+i+'][wonlose]"]').val();
                var wonLossType = $('input[name="group-g['+i+'][wonLossType]"]').val();

                if(pollYear == '')
                {
                    $('div[name="group-g['+i+'][errorPollYear]"]').show();
                    isValid = false;
                }
                if(consistency == '')
                {
                    $('div[name="group-g['+i+'][errorConsistency]"]').show();
                    isValid = false;
                }
                if(wonlose == '')
                {
                    $('div[name="group-g['+i+'][errorWonlose]"]').show();
                    isValid = false;
                }
                if(wonLossType == '')
                {
                    $('div[name="group-g['+i+'][errorWonLossType]"]').show();
                    isValid = false;
                }
                
            }
        }
        else if(storyTypeList == 'company_headlines')
        {
            var countForCompanyYear = $('input[name*=companyYear]').length;
            for(var i =0; i < parseInt(countForCompanyYear); i++)
            {
                var pointerCount = i + 1;
                var companyYear = $('input[name="group-h['+i+'][companyYear]"]').val();
                var profitLossOfData = $('input[name="group-h['+i+'][profitLossOfData]"]').val();
                var profitLossType = $('input[name="group-h['+i+'][profitLossType]"]').val();

                if(companyYear == '')
                {
                    $('div[name="group-h['+i+'][errorCompanyYear]"]').show();
                    isValid = false;
                }
                if(profitLossOfData == '')
                {
                    $('div[name="group-h['+i+'][errorProfitLossOfData]"]').show();
                    isValid = false;
                }
                if(profitLossType == '')
                {
                    $('div[name="group-h['+i+'][errorWonLossType]"]').show();
                    isValid = false;
                }
                
            }
        }
        else
        {
            var countForStockName = $('input[name*=stockName]').length;
            for(var i =0; i < parseInt(countForStockName); i++)
            {
                var stockName = $('input[name="group-a['+i+'][stockName]"]').val();
                var stockPrice = $('input[name="group-a['+i+'][stockPrice]"]').val();
                var stockColor = $('input[name="group-a['+i+'][stockColor]"]').is(':checked');
                var stockVariation = $('input[name="group-a['+i+'][stockVariation]"]').val();
                if(stockName == '')
                {
                    $('div[name="group-a['+i+'][errorStockName]"]').show();
                    isValid = false;
                }
                if(stockPrice == '')
                {
                    $('div[name="group-a['+i+'][errorStockPrice]"]').show();
                    isValid = false;
                }
                if(stockVariation == '')
                {
                    $('div[name="group-a['+i+'][errorStockVariation]"]').show();
                    isValid = false;
                }
                if(!stockColor)
                {
                    $('div[name="group-a['+i+'][errorStockColor]"]').show();
                    isValid = false;
                }
            }
        }
    }
    if($('input[name=isShowPhotoCrediterName]').is(':checked'))
    {
        var photoCrediterName = $('#photoCrediterName').val();
        if(photoCrediterName == '')
        {
            $("#errorPhotoCrediterName").show();
            isValid = false;
        }
    }
    if($('input[name=isShowTag]').is(':checked'))
    {
        var hdnTagMasterId = $('#hdnTagMasterId').val();
        var hdnTagMasterName = $('#hdnTagMasterName').val();
        var txtTagMasterOther = $('#txtTagMasterOther').val();
        if(hdnTagMasterId == '')
        {
            $("#errorTxtTagMaster").show();
            isValid = false;
        }
        if(hdnTagMasterName == 'other' || hdnTagMasterName == 'Other')
        {
            if(txtTagMasterOther == '')
            {
                $("#errorTxtTagMasterOther").show();
                isValid = false;
            }
        }
    }
    if($('input[name=isImageNamePlate]').is(':checked'))
    {
        var designationPlate = $("#designationPlate").val();
        var namePlate =  $("#namePlate").val();

        if(designationPlate == '')
        {
            $("#errorDesignationPlate").show();
            isValid = false;
        }
        if(namePlate == '')
        {
            $("#errorNamePlate").show();
            isValid = false;
        }
    }
    return isValid;
}
function hideErrorMessage(id)
{
    $("#"+id).hide();
}

function hideErrorMessageWithName(name,mode)
{
    var attrName = $(name).attr('name');
    var counterNumber = attrName.substring(0, 10);
    if(mode == 'title')
    {
        var errorTitle = counterNumber+'[errorTitle]';
        $('div[name="'+errorTitle+'"]').hide();
    } 
    if(mode == 'description')
    {
        var errorDescription = counterNumber+'[errorDescription]';
        $('div[name="'+errorDescription+'"]').hide();
    }
    if(mode == 'cover_image')
    {
        var errorCoverImage = counterNumber+'[errorCoverImage]';
        $('div[name="'+errorCoverImage+'"]').hide();
    }
    if(mode == 'threadTimepicker')
    {
        var errorThreadTimepicker = counterNumber+'[errorThreadTimepicker]';
        $('div[name="'+errorThreadTimepicker+'"]').hide();
    }
    if(mode == 'threadDesc')
    {
        var errorThreadDescription = counterNumber+'[errorThreadDescription]';
        $('div[name="'+errorThreadDescription+'"]').hide();
    }
    if(mode == 'stockName')
    {
        var errorStockName = counterNumber+'[errorStockName]';
        $('div[name="'+errorStockName+'"]').hide();
    }
    if(mode == 'stockPrice')
    {
        var errorStockPrice = counterNumber+'[errorStockPrice]';
        $('div[name="'+errorStockPrice+'"]').hide();
    }
    if(mode == 'stockVariation')
    {
        var errorStockVariation = counterNumber+'[errorStockVariation]';
        $('div[name="'+errorStockVariation+'"]').hide();
    }
    if(mode == 'stockColor')
    {
        var errorStockColor = counterNumber+'[errorStockColor]';
        $('div[name="'+errorStockColor+'"]').hide();
    }
    if(mode == 'stokeUpName')
    {
        var errorStokeUpName = counterNumber+'[errorStokeUpName]';
        $('div[name="'+errorStokeUpName+'"]').hide();
    }
    if(mode == 'stokeUpPrice')
    {
        var errorStokeUpPrice = counterNumber+'[errorStokeUpPrice]';
        $('div[name="'+errorStokeUpPrice+'"]').hide();
    }
    if(mode == 'stokeUpVariation')
    {
        var errorStokeUpVariation = counterNumber+'[errorStokeUpVariation]';
        $('div[name="'+errorStokeUpVariation+'"]').hide();
    }
    if(mode == 'stokeUpdate')
    {
        var errorStokeUpdate = counterNumber+'[errorStokeUpdate]';
        $('div[name="'+errorStokeUpdate+'"]').hide();
    }
    if(mode == 'weekendSlug')
    {
        var errorWeekendSlug = counterNumber+'[errorWeekendSlug]';
        $('div[name="'+errorWeekendSlug+'"]').hide();
    }
    if(mode == 'weekendHeadlines')
    {
        var errorWeekendHeadlines = counterNumber+'[errorWeekendHeadlines]';
        $('div[name="'+errorWeekendHeadlines+'"]').hide();
    }
    if(mode == 'weekendReporterName')
    {
        var errorWeekendReporterName = counterNumber+'[errorWeekendReporterName]';
        $('div[name="'+errorWeekendReporterName+'"]').hide();
    }
    if(mode == 'weekendReporterCity')
    {
        var errorWeekendReporterCity = counterNumber+'[errorWeekendReporterCity]';
        $('div[name="'+errorWeekendReporterCity+'"]').hide();
    }
    if(mode == 'weekendPosition')
    {
        var errorWeekendPosition = counterNumber+'[errorWeekendPosition]';
        $('div[name="'+errorWeekendPosition+'"]').hide();
    }
    if(mode == 'weekendAlignment')
    {
        var errorWeekendAlignment = counterNumber+'[errorWeekendAlignment]';
        $('div[name="'+errorWeekendAlignment+'"]').hide();
    }
    if(mode == 'question')
    {
        var errorQuestion = counterNumber+'[errorQuestion]';
        $('div[name="'+errorQuestion+'"]').hide();
    }
    if(mode == 'answer')
    {
        var errorAnswer = counterNumber+'[errorAnswer]';
        $('div[name="'+errorAnswer+'"]').hide();
    }
}
function changeGrid(mode)
{
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
function openOrCloseStockForm()
{
    $("#pollperformanceFormDivId").hide();
    $("#companyHeadlinesFormDivId").hide();
    $("#stockFormDivId").hide();
    //$(".invalid-feedback").hide();
    $('#stockFormDivId [data-repeater-item]').slice(1).remove();
    $('#companyHeadlinesFormDivId [data-repeater-item]').slice(1).remove();
    $('#pollperformanceFormDivId [data-repeater-item]').slice(1).remove();

    $('input[name="group-a[0][stockName]"]').val('');
    $('input[name="group-a[0][stockPrice]"]').val('');
    $('input[name="group-a[0][stockVariation]"]').val('');
    $('input[name="group-a[0][stockColor]"]').prop('checked',false);
    $('small[name="group-a[0][stock_name_max_characters]"]').html('Max 100 Characters');
    $('small[name="group-a[0][stock_price_max_characters]"]').html('Max 30 Characters');
    $('small[name="group-a[0][stock_variation_max_characters]"]').html('Max 30 Characters');
    $('small[name="group-a[0][wonLossBy_max_characters]"]').html('Max 30 Characters');

    $('input[name="group-a[0][stockName]"]').attr('maxlength','100');
    $('input[name="group-a[0][stockPrice]"]').attr('maxlength','30');
    $('input[name="group-a[0][stockVariation]"]').attr('maxlength','30');
    $('input[name="group-a[0][wonLossBy]"]').attr('maxlength','30');

    $('input[name="group-a[0][errorStockName]"]').hide();
    $('input[name="group-a[0][errorStockPrice]"]').hide();
    $('input[name="group-a[0][errorStockVariation]"]').hide();
    $('input[name="group-a[0][errorStockColor]"]').hide();
     $('input[name="group-a[0][errorWonLossBy]"]').hide();
     var storyTypeList = $('input[name="storyTypeList"]:checked').val();
    if(storyTypeList == 'poll_performance')
    {
        if($('input[name=isStockFormOpen]').is(':checked'))
        {
            $("#pollperformanceFormDivId").show();
        }
        else
        {
            $("#pollperformanceFormDivId").hide();
        }
    }
    else if(storyTypeList == 'company_headlines')
    {
        if($('input[name=isStockFormOpen]').is(':checked'))
        {
            $("#companyHeadlinesFormDivId").show();
        }
        else
        {
            $("#companyHeadlinesFormDivId").hide();
        }
    }
    else
    {
        if($('input[name=isStockFormOpen]').is(':checked'))
        {
            $("#stockFormDivId").show();
        }
        else
        {
            $("#stockFormDivId").hide();
        }
    }
    //var storyTypeList = $('input[name="storyTypeList"]:checked').val();
    
}
function openOrCloseHeaderBlinkingDot()
{
    $(".invalid-feedback").hide();
    
    if($('input[name=isHeaderBlinkingDot]').is(':checked'))
    {
        $("#headerBlinkingColorDivId").show();
    }
    else
    {
        $("#headerBlinkingColorDivId").hide();
    }
}
$('body').on('click', '.pin_on_top', function(e)
    {
        var parent = $(this).parent();
        var id = parent.attr('id');
        var finalId = parent.closest('li').attr('id');
        var pinOnTopTab =  parent.closest('li').attr('data-pinOnTopTab');
        var storyDate = $("#story_date").val();
        
        console.log('finalId :::: '+finalId+'pintab :::  '+pinOnTopTab+' storyDate '+storyDate);
        if(pinOnTopTab == 1)
        {
            swal({
                    title: "Are you sure?",
                    text: "You want to UnPin from top this Neews Feed",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Unpin it!",
                    cancelButtonText: "No, cancel please!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm) 
                {
                    if (isConfirm) 
                    {
                        $.ajax({
                            url: justinPinOnTopTabOrUnpinTab,
                            method:'POST',
                            dataType:'html',
                            data: {id:finalId,pinOnTopTab:0,storyDate:storyDate},
                            success:function(response)
                            {
                                getJustinList();
                                getPinnedAccordionData();
                                
                            }
                        })
                    } else {
                        isConfirm.dismiss;
                    }
                }, function (dismiss) {
                    return false;
                }
            );
        }
        else
        {
            swal({
                    title: "Are you sure?",
                    text: "You want to Pin on top this Neews Feed",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Pin it!",
                    cancelButtonText: "No, cancel please!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm) {
                    if (isConfirm) {

                        $.ajax({
                            url: justinPinOnTopTabOrUnpinTab,
                            method:'POST',
                            dataType:'html',
                            data: {id:finalId,pinOnTopTab:1,storyDate:storyDate},
                            success:function(response)
                            {
                                getJustinList();
                                getPinnedAccordionData();
                            }
                        })

                    } else {
                        isConfirm.dismiss;
                    }
                }, function (dismiss) {
                    return false;
                }
            );
        }
    });
     $('body').on('click', '.pin_me', function(e) {
       var parent = $(this).parent();
        var id = parent.attr('id');
        var finalId = parent.closest('li').attr('id');
        var pintab =  parent.closest('li').attr('data-pintab');
        //console.log(pintab);
       var pintabMultipleIdsArray = [];
        var notPintabMultipleIdsArray = [];
        $('#sortable li').each(function()
        {
            var id = $(this).attr('id');
            var pintab = $(this).attr('data-pintab');
            
            if(finalId == id)
            {
                if(pintab != '')
                {
                    notPintabMultipleIdsArray.push(id);
                }
                else
                {
                    pintabMultipleIdsArray.push(id);
                }
            }
            else if(id != undefined && pintab != '')
            {
                pintabMultipleIdsArray.push(id);
            }
            else
            {
                notPintabMultipleIdsArray.push(id);
            }
        });
        if(pintab != '')
        {
            swal({
                    title: "Are you sure?",
                    text: "You want to UnPin this Neews Feed",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Unpin it!",
                    cancelButtonText: "No, cancel please!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm) {
                    if (isConfirm) {

                        $.ajax({
                            url: justinPinTabOrUnpinTab,
                            method:'POST',
                            dataType:'html',
                            data: {id:finalId,pintab:0,pintab_id:pintabMultipleIdsArray.toString(),not_pintab_id:notPintabMultipleIdsArray.toString()},
                            success:function(response)
                            {
                                getJustinList();
                                getPinnedAccordionData();
                            }
                        })

                    } else {
                        isConfirm.dismiss;
                    }
                }, function (dismiss) {
                    return false;
                }
            );
        }else{
            
    
            swal({
                    title: "Are you sure?",
                    text: "You want to Pin this Neews Feed",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Pin it!",
                    cancelButtonText: "No, cancel please!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm) {
                    if (isConfirm) {

                        $.ajax({
                            url: justinPinTabOrUnpinTab,
                            method:'POST',
                            dataType:'html',
                            data: {id:finalId,pintab:1,pintab_id:pintabMultipleIdsArray.toString(),not_pintab_id:notPintabMultipleIdsArray.toString()},
                            success:function(response){
                                getJustinList();
                                getPinnedAccordionData();
                            }
                        })

                    } else {
                        isConfirm.dismiss;
                    }
                }, function (dismiss) {
                    return false;
                }
            );
        }
    });
    function resetDisplayOrder()
    {
        var hdnSortableId = $("#hdnSortableId").val();
        var pintabMultipleIdsArray = [];
        $('#sortable li').each(function()
        {
            var id = $(this).attr('id');
            var pintab = $(this).attr('data-pintab');
            var pinTabOnTop = $(this).attr('data-pinOnTopTab');
            if(id != undefined && (pintab != '' || pinTabOnTop != ''))
            {
                if(jQuery.inArray(id, pintabMultipleIdsArray) == -1) 
                {
                    pintabMultipleIdsArray.push(id);
                } 
            } 
        });

    if(hdnSortableId != '' && hdnSortableId != undefined)
    {
        $.ajax({
            url: resetDisplayOrderCodeUrl,
            method:'POST',
            dataType:'html',
            data: {non_pintab_id:hdnSortableId,pintab_id:pintabMultipleIdsArray.toString()},
            success:function(response)
            {
                if(response == 1)
                {
                    $("#resetDisplayOrderHrefId").hide();
                    swal("Submited!", "Story sorted successfully","success");
                }
                else
                {
                     swal("Submited!", "There is some issue for sorting story.","error");
                }
            },
            error: function(XMLHttpRequest, errorStatus, errorThrown) 
            {
                isLoadedListing = false;
                console.log("XHR :: "+JSON.stringify(XMLHttpRequest));
                console.log("Status :: "+errorStatus);
                console.log("error :: "+errorThrown);

                if(errorThrown == 'abort' || errorThrown == 'undefined') 
                    return;
                var errorStatus = XMLHttpRequest['status'];
                if(errorThrown == 'timeout')
                {
                    var errorMessageTemp = 'Request has been timeout. Please check your internet connection! (Error: '+errorStatus+')';
                    console.log(errorMessageTemp);

                }
                else
                {
                    var errorMessageTemp = 'There is something wrong! Please try again! (Error: '+errorStatus+')';

                    console.log(errorMessageTemp);
                }
                swal("Submited!", "There is some issue for sorting story.","error");
                return false;
            }
        })
    }
}
$(function(){
    getJustinList();
    getPinnedAccordionData();
});

function getJustinList()
{
    $.ajax({
        url: justinListCodeUrl,
        method:'POST',
        dataType:'html',
        data: {date:$('#story_date').val(), searchKeyword:$('#storySearchKeyword').val()},
        success:function(response)
        {
           // console.log(response);
            $("#JustinList").html(response);
            var totalLiLength = $("#sortable > li").length;
            $("#totalStoryCountId").text('Daily App Count : '+totalLiLength);
            
            $(".descriptionDivClass ul li").addClass('unsortable');
            $(".liNotSortClass").addClass('unsortable');
            $('#sortable').sortable(
            {
                items: "li:not(.unsortable)",
                tolerance: 'touch',
                update: function (event, ui)
                {
                    
                    $("#resetDisplayOrderHrefId").show();
                    var attr = $(this).sortable('toArray');

                    var finalIdArray = [];
                    for(var k=0; k < attr.length; k++)
                    {
                        if(Math.floor(attr[k]) == attr[k] && $.isNumeric(attr[k]))
                        {
                            finalIdArray.push(attr[k]);
                        }
                    }
                    var finalIdString = finalIdArray.toString();
                    $("#hdnSortableId").val(finalIdString);
                },
            });
        }
    })
}
function getPinnedAccordionData()
{
    $.ajax({
        url: pinnedStoryJustinCodeUrl,
        method:'POST',
        dataType:'html',
        success:function(response)
        {
            $("#storyPinnedJustinList").html(response);
            
            if($(response).find('#noPinnedDataAvailable').length == 0)
            {
                $('#pinnedUlId').sortable(
                {
                    items: "li:not(.unsortable)",
                    tolerance: 'touch',
                    update: function (event, ui)
                    {
                        $("#resetPinnedDisplayOrderHrefId").show();
                        var attr = $(this).sortable('toArray');

                        var finalIdArray = [];
                        for(var k=0; k < attr.length; k++)
                        {
                            if(Math.floor(attr[k]) == attr[k] && $.isNumeric(attr[k]))
                            {
                                finalIdArray.push(attr[k]);
                            }
                        }
                        var finalIdString = finalIdArray.toString();
                        $("#hdnPinnedSortableId").val(finalIdString);
                    },
                });
            }
        }
    })
}    
    $('body').on('click', '.remove_me', function(e) 
    {
        var parent = $(this).parent();
        var id = parent.attr('id');
        var finalId = parent.closest('li').attr('id');

        swal({
                title: "Are you sure?",
                text: "You want to Delete this Neews Feed",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, Delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    parent.remove();
                    $.ajax({
                        url: justinDeleteCodeUrl,
                        method:'POST',
                        dataType:'html',
                        data: {id:finalId},
                        success:function(response)
                        {
                            getJustinList();
                            getPinnedAccordionData();
                        }
                    })

                } else {
                    isConfirm.dismiss;
                }
            }, function (dismiss) {
                return false;
            }
        );

    });
    //libraryImagesList
    
    
$('body').on('click', '.accordion_pin_me', function(e) 
{
    var parent = $(this).parent();
    var id = parent.attr('id');
    var finalId = parent.closest('li').attr('id');
    var pintab =  parent.closest('li').attr('data-pinnedtab');
        //console.log(pintab);
    var pintabMultipleIdsArray = [];
    var notPintabMultipleIdsArray = [];
    $('#pinnedUlId li').each(function()
    {
        var id = $(this).attr('id');
        var pintab = $(this).attr('data-pinnedtab');
            
        if(finalId == id)
        {
            if(pintab != '')
            {
                notPintabMultipleIdsArray.push(id);
            }
            else
            {
                pintabMultipleIdsArray.push(id);
            }
        }
        else if(id != undefined && pintab != '')
        {
            pintabMultipleIdsArray.push(id);
        }
        else
        {
            notPintabMultipleIdsArray.push(id);
        }
    });
    if(pintab != '')
    {
        swal({
                title: "Are you sure?",
                text: "You want to UnPin this Neews Feed",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, Unpin it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {

                    $.ajax({
                        url: justinPinTabOrUnpinTab,
                        method:'POST',
                        dataType:'html',
                        data: {id:finalId,pintab:0,pintab_id:pintabMultipleIdsArray.toString(),not_pintab_id:notPintabMultipleIdsArray.toString()},
                        success:function(response)
                        {
                            getJustinList();
                            getPinnedAccordionData();
                        }
                    })

                } else {
                    isConfirm.dismiss;
                }
            }, function (dismiss) {
                return false;
            }
        );
    }
    else
    {
        swal({
            title: "Are you sure?",
            text: "You want to Pin this Neews Feed",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, Pin it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(isConfirm) 
        {
            if (isConfirm) {
                $.ajax({
                    url: justinPinTabOrUnpinTab,
                    method:'POST',
                    dataType:'html',
                    data: {id:finalId,pintab:1,pintab_id:pintabMultipleIdsArray.toString(),not_pintab_id:notPintabMultipleIdsArray.toString()},
                    success:function(response){
                        getJustinList();
                        getPinnedAccordionData();
                    }
                })

            } else {
                isConfirm.dismiss;
            }
        }, function (dismiss) {
            return false;
        }
        );
        }
    });
    
function resetPinnedDisplayOrder()
{
    var hdnPinnedSortableId = $("#hdnPinnedSortableId").val();
    var pintabMultipleIdsArray = [];
    $('#pinnedUlId li').each(function()
    {
        var id = $(this).attr('id');
        var pintab = $(this).attr('data-pinnedtab');
        if(id != undefined && (pintab != ''))
        {
            if(jQuery.inArray(id, pintabMultipleIdsArray) == -1) 
            {
                pintabMultipleIdsArray.push(id);
            } 
        } 
    });
    $.ajax({
        url: updatePinnedSortableOrderAjax,
        method:'POST',
        dataType:'html',
        data: {pintab_id:pintabMultipleIdsArray.toString()},
        success:function(response)
        {
            if(response == 1)
            {
                $("#resetPinnedDisplayOrderHrefId").hide();
                getJustinList();
                getPinnedAccordionData();
                swal("Submited!", "Pinned story sorted successfully","success");
            }
            else
            {
                swal("Submited!", "There is some issue for pinned sorting story.","error");
            }
        }
    })
}
function getAllLibraryImages()
{
    $("#libraryImagesList").html('');
    $("#fullImageDivError").hide();
    var hdnPageNumber = $("#hdnPageNumber").val();
    var hdnRecordsPerPage = $("#hdnRecordsPerPage").val();
    var hdnSortBy = $("#hdnSortBy").val();
    var hdnSearchKeyword = $("#hdnSearchKeyword").val();
    var storyTypeList = $('input[name="storyTypeList"]:checked').val();
    var hdnSearchCategoryId = $("#txtCategoryId").val();
    var txtSorting = $("#txtSorting").val();
    
     var hdnFilterMediaUsed = $("#hdnFilterMediaUsed").val();
     
    $.ajax(
    {
        url:libraryImagesList,
        type: "POST",
        data: "pageNumber="+hdnPageNumber+"&txtSorting="+txtSorting+"&recordsPerPage="+hdnRecordsPerPage+"&sort_by="+hdnSortBy+"&search_keyword="+hdnSearchKeyword+"&category_id="+hdnSearchCategoryId+'&hdnFilterMediaUsed='+hdnFilterMediaUsed+"&story_type="+storyTypeList+"&isShowOnlyAudio="+isShowOnlyAudio,
        cache: false,
        timeout : 30000,  //100 milliseconds 120000
        beforeSend : function()
        {
            $("#fullImageDivLoader img").show();	// Show loader
        },
        success: function(data)
        {
            $("#libraryImagesList").html(data);
            var hdnTotalData = $("#hdnTotalData").val();
            if(hdnTotalData == 0)
            {
                $("#fullImageDivError").show();
            }
            console.log('hdnTotalData ::: '+hdnTotalData);
            console.log('hdnRecordsPerPage ::: '+hdnRecordsPerPage);
            console.log('hdnPageNumber ::: '+hdnPageNumber);
           
            setPagging(hdnTotalData,hdnRecordsPerPage,hdnPageNumber);
        },
        error: function(XMLHttpRequest, errorStatus, errorThrown) 
        {
            $("#fullImageDivLoader img").hide();
            console.log("XHR :: "+JSON.stringify(XMLHttpRequest));
            console.log("Status :: "+errorStatus);
            console.log("error :: "+errorThrown);
            $("#fullImageDivError").text('There is something wrong. Please try again');
            $("#fullImageDivError").show();
            setPagging(0,hdnRecordsPerPage,hdnPageNumber);
        },
        complete:function()
        {
            $("#fullImageDivLoader img").hide();
        }
    });
}
function setPagging(hdnTotalData,hdnRecordsPerPage,hdnPageNumber)
{
    var deviceType = 'desktop';
    var hdnPageNumber = $("#hdnPageNumber").val();
    if(parseInt(hdnTotalData) >= parseInt(hdnRecordsPerPage) || parseInt(hdnTotalData) >= 1)
    {
        $("#pagging").show();
        if(deviceType == "mobile")
        {
            $('#pagging').pagination({
                dataSource: function(done)
                {
                    var result = [];
                    for (var i = 1; i <= hdnTotalData; i++) 
                    {
                        result.push(i);
                    }
                    done(result);
                },
                pageSize: hdnRecordsPerPage,
                pageNumber: hdnPageNumber,
                showPageNumbers: false,
                showNavigator: true,
            }) 
        }
        else
        {
            $('#pagging').pagination({
                dataSource: function(done)
                {
                    var result = [];
                    for (var i = 1; i <= hdnTotalData; i++) 
                    {
                        result.push(i);
                    }
                    done(result);
                },
                pageSize: hdnRecordsPerPage,
                pageNumber: hdnPageNumber,
            }) 
        }
        $('#pagging').addHook('afterPageOnClick', function () 
        {
            var getSelectedPageNumber = $('#pagging').pagination('getSelectedPageNum');
            $("#hdnPageNumber").val(getSelectedPageNumber);
            getAllLibraryImages();

        });
        $('#pagging').addHook('afterNextOnClick', function () 
        {
            var getSelectedPageNumber = $('#pagging').pagination('getSelectedPageNum');
            $("#hdnPageNumber").val(getSelectedPageNumber);
            getAllLibraryImages();

        });
        $('#pagging').addHook('afterPreviousOnClick', function () 
        {
            var getSelectedPageNumber = $('#pagging').pagination('getSelectedPageNum');
            $("#hdnPageNumber").val(getSelectedPageNumber);
            getAllLibraryImages();
        });
    }
    else
    {
        $("#pagging").hide();
    }
}
function closeLibraryImagesPopup()
{
    $("#imagesModalCenter").hide();
    $(".modal-backdrop").remove();
}
function categoryTypeOnchangeCall()
{
    var txtCategoryId= $("#txtCategoryId").val();
    
    $("#hdnPageNumber").val(1);
    $("#hdnSearchCategoryId").val(txtCategoryId);
    getAllLibraryImages();
}
function searchByKeyword()
{
    var keyword= $("#txtSearchKeyword").val();
    if(keyword == '')
    {
        //swal("Warning", "Please enter keyword for search", "error");
        $("#hdnPageNumber").val(1);
        $("#hdnSearchKeyword").val('');
        getAllLibraryImages();
    }
    else
    {
        $("#hdnPageNumber").val(1);
        $("#hdnSearchKeyword").val(keyword);
        getAllLibraryImages();
    }
    console.log(keyword);
    return false;
}
function selectImageTypeCallForCreditLogo(action,input)
{
    $("#hdnPageNumber").val(1);
    $("#hdnSearchKeyword").val('');
    $("#hdnSearchCategoryId").val('');

    isCreditLogoCall = 1;
    if(pageLoad == 0)
        cancelCropImage();
    $('#errorCreditLogo').hide();
    if(action == 'select_from_library')
    {   
        isCreditLogoCall = 1;
        $('#openLibraryButtonForCreditLogo').show();
        $('#creditLogoDivId').hide();
    }
    else if(action == 'upload')
    {
        isCreditLogoCall = 0;
        $('#openLibraryButtonForCreditLogo').hide();
        $('#creditLogoDivId').show();
    }
}

function selectImageTypeCallForFourImages(action,input)
{
    $("#hdnPageNumber").val(1);
    $("#hdnSearchKeyword").val('');
    $("#hdnSearchCategoryId").val('');
    var currentFileImageName = $(input).attr('name');
    var counterNumber = currentFileImageName.substring(0, 10);
    var openLibraryButtonForFourImages = counterNumber+'[openLibraryButtonForFourImages]';
    var imageBrowseForFourImages = counterNumber+'[imageBrowseForFourImages]';

    $("#hdnMultipleImagesCurrentInput").val(currentFileImageName);
    
    if(pageLoad == 0)
        cancelCropImage();
    
    $('div[name*="errorFourImages"]').hide();
    if(action == 'select_from_library')
    {   
        $('button[name="'+openLibraryButtonForFourImages+'"]').show();
        $('div[name="'+imageBrowseForFourImages+'"]').hide();
    }
    else if(action == 'upload')
    {
        $('div[name="'+imageBrowseForFourImages+'"]').show();
        $('button[name="'+openLibraryButtonForFourImages+'"]').hide();
    }
}

function selectImageTypeCall(action,input)
{  
    $("#hdnPageNumber").val(1);
    $("#hdnSearchKeyword").val('');
    $("#hdnSearchCategoryId").val('');
    var currentFileImageName = $(input).attr('name');
    var counterNumber = currentFileImageName.substring(0, 10);
    var openLibraryButton = counterNumber+'[openLibraryButton]';
    var justin_image = counterNumber+'[justin_image]';
    
    var storyTypeList = $('input[name="storyTypeList"]:checked').val();
    if(storyTypeList == 'story_album' || storyTypeList == 'photo_album')
    {
        $("#hdnMultipleImagesCurrentInput").val(currentFileImageName);
    }
    $('div[name*="errorCoverImage"]').hide();
    if(pageLoad == 0)
        cancelCropImage();
    if(action == 'select_from_library')
    {   
        $('button[name="'+openLibraryButton+'"]').show();
        $('div[name="'+justin_image+'"]').hide();
    }
    else if(action == 'upload')
    {
        $('div[name="'+justin_image+'"]').show();
        $('button[name="'+openLibraryButton+'"]').hide();
    }
}
function weekendSelectImageTypeCall(action,input)
{
    $("#hdnPageNumber").val(1);
    $("#hdnSearchKeyword").val('');
    $("#hdnSearchCategoryId").val('');
    var currentFileImageName = $(input).attr('name');
    var counterNumber = currentFileImageName.substring(0, 10);
    var openWeekendLibraryButton = counterNumber+'[openWeekendLibraryButton]';
    var weekendUploadImageDivId = counterNumber+'[weekendUploadImageDivId]';
    
    var storyTypeList = $('input[name="storyTypeList"]:checked').val();
    
    $("#hdnMultipleImagesCurrentInput").val(currentFileImageName);
    
    if(pageLoad == 0)
        cancelCropImage();
    if(action == 'select_from_library')
    {   
        $('button[name="'+openWeekendLibraryButton+'"]').show();
        $('div[name="'+weekendUploadImageDivId+'"]').hide();
    }
    else if(action == 'upload')
    {
        $('div[name="'+weekendUploadImageDivId+'"]').show();
        $('button[name="'+openWeekendLibraryButton+'"]').hide();
    }
}
var selectMediaLibraryId = '';
var selectMediaCategoryId = '';
function libraryImageCall(id,categoryId,fileName,fileType,fileSize)
{
    selectMediaLibraryId =  id;
    selectMediaCategoryId =  categoryId;
    $('#hdnSelectedAudioFileName').val('');
    closeLibraryImagesPopup();
    var storyTypeList = $('input[name="storyTypeList"]:checked').val();
    if(fileType == 'image')
    {
        image.src = '/images/photo_video_library/'+fileName;
        $("#modalLabel").text(fileName);
        if(storyTypeList == 'story_album' || storyTypeList == 'photo_album')
        {
            var hdnMultipleImagesCurrentInput = $("#hdnMultipleImagesCurrentInput").val();
            
            var counterNumber = hdnMultipleImagesCurrentInput.substring(0, 10);

            var tempCounterNumber = hdnMultipleImagesCurrentInput.substring(0, 10);

            var imageNameLabel = counterNumber+'[imageNameLabel]';
            var imageNameSpan = counterNumber+'[imageNameSpan]';
            var imageSizeLabel = counterNumber+'[imageSizeLabel]';
            var imageSizeSpan = counterNumber+'[imageSizeSpan]';
            var hdnSelectedFileName = counterNumber+'[hdnSelectedFileName]';
            var hdnSelectedFileType = counterNumber+'[hdnSelectedFileType]';
            
            $('label[name="'+imageNameLabel+'"]').text('Image name : ');
            $('span[name="'+imageNameSpan+'"]').text(' '+fileName);
            $('label[name="'+imageNameLabel+'"]').show();
            $('label[name="'+imageSizeLabel+'"]').text('Image Size : ');
            $('span[name="'+imageSizeSpan+'"]').text(fileSize+' KB');
            $('label[name="'+imageSizeLabel+'"]').show();
            $('input[name="'+hdnSelectedFileName+'"]').val(fileName);
            $('input[name="'+hdnSelectedFileType+'"]').val(fileType);
        }
        else if(storyTypeList == 'weekend')
        {
            var hdnMultipleImagesCurrentInput = $("#hdnMultipleImagesCurrentInput").val();
            
            var counterNumber = hdnMultipleImagesCurrentInput.substring(0, 10);

            var tempCounterNumber = hdnMultipleImagesCurrentInput.substring(0, 10);

            var weekendImageNameLabel = counterNumber+'[weekendImageNameLabel]';
            var weekendImageNameSpan = counterNumber+'[weekendImageNameSpan]';
            var weekendImageSizeLabel = counterNumber+'[weekendImageSizeLabel]';
            var weekendImageSizeSpan = counterNumber+'[weekendImageSizeSpan]';
            
            $('label[name="'+weekendImageNameLabel+'"]').text('Image name : ');
            $('span[name="'+weekendImageNameSpan+'"]').text(' '+fileName);
            $('label[name="'+weekendImageNameLabel+'"]').show();
            $('label[name="'+weekendImageSizeLabel+'"]').text('Image Size : ');
            $('span[name="'+weekendImageSizeSpan+'"]').text(fileSize+' KB');
            $('label[name="'+weekendImageSizeLabel+'"]').show();
        }
        else if(storyTypeList == 'heading_with_four_photo')
        {
            var hdnMultipleImagesCurrentInput = $("#hdnMultipleImagesCurrentInput").val();
            
            var counterNumber = hdnMultipleImagesCurrentInput.substring(0, 10);

            var tempCounterNumber = hdnMultipleImagesCurrentInput.substring(0, 10);

            var fourImageNameLabel = counterNumber+'[fourImageNameLabel]';
            var fourImageNameSpan = counterNumber+'[fourImageNameSpan]';
            var fourImageSizeLabel = counterNumber+'[fourImageSizeLabel]';
            var fourImageSizeSpan = counterNumber+'[fourImageSizeSpan]';
            
            $('label[name="'+fourImageNameLabel+'"]').text('Image name : ');
            $('span[name="'+fourImageNameSpan+'"]').text(' '+fileName);
            $('label[name="'+fourImageNameLabel+'"]').hide();
            $('label[name="'+fourImageSizeLabel+'"]').text('Image Size : ');
            $('span[name="'+fourImageSizeSpan+'"]').text(fileSize+' KB');
            $('label[name="'+fourImageSizeLabel+'"]').hide();
        }
        else
        {
            if(isCreditLogoCall == 1)
            {
                $('#creditLogoImageNameLabel').text('Image name : ');
                $('#creditLogoImageNameSpan').text(' '+fileName);
                $('#creditLogoImageNameLabel').show();
                $('#creditLogoImageSizeLabel').text('Image Size : ');
                $('#creditLogoImageSizeSpan').text(fileSize+' KB');
                $('#creditLogoImageSizeLabel').show();
                $('#hdnSelectedFileNameForCreditLogo').val(fileName);
                $('#hdnSelectedFileTypeForCreditLogo').val(fileType);
                $("#hdnIsCreditLogoAdded").val(1);
            }
            else
            {
                //$('input[name="group-a[0][image_file]"]').val(fileName);
                $('label[name="group-a[0][imageNameLabel]"]').text('Image name : ');

                $('span[name="group-a[0][imageNameSpan]"]').text(' '+fileName);
                $('label[name="group-a[0][imageNameLabel]"]').show();

                $('label[name="group-a[0][imageSizeLabel]"]').text('Image Size : ');
                $('span[name="group-a[0][imageSizeSpan]"]').text(fileSize+' KB');
                $('label[name="group-a[0][imageSizeLabel]"]').show();
                $('input[name="group-a[0][hdnSelectedFileName]"]').val(fileName);
                $('input[name="group-a[0][hdnSelectedFileType]"]').val(fileType);
            }
        }
        $('div[name*="selectImagePhotoDivName"]').removeClass();
        var storyTypeList = $('input[name="storyTypeList"]:checked').val();
        if(storyTypeList == 'full_screen' || storyTypeList == 'weekend' 
                || storyTypeList == 'before_and_after' || storyTypeList == 'heading_with_two_photo')
        {
            $('div[name*="selectImagePhotoDivName"]').addClass('select-Image-photo-weekend');
            assignAspectRatio = 9/16;
        }
        else if(storyTypeList == 'spliter')
        {
            $('div[name*="selectImagePhotoDivName"]').addClass('select-Image-photo-spliter');
            assignAspectRatio = 16/9;
        }
        else
        {
            $('div[name*="selectImagePhotoDivName"]').addClass('select-Image-photo');
            assignAspectRatio = 1;
        }
        $modal.modal('show');
        $("#hdnIsImageOrVideoAdded").val(1);
    }
    else if(fileType == 'video')
    {
        var imageSource = '/images/photo_video_library/'+fileName;
        handleVideoStorywise(storyTypeList,imageSource,imageSource,fileSize,fileName,imageSource,'select');
        $("#hdnIsImageOrVideoAdded").val(1);
        $('input[name="group-a[0][hdnSelectedFileName]"]').val(fileName);
        $('input[name="group-a[0][hdnSelectedFileType]"]').val(fileType);
    }
    else if(fileType == 'audio')
    {
         var imageSource = '/images/photo_video_library/'+fileName;
        $("#hdnAudioFile").val(1);
        $("#dummyAudioFileAudioId").hide();
        $("#userAudioFileAudioId").show();
        $("#audioSourceId").attr("src", imageSource);
        $("#userAudioFileAudioId").trigger('load');
        
        $('#audioFileNameLabel').text('Image name : ');
        $('#audioFileNameSpan').text(' '+fileName);
        $('#audioFileNameLabel').show();
        
        $('#audioFileSizeLabel').text('Image Size : ');
        $('#audioFileSizeSpan').text(fileSize+' KB');
        $('#audioFileSizeLabel').show();
    }
}
function selectAudioTypeCall(action)
{
    $("#hdnPageNumber").val(1);
    $("#hdnSearchKeyword").val('');
    $("#hdnSearchCategoryId").val('');
    $("#hdnAudioFile").val(0);
    $("#dummyAudioFileAudioId").show();
    $("#userAudioFileAudioId").hide();
    $("#audioSourceId").attr("src", '');
        
    if(action == 'select_from_library')
    {   
        $('#audioSelectButtonId').show();
        $('#timelineAudioDivId').hide();
    }
    else if(action == 'upload')
    {
        $('#audioSelectButtonId').hide();
        $('#timelineAudioDivId').show();
    }
}
function openOrClosePhotoCrediterName()
{
    if($('input[name=isShowPhotoCrediterName]').is(':checked'))
    {
        $("#photoCrediterNameDivId").show();
    }
    else
    {
        $("#photoCrediterName").val('');
        $("#photoCrediterNameDivId").hide();
    }
}

function displayWeekendMultipleImages(input)
{
    var storyTypeList = $('input[name="storyTypeList"]:checked').val();
    var getImageName = $(input).closest('.row').find('#weekend_image_file').attr('name');

    var counterNumber = getImageName.substring(0, 10);
    var weekendImageNameLabel = counterNumber+'[weekendImageNameLabel]';
    var weekendImageNameSpan = counterNumber+'[weekendImageNameSpan]';
    var weekendImageSizeLabel = counterNumber+'[weekendImageSizeLabel]';
    var weekendImageSizeSpan = counterNumber+'[weekendImageSizeSpan]';
    
    var weekendFilePreviewImgId = counterNumber+'[weekendFilePreviewImgId]';
    var weekendFilePreviewDivId = counterNumber+'[weekendFilePreviewDivId]';
    
    if(isImage(input.files[0].name) === false)
    {
        $('span[name="'+weekendImageNameSpan+'"]').text('');
        $('label[name="'+weekendImageNameLabel+'"]').hide();
        $('span[name="'+weekendImageSizeSpan+'"]').text('');
        $('label[name="'+weekendImageSizeLabel+'"]').hide();
        
        $('img[name="'+weekendFilePreviewImgId+'"]').attr("src", '');
        $('div[name="'+weekendFilePreviewDivId+'"]').hide();
                
        swal("Sorry", "You can select only image", "error");
        $('#image_file').val(null);
        return false;
    }
    else
    { 
        if (input.files && input.files[0])
        {
            var done = function (url) 
            {
                image.src = url;
                if (/^image\/\w+/.test(input.files[0].type))
                {
                    var fileSize = input.files[0].size;
                    var imageSizeInMb = (fileSize / (1024*1024)).toFixed(2)+' MB';
                    $('label[name="'+weekendImageNameLabel+'"]').text('Image name : ');
                    $('span[name="'+weekendImageNameSpan+'"]').text(' '+input.files[0].name);
                    $('label[name="'+weekendImageNameLabel+'"]').show();

                    $('label[name="'+weekendImageSizeLabel+'"]').text('Image Size : ');
                    $('span[name="'+weekendImageSizeSpan+'"]').text(imageSizeInMb);
                    $('label[name="'+weekendImageSizeLabel+'"]').show();
                    
                    $("#hdnMultipleImagesCurrentInput").val(getImageName);
                    $('div[name*="selectImagePhotoDivName"]').removeClass();
        var storyTypeList = $('input[name="storyTypeList"]:checked').val();
        if(storyTypeList == 'full_screen' || storyTypeList == 'weekend' 
                || storyTypeList == 'before_and_after' || storyTypeList == 'heading_with_two_photo')
        {
            $('div[name*="selectImagePhotoDivName"]').addClass('select-Image-photo-weekend');
            assignAspectRatio = 9/16;
        }
        else if(storyTypeList == 'spliter')
        {
            $('div[name*="selectImagePhotoDivName"]').addClass('select-Image-photo-spliter');
            assignAspectRatio = 16/9;
        }
        else
        {
            $('div[name*="selectImagePhotoDivName"]').addClass('select-Image-photo');
            assignAspectRatio = 1;
        }
                    $modal.modal('show');
                    $("#modalLabel").text(input.files[0].name);
                }
            };
            if (URL) 
            {
                done(URL.createObjectURL(input.files[0]));
            } 
            else if (FileReader) 
            {
                reader = new FileReader();
                reader.onload = function (e) 
                {
                    done(reader.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    }
}
function displayMultipleImagesForFourImage(input)
{
    var storyTypeList = $('input[name="storyTypeList"]:checked').val();
    var getImageName = $(input).closest('.row').find('#four_images_file').attr('name');

    var counterNumber = getImageName.substring(0, 10);
    var fourImageNameLabel = counterNumber+'[fourImageNameLabel]';
    var fourImageNameSpan = counterNumber+'[fourImageNameSpan]';
    var fourImageSizeLabel = counterNumber+'[fourImageSizeLabel]';
    var fourImageSizeSpan = counterNumber+'[fourImageSizeSpan]';
    
    var fourImageFilePreviewImgId = counterNumber+'[fourImageFilePreviewImgId]';
    var fourImageFilePreviewDivId = counterNumber+'[fourImageFilePreviewDivId]';
    
    if(isImage(input.files[0].name) === false)
    {
        $('span[name="'+fourImageNameSpan+'"]').text('');
        $('label[name="'+fourImageNameLabel+'"]').hide();
        $('span[name="'+fourImageSizeSpan+'"]').text('');
        $('label[name="'+fourImageSizeLabel+'"]').hide();
        $('img[name="'+fourImageFilePreviewImgId+'"]').attr("src", '');
        $('img[name="'+fourImageFilePreviewImgId+'"]').hide();
        $('div[name="'+fourImageFilePreviewDivId+'"]').hide();
        
        swal("Sorry", "You can select only image", "error");
        $('#image_file').val(null);
        return false;
    }
    else
    { 
        if (input.files && input.files[0])
        {
            var done = function (url) 
            {
                image.src = url;
                if (/^image\/\w+/.test(input.files[0].type))
                {
                    var fileSize = input.files[0].size;
                    var imageSizeInMb = (fileSize / (1024*1024)).toFixed(2)+' MB';
                    $('label[name="'+fourImageNameLabel+'"]').text('Image name : ');
                    $('span[name="'+fourImageNameSpan+'"]').text(' '+input.files[0].name);
                    $('label[name="'+fourImageNameLabel+'"]').show();

                    $('label[name="'+fourImageSizeLabel+'"]').text('Image Size : ');
                    $('span[name="'+fourImageSizeSpan+'"]').text(imageSizeInMb);
                    $('label[name="'+fourImageSizeLabel+'"]').show();
                    
                    $("#hdnMultipleImagesCurrentInput").val(getImageName);
                    $('div[name*="selectImagePhotoDivName"]').removeClass();
        var storyTypeList = $('input[name="storyTypeList"]:checked').val();
        if(storyTypeList == 'full_screen' || storyTypeList == 'weekend' 
                || storyTypeList == 'before_and_after' || storyTypeList == 'heading_with_two_photo')
        {
            $('div[name*="selectImagePhotoDivName"]').addClass('select-Image-photo-weekend');
            assignAspectRatio = 9/16;
        }
        else if(storyTypeList == 'spliter')
        {
            $('div[name*="selectImagePhotoDivName"]').addClass('select-Image-photo-spliter');
            assignAspectRatio = 16/9;
        }
        else
        {
            $('div[name*="selectImagePhotoDivName"]').addClass('select-Image-photo');
            assignAspectRatio = 1;
        }
                    $modal.modal('show');
                    $("#modalLabel").text(input.files[0].name);
                }
            };
            if (URL) 
            {
                done(URL.createObjectURL(input.files[0]));
            } 
            else if (FileReader) 
            {
                reader = new FileReader();
                reader.onload = function (e) 
                {
                    done(reader.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    }
}
function checkPreviousDataValidation()
{
    $.ajax({
        url: checkPreviousFullScreenData,
        method:'POST',
        dataType:'json',
        success: function(response) 
        {
            var status = response[0];
            if (status == 1) 
            {
                var imagePath = response[1];
                var title = response[2];
                var slug = response[3];
                
                $("#imageFullScreenId img").attr('src',imagePath);
                $("#slugFullScreenId").text(title);
                $("#timeLineHeadingFullScreenId").text(slug);
                $("#previousFullScreenModal").show();
                $("body").append('<div class="modal-backdrop fade show"></div>');
            }
            return false;
        },
        error: function(data) 
        {
            console.log("XHR :: "+JSON.stringify(XMLHttpRequest));
            console.log("Status :: "+errorStatus);
            console.log("error :: "+errorThrown);

            if(errorThrown == 'abort' || errorThrown == 'undefined') 
                return;
            var errorStatus = XMLHttpRequest['status'];
            if(errorThrown == 'timeout')
            {
                var errorMessageTemp = 'Request has been timeout. Please check your internet connection! (Error: '+errorStatus+')';
                console.log(errorMessageTemp);

            }
            else
            {
                var errorMessageTemp = 'There is something wrong! Please try again! (Error: '+errorStatus+')';

                console.log(errorMessageTemp);
            }

            return false;
        }
    })
}
function fullScreenConfirmation(action)
{
    if(action == 'yes')
    {
        $.ajax({
        url: fullScreenDataMarkAsDelete,
        method:'POST',
        dataType:'json',
        success: function(response) 
        {
            var status = response[0];
            if (status == 1) 
            {
                $("#previousFullScreenModal").hide();
                $(".modal-backdrop").remove();
            }
            return false;
        },
        error: function(data) 
        {
            console.log("XHR :: "+JSON.stringify(XMLHttpRequest));
            console.log("Status :: "+errorStatus);
            console.log("error :: "+errorThrown);

            if(errorThrown == 'abort' || errorThrown == 'undefined') 
                return;
            var errorStatus = XMLHttpRequest['status'];
            if(errorThrown == 'timeout')
            {
                var errorMessageTemp = 'Request has been timeout. Please check your internet connection! (Error: '+errorStatus+')';
                console.log(errorMessageTemp);

            }
            else
            {
                var errorMessageTemp = 'There is something wrong! Please try again! (Error: '+errorStatus+')';

                console.log(errorMessageTemp);
            }

            return false;
        }
    })
    }
    else if(action == 'no')
    {
        location.reload();
    }
}
function afterDescriptionPreviewFunction()
{
    var countForDescription = $('textarea[name*=afterDescription]').length;
    
    var descriptionHtml = '';
    for(var i =0; i < parseInt(countForDescription); i++)
    {
        var descriptionVal = $('textarea[name="group-f['+i+'][afterDescription]"]').val();
        descriptionHtml += '<li class="text_mono">'+descriptionVal+'</li>';
    }
    if(descriptionHtml != '')
    {
        $("#userAfterBulletsPoints").html(descriptionHtml);
        $("#userAfterBulletsPoints").show();
        $("#dummyAfterBulletsPoints").hide();
    } 
    else
    {
        $("#dummyAfterBulletsPoints").show();
        $("#userAfterBulletsPoints").hide();
    }
}
function convertTo24Hour(time) 
{
    var hours = parseInt(time.substr(0, 2));
    if(time.indexOf('AM') != -1 && hours == 12) {
        time = time.replace('12', '0');
    }
    if(time.indexOf('PM')  != -1 && hours < 12) {
        time = time.replace(hours, (hours + 12));
    }
    return time.replace(/(AM|PM)/, '');
}
function checkFutureDateValidation()
{
    //alert('inisde check future date');
    var justDate = $('#just_date').data('daterangepicker').startDate.format('YYYY-MM-DD');
    var justTime = $('#timepicker').val();
    var choseDateTime = '';
    if(justTime != '')
    {
        if(justTime != undefined)
        {
            choseDateTime = justDate+' '+convertTo24Hour(justTime); 
        } 
    }
    
    var currentDateTime = currentToday+' '+currentTimeWithJs;
    
    /*https://stackoverflow.com/questions/18913579/compare-two-date-formats-in-javascript-jquery*/
    if( new Date(currentDateTime).getTime() > new Date(choseDateTime).getTime() )
    {
        //console.log(currentDateTime + " currentDateTime is greater."); // your code
        $("#draftButtonId").text('Save');
        $("#publishButtonId").show();
    }
    else if( new Date(currentDateTime).getTime() < new Date(choseDateTime).getTime() )
    {
       // console.log(choseDateTime + "choseDateTime is greater."); // your code
        $("#draftButtonId").text('Save to story bank');
        $("#publishButtonId").hide();
    }
    else
    {
       // console.log("both are same!"); // your code
        $("#draftButtonId").text('Save');
        $("#publishButtonId").show();
    }

//    if(justDate > today)
//    {
//        $("#draftButtonId").text('Save to story bank');
//        $("#publishButtonId").hide();
//    }
//    else
//    {
//        $("#draftButtonId").text('Save');
//        $("#publishButtonId").show();
//    }
}
function setLogoUpload()
{
    if($("#isShowLogoOnTop").prop('checked') == true)
    {
        $("#logoUploadDivId").show();
        selectLogoUpload();
    }
    else
    {
        $("#companyLogoColorDisplayDivId").hide();
        $("#logoUploadDivId").hide();
    }
}
function selectLogoUpload()
{
    if(setLogoUploadEdit == 0)
    {
        $("input[name='companyLogoColor']").prop("checked", false);
        $("input[name=companyLogoColor][value='light']").prop('checked', true);
    }
    
    var logoUploadId = $("#logoUploadId").val();
    if(logoUploadId != '')
    {
        var logoDark = $('#logoUploadId').find(":selected").attr('data-dark-image');
        var logoLight = $('#logoUploadId').find(":selected").attr('data-light-image');
        
        
        if(logoDark != '' && logoLight != '')
        {
            $("#companyLogoColorDisplayDivId").show();
            
            if(setLogoUploadEdit == 1)
            {
                var companyLogoColor = $("input[name='companyLogoColor']:checked").val();
                companyLogoColorAssign(companyLogoColor);
            }
            else
            {
                companyLogoColorAssign('light');
            }
        }
        else if(logoDark != '')
        {
            $("#companyLogoColorDisplayDivId").hide();
            companyLogoColorAssign('dark');
        }
        else if(logoLight != '')
        {
            $("#companyLogoColorDisplayDivId").hide();
            companyLogoColorAssign('light');
        }
        else
        {
            $("#companyLogoColorDisplayDivId").hide();
        }
    }
    setLogoUploadEdit = 0;
}
function companyLogoColorAssign(action)
{
    $("#hdnCompanyLogoColor").val(action);
    
    var logoUploadId = $("#logoUploadId").val();
    if(logoUploadId != '')
    {
        var logoDark = $('#logoUploadId').find(":selected").attr('data-dark-image');
        var logoLight = $('#logoUploadId').find(":selected").attr('data-light-image');
        
        if(logoDark != '' && logoLight != '')
        {
            $("#companyLogoColorDisplayDivId").show();
            var fullDarkImagePath = "../../../images/logo_upload_library/"+logoDark;
            $("div[name=showHideNewsFirstLogo] img").attr('src',fullDarkImagePath);
        }
        else if(logoDark != '')
        {
            var fullDarkImagePath = "../../../images/logo_upload_library/"+logoDark;
            $("div[name=showHideNewsFirstLogo] img").attr('src',fullDarkImagePath);
        }
        else if(logoLight != '')
        {
            var fullDarkImagePath = "../../../images/logo_upload_library/"+logoLight;
            $("div[name=showHideNewsFirstLogo] img").attr('src',fullDarkImagePath);
        }
        else 
        {
            $("#companyLogoColorDisplayDivId").hide();
            var fullDarkImagePath = "../../../images/logo_upload_library/"+logoDark;
            $("div[name=showHideNewsFirstLogo] img").attr('src',fullDarkImagePath);
        }
        
        if(action == 'dark')
        {
            var fullDarkImagePath = "../../../images/logo_upload_library/"+logoDark;
            $("div[name=showHideNewsFirstLogo] img").attr('src',fullDarkImagePath);
        }
        if(action == 'light')
        {
            var fullLightImagePath = "../../../images/logo_upload_library/"+logoLight;
            $("div[name=showHideNewsFirstLogo] img").attr('src',fullLightImagePath);
        }
    }
}
function appTypeCheckedCall(appTypeValue)
{
    if(appTypeValue == 'all')
    {
        if($('input:checkbox[name="appType"][value="all"]').prop('checked') == true)
        {
            $('input:checkbox[name="appType"][value="gujarati"]').prop('checked',true);
            $('input:checkbox[name="appType"][value="english"]').prop('checked',true);
            $('input:checkbox[name="appType"][value="stock_up"]').prop('checked',true);
        }
        else
        {
            $('input:checkbox[name="appType"][value="gujarati"]').prop('checked',false);
            $('input:checkbox[name="appType"][value="english"]').prop('checked',false);
            $('input:checkbox[name="appType"][value="stock_up"]').prop('checked',false);
        }
    }
}

$('#txtTagMaster').select2({
    ajax: {
        url: storyTagMasterAutoComplete,
        dataType: "json",
        type: "POST",
        data: function (params) 
        {
            var queryParameters = 
            {
                search: params.term
            }
            return queryParameters;
        },
        processResults: function (data, params) {
            params.page = params.page || 1;
            return {
                results: $.map(data, function (tag) {
                    return {
                        text: tag.name,
                        id: tag.id,
                        result:tag
                    }
                }),
                pagination: {
                    more: (params.page * 30) < data.total_count
                }
            };
        },
        cache: true,
    },
    placeholder: 'Select Tag',
    minimumInputLength: 1

}).on("select2:select", function (e) 
{
    var selected = e.params.data.result;
    var tagId = selected.id;
    var tagName = selected.name;
    var editHiddenVal = $("#hdnTagMasterId").val();
    
    if(tagName == 'other' || tagName == 'Other')
    {
        $("#tagOtherDivId").show();
    }
    else
    {
        $("#txtTagMasterOther").val('');
        $("#tagOtherDivId").hide();
    }
    $('#hdnTagMasterId').val(tagId); //store array   
    $('#hdnTagMasterName').val(tagName); //store array   
});
$('#txtTagMaster').on('select2:unselect', function (e) {
    var data = e.params.data; 
    var tagId = data.id;

    var editHiddenVal = $('#hdnTagMasterId').val();
    $('#hdnTagMasterId').val('');
    $('#hdnTagMasterName').val(''); //store array   
});
function showHideTag()
{
    if($('input:checkbox[name="isShowTag"]').prop('checked') == true)
    {
        $("#tagSelectedDivId").show();
    }
    else
    {
        $("#txtTagMaster").val(null).trigger('change');
        $("#txtTagMasterOther").val('');
        $("#txtTagMasterOther").attr('maxlength','30');
        $('small[name="txtTagMasterOther_max_characters"]').html('Max 30 Characters');
        $("#tagSelectedDivId").hide();
        $('#hdnTagMasterId').val(''); 
        $('#hdnTagMasterName').val('');
    }
}
function removeImage(input,action)
{
    var storyTypeList = $('input[name="storyTypeList"]:checked').val();
    if(action == 'cropped_cover_photo')
    {
        if(storyTypeList == 'photo_album' || storyTypeList == 'story_album')
        {
            var currentFileImageName = $(input).attr('name');
            var counterNumber = currentFileImageName.substring(0, 10);
            $("#hdnMultipleImagesCurrentInput").val(currentFileImageName);
        }
    
        cancelCropImage();
    }
    else if(action == 'cropped_credit_logo')
    {
        isCreditLogoCall = 1;
        cancelCropImage();
    }
    else if(action == 'four_images_cropped_cover_photo')
    {
        var currentFileImageName = $(input).attr('name');
        var counterNumber = currentFileImageName.substring(0, 10);
        $("#hdnMultipleImagesCurrentInput").val(currentFileImageName);
        cancelCropImage();
    }
    else if(action == 'weekend_cropped_cover_photo')
    {
        var currentFileImageName = $(input).attr('name');
        var counterNumber = currentFileImageName.substring(0, 10);
        $("#hdnMultipleImagesCurrentInput").val(currentFileImageName);
        cancelCropImage();
    }
}
/*https://stackoverflow.com/questions/20318822/how-to-create-a-stopwatch-using-javascript*/
var x;
var startstop = 0;
function startTimer() {
  x = setInterval(timer, 10);
} /* Start */

function stopTimer() 
{
  clearInterval(x);
} /* Stop */

//var milisec = 0;
var sec = 0; /* holds incrementing value */
var min = 0;
var hour = 0;

/* Contains and outputs returned value of  function checkTime */

//var miliSecOut = 0;
var secOut = 0;
var minOut = 0;
var hourOut = 0;

/* Output variable End */
function timer() 
{
  /* Main Timer */
  miliSecOut = checkTime(milisec);
  secOut = checkTime(sec);
  minOut = checkTime(min);
  hourOut = checkTime(hour);

  milisec = ++milisec;

  if (milisec === 100) {
    milisec = 0;
    sec = ++sec;
  }

  if (sec == 60) {
    min = ++min;
    sec = 0;
  }

  if (min == 60) {
    min = 0;
    hour = ++hour;

  }
  //document.getElementById("milisec").innerHTML = miliSecOut;
  document.getElementById("sec").innerHTML = secOut;
  document.getElementById("min").innerHTML = minOut;
  document.getElementById("hour").innerHTML = hourOut;
  
  $("#totalTimeTakenSpanId").text(hourOut+':'+minOut+':'+secOut);
}
/* Adds 0 when value is <10 */

function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}
function reset() 
{
  /*Reset*/
    milisec = 0;
    sec = 0;
    min = 0
    hour = 0;

    //document.getElementById("milisec").innerHTML = "00";
    document.getElementById("sec").innerHTML = "00";
    document.getElementById("min").innerHTML = "00";
    document.getElementById("hour").innerHTML = "00";
    clearInterval(x);
}
function showHideNotes()
{
    if($('input:checkbox[name="isShowNotes"]').prop('checked') == true)
    {
        $("#notesDivId").show();
    }
    else
    {
        $("#txtNotes").val('');
        $("#notesDivId").hide();
    }
}
function openOrCloseImageNamePlate()
{
    if($('input:checkbox[name="isImageNamePlate"]').prop('checked') == true)
    {
        $("#namePlateColorDivId").show();
        $("#nameFontColorDivId").show();
        $("#namePlateDivId").show();
        $("#namePlateBackgroundColorDivId").show();
        $("#designationFontColorDivId").show();
        $("#designationPlateDivId").show();
    }
    else
    {
        $("#designationPlate").val('');
        $("#namePlate").val('');
        $("select[id=nameFontColor]").val('#000000');
        $("select[id=namePlateColor]").val('#53afff');
        $("select[id=namePlateBackgroundColor]").val('#FFFFFF');
        $("select[id=designationFontColor]").val('#000000');
    
        $("#namePlateColorDivId").hide();
        $("#nameFontColorDivId").hide();
        $("#namePlateBackgroundColorDivId").hide();
        $("#namePlateDivId").hide();
        $("#designationFontColorDivId").hide();
        $("#designationPlateDivId").hide();
    }
}
function countdown() 
{
    var currentDateTime = tempToday;
    var countDownDateTime = $('#countDownDateTime').data('daterangepicker').startDate.format('MM/DD/YYYY');
    
    var date1 = new Date(currentDateTime);
    var date2 = new Date(countDownDateTime);
    var Difference_In_Time = date2.getTime() - date1.getTime();
    // To calculate the no. of days between two dates
    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

    $("#countDownPreviewDays").text(Difference_In_Days);
}

function selectPhotoCreditorOrNamePlate()
{
    $("#isShowPhotoCrediterName").prop('disabled',false);
    $("#isShowRedColorLine").prop('disabled',false);
    $("#isImageNamePlate").prop('disabled',false);
    
    if($("#isShowRedColorLine").prop('checked') == true)
    {
        $("#isImageNamePlate").prop('disabled',true);
    }
    if($("#isShowPhotoCrediterName").prop('checked') == true)
    {
        $("#isImageNamePlate").prop('disabled',true);
    }
    if($("#isImageNamePlate").prop('checked') == true)
    {
        $("#isShowPhotoCrediterName").prop('disabled',true);
        $("#isShowRedColorLine").prop('disabled',true);
    }
}
function showCancelPopup()
{
    swal({
        title: "Are you sure?",
        text: "You want to Cancel",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: true,
        closeOnCancel: true
        },
        function(isConfirm) 
        {
            if (isConfirm) 
            {
                location.reload();
            } 
            else 
            {
                isConfirm.dismiss;
            }
        }, function (dismiss) {
            return false;
        }
    );
}
