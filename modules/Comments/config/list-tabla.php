<?php defined('JEXEC') or die('Restricted access'); ?>
<?php
$_SESSION['ide']->import("includes.helper");

include_once(ROOT."DSCubaMyWay.Designer.php");
if (isset($_REQUEST['nombre']))
{
    $dataset = new DSCubaMyWay();
    $t_commentstableadapter= new t_commentTableAdapter();
    $t_commentstableadapter->FillByID($dataset->t_comment(), $_REQUEST['nombre']);
}else
    $t_commentstableadapter->FillDefault($dataset->t_comment());

$_SESSION['languages']->LoadFromPath(__DIR__.'/',$_SESSION['languages']->GetLang());
?>
<div class="grid mtop5">
    <table class="tablelist" cellspacing="0" id="tblobjtemas">
        <tr class="theader">
            <td width="10px"><?php  echo THelper::checkBox('chk', '', array('onclick="CheckAll(\'.itmchk\', this.checked);"'))?></td>
            <?php

            for ($i = 0; $i < $dataset->t_comment()->Columns()->Count(); $i++)
                if ($dataset->t_comment()->Columns()->GetItem($i)->AutoIncrement()==0 && $dataset->t_comment()->Columns()->GetItem($i)->Caption()!="iduser"&& $dataset->t_comment()->Columns()->GetItem($i)->Caption()!="username" ){
                    ?>
                    <td><?php echo   $_SESSION['languages']->GetString($dataset->t_comment()->Columns()->GetItem($i)->Caption());?></td>
                    <?php
                }
            ?>


        </tr>

        <?php

        for ($i = 0; $i < $dataset->t_comment()->Count(); $i++)
        {
            $rol = $dataset->t_comment()->Row($i);
            ?>

            <tr id="<?=$rol->idcomment()?>">
                <td><input type="checkbox" class="itmchk"/></td>
                <?php     for ($k = 0; $k < $dataset->t_comment()->Columns()->Count(); $k++)

                if($dataset->t_comment()->Columns()->GetItem($k)->AutoIncrement()==0  && $dataset->t_comment()->Columns()->GetItem($k)->Caption()!="iduser"&& $dataset->t_comment()->Columns()->GetItem($k)->Caption()!="username" )
                {


                    $field = $dataset->t_comment()->Columns()->GetItem($k)->ColumnName();

                    ?>
                    <td>

                        <a href="<?php echo PHPDOTNETROOTLIVE . "modules/controller.php"?>?lang=<?php echo $_SESSION['languages']->GetLang();?>&op=module&view=edit&module=comments&item=<?php echo $rol->idcomment();?>"
                           class="map rojooscuro tdn" rel="<?php echo $rol ->idcomment();?>">
                            <?php

                            if($field=="isanon")
                                echo THelper::BoolToStr( $_SESSION['languages']->get(0),$rol->GetItem($field));
                            else
                                if($field=="typerol")
                                    echo $ACL[$rol->GetItem($field)];
                                else
                                    echo $rol->GetItem($field);


                            ?> </a>
                    </td>
                    <?php   }
                ?>
            </tr>

            <?php


        }

        ?>

    </table>
</div>


<script type="text/javascript">
    $('a.map').bind('click', function (e) {
        var $this = $(this);

        $('#idparent').val($this.attr('rel'));
        AjaxUpdate($this.attr('href'), 'update', 'frmguardar','<?php echo PHPDOTNETROOTLIVE;?>',errors);
        return false;
    });

    $('a.paginate').bind('click', function (e) {
        var $this = $(this);
        AjaxUpdate($this.attr('href'), 'update', 'frmguardar',errors);
        return false;
    });
</script>