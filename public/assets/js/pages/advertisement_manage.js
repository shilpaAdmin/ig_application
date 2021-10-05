function searchDataByDate()
{
    var searchStartDate = $("#searchStartDate").val();
    var searchEndDate = $("#searchEndDate").val();
    var hdnAdvManageId = $("#hdnAdvManageId").val();
    
    var isValid = 1;
    if(searchStartDate != '' && searchStartDate != '')
    {
        var start = $("#searchStartDate").datepicker("getDate");
        var end = $("#searchEndDate").datepicker("getDate");
        if(start > end)
        {
            isValid = 0;
            swal("Sorry", "Sorry Start Date Can't Be Greater Then End Date", "error");
        }
    }
    if(hdnAdvManageId == '')
    {
        isValid = 0;
    }
   
    if(isValid)
    {
        ajaxDetailListing = $.ajax({
            url: advertisementManageDetailList,
            method:'POST',
            dataType: "html",
            data:
            {
                searchStartDate:searchStartDate,
                searchEndDate:searchEndDate,
                hdnAdvManageId:hdnAdvManageId
            },
            beforeSend : function()
            {
                /*kill the request in case any active request present
                http://www.thedevlogs.com/cancel-abort-previous-ajax-request-jquery/
                */
                if (ajaxDetailListing != 'ToCancelPrevReq' && ajaxDetailListing.readyState < 4)
                    ajaxDetailListing.abort();
            },
            success:function(response)
            {
                
                $("#listingDataDivId").html(response);
                 $(window).scrollTop(0);
            },
            error: function(XMLHttpRequest, errorStatus, errorThrown)
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
                $("#noRecordsFoundDivId").show();
                $("#listingDataDivId").hide();
                //$(window).scrollTop(0);
                return false;
            },
            complete : function()
            {

            }
        })
    }
}
function editAdvManageDetailRecord(advManageDetailId)
{
    $("#hdnAdvManageDetailId").val(advManageDetailId);
    ajaxListing = $.ajax({
            url: getEditData,
            method:'POST',
            dataType: "json",
            data:
            {
                advManageDetailId:advManageDetailId
            },
            beforeSend : function()
            {
                /*kill the request in case any active request present
                http://www.thedevlogs.com/cancel-abort-previous-ajax-request-jquery/
                */
                if (ajaxListing != 'ToCancelPrevReq' && ajaxListing.readyState < 4)
                    ajaxListing.abort();
            },
            success:function(response)
            {
                var editData = response['edit_array'];

                console.log(JSON.stringify(editData));
                var adv_manage_id = editData[0]['adv_manage_id'];
                $("#hdnAdvManageId").val(adv_manage_id);

                var customer_id = editData[0]['customer_id'];
                var description = editData[0]['description'];
                var app_type = editData[0]['app_type'];
                var advertisement_type = editData[0]['advertisement_type'];
                var advertisement_package_id = editData[0]['advertisement_package_id'];
                var timeline_id = editData[0]['timeline_id'];
                var slot_id = editData[0]['slot_id'];
                var media_file = editData[0]['media_file'];
                var cost = editData[0]['cost'];
                var start = editData[0]['start'];
                var end = editData[0]['end'];
                var no_of_days = editData[0]['no_of_days'];
                var total = editData[0]['total'];
                var advertisement_title = editData[0]['advertisement_title'];
                var advertisement_link = editData[0]['advertisement_link'];
                $("#txtAdvertisementTimer").val('');
                $("#txtAdvertisementUnit").val('');
                if(advertisement_type == 'full_screen_popup' || advertisement_type == 'bottom_popup' || advertisement_type == 'small_logo')
                {
                    var advertisement_time = editData[0]['advertisement_time'];
                    var advertisement_unit = editData[0]['advertisement_unit'];
                    
                    if(advertisement_time != '')
                    {
                        $("#txtAdvertisementTimer").val(advertisement_time);
                    }
                    if(advertisement_unit != '')
                    {
                        $("#txtAdvertisementUnit").val(advertisement_unit);
                    }
                }
                var start_time = editData[0]['start_time'];
                var end_time = editData[0]['end_time'];
                
                var branded_slug = editData[0]['branded_slug'];
                var branded_header = editData[0]['branded_header'];
                var branded_description = editData[0]['branded_description'];
                
                
                $('select[name="customer_id"] [value='+customer_id+']').attr("selected", "selected");
                $('textarea[name="description"]').val(description);
                selectedAdvertisementPackageId = advertisement_package_id;
                stockupAppPackagesGet();
                //$('select[name="txtAppType"] [value='+app_type+']').attr("selected", "selected").change();
                $("#txtAdvertisementType").val(advertisement_type);
                $('select[name="txtAdvertisementType"] [value='+advertisement_type+']').attr("selected", "selected").change();
                
                $('select[name="advertisement_package_id"]').val(advertisement_package_id);
                $('select[name="slot_id"]').empty();
                $('select[name="slot_id"]').append("<option value=''>Select Slot</option>");

                // $('input[name="media_file"]').prop('required',false);
                $.each(response.slot_array, function(k, v)
                {
                    if(v['id'] == slot_id)
                        var selected = 'selected="selected"';
                    else
                        var selected = '';

                    $('select[name="slot_id"]').append("<option value='"+v['id']+"' "+selected+">"+v['start_time']+" - "+v['end_time']+"</option>");
                });

                $('input[name="cost"]').val(cost);
                $('input[name="start"]').val(start);
                $('input[name="end"]').val(end);
                $('input[name="no_of_days"]').val(no_of_days);
                $('input[name="total"]').val(total);
                $('input[name="txtAdvertisementTitle"]').val(advertisement_title);
                $('input[name="txtAdvertisementLink"]').val(advertisement_link);
                $('input[name="hdnMediaFile"]').val(media_file);
                $('input[name="cropped_cover_photo"]').val(media_file);
              
                $('input[name="txtAdvertisementSlug"]').val(branded_slug);
                $('input[name="txtAdvertisementHeader"]').val(branded_header);
                $('textarea[name="txtAdvertisementText"]').val(branded_description);
                advertiseManageFunction();
                var smallImageFullPathUrl,bigImageFullPathUrl,videoImageFullPathUrl = '';
                $('div[name="splashAdvPageOneDivId"]').hide();
                $('div[name="smallAdvImageTwoDivId"]').hide();
                $('div[name="brandedAdvContentDivId"]').hide();
                $('div[name="fullScreenAdvPopUpDivId"]').hide();
                $('div[name="simpleJpgAndVideoAdvDivId"]').hide();
                $('div[name="smallLogoWithAdvTimerDivId"]').hide();
                $('div[name="twitterLikeSpaceAdvDivId"]').hide();
                $('div[name="bottomPopUpAdvscreenDivId"]').hide();
                $('#simpleImageVideo').hide();
                $('#fullScreenPopupVideo').hide();
        
                var fullPathUrl =  '/images/advertisement_manage/'+media_file;
                if(advertisement_type == 'splash_page_1')
                {
                    $("#hdnIsImageOrVideoAdded").val(1);
                    $('div[name="splashAdvPageOneDivId"] img').attr("src", fullPathUrl);
                    $('div[name="splashAdvPageOneDivId"]').show();
                }
                else if(advertisement_type == 'splash_page_2')
                {
                    $("#hdnIsImageOrVideoAdded").val(1);
                    $('div[name="splashAdvPageTwoDivId"] img').attr("src", fullPathUrl);
                    $('div[name="splashAdvPageTwoDivId"]').show();
                }
                else if(advertisement_type == 'branded_content')
                {
                    $("#hdnIsImageOrVideoAdded").val(1);
                    $('div[name="brandedAdvContentDivId"] img').attr("src", fullPathUrl);
                    $('div[name="brandedAdvContentDivId"]').show();
                }
                else if(advertisement_type == 'full_screen_popup')
                {
                    $("#hdnIsImageOrVideoAdded").val(1);
                    if(isImage(media_file))
                    {
                        $('div[name="fullScreenAdvPopUpDivId"] img').attr("src", fullPathUrl);
                        $('div[name="fullScreenAdvPopUpDivId"]').show();
                        $('#fullScreenPopupVideo').hide();
                    }
                    else if(isVideo(media_file))
                    {
                        $('#fullScreenPopupVideo source').attr("src", fullPathUrl);
                        $('#fullScreenPopupVideo')[0].load();
                        $('#fullScreenPopupVideo').show();
                        $('div[name="fullScreenAdvPopUpDivId"]').hide();
                        
                        //alert($('#fullScreenPopupVideo source').attr("src"));
                    }
                }
                else if(advertisement_type == 'simple_image')
                {
                    $("#hdnIsImageOrVideoAdded").val(1);
                    if(isImage(media_file))
                    {
                        $('div[name="simpleJpgAndVideoAdvDivId"] img').attr("src", fullPathUrl);
                        $('div[name="simpleJpgAndVideoAdvDivId"]').show();
                        $('#simpleImageVideo').hide();
                    }
                    else if(isVideo(media_file))
                    {
                        $('#simpleImageVideo source').attr("src", fullPathUrl);
                        $('#simpleImageVideo')[0].load();
                        $('#simpleImageVideo').show();
                        $('div[name="fullScreenAdvPopUpDivId"]').hide();
                    }
                }
                else if(advertisement_type == 'small_logo')
                {
                    $("#hdnIsImageOrVideoAdded").val(1);
                    $('div[name="smallLogoWithAdvTimerDivId"] img').attr("src", fullPathUrl);
                    $('div[name="smallLogoWithAdvTimerDivId"]').show();
                }
                else if(advertisement_type == 'twitter_like')
                {
                    $("#hdnIsImageOrVideoAdded").val(1);
                    $('div[name="twitterLikeSpaceAdvDivId"] img').attr("src", fullPathUrl);
                    $('div[name="twitterLikeSpaceAdvDivId"]').show();
                }
                else if(advertisement_type == 'bottom_popup')
                {
                    $("#hdnIsImageOrVideoAdded").val(1);
                    $('div[name="bottomPopUpAdvscreenDivId"] img').attr("src", fullPathUrl);
                    $('div[name="bottomPopUpAdvscreenDivId"]').show();
                }
                //pageLoadCustomize();
               // setAdvPackageDataCall();
                $(window).scrollTop(0);
            },
            error: function(XMLHttpRequest, errorStatus, errorThrown)
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
            },
            complete : function()
            {

            }
        });
}
function setAdvPackageDataCall()
{
    var packageId = $('select[name="advertisement_package_id"]').val();
    var txtAdvertisementTypeValue = $('select[name="txtAdvertisementType"]').val();
    if(packageId != '' && txtAdvertisementTypeValue != '')
    {
        //$("#txtPackageId_"+currentCounter).empty();
        $('select[name="timeline_id"]').empty();
        $('select[name="slot_id"]').empty();
         $.ajax({
            url:slotTimelineDetail,
            type: 'POST',
            data:{"id":packageId,"advType":txtAdvertisementTypeValue},
            success: function(response)
            {
                $('select[name="slot_id"]').append("<option value=''>Select Slot</option>");
                $('select[name="timeline_id"]').append("<option value=''>Select Timeline</option>");

                console.log(response);
                $.each(response.slot_array, function(k, v)
                {
                    $('select[name="slot_id"]').append("<option value='"+v['id']+"'>"+v['start_time']+" - "+v['end_time']+"</option>");
                });

                $.each(response.timeline_array, function(k, v)
                {
                   $('select[name="timeline_id"]').append("<option value='"+v['id']+"'>"+v['title']+"</option>");
                });
            }
        });
    }
    else
    {
        $('select[name="slot_id"]').empty();
        $('select[name="timeline_id"]').empty();
        $('select[name="slot_id"]').append("<option value=''>Select Slot</option>");
        $('select[name="timeline_id"]').append("<option value=''>Select Timeline</option>");
    }
}
function clearCurrentForm()
{
    $("#hdnIsImageOrVideoAdded").val('');
    var descriptionVal = $('textarea[name="description"]').val();
    var hdnCustomerId = $("#hdnCustomerId").val();
    var hdnAdvManageId = $("#hdnAdvManageId").val();

    $('#advManageForm')[0].reset();
    $('textarea[name="description"]').val(descriptionVal);
    $("#hdnCustomerId").val(hdnCustomerId);
    $("#hdnAdvManageId").val(hdnAdvManageId);

    setPreviewDefault();
    //$("#advManageForm").validate().resetForm();
    //$(".error").removeClass("error");
    //$(".invalid-feedback").hide();
    
    $("#cropped_cover_photo").val('');
    $("#hdnAdvManageDetailId").val('');
    $("#hdnMediaFile").val('');
    $("#isCutomerDuplicate").val(0);
    $("#isDateDuplicate").val(0);
    // $('input[name="media_file"]').prop('required',true);
    $('select[name="slot_id"]').empty();
    $('select[name="slot_id"]').append("<option value=''>Select Slot</option>");

    //$('select[name="advertisement_package_id"]').empty();
   // $('select[name="advertisement_package_id"]').append("<option value=''>Select Package</option>");
   
    $('select[name="advertisement_package_id"]').find('option:selected').removeAttr('selected');
    $('select[name="txtAppType"]').find('option:selected').removeAttr('selected');
    $('select[name="txtAdvertisementType"]').find('option:selected').removeAttr('selected');
    //$('select[name="txtAdvertisementType"] [value="splash_page_1"]').attr("selected", "selected").change();
}

