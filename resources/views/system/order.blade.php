@extends('layout.master')

@section('header')
@stop
@section('content')
<style type="text/css">
    .from-control{
        width: 40px;
    }
</style>

<div ng-app="Order">
    <div id="page-wrapper" ng-controller="orderController" ng-init="sid({{ Auth::user()->storages_id}}, {{$id}})">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Order</h1> 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                {{-- right col --}}

                <div class="col-xs-6 wborder" ng-init="tab = 7">
                    {{-- panel start --}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> 
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
                            <i class="fa fa-long-arrow-right fa-fw"> </i> {{$customer->company}}  
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
                                                        <th class="smallwidth">Art.Nr</th>
                                                        <th>Namn</th>
                                                        <th class="smallwidth">Antal</th>
                                                        <th class="smallwidth">UD</th>
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
                                                            <td class="center plus">
                                                                <span ng-if="order.nd == 1"><i class="fa fa-check green"></i></span>
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
                                       <button type="button" class="btn btn-primary width100" data-toggle="modal" data-target="#done">Klar</button>
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
                <div class="modal-body" id="existorder">
    <!--                         Add                               -->
                    <div ng-if="showForm==1" class="ProduktFinns" id="ProduktFinns"><h2 class="center">Produkten är redan inlagd!</h2><br><button class="btn btn-warning width100 modalinput" id="okbutton" data-dismiss="modal">OK</button></div>
                <form name="testForm">

                <input type="number" min="1" class="form-control modalinput" only-num name="value"  placeholder="0"  ng-model="products.quant" required pattern="\d*" /><br>
                <div class="check" id="nd">Utan debitering <input type="checkbox" ng-model="nd"></div>
                    <button class="btn btn-success width100 modalinput" id="addbutton" ng-click="addProduct(productId)" data-dismiss="modal">Lägg till</button>
                    
            <script>
                // if ($('.ProduktFinns.ng-scope').show() ) {
                //     $('#addbutton').hide();
                // }
                // else if ($('.ProduktFinns.ng-scope').hide() ) {
                //     $('#addbutton').show();
                // }
            </script>
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
                <div class="modal-body">
            
                    
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
                <div class="modal-body">
            
                    
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
                
                <h4 class="modal-title">Granska order</h4>
                </div>
                <div class="modal-body">
            
                    
                <form name="test" id="test" class="center">

                <h3 class="center">Granska ordern innan signering </h3><br>
                 <table class="table table-bordered table-hover table-striped dataTable7">
                                                <thead>
                                                    <tr>
                                                        <th>Art.Nr</th>
                                                        <th>Namn</th>
                                                        <th>Antal</th> 
                                                        <th class="smallwidth">U D</th>
                                                    </tr>
                                                </thead>
                                                <tbody ng-cloak>
                                                    
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
                                                            <td class="center">
                                                                <span ng-if="order.nd == 1"><i class="fa fa-check green"></i></span>
                                                            </td>
                                                        </tr>

                                                </tbody>
                                            </table>
                   <button type="button" class="btn btn-success width48 modalinput"  data-dismiss="modal" ng-click="done()">Signera</button>

                    <button class="btn btn-danger width48 modalinput" data-dismiss="modal">Ändra</button>
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

    <script src="/js/orderController.js"></script>
    


@stop
@section('footer')
@stop