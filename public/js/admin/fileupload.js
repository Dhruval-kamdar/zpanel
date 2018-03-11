var File = function() {

    var fileUploadList = function() {

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
    var fileAdd = function() {
        
        var form2 = $('#fileadd');
        var rules2 = {
            display_name: {required: true},
            file_name: {required: true},

           
        };
        handleFormValidate(form2, rules2, function(form2) {
            handleAjaxFormSubmit(form2, true);
        });
        
        
    };
    var muckAvailableEdit = function() {
       
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
     var fileuploadsuccess = function(){
     
     var output = '{"status":"success","message":"File upload successfully.","redirect":"file-upload"}';
     handleAjaxResponse(output);
     
 }
    return {
        //main function to initiate the module
        fileUploadList: function() {
            fileUploadList();
        },
        fileAdd: function() {
            fileAdd();
        },
        fileuploadsuccess: function() {
            fileuploadsuccess();
        },
        muckAvailableEdit: function() {
            muckAvailableEdit();
        }
    };
}();
