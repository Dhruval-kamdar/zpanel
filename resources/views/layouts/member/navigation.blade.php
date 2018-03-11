<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        @php $profilePic = Auth::guard('member')->user()->profile_pic; @endphp
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
                                <strong class="font-bold">{{ Auth::guard('member')->user()->first_name }} {{ Auth::guard('member')->user()->last_name }}</strong>
                            </span> <span class="text-muted text-xs block">{{ Auth::guard('member')->user()->role_type }} <b class="caret"></b></span>
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
            <li class="{{ isActiveRoute('member-dashboard') }}">
                <a href="{{ route ('member-dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li class="{{ isActiveRoute('member-edit-profile') }}">
                <a href="{{ route ('member-edit-profile') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Edit Profile</span> </a>
            </li>
            <li class="{{ isActiveRoute('muck-available-list') }} {{ isActiveRoute('muck-wanted-list') }} {{ isActiveRoute('muck-wanted-add') }} {{ isActiveRoute('muck-available-edit') }} {{ isActiveRoute('muck-wanted-edit') }} {{ isActiveRoute('muck-available-add') }}">
                <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Material</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ isActiveRoute('muck-available-list') }} {{ isActiveRoute('muck-available-add') }} {{ isActiveRoute('muck-available-edit') }}"><a href="{{ route ('muck-available-list') }}">Material Available</a></li>
                    <li class="{{ isActiveRoute('muck-wanted-list') }} {{ isActiveRoute('muck-wanted-add') }} {{ isActiveRoute('muck-wanted-edit') }}"><a href="{{ route ('muck-wanted-list') }}">Material Wanted</a></li>
                </ul>
            </li>
            <li class="{{ isActiveRoute('search-material') }}">
                <a href="{{ route ('search-material') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Search Material</span> </a>
            </li>
            <li class="{{ isActiveRoute('site-list') }} {{ isActiveRoute('site-add-new') }} {{ isActiveRoute('site-edit') }}">
                <a href="{{ route ('site-list') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Manage Site</span> </a>
            </li>
            <li class="{{ isActiveRoute('minor') }}">
                <a href="javascript:;"><i class="fa fa-th-large"></i> <span class="nav-label">My Interests</span> </a>
            </li>
            
            <li class="{{ isActiveRoute('minor') }}">
                <a href="javascript:;"><i class="fa fa-th-large"></i> <span class="nav-label">Subscription</span> </a>
            </li>
            <li class="{{ isActiveRoute('minor') }}">
                <a href="javascript:;"><i class="fa fa-th-large"></i> <span class="nav-label">Reports</span> </a>
            </li>
        </ul>

    </div>
</nav>
