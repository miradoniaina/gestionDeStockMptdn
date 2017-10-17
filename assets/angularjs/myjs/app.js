angular.module('myApp', ["ngRoute", "myApp.controllers", "myApp.services"])

        .config(function ($routeProvider) {
            $routeProvider
                    .when("/", {
                        templateUrl: "list_question_view.html",
                        controller: "myQuestCtrl"
                    })
                    
                    .when("/detail/:id", {
                        templateUrl: "detailquestion.html",
                        controller:"myQuestDetailCtrl"
                    })
                    .when("/guide", {
                        templateUrl: "guide_pari.html"
                    })
                    .when("/categorie/:id", {
                        templateUrl: "list_question_view.html",
                        controller:"detailCategCtrl"
                    })
                    .when("/ajouter_paris", {
                        templateUrl: "formulairepari.html"
                    })
                    .when("/connection", {
                        templateUrl: "connection.html"
                    })
                    .otherwise({
                        redirectTo: '/'
                    })
                    ;    
            ;
            
            
            
        });