@extends('layout.master')

@section('header')
@stop
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Runda</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
   <div class="row">
                <div class="tab-containers">
                    <div ng-show="tab === 1" class="tab-container">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-truck fa-fw"></i> Rundor
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-bordered table-hover table-striped dataTable" id="dataTables1">
                                                <thead>
                                                    <tr>
                                                        <th>RundID</th>
                                                        <th>Namn</th>
                                                        <th width="70">Val</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($rundor as $rundor)
                                                        <tr>
                                                            <td> 
                                                                {{ $rundor->id }}
                                                            </td>
                                                            <td>
                                                                {{ $rundor->name }}
                                                            </td>
                                                            <td width="70" class="center">
                                                            <button type="button" class="btn btn-info" onclick="window.location.href='{{ URL::route('runda', $rundor->id) }}'"><i class="fa fa-truck"></i> ...</i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.dataTable_wrapper -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        </div>
                        </div>
                        </div>
                    </div>
                    <!-- /.Tab1 -->

            </div>
            <!--</div>-->
            <!-- /.TAB- - - ng-app ng-init --> 


    <!--/.Row -->      
</div>
<!-- /.page-wrapper -->
@stop
@section('footer')
@stop