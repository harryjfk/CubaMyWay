


<?php //defined('JEXEC') or die('Restricted access');
include(PHPDOTNETROOT.'includes/helper.php');
$dataset  = new DSDatos();
$t_roltableadapter = new t_rolTableAdapter();
$edit=!empty($_REQUEST['item']);


$_SESSION['languages']->LoadFromPath(PHPDOTNETROOT.'modules/'.$_GET['module'].'/',$_SESSION['languages']->GetLang());
if($edit)
{
   $tit= $_SESSION['languages']->GetString(strtoupper($_REQUEST['view'])) . ' '.$_SESSION['languages']->GetString(strtoupper($_REQUEST['module']));
   $t_roltableadapter->FillByID($dataset->t_rol(),$_REQUEST['item']);

    if($dataset->t_rol()->Count()>0)
       $item = $dataset->t_rol()->Row(0);
       else
           $tit = $_SESSION['languages']->GetString(strtoupper($_REQUEST['view'])) . ' '.$_SESSION['languages']->GetString(strtoupper($_REQUEST['module']));
$tit.=' '.$item->namerol();

}
else
    $tit = $_SESSION['languages']->GetString(strtoupper($_REQUEST['view'])) . ' '.$_SESSION['languages']->GetString(strtoupper($_REQUEST['module']));

?>
<form id="frm<?php echo $_REQUEST['module'];?>" name="frm<?php echo $_REQUEST['module'];?>">

        <fieldset class="br5">
            <legend><?php echo $tit  ?></legend>
            <div class="cb mt1p">
              <?php
               for($i=0;$i<$dataset->t_rol()->Columns()->Count();$i++)
                {
                    $col = $dataset->t_rol()->Columns()->GetItem($i);
                    if($col->AutoIncrementSeed()==0)
                    {
                    ?>
                    <div class="fielditem">
                        <?php
                        $t = "";
                        if ($item!=null)
                            $t = $item->GetItem($col->ColumnName());
                        if ($col->ColumnName()==="isanon")
                        {         $checked = $t ? 'checked="checked"' : '';
                            echo THelper::checkbox('isanon', 1, array($checked));?> <label for="isanon"><?php  echo $_SESSION['languages']->GetString($col->ColumnName()); ?></label>
                            <?php
                        }
                        else
                        {
                            ?>
                        <label for="<?php echo $col->ColumnName(); ?>" class="in_block w35p fleft"><?php echo $_SESSION['languages']->GetString($col->ColumnName()); ?>:</label>
                        <div class="">  <?php

                                if($col->ColumnName()==="typerol")
                                {
                                                            // if(!$_REQUEST['item'][0]):
                                      //  $change = "onchange=\"AjaxUpdate('index2.php?module=acl&view=loadprofile&idperfil=".$_REQUEST['idperfil']."&tipoacl='+this.value, 'updateprofile', '');\"";
                                        echo THelper::select('typerol', $ACL, $t, false, array(/*$change*/));
                                   // else:?>
                                        <b><?php //echo $TIPO_ACL[$_REQUEST['tipoacl']];
                                           // echo THelper::hidden('tipoacl', $_REQUEST['tipoacl']);
                                            ?></b>
                                        <?php //endif;

                                }
                              //           echo THelper::password('pass', $item->GetItem($col->ColumnName()), array('class="w100p"'));
                                else


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
                'namerol': {required:true}
            },
            messages: {
                'namerol': {required:'<?php  echo $_SESSION['languages']->GetString("FIELD_REQUIRED");?>'}
            },
            debug: true,
            errorElement: 'div',
            submitHandler: function(form){

var data = $('#frm<?php echo $_REQUEST['module'];?>').serialize();
                AjaxRequest('<?php echo PHPDOTNETROOTLIVE.'';?>DSDatosHelper.php?lang=<?php echo $_SESSION['languages']->GetLang(); ?>&op=controller&table=t_rol&task=<?php if($edit) echo "edit&item=".$_REQUEST["item"];else echo "add";?>&'+data, 'frm<?php echo $_REQUEST['module'];?>', function(j){AjaxJson(j);}, 'json','<?php echo PHPDOTNETROOTLIVE?>',errors);
            }
        });


        $('#cancelar').bind('click', function(){
            return AjaxUpdate('<?php echo PHPDOTNETROOTLIVE;?>modules/controller.php?lang=<?php echo $_SESSION['languages']->GetLang(); ?>&op=module&module=profile&view=list', 'update', 'frmvolverimp','<?php echo PHPDOTNETROOTLIVE?>',errors);
        });
    });

</script>