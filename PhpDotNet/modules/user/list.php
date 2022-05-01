<div class="frame">
    <?php    $dataset = new DSDatos();
    $t_usertableadapter = new t_userTableAdapter();
?>
    <div class="options" ">

        <div class="button">

            <a href="#" class="btn ">
                <i class="icon-cog"></i> <?php echo $_SESSION['languages']->GetString('OPTIONS');?> <i class="icon-caret-down"></i>
            </a>  <ul class="dpmenu br5">
            <?php //if($_SESSION['usuario']->hasCredential('_zonasgeograficas', 'add')):?>
            <li>
                <a href="<?php echo PHPDOTNETROOTLIVE."Administration/controller.php"?>?op=module&view=edit&module=user&lang=<?php echo $_SESSION['languages']->GetLang();?>" class="action"><i class="icon-plus-sign"></i><?php echo $_SESSION['languages']->GetString('ADD');?></a>
            </li>
            <?php// endif; ?>

            <?php ///if($_SESSION['usuario']->hasCredential('_zonasgeograficas', 'edit')):?>
            <li>
                <a href="<?php echo PHPDOTNETROOTLIVE."Administration/controller.php"?>?op=module&view=edit&module=user&lang=<?php echo $_SESSION['languages']->GetLang();?>" class="edit"><i class="icon-pencil"></i><?php echo $_SESSION['languages']->GetString('EDIT');?></a>
            </li>
            <?php// endif; ?>

            <?php //if($_SESSION['usuario']->hasCredential('_zonasgeograficas', 'delete')):?>
            <li>
                <a href="<?php echo PHPDOTNETROOTLIVE.'';?>DSDatosHelper.php?op=controller&table=t_user&task=delete&lang=<?php echo $_SESSION['languages']->GetLang();?>" class="delete">
                    <i class="icon-trash"></i><?php echo $_SESSION['languages']->GetString('DELETE');?></a>
            </li>
            <?php// endif; ?>
            </ul>
        </div>


    </div>
<form id="frmguardar" name="frmguardar" onSubmit="  return AjaxUpdate('<?php echo PHPDOTNETROOTLIVE;?>modules/controller.php?op=module&view=list-tabla&module=user&lang=<?php echo $_SESSION['languages']->GetLang();?>', 'updatelisttab5', 'frmguardar','<?php  echo PHPDOTNETROOTLIVE ?>',errors)">

        <div class="searchbox">
            <label for="nombre" class="in_block w9p"><?php echo $_SESSION['languages']->GetString('LOGIN_USERNAME');?></label>
            <input type="text" id="nombre" name="nombre" value="<?php if(isset($_REQUEST['nombre']))$_REQUEST['nombre']?>"/>
            <button ><?php echo $_SESSION['languages']->GetString('SEARCH');?></button>
        </div>
    <div id="updatelisttab5" class="cb">
        <?php

        include_once('list-tabla.php');
        ?></div>
</form>
</div>

<script type="text/javascript">
    $('a.action').bind('click', function(e){
        var $this = $(this);
        AjaxUpdate($this.attr('href'), 'update', 'frmguardar','<?php  echo PHPDOTNETROOTLIVE ?>',errors);
        return false;
    });

    $('a.edit').bind('click', function(e){
        /*var $this = $(this);
        AjaxUpdate($this.attr('href'), 'update', '');   */

        var $this = $(this);
        algunSeleccionado('.itmchk:checked', '<?php echo $_SESSION['languages']->GetString('NONE_SELECTED'); ?>', function(first)
        {

            AjaxUpdate($this.attr('href')+'&item='+first.parentNode.parentNode.id, 'update', 'frmguardar','<?php  echo PHPDOTNETROOTLIVE ?>',errors);
        });

        return false;
    });

    $('a.delete').bind('click', function(e){
        /*var $this = $(this);
        AjaxUpdate($this.attr('href'), 'update', '');   */
        var $this = $(this);

        algunSeleccionado('.itmchk:checked', '<?php echo $_SESSION['languages']->GetString('NONE_SELECTED'); ?>', function(first)
        {
            if(confirm('<?php echo  $_SESSION['languages']->GetString('DELETE_CONFIRM'); ?>'))
                AjaxRequest($this.attr('href')+'&item='+first.parentNode.parentNode.id, 'frmguardar', function(j){AjaxJson(j);},'json','<?php  echo PHPDOTNETROOTLIVE ?>',errors);
        });

        return false;
    });

    //seccion de menu
    $('a.btn').bind('click', function(e){
        var $this = $(this);
       // alert($this.parent().find('.dpmenu'));
        $this.parent().find('.dpmenu').toggle(function(){return;});
        return false;
    });

    $('.dpmenu a').bind('click', function(e){
        var $this = $(this);
        $this.parent().parent().toggle(function(){return;});
        return false;
    });
    //fin seccion de menu
</script>
