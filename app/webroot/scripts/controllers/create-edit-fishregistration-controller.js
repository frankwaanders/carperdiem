(function () {

    function createOrEditFishRegistrationController($scope, $location, $routeParams, registrationService, fishtypeService, pondService) {

        console.log($routeParams);
        console.log($location.url());

        self.setFishRegistration = function (id) {
            registrationService.getRegistration(id).then(function (response) {
                $scope.FishRegistration = response.data.FishRegistration;
            });
        }

        self.getFishTypes = function () {
            fishtypeService.getFishTypes().then(function (response) {
                $scope.fishTypes = response.data;
            });
        }

        self.getPonds = function () {
            pondService.getPonds().then(function (response) {
                $scope.ponds = response.data;
            });
        }

        $scope.saveRegistration = function () {
            registrationService.insertRegistration($scope.FishRegistration).success(function () {
                self.goToRegistrationPage();

            });
        }

        $scope.cancel = function () {
            self.goToRegistrationPage();
        }

        self.goToRegistrationPage = function () {
            $location.path('/FishRegistration');
        }

        $scope.openCalendar = function ($event) {
            $event.preventDefault();
            $event.stopPropagation();

            $scope.opened = true;
        }

        self.getFishTypes();
        self.getPonds();

        if ($routeParams.crudaction === 'edit') {
            self.setFishRegistration($routeParams.id)
        } else {
            $scope.FishRegistration = {};
        }
    }

    createOrEditFishRegistrationController.$inject = ['$scope', '$location', '$routeParams', 'registrationService', 'fishtypeService', 'pondService'];
    angular.module('carperdiemApp').controller('createOrEditFishRegistrationController', createOrEditFishRegistrationController);

})();