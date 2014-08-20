(function () {
    'use strict';
    var serviceBase = 'ponds/';

    var pondFactory = function ($http) {
        var service = {};

        service.getPonds = function () {
            return $http.get(serviceBase + 'all/').then(function (response) {
                return {
                    data: response.data
                }
            });
        }
        return service;
    }

    pondFactory.$inject = ['$http'];
    angular.module('carperdiemApp').factory('pondService', pondFactory);
})();