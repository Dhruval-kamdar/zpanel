var Login = function () {

    var loginInt = function () {
        
        var form = $('#login');
        var rules = {
            email: {required: true,email:true},
            password: {required: true},
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form,true);
        });
    };

 var wrongeId = function(){
     
     var output = '{"status":"error","message":"Your enter wronge Id or password."}';
     handleAjaxResponse(output);
     
 }

    return {
        //main function to initiate the module
        init: function () {
            loginInt();
        },
        wrongeId: function () {
            wrongeId();
        }
    };
}();
