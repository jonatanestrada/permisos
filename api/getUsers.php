<?php 
  include_once $_SERVER['DOCUMENT_ROOT']."/sistemas/class/Permisos.class.php";
  include_once $_SERVER['DOCUMENT_ROOT']."/sistema/api/v1/base.api.php";

  Response::$data->result = Permisos::getAccesos();
  Response::showDataResult();
?>
