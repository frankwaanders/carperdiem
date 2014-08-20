(function () {
    'use strict';

    var INTEGER_REGEXP = /^\-?\d+$/;

    function integerDirective() {
        return {
            require: 'ngModel',
            link: function(scope, elm, attributes, controller) {
                controller.$parsers.unshift(function(viewValue) {
                    if (INTEGER_REGEXP.test(viewValue) || viewValue === '') {
                        // it is valid
                        controller.$setValidity('integer', true);
                        return viewValue;
                    } else {
                        // it is invalid, return undefined (no model update)
                        controller.$setValidity('integer', false);
                        return undefined;
                    }
                });
            }
        };
    }
    angular.module('carperdiemApp').directive('integer', integerDirective);
})();