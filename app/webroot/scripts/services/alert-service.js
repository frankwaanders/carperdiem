(function () {
    var serviceFactory = function () {
        var message;

        return {
            set: function (type, msg) {
                message = {type: type, 'msg': msg};
            },
            clear: function () {
                message = null;
            },
            get: function () {
                return message;
            }
        };
    }
    angular.module('carperdiemApp').factory('alertService', serviceFactory);
})();