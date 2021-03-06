permisos.controller("permisosController",  ['$scope','$rootScope','$http','$interval', '$mdDialog','$timeout','$filter', 'APIPermisos', function($scope,$rootScope, $http, $interval,$mdDialog,$timeout,$filter, APIPermisos){
  // console.log("hey!");
  // $scope.asd  = "asdasdasd";
  $scope.intervalDisplacement;
  $scope.posicionActual = 0;
  $scope.desplazar = function(dir){
    var $users = $("#usuarios-cont-movible");
    var $asignaciones = $("#permisos_asignados");
    var totalDesplazable = 150;
    if(dir == 0){//izq
        $scope.intervalDisplacement = $interval(function(){
          if($scope.posicionActual > 20){
            $users.animate({left: "+=20",}, 100, function(){ $scope.posicionActual -= 20; });
            $asignaciones.animate({left: "+=20",}, 100, function(){ });
            console.log("Desplazando usuarios a la izquierda");
          }else{
            $interval.cancel(  $scope.intervalDisplacement );
          }
        }, 100);
    }else{//der
      $scope.intervalDisplacement = $interval(function(){
        if($scope.posicionActual < totalDesplazable){
          console.log("Desplazando a la derecha");
          $users.animate({left: "-=20",}, 100, function(){ $scope.posicionActual += 20; });
          $asignaciones.animate({left: "-=20",}, 100, function(){});
        }else{
          $interval.cancel(  $scope.intervalDisplacement );
        }
      }, 100);
    }
  }


  $scope.detenerDesplazamiento = function(){
    $interval.cancel(  $scope.intervalDisplacement);
  }

  $(document).on('mouseover', "#permisos_asignados td", function(ev){
    $(this).parent().css({'background-color': 'rgba(0,0,0,0.1)'});
    $("#totalp1").css({'background-color': 'rgba(0,0,0,0.1)'});
  });

  $(document).on('mouseleave', "#permisos_asignados td", function(ev){
    $(this).parent().css({'background-color': 'rgba(0,0,0,0)'});
    $("#totalp1").css({'background-color': 'rgba(0,0,0,0.1)'});

  });


  (function initSelecter(){
    console.log($("#permisos_asignados td"));
    $("#permisos_asignados td").each(function(el){
      // $(this).addEventLis
      // console.log($(this));
    });
  }());


  $scope.users = [];
  APIPermisos.getUsers().then(function(d){
    console.log("Users?: ", d);
    $scope.users = d;
  });

  $scope.permisos = [];
  APIPermisos.getPermisos().then(function(d){
    console.log("Permisos: ", d);
    $scope.permisos = d;
  })

  APIPermisos.getAccesos().then(function(d){
    console.log("accesos?: ", d);
  });


}]);
