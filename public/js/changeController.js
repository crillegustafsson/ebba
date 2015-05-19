
var myApp = angular.module('Order',[]);


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

    myApp.controller('changeController', function($scope, $http, $window) {
    
    
 $http.get('/getStorages').success(function(storages){
        $scope.storages = storages;
          
        $scope.storages. splice(0, 1);
        $scope.StoragesOptions = storages;    
      
    });
    // $http.get('/transactions/1').success(function(orders){

    //   $scope.orders = orders;
    // }


            

//      init orders
  


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
            $scope.products.quant = "";
            $scope.nameOfProduct = p.productName;
            p.idx = index;
            p.nd = 0;
            p.newQuant = 0; 
            p.customer = $scope.selectedValTill; 
            p.from = $scope.selectedValFrom;     
         // console.log(p);
            
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

                
if($scope.nd == true)
{
  $scope.nd = 1;
}
else
{
  $scope.nd = 0;
}

                $.extend(true, item, {
                      newQuant: $scope.products.quant,
                      nd: $scope.nd
                    });
             $scope.orders.push(item);

            // console.log(item);
                
                
                  
                  
                // console.log(orders + products)
              // $http.post('/createOrder', item);
            
         }

};

//      Ta bort order
$scope.remove = function(item) { 
  
 

          // var db = {
          
          //           storages_id: $scope.selectedValTill.value,
          //           products_id: item.products_id,
          //           quantity: item.saldo,
                    
          // }
        
      // $http.post('/deleteOrderProduct', item);
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
            // $http.post('/updateOrderProduct', item);
            // console.log(item);
    }
};

$scope.done = function(){

  if(angular.isUndefined($scope.orders) || $scope.orders == 0)
  {
    alert('din order innehåller inga produkter')
  }
  else
  {
     //  item = $scope.orders[0];
     item = $scope.orders;
     customer = $scope.selectedValTill;
     $http.post('/updateOrder', item);

     console.log($scope.orders);
     $scope.orders = [];
     var earl = '/sign/' + customer;
     window.location.href=earl;
  }
};




});

app.directive('jSignature', ['$timeout',
  function ($timeout) {
    return {
      restrict: 'EA',
      scope: {
        model: '=jSignature',
        penColor: '@',
        lineColor: '@',
        readonly: '='
      },
      link: function (scope, element, attrs, controller) {
        // Style undoButton
        var undoButton = function () {
          var undoButtonStyle = 'position:absolute;display:none;margin:0 !important;top:auto';
          var $undoButton = $('<button type="button" class="btn btn-xs btn-default" style="' + undoButtonStyle + 
            '">Undo Last Stroke</button>').appendTo(this.$controlbarLower);
          var buttonWidth = $undoButton.width();
          $undoButton.css('left', Math.round(( this.canvas.width - buttonWidth ) / 2));
          return $undoButton;
        };
        
        // Create Settings Object
        var settings = {
          UndoButton: undoButton
        };
        if (scope.lineColor) {
          settings['decor-color'] = scope.lineColor;
        }
        if(scope.penColor) {
          settings.color = scope.penColor;
        }
        
        // Build jSignature Element
        element.jSignature(settings);
        
        // Watch Model
        scope.$watch('model', function(newValue, oldValue) {
          if (typeof newValue !== 'undefined') {
            var value = newValue.split(',');
            if (value[1] && value[1].length > 0) {
              try {
                 element.jSignature("setData", "data:" + newValue);
              } catch (e) {
                 console.log('Nim: jSignature - Bad format while trying to setData', e);
              }
            } else {
              element.jSignature('reset');
            }
          }
        });
        
        // Watch readOnly
        scope.$watch('readonly', function (newValue, oldValue) {
          if(newValue === true) {
            element.jSignature('disable');
            // Hide undo button
            element.find('button').css({'display': 'none'});
          } else {
            element.jSignature('enable');
            var currentModel = scope.model.split(',');
            // Show undo button only if there are actions to undo?
            if (currentModel[1] && currentModel[1].length > 0) {
              element.find('button').css({'display': 'block'});
            }
          }
        });
 
        
        // Bind to jSignature Event
        element.bind('change', function(e){ 
          // $timeout, 100, true because event happens outside angular's digest cycle
          // and change is called on setData
          $timeout(function () {
            // getData returns an array of [mimetype, string of jSignature's custom Base30-compressed format]
            var dataPair = element.jSignature("getData","base30");
            scope.model = dataPair.join(",");
          }, 100, true);
        });
      }
    };
  }
]);
