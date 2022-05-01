<?php

include("../../config.php");
if(isset($_REQUEST["params"]))
    {

    $params=\UrlCrypt\UrlCrypt::DecryptAsArray($_REQUEST["params"],"&","=");
$temparams =  array_keys($_REQUEST);
foreach($temparams as $tp)
    if($tp!=="params")
        $params+=array($tp=>$_REQUEST[$tp]);
$_REQUEST = $params;
}
$dataset = new DSCubaMyWay();
$tripdestableadapter = new t_destripTableAdapter();
$triptableadapter = new t_tripTableAdapter();
$t = $triptableadapter->FillLast($dataset->t_trip());


$s = $tripdestableadapter->UpdateFromData($t["idtrip"],$_REQUEST["data"]);
$json = array('status' => 1);

if($s)
    $json['fn'] = "var response=1;showMsg('sh-ok', " . "'" .  $_SESSION["languages"]->GetString("DATA_SAVE_COMMIT") . "'" . ");";
 else
    $json['fn'] = "var response=0;showMsg('sh-error', " . "'" . $_SESSION["languages"]->GetString("DATA_ERROR") . "'" . ");";



echo json_encode($json);

