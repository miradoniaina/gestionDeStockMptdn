function base_url() {
//    return "http://192.168.1.3/stockfluxmptdn/index.php";
    return "http://41.242.97.36/stockfluxmptdn/index.php";
}
;

angular.module('myApp.controllers', ["ngRoute"])

        .controller('fournisseursCtrl', function ($scope, $http) {

            $http.get(base_url() + "/ajaxController/getFournisseurs")
                    .then(function (response) {
                        $scope.fournisseurs = response.data;

                        $scope.ajouterFournisseur = function ($societe , $idFournisseur) {
                            $("#fournisseur").val($societe);
                            $("#id_fournisseur").val($idFournisseur);
                            $('#myModal').modal('toggle');
                        }
                    });
        })

//        .controller('myQuestCtrl', function ($scope, $http, Live) {
//                
//                $scope.listquestion = [];
//                Live.all().then(function(pari_live){
//                    $scope.listquestion = pari_live;
//                });
//        
//        })
//        
//        .controller('detailCategCtrl', function ($scope, Live, $routeParams) {
//                $scope.listquestion = [];
//                Live.all().then(function(pari_live){
//                    $scope.listquestion=Live.get_categ($routeParams.id)
//                });
//        
//        })
//        
//        .controller('myQuestDetailCtrl', function ($scope, $routeParams, Live) {
//              Live.all().then(function(pari_live){
//                    $scope.question = Live.get($routeParams.id);
//                });
//                
//        });

        ;


