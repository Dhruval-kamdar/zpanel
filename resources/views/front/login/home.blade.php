<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PWPanel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <style>
.nav {
    list-style: none;
    font-weight: bold;
    margin: 0px;
    float: left; /* Clear floats */
    width: auto;
    /* Bring the nav above everything else--uncomment if needed.
    position: relative;
    z-index: 5;
    */
}
.nav li {
    float: left;
    margin-right: 10px;
    position: relative;
    width: 100px;
}
.nav a {
    display: block;
    padding: 5px;
    color: #636b6f;
    background-color: #fff;
    text-decoration: none;
    color: #636b6f;
    
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
}
.nav a:hover {
    color: #636b6f;
    background-color: #fff;
    text-decoration: none;
}

/*--- DROPDOWN ---*/
.nav ul {
    background-color: #fff; /* Adding a background makes the dropdown work properly in IE7+. Make this as close to your page's background as possible (i.e. white page == white background). */
    background: rgba(255,255,255,0); /* But! Let's make the background fully transparent where we can, we don't actually want to see it if we can help it... */
    list-style: none;
    position: absolute;
    left: -9999px; /* Hide off-screen when not needed (this is more accessible than display: none;) */
    padding-left: 0px;
}
.nav ul li {
    padding-top: 1px; /* Introducing a padding between the li and the a give the illusion spaced items */
    float: none;
}
.nav ul a {
    white-space: nowrap; /* Stop text wrapping and creating multi-line dropdown items */
}
.nav li:hover ul { /* Display the dropdown on hover */
    left: 0; /* Bring back on-screen when needed */
}
.nav li:hover a { /* These create persistent hover states, meaning the top-most link stays 'hovered' even when your cursor has moved down the list. */
    background-color: #ccc;
    text-decoration: none;
}
.nav li:hover ul a { /* The persistent hover state does however create a global style for links even before they're hovered. Here we undo these effects. */
    text-decoration: none;
}
.nav li:hover ul li a:hover { /* Here we define the most explicit hover states--what happens when you hover each individual link. */
    background-color: #333;
}
</style>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">

                    <ul class="nav">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    @for($i=0; $i < count($getParentPages);$i++)
                    <li>
                     <a href="{{ url('pagedetail/'.$getParentPages[$i]['id']) }}">{{ $getParentPages[$i]['menu_name'] }}</a>
                     @for($j=0; $j < count($getAllMenu);$j++)
                        @if($getParentPages[$i]['id'] == $getAllMenu[$j]['parent_id'])
                            <ul>
                                <li><a href="{{ url('pagedetail/'.$getAllMenu[$j]['id']) }}">{{ $getAllMenu[$j]['menu_name'] }}</a></li>
                            </ul>
                        @endif
                     @endfor
                    </li>    
                    @endfor
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="javascript:;">Download</a>
                         <ul>
                    @for($j=0; $j < count($getfileList);$j++)
                        <li><a href="{{ url('downloadfile/'.$getfileList[$j]['id']) }}">{{ $getfileList[$j]['display_name'] }}</a></li>
                    @endfor
                      </ul>
                    </li>
                    </ul>
                    
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    PWPanel
                </div>

                <div class="links">
                    <!--<a href="https://laravel.com/docs">Documentation</a>-->
<!--                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>-->
                </div>
            </div>
        </div>
    </body>
</html>
