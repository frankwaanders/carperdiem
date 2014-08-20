var carperdiem = carperdiem || {};
carperdiem.carperdiemApp = carperdiem.carperdiemApp || {};

(function () {
    // define application module
    carperdiem.carperdiemApp = angular.module('carperdiemApp', ['ngRoute', 'ui.bootstrap', 'ngAnimate'])
        .value('$', jQuery)
        .config(['$routeProvider', function ($routeProvider) {
            $routeProvider
                .when('/FishRegistration', { templateUrl: 'views/fish-registration.html', controller: 'fishRegistrationController' })
                .when('/FishRegistration/:crudaction/:id?', { templateUrl: 'views/registration-create-edit.html', controller: 'createOrEditFishRegistrationController' })
                .otherwise({ redirectTo: '/FishRegistration' });
        }]);
})();