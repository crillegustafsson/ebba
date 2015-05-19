
var myApp = angular.module('packaBil',[]);

    myApp.config(function($interpolateProvider) {
        $interpolateProvider.startSymbol('(('); 
        $interpolateProvider.endSymbol('))');
         });

myApp.directive('onlyNum', function() {
        return function(scope, element, attrs) {

            var keyCode = [8,9,13,37,39,48,49,50,51,52,53,54,55,56,57,96,97,98,99,100,101,102,103,104,105,110];
            element.bind("keydown", function(event) {
               // console.log($.inArray(event.which,keyCode));
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

$http.get('/getStorages').success(function(storages){
        $scope.StoragesOptions = storages;
          
  
    });
      //form val
       // $scope.StoragesOptions = [
       //    { label: 'Välj Lager', value: 0 },
       //    { label: 'Huvudlager', value: 1 },
       //    { label: 'Bil 1', value: 2 },
       //    { label: 'Bil 2', value: 3 },
       //    { label: 'Bil 3', value: 4 },
       //  ];  

      if ($scope.orders.length == 0) {
         //Visa om det inte finns pågående order
         $scope.showForm = '0';

        //$scope.optionsFrom = options;
        $scope.selectedValFrom = '';
      

        //$scope.optionsTill = options;
        $scope.selectedValTill = '';
        //selectedValTill.label
        $scope.isDisabled = true;

        //console.log($scope.selectedValFrom);
 

      }else{
        console.log($scope.orders[0].from);
        //finns en pågående order
        from = orders[0].from;
        to = orders[0].storages_id;

        $scope.showForm = '1';
        $scope.selectedValFrom = $scope.orders[0].from; 
        $scope.selectedValTill = $scope.orders[0].storages_id;
       
        

          $http.get('/GetProduct/' + from).success(function(products){
          $scope.products = products;
          
           // console.log($scope.StoragesOptions[from] + '<-');
          //console.log(from + '<-');
            });


      };

  });

 
   
  // if ($scope.selectedVal.value == 2) {
  //   $scope.isDisabled = true;
  // };


$scope.change = function (){

 
      if ($scope.selectedValTill == '' || $scope.selectedValFrom == '' || $scope.selectedValFrom.id == $scope.selectedValTill.id) {
      $scope.isDisabled = true;
      }else{
      $scope.isDisabled = false;
      };
   
  
}

$scope.ToFrom = function (){


   From = $scope.selectedValFrom.id;

  $http.get('/GetProduct/' + From).success(function(products){
        $scope.products = products;
    
//console.log($scope.products);
});
  
  
  }
//      init orders
  $scope.orders = [];


  // $scope.uid = function(uid)
  // {
  //   $scope.uid = uid;
  //   $scope.storages_id = 1;

  // }



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

    
        if(p.newQuant >= 0)
        {
          //order
             $scope.orders.quant = p.newQuant;
             $scope.nameOfOrderProduct = p.name;
            
             
         }
         else
         {
          //produkt
         if(angular.isObject($scope.selectedValTill)){
          $scope.selectedValFrom = $scope.selectedValFrom.id;
          $scope.selectedValTill = $scope.selectedValTill.id;
         }

            $scope.products.quant = "";
            $scope.nameOfProduct = p.productName;
            p.idx = index;
            p.newQuant = 0; 
            p.storages_id = $scope.selectedValTill; 
            p.from = $scope.selectedValFrom;     
   
            
          }


//      skicka info till modal
       
        $scope.productId = p; 

 };
//                                                   addProduct
$scope.addProduct = function(item) {
    
//      Om 0 alert, om inte  putta in till order objektet och skicka till db
         if($scope.products.quant == 0 || $scope.products.quant == null || $scope.products.quant == '0' )
         {
            alert('får ej lägga till värdet 0');
         }
         else
         {
           
            // var productToOrder =  {
            //         products_id: id.products_id,
            //         storages_id: $scope.storages_id,
            //         productName: id.name,
            //         type: id.type,
            //         quantity: $scope.products.quant,
            //         artnr: id.artnr,
            //     };

            //     var db =  {
            //         storages_id: $scope.selectedValTill.value,
            //         products_id: id.products_id,
            //         users_id: $scope.uid,
            //         quantity: $scope.products.quant,
            //         from: $scope.selectedValFrom.value
                    
            //     };
            // console.log(id);

                

                $.extend(true, item, {
                      newQuant: $scope.products.quant
                    });
             $scope.orders.push(item);

              console.log(item);
                
                
                  
                  
                // console.log(orders + products)
               $http.post('/updateCreate', item);
            
         }

};

//      Ta bort order
$scope.remove = function(item) { 
  
 

          // var db = {
          
          //           storages_id: $scope.selectedValTill.value,
          //           products_id: item.products_id,
          //           quantity: item.saldo,
                    
          // }
        
       $http.post('/deleteProduct', item);
       console.log(item)
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

            //  var newOrder = {
            //     storages_id: item.storages_id,
            //     products_id: item.products_id,
            //     name: item.name,
            //     artnr: item.artnr,
            //     saldo: $scope.orders.quant
            // };

            // var db = {
            //     storages_id: $scope.selectedValTill.value,
            //     products_id: item.products_id,
            //     newQuant: $scope.orders.quant,
            //     oldQuant: item.saldo,
            //     from: $scope.selectedValFrom.value
            // }
            item.oldQuant = item.newQuant;
            

             $.extend(true, item, {
                      newQuant: $scope.orders.quant
                    });
            // $scope.orders.push(item);

              // var newOrder = item;
            //newProduct = angular.copy(item, $scope.orders[item.idx] );
            $http.post('/updateProduct', item);
            console.log(item);
    }
};

$scope.done = function(){

    item = $scope.orders[0];
    $http.post('/deleteTransaction', item);

   $scope.orders = [];
};


});