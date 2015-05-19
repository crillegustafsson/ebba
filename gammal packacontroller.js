
var myApp = angular.module('packaBil',[]);

    myApp.config(function($interpolateProvider) {
        $interpolateProvider.startSymbol('(('); 
        $interpolateProvider.endSymbol('))');
         });

myApp.directive('onlyNum', function() {
        return function(scope, element, attrs) {

            var keyCode = [8,9,37,39,48,49,50,51,52,53,54,55,56,57,96,97,98,99,100,101,102,103,104,105,110];
            element.bind("keydown", function(event) {
                console.log($.inArray(event.which,keyCode));
                if($.inArray(event.which,keyCode) == -1) {
                    scope.$apply(function(){
                        scope.$eval(attrs.onlyNum);
                        event.preventDefault();
                    });
                    event.preventDefault();
                }

            });
        };
    });



myApp.filter("toArray", function(){
    return function(obj) {
        var result = [];
        angular.forEach(obj, function(val, key) {
            result.push(val);
        });
        return result;
        
    };
});

    myApp.controller('packaController', function($scope, $http, $window) {

$http.get('/transactions/1').success(function(orders){
      $scope.orders = orders;

      if ($scope.orders.length == 0) {
      $scope.showForm = '0';

     $scope.optionsFrom = [
    { label: 'Välj Lager', value: 0 },
    { label: 'Huvudlager', value: 1 },
    { label: 'Bil 1', value: 2 },
    { label: 'Bil 2', value: 3 }
  ];
  $scope.selectedValFrom = $scope.optionsFrom[0];
  

   $scope.optionsTill = [
    { label: 'Välj Lager', value: 0 },
    { label: 'Huvudlager', value: 1 },
    { label: 'Bil 1', value: 2 },
    { label: 'Bil 2', value: 3 }
  ];
  $scope.selectedValTill = $scope.optionsTill[0];

 
 $scope.isDisabled = true;

      }else{

        $scope.showForm = '1';
        $scope.selectedValFrom = orders[0].from; 
        $scope.selectedValTill = orders[0].to; 

          From = orders[0].from;

          $http.get('/GetProduct/' + From).success(function(products){
          $scope.products = products;
          console.log(products);
            });


      };

  });

 
   
  // if ($scope.selectedVal.value == 2) {
  //   $scope.isDisabled = true;
  // };


$scope.change = function (){

  
    if ($scope.selectedValFrom.value == 0 || $scope.selectedValTill.value == 0 || $scope.selectedValFrom.value == $scope.selectedValTill.value) {
   $scope.isDisabled = true;
   }else{
$scope.isDisabled = false;
   };
   

}

$scope.ToFrom = function (){

   From = $scope.selectedValFrom.value;

  $http.get('/GetProduct/' + From).success(function(products){
        $scope.products = products;
    
console.log($scope.products);    });
  
  
  }
//      init orders
  $scope.orders = [];


  $scope.uid = function(uid)
  {
    $scope.uid = uid;
    $scope.storages_id = 1;

  }



//      Skicka info till modal

 $scope.go = function(index, p){
       

//      Kollar om produkten finns i transaktionen / Order
    idx = -1;
    $scope.showForm = '0';

    for (i = 0; i < $scope.orders.length; i++) {

        idx++;

        if($scope.orders[idx].products_id == p.id) 
        {
            
            $scope.showForm = "1";

        };
        
    };
  
//      Om saldo = 0 - info om produkt om inte info om Order

    
        if(p.saldo == null)
        {

            $scope.products.quant = "";
            $scope.nameOfProduct = p.productName;         
            console.log('produkt');
         }
         else
         {
             $scope.orders.quant = p.saldo
             $scope.nameOfOrderProduct = p.name;
             console.log('order');
              p.idx = index;
         

//      skicka info till modal
        console.log(p);
        $scope.productId = p; 

 };
//                                                   addProduct
$scope.addProduct = function(id) {
    
//      Om 0 alert, om inte  putta in till order objektet och skicka till db
         if($scope.products.quant == 0 || $scope.products.quant == null || $scope.products.quant == '0' )
         {
            alert('får ej lägga till värdet 0');
         }
         else
         {
           
            var productToOrder =  {
                    products_id: id.products_id,
                    storages_id: $scope.storages_id,
                    productName: id.name,
                    type: id.type,
                    quantity: $scope.products.quant,
                    artnr: id.artnr,
                };

                var db =  {
                    storages_id: $scope.selectedValTill.value,
                    products_id: id.products_id,
                    users_id: $scope.uid,
                    quantity: $scope.products.quant,
                    from: $scope.selectedValFrom.value
                    
                };

                $.extend(true, p, {
                      quantity: $scope.products.quant
                    });
                
                 $scope.orders.push(id);   
               // $http.post('/updateCreate', db);
            
         }

};

//      Ta bort order
$scope.remove = function(item) { 
  
 

          var db = {
          
                    storages_id: $scope.selectedValTill.value,
                    products_id: item.products_id,
                    quantity: item.saldo,
                    from: $scope.selectedValFrom.value
          }
        
        $http.post('/deleteProduct', db);

          var index = $scope.orders.indexOf(item)
          $scope.orders .splice(index, 1);  
};
//      Updatera order
$scope.update = function(item){

    if($scope.orders.quant == 0 || $scope.orders.quant == null || $scope.orders.quant == '0' )
         {
            alert('får ej lägga till värdet 0');
         }
         else
         {

             var newOrder = {
                storages_id: item.storages_id,
                products_id: item.products_id,
                name: item.name,
                artnr: item.artnr,
                saldo: $scope.orders.quant
            };

            var db = {
                storages_id: $scope.selectedValTill.value,
                products_id: item.products_id,
                newQuant: $scope.orders.quant,
                oldQuant: item.saldo,
                from: $scope.selectedValFrom.value
            }
            newProduct = angular.copy(newOrder, $scope.orders[item.idx] );
            $http.post('/updateProduct', db);
    }
};

$scope.done = function(){

    $scope.orders = [];
};


});