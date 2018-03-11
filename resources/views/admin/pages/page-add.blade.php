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

        <form method="post" class="form-horizontal"  enctype="multipart/form-data"  action="{{ route ('pages-add') }}" id='muckavailableadd'>
            <div class="form-group">
                <label class="col-sm-3 control-label">Menu Title*</label>
                <div class="col-sm-7">
                    <input type="text" name="menu_name" placeholder="e.g. Service" class="form-control">
                    
                    {{ csrf_field() }}
                </div>
            </div>
            <!--<div class="hr-line-dashed"></div>-->
            <div class="form-group headingmain">						
                <h2 class="title" style="margin:10px">Parent Menu Detail</h2>								
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Parent Menu Detail*</label>
                <div class="col-sm-7">
                    <select class="form-control m-b" name="parent_id">
                        <option value="0">None</option>
                        @foreach($pageDetail as $pageDetails)
                        <option value="{{ $pageDetails['id'] }}">{{ $pageDetails['menu_name'] }}</option>
                        @endforeach
                        
                    </select>
                </div>
            </div>
            
            <div class="form-group headingmain" >						
                <h2 class="title" style="margin:10px">Page Detail</h2>								
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Page Detail*</label>
                <div class="col-sm-7">
                    <textarea rows="7" class="form-control" name="page_description"></textarea>
                </div>
            </div>
            
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-white" type="button">Cancel</button>
                    <button class="btn btn-primary" type="submit">Create Page</button>
                </div>
            </div>
        </form>
    </div>

</div>

@endsection
