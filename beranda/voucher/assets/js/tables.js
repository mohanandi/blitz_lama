angular.module('sortApp', [])

.controller('mainController', function($scope) {
  $scope.sortType     = 'date'; // set the default sort type
  $scope.sortReverse  = false;  // set the default sort order
  $scope.searchname   = '';     // set the default search/filter term
  
  // create the list of sushi rolls 
  $scope.report = [
    { date: '12/10/2012', name: 'bowowow', proses: 'KKK' },
    { date: '12/10/2013', name: 'Boow', proses:  'kuku'},
    { date: '10/10/2012', name: 'Bowie', proses: 'kiki' },
    { date: '9/10/2015', name: 'Bewo', proses: 'koko' },
      { date: '9/10/2015', name: 'Bewo', proses: 'koko' },
      { date: '9/10/2015', name: 'Bewo', proses: 'koko' }
    
    
  ];
  
});