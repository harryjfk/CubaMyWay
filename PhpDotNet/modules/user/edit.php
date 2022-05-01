<?php defined('JEXEC') or die('Restricted access');
include(PHPDOTNETROOT.'includes/helper.php');
$dataset  = new DSDatos();

$t_roltableadapter = new t_rolTableAdapter();
$t_roltableadapter->FillDefault($dataset->t_rol());
$edit=!empty($_REQUEST['item']);
$_SESSION['languages']->LoadFromPath(PHPDOTNETROOT.'modules/'.$_GET['module'].'/',$_SESSION['languages']->GetLang());

if($edit)
{
    $t_usertableadapter = new t_userTableAdapter();
    $tit= $_SESSION['languages']->GetString(strtoupper($_REQUEST['view'])) . ' '.$_SESSION['languages']->GetString(strtoupper($_REQUEST['module']));
    $t_usertableadapter->FillByID($dataset->t_user(),$_REQUEST['item']);
    if($dataset->t_user()->Count()>0)
    $item = $dataset->t_user()->Row(0);
    else
        $tit = $_SESSION['languages']->GetString(strtoupper($_REQUEST['view'])) . ' '.$_SESSION['languages']->GetString(strtoupper($_REQUEST['module']));
$tit.=' '.$item->nameuser();
}
else
    $tit = $_SESSION['languages']->GetString(strtoupper($_REQUEST['view'])) . ' '.$_SESSION['languages']->GetString(strtoupper($_REQUEST['module']));

?>
<form id="frm<?php echo $_REQUEST['module'];?>" name="frm<?php echo $_REQUEST['module'];?>" method="post" enctype="multipart/form-data" target="ifrmimages"
      action="<?php echo PHPDOTNETROOTLIVE?>DSDatosHelper.php?op=controller&module=user&table=t_user&task=<?php if($edit) echo "edit&item=".$_REQUEST["item"];else echo "add";?>&lang=<?php echo $_REQUEST["lang"];?>&hashdata=passworduser&file=pictureuser">
    <div class="archivos">
        <fieldset class="br5">
            <legend><?php echo $tit  ?></legend>
            <div class="cb mt1p">
              <?php
                for($i=0;$i<$dataset->t_user()->Columns()->Count();$i++)
                {

                    $col = $dataset->t_user()->Columns()->GetItem($i);
                    if($col->AutoIncrementSeed()==0)
                    {
                        $t = "";
                        if ($item!=null)
                            $t = $item->GetItem($col->ColumnName());
                    ?>
                    <div class="fielditem">
                        <label for="<?php echo $col->ColumnName(); ?>" class="in_block w35p fleft"><?php echo $_SESSION['languages']->GetString($col->ColumnName()); ?>:</label>
                        <div class="">  <?php
                                if($col->ColumnName()==="passworduser")
                                {
                                         echo THelper::password($col->ColumnName(), "" ,array('class="w100p"'));?>
                                    </div>
                       </div>
                               <div class="fielditem">
                        <label for="repass" class="in_block w35p fleft"><?php echo $_SESSION['languages']->GetString("repassword"); ?>:</label>
                        <div class="">
                                    <?php  echo THelper::password('repass', "" ,array('class="w100p"'));


                                }
                                else
                                    if($col->ColumnName()==="idrol")
                                    {

                                       // $dataset->t_rol()->Rows()->AsArray("idrol",array("namerol"));

                                        echo THelper::selectObject2('idrol', $dataset->t_rol()->Rows(), 'idrol', 'namerol', null, $t, false, array('class="w100p"', null));

                                    }
                                    else if($col->ColumnName()==="pictureuser")
                                    {
                                        echo THelper::file('pictureuser');
                                        if($ima = $t):
                                            ?>
                                        <div class="cb mleft10p ptop05p">
                                            <img id ="pictureuserimg" src="<?php echo LIVE_USER_IMGS.$ima?>" width="100" id="ima"/>
                                        </div>
                                        <?php endif;
                                    }
                                    else
                            echo THelper::textbox($col->ColumnName(), $t, array('class="w100p"'));
                           ?></div>
                        <div class="cb"></div>
                    </div>


             <?php  }}

                ?>

    <div class="cb"></div>
            </div>


            <div class="cb tc mt2p">
                <?php
                echo THelper::submit('guardar', $_SESSION['languages']->GetString('SAVE'),array('class="btn-confirm"'));
                echo THelper::button('cancelar', $_SESSION['languages']->GetString('CANCEL'),array('class="btn-confirm"'));
                ?>
            </div>

            <?php //echo THelper::hidden('item[]', $_REQUEST['item'][0]);?>

        </fieldset>
        <iframe id="ifrmimages" name="ifrmimages" style="display: none;" ></iframe>

        <div class="cb"></div>
    </div>
</form>

<script type="text/javascript">

    $(function(){
     //   alert('a');
        $('#frm<?php echo $_REQUEST['module'];?>').validate({
            rules: {
                //'iddescuentoedit': {required:true},
                'nameuser': {required:true},
                'username': {required:true},
                'email': {required:true, email:true},
                'passworduser': {required: !$('#passworduser').val(), equalTo:$('#repass')}
            },
            messages: {
                'nameuser': {required:'<?php echo $_SESSION['languages']->GetString("FIELD_REQUIRED");?>'},
                'username': {required:'<?php echo $_SESSION['languages']->GetString("FIELD_REQUIRED");?>'},

                'email': {required:'<?php echo $_SESSION['languages']->GetString("FIELD_REQUIRED");?>', email:'<?php echo  $_SESSION['languages']->GetString("FIELD_EMAIL");?>'},
                'passworduser': {required:'<?php echo $_SESSION['languages']->GetString("FIELD_REQUIRED");?>', equalTo:'<?php echo  $_SESSION['languages']->GetString("FIELD_PASSWORD");?>'}
            },
            debug: true,
            errorElement: 'div',
            submitHandler: function(form){
                form.submit();
             /*   var data = $('#frm<?php echo $_REQUEST['module'];?>').serialize()+'&hashdata=passworduser&file=pictureuser';

                alert('<?php echo PHPDOTNETROOTLIVE.'';?>DSDatosHelper.php?op=controller&table=t_user&task=<?php if($edit) echo "edit&item=".$_REQUEST["item"];else echo "add";?>&lang=<?php echo $_REQUEST["lang"];?>&'+data);
                AjaxRequest('<?php echo PHPDOTNETROOTLIVE.'';?>DSDatosHelper.php?op=controller&table=t_user&task=<?php if($edit) echo "edit&item=".$_REQUEST["item"];else echo "add";?>&lang=<?php echo $_REQUEST["lang"];?>&'+data, 'frm<?php echo $_REQUEST['module'];?>', function(j){AjaxJson(j);}, 'json','<?php echo PHPDOTNETROOTLIVE ?>');
          */  }
        });


        $('#cancelar').bind('click', function(){
            return AjaxUpdate('<?php echo PHPDOTNETROOTLIVE;?>modules/controller.php?op=module&module=user&view=list&lang=<?php echo $_REQUEST["lang"];?>', 'update', 'frmvolverimp','<?php echo PHPDOTNETROOTLIVE ?>',errors);
        });
    });

</script>