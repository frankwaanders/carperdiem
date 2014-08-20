(function () {
    'use strict';
    var serviceBase = 'fishTypes/';

    var fishtypeFactory = function ($http) {
        var service = {};

        service.getFishTypes = function () {
            return $http.get(serviceBase + 'all/').then(function (response) {
                return {
                    data: response.data
                }
            });
        }
        return service;
    }

    fishtypeFactory.$inject = ['$http'];
    angular.module('carperdiemApp').factory('fishtypeService', fishtypeFactory);
})();