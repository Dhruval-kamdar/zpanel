@extends('layouts.login.app')

@section('title',  $pagetitle )

@section('content')
       <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Register to IN+</h3>
            <p>Create account to see it in action.</p>
            <form class="m-t" role="form" id="signUp" method="post" action="register">
                 {{ csrf_field() }}
                <div class="form-group">
                    <label class="pull-left">First Name:</label>
                    <input type="text" class="form-control" name="first_name" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label class="pull-left">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <label class="pull-left">Email:</label>
                    <input type="text" class="form-control"  name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label class="pull-left">Mobile:</label>
                    <input type="text" class="form-control"  name="mobile" placeholder="Mobile">
                </div>
                <div class="form-group">
                    <label class="pull-left">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label class="pull-left">Confirm Password:</label>
                    <input type="password" class="form-control"  name="cpassword" placeholder="Confirm Password">
                </div>
                 <div class="form-group">
                     <label class="pull-left">Company Name:</label>
                    <input type="text" class="form-control getlatlong"  name="company_name" placeholder="Company Name">
                </div>
                 <div class="form-group">
                     <label class="pull-left">Address Line 1:</label>
                    <input type="text" class="form-control getlatlong"  name="address_line_1" placeholder="Address Line 1">
                </div>
                 <div class="form-group">
                     <label class="pull-left">Address Line 2:</label>
                    <input type="text" class="form-control getlatlong"  name="address_line_2" placeholder="Address Line 2">
                </div>
                <div class="form-group">
                    <label class="pull-left">City:</label>
                    <input type="text" class="form-control getlatlong"  name="city" placeholder="City">
                </div>
                <div class="form-group">
                    <label class="pull-left">Postal Code:</label>
                    <input type="text" class="form-control getlatlong"  name="postcode" placeholder="Postal Code">
                </div>
                <div class="form-group">
                    <label class="pull-left">Country:</label>
                    <input type="text" class="form-control getlatlong"  name="country" placeholder="Country">
                    <input type="hidden" class="form-control"  name="c_latitude" id="c_latitude">
                    <input type="hidden" class="form-control"  name="c_longitude" id="c_longitude">
                </div>
                <div class="form-group">
                        <div class="checkbox i-checks">
                            <label> 
                                <input name="agree" type="checkbox"><i></i> Agree the terms and policy 
                            </label>
                        </div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="login">Login</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

@endsection
