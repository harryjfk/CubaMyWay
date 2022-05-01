<?php //defined('JEXEC') or die('Restricted access');
include(PHPDOTNETROOT.'includes/helper.php');
include(ROOT."DSCubaMyWay.Designer.php");
$dataset  = new DSCubaMyWay();
$t_realtriptableadapter = new t_realtriptableadapter();
$edit=!empty($_REQUEST['item']);
$dataset2  = new DSDatos();

$t_usertableadapter = new t_userTableAdapter();
$t_usertableadapter->FillDefault($dataset2->t_user());
$t_tripstableadapter = new t_tripTableAdapter();
$t_tripstableadapter->FillDefault($dataset->t_trip());
$_SESSION['languages']->LoadFromPath(__DIR__.'/',$_SESSION['languages']->GetLang());
if($edit)
{
    $tit= $_SESSION['languages']->GetString(strtoupper($_REQUEST['view'])) . ' '.$_SESSION['languages']->GetString(strtoupper($_REQUEST['module']));
    $t_realtriptableadapter->FillByID($dataset->t_realtrip(),$_REQUEST['item']);

    if($dataset->t_realtrip()->Count()>0)
        $item = $dataset->t_realtrip()->Row(0);
    else
        $tit = $_SESSION['languages']->GetString(strtoupper($_REQUEST['view'])) . ' '.$_SESSION['languages']->GetString(strtoupper($_REQUEST['module']));
    $tit.=' '.$item->nametrip();

}
else
    $tit = $_SESSION['languages']->GetString("ADD") . ' '.$_SESSION['languages']->GetString(strtoupper($_REQUEST['module']));

?>
<form id="frm<?php echo $_REQUEST['module'];?>" name="frm<?php echo $_REQUEST['module'];?>">

    <fieldset class="br5">
        <legend><?php echo $tit  ?></legend>
    <div class="cb mt1p">
        <?php

        for($i=0;$i<$dataset->t_realtrip()->Columns()->Count();$i++)
        {
            $col = $dataset->t_realtrip()->Columns()->GetItem($i);
            if($col->AutoIncrementSeed()==0 && $col->Caption()!="nametrip" && $col->Caption()!="nameuser")
            {
                ?>
                    <div class="fielditem">
                        <?php
                $t = "";
                if ($item!=null)
                    $t = $item->GetItem($col->ColumnName());
                if($col->ColumnName()==="iduser")
                {
                    ?>
                    <label for="<?php echo $col->ColumnName(); ?>" class="in_block w35p fleft"><?php echo $_SESSION['languages']->GetString($col->ColumnName()); ?>:</label>
                    <div class=""><?php
                        // $dataset->t_rol()->Rows()->AsArray("idrol",array("namerol"));

                        echo THelper::selectObject2('iduser', $dataset2->t_user()->Rows(), 'iduser', 'nameuser', null, $t, false, array('class="w100p"', null));
                        ?>
                    </div>        </div>
                       </div> <?php
                }
                else
                    if($col->ColumnName()==="idtrip")
                    {
                        ?>
                        <label for="<?php echo $col->ColumnName(); ?>" class="in_block w35p fleft"><?php echo $_SESSION['languages']->GetString($col->ColumnName()); ?>:</label>
                        <div class=""><?php
                            // $dataset->t_rol()->Rows()->AsArray("idrol",array("namerol"));

                            echo THelper::selectObject2('idtrip', $dataset->t_trip()->Rows(), 'idtrip', 'nametrip', null, $t, false, array('class="w100p"', null));
                            ?>
                        </div>
                        </div> <?php
                    }
                    else
                        if($col->ColumnName()==="isclosed")
                        {
                            ?>
                            <label for="<?php echo $col->ColumnName(); ?>" class="in_block w35p fleft"><?php echo $_SESSION['languages']->GetString($col->ColumnName()); ?>:</label>
                            <div class=""><?php
                                // $dataset->t_rol()->Rows()->AsArray("idrol",array("namerol"));
                                $t = false;
                                        $s = "";
                                    if($edit)
                                    {  if($item->isclosed())

                                     $s  ="checked";
                                   $t =  $item->isclosed();
                                    }
                                 //   echo $t;

                                echo THelper::checkBox("check",$t, array($s));
                                ?>
                            </div>
                            </div> <?php
                        }
                        else

                {
                    ?>
                    <label for="<?php echo $col->ColumnName(); ?>" class="in_block w35p fleft"><?php echo $_SESSION['languages']->GetString($col->ColumnName()); ?>:</label>
                    <div class="">  <?php




                        echo THelper::textbox($col->ColumnName(),$t , array('class="w100p"'));
                        ?></div>
                    <div class="cb"></div>
                    </div>


                    <?php  }}}

        ?>

        <div class="cb"></div>
        </div>


        <div class="cb" >
            <?php
            echo THelper::submit('guardar', $_SESSION['languages']->GetString('SAVE'),array('class="btn-confirm"'));
            echo THelper::button('cancelar', $_SESSION['languages']->GetString('CANCEL'),array('class="btn-confirm"'));
            ?>
        </div>

        <?php //echo THelper::hidden('item[]', $_REQUEST['item'][0]);?>

    </fieldset>
    <div class="cb"></div>
    </div>
</form>

<script type="text/javascript">

    $(function(){
        //   alert('a');
        $('#frm<?php echo $_REQUEST['module'];?>').validate({
            rules: {
                'datetrip': {required:true}
            },
            messages: {
                'datetrip': {required:'<?php  echo $_SESSION['languages']->GetString("FIELD_REQUIRED");?>'}
            },
            debug: true,
            errorElement: 'div',
            submitHandler: function(form){

                var t =0;
                if(check.checked)
                   t=1;

                var data = $('#frm<?php echo $_REQUEST['module'];?>').serialize()+"&isclosed="+t;

                AjaxRequest('<?php echo PHPDOTNETROOTLIVE.'';?>DSDatosHelper.php?lang=<?php echo $_SESSION['languages']->GetLang(); ?>&op=controller&dataset=DSCubaMyWay&dspath=DSCubaMyWay.Designer&table=t_realtrip&task=<?php if($edit) echo "edit&item=".$_REQUEST["item"];else echo "add";?>&'+data, 'frm<?php echo $_REQUEST['module'];?>', function(j){AjaxJson(j);}, 'json','<?php echo PHPDOTNETROOTLIVE?>',errors);
            }
        });


        $('#cancelar').bind('click', function(){
            return AjaxUpdate('<?php echo PHPDOTNETROOTLIVE;?>modules/controller.php?lang=<?php echo $_SESSION['languages']->GetLang(); ?>&op=module&module=trips&view=list', 'update', 'frmvolverimp','<?php echo PHPDOTNETROOTLIVE?>',errors);
        });
    });

</script>