<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/admin.js"></script>
<Script>
    administration.SetPath("<?php echo LIVESITE;?>", "<?php echo LIVESITE.$_SESSION['languages']->GetLang().'/' . 'admin';?>");
</Script>

<div class="login">
    <h1><?php echo $_SESSION['languages']->GetString('LOGIN_TITLE'); ?></h1>
    <form  id= "frmlogin" >
    <div class="loginp">
        <div class="textedit">
            <label for="username"><?php echo $_SESSION['languages']->GetString('LOGIN_USERNAME'); ?></label>
            <input type="text" value="" id="username" name="username"/>
        </div>

        <div class="textedit">
            <label for="passworduser"><?php echo $_SESSION['languages']->GetString('LOGIN_PASSWORD'); ?></label>
            <input type="password" value="" id="passworduser" name="passworduser" />
        </div>

        <div class="button" id="buttoned">
            <input class="btn-confirm" type="button" value="<?php echo $_SESSION['languages']->GetString('LOGIN_REGISTER'); ?>" onclick=" AjaxUpdate('<?php echo LIVESITE . 'controller/'.\UrlCrypt\UrlCrypt::encrypt('op=module&module=user&view=profile&lang=' . $_SESSION['languages']->GetLang() . ''); ?>', 'update', '', '<?php echo LIVESITE;?>',errors);" />

            <input class="btn-confirm" type="button"  name="button1" value="<?php echo $_SESSION['languages']->GetString('LOGIN_ENTER'); ?>" onclick='administration.IsValid("frmlogin","<?php echo $_SESSION['languages']->GetString('LOGIN_ERROR_WRONGNAME'); ?>","<?php echo $_SESSION['languages']->GetString('LOGIN_ERROR_CONNECTION'); ?>","<?php if(isset($_REQUEST["url"])) echo $_REQUEST["url"];?>","<?php echo $_SESSION['languages']->GetLang();?>")'/>

            <div id="error" class="error"></div>
        </div>

    </div>  </form>
</div><