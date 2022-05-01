<?php defined('JEXEC') or die('Restricted access'); ?>
<?php
$_SESSION['ide']->import("includes.helper");

include_once(ROOT."DSCubaMyWay.Designer.php");
if (isset($_REQUEST['nombre']))
{
    $dataset = new DSCubaMyWay();
    $t_messagestableadapter= new t_messagesTableAdapter();
    $t_messagestableadapter->FillByID($dataset->t_messages(), $_REQUEST['nombre']);
}else
    $t_messagestableadapter->FillBy1($dataset->t_messages(),null,-1);

$_SESSION['languages']->LoadFromPath(__DIR__.'/',$_SESSION['languages']->GetLang());
?>
<div class="grid mtop5">
    <table class="tablelist" cellspacing="0" id="tblobjtemas">
        <tr class="theader">
            <td width="10px"><?php  echo THelper::checkBox('chk', '', array('onclick="CheckAll(\'.itmchk\', this.checked);"'))?></td>
            <?php

            for ($i = 0; $i < $dataset->t_messages()->Columns()->Count(); $i++)
                if ($dataset->t_messages()->Columns()->GetItem($i)->AutoIncrement()==0 && $dataset->t_messages()->Columns()->GetItem($i)->Caption()!="idoriguser"&& $dataset->t_messages()->Columns()->GetItem($i)->Caption()!="iddestuser"&& $dataset->t_messages()->Columns()->GetItem($i)->Caption()!="destuserpic" && $dataset->t_messages()->Columns()->GetItem($i)->Caption()!="origuserpic" ){
                    ?>
                    <td><?php echo   $_SESSION['languages']->GetString($dataset->t_messages()->Columns()->GetItem($i)->Caption());?></td>
                    <?php
                }
            ?>


        </tr>

        <?php

       for ($i = 0; $i < $dataset->t_messages()->Count(); $i++)
        {
            $rol = $dataset->t_messages()->Row($i);
            ?>

            <tr id="<?=$rol->idmessages()?>">
                <td><input type="checkbox" class="itmchk"/></td>
                <?php     for ($k = 0; $k < $dataset->t_messages()->Columns()->Count(); $k++)

                if($dataset->t_messages()->Columns()->GetItem($k)->AutoIncrement()==0  && $dataset->t_messages()->Columns()->GetItem($k)->Caption()!="idoriguser"&& $dataset->t_messages()->Columns()->GetItem($k)->Caption()!="iddestuser" && $dataset->t_messages()->Columns()->GetItem($k)->Caption()!="destuserpic" && $dataset->t_messages()->Columns()->GetItem($k)->Caption()!="origuserpic"  )
                {


                    $field = $dataset->t_messages()->Columns()->GetItem($k)->ColumnName();

                    ?>
                    <td>

                        <a href="<?php echo PHPDOTNETROOTLIVE . "modules/controller.php"?>?lang=<?php echo $_SESSION['languages']->GetLang();?>&op=module&view=edit&module=messages&item=<?php echo $rol->idmessages();?>"
                           class="map rojooscuro tdn" rel="<?php echo $rol ->idmessages();?>">
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