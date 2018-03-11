@extends('layouts.admin.app')

@section('title', $metatitle)

@section('content')

<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>File Upload List</h5>
                        <div class="ibox-tools">
                            <a href="{{ route ('file-upload-add') }}" class="btn btn-primary">
                                <i class="fa fa-plus"></i>Add New
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Display Name</th>
                                        <th>File name</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($objFileuploadResult as $objFileuploadResults)
                                    <tr class="gradeX">
                                        <td>{{ $objFileuploadResults['display_name'] }}</td>
                                        <td>{{ $objFileuploadResults['file_name'] }}</td>
                                        <td>{{ $objFileuploadResults['status'] }}</td>
                                        <td class="center">{{ date("d M Y",strtotime($objFileuploadResults['created_at'])) }}</td>
                                        <td>
                                            <a href="{{ route('file-upload-edit',[$objFileuploadResults['id']])}}"><i class="fa fa-edit text-navy"></i></a>
                                            <a href="{{ route('file-upload-status',[$objFileuploadResults['id']])}}"><i class="fa fa-save text-navy"></i></a>
                                            <a data-toggle="modal" data-target="#myModal_autocomplete"  data-id="{{ $objFileuploadResults['id'] }}" class="deletebutton" href="javascript;;"><i class="fa fa-close text-navy"></i></a>
                                          
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                           </table>
                        </div>
                    </div>
                    <div class="modal inmodal" id="myModal_autocomplete" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated bounceInRight">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <i class="fa fa-close modal-icon"></i>
                                    <h4 class="modal-title">Delete</h4>
                                    <!--<small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>-->
                                </div>
                                <div class="modal-body">
                                    <h4>Are you sure?</h4>
                                    {{ csrf_field() }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                    <button  id='btndelete' data-url="{{ route('file-upload-delete')}}" data-id="" type="button" class="btn btn-primary">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal inmodal" id="myModal_interested" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated bounceInRight">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <i class="fa fa-user modal-icon"></i>
                                    <h4 class="modal-title">Interested User List</h4>
                                    <!--<small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>-->
                                </div>
                                <div class="modal-body">
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                   
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
