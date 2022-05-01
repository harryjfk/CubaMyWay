


<?php //defined('JEXEC') or die('Restricted access');
include(PHPDOTNETROOT.'includes/helper.php');
include(ROOT."DSCubaMyWay.Designer.php");
$dataset  = new DSCubaMyWay();
$t_messagestableadapter = new t_messagesTableAdapter();
$edit=!empty($_REQUEST['item']);
$dataset2  = new DSDatos();
$t_usertableadapter = new t_userTableAdapter();
$t_usertableadapter->FillDefault($dataset2->t_user());
$_SESSION['languages']->LoadFromPath(__DIR__.'/',$_SESSION['languages']->GetLang());
if($edit)
{
    $tit= $_SESSION['languages']->GetString(strtoupper($_REQUEST['view'])) . ' '.$_SESSION['languages']->GetString(strtoupper($_REQUEST['module']));
    $t_messagestableadapter->FillByID($dataset->t_messages(),$_REQUEST['item']);

    if($dataset->t_messages()->Count()>0)
        $item = $dataset->t_messages()->Row(0);
    else
        $tit = $_SESSION['languages']->GetString(strtoupper($_REQUEST['view'])) . ' '.$_SESSION['languages']->GetString(strtoupper($_REQUEST['module']));
  //  $tit.=' '.$item->topiccomment();

}
else
    $tit = $_SESSION['languages']->GetString(strtoupper($_REQUEST['view'])) . ' '.$_SESSION['languages']->GetString(strtoupper($_REQUEST['module']));

?>
<form id="frm<?php echo $_REQUEST['module'];?>" name="frm<?php echo $_REQUEST['module'];?>">

    <fieldset class="br5">
        <legend><?php echo $tit  ?></legend>
    <div class="cb mt1p">
        <?php

        for($i=0;$i<$dataset->t_messages()->Columns()->Count();$i++)
        {
            $col = $dataset->t_messages()->Columns()->GetItem($i);
            if($col->AutoIncrementSeed()==0 && $col->Caption()!="origuser" && $col->Caption()!="destuser")
            {
                ?>
                    <div class="fielditem">
                        <?php
                $t = "";
                if ($item!=null)
                    $t = $item->GetItem($col->ColumnName());
                if($col->ColumnName()==="idoriguser" || $col->ColumnName()==="iddestuser")
                {
                    ?>
                    <label for="<?php echo $col->ColumnName(); ?>" class="in_block w35p fleft"><?php echo $_SESSION['languages']->GetString($col->ColumnName()); ?>:</label>
                    <div class=""><?php
                        // $dataset->t_rol()->Rows()->AsArray("idrol",array("namerol"));

                        echo THelper::selectObject2($col->ColumnName(), $dataset2->t_user()->Rows(), 'iduser', 'nameuser', null, $t, false, array('class="w100p"', null));
                        ?>
                    </div>        </div>
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
                'textmsg': {required:true}
            },
            messages: {
                'textmsg': {required:'<?php  echo $_SESSION['languages']->GetString("FIELD_REQUIRED");?>'}
            },
            debug: true,
            errorElement: 'div',
            submitHandler: function(form){

                var data = $('#frm<?php echo $_REQUEST['module'];?>').serialize();

                AjaxRequest('<?php echo PHPDOTNETROOTLIVE.'';?>DSDatosHelper.php?lang=<?php echo $_SESSION['languages']->GetLang(); ?>&op=controller&dataset=DSCubaMyWay&dspath=DSCubaMyWay.Designer&table=t_messages&task=<?php if($edit) echo "edit&item=".$_REQUEST["item"];else echo "add";?>&'+data, 'frm<?php echo $_REQUEST['module'];?>', function(j){AjaxJson(j);}, 'json','<?php echo PHPDOTNETROOTLIVE?>',errors);
            }
        });


        $('#cancelar').bind('click', function(){
            return AjaxUpdate('<?php echo PHPDOTNETROOTLIVE;?>modules/controller.php?lang=<?php echo $_SESSION['languages']->GetLang(); ?>&op=module&module=messages&view=list', 'update', 'frmvolverimp','<?php echo PHPDOTNETROOTLIVE?>',errors);
        });
    });

</script>