var Singup = function () {

    var signupInt = function () {
        
        var form = $('#signUp');
        var rules = {
            first_name: {required: true},
            last_name: {required: true},
            email: {required: true,email:true},
            mobile: {required: true},
            password: {required: true},
            cpassword: { required: true,equalTo: "#password"},
            company_name: {required: true},
            address_line_1: {required: true},
//            address_line_2: {required: true},
            city: {required: true},
            agree: {required: true},
            postcode: {required: true},
            country: {required: true},
            c_latitude: {required: true},
            c_longitude: {required: true},
            
        };
        handleFormValidate(form, rules, function (form) {
            var c_longitude = $('#c_longitude').val();
//            if(c_longitude == "")
//            {
//                alert("Please enter the correct address.");
//                return false;
//            }
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

            if (company_name != "" && address_line_1 != ""  && city != "" && postcode != "")
            {
//                address = address_line_1 + ',' + city + ',' + postcode+ ','+country;
                address = address_line_1 + ',' + city + ',' + postcode;
                
                data = {'address': address, '_token': $("input[name=_token]").val()};

                ajaxcall(baseurl + 'signup/get-lat-long', data, function(output) {

                    handleAjaxLatlong(output);
                });

            }
        });
        
        var handleAjaxLatlong = function(output) {
            output = JSON.parse(output);

            $("input[name=c_latitude]").val(output.latitude);
            $("input[name=c_longitude]").val(output.longitude);

        }
    
    };
    return {
        //main function to initiate the module
        init: function () {
            signupInt();
        }
    };
}();
