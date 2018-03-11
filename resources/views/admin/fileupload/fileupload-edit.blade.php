@extends('layouts.admin.app')

@section('title', $metatitle)

@section('content')

<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Upload File</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal"  enctype="multipart/form-data"  action="{{ route ('file-upload-edit',[$objFileuploadDetail['id']]) }}" id='fileadd'>
                            <div class="modal-body">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Menu Name *</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="display_name" placeholder="Menu Name *" value="{{ $objFileuploadDetail['display_name']}}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">File Name *</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="file_name" placeholder="File Name *" value="{{ $objFileuploadDetail['file_name']}}" class="form-control">
                                        <input type="hidden" name="id" value="{{ $objFileuploadDetail['id']}}" placeholder="File Name *" class="form-control">
                                        <input type="hidden" name="file_name" value="{{ $objFileuploadDetail['file_name']}}" placeholder="File Name *" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Upload File *</label>
                                    <div class="col-sm-7">
                                          <div class="fileinput fileinput-new input-group" data-provides="fileinput">

                                            <div class="form-control" data-trigger="fileinput">
                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                <span class="fileinput-filename"></span>
                                            </div>
                                            <span class="input-group-addon btn btn-default btn-file">
                                                <span class="fileinput-new">Select file</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="addnewfile"/>
                                                
                                            </span>
                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                                
                              
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a  href="{{ route ('file-upload') }}" type="button" class="btn btn-white" data-dismiss="modal"> Cancel </a>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
