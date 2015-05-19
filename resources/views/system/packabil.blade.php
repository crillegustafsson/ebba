@extends('layout.master')

@section('header')
@stop
@section('content')
<style type="text/css">
    .from-control{
        width: 40px;
    }
</style>

     
<div ng-app="packaBil">
    <div id="page-wrapper" ng-controller="packaController" ng-init="uid('{{ Auth::user()->id }}')">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Packa Bil </h1> 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                {{-- right col --}}

                <div class="col-xs-6 wborder" ng-init="tab = 7 " ng-cloak>
                    {{-- panel start --}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> ((selectedValFrom.label))  
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                       <ul class="btn-group lager">
                        <li ng-class="{ active: tab === 7 }" ng-click="tab = 7; sort = {type: ''}" class="btn btn-default">Alla</li>
                        <li ng-class="{ active: tab === 1 }" ng-click="tab = 1; sort = {type: 'stycksaker'}" class="btn btn-default">Styck varor</li>
                        <li ng-class="{ active: tab === 2 }" ng-click="tab = 2; sort = {type: '5liter'}" class="btn btn-default">5 Liters</li>
                        <li ng-class="{ active: tab === 3 }" ng-click="tab = 3; sort = {type: 'torr'}" class="btn btn-default">Torr varor</li>
                                         </ul>
                                <!-- /.col-lg-4 -->
                            </div>
                             <div class="row">
                                    <div class="col-lg-12">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-bordered table-hover table-striped dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>Art.Nr</th>
                                                        <th>Namn</th>
                                                        <th>I lager</th>
                                                        <th width="70">Val</th>
                                                    </tr>
                                                </thead>
                                                <tbody ng-cloak>
                                                    
                                                      
                                                        <tr ng-repeat="product in products  | toArray | orderBy:'type' | filter:sort">
                                                           <td id="((product.type))">
                                                             <p>(( product.artnr )) </p>
                                                            </td>
                                                            <td id="((product.type))">
                                                                (( product.productName )) 
                                                            </td>
                                                            <td id="((product.type))">
                                                                (( product.quantity)) 
                                                            </td>
                                                            <td width="70" class="center">
                                                                <button type="button" class="btn btn-success plus" ng-click="go($index, product)" name="((product.id))" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i></button>
                                                            </td>
                                                        </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.dataTable_wrapper -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                     </div>
                     {{-- panel end --}}
                </div>
                {{-- left col --}}
                <div class="col-xs-6 wborder">

                    {{-- panel start --}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-long-arrow-right fa-fw"> </i> ((selectedValTill.label))  
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                       <ul class="btn-group lager">
                        <li ng-class="{ active: tab === 8 }" ng-click="tab = 8; Osort = {type: ''}" class="btn btn-default">Alla</li>
                        <li ng-class="{ active: tab === 4 }" ng-click="tab = 4; Osort = {type: 'stycksaker'}" class="btn btn-default">Styck varor</li>
                        <li ng-class="{ active: tab === 5 }" ng-click="tab = 5; Osort = {type: '5liter'}" class="btn btn-default">5 Liters</li>
                        <li ng-class="{ active: tab === 6 }" ng-click="tab = 6; Osort = {type: 'torr'}" class="btn btn-default">Torr varor</li>
                                         </ul>
                                <!-- /.col-lg-4 -->
                            </div>
                             <div class="row">
                                    <div class="col-lg-12">
                                        
                                            <table class="table table-bordered table-hover table-striped dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>Art.Nr</th>
                                                        <th>Namn</th>
                                                        <th>Antal</th>
                                                        <th width="70">Ändra</th>
                                                        <th width="70">Ta bort</th>
                                                    </tr>
                                                </thead>
                                                <tbody ng-cloak>
                                                    
                                                        <tr ng-repeat="order in orders | toArray | orderBy:'type' | filter:Osort">

                                                            <td>
                                                               ((order.artnr))
                                                            </td>
                                                            <td>
                                                                ((order.productName))
                                                            </td>
                                                            <td>
                                                                ((order.newQuant))
                                                            </td>
                                                            <td width="70" class="center">
                                                                <button type="button" class="glyphicon glyphicon-pencil btn btn-warning" ng-click="go($index, order)" data-toggle="modal" data-target="#update"></button>
                                                            </td>
                                                            <td width="70" class="center">
                                                                <button type="button" class="glyphicon glyphicon-remove btn btn-danger" data-toggle="modal" data-target="#delete" ng-click="go($index, order)"></button>

                                                            </td>
                                                        </tr>

                                                </tbody>
                                            </table>
                                       <button type="button" class="btn btn-primary width100" data-toggle="modal" data-target="#done" >Klar</button>
                                        <!-- /.dataTable_wrapper -->
                                </div>
                            <!-- /.panel-body -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                     </div>
                     {{-- panel end --}}

                </div>
            </div>  




<div class="modal fade" id="myModal"  data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-init="isDisabled = true">

        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                   
                
                <h4 class="modal-title">Från - Till</h4>
                </div>
                <div class="modal-body" ng-cloak>
    <!--                         Choose storages                             -->
                     <div ng-if="showForm==1" class="ProduktFinns"><h2 class="center">Det finns en pågående transaktion <br> vänligen slutför denna innan du påbörjar en ny.</h2><br><button class="btn btn-warning width100 modalinput" data-dismiss="modal">OK</button></div><br>
                  <label for="from">Från</label> <select class="form-control input-sm" name="from" ng-model="selectedValFrom" ng-options="opt as opt.storageName for opt in StoragesOptions" ng-change="change()"></select> <br>
                  <label for="from">Till</label> <select class="form-control input-sm"  name="till" ng-model="selectedValTill" ng-options="opt as opt.storageName for opt in StoragesOptions" ng-change="change()"></select> <br><br>
                  <br>
                  


                    <button class="btn btn-primary width100 btn-lg" ng-disabled="isDisabled" data-dismiss="modal" ng-click="ToFrom()">Klar</button>
                </div>

            </div>
        </div>
    </div>

         <!--            MODALS           -->
   
<div class="modal fade" id="add" tabindex="-1" role="dialog"  aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close btn btn-danger" data-dismiss="modal">
                        <span aria-hidden="true" class="closeme">&times;</span>
                        <span class="sr-only">close</span>
                    </button>
                
                <h4 class="modal-title" ng-cloak><div class="ftitle">Lägg till:</div> ((nameOfProduct))</h4>
                </div>
                <div class="modal-body" ng-cloak>
    <!--                         Add                               -->
                    <div ng-if="showForm==1" class="ProduktFinns"><h2 class="center">Produkten är redan inlagd!</h2><br><button class="btn btn-warning width100 modalinput" data-dismiss="modal">OK</button></div>
                <form name="testForm">
                    

                <input type="number" min="1" class="form-control modalinput" only-num name="value"  placeholder="0"  ng-model="products.quant" required pattern="\d*" /><br>

                    <button class="btn btn-success width100 modalinput" ng-click="addProduct(productId)" data-dismiss="modal">Lägg till</button>
                    
                </form>
            
            
                </div>

            </div>
        </div>
    </div>

    <!--                         UPDATE                           -->
<div class="modal fade" id="update" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn btn-danger" data-dismiss="modal">
                        <span aria-hidden="true" class="closeme">&times;</span>
                        <span class="sr-only">close</span>
                    </button>
                
                <h4 class="modal-title" ng-cloak><div class="ftitle">Ändra antal:</div> ((nameOfOrderProduct ))</h4>
                </div>
                <div class="modal-body" ng-cloak>
            
                    
                <form name="test" id="test" class="center">
                <input type="number" min="1" class="form-control modalinput" only-num placeholder="0" ng-model="orders.quant" ><br>
                    <button class="btn btn-warning width100 modalinput" ng-click="update(productId)" data-dismiss="modal">Uppdatera</button>
                </form>

            
                </div>

            </div>
        </div>
    </div>

    <!--                        Delete                              -->

    <div class="modal fade" id="delete" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn btn-danger" data-dismiss="modal">
                        <span aria-hidden="true" class="closeme">&times;</span>
                        <span class="sr-only">close</span>
                    </button>
                
                <h4 class="modal-title" ng-cloak><div class="ftitle">Ta bort:</div> ((nameOfOrderProduct))</h4>
                </div>
                <div class="modal-body" ng-cloak>
            
                    
                <form name="test" id="test" class="center">

                <h2 class="center">Är du säker att du vill ta bort (( nameOfOrderProduct ))?</h2><br>
                   <button type="button" class="btn btn-danger width48 modalinput"  data-dismiss="modal" ng-click="remove(productId)">Ja</button>

                    <button class="btn btn-warning width48 modalinput" data-dismiss="modal">Nej</button>
                </form>

            
                </div>

            </div>
        </div>
    </div>

    <!--                        Done                                 -->

    <div class="modal fade" id="done" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn btn-danger" data-dismiss="modal">
                        <span aria-hidden="true" class="closeme">&times;</span>
                        <span class="sr-only">close</span>
                    </button>
                
                <h4 class="modal-title">Utför Transaktion</h4>
                </div>
                <div class="modal-body" ng-cloak>
            
                    
                <form name="test" id="test" class="center">

                <h3 class="center">Är du säker på att du vill utföra transaktionen? </h3><br>
                 <table class="table table-bordered table-hover table-striped dataTable7">
                                                <thead>
                                                    <tr>
                                                        <th>Art.Nr</th>
                                                        <th>Namn</th>
                                                        <th>Antal</th> 
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                        <tr ng-repeat="order in orders | toArray | orderBy:'typ' | filter:Osort">

                                                            <td>
                                                               ((order.artnr))
                                                            </td>
                                                            <td>
                                                                ((order.productName))
                                                            </td>
                                                            <td>
                                                                ((order.newQuant))
                                                            </td>
                                                        </tr>

                                                </tbody>
                                            </table>
                   <button type="button" class="btn btn-success width48 modalinput"  data-dismiss="modal" ng-click="done()">Ja</button>

                    <button class="btn btn-danger width48 modalinput" data-dismiss="modal">Nej</button>
                </form>

            
                </div>

            </div>
        </div>
    </div>

</div>        <!-- /.panel-default -->
</div>
<!--ng app init -->


    <!--                                MODULE                                       -->


</div>
</div>

    <script src="js/packaController.js"></script>

@stop
@section('footer')
@stop