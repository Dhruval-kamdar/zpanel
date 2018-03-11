var Pages = function() {

    var pagesAvailableList = function() {

        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},
                {extend: 'print',
                    customize: function(win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                    }
                }
            ]

        });
        
        $('body').on('click', '.deletebutton', function() {
            var id = $(this).attr('data-id');
            $('#btndelete').attr('data-id',id);
        });

        handleDelete();
        
         $('body').on('click', '.interestedlist', function() {
            var muckId = $(this).attr('data-id');
            var data = '';
            if (muckId != "")
            {
                data = {'muckId': muckId, '_token': $("input[name=_token]").val()};
                ajaxcall(baseurl + 'company/get-intersted-userlist', data, function(output) {
                    $('#myModal_interested .modal-body').html(output);
                });
            }
        });
         $('body').on('click', '.acceptinterest', function() {
            var userInterestId = $(this).attr('data-id');
            var muckId = $(this).attr('data-muckid');
            var data = '';
            if (muckId != "")
            {
                data = {'muckId': muckId,'userInterestId':userInterestId, '_token': $("input[name=_token]").val()};
                ajaxcall(baseurl + 'company/update-interest-status', data, function(output) {
                    handleAjaxResponse(output);
                    setTimeout(function(){
                        $('#myModal_interested').modal('hide');
                    },2000);
                });
            }
        });
         $('body').on('click', '.complete', function() {
            var userInterestId = $(this).attr('data-id');
            var muckId = $(this).attr('data-muckid');
            var data = '';
            if (muckId != "")
            {
                data = {'muckId': muckId,'userInterestId':userInterestId, '_token': $("input[name=_token]").val()};
                ajaxcall(baseurl + 'company/update-interest-status-to-complete', data, function(output) {
                    handleAjaxResponse(output);
                    setTimeout(function(){
                        $('#myModal_interested').modal('hide');
                    },2000);
                });
            }
        });
         $('body').on('click', '.resetall', function() {
           
            var muckId = $(this).attr('data-muckid');
            var data = '';
            if (muckId != "")
            {
                data = {'muckId': muckId, '_token': $("input[name=_token]").val()};
                ajaxcall(baseurl + 'company/reset-interest-status', data, function(output) {
                    handleAjaxResponse(output);
                    setTimeout(function(){
                        $('#myModal_interested').modal('hide');
                    },2000);
                });
            }
        });
    };
    var pagesAdd = function() {
        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });
        $('#data_2 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });
        
        
        var form = $('#muckavailableadd');
        var rules = {
            title: {required: true},
            material_id: {required: true},
            quantity: {required: true},
            unit_id: {required: true},
            muck_condition: {required: true},
            availablity_start_date: {required: true},
            availablity_end_date: {required: true},
            'delivery[]': {required: true},
            located_at: {required: true},
            additional_information: {required: true},
            post_visibility: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });
       
        var form2 = $('#siteadd');
        var rules2 = {
            site_name: {required: true},
            address_line_1: {required: true},
//            address_line_2: {required: true},
            city: {required: true},
            postcode: {required: true},
           
        };
        handleFormValidate(form2, rules2, function(form2) {
            handleAjaxFormSubmit(form2, true);
        });
        
         $('body').on('blur', '.getlatlong', function() {
                getlatlong();
       });
        
         $('body').on('keyup', '.getlatlong', function(event) {
             if(event.which == 9)
             {
                  getlatlong();
             }
               
       });
        function getlatlong()
        {
            
            var data = '';
            var site_name = $("input[name=site_name]").val();
            var address_line_1 = $("input[name=address_line_1]").val();
            var address_line_2 = $("input[name=address_line_2]").val();
            var city = $("input[name=city]").val();
            var postcode = $("input[name=postcode]").val();

            if ( address_line_1 != ""  && city != "" && postcode != "")
            {
                address =  address_line_1 + ' , ' + city + ' , ' + postcode;
                data = {'address': address, '_token': $("input[name=_token]").val()};

                ajaxcall(baseurl + 'company/get-lat-long', data, function(output) {

                    handleAjaxLatlong(output);
                });

            }
        }
    };
    var muckAvailableEdit = function() {
        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });
        $('#data_2 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });
        var form = $('#muckavailableadd');
        var rules = {
            title: {required: true},
            material_id: {required: true},
            quantity: {required: true},
            unit_id: {required: true},
            muck_condition: {required: true},
            availablity_start_date: {required: true},
            availablity_end_date: {required: true},
            located_at: {required: true},
            additional_information: {required: true},
            post_visibility: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form, true);
        });
    };
var handleAjaxLatlong = function(output) {
        output = JSON.parse(output);

        $("input[name=latitude]").val(output.latitude);
        $("input[name=longitude]").val(output.longitude);

        var getlat = parseFloat(output.latitude)
        var getlong = parseFloat(output.longitude)
        getedLatlong(getlat, getlong);
    }

    var getedLatlong = function(lati, longi) {
        var uluru = {lat: lati, lng: longi};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 19,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
    return {
        //main function to initiate the module
        pagesAvailableList: function() {
            pagesAvailableList();
        },
        pagesAdd: function() {
            pagesAdd();
        },
        muckAvailableEdit: function() {
            muckAvailableEdit();
        }
    };
}();
function ValidateEndDate() {
            
            var startDate = $("#availablity_start_date").val();
            var endDate = $("#availablity_end_date").val();
            if (startDate != '' && endDate !='') {
                if (Date.parse(startDate) > Date.parse(endDate)) {
                    $("#availablity_start_date").val('');
                    alert("Start date should not be greater than end date");
                }
            }
            return false;
        }