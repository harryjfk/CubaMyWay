<?php
include("config.php");
include(PHPDOTNETROOT."includes/helper.php");
$datasetname = $_REQUEST["dataset"];
$dataset = new $datasetname();
$iadapter = $_REQUEST["tableimg"] . "TableAdapter";
$itable = $_REQUEST["tableimg"] . "DataTable";

$json = array('status' => 1);
if($_REQUEST["task"]=="add")
{
$adapter = $_REQUEST["tableparent"] . "TableAdapter";
$table = $_REQUEST["tableparent"] . "DataTable";
if(empty($_REQUEST["item"]))
{
$na = new $adapter();
$t = $na->FillLast($dataset->$_REQUEST["tableparent"]());   }
else
    $t = [$_REQUEST["itemp"]=>$_REQUEST["item"]];


    $help = new THelper();

    $imgs = $help->Upload("", array("imgs" => ROOT_UPLOADS_IMAGES, "files" => ROOT_UPLOADS_FILES), $_SESSION['languages']->get(0),/*$_REQUEST["func"]*/'');

 for($i=0;$i<count($imgs["filenames"]);$i++)
 {
        $s = $imgs["filenames"][$i];
  //     echo   json_encode($imgs["filenames"][$i]);
     $ia = new $iadapter();
  $r =    $dataset->$_REQUEST["tableimg"]()->Rows()->AddDefault();
     $r->SetItem($_REQUEST["itemc"],$t[$_REQUEST["itemp"]]);
       $r->SetItem($_REQUEST["pathf"],$s);

       $r->RowState('added');
       $ia->UpdateTable( $dataset->$_REQUEST["tableimg"]()) ;

   }

//$json['fn'] = "window.top.window.;
//$json['fn'] = "var r = ".$t[$_REQUEST["itemp"]].';'.$_REQUEST["func"];
$json['fn'] = "window.top.window.AddMarker(".$t[$_REQUEST["itemp"]].");";
    echo json_encode($json);
?>

<body>

<script >

   <?php echo $json['fn'];?>
  </script>       </body>
<?php }
else
{
    $json = array('status'=>1);
   if(is_array($_REQUEST['itemima']) ):


       include_once(PHPDOTNETROOT_LIBS.'funciones.php');
    //    $images = new t_imagesDataTable();
        $ids = implode(',', $_REQUEST['itemima']);
       $ia = new $iadapter();
       // $imageproducto =new t_imageproductoTableAdapter();
        for($i=0;$i<count($_REQUEST['itemima']);$i++)
        {

           $ia->FillBy($dataset->t_poloimages(),$_REQUEST['itemima'][$i]);

            $ima = $dataset->t_poloimages()->Row(0);
        //    $imageproducto->DeleteItem($_REQUEST['idproducto'],$_REQUEST['itemima'][$i]);
            DeleteFile(ROOT_UPLOADS.$ima->pathimage());
            $ia->Delete($_REQUEST['itemima'][$i]);
        }
    $json['fn'] = "deleteItem('".$ids."', function(){showMsg('sh-ok', '" . $_SESSION["languages"]->GetString("DATA_DELETED_COMMIT") . "'); $('.itmima:checked').each(function(idx, ele){ele.parentNode.remove()});}, 'img');";
 else:
    $json['fn'] = "showMsg('sh-error', '".$_SESSION["languages"]->GetString("DATA_ERROR")."');";
  endif;
    echo json_encode($json);
?>



<?php } ?>