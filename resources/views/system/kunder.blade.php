@extends('layout.master')

@section('header')
@stop
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kunder</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
   <div class="row">
                <div class="tab-containers">
                    <div ng-show="tab === 1" class="tab-container">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-group fa-fw"></i> Kundinformation
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-bordered table-hover table-striped" id="dataTables1">
                                                <thead>
                                                    <tr>
                                                        <th>Företag</th>
                                                        <th>Stad</th>
                                                        <th>Adress</th>
                                                        <th>Telefon</th>
                                                        <th>Mail</th>
                                                        <th width="70">Se kund</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($kunder as $kunder)
                                                        <tr>
                                                            <td> 
                                                                {{ $kunder->company }}
                                                            </td>
                                                            <td>
                                                                {{ $kunder->city }}
                                                            </td>
                                                            <td>
                                                                <a href="{{ $kunder->gadress }}" target="_blank">{{ $kunder->adress }}</a>
                                                            </td>
                                                            <td>
                                                                {{ $kunder->phone }}
                                                            </td>
                                                            <td>
                                                                {{ $kunder->mail }}
                                                            </td>
                                                            <td width="70" class="center">
                                                            <button type="button" class="btn btn-info" onclick="window.location.href='{{ URL::route('kundinformation', $kunder->id) }}'"><i class="fa fa-eye"></i></button>
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
            <!--/.Row -->

</div>
<!-- /.page-wrapper -->

@stop
@section('footer')
@stop