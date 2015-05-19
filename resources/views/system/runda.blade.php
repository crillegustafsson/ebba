@extends('layout.master')

@section('header')
@stop
@section('content')
<div ng-app="rundaApp">
    <div id="page-wrapper" ng-controller="rundaController" ng-init="Rid('{{ $id }}')">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{$route->name}}</h1>
                    @if(Auth::user()->storages_id == null)
                       <h3 ng-cloak> ((selectedVal.storageName))<h3>
                    @else
                        <h3 ng-repeat="storage in storages" ng-cloak>
                         <span ng-if="{{Auth::user()->storages_id}} == storage.id">((storage.storageName))</span> 
                        </h3>
                     @endif
               



                    <button type="button" class="btn btn-success" ng-click="addCustomer()" name="((product.id))" data-toggle="modal" data-target="#add">Lägg till kunder</button>
                </div>
                <!-- /.col-lg-12 -->
            </div><br>
            <!-- /.row -->
             <div class="row">
                    <div class="tab-container">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-truck fa-fw"></i> Rundor
                            </div>

                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-bordered table-hover table-striped dataTable" id="dataTable">
                                                <thead>
                                                    <tr>
                                                     <th>Företag</th>
                                                        <th>Stad</th>
                                                        <th>Adress</th>
                                                        <th>Telefon</th>
                                                        <th>Status</th>
                                                        <th width="70">Se kund</th>
                                                        <th width="70">Ta bort</th>
                                                    </tr>
                                                </thead>
                                                <tbody ng-cloak>
                                                        <tr ng-repeat="customer in customers | orderBy:'sort'">
                                                            <td>
                                                                (( customer.company ))
                                                            </td>
                                                            <td>
                                                                (( customer.city ))
                                                            </td>
                                                            <td>
                                                                <a href="(( customer.gadress ))" target="_blank">(( customer.adress ))</a>
                                                            </td>
                                                            <td>
                                                                (( customer.phone ))
                                                            </td>

                                                            <td class="center fabig blue">
                                                                <span ng-if="customer.comments.length >= 1 "><i class="fa fa-comment"></i></span>
                                                                <span ng-if="customer.orderCustomer==1"><i class="fa fa-file-text-o"></i></span>
                                                                <span ng-if="customer.callupCustomer==1"><i class="fa fa-phone"></i></span>

                                                            </td>
                                                            <td width="70" class="center">
                                                            <button type="button" class="btn btn-info" ng-click="changeView(customer)">
                                                             
                                                                <i class="fa fa-eye"></i>

                                                            </button>
                                                            </td>
                                                            <td width="70" class="center">
                                                            
                                                           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete" ng-click="delete(customer)"><i class="fa fa-remove"></i></button>
                                                            </td>

                                                        </tr>

                                                </tbody>
                                            </table><br>
                                            <button  class="btn btn-danger btn-lg runda-done" data-toggle="modal" data-target="#done">Avsluta runda</button>
                                        </div>
                                        <!-- /.dataTable_wrapper -->


                            </div>
                            <!-- /.panel-body -->
                        </div>
                        </div>
                        </div>
                    </div>
                    <!-- /.Tab1 -->

            </div>
            <!--</div>-->
            <!-- /.TAB- - - ng-app ng-init --> 

     <!--            MODALS           -->
   
