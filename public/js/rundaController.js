var myApp = angular.module('rundaApp',[]);

        myApp.config(function($interpolateProvider) {
            $interpolateProvider.startSymbol('(('); 
            $interpolateProvider.endSymbol('))');
             });
        
myApp.controller('rundaController', function($scope, $http, $location) {

console.log($scope.selectedVal);
$scope.Rid = function(Rid) {

  $scope.rid = Rid;
  $http.get('/getCustomersInRoutes/' + Rid).success(function(customers){
        $scope.customers = customers;
     // console.log(customers.length);
    });
  $http.get('/getStorages').success(function(storages){
        $scope.storages = storages;
          
        $scope.storages. splice(0, 1);
        $scope.StoragesOptions = storages;    
      
    });
 //  	a = 'a';
	// $http.get('/getComments/' + a).success(function(comments){
	// 	        $scope.comments = comments;
	// 	        //console.log(comments);
 // 	});
 	
	// com = $scope.comments;
	// cus = $scope.customers;
	// var test =[cus, com];
	//console.log($scope.customers);

}


  
    $scope.allCustomers = [];
  $scope.addCustomer = function( ){

    $scope.isDisabled = true;

  if($scope.allCustomers.length == 0)
  {

    Rid = $scope.rid
    $http.get('/getAllCustomers/' + Rid).success(function(allCustomers){
            $scope.allCustomers = allCustomers;
        });

  }
  else
  {
   
  }
    

  }

$scope.changeView = function(customer){
    var earl = '/kundinformation/' + customer.customer_id;
   window.location.href=earl;



}

$scope.checked = function(customer){
 $scope.one = {
  value1:true,
 }
  $scope.customerToAdd = customer;
  $scope.customerToAdd.customer_id = customer.id;
  

    

  
}
$scope.bla = function(){


     
     if(angular.isUndefined($scope.customerInList) || $scope.customerInList == '' || angular.isUndefined($scope.active) || $scope.active == '' || angular.isUndefined($scope.customerToAdd) || $scope.customerToAdd == '')  
    {
      $scope.isDisabled = true;
    }
    else
    {
     $scope.isDisabled = false;
    }
      // if($scope.customerToAdd == ''){
      //   $scope.isDisable = false;
      // }
      // else
      // {
      //   $scope.isDisable = true; 
      // }



}
$scope.before = function(){

  $scope.active = 'före';


// idx = -1;
// for (i = 0; i < $scope.test.length; i++) {

//         idx++;
//       // $scope.customers[idx].sort = test[idx].sort++
//    console.log($scope.test[idx].company + " " + $scope.test[idx].sort);

//         // if($scope.orders[idx].products_id == p.id) 
//         // {
            
//         //     $scope.showForm = "1";

//         // };
        
//     };
  
  
}

$scope.after = function(){

 

  $scope.active = 'efter';


}


$scope.customerList = function(idx, cu){


    $scope.idxC = idx;
  $scope.customerInList = cu;
  $scope.sortId = cu.sort;

}

  $scope.finished = function(){
    Rid = $scope.rid
    $http.post('/finished', Rid);

     var earl = '/';
     window.location.href=earl;


  }
  $scope.delete = function(customer){
    // console.log(customer.company);
  
    $scope.cus = customer;

  }

  $scope.deleteCustomerRoute = function(customer){

  //console.log($scope.customerInList);
 // console.log(customer);
  var index = $scope.customers.indexOf(customer);
          $scope.customers. splice(index, 1);  

     $http.post('/deleteCustomerRoute', customer);   
  
 }

 $scope.done = function(){

 //$scope.test = $scope.customers.slice($scope.sortId);


    // if($scope.active == 'före')
    //   {
    //       idx = -1;
          
    //     }
    //   else
    //   {
    //     idx = 0;
        
    //   }

    idx = -1;
    for (i = 0; i < $scope.customers.length; i++) {

     idx++;
          if($scope.customers[idx].sort > $scope.customerInList.sort){
            
            

            $scope.customers[idx].sort++
            
          }
   // $scope.test[idx].sort++

        // if($scope.orders[idx].products_id == p.id) 
        // {
            
        //     $scope.showForm = "1";

        // };
      };

     // console.log($scope.customerToAdd);
      if($scope.active == 'före')
      {
        newId = $scope.sortId; 
        $scope.customers[$scope.idxC].sort++ 
      }
      else
      {
       newId = $scope.sortId+1;
      }
      $scope.customerToAdd.sort = newId;
      $scope.customerToAdd.routes_id = $scope.rid;

       //$http.post('/insertRoutesCustomer', $scope.customerToAdd);   
        $http.post('/updateRoutesCustomer', {customers: $scope.customers, toAdd: $scope.customerToAdd});   


      $scope.customers.push($scope.customerToAdd);
      //ta bort vald kund från allCustomers objektet
      var index = $scope.allCustomers.indexOf($scope.customerToAdd);
          $scope.allCustomers .splice(index, 1);  

      //reset
      $scope.active = '';
      $scope.customerToAdd = '';
      $scope.customerInList = '';
      $scope.sortId = '';
      $scope.searchText = '';
      $scope.cutomerInListS = '';
       

 }

  $scope.change = function (){

      console.log($scope.selectedVal);
      if (angular.isUndefined($scope.selectedVal)) {
        $scope.isDisabled = true;
     }else{
        $scope.isDisabled = false;
     };
     

  }

  $scope.storage = function(){
    console.log($scope.selectedVal)
     $http.post('/insertRouteStorage', $scope.selectedVal); 
  }



  });

// myApp.directive('myCustomer', function() {
//   return {
//      require: 'ngModel', function(){
   
//   }
//   };
// });
