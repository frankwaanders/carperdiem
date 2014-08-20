(function () {
    function fishRegistrationController($scope, $modal, registrationService, alertService, fishtypeService, pondService) {
        $scope.fishRegistrations = [];
        $scope.predicate = '-date';
        $scope.alertService = alertService;
        $scope.pageSize = 10;
        $scope.currentPage = 1;
        $scope.totalItems = 0;
        $scope.maxSize = 10;

        $scope.dt = new Date();

        self.getAllRegistrations = function () {
            var offset = ($scope.currentPage - 1) * $scope.pageSize;
            registrationService.getAllRegistrations($scope.pageSize, offset).then(function (response) {
                //console.log(response);
                $scope.fishRegistrations = response.data;
                $scope.totalItems = response.totalCount;
            });
        }

        $scope.setModel = function (registration) {
            $scope.fishRegistration = registration;
        }

        $scope.deleteCurrentRegistration = function () {
            registrationService.deleteRegistration($scope.fishRegistration.id).success(function () {
                self.getAllRegistrations();
                $scope.alertService.set('success', 'Vis ' + $scope.fishRegistration.fish_code + ' is verwijderd.');
            });
        }

        $scope.editRegistration = function (registration, crudAction) {
            var fishRegistrationPromise;
            if (crudAction === 'edit') {
                fishRegistrationPromise = registrationService.getRegistration(registration.id);
            } else {
                $scope.pageChanged(1);
                fishRegistrationPromise = null;
            }

            var modal = $modal.open({
                templateUrl: 'views/fish-registration-editor.html',
                controller: fishRegistrationModalInstanceController,
                resolve: {
                    dataPromise: function () {
                        return fishRegistrationPromise;
                    },
                    fishTypes: function () {
                        return self.getFishTypes().then(function (response) {
                            return response.data;
                        })
                    },
                    ponds: function () {
                        return self.getPonds().then(function (response) {
                            return response.data;
                        })
                    }
                },
                windowClass: 'large-modal'
            });

            modal.result.then(function(data) {
               self.insertRegistation(data.FishRegistration);
            });
        }

        $scope.pageChanged = function (page) {
            $scope.currentPage = page;
            self.getAllRegistrations();
        }

        self.saveRegistration = function (registration) {
            registrationService.saveRegistration(registration).success(function () {
                self.getAllRegistrations();
                $scope.alertService.set('success', 'Vangstregistratie is succesvol opgeslagen.');
            });
        }

        $scope.openCalendar = function ($event) {
            $event.preventDefault();
            $event.stopPropagation();

            $scope.opened = true;
        };

        // get all registrations by default
        self.getAllRegistrations();
    }

    fishRegistrationController.$inject = ['$scope', '$modal', 'registrationService', 'alertService', 'fishtypeService', 'pondService'];
    angular.module('carperdiemApp').controller('fishRegistrationController', fishRegistrationController);
})();