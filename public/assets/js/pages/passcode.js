$( document ).ready(function()
    {
        if(passcodePassPageName != 'justin_create')
        {
            $("#passcodeModal").show();
            $("body").append('<div class="modal-backdrop fade show"></div>');
        }
        
        document.getElementById('txtFirst').focus();
    });
    moveOnMax = function (field, nextFieldID, previousFieldID) 
    {
        if (nextFieldID === '') 
        {
            $("#b1").attr("disabled", true);
            $("#b2").attr("disabled", true);
            $("#b3").attr("disabled", true);
            $("#b4").attr("disabled", true);
            $("#b5").attr("disabled", true);
            $("#b6").attr("disabled", true);
            $("#b7").attr("disabled", true);
            $("#b8").attr("disabled", true);
            $("#b9").attr("disabled", true);
            $("#b0").attr("disabled", true);
            
            if (event.which == 8) 
            {
                if (field.value.length == 1) 
                {
                    field.value = '';
                    return false;
                }
                else 
                {
                    document.getElementById(previousFieldID).focus();
                    return false;
                }
            }
        }
        else 
        {
            $("#b1").removeAttr("disabled");
            $("#b2").removeAttr("disabled");
            $("#b3").removeAttr("disabled");
            $("#b4").removeAttr("disabled");
            $("#b5").removeAttr("disabled");
            $("#b6").removeAttr("disabled");
            $("#b7").removeAttr("disabled");
            $("#b8").removeAttr("disabled");
            $("#b9").removeAttr("disabled");
            $("#b0").removeAttr("disabled");
            if (event.which == 8) 
            {
                if (field.value.length == 1) 
                {
                    field.value = '';
                    return false;
                }
                else 
                {
                    document.getElementById(previousFieldID).focus();
                    return false;
                }
            }
            if (field.value.length == 1) 
            {
                document.getElementById(nextFieldID).focus();
            }
        }
    }

    $('#txtFirst, #txtSecond, #txtThird, #txtFourth, #txtFifth, #txtSixth').on('keyup', function (event) 
    {
        //alert('inisde keyup');
        var InputElement1 = document.getElementById("txtFirst");
        var InputElement2 = document.getElementById("txtSecond");
        var InputElement3 = document.getElementById("txtThird");
        var InputElement4 = document.getElementById("txtFourth");
        var InputElement5 = document.getElementById("txtFifth");
        var InputElement6 = document.getElementById("txtSixth");
        var finalPinCode = InputElement1.value+''+InputElement2.value+''+InputElement3.value+''+InputElement4.value+''+InputElement5.value+''+InputElement6.value;
           // alert(finalPinCode.length);
            if(finalPinCode.length == 6)
            {
                if(finalPinCode == 999999)
                {
                    $("#passcodeModal").hide();
                    $(".modal-backdrop").remove();
                    if(passcodePassPageName == 'justin_create')
                    {
                        $("#exampleModalCenter").show();
                        $("body").append('<div class="modal-backdrop fade show"></div>');
                    }
                    if(passcodePassPageName == 'justin_edit')
                    {
                        reset();
                        startTimer();
                    }
                }
                else
                {
                    $("#b1").removeAttr("disabled");
                    $("#b2").removeAttr("disabled");
                    $("#b3").removeAttr("disabled");
                    $("#b4").removeAttr("disabled");
                    $("#b5").removeAttr("disabled");
                    $("#b6").removeAttr("disabled");
                    $("#b7").removeAttr("disabled");
                    $("#b8").removeAttr("disabled");
                    $("#b9").removeAttr("disabled");
                    $("#b0").removeAttr("disabled");
                    
                    $("#wrongPasswordHrefId").show();
                    $("#correctPasswordHrefId").hide();
                    
                    //swal("Sorry", "Sorry wrong passcode. Please try again", "error");
                    document.getElementById('txtSixth').focus();
                    return false;
                }
            }
            
        if (!$(event.target).is('input')) 
        {
             //alert('inisde keydown 1');
            console.log(event.which);
            //event.preventDefault();
            if (event.which == 8) 
            {
                //alert('backspace pressed');
                return false;
            }
        }
    });

    function reply_click(clicked_id) 
    {
        // var element = document.activeElement;
        var InputElement1 = document.getElementById("txtFirst");
        var InputElement2 = document.getElementById("txtSecond");
        var InputElement3 = document.getElementById("txtThird");
        var InputElement4 = document.getElementById("txtFourth");
        var InputElement5 = document.getElementById("txtFifth");
        var InputElement6 = document.getElementById("txtSixth");
        
        var buttonId = "#" + clicked_id.id;
        
        if (clicked_id.id != "bb") 
        {
            $("#bb").removeAttr("disabled");
            if (InputElement1.value.length === 0) {
                InputElement1.value = $(buttonId).text();
                InputElement2.focus();
            }

            else if (InputElement2.value.length === 0) {
                InputElement2.value = $(buttonId).text();
                InputElement3.focus();
            }

            else if (InputElement3.value.length === 0) {
                InputElement3.value = $(buttonId).text();
                InputElement4.focus();
            }
            else if (InputElement4.value.length === 0) {
                InputElement4.value = $(buttonId).text();
                InputElement5.focus();
            }
            else if (InputElement5.value.length === 0) {
                InputElement5.value = $(buttonId).text();
                InputElement6.focus();
            }

            else if (InputElement6.value.length === 0) 
            {
                InputElement6.value = $(buttonId).text();
                $("#b1").attr("disabled", true);
                $("#b2").attr("disabled", true);
                $("#b3").attr("disabled", true);
                $("#b4").attr("disabled", true);
                $("#b5").attr("disabled", true);
                $("#b6").attr("disabled", true);
                $("#b7").attr("disabled", true);
                $("#b8").attr("disabled", true);
                $("#b9").attr("disabled", true);
                $("#b0").attr("disabled", true);
                //alert(InputElement2.value+''+InputElement3.value+' ::: '+InputElement4.value+' '+InputElement1.value);
                var finalPinCode = InputElement1.value+''+InputElement2.value+''+InputElement3.value+''+InputElement4.value+''+InputElement5.value+''+InputElement6.value;
                //alert(finalPinCode);
                if(finalPinCode == 999999)
                {
                    $("#passcodeModal").hide();
                    $(".modal-backdrop").remove();
                    if(passcodePassPageName == 'justin_create')
                    {
                        $("#exampleModalCenter").show();
                        $("body").append('<div class="modal-backdrop fade show"></div>');
                    }
                    if(passcodePassPageName == 'justin_edit')
                    {
                        reset();
                        startTimer();
                    }
                }
                else
                {
                    $("#b1").removeAttr("disabled");
                    $("#b2").removeAttr("disabled");
                    $("#b3").removeAttr("disabled");
                    $("#b4").removeAttr("disabled");
                    $("#b5").removeAttr("disabled");
                    $("#b6").removeAttr("disabled");
                    $("#b7").removeAttr("disabled");
                    $("#b8").removeAttr("disabled");
                    $("#b9").removeAttr("disabled");
                    $("#b0").removeAttr("disabled");
                    $("#wrongPasswordHrefId").show();
                    $("#correctPasswordHrefId").hide();
                    
                   // swal("Sorry", "Sorry wrong passcode. Please try again", "error");
                    document.getElementById('txtSixth').focus();
                    return false;
                }
            }
            else if (InputElement1.value.length === 1 && InputElement2.value.length === 1 && InputElement3.value.length === 1 && InputElement4.value.length === 1 && InputElement5.value.length === 1 && InputElement6.value.length === 1) 
            {
                InputElement6.focus();
            }
        }
        else 
        {
           // alert('end');
            $("#b1").removeAttr("disabled");
            $("#b2").removeAttr("disabled");
            $("#b3").removeAttr("disabled");
            $("#b4").removeAttr("disabled");
            $("#b5").removeAttr("disabled");
            $("#b6").removeAttr("disabled");
            $("#b7").removeAttr("disabled");
            $("#b8").removeAttr("disabled");
            $("#b9").removeAttr("disabled");
            $("#b0").removeAttr("disabled");
            if (InputElement6.value.length === 1) {
                InputElement6.value = "";
                InputElement5.focus();
            }
            else if (InputElement5.value.length === 1) {
                InputElement5.value = "";
                InputElement4.focus();
            }
            else if (InputElement4.value.length === 1) {
                InputElement4.value = "";
                InputElement3.focus();
            }

            else if (InputElement3.value.length === 1) {
                InputElement3.value = "";
                InputElement2.focus();
            }

            else if (InputElement2.value.length === 1) {
                InputElement2.value = "";
                InputElement1.focus();
            }

            else if (InputElement1.value.length === 1) {
                InputElement1.value = "";
                $("#bb").attr("disabled", true);
            }
        }
    };