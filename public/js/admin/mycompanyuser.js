var MycompanyUser = function() {

    var userList = function() {

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
            $('#btndelete').attr('data-id', id);
        });

        handleDelete();
    };
    var userAdd = function() {

        var form2 = $('#useradd');
        var rules2 = {
            first_name: {required: true},
            last_name: {required: true},
            mobile: {required: true},
            email: {required: true},
            password: {required: true},
        };
        handleFormValidate(form2, rules2, function(form2) {
            handleAjaxFormSubmit(form2);
        });
       
    };
    var userEdit = function() {

        var form2 = $('#useradd');
        var rules2 = {
            first_name: {required: true},
            last_name: {required: true},
            mobile: {required: true},
            email: {required: true},
           
        };
        handleFormValidate(form2, rules2, function(form2) {
            handleAjaxFormSubmit(form2);
        });
       
    };

    return {
        //main function to initiate the module

        userAdd: function() {
            userAdd();
        },
        userEdit: function() {
            userEdit();
        },
        userList: function() {
            userList();
        }
    };
}();
