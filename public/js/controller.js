        var myApp = angular.module('MyApp',[]);

        myApp.config(function($interpolateProvider) {
            $interpolateProvider.startSymbol('(('); 
            $interpolateProvider.endSymbol('))');
             });

// myApp.directive('color', function() {
//         return {
//         scope: true,
//         link: function (scope, $element) {
            
//               // if jQuery is present use this, else adjust as appropriate
//               $element.css("background-color", 'black');
            
//         }
//     }
// });
myApp.directive('onlyNum', function() {
        return function(scope, element, attrs) {

            var keyCode = [8,9, 13,37,39,48,49,50,51,52,53,54,55,56,57,96,97,98,99,100,101,102,103,104,105,110];
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

myApp.controller('itemController', function($scope, $http, $window) {


//      Hämta product
  $http.get('/getAllProducts').success(function(products){
        $scope.products = products;
    
    });
  
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

            var id =  {
                products_id: p.id,
                name: p.productName,
                type: p.type,
                artnr: p.artnr,
               
            };

            $scope.nameOfProduct = p.productName;

         }
         else
         {
             $scope.orders.quant = p.saldo
             $scope.nameOfOrderProduct = p.name;
             

            var id =  {
                storages_id: p.storages_id,
                products_id: p.products_id,
                artnr: p.artnr,   
                saldo: p.saldo,
                name: p.name,
                idx: index
            };

         }

//      skicka info till modal
        $scope.productId = id; 

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
                    name: id.name,
                    type: id.type,
                    saldo: $scope.products.quant,
                    artnr: id.artnr,
                };

                var db =  {
                    storages_id: $scope.storages_id,
                    products_id: id.products_id,
                    users_id: $scope.uid,
                    newQuant: $scope.products.quant,
                    
                };
                
                $scope.orders.push(productToOrder);   
               $http.post('/updateCreate', db);
               console.log(db);
            
         }

};

//      Ta bort order
$scope.remove = function(item) { 
  
 

          var db = {
          
                    storages_id: item.storages_id,
                    products_id: item.products_id,
                    newQuant: item.saldo,
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
                storages_id: item.storages_id,
                products_id: item.products_id,
                newQuant: $scope.orders.quant,
                oldQuant: item.saldo
            }
            newProduct = angular.copy(newOrder, $scope.orders[item.idx] );
            $http.post('/updateProduct', db);
    }
};

$scope.done = function(){

    $scope.orders = [];
};

});