$(document).on('submit', '#advManageForm', function(e)
{
    e.preventDefault();
    $('select[name="customer_id"]').removeAttr('disabled');
    
    var form_cust = $('#advManageForm')[0];
    var form1 = new FormData(form_cust);
    var form_url = $('#advManageForm').attr('action');

    var isCutomerDuplicate = $("#isCutomerDuplicate").val();
    var isDateDuplicate = $("#isDateDuplicate").val();
    var hdnIsImageOrVideoAdded = $("#hdnIsImageOrVideoAdded").val();
    var isValid = true;
    //alert( $('input[name="cropped_cover_photo"]').val());
    if(hdnIsImageOrVideoAdded == '')
    {
        $("#errorImage").text('Image is required');
        $("#errorImage").show();
        isValid = false;
    }
    if(isDateDuplicate == 1)
    {
        $("#errorStartDate").text('Data is already present for selected date. Please try again.');
        $("#errorStartDate").show();
    }
    if(isCutomerDuplicate == 0 && isValid == true && isDateDuplicate == 0)
    {
        $.ajax({
            type: "POST",
            url: storeAdvertisement,
            data: form1,
            processData: false,
            contentType: false,
            success: function(response)
            {
                if (response > 0)
                {
                    var advManageId = response;

                    swal("Success", "Data added successfully!", "success");
                    var descriptionVal = $('textarea[name="description"]').val();
                    var selectedCustomerId = $('select[name="customer_id"]').find('option:selected').val();
                    $('#advManageForm').removeClass('was-validated');
                    clearCurrentForm();
                    
                    $("#hdnAdvManageId").val(advManageId);
                    $("#hdnCustomerId").val(selectedCustomerId);
                    $('select[name="customer_id"]').attr("disabled", true);
                    $('select[name="customer_id"] [value='+selectedCustomerId+']').attr("selected", "selected");

                    $('textarea[name="description"]').val(descriptionVal);
                    $('textarea[name="description"]').attr("readonly", true);
                    $(window).scrollTop(0);
                    searchDataByDate();
                }
            },
            error: function(data)
            {
                console.log(data);

                $(".error").remove();

                $(".submit").attr("disabled", false);
            }
        })
        return false;
    }
});

