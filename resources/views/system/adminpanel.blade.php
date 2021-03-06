@extends('layout.master')

@section('header')
@stop
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Adminpanel</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
    <div class="row">
        <div ng-app ng-init="tab = 1; value = 1">
        <div class="row padding-bottom">

                    <div class="col-xs-12">        
                        <h4 class="utitle">Välj kategori</h4>

                    <ul class="btn-group lager">
                        <li ng-class="{ active: tab === 1 }" ng-click="tab = 1" class="btn btn-default">Produkt</li>
                        <li ng-class="{ active: tab === 2 }" ng-click="tab = 2" class="btn btn-default">Rundor</li>
                        <li ng-class="{ active: tab === 3 }" ng-click="tab = 3" class="btn btn-default">Lager/Bil</li>
                        <li ng-class="{ active: tab === 4 }" ng-click="tab = 4" class="btn btn-default">Kund</li>
                        <li ng-class="{ active: tab === 5 }" ng-click="tab = 5" class="btn btn-default">Användare</li>
                    </ul>
                    </div>

        </div>
        <!-- tab-containers 1"> -->
        <div class="tab-containers">
            <div ng-show="tab === 1" class="tab-container">
                <div class="panel-default width100">
                    <div class="col-xs-12">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>!</strong> Kontrollera så alla fält är ifyllda.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h3>Lägg till ny produkt</h3><br>
                        <form class="form-group adminformpanel" role="form" method="POST" action="createProduct">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label>Produktnamn</label>
                                <input type="text" class="form-control" name="productName" value="">
                            </div>

                            <div class="form-group">
                                <label>Välj kategori</label>
                                <select class="form-control" name="type"><br>
                                    <option value="stycksaker">Stycksaker</option>
                                    <option value="5liter">5liter</option>
                                    <option value="torr">Torrvaror</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Artikelnummer</label>
                                <input class="form-control" name="artnr">
                            </div>

                            <div class="form-group">
                                <label>Pris</label>
                                <input class="form-control" name="price">
                            </div>

                            <div class="form-group">
                                <label>Kvant/krt</label>
                                <input class="form-control" name="quantitypackage">
                            </div>

                            <div class="form-group">
                                <label>Lager varning</label>
                                <input class="form-control" name="miniQuant">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                        Lägg till
                                </button>
                            </div>
                            
                        </form>
                    </div>
                </div>

                <!-- FORM innehåll -->
                <div class="panel panel-default width100">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Lager
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-bordered table-hover table-striped dataTable" id="dataTables1">
                                                <thead>
                                                    <tr>
                                                        <th width="auto">Namn</th>
                                                        <th width="auto">Art.Nr</th>
                                                        <th width="auto">Kvant/krt</th>
                                                        <th width="auto">Typ</th>
                                                        <th width="auto">Pris</th>
                                                        <th width="70">Ändra</th>
                                                        <th width="70">Ta bort</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($allaprodukter as $allaprodukter)
                                                        <tr>
                                                            <td>
                                                                {{ $allaprodukter->productName }}
                                                            </td>
                                                            <td>
                                                                {{ $allaprodukter->artnr }}
                                                            </td>
                                                            <td>
                                                                {{ $allaprodukter->quantitypackage }}
                                                            </td>
                                                            <td>
                                                                {{ $allaprodukter->type }}
                                                            </td>
                                                            <td>
                                                                {{ $allaprodukter->price }} kr
                                                            </td>
                                                            <td width="70" class="center">
                                                                
                                                                <a href="{{ URL::route('adminUpdateProduct', $allaprodukter->id) }}" class="glyphicon glyphicon-pencil btn btn-warning"></a>
                                                            </td>
                                                            <td width="70" class="center">
                                                                <a href="{{ URL::route('deleteProduct', $allaprodukter->id) }}" class="glyphicon glyphicon-remove btn btn-danger"></a>
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

                <!-- FORM innehåll -->

            </div>
        </div>
        <!-- tab-containers 1 END"> -->

        <!-- tab-containers 2"> -->
        <div class="tab-containers">
            <div ng-show="tab === 2" class="tab-container">
                <div class="panel-default width100">
                    <div class="col-xs-12">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>!</strong> Kontrollera så alla fält är ifyllda.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h3>Lägg till ny runda</h3><br>
                        <form class="form-group  adminformpanel" role="form" method="POST" action="createRoute">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label>Rundans namn</label>
                                <input type="text" class="form-control" name="name">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                        Lägg till
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- FORM innehåll -->
                <div class="panel panel-default width100">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Lager
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-bordered table-hover table-striped" id="dataTables2">
                                                <thead>
                                                    <tr>
                                                        <th>Rundor</th>
                                                        <th width="70">Ändra</th>
                                                        <th width="70">Ta bort</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($allarundor as $allarundor)
                                                        <tr>
                                                            <td>
                                                                {{ $allarundor->name }}
                                                            </td>
                                                            <td width="70" class="center">
                                                                <a href="{{ URL::route('updateRoute', $allarundor->id) }}" class="glyphicon glyphicon-pencil btn btn-warning"></a>
                                                            </td>
                                                            <td width="70" class="center">
                                                                <a href="{{ URL::route('deleteRoute', $allarundor->id) }}" class="glyphicon glyphicon-remove btn btn-danger"></a>
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

                <!-- FORM innehåll -->

            </div>
        </div>


        <!-- tab-containers 2 END"> -->

        <!-- tab-containers 3"> -->
        <div class="tab-containers">
            <div ng-show="tab === 3" class="tab-container">
                <div class="panel-default width100">
                    <div class="col-xs-12">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>!</strong> Kontrollera så alla fält är ifyllda.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h3>Lägg till nytt lager eller en ny bil</h3><br>
                        <form class="form-group adminformpanel" role="form" method="POST" action="createStorage">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label>Namn på lagret</label>
                                <input type="text" class="form-control" name="storageName">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                        Lägg till
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- FORM innehåll -->
                <div class="panel panel-default width100">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Lager
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-bordered table-hover table-striped dataTable" id="dataTables3">
                                                <thead>
                                                    <tr>
                                                        <th>Lager</th>
                                                        <th width="70">Ändra</th>
                                                        <th width="70">Ta bort</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($lagerobil as $lagerobil)
                                                        <tr>
                                                            <td>
                                                                {{ $lagerobil->storageName }}
                                                            </td>
                                                            <td width="70" class="center">
                                                                
                                                                <a href="{{ URL::route('updateStorage', $lagerobil->id) }}" class="glyphicon glyphicon-pencil btn btn-warning"></a>
                                                            </td>
                                                            <td width="70" class="center">
                                                                <a href="{{ URL::route('deleteStorage', $lagerobil->id) }}" class="glyphicon glyphicon-remove btn btn-danger"></a>
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

                <!-- FORM innehåll -->

            </div>
        </div>
        <!-- tab-containers 3 END"> -->

        <!-- tab-containers 4"> -->
        <div class="tab-containers">
            <div ng-show="tab === 4" class="tab-container">
                <div class="panel-default width100">
                    <div class="col-xs-12">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>!</strong> Kontrollera så alla fält är ifyllda.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h3>Lägg till ny kund</h3><br>
                            <form class="form-group adminformpanel" role="form" method="POST" action="createCustomer">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label>Företags ID</label>
                                        <input type="text" class="form-control" name="companyId">
                                </div>
                                <div class="form-group">
                                    <label>Företag</label>
                                    <input type="text" class="form-control" name="company">
                                </div>
                                <div class="form-group">
                                    <label>Stad</label>
                                    <input type="text" class="form-control" name="city">
                                </div>
                                <div class="form-group">
                                    <label>Adress</label>
                                    <input type="text" class="form-control" name="adress">
                                </div>
                                <div class="form-group">
                                    <label>Google Adress</label>
                                    <input type="text" class="form-control" name="gadress">
                                </div>
                                <div class="form-group">
                                    <label>Telefon</label>
                                    <input type="text" class="form-control" name="phone">
                                </div>
                                <div class="form-group">
                                    <label>Mail</label>
                                    <input type="text" class="form-control" name="mail">
                                </div>
                                <div class="form-group">
                                    <label>Orgnr</label>
                                    <input type="text" class="form-control" name="orgnr">
                                </div>
                                <div class="form-group">
                                    <label>Ägare</label>
                                    <input type="text" class="form-control" name="owner">
                                </div>
                                <div class="form-group check">
                                        <label>Ringkund</label>
                                    <div class="checkbox">
                                        <input type="checkbox" value="1" name="callupCustomer">
                                    </div>
                                </div>
                                <div class="form-group check">
                                    <label>Orderkund</label>
                                    <div class="checkbox">
                                        <input type="checkbox" value="1" name="orderCustomer">
                                    </div>
                                </div>
                                <div class="form-group check">
                                    <label>RundID</label>
                                        <input type="text" class="form-control" name="routes_id">
                                </div>
                                <div class="form-group check">
                                    <label>Sortering</label>
                                        <input type="text" class="form-control" name="sort">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                            Lägg till
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- FORM innehåll -->
                <div class="panel panel-default width100">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Lager
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-bordered table-hover table-striped dataTable" id="dataTables4">
                                                <thead>
                                                    <tr>
                                                        <th>Företag</th>
                                                        <th>Stad</th>
                                                        <th>Adress</th>
                                                        <th>Telefon</th>
                                                        <th>Mail</th>
                                                        <th width="70">Ändra</th>
                                                        <th width="70">Ta bort</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($allakunder as $allakunder)
                                                        <tr>
                                                            <td> 
                                                                {{ $allakunder->company }}
                                                            </td>
                                                            <td>
                                                                {{ $allakunder->city }}
                                                            </td>
                                                            <td>
                                                                {{ $allakunder->adress }}
                                                            </td>
                                                            <td>
                                                                {{ $allakunder->phone }}
                                                            </td>
                                                            <td>
                                                                {{ $allakunder->mail }}
                                                            </td>
                                                            <td width="70" class="center">
                                                                <a href="{{ URL::route('updateCustomer', $allakunder->id) }}" class="glyphicon glyphicon-pencil btn btn-warning"></a>
                                                            </td>
                                                            <td width="70" class="center">
                                                                <a href="{{ URL::route('deleteCustomer', $allakunder->id) }}" class="glyphicon glyphicon-remove btn btn-danger"></a>
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

                <!-- FORM innehåll -->
                    
            </div>
        </div>
        <!-- tab-containers 4 END"> -->

        <!-- tab-containers 5"> -->
        <div class="tab-containers">
            <div ng-show="tab === 5" class="tab-container">
                <div class="panel-default width100">
                    <div class="col-xs-12">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>!</strong> Kontrollera så alla fält är ifyllda.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h3>Registrera ny användare</h3><br>
                            <form class="form-group adminformpanel" role="form" method="POST" action="createUser">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label>Förnamn</label>
                                    <input type="text" class="form-control" name="fname">
                                </div>

                                <div class="form-group">
                                    <label>Efternamn</label>
                                    <input type="text" class="form-control" name="sname">
                                </div>

                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <input type="email" class="form-control" name="email">
                                </div>

                                <div class="form-group">
                                    <label>Lösenord</label>
                                    <input type="password" class="form-control" name="password">
                                </div>

                                <div class="form-group">
                                    <label>Bekräfta lösenord</label>
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>

                                <div class="form-group check">
                                        <label>Admin?</label>
                                    <div class="checkbox">
                                        <input type="checkbox" name="isAdmin">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                            Registrera
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                <!-- FORM innehåll -->
                <div class="panel panel-default width100">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Lager
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-bordered table-hover table-striped dataTable" id="dataTables5">
                                                <thead>
                                                    <tr>
                                                        <th>Namn</th>
                                                        <th>E-mail</th>
                                                        <th width="70">Ändra</th>
                                                        <th width="70">Ta bort</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($allakonton as $allakonton)
                                                        <tr>
                                                            <td>
                                                                {{ $allakonton->fname }} {{ $allakonton->sname }}
                                                            </td>
                                                            <td>
                                                                {{ $allakonton->email }}
                                                            </td>
                                                            <td width="70" class="center">
                                                                
                                                                <a href="{{ URL::route('updateUser', $allakonton->id) }}" class="glyphicon glyphicon-pencil btn btn-warning"></a>
                                                            </td>
                                                            <td width="70" class="center">
                                                                <a href="{{ URL::route('deleteUser', $allakonton->id) }}" class="glyphicon glyphicon-remove btn btn-danger"></a>
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

                <!-- FORM innehåll -->

            </div>
        </div>
        <!-- tab-containers 5 END"> -->

       

        </div>
    </div>
    <!--/.Row -->      
</div>
<!-- /.page-wrapper -->

@stop
@section('footer')
@stop