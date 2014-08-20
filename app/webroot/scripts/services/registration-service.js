(function () {
    var serviceBase = 'fishRegistrations/';

    var serviceFactory = function ($http) {
        var service = {};

        service.getAllRegistrations = function (pageSize, currentPage) {
            return $http.get(serviceBase + 'all/' + pageSize + '/' + currentPage).then(function (response) {

                return {
                    data: response.data,
                    totalCount: parseInt(response.headers('X-InlineCount'))
                };
            });
        }

        service.deleteRegistration = function (id) {
            return $http.delete(serviceBase + 'delete/' + id);
        }

        service.getRegistration = function (id) {
            return $http.get(serviceBase + 'view/' + id);
        }

        service.insertRegistration = function (registration) {
            return $http.post(serviceBase + 'save/', registration);
        }

        return service;
    }

    serviceFactory.$inject = ['$http'];
    angular.module('carperdiemApp').factory('registrationService', serviceFactory);
})();