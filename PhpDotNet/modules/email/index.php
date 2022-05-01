<?php $t = @parse_ini_file("email.ini");


$_SESSION['languages']->LoadFromPath(PHPDOTNETROOT.'modules/'.$_GET['module'].'/',$_SESSION['languages']->GetLang());

?>
<form id="frm<?php echo $_REQUEST['module'];?>" name="frm<?php echo $_REQUEST['module'];?>">
    <div class="archivos">
        <fieldset class="br5">
            <legend><?php echo $_SESSION['languages']->GetString("EMAIL_NOTIFIER"); ?></legend>
            <div class="cb mt1p">
                <div class="fielditem">
                    <label for="active" class="in_block w35p fleft"><?php echo $_SESSION['languages']->GetString("active"); ?></label>
                    <div class="">  <input type="checkbox" name="active" id="active" value="<?php echo $t["active"] ?>" class="w100p valid"></div>
                    <div class="cb"></div>
                </div>


                <div class="fielditem">
                    <label for="email" class="in_block w35p fleft"><?php echo $_SESSION['languages']->GetString("email");?>:</label>
                    <div class="">  <input type="text" name="email" id="email" value="<?php echo $t["email"] ?>" class="w100p"></div>
                    <div class="cb"></div>
                </div>


                <div class="fielditem">
                    <label for="password" class="in_block w35p fleft"><?php echo $_SESSION['languages']->GetString("password");?>:</label>
                    <div class="">  <input type="password" name="password" id="password" value="" class="w100p">                                    </div>
                </div>
                <div class="fielditem">
                    <label class="in_block w35p fleft"><?php echo $_SESSION['languages']->GetString("smtp");?></label>
                </div>


                <div class="fielditem">
                    <label for="smtpserver" class="in_block w35p fleft"><?php echo $_SESSION['languages']->GetString("smtpserver");?>:</label>
                    <div class="">  <input type="password" name="smtpserver" id="smtpserver" value="<?php echo $t["smtpserver"] ?>" class="w100p">                                    </div>
                </div>
                    <div class="cb"></div>
                <div class="fielditem">
                    <label for="smtpport" class="in_block w35p fleft"><?php echo $_SESSION['languages']->GetString("smtpport");?>:</label>
                    <div class="">  <input type="password" name="smtpport" id="smtpport" value="<?php echo $t["smtpport"] ?>" class="w100p">                                    </div>
                </div>
                <div class="cb"></div>





                <div class="cb"></div>
            </div>


            <div class="cb tc mt2p">
                <input type="submit" name="guardar" id="guardar" value="Save" class="btn-confirm">           </div>


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
                AjaxRequest('<?php echo PHPDOTNET_ROOT_MODULES;?>email/setter.php?lang=<?php echo $_SESSION['languages']->GetLang(); ?>&'+data, 'frm<?php echo $_REQUEST['module'];?>', function(j){AjaxJson(j);}, 'json','<?php echo PHPDOTNETROOTLIVE?>',errors);
            }
        });



    });

</script>