<?php defined('JEXEC') or die('Restricted access'); ?>
<?php
$_SESSION['ide']->import("includes.helper");
if (isset($_REQUEST['nombre']))
{
    $dataset = new DSDatos();
    $t_roltableadapter= new t_rolTableAdapter();
    $t_roltableadapter->FillByID($dataset->t_rol(), $_REQUEST['nombre']);
}else
    $t_roltableadapter->FillDefault($dataset->t_rol());

$_SESSION['languages']->LoadFromPath(PHPDOTNETROOT.'modules/'.$_GET['module'].'/',$_SESSION['languages']->GetLang());
?>
<div class="grid mtop5">
    <table class="tablelist" cellspacing="0" id="tblobjtemas">
        <tr class="theader">
            <td width="10px"><?php  echo THelper::checkBox('chk', '', array('onclick="CheckAll(\'.itmchk\', this.checked);"'))?></td>
            <?php

           for ($i = 0; $i < $dataset->t_rol()->Columns()->Count(); $i++)
           if ($dataset->t_rol()->Columns()->GetItem($i)->AutoIncrement()==0){
                ?>
                <td><?php echo   $_SESSION['languages']->GetString($dataset->t_rol()->Columns()->GetItem($i)->Caption());?></td>
                <?php
            }
            ?>


        </tr>

        <?php

        for ($i = 0; $i < $dataset->t_rol()->Count(); $i++)
        {
            $rol = $dataset->t_rol()->Row($i);
            ?>

            <tr id="<?=$rol->idrol()?>">
                <td><input type="checkbox" class="itmchk"/></td>
           <?php     for ($k = 0; $k < $dataset->t_rol()->Columns()->Count(); $k++)

                if($dataset->t_rol()->Columns()->GetItem($k)->AutoIncrement()==0)
                {


                $field = $dataset->t_rol()->Columns()->GetItem($k)->ColumnName();

                ?>
                <td>

                    <a href="<?php echo PHPDOTNETROOTLIVE . "modules/controller.php"?>?lang=<?php echo $_SESSION['languages']->GetLang();?>&op=module&view=edit&module=profile&item=<?php echo $rol->idrol();?>"
                       class="map rojooscuro tdn" rel="<?php echo $rol ->idrol();?>">
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