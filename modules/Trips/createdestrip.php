<?php
include("../../config.php");
include(PHPDOTNETROOT."includes/helper.php");
if(isset($_REQUEST["params"]))
{

    $params=\UrlCrypt\UrlCrypt::DecryptAsArray($_REQUEST["params"],"&","=");
    $temparams =  array_keys($_REQUEST);
    foreach($temparams as $tp)
        if($tp!=="params")
            $params+=array($tp=>$_REQUEST[$tp]);
    $_REQUEST = $params;
}
$datasetname = $_REQUEST["dataset"];
$dataset = new $datasetname();
$adapter2 = new t_descrealtripTableAdapter();
$adapter = new t_realtripTableAdapter();
$json = array('status' => 1);
$t = $adapter->FillLast($dataset->t_realtrip());
//
$r = true;
$data = explode(",",$_REQUEST["data"]) ;
for($i=0;$i<count($data);$i++)
{
$t2 = explode("-",$data[$i]);
//  echo json_encode($t2);
$r= $adapter2->Insert($t["idrealtrip"],$t2[1],$t2[0]);
    if(!$r)
      $r=false;
}

if($r)
    $json['fn'] = "var response=1;showMsg('sh-ok', " . "'" .  $_SESSION["languages"]->GetString("DATA_SAVE_COMMIT") . "'" . ");";
else
    $json['fn'] = "var response=0;showMsg('sh-error', " . "'" . $_SESSION["languages"]->GetString("DATA_ERROR") . "'" . ");";

    echo json_encode($json);

