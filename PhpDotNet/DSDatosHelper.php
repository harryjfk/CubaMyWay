<?php
include("avoidtables.php");
include('config.php');
include ('modules\decript.php');
//if(!array_key_exists($_REQUEST["table"],$avoidtables)&&(!isset($_SESSION["authuser"]) )  )
//    die ("Restricted Area");

  if(array_key_exists("itemmethod",$_REQUEST))
      $_REQUEST["item"] = eval( $_REQUEST["itemmethod"]);



if(!empty($_REQUEST["dspath"]))
    include(ROOT.$_REQUEST["dspath"].".php");

$filenames = array();
$json = array('status' => 1);
$adapter = $_REQUEST["table"] . "TableAdapter";
$table = $_REQUEST["table"] . "DataTable";
$n = new $adapter();
$uploadok = true;
$res = true;
$datasetname = "DSDatos";
if(!empty($_REQUEST["dataset"]))
$datasetname = $_REQUEST["dataset"];
$dataset = new $datasetname();
$outscrfiles= "";
if ($_REQUEST["task"] == "edit") {
    $n->FillByID($dataset->$_REQUEST["table"](), $_REQUEST["item"]);
    $item = $dataset->$_REQUEST["table"]()->Row(0);

} else
    if ($_REQUEST["task"] == "add") {
        $item = $dataset->$_REQUEST["table"]()->Rows()->AddDefault();
    } else {
        $n->FillByID($dataset->$_REQUEST["table"](), $_REQUEST["item"]);

        $item = $dataset->$_REQUEST["table"]()->Row(0);

        $dataset->$_REQUEST["table"]()->Rows()->Remove($item);
    }


if ($_REQUEST["task"] != "delete") {


    $item->EndInit();

    for ($i = 0; $i < $dataset->$_REQUEST["table"]()->Columns()->Count(); $i++) {
        $s = "";
        // $s = $_REQUEST[$dataset->$_REQUEST["table"]()->Columns()->GetItem($i)->ColumnName()];

        if (!empty($_REQUEST["hashdata"]))

            if ($_REQUEST["hashdata"] == $dataset->$_REQUEST["table"]()->Columns()->GetItem($i)->ColumnName())

                $s = sha1($_REQUEST[$dataset->$_REQUEST["table"]()->Columns()->GetItem($i)->ColumnName()]);


        if (!empty($_REQUEST["file"])) {
            $_SESSION["ide"]->import("includes.helper");

            $files = THelper::SplitStrings($_REQUEST["file"], ",");

            $index = THelper::IsInArray($files, $dataset->$_REQUEST["table"]()->Columns()->GetItem($i)->ColumnName());

            if ($index != -1)
                if ($_FILES[$files[$index]]["name"] !== "") {

                    $help = new THelper();

                    $imgs = $help->Upload($files[$index], array("imgs" => ROOT_UPLOADS_IMAGES, "files" => ROOT_UPLOADS_FILES), $_SESSION['languages']->get(0),"");
                    $uploadok = $imgs["status"];
                    if ($uploadok)
                    {
                        $s = $imgs["filenames"][0];
                        $outscrfiles.=$files[$index]."value = null;";
                    }
                    $filenames[] .= $imgs["filenames"][0];
                }
        }

        if ($s === "")
            if ($dataset->$_REQUEST["table"]()->Columns()->GetItem($i)->DefaultValue() != '<DBNull>' && $_REQUEST[$dataset->$_REQUEST["table"]()->Columns()->GetItem($i)->ColumnName()] == "")
                if ($_REQUEST["task"] == "edit")
                    $s = $item->GetItem($dataset->$_REQUEST["table"]()->Columns()->GetItem($i)->ColumnName());
                    else
                $s = $dataset->$_REQUEST["table"]()->Columns()->GetItem($i)->DefaultValue();
            else

                if(array_key_exists($dataset->$_REQUEST["table"]()->Columns()->GetItem($i)->ColumnName(),$_REQUEST))
                $s = $_REQUEST[$dataset->$_REQUEST["table"]()->Columns()->GetItem($i)->ColumnName()];

        if ($s != "")

            $item->SetItem($dataset->$_REQUEST["table"]()->Columns()->GetItem($i)->ColumnName(), $s);


        if ($_REQUEST["task"] == "add")
            $item->RowState("added");
        else
            $item->RowState("modified");

    }
}


$res = $n->UpdateTable($dataset->$_REQUEST["table"]());

if(empty($_REQUEST["silent"]))
if ($res == true && $uploadok  ) {
    if ($_REQUEST["task"] == "delete")
        $json['fn'] = "var response=1;deleteItem('" . $_REQUEST["item"] . "', function(){showMsg('sh-ok', '" . $_SESSION["languages"]->GetString("DATA_DELETED_COMMIT") . "');}, '');";
    else {
        $json['fn'] = "var response=1;showMsg('sh-ok', " . "'" .  $_SESSION["languages"]->GetString("DATA_SAVE_COMMIT") . "'" . ");";
    }
} else {
    $json['fn'] = "var response=0;showMsg('sh-error', " . "'" . $_SESSION["languages"]->GetString("DATA_ERROR") . "'" . ");";
}

if (!empty($_REQUEST["fn"]))
    $json['fn'] .= $_REQUEST['fn'];

if (empty($_REQUEST["file"]))
    echo json_encode($json);
else {
    $outscrfiles ="";
        for ($i = 0; $i < count($files); $i++)
      if($files[$i]!="none")
        {
            if (($_FILES[$files[$i]]["name"] != "") && ($uploadok))
                if (stripos($_FILES[$files[$i]]["type"], "application") === false) {
                    $json['fn'] .= $files[$i] . 'img.src="' . LIVE_USER_IMGS . $filenames[$i] . '";';
                }
        }
        $json['fn'].=$outscrfiles;

        echo '<script language="javascript" type="text/javascript">window.top.window.AjaxJson(' . json_encode($json) . ') </script>';
        // echo '<script language="javascript" type="text/javascript">window.top.window.AjaxJson(eval(\'(' . json_encode($imgs) . ')\'));</script> ';
        $_FILES[$_REQUEST["file"]]["name"] = "";

    }


?>