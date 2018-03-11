<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        @php $profilePic = Auth::guard('admin')->user()->profile_pic; @endphp
                        @if($profilePic != "")
                            @if(file_exists(public_path() . '/uploads/company/'.$profilePic))
                            <img class="img-rounded"  src="{{ url('/uploads/company/'.$profilePic) }}" width='50' height="50">
                            @endif
                        @else
                            <img class="img-rounded" src="{{ url('/uploads/dummyImage/dummy-profile.jpg') }}" width='50' height="50">
                        @endif
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear" style='width: 50%'>
                            <span class="block m-t-xs">
                                <strong class="font-bold">{{ Auth::guard('admin')->user()->first_name }} {{ Auth::guard('admin')->user()->last_name }}</strong>
                            </span> <span class="text-muted text-xs block">{{ Auth::guard('admin')->user()->role_type }} <b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ route ('logout') }}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="{{ isActiveRoute('company-dashboard') }}">
                <a href="{{ route ('company-dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li class="{{ isActiveRoute('company-edit-profile') }}">
                <a href="{{ route ('company-edit-profile') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Edit Profile</span> </a>
            </li>
            <li class="{{ isActiveRoute('file-upload') }}">
                <a href="{{ route ('file-upload') }}"><i class="fa fa-th-large"></i> <span class="nav-label">File Upload</span> </a>
            </li>
            <li class="{{ isActiveRoute('pages') }}">
                <a href="{{ route ('pages') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Pages</span> </a>
            </li>
            
        </ul>

    </div>
</nav>
