
//<pre class="lang:default decode:true " title="formjs.js" >


/**
 * @filesource : formjs.js
 * @author : Shabeeb  <mail@shabeebk.com>
 * @abstract : controller fo HTML page
 * @package sample file 
 * @copyright (c) 2014, Shabeeb
 * shabeebk.com/blog
 * 
 *  */



var app = angular.module('formExample', []);


app.controller("formCtrl", ['$scope', '$http', function($scope, $http) {
        $scope.url = 'submitComment.php';

        $scope.formsubmit = function(isValid) {


            if (isValid) {
              

                $http.post($scope.url, {"name": $scope.name, "comment": $scope.comment}).
                        success(function(data, status) {
                            console.log(data);
                            $scope.status = status;
                            $scope.data = data;
                            $scope.result = data; 
                        })
            }else{
                
                  alert('Comment is not valid');
            }

        }

    }]);
//</pre> 