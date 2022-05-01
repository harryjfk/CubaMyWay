<?php defined('JEXEC') or die('Restricted access'); ?>
<?php
$_SESSION['ide']->import("includes.helper");

include_once(ROOT."DSCubaMyWay.Designer.php");
if (isset($_REQUEST['nombre']))
{
    $dataset = new DSCubaMyWay();
    $t_tripTableAdapter= new t_tripTableAdapter();
    $t_tripTableAdapter->FillByID($dataset->t_trip(), $_REQUEST['nombre']);
}else
    $t_tripTableAdapter->FillByID($dataset->t_trip(), -1);
$_SESSION['languages']->LoadFromPath(__DIR__.'/',$_SESSION['languages']->GetLang());
?>
<div class="grid mtop5">
    <table class="tablelist" cellspacing="0" id="tblobjtemas">
        <tr class="theader">
            <td width="10px"><?php  echo THelper::checkBox('chk', '', array('onclick="CheckAll(\'.itmchk\', this.checked);"'))?></td>
            <?php

            for ($i = 0; $i < $dataset->t_trip()->Columns()->Count(); $i++)
                if ($dataset->t_trip()->Columns()->GetItem($i)->AutoIncrement()==0 && $dataset->t_trip()->Columns()->GetItem($i)->Caption()!="iduser" ){
                    ?>
                    <td><?php echo   $_SESSION['languages']->GetString($dataset->t_trip()->Columns()->GetItem($i)->Caption());?></td>
                    <?php
                }
            ?>


        </tr>

        <?php

        for ($i = 0; $i < $dataset->t_trip()->Count(); $i++)
        {
            $rol = $dataset->t_trip()->Row($i);
            ?>

            <tr id="<?=$rol->idtrip()?>">
                <td><input type="checkbox" class="itmchk"/></td>
                <?php     for ($k = 0; $k < $dataset->t_trip()->Columns()->Count(); $k++)

                if($dataset->t_trip()->Columns()->GetItem($k)->AutoIncrement()==0  && $dataset->t_trip()->Columns()->GetItem($k)->Caption()!="iduser" )
                {


                    $field = $dataset->t_trip()->Columns()->GetItem($k)->ColumnName();

                    ?>
                    <td>

                        <a href="<?php echo PHPDOTNETROOTLIVE . "modules/controller.php"?>?lang=<?php echo $_SESSION['languages']->GetLang();?>&op=module&view=edit&module=triptypes&item=<?php echo $rol->idtrip();?>"
                           class="map rojooscuro tdn" rel="<?php echo $rol ->idtrip();?>">
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