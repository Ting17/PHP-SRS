var app = angular.module("myApp", ["ngRoute"]);
app.config(["$routeProvider", function ($routeProvider) {
    'use strict';
    //for $routeprovider
    $routeProvider
        .when("/", {templateUrl: "templates/home.html"})
        .when("/home", {templateUrl: "templates/home.html"})
        .when("/product", {templateUrl: "templates/product.html"})
		.when("/sales", {templateUrl: "templates/sales.html"})
    ;
}]);

//control login 
app.controller("log", function ($scope, $http, $location, $window) {
    "use strict";  //for logout
    $scope.logout = function () {
        $window.location.reload();
    };
    
    //for login
    //property initialisation 
    $scope.Username = null;
    $scope.Password = null;
    //define methods
    $scope.login = function (Username, Password) {
        var url = "api/log.php"; //prepare the data
        var data = $.param({Username: Username, Password: Password});
        var config = {
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        };
        
        //call the services
        $http.post(url, data, config)
            .then(function (response) {
                $scope.loginmsg = response.data;
         
         //due to problem so fix on the client side 
         //$.trim function remove all newlines, space(including non-breaking spaces) and tabs from the beginning and end of the supplied. 
                if ($.trim($scope.loginmsg) === "You are member") {
                    $location.path('/member');
                } else if ($.trim($scope.loginmsg) === "admin") {
                    $location.path('/admin');
                } else {
                    alert($scope.loginmsg);
                    $location.path('/home');
                }
            }, function () {
                $scope.loginmsg = "Service not Exists";
            });
    };
});

//CRUD for product
app.controller("getP", function ($scope, $http) {
    "use strict";
    $http.get('api/getP.php')
        .then(
            function (response) {
                $scope.posts = response.data;
            //row to show
                $scope.rowperpage = 5;
            //initialize current page number
                $scope.currentPage = 0;
            //count page
                $scope.pageCount = function () {
                    return Math.ceil($scope.posts.length / $scope.rowperpage) - 1;
                };
            //for previous
                $scope.prevPage = function () {
                    if ($scope.currentPage > 0) {
                        $scope.currentPage = $scope.currentPage - 1;
                    }
                };
            //for previous    
                $scope.nextPage = function () {
                    if ($scope.currentPage < $scope.pageCount()) {
                        $scope.currentPage = $scope.currentPage + 1;
                    }
                };
            },
            function () {
        // error handling routine
                $scope.posts = "error in fetching data";
            }
        );
});

app.controller("postProduct", function ($scope, $http) {
    "use strict";
    
    // define methods
    $scope.postData = function (prod_name, prod_desc, purchase_price) {
        // Prepare the data
        var url = "api/insertProduct.php";
        var data = $.param({prod_name: prod_name, prod_desc: prod_desc, purchase_price: purchase_price});
        var config = {
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        };
        //Call the services
        $http.post(url, data, config)
            .then(function (response) {
                // depends on the data value, there may be instances of put failure
                if (response.data) {
                    $scope.msg = response.data;
                }
            },
                    function () {
                    $scope.msg = "Service not Exists";
                });
    };
});

app.controller("putProduct", function ($scope, $http) {
    "use strict";
          
    // define methods
    $scope.putData = function (prod_id,prod_name, prod_desc, purchase_price) {
        // Prepare the data
        var url = "api/updateProduct.php";
        var data = $.param({prod_id: prod_id, prod_name: prod_name, prod_desc: prod_desc, purchase_price: purchase_price});
        var config = {
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        };
        //Call the services
        $http.put(url, data, config)
            .then(
                function (response) {
                // depends on the data value, there may be instances of put failure
                    if (response.data) {
                        $scope.msg = response.data;
                    }
                },
                function () {
                    $scope.msg = "Service not Exists";
                }
            );
    };
});
            
app.controller("delProduct", function ($scope, $http) {
    "use strict";
    
    // define methods
    $scope.delData = function (post) {
        // Prepare the data
        var url = "api/deleteProduct.php";

        var data = $scope.posts.indexOf(post);
        $scope.posts.splice(data, 1);
       
        var config = {
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        };
        //Call the services
        $http.put(url, data, config)
            .then(function (response) {
                // depends on the data value, there may be instances of put failure
                if (response.data) {
                    $scope.msg = response.data;
                }
            },
                    function () {
                    $scope.msg = "Service not Exists";
                });
    };
});



// Pagination with Client-Side Data
//pagination filter is resposible for selecting the subset of items for current page
//slice use to give start param as the index
app.filter("pagination", function () {
    "use strict";
    return function (input, start) {
        //check if input exists o nt
        if (!input || !input.length) {
            return;
        }
        start = +start; //parse to int
        return input.slice(start);
    };
});



