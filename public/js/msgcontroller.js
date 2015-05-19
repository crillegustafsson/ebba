var myApp = angular.module('msgApp', []);
myApp.controller('msgController', function($scope, $http, $window) {


$scope.Cid = function(Cid){

    $scope.cid = Cid; 
    console.log(Cid);
        $http.get('/getComments/' + Cid).success(function(comments){
        $scope.comments = comments;
        
        
        });
   
}



        $scope.addComment = function() {
        
                 if($scope.newCommentText == 0 || $scope.newCommentText == null || $scope.newCommentText == '0' )
             {
                alert('Vänligen skriv en notering');
             }
             else
             {

                var comment = {
                    comment: $scope.newCommentText,
                    customer_id: $scope.cid
                };
            
            console.log(comment);
           $http.post('/postComments', comment);
            $scope.comments.push(comment);

            $scope.newCommentText = "";
            }
            
        };

        $scope.remove = function(index, comment) { 
  
 

          // var db = {
          
          //           storages_id: $scope.selectedValTill.value,
          //           products_id: item.products_id,
          //           quantity: item.saldo,
                    
          // }
        // if(angular.isUndefined(comment.customer_id))
        // {
        //   console.log('tilldela');
        // } 
        // {
        //   console.log(comment.customer_id);
        // }
       $http.post('/deleteComment', comment);
       console.log(comment)
         // var index = $scope.comments.indexOf(item)
          $scope.comments .splice(index, 1);  
};

      $scope.changeView = function(customer){
      var earl = '/order/' + $scope.cid;
      window.location.href=earl;



}

});




//         // $scope.delete = function ( $scope, $http ) {
//         //   // var deleteComments = $scope.comment[id];
//         //   $http.post({'/getComments' id: deleteComments.id }, function (success) {
//         //     $scope.comments.splice(id, 1);
//         //     console.log();
//         //   });
//         // };

//         console.log($scope.comment);
//         // $scope.remove = function($scope, $http) {
//         //   var db = {
          
//         //             comments_id: $scope.comment_id

//         //   }
        
//         // $http.post('/deleteComments', db);

//         //   var index = $scope.orders.indexOf(id)
//         //   $scope.orders .splice(index, 1);  
//         // };

// }