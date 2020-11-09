<script>
    var options = {
        data: {
            type: 'remote',
            source: {
                read: {
                    url: 'Users/loaddata',
                    method: 'GET',
                    headers: {
                        'x-my-custom-header': 'some value',
                        'x-test-header': 'the value'
                    },
                    contentType: 'application/json',
                    timeout: 30000,
                }
            },
            pageSize: 10,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: false,
            autoColumns: true,

        },
        rows: {
            autoHide: false,
        },
        layout: {
            theme: 'default',
            class: 'datatable-brand',
            scroll: true,
            height: 400,
            footer: false,
            header: true,
            icon: {
                rowDetail: {
                    expand: 'fa fa-caret-down',
                    collapse: 'fa fa-caret-right'
                }
            },
            spinner: {
                overlayColor: '#000000',
                opacity: 0,
                type: 'loader',
                state: 'brand'
            }
        },
        search: {
            onEnter: false,
            input: $('#kt_datatable_search_query'),
        },
        toolbar: {
            layout: ['pagination', 'info'],
            placement: ['bottom'],
            item: {
                pagination: {
                    navigation: {
                        prev: true,
                        next: true,
                        first: true,
                        last: true
                    },
                }
            }
        }
    }
    var datatable = $('#kt_datatable').KTDatatable(options);

    function deleteuser(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won t be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!"
        }).then(function (result) {
            if (result.value) {
                Swal.fire(
                    "Deleted!",
                    "Your file has been deleted.",
                    "success"
                )
            }
        });

    }
</script>
