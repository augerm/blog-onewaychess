var app = angular.module('showBio', ['ngAnimate']);

app.controller('MainCtrl', function($scope) {
    $scope.tasks = [
        {name: 'Item One'},
        {name: 'The second item'},
        {name: 'Three items is the best'}
    ];
    
    $scope.hoverIn = function(){
        this.hoverEdit = true;
    };

    $scope.hoverOut = function(){
        this.hoverEdit = false;
    };

});