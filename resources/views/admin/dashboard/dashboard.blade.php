@extends('layouts.admin.app')

@section('title', $metatitle)

@section('content')

<!--<div class="wrapper wrapper-content">
    <div class="middle-box text-center animated fadeInRightBig">
        <h3 class="font-bold">This is page content</h3>
        <div class="error-desc">
            You can create here any grid layout you want. And any variation layout you imagine:) Check out
            main dashboard and other site. It use many different layout.
            <br/><a href="index.html" class="btn btn-primary m-t">Dashboard</a>
        </div>
    </div>
</div>-->
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Account Information</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-lock" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-address-card-o" style="font-size:45px;"></i>
                                sss
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-line-chart" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Server Admin</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-gears" aria-hidden="true" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-warning" style="font-size:45px;"></i>
                                ssss
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-vcard-o" aria-hidden="true" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>


                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-eye" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>

                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-code-fork" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-wrench" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-eraser" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Advance</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-refresh" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-calendar" style="font-size:45px;"></i>
                                sss
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-question-circle" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-line-chart " style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-pie-chart " style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Database Management</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-database" aria-hidden="true" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-warning" style="font-size:45px;"></i>
                                ssss
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-group" aria-hidden="true" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>


                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-desktop" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Domain Management</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class=" fa fa-soccer-ball-o"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-support" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-globe" style="font-size:45px;"></i>
                                sss
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-car" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-credit-card" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Mail</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-drivers-license-o" aria-hidden="true" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-comments" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-paper-plane-o" aria-hidden="true" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>

                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-at" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-envelope-open-o" style="font-size:45px;"></i>
                                ssss
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Reseller</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-film" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-address-book" style="font-size:45px;"></i>
                                sss
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-bars" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-gift" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-laptop" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>File Management</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-2">
                            <a class="" href="javascript:;">
                                <i class="fa fa-cloud-upload" aria-hidden="true" style="font-size:45px;"></i>
                                Change
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