<div class="modal fade" id="add" tabindex="-1" role="dialog"  aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close btn btn-danger" data-dismiss="modal">
                        <span aria-hidden="true" class="closeme">&times;</span>
                        <span class="sr-only">close</span>
                    </button>
                
                <h4 class="modal-title"><div class="ftitle">Lägg till:</div> Kund</h4>
                </div>
                <div class="modal-body">

    <!--                        Välj kund                              -->
                   
                    <input ng-model="searchText.company" class="form-control input-sm" placeholder="Sök företag"><br>

                     
                     <table class="table table-bordered table-hover table-striped dataTable7" id="dataTable">
                        <thead>
                            <tr>
                              <th>Företag</th> 
                              <th>Vald Kund</th> 
                            </tr>
                        </thead>
                         <tbody ng-cloak>
                            <tr ng-repeat="allCustomer in allCustomers | filter:searchText" ng-if="$index < 2">
                             <td  ng-click="checked(allCustomer); bla()">
                                (( allCustomer.company ))
                              </td>
                              <td>
                                    <span ng-if="allCustomer.company == customerToAdd.company"><i class="fa fa-check"></i></span>
                              </td>
                           </tr>
                         </tbody>

                     </table>   

     <hr>
     <button type="button" class="btn btn-outline btn-default btn-lg width48"  ng-class="{active:active == 'före'}" ng-click="before(); bla()" >Före</button>
     <button type="button" class="btn btn-outline btn-default btn-lg width48 right" ng-class="{active:active == 'efter'}" ng-click="after(); bla()" >Efter</button>
     <hr>

                
                   <input ng-model="cutomerInListS.company" class="form-control input-sm" placeholder="Sök företag"><br>
                     
                     <table class="table table-bordered table-hover table-striped dataTable7" id="dataTable">
                        <thead>
                            <tr>
                              <th>Företag</th> 
                              <th>Vald Kund</th> 
                            </tr>
                        </thead>
                         <tbody ng-cloak>
                            <tr ng-repeat="customer in customers | filter:cutomerInListS" ng-if="$index < 2">
                             <td ng-click="customerList($index, customer); bla()">
                                (( customer.company )) 
                              </td>
                              <td>
                                <span ng-if="customer.company == customerInList.company"><i class="fa fa-check"></i></span>
                              </td>
                           </tr>
                         </tbody>
                     </table>   

                     <hr>
                     Du har valt att lägga <b>((customerToAdd.company))</b>  ((active)) <b>((customerInList.company))</b><br><br>
                     <button class="btn btn-success width100 btn-lg" data-dismiss="modal" ng-disabled="isDisabled" ng-click="done()" >Utför</button>
            
      <!--                      SLUT modal                               -->
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
                
                <h4 class="modal-title" ng-cloak ><div class="ftitle">Ta bort: ((cus.company))</div></h4>
                </div>
                <div class="modal-body">
            
                    
                <form name="test" id="test" class="center">

                <h2 class="center" ng-cloak>Är du säker att du vill ta bort ((cus.company))?</h2><br>
                   <button type="button" class="btn btn-danger width48 modalinput"  data-dismiss="modal" ng-click="deleteCustomerRoute(cus)">Ja</button>

                    <button class="btn btn-warning width48 modalinput" data-dismiss="modal">Nej</button>
                </form>

            
                </div>

            </div>
        </div>
    </div>
    

    <!--            MODALS           -->
@if(Auth::user()->storages_id == null)
  
    <div class="modal fade" id="myModal"  data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-init="isDisabled = true">

        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                   
                
                <h4 class="modal-title">Välj vilken bil du ska köra</h4>
                </div>
                <div class="modal-body">
    <!--                         Choose storages                             -->
                    
                  <label for="Storage">Välj Bil</label> <select class="form-control input-sm" name="from" ng-model="selectedVal" ng-options="opt as opt.storageName for opt in StoragesOptions" ng-change="change()"></select> <br>
                
                    
                    <button class="btn btn-primary width100 btn-lg" ng-disabled="isDisabled" data-dismiss="modal" ng-click="storage()">Klar</button>
                </div>

            </div>
        </div>
    </div>
@endif


<!--                             -->

        <div class="modal fade" id="done" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn btn-danger" data-dismiss="modal">
                        <span aria-hidden="true" class="closeme">&times;</span>
                        <span class="sr-only">close</span>
                    </button>
                
                <h4 class="modal-title"><div class="ftitle">Avsluta:</div> Runda</h4>
                </div>
                <div class="modal-body">
            
                    
                <form name="test" id="test" class="center">

                <h2 class="center">Är du säker att du vill avsluta den pågående rundan?</h2><br>
                   <button type="button" class="btn btn-danger width48 modalinput"  data-dismiss="modal" ng-click="finished()">Ja</button>

                    <button class="btn btn-warning width48 modalinput" data-dismiss="modal">Nej</button>
                </form>

            
                </div>

            </div>
        </div>
    </div>

    </div>
    <!--/.Row -->





</div>
<!-- /.page-wrapper -->

<!--NgApp -->

<script src="../js/rundaController.js"></script>
<style type="text/css">
    .test{
        background-color: red!important;
        font-weight: bold;
    }

</style>
@stop
@section('footer')
@stop
