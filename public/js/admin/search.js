var Search = function() {

    var searchSite = function() {

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
        
        var form = $('#searchsite');
        var rules = {
            searchtype: {required: true},
            start_date: {required: true},
            end_date: {required: true},
           // distance: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form,true);
        });
        
        $('body').on('click', '.interested', function() {

            var data = '';
            var muckId = $(this).attr('data-id');
           

            if (muckId != "")
            {
                data = {'muckId': muckId, '_token': $("input[name=_token]").val()};

                ajaxcall(baseurl + 'company/set-interested', data, function(output) {

                    handleAjaxResponse(output);
                });

            }
        });
        
        $('body').on('click', '.muckdetail', function() {
            var muckId = $(this).attr('data-id');
            var data = '';
            if (muckId != "")
            {
                data = {'muckId': muckId, '_token': $("input[name=_token]").val()};
                ajaxcall(baseurl + 'company/get-muck-detail', data, function(output) {
                    $('#myModal_interested .modal-body').html(output);
                });
            }
        });
        
        
    };
    return {
        //main function to initiate the module

       
        searchSite: function() {
            searchSite();
        }
    };
}();