function checkCustomerDuplication()
{
    $("#errorCustomerId").text('Please provide a Customer.');
    $("#errorCustomerId").hide();
    var selectedCustomerId = $('select[name="customer_id"]').find('option:selected').val();
    var hdnAdvManageDetailId = $('#hdnAdvManageDetailId').val();

    var isValid = true;

    if(isValid)
    {
        $.ajax({
            url: customerDuplicationCheck,
            method:'POST',
            dataType:'html',
            data: {selectedCustomerId:selectedCustomerId,hdnAdvManageDetailId:hdnAdvManageDetailId},
            success:function(response)
            {
                console.log(response);
                if(response > 0)
                {
                    $("#isCutomerDuplicate").val(1);
                    $("#errorCustomerId").text('Customer Data is already present. Please try with different customer');
                    $("#errorCustomerId").show();
                    isValid = false;
                }
                else
                {
                    $("#errorCustomerId").text('Please provide a Customer.');
                    $("#errorCustomerId").hide();
                    $("#isCutomerDuplicate").val(0);
                }
            }
        })
    }
}


function advertiseManageFunction()
{
//  console.log('inisde kyc function ')
    var txtAdvertisementSlug = $("#txtAdvertisementSlug").val();
    var txtAdvertisementHeader = $("#txtAdvertisementHeader").val();
    var txtAdvertisementText = $("#txtAdvertisementText").val();
    var txtAdvertisementTitle = $("#txtAdvertisementTitle").val();
    
    var advType = $('select[name="txtAdvertisementType"]').val();
    
    switch(advType)
    {
        case 'branded_content':
            if(txtAdvertisementSlug != '')
                $("#advertiseSlug").text(txtAdvertisementSlug);
            else
                $("#advertiseSlug").text('JUST IN');

            if(txtAdvertisementHeader != '')
                $("#advertiseHeader").text(txtAdvertisementHeader);
            else
                $("#advertiseHeader").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');

            if(txtAdvertisementText != '')
                $("#advertiseText").text(txtAdvertisementText);
            else
                $("#advertiseText").text('It has Survived not only five centuries, but also the leap into electronic typesetting.');
        break;
        case 'simple_image':
            if(txtAdvertisementTitle != '')
                $("#simpleImageAdvertisementTitle").text(txtAdvertisementTitle);
            else
                $("#simpleImageAdvertisementTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');

        break;
        case 'bottom_popup':
            if(txtAdvertisementTitle != '')
                $("#bottomPopupAdvertisementTitle").text(txtAdvertisementTitle);
            else
                $("#bottomPopupAdvertisementTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');

            if(txtAdvertisementSlug != '')
                $("#bottomPopupAdvertisementSlug").text(txtAdvertisementSlug);
            else
                $("#bottomPopupAdvertisementSlug").text('Broadcast Live');
        break;
    }
}

function imageType()
{
    var imageTypeData = $('input[name=simplePhoto]:radio:checked').val();
    if(imageTypeData == 'regular_image')
    {
        assignAspectRatio ='1';
    }
    else if(imageTypeData == 'full_image')
    {
        assignAspectRatio =9/16;
    }
}
$( document ).ready(function()
    {

        $('input#txtAdvertisementSlug').maxlength({
            warningClass: "badge bg-info",
            limitReachedClass: "badge bg-warning"
        });
        $('textarea#txtAdvertisementText').maxlength({
            warningClass: "badge bg-info",
            limitReachedClass: "badge bg-warning"
        });
        $('input#txtAdvertisementHeader').maxlength({
            warningClass: "badge bg-info",
            limitReachedClass: "badge bg-warning"
        });

    });

    var $modal = $('#modal');
var image = document.getElementById('image');
var cropper;

var pageLoad = 0;
var advertismentPackage = [];
var assignAspectRatio = 9/16;
$(document).ready(function ()
{
    $('#vertical-menu-btn').click();
    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: assignAspectRatio,
            viewMode: 3,
            resizable:false,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function () {
	    cropper.destroy();
	    cropper = null;
    });
    
    pageLoad = 1;
    $(document).on("change",'.advertisement_package_id,.slot_id,.txtAdvertisementType',function ()
    {
        var attrName = $(this).attr('name');
        var cost = 'cost';
        var slotId = $('select[name="slot_id"]').val();
        var package_id = $('select[name="advertisement_package_id"]').val();
        var timeline_id = $('select[name="timeline_id"]').val();
        var advType = $('select[name="txtAdvertisementType"]').val();

        console.log('bfore package_id :::: '+package_id+' slotId :::: '+slotId+' advType ::: '+advType);

        if((package_id != '' && package_id != null) && (slotId != '' && slotId != null) && (advType != '' && advType != null))
        {
            console.log('after package_id :::: '+package_id+' slotId :::: '+slotId+' advType ::: '+advType);
            $.ajax({
            url:slotDetailUrl,
            type: 'POST',
            data:{"slotId":slotId,"packageId":package_id,"timelineId":timeline_id,"advType":advType},
            success: function( msg )
            {
                if (msg.cost == undefined)
                {
                    $('input[name="'+cost+'"]').val('');
                    //swal("Sorry", "Please add master data for selected data", "error");
                }
                else
                {
                    $('input[name="'+cost+'"]').val(msg.cost);
                    setStartAndEndDateWiseCost(attrName);
                }
            }
            });
        }
    });

    $(document).on("change",'.start_time,.end_time',function ()
    {
        var attrName = $(this).attr('name');
        setStartAndEndDateWiseCost(attrName);

    });

    });
    function stockupAppPackagesGet()
    {
        var appType = $("#txtAppType").val();
        var  advFieldLength = $('select[name="advertisement_package_id"]').length;
        if(appType != '')
        {
            $.ajax({
                url:advPackageByAppTypeUrl,
                type: 'POST',
                data:{"app":appType},
                success: function(response)
                {
                    $('select[name="advertisement_package_id"]').empty();
                    $('select[name="advertisement_package_id"]').append("<option value=''>Select Package</option>");
                    if(response != '')
                    {
                        if(response['adv_package_array'].length > 0)
                        {
                            console.log('advPackageByAppTypeUrl :::: '+response);
                            $.each(response['adv_package_array'], function(k, v)
                            {
                                if(selectedAdvertisementPackageId != '')
                                {
                                    if(v['id'] == selectedAdvertisementPackageId)
                                        var selected = 'selected="selected"';
                                    else
                                        var selected = '';
                                }
                                else
                                {
                                    var selected = '';
                                }
                                $('select[name="advertisement_package_id"]').append("<option value='"+v['id']+"' "+selected+">"+v['title']+"</option>");
                            });
                        }
                    }
                }
            });
            if(appType == 'stockup')
            {
                $('select[name="timeline_id"]').prop('required',false);
                $('div[name="timeLineDiv"]').hide();
            }
            else
            {
                $('select[name="timeline_id"]').prop('required',true);
                $('div[name="timeLineDiv"]').show();
            }
        }
    }
    function setPreviewDefault()
    {
        $("#advertiseSlug").text('JUST IN');
        $("#advertiseHeader").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
        $("#advertiseText").text('It has Survived not only five centuries, but also the leap into electronic typesetting.');
        $("#simpleImageAdvertisementTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
        $("#bottomPopupAdvertisementTitle").text('THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers');
        $("#bottomPopupAdvertisementSlug").text('Broadcast Live');

        $('div[name="splashAdvPageOneDivId"] img').attr("src", '../../../assets/images/amitshah.jpg');
        $('div[name="splashAdvPageTwoDivId"] img').attr("src", '../../../assets/images/amitshah.jpg');
        $('div[name="brandedAdvContentDivId"] img').attr("src", '../../../assets/images/walk.jpg');
        $('div[name="fullScreenAdvPopUpDivId"] img').attr("src", '../../../assets/images/walk.jpg');
        $('div[name="simpleJpgAndVideoAdvDivId"] img').attr("src", '../../../assets/images/walk.jpg');
        $('div[name="smallLogoWithAdvTimerDivId"] img').attr("src", '../../../assets/images/walk.jpg');
        $('div[name="twitterLikeSpaceAdvDivId"] img').attr("src", '../../../assets/images/walk.jpg');
        $('div[name="bottomPopUpAdvscreenDivId"] img').attr("src", '../../../assets/images/walk.jpg');


        $('div[name="splashAdvPageOneDivId"]').show();
        $('div[name="brandedAdvContentDivId"]').show();
        $('div[name="fullScreenAdvPopUpDivId"]').show();
        $('div[name="simpleJpgAndVideoAdvDivId"]').show();
        $('div[name="smallLogoWithAdvTimerDivId"]').show();
        $('div[name="twitterLikeSpaceAdvDivId"]').show();
        $('div[name="bottomPopUpAdvscreenDivId"]').show();
        
        $('#simpleImageVideo').hide();
        $('#fullScreenPopupVideo').hide();
        
        // $('input[name="media_file"]').prop('',true);
    }
    function daysdifference(firstDate, secondDate)
    {
        if(firstDate != '' && secondDate != '')
        {
            var startDay = new Date(firstDate);
            var endDay = new Date(secondDate);

            var millisBetween = startDay.getTime() - endDay.getTime();

            var days = millisBetween / (1000 * 3600 * 24);
            return Math.round(Math.abs(days));
        }
    }

    function setStartAndEndDateWiseCost(attrName)
    {
        var counterNumber = attrName.substring(0, 10);

        var startDate = 'start';
        var endDate = 'end';
        var cost = 'cost';
        var totalCost = 'total';
        var noOfDays = 'no_of_days';

        var startDateVal = $('input[name="'+startDate+'"]').val();
        var endDateVal = $('input[name="'+endDate+'"]').val();

        //var value = parseInt($('input[name="'+endDate+'"]').val().split(':')[0], 10);

        //var hours = value - parseInt($('input[name="'+startDate+'"]').val().split(':')[0], 10) + 1;

        //if(hours < 0) hours = 24 + hours;
		var days = daysdifference(startDateVal, endDateVal) + 1;

        if(startDateVal != '' && endDateVal != '')
            $('input[name="'+noOfDays+'"]').val(days);

        var cost = $('input[name="'+cost+'"]').val();
		if(cost != '' && cost != undefined)
		{
			var total = parseFloat(cost) * parseFloat(days);
			if(startDateVal != '' && endDateVal != '')
				$('input[name="'+totalCost+'"]').val(total);
		}

    }


    function getExtension(filename)
    {
        var parts = filename.split('.');
        return parts[parts.length - 1];
    }
    function isImage(filename)
    {
        var ext = getExtension(filename);
        switch (ext.toLowerCase())
        {
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
    function isVideo(filename)
    {
        var ext = getExtension(filename);
        switch (ext.toLowerCase())
        {
            case 'mp4':
            // etc
            return true;
        }
        return false;
    }

    function displayMultipleImages(input)
    {
        var croppedCoverPhotoHiddenName = 'cropped_cover_photo';

        $('input[name="'+croppedCoverPhotoHiddenName+'"]').val('');
        $('#hdnMediaFile').val('');
            
        $("#hdnIsImageOrVideoAdded").val('');
        var getImageName = $(input).attr('name');

        var counterNumber = getImageName.substring(0, 10);

        var advType = $('select[name="txtAdvertisementType"]').val();
        if(advType == '')
        {
            swal("Sorry", "Please select advertisement type first", "error");
            var croppedCoverPhotoHiddenName = 'cropped_cover_photo';
            var mediaFile = 'media_file';

            $('input[name="'+croppedCoverPhotoHiddenName+'"]').val('');
            $('input[name="'+mediaFile+'"]').val('');
            $('#hdnMediaFile').val('');
            return false;
        }
        setPreviewDefault();
        
        if(isImage(input.files[0].name) === false && (advType == 'splash_page_1' 
            || advType == 'splash_page_2' || advType == 'branded_content' 
            || advType == 'small_logo' || advType == 'twitter_like' 
            || advType == 'bottom_popup'))
        {
            swal("Sorry", "You can select only image", "error");
            $('input[name="media_file"]').val('');
            $('input[name="cropped_cover_photo"]').val('');
            return false;
        }
        else if((advType == 'simple_image' || advType == 'full_screen_popup') && 
                    isImage(input.files[0].name) === false && isVideo(input.files[0].name) === false)
        {
            swal("Sorry", "You can select only image or video", "error");
            $('input[name="media_file"]').val('');
            $('input[name="cropped_cover_photo"]').val('');
            return false;
        }
        else
        {
            $("#hdnIsImageOrVideoAdded").val(1);
            if (input.files && input.files[0])
            {
                var done = function (url)
                {
                    image.src = url;
                    if (/^image\/\w+/.test(input.files[0].type))
                    {
                        $modal.modal('show');
                        $("#modalLabel").text(input.files[0].name);
                        $("#hdnMultipleImagesCurrentInput").val(getImageName);
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
                if((/^video\/\w+/.test(input.files[0].type)))
                {
                    switch(advType)
                    {
                        case 'simple_image':
                            
                            $('#simpleImageVideo source').attr("src", image.src);
                            $('#simpleImageVideo')[0].load();
                            $('#simpleImageVideo').show();
                            $('div[name="simpleJpgAndVideoAdvDivId"]').hide();
                        break;
                        case 'full_screen_popup':
                            $('#fullScreenPopupVideo source').attr("src", image.src);
                            $('#fullScreenPopupVideo')[0].load();
                            $('#fullScreenPopupVideo').show();
                            $('div[name="fullScreenAdvPopUpDivId"]').hide();
                        break;
                        
                    }
                    
                }
            }
        }
    }

    function cancelCropImage()
    {
        var hdnMultipleImagesCurrentInput = $("#hdnMultipleImagesCurrentInput").val();
        var counterNumber = hdnMultipleImagesCurrentInput.substring(0, 10);

        var croppedCoverPhotoHiddenName = 'cropped_cover_photo';
        var mediaFile = 'media_file';
        
        $("#hdnIsImageOrVideoAdded").val('');
        $('input[name="'+croppedCoverPhotoHiddenName+'"]').val('');
        $('input[name="'+mediaFile+'"]').val('');
        $('#hdnMediaFile').val('');
        setPreviewDefault();

        $modal.modal('hide');
    }

    $("#crop").click(function()
    {
        $("#errorImage").hide();
        canvas = cropper.getCroppedCanvas({
            minWidth: 256,
            minHeight: 256,
            maxWidth: 4096,
            maxHeight: 4096,
            imageSmoothingEnabled: true,
            imageSmoothingQuality: 'high'
        });
        canvas.toBlob(function(blob)
        {
            var hdnMultipleImagesCurrentInput = $("#hdnMultipleImagesCurrentInput").val();
            var counterNumber = hdnMultipleImagesCurrentInput.substring(0, 10);
            var txtAdvertisementType = 'txtAdvertisementType';

            var advType = $('select[name="'+txtAdvertisementType+'"]').val();
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function()
            {
                var base64data = reader.result;

                var hdnMultipleImagesCurrentInput = $("#hdnMultipleImagesCurrentInput").val();
                var counterNumber = hdnMultipleImagesCurrentInput.substring(0, 10);
                var croppedCoverPhotoHiddenName = 'cropped_cover_photo';
                $('input[name="'+croppedCoverPhotoHiddenName+'"]').val(base64data);

                $modal.modal('hide');
                pageLoad = 0;
                
                if(selectMediaLibraryId != '' && selectMediaCategoryId != '')
                {
                    $('#cropped_library_image_id').val(selectMediaLibraryId+','+selectMediaCategoryId);
                }
                else
                {
                    $('#cropped_library_image_id').val('');
                }
                selectMediaLibraryId = '';
                selectMediaCategoryId = '';
                switch(advType)
                {
                    case 'splash_page_1':
                        $('div[name="splashAdvPageOneDivId"] img').attr("src", base64data);
                        $('div[name="splashAdvPageOneDivId"]').show();

                    break;
                    case 'splash_page_2':
                        $('div[name="smallAdvImageTwoDivId"] img').attr("src", base64data);
                        $('div[name="smallAdvImageTwoDivId"]').show();
                    break;
                    case 'branded_content':
                        $('div[name="brandedAdvContentDivId"] img').attr("src", base64data);
                        $('div[name="brandedAdvContentDivId"]').show();
                    break;
                    case 'full_screen_popup':
                        $('div[name="fullScreenAdvPopUpDivId"] img').attr("src", base64data);
                        $('div[name="fullScreenAdvPopUpDivId"]').show();
                        $('#fullScreenPopupVideo').hide();
                    break;
                    case 'simple_image':
                        $('div[name="simpleJpgAndVideoAdvDivId"] img').attr("src", base64data);
                        $('div[name="simpleJpgAndVideoAdvDivId"]').show();
                        $('#simpleImageVideo').hide();
                    break;
                    case 'small_logo':
                        $('div[name="smallLogoWithAdvTimerDivId"] img').attr("src", base64data);
                        $('div[name="smallLogoWithAdvTimerDivId"]').show();
                    break;
                    case 'twitter_like':
                        $('div[name="twitterLikeSpaceAdvDivId"] img').attr("src", base64data);
                        $('div[name="twitterLikeSpaceAdvDivId"]').show();
                    break;
                    case 'bottom_popup':
                        $('div[name="bottomPopUpAdvscreenDivId"] img').attr("src", base64data);
                        $('div[name="bottomPopUpAdvscreenDivId"]').show();
                    break;
                }
            }
        }, 'image/jpeg', 1);
    })

    function selectImageTypeCall(action,input)
    {

        var currentFileImageName = $(input).attr('name');
        if(action == 'select_from_library')
        {
            $('button[name="openLibraryButton"]').show();
            $("#media_fileId").hide();
        }
        else if(action == 'upload')
        {

            $("#media_fileId").show();
            $('button[name="openLibraryButton"]').hide();


        }


    }
function showLibraryImagesPopup(mode)
    {
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
        $("#imagesModalCenter").show();
        $("body").append('<div class="modal-backdrop fade show"></div>');

        getAllLibraryImages();
    }
    function getAllLibraryImages()
    {
        $("#libraryImagesList").html('');
        $("#fullImageDivError").hide();
        var hdnPageNumber = $("#hdnPageNumber").val();
        var hdnRecordsPerPage = $("#hdnRecordsPerPage").val();
        var hdnSortBy = $("#hdnSortBy").val();
        var hdnSearchKeyword = $("#hdnSearchKeyword").val();
        var advtType = $('select[name="txtAdvertisementType"]').val();
        var txtSorting = $("#txtSorting").val();

        var hdnFilterMediaUsed = $("#hdnFilterMediaUsed").val();

        $.ajax(
        {
            url:libraryImagesListUrl,
            type: "POST",
            data: "pageNumber="+hdnPageNumber+"&txtSorting="+txtSorting+'&hdnFilterMediaUsed='+hdnFilterMediaUsed+"&recordsPerPage="+hdnRecordsPerPage+"&sort_by="+hdnSortBy+"&search_keyword="+hdnSearchKeyword+"&advtType="+advtType,
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
    var selectMediaLibraryId = '';
    var selectMediaCategoryId = '';
    function libraryImageCall(id,categoryId,fileName,displayFileName,fileType,fileSize)
    {
        selectMediaLibraryId = '';
        selectMediaCategoryId = '';
                
        var croppedCoverPhotoHiddenName = 'cropped_cover_photo';
        var mediaFile = 'media_file';

        $('input[name="'+croppedCoverPhotoHiddenName+'"]').val('');
        $('input[name="'+mediaFile+'"]').val('');
        $('#hdnMediaFile').val('');
            
        selectMediaLibraryId =  id;
        selectMediaCategoryId =  categoryId;
        
        $('#hdnSelectedAudioFileName').val('');
        closeLibraryImagesPopup();
        var advtType = $('select[name="txtAdvertisementType"]').val();
        if(fileType == 'image')
        {
            image.src = '/images/advt_library/'+fileName;
            $("#modalLabel").text(displayFileName);

            $modal.modal('show');
            $("#hdnIsImageOrVideoAdded").val(1);
        }
        else if(fileType == 'video')
        {
            $("#hdnIsImageOrVideoAdded").val(1);
            $('#hdnSelectedFileName').val(fileName);
            $('#hdnSelectedFileType').val(fileType);
                
            var imageSource = '/images/advt_library/'+fileName;
            switch(advtType)
            {
                case 'simple_image':
                    $('#cropped_library_image_id').val(selectMediaLibraryId+','+selectMediaCategoryId);
                    $('#simpleImageVideo source').attr("src", imageSource);
                    $('#simpleImageVideo')[0].load();
                    $('#simpleImageVideo').show();
                    $('div[name="simpleJpgAndVideoAdvDivId"]').hide();
                break;
                case 'full_screen_popup':
                    $('#cropped_library_image_id').val(selectMediaLibraryId+','+selectMediaCategoryId);
                    $('#fullScreenPopupVideo source').attr("src", imageSource);
                    $('#fullScreenPopupVideo')[0].load();
                    $('#fullScreenPopupVideo').show();
                    $('div[name="fullScreenAdvPopUpDivId"]').hide();
                break;
            }
        }
    }

    function assignCustomerInfo(customerId)
    {
        if(customerId != '')
        {
            $('div[id*="customerTrId"]').hide();
           $("#customerTrId"+customerId).show();
        }
    }

    //$(document).on("change",'.txtAdvertisementType',function ()
    function pageLoadCustomize()
    {
        setPreviewDefault();
        checkDateDuplication();
        //clearCurrentForm();
        var advType = $('select[name="txtAdvertisementType"]').val();
        var croppedCoverPhotoHiddenName = 'cropped_cover_photo';
        var mediaFile = 'media_file';

        $('input[name="'+croppedCoverPhotoHiddenName+'"]').val('');
        $('input[name="'+mediaFile+'"]').val('');
        $('#hdnMediaFile').val('');

        
        $("#previewSplashOneId").hide();
        $("#previewSplashTwoId").hide();
        $("#previewBrandedId").hide();
        $("#previewFullScreenId").hide();
        $("#previewSimpleId").hide();
        $("#previewSmallLogoId").hide();
        $("#previewBottomId").hide();

        $('#advTimer').hide();
        $('#advSlug').hide();
        $('#advHeader').hide();
        $('#advText').hide();
        $('#hdnimage').hide();
    
        switch(advType)
        {
            case 'splash_page_1':
                assignAspectRatio = 9/16;
                $("#previewSplashOneId").show();
            break;
            case 'splash_page_2':
                assignAspectRatio =9/16;
                $("#previewSplashTwoId").show();
            break;
            case 'branded_content':
                assignAspectRatio =1;
                $('#advSlug').show();
                $('#advHeader').show();
                $('#advText').show();
                $("#previewBrandedId").show();
            break;
            case 'full_screen_popup':
                assignAspectRatio =9/16;
                $('#advTimer').show();
                $("#previewFullScreenId").show();
            break;
            case 'simple_image':
                assignAspectRatio =9/16;
                $("#previewSimpleId").show();
            break;
            case 'small_logo':
                assignAspectRatio ='1';
                $('#advTimer').show();
                $("#previewSmallLogoId").show();
            break;
            case 'bottom_popup':
                assignAspectRatio ='1';
                $('#advSlug').show();
                $('#advTimer').show();
                $("#previewBottomId").show();
            break;
        }
    }
function deleteAdvManageDetailRecord(advManageDetailId)
{
    swal({
        title: "Are you sure?",
        text: "Delete Advertisement Manage. It will also remove from stockup",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, Delete it!",
        cancelButtonText: "No, cancel please!",
        closeOnConfirm: true,
        closeOnCancel: true
    },
    function(isConfirm)
    {
        ajaxDelete = $.ajax(
        {
            url: deleteDetail,
            method:'POST',
            dataType: "json",
            data:
            {
                advManageDetailId:advManageDetailId
            },
            beforeSend : function()
            {
                /*kill the request in case any active request present
                http://www.thedevlogs.com/cancel-abort-previous-ajax-request-jquery/
                */
                if (ajaxDelete != 'ToCancelPrevReq' && ajaxDelete.readyState < 4)
                    ajaxDelete.abort();
            },
            success:function(response)
            {
                if(response == 1)
                {
                    swal("Success", "Advertisement deleted successfully!", "success");
                    searchDataByDate();
                }
                else
                {
                    swal("Error", "Advertisement deleted successfully!", "error");
                    searchDataByDate();
                }
            },
            error: function(XMLHttpRequest, errorStatus, errorThrown)
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
            },
            complete : function()
            {

            }
        });
    });
}
function setFormJSON(action)
{
    $("#hdnSubmitType").val(action);
}
function checkDateDuplication()
{
    $("#errorStartDate").hide();
    $("#isDateDuplicate").val(0);
    var txtStartDate = $("#start_1").val();
    var txtEndDate = $("#end_1").val();
    var hdnAdvManageDetailId = $("#hdnAdvManageDetailId").val();
    var slotId = $("#slotId").val();
    var advType = $('select[name="txtAdvertisementType"]').val();
    var isValid = true;
    if(txtStartDate == '')
    {
        $("#errorStartDate").text('Please provide a start date.');
        isValid = false;
    }
    if(txtEndDate == '')
    {
        isValid = false;
    }
    if(txtStartDate != '' && txtEndDate != '')
    {
        var start = $("#txtStartDate").datepicker("getDate");
        var end = $("#txtEndDate").datepicker("getDate");
        if(start > end)
        {
            $("#errorStartDate").text('Start date is not greater than end date');
            $("#errorStartDate").show();
            isValid = false;
        }
    }
    if(advType == 'splash_page_1' || advType == 'splash_page_2' || advType == 'full_screen_popup' 
            || advType == 'small_logo' || advType == 'bottom_popup')
    {
        if(isValid)
        {
            $.ajax({
                url: dateDuplicateCodeUrl,
                method:'POST',
                dataType:'html',
                data: {startDate:txtStartDate,endDate:txtEndDate,advManageDetailId:hdnAdvManageDetailId,advType:advType,slotId:slotId},
                success:function(response)
                {
                    console.log(response);
                    if(response > 0)
                    {
                        $("#isDateDuplicate").val('1');
                        $("#errorStartDate").text('Data is already present for selected date. Please try again.');
                        $("#errorStartDate").show();
                        isValid = false;
                    }
                    else
                    {
                        $("#isDateDuplicate").val('0');
                    }
                }
            })
        }   
    }
}