<?php
include('../config.php');
if(!empty($_REQUEST["dspath"]))
    include(ROOT.$_REQUEST["dspath"].".php");
$json = array('status' => 1);
$adapter = $_REQUEST["table"] . "TableAdapter";
$table = $_REQUEST["table"] . "DataTable";
$n = new $adapter();
$datasetname = "DSDatos";
if(!empty($_REQUEST["dataset"]))
    $datasetname = $_REQUEST["dataset"];
$dataset = new $datasetname();

$r = $n->FillLast($dataset->$_REQUEST["table"]());
$json['fn']= "item = ".$r[$_REQUEST["item"]].";";
echo json_encode($json);