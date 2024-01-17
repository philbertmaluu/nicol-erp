<script>
    $(document).ready(function() {
        $.fn.dataTable.ext.errMode = 'throw';
        $('#example').DataTable({

            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

    });
</script>
