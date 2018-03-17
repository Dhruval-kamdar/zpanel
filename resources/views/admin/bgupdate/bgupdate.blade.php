@extends('layouts.admin.app')

@section('title', $metatitle)

@section('content')

<style>
    .form-horizontal .form-group {
        margin-right: 0;
        margin-left: 0; 
    }
    h2.title {
        color: #3D7B66;
        /*font-family: Helvetica;*/
        font-size: 20px;
    }
    .headingmain{
        /*border: 1px solid #999999;*/
        background-color:#F8F8F8;
        border-left:transparent;
        border-right:transparent;
    }
</style>
<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">

        <form method="post" class="form-horizontal"  enctype="multipart/form-data"  action="{{ route ('bg-update') }}" id='bgcolor'>
            <div class="form-group">
                <label class="col-sm-3 control-label">Menu Title*</label>
                <div class="col-sm-7">
                    <input type="text" name="bgcolor" value="" placeholder="e.g. Service" class="form-control bgcolorcode">
                    
                    {{ csrf_field() }}
                </div>
            </div>
           
   
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-white" type="button">Cancel</button>
                    <button class="btn btn-primary" type="submit">Change Background</button>
                </div>
            </div>
        </form>
    </div>

</div>

@endsection
