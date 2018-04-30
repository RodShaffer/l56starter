<script>

    /* DOCUMENT READY FUNCTION */
    $(document).ready(function() {

        $('#roles').select2({
            placeholder: 'No Roles',
            width: 'resolve',
            tags: true
        });

        $('#permissions').select2({
            placeholder: 'No Role Permissions',
            width: 'resolve',
            tags: true
        });

        $('#direct_permissions').select2({
            placeholder: 'No Direct Permissions',
            width: 'resolve',
            tags: true
        });

    });/* END - DOCUMENT READY FUNCTION */

</script>
