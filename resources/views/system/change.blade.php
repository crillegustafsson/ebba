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
    <div id="page-wrapper" ng-controller="changeController" ng-init="sid({{ Auth::user()->storages_id}}, {{$id}})">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Change</h1> 
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
<div data-j-signature="form.signature" data-pen-color="#ff00ff" data-line-color="#00ffff" data-readonly="readonly"></div>





         <!--            MODALS           -->


   
<div class="modal fade" id="add" tabindex="-1" role="dialog"  aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close btn btn-danger" data-dismiss="modal">
                        <span aria-hidden="true" class="closeme">&times;</span>
                        <span class="sr-only">close</span>
                    </button>
                
                <h4 class="modal-title"><div class="ftitle">Lägg till:</div> ((nameOfProduct))</h4>
                </div>
                <div class="modal-body">
    <!--                         Add                               -->
                    <div ng-if="showForm==1" class="ProduktFinns"><h2 class="center">Produkten är redan inlagd!</h2><br><button class="btn btn-warning width100 modalinput" data-dismiss="modal">OK</button></div>
                <form name="testForm">
                    

                <input type="number" min="1" class="form-control modalinput" only-num name="value"  placeholder="0"  ng-model="products.quant" required pattern="\d*" /><br>
                <div class="check" id="nd">Utan debitering <input type="checkbox" ng-model="nd"></div>
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
                
                <h4 class="modal-title"><div class="ftitle">Ändra antal:</div> ((nameOfOrderProduct ))</h4>
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
                
                <h4 class="modal-title"><div class="ftitle">Ta bort:</div> ((nameOfOrderProduct))</h4>
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
                
                <h4 class="modal-title">Utför Transaktion</h4>
                </div>
                <div class="modal-body">
            
                    
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

    <script src="/js/changeController.js"></script>

@stop
@section('footer')
@stop