<script>
    flatpickr(".date", {
        enableTime: true,
        dateFormat: "{{ config('a1.datejs.datetime') }}"
    });
    

    $(document).ready(function() {
        
        $('.select2').select2();

    });

    //CKEDITOR.replace( 'description' );

</script>
