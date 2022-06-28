'use strict';

// console.log(jQuery.fn.jquery);
$(document).ready(function(){
    $('form').hide();
    $('.assetBox').show();
   
// landing page fucntionality
    $('#loginBtn').click(function(){
        $('form').show();
        window.location.replace('http://localhost/task1/login.php');
    });

    $('#registerBtn').click(function(){
        window.location.replace('http://localhost/task1/loginRegister.php');
    });


    // nav hover
    $('.btns').children().hover(function(){
        $(this).css("background-color" , "rgba(102,120,118, 3");
    }, 
    function(){
        $(this).css("background-color", "greenyellow");
    });




    // nav fucntionalities    
    $("#addAsset").click(function(){
        $('form').hide();
        $('.assetBox').hide();
        $("#addAssetFrm").show();
    });

    $("#retireAsset").click(function(){
        $('form').hide();
        $('.assetBox').hide();
        $("#retireAssetFrm").show();
        
    });

    $("#addStaff").click(function(){
        $('form').hide();
        $('.assetBox').hide();
        $("#addStaffFrm").show();
    });

    $("#addDepartment").click(function(){
        $('form').hide();
        $('.assetBox').hide();
        $("#addDepartmentFrm").show();
    });

    // Add asset form javascript
    // required fields Hint
    $("#assetId").blur(function(){
        if(!$(this).val()){
            $('#idHint').text('this field cannot be left empty');
        } 
    });

    $("#serialNumber").blur(function(){
        if(!$(this).val()) {
            $('#serialNumberHint').text('this field cannot be left empty');
        }
    });

    $("#name").blur(function(){
        if(!$(this).val()){
            $('#nameHint').text('this field cannot be left empty');
        }
    });

    $("#brand").blur(function(){
        if(!$(this).val()) {
            $('#brandHint').text('this field cannot be left empty');
        }
    });

});


