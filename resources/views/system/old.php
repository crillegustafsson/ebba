@extends('layout.master')

@section('header')
@stop
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Inleverans</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                {{-- right col --}}

                <div class="col-lg-8 wborder">
                    {{-- panel start --}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i>     
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                       <ul class="btn-group lager">
                        <li ng-class="{ active: tab === 1 }" ng-click="tab = 1" class="btn btn-default">Styck varor</li>
                        <li ng-class="{ active: tab === 2 }" ng-click="tab = 2" class="btn btn-default">5 Liters</li>
                        <li ng-class="{ active: tab === 3 }" ng-click="tab = 3" class="btn btn-default">Torr varor</li>
                                         </ul>
                                <!-- /.col-lg-4 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                     </div>
                     {{-- panel end --}}
                </div>
                {{-- left col --}}
                <div class="col-lg-4 wborder">

                    {{-- panel start --}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i>     
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="table-responsive">
                                        
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                     </div>
                     {{-- panel end --}}

                </div>
            </div>  
            <!-- /.panel-default -->
</div>
<!-- /.page-wrapper -->
@stop
@section('footer')
@stop