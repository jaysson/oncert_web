{{ Former::text('title') }}
{{ Former::text('start') }}
{{ Former::text('end') }}
{{ Former::submit('Save')->class('btn btn-primary btn-lg') }}
{{ Former::close() }}

{{ HTML::script('js/moment/moment.js') }}
{{ HTML::script('js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.js') }}
<script>
    $('#start, #end').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss'
    })
</script>