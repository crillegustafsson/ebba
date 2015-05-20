@extends('layout.master')

@section('header')
@stop
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Saldo</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
    <div class="row">
        <div ng-app ng-init="tab = 1; value = 1" ng-cloak>
        <div class="row padding-bottom">
                    <div class="col-xs-6">        
                        <h4 class="utitle">Filtrera</h4>

                    <ul class="btn-group" id="dbox">
                        <li data-text="" ng-class="{ active: value=== 1 }" ng-click="value=1" class="filtrera btn btn-default">Se allt</li> 
                        <li data-text="stycksaker" ng-class="{ active: value==='stycksaker' }" ng-click="value='stycksaker'" class="btn btn-default">Stycksaker</li> 
                        <li data-text="5liter" ng-class="{ active: value==='5liter' }" ng-click="value='5liter'" class="btn btn-default">5liter</li> 
                        <li data-text="Torr" ng-class="{ active: value==='Torr' }" ng-click="value='Torr'" class="btn btn-default">Torr</li>
                    </ul>
                    </div>

                    <div class="col-xs-6">        
                        <h4 class="utitle">Lager</h4>

                    <ul class="btn-group lager">
                        <li ng-class="{ active: tab === 1 }" ng-click="tab = 1" class="btn btn-default">Huvudlager</li>
                        <li ng-class="{ active: tab === 2 }" ng-click="tab = 2" class="btn btn-default">Bil 1</li>
                        <li ng-class="{ active: tab === 3 }" ng-click="tab = 3" class="btn btn-default">Bil 2</li>
                        <li ng-class="{ active: tab === 4 }" ng-click="tab = 4" class="btn btn-default">Bil 3</li>
                    </ul>
                    </div>
        </div>


        <!-- /.row padding-bottom -->

                <div class="tab-containers">
                    <div ng-show="tab === 1" class="tab-container">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Lager
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-bordered table-hover table-striped dataTable6" id="dataTables1">
                                                <thead>
                                                    <tr>
                                                        <th>Namn</th>
                                                        <th>Art.Nr</th>
                                                        <th>Kvantitet/krt</th>
                                                        <th>Typ</th>
                                                        <th>Saldo</th>
                                                        @if (Auth::user()->isAdmin)
                                                        <th width="130">Ändra saldo</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   @foreach ($huvudlager as $huvudlager)
                                                        <tr>
                                                            <td>
                                                                {{ $huvudlager->products->productName }}
                                                            </td>
                                                            <td>
                                                                {{ $huvudlager->products->artnr }}
                                                            </td>
                                                            <td>
                                                                {{ $huvudlager->products->quantitypackage }}
                                                            </td>
                                                            <td>
                                                                {{ $huvudlager->products->type }}
                                                            </td>
                                                            <td>
                                                            <span ng-if="tab === 1">
                                                            @if($huvudlager->quantity <= $huvudlager->products->miniQuant)
                                                                <b class="red">{{ $huvudlager->quantity }}</b>
                                                            @else

                                                             {{ $huvudlager->quantity }}
                                                            @endif

                                                            </span>

                                                            </td>
                                                            @if (Auth::user()->isAdmin)
                                                            <td width="130" class="center">
                                                                <a href="{{ URL::route('updateSaldo', $huvudlager->products->id) }}" class="glyphicon glyphicon-pencil btn btn-warning"></a>
                                                            </td>
                                                            @endif
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

                <div class="tab-containers">
                    <div ng-show="tab === 2" class="tab-container">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-truck fa-fw"></i> Bil 1
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-bordered table-hover table-striped dataTable6" id="dataTables2">
                                                <thead>
                                                    <tr>
                                                        <th>Namn</th>
                                                        <th>Art.Nr</th>
                                                        <th>Kvantitet/krt</th>
                                                        <th>Typ</th>
                                                        <th>Saldo</th>
                                                        <th width="130">Ändra saldo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($bil1 as $bil1)
                                                        <tr>
                                                            <td>
                                                                {{ $bil1->products->productName }}
                                                            </td>
                                                            <td>
                                                                {{ $bil1->products->artnr }}
                                                            </td>
                                                            <td>
                                                                {{ $bil1->products->quantitypackage }}
                                                            </td>
                                                            <td>
                                                                {{ $bil1->products->type }}
                                                            </td>
                                                            <td>
                                                                {{ $bil1->quantity }}
                                                            </td>
                                                            @if (Auth::user()->isAdmin)
                                                            <td width="130" class="center">
                                                                <a href="{{ URL::route('updateSaldo', $huvudlager->products->id) }}" class="glyphicon glyphicon-pencil btn btn-warning"></a>
                                                            </td>
                                                            @endif
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
                    <!-- /.Tab2 -->

                    <div class="tab-containers">
                    <div ng-show="tab === 3" class="tab-container">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-truck fa-fw"></i> Bil 2
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-bordered table-hover table-striped dataTable6" id="dataTables3">
                                                <thead>
                                                    <tr>
                                                        <th>Namn</th>
                                                        <th>Art.Nr</th>
                                                        <th>Kvantitet/krt</th>
                                                        <th>Typ</th>
                                                        <th>Saldo</th>
                                                        <th width="130">Ändra saldo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($bil2 as $bil2)
                                                        <tr>
                                                            <td>
                                                                {{ $bil2->products->productName }}
                                                            </td>
                                                            <td>
                                                                {{ $bil2->products->artnr }}
                                                            </td>
                                                            <td>
                                                                {{ $bil2->products->quantitypackage }}
                                                            </td>
                                                            <td>
                                                                {{ $bil2->products->type }}
                                                            </td>
                                                            <td>
                                                                {{ $bil2->quantity }}
                                                            </td>
                                                            @if (Auth::user()->isAdmin)
                                                            <td width="130" class="center">
                                                                <a href="{{ URL::route('updateSaldo', $huvudlager->products->id) }}" class="glyphicon glyphicon-pencil btn btn-warning"></a>
                                                            </td>
                                                            @endif
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
                    <!-- /.Tab3 -->

                    <div class="tab-containers">
                    <div ng-show="tab === 4" class="tab-container">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-truck fa-fw"></i> Bil 3
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-bordered table-hover table-striped dataTable6" id="dataTables4">
                                                <thead>
                                                    <tr>
                                                        <th>Namn</th>
                                                        <th>Art.Nr</th>
                                                        <th>Kvantitet/krt</th>
                                                        <th>Typ</th>
                                                        <th>Saldo</th>
                                                        <th width="130">Ändra saldo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($bil3 as $bil3)
                                                        <tr>
                                                            <td>
                                                                {{ $bil3->products->productName }}
                                                            </td>
                                                            <td>
                                                                {{ $bil3->products->artnr }}
                                                            </td>
                                                            <td>
                                                                {{ $bil3->products->quantitypackage }}
                                                            </td>
                                                            <td>
                                                                {{ $bil3->products->type }}
                                                            </td>
                                                            <td>
                                                                {{ $bil3->quantity }}
                                                            </td>
                                                            @if (Auth::user()->isAdmin)
                                                            <td width="130" class="center">
                                                                <a href="{{ URL::route('updateSaldo', $huvudlager->products->id) }}" class="glyphicon glyphicon-pencil btn btn-warning"></a>
                                                            </td>
                                                            @endif
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
                    <!-- /.Tab4 -->

            </div>
            <!-- /.TAB- - - ng-app ng-init --> 
    </div>
    <!--/.Row -->      
</div>
<!-- /.page-wrapper -->


@stop
@section('footer')
@stop