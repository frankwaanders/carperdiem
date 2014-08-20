var fishRegistrationModalInstanceController = function ($scope, $modalInstance, dataPromise, fishTypes, ponds) {

    if (dataPromise !== null) {
        $scope.fishRegistration = dataPromise.data;
    } else {
        $scope.fishRegistration = { "FishRegistration": { id: null } };
    }
    $scope.fishTypes = fishTypes;
    $scope.ponds = ponds;

    $scope.ok = function () {
        $modalInstance.close($scope.fishRegistration);
    };

    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };

    $scope.openCalendar = function($event) {
        $event.preventDefault();
        $event.stopPropagation();
        $scope.opened = true;
    };
};