@extends('layout.master')

@section('header')
@stop
@section('content')

<div ng-app="msgApp">
     
<div id="page-wrapper" ng-controller="msgController" ng-init="Cid('{{ $kundinformation->id }}')">
            <div class="row customerheader">
                <div class="col-xs-auto">
                    <div class="arrow_box">
                     
                    
                        <h2 class="companytitle">{{ $kundinformation->company }}</h2>
                        
                    </div>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-xs-8">
                    <div class="">
                        <!-- /.panel-heading -->
                        <div class="panel-body none">
                            <div class="table-responsive">
                                <table class="table dataTable3 datainfo">
                                    <thead>
                                        <tr>
                                            <th><i class="fa fa-user"></i> Adress</th>
                                            <th><i class="fa fa-home"></i> ID</th>
                                            <th><i class="fa fa-phone"></i> Kontakt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="">{{ $kundinformation->city }}</td>
                                            <td class="">{{ $kundinformation->owner }}</td>
                                            <td class="">{{ $kundinformation->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td class=""><a href="{{ $kundinformation->gadress }}" target="_blank">{{ $kundinformation->adress }}</a></td>
                                            <td class="">{{ $kundinformation->orgnr }}</td>
                                            <td class="">{{ $kundinformation->mail }}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
            <br>
            
             @if(!Auth::user()->storages_id == NULL)
    <div class="row">
    <div class="row50 col-left">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Orderhantering
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <form role="form">
                                        <button type="button" class="btn btn-success btn-lg btn-block" ng-click="changeView()">Skapa order</button><br>
                                        <a href="/rundor" style="text-decoration : none;"><button type="button" class="btn btn-info btn-lg btn-block">Tillbaka till runda</button></a>
                                    </form>
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-xs-6 -->
    </div>
    @endif
    <!-- /row50-->
    <div class="row50 col-right">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Skriv notering
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <form role="form">

                                        <div class="form-group">
                                            <textarea type="text" class="form-control" rows="3" ng-model="newCommentText"></textarea>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary" ng-click="addComment()">Skicka notering</button>
                                    </form>
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-xs-6 -->

                <div class="col-xs-12" ng-repeat="comment in comments">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Notis
                            <button type="button" class="close btn btn-danger" data-dismiss="modal">
                                <span aria-hidden="true" class="closemesmall" ng-click="remove($index, comment)">&times;</span>
                                <span class="sr-only">close</span>
                            </button>
                        </div>
                        <div class="panel-body" ng-cloak>
                                <p>@{{ comment.comment }}</p>
                        </div>
                        <div class="panel-footer">
                            <!-- @{{ comment.created_at }} -->
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
    </div>
    </div>
    <!--/.Row -->      
</div>
<!-- /.page-wrapper -->

</div>
<!-- /.ng-App -->

<script src="../js/msgcontroller.js"></script>

@stop
@section('footer')
@stop