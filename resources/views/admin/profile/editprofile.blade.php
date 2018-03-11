@extends('layouts.admin.app')

@section('title', $metatitle)

@section('content')
<!--  <div class="wrapper wrapper-content animated fadeInRight white-bg">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center m-t-lg">
                    <h1>
                        Simple example of second view
                    </h1>
                    <small>Writen in minor.blade.php file.</small>
                </div>
            </div>
        </div>
    </div>-->
<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">
        <div class="row m-t-lg">
            <div class="col-lg-12">
                <div class="tabs-container">

                    <div class="tabs-left">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1"> Update Info</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2">Change Password</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-3">Change Picture</a></li>
                        </ul>
                        <div class="tab-content ">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12" style="width: 98%;">
                                            <div class="ibox float-e-margins">
                                                <div class="ibox-content" style="border: none;">
                                                    <form class="form-horizontal" role="form" id="editProfile" method="post" action="{{ route ('company-edit-profile') }}">
                                                        <!--<p>Sign in today for more expirience.</p>-->
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">First name</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" name="first_name" value="{{ $userDetail['first_name']}}" placeholder="First name" class="form-control"> 
                                                                <input type="hidden" name="user_id" value="{{ $userDetail['id']}}" placeholder="First name" class="form-control"> 
                                                                <input type="hidden" name="company_id" value="{{ $userDetail['company_id']}}" placeholder="First name" class="form-control"> 
                                                                 {{ csrf_field() }}
                                                                <!--<span class="help-block m-b-none">Example block-level help text here.</span>-->
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Last Name</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" value="{{ $userDetail['last_name']}}" class="form-control" name="last_name" placeholder="Last Name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Mobile</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" value="{{ $userDetail['mobile']}}" class="form-control"  name="mobile" placeholder="Mobile">
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        
                                                        
                                                        <div class="form-group">
                                                            <div class="col-lg-offset-3 col-lg-9">
                                                                <button class="btn btn-sm btn-white" type="submit">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12" style="width: 98%;">
                                            <div class="ibox float-e-margins">
                                                <div class="ibox-content" style="border: none;">
                                                    <form class="form-horizontal" role="form" id="changePassword" method="post" action="{{ route ('change-password') }}">
                                                        <!--<p>Sign in today for more expirience.</p>-->
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Old Password</label>
                                                            <div class="col-lg-9">
                                                                <input type="password" name="old_password" placeholder="Old Password" class="form-control"> 
                                                                <input type="hidden" name="user_id" value="{{ $userDetail['id']}}" class="form-control"> 
                                                                 {{ csrf_field() }}
                                                                <!--<span class="help-block m-b-none">Example block-level help text here.</span>-->
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">New Password</label>
                                                            <div class="col-lg-9">
                                                                <input type="password"  class="form-control" id='password' name="new_password" placeholder="New Password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Confirm Password</label>
                                                            <div class="col-lg-9">
                                                                <input type="password" class="form-control"  name="c_password" placeholder="Confirm Password">
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="form-group">
                                                            <div class="col-lg-offset-3 col-lg-9">
                                                                <button class="btn btn-sm btn-white" type="submit">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-3" class="tab-pane">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="ibox float-e-margins">
                                                <div class="ibox-content" style="border: none;">
                                                    <form class="form-horizontal" role="form" id="changeProfile" enctype="multipart/form-data" method="post" action="{{ route ('change-profile-pic') }}">
                                                        <div class=''>
                                                                @php $profilePic = Auth::guard('admin')->user()->profile_pic; @endphp
                                                                @if($profilePic != "")
                                                                    @if(file_exists(public_path() . '/uploads/company/'.$profilePic))
                                                                    <img class="img-thumbnail"  src="{{ url('/uploads/company/'.$profilePic) }}" width='250' height="250">
                                                                    @endif
                                                                @else
                                                                    <img class="img-thumbnail" src="{{ url('/uploads/dummyImage/dummy-profile.jpg') }}" width='250' height="250">
                                                                @endif
                                                            </div>
                                                            <br><br>
                                                            <div class='clear'></div>
                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                           
                                                            <div class="form-control" data-trigger="fileinput">
                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                            <span class="fileinput-filename"></span>
                                                            </div>
                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                <span class="fileinput-new">Select file</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="profilepic"/>
                                                                <input type="hidden" name="user_id" value="{{ $userDetail['id'] }}" class="form-control"> 
                                                                 {{ csrf_field() }}
                                                            </span>
                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-lg-9">
                                                                <button class="btn btn-sm btn-white" type="submit">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
