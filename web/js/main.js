lightbox.options.albumLabel = 'Изображение %1 из %2';

angular.module('app', ['ngStorage'])
.controller('OrderController', function($scope, $localStorage, $rootScope, $timeout, $filter) {
  var order = this;
  order.$storage = $localStorage.$default({
    positions: []
  });

  order.addPosition = function(position) {
    if (typeof(order.$storage.positions) === 'undefined') {
      order.$storage.positions = [];
    }

    var check = $filter('filter')(order.$storage.positions, {id: position.id});
    if (check.length === 1) {
      $timeout(function() {
        check.pop()['amount'] += 1;
      });
      return;
    }

    var addPosition = {
      id: position.id
      , name: position.name
      , price: position.price
      , image: position.image
      , amount: 1
    };

    $timeout(function() {
      order.$storage.positions.push(addPosition);
    });
  }

  order.removePosition = function(index) {
    order.$storage.positions.splice(index, 1);
  }

  order.setAmountForPosition = function(index, amount) {
    order.$storage.positions[index].amount = amount;
  }

  order.getAmount = function() {
    var amount = 0;
    angular.forEach(order.$storage.positions, function(position) {
      amount += position.amount;
    })
    return amount;
  }

  order.getSum = function() {
    var sum = 0;
    angular.forEach(order.$storage.positions, function(position) {
      sum += position.price * position.amount;
    })
    return Math.ceil(sum);
  }

  order.create = function() {
    angular.element('#positions-json').val(JSON.stringify(order.$storage.positions));
    $localStorage.$reset();
  }

  var unbind = $rootScope.$on('order.addPosition', function(event, position) {
    order.addPosition(position);
  });
  $scope.$on('$destroy', unbind);
})

.directive('addOrderPosition', function() {
  return {
    restrict: 'A'
    , scope: {
      'position': '=addOrderPosition'
      , 'authenticated': '='
    }
    , link: function(scope, element, attr) {
      element.on('click', function(event) {
        event.preventDefault();
        scope.$root.$emit('order.addPosition', scope.position);

        if (!scope.authenticated) {
          setTimeout(function() {
            window.location.replace(attr.href);
          }, 500);
        }
      });
    }
  }
});
