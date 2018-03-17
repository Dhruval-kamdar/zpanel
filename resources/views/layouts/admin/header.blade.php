<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZPanel - @yield('title') </title>

    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/plugins/toastr/toastr.min.css') !!}" />
    @if (!empty($css)) 
        @foreach ($css as $value) 
        <link rel="stylesheet" href="{{ asset('css/'.$value) }}">
        @endforeach
    @endif
    <script>
        var baseurl = "{{ asset('/') }}";
    </script>
</head>