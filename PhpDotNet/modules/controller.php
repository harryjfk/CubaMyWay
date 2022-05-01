<?php
include_once("../config.php");
include("decript.php");


//echo json_encode($_REQUEST);
if (isset($_REQUEST['op']))
    if ($_REQUEST['op'] == 'check') {

        $dataset = new DSDatos();
        $t_usertableadapter = new t_userTableAdapter();
        $t_usertableadapter->Authenticated($dataset->t_user(), $_REQUEST['username'], sha1($_REQUEST['passworduser']));

        $exits = $dataset->t_user()->Count() == 1;
        if ($exits) {
            $t_roltableadapter = new t_rolTableAdapter();
            $t_roltableadapter->FillByID($dataset->t_rol(), $dataset->t_user()->Row(0)->idrol());
            $_SESSION["authuser"] = array("name" => $dataset->t_user()->Row(0)->nameuser(), "id" => $dataset->t_user()->Row(0)->iduser(), "img" => $dataset->t_user()->Row(0)->pictureuser(), "acl" => $dataset->t_rol()->Row(0)->typerol(),"rol"=>$dataset->t_user()->Row(0)->idrol());
unset($t_roltableadapter);
        }
        $json = array('value' => $exits);


        echo json_encode($json);
    } else
        if ($_REQUEST['op'] == 'logout') {
            //  session_start();
            $_SESSION["authuser"] = null;
            ?>
        <script>
            document.location.href = "<?php echo $_GET['redirect'];?>";
        </script>
        <?php
        } else


            if ($_REQUEST['op'] === 'module') {


                if ($_REQUEST['view'] and $_REQUEST['module']) {

                    if(isset($_REQUEST["config"]))
                    { if (file_exists($include = ROOT_MODULES . sprintf("%s/config/%s.php", $_REQUEST['module'], $_REQUEST['view'])))
                           include_once($include);
                        else
                            if (file_exists($include = PHPDOTNET_ROOT_MODULES . sprintf("%s/%s.php", $_REQUEST['module'], $_REQUEST['view'])))
                                include_once($include);
                    }
                        else
                    if (file_exists($include = ROOT_MODULES . sprintf("%s/%s.php", $_REQUEST['module'], $_REQUEST['view'])))
                        include_once($include);
                    else
                        if (file_exists($include = PHPDOTNET_ROOT_MODULES . sprintf("%s/%s.php", $_REQUEST['module'], $_REQUEST['view'])))
                            include_once($include);
                }


            } else
                if($_REQUEST['op']=='index')
                { //    echo ROOT."innerindex.php";
                    include_once(ROOT."innerindex.php");  }
else
    if($_REQUEST['op']==='controller')

        include_once(PHPDOTNETROOT.'DSDatosHelper.php');
