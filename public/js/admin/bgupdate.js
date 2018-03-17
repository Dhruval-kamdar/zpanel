var Bgupdate = function () {

    var bgupdateInt = function () {
         $('.bgcolorcode').colorpicker();
        var form = $('#bgcolor');
        var rules = {
            bgcolor: {required: true},
        };
        handleFormValidate(form, rules, function (form) {
          var bgcolorcode = $('.bgcolorcode').val();
          setCookie('bgcolor',bgcolorcode,7);
          setbgcolortobody();
         
          return false;
        });
       setbgcolortobody();
       var background = getCookie('bgcolor');
       $('.bgcolorcode').val(background);
    };
    
   
    return {
        //main function to initiate the module
        init: function () {
            bgupdateInt();
            
        },
        
    };
}();
