var Profile = function () {

    var profileInt = function () {
        
        var form = $('#editProfile');
        var rules = {
            first_name: {required: true},
            last_name: {required: true},
            mobile: {required: true},
            company_name: {required: true},
            address_line_1: {required: true},
//            address_line_2: {required: true},
            city: {required: true},
            agree: {required: true},
            postcode: {required: true},
            country: {required: true},
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form);
        });
        
        $('body').on('blur', '.getlatlong', function() {

            var data = '';
            var company_name = $("input[name=company_name]").val();
            var address_line_1 = $("input[name=address_line_1]").val();
            var address_line_2 = $("input[name=address_line_2]").val();
            var city = $("input[name=city]").val();
            var postcode = $("input[name=postcode]").val();
            var country = $("input[name=country]").val();

            if (company_name != "" && address_line_1 != "" && city != "" && postcode != "")
            {
                address = company_name + ' , ' + address_line_1 + ' , '  + city + ' , ' + postcode;
                data = {'address': address, '_token': $("input[name=_token]").val()};

                ajaxcall(baseurl + 'signup/get-lat-long', data, function(output) {

                    handleAjaxLatlong(output);
                });

            }
        });
        
    };
    
    var handleAjaxLatlong = function(output) {
            output = JSON.parse(output);

            $("input[name=c_latitude]").val(output.latitude);
            $("input[name=c_longitude]").val(output.longitude);

        }
    var changePassword = function () {
        
        var form = $('#changePassword');
        var rules = {
            old_password: {required: true},
            new_password: {required: true},
            c_password: {required: true,equalTo: "#password"},
            
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form);
        });
    };
    var changePicture = function () {
        
        var form = $('#changeProfile');
        var rules = {
            profilepic: {required: true},
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form,true);
        });
    };

 var wrongeId = function(){
     
     var output = '{"status":"success","message":"File upload successfully."}';
     handleAjaxResponse(output);
     
 }
 

    return {
        //main function to initiate the module
        init: function () {
            profileInt();
            changePassword();
            changePicture();
        },
        wrongeId: function () {
            wrongeId();
        }
    };
}();
