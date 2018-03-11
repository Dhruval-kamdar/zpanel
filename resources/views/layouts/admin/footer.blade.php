<script src="{!! asset('js/jquery-3.1.1.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/plugins/validate/jquery.validate.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/plugins/toastr/toastr.min.js') !!}" type="text/javascript"></script>

<script src="{!! asset('js/comman_function.js') !!}" type="text/javascript"></script>

@if (!empty($js)) 
@foreach ($js as $value) 
<script src="{{ asset('js/'.$value) }}" type="text/javascript"></script>
@endforeach
@endif
<script>
    jQuery(document).ready(function() {

        @if (!empty($funinit))
            @foreach ($funinit as $value)
                {{ $value }}
            @endforeach
        @endif
    });
</script>
<script type="text/javascript">
    jQuery(document).ready(function(){
       $('.right-sidebar-toggle').click(function(){
          jQuery('#right-sidebar').toggleClass('sidebar-open');
       }) 
    });
    </script>
@section('scripts')
@show
