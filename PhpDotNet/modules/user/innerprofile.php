<?php defined('JEXEC') or die('Restricted access');
include_once(ROOT."config.php");
include_once(PHPDOTNETROOT . 'includes/helper.php');


$dataset = new DSDatos();
//$t_roltableadapter = new t_rolTableAdapter();
//$t_roltableadapter->FillDefault($dataset->t_rol());
$_SESSION['languages']->LoadFromPath(PHPDOTNETROOT . 'modules/user/', $_SESSION['languages']->GetLang());
$edit=isset($_SESSION['authuser']);
if($edit)
{
    $t_usertableadapter = new t_userTableAdapter();
    $_SESSION['languages']->GetString(strtoupper($_REQUEST['view'])) . ' ' . $_SESSION['languages']->GetString(strtoupper($_REQUEST['module']));
    $t_usertableadapter->FillByID($dataset->t_user(), $_SESSION['authuser']["id"]);
    $t=   $_SESSION['languages']->GetString("PROFILE" );
    $item = $dataset->t_user()->Row(0);
}
else
{
    $t=   $_SESSION['languages']->GetString("REGISTER_TITLE" );

 ?>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/admin.js"></script>
<Script>
    administration.SetPath("<?php echo LIVESITE;?>", "");
</Script>
    <?php
}
?><form id="frmprofile" name="frmprofile" method="post"
      enctype="multipart/form-data" target="ifrmimages"
      action="<?php
      if ($edit) $task= "edit"; else $task= "add";
      $edited="";
      $url ="";
      $m = "$"."_SESSION['authuser'];";
      if(isset($_REQUEST["url"]))$url= $_REQUEST["url"];
      if(!$edit) $edited="&silent=true&fn=administration.IsValid('frmprofile','". $_SESSION['languages']->GetString('LOGIN_ERROR_WRONGNAME')."','".$_SESSION['languages']->GetString('LOGIN_ERROR_CONNECTION')."','".$url."','".$_SESSION['languages']->GetLang()."');";
      echo LIVESITE.'controller/'.\UrlCrypt\UrlCrypt::encrypt("op=controller&module=user&table=t_user&itemmethod=".$m."&task=".$task.'&lang='.$_REQUEST["lang"]."&hashdata=passworduser&file=pictureuser".$edited);?>">
    <div class="profile">
        <h1><?php echo $t;?></h1>

        <div class="pictureitem">
            <label for="pictureuser" ><?php echo $_SESSION['languages']->GetString("pictureuser"); ?></label>
            <img id="pictureuserimg"
                 src="<?php
                 $ima= "user.png";
                 if($edit )
                     if( file_exists(ROOT_UPLOADS_IMAGES.$item->pictureuser()))
                         $ima = $item->pictureuser();
                 echo LIVE_USER_IMGS.$ima ;
                 ?>" >

            <input type="file" name="pictureuser" id="pictureuser" value="">

        </div>
        <div class="info">
            <div class="fielditem">
                <label for="nameuser"><?php echo $_SESSION['languages']->GetString("nameuser"); ?>:</label>
                <div class="">  <input type="text" name="nameuser" id="nameuser" value="<?php if($edit){ echo $item->nameuser();}?>" class="w100p"></div>

            </div>
            <div class="fielditem">
                <label for="username" ><?php echo $_SESSION['languages']->GetString("username"); ?>:</label>
                <div class="">  <input type="text" name="username" id="username" value="<?php if($edit){ echo $item->username();}?>" class="w100p"></div>

            </div>
            <div class="fielditem">
                <label for="passworduser" ><?php echo $_SESSION['languages']->GetString("passworduser"); ?>:</label>
                <div class="">  <input type="password" name="passworduser" id="passworduser" value="" class="w100p">                                    </div>
            </div>
            <div class="fielditem">
                <label for="repass" ><?php echo $_SESSION['languages']->GetString("repassword"); ?>:</label>
                <div class="">
                    <input type="password" name="repass" id="repass" value="" class="w100p"></div>

            </div>
            <div class="fielditem">
                <label for="email" ><?php echo $_SESSION['languages']->GetString("email"); ?>:</label>
                <div class="">  <input type="text" name="email" id="email" value="<?php if($edit){ echo $item->email();}?>" class="w100p valid"></div>

            </div>

        </div>
        <div class="cb mt1p">

            <div class="cb"></div>
        </div>


        <div class="cb tc mt2p">
            <?php
            echo THelper::submit('guardar', $_SESSION['languages']->GetString('SAVE'),array('class="btn-confirm"'));
            echo THelper::button('cancelar', $_SESSION['languages']->GetString('CANCEL'),array('class="btn-confirm"'));
            ?>
        </div>
    </div>

    <iframe id="ifrmimages" name="ifrmimages" style="display: none;"></iframe>

    <div class="cb"></div>

</form>
<script type="text/javascript">
      $(function(){
        //   alert('a');
        $('#frmprofile').validate({
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
            }
        });


        $('#cancelar').bind('click', function(){

            document.location.href = "<?php echo LIVESITE.$_SESSION["languages"]->GetLang()?>";
        });
    });


</script>