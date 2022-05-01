<?php defined('JEXEC') or die('Restricted access'); ?>
<?php
$_SESSION['ide']->import("includes.helper");

include_once(ROOT."DSCubaMyWay.Designer.php");
if (isset($_REQUEST['nombre']))
{
    $dataset = new DSCubaMyWay();
    $t_realtripTableAdapter= new t_realtripTableAdapter();
    $t_realtripTableAdapter->FillByID($dataset->t_realtrip(), $_REQUEST['nombre']);
}else
    $t_realtripTableAdapter->FillByID($dataset->t_realtrip(),-1);
$_SESSION['languages']->LoadFromPath(__DIR__.'/',$_SESSION['languages']->GetLang());
?>
<div class="grid mtop5">
    <table class="tablelist" cellspacing="0" id="tblobjtemas">
        <tr class="theader">
            <td width="10px"><?php  echo THelper::checkBox('chk', '', array('onclick="CheckAll(\'.itmchk\', this.checked);"'))?></td>
            <?php

            for ($i = 0; $i < $dataset->t_realtrip()->Columns()->Count(); $i++)
                if ($dataset->t_realtrip()->Columns()->GetItem($i)->AutoIncrement()==0 && $dataset->t_realtrip()->Columns()->GetItem($i)->Caption()!="iduser" && $dataset->t_realtrip()->Columns()->GetItem($i)->Caption()!="idtrip"){
                    ?>
                    <td><?php echo   $_SESSION['languages']->GetString($dataset->t_realtrip()->Columns()->GetItem($i)->Caption());?></td>
                    <?php
                }
            ?>


        </tr>

        <?php

        for ($i = 0; $i < $dataset->t_realtrip()->Count(); $i++)
        {
            $rol = $dataset->t_realtrip()->Row($i);
            ?>

            <tr id="<?=$rol->idrealtrip()?>">
                <td><input type="checkbox" class="itmchk"/></td>
                <?php     for ($k = 0; $k < $dataset->t_realtrip()->Columns()->Count(); $k++)

               if($dataset->t_realtrip()->Columns()->GetItem($k)->AutoIncrement()==0  && $dataset->t_realtrip()->Columns()->GetItem($k)->Caption()!="iduser" && $dataset->t_realtrip()->Columns()->GetItem($k)->Caption()!="idtrip")
                {


                    $field = $dataset->t_realtrip()->Columns()->GetItem($k)->ColumnName();

                    ?>
                    <td>

                        <a href="<?php echo PHPDOTNETROOTLIVE . "modules/controller.php"?>?lang=<?php echo $_SESSION['languages']->GetLang();?>&op=module&view=edit&module=trips&item=<?php echo $rol->idrealtrip();?>"
                           class="map rojooscuro tdn" rel="<?php echo $rol ->idrealtrip();?>">
                            <?php
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