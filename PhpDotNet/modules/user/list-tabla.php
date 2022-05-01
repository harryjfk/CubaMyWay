<?php
if (isset($_REQUEST['nombre']))
{
    $dataset = new DSDatos();
    $t_usertableadapter= new t_usertableadapter();
    $t_usertableadapter->FillByID($dataset->t_user(), $_REQUEST['nombre']);

}
else
    $t_usertableadapter->FillDefault($dataset->t_user());
$t_roltableadapter = new t_rolTableAdapter();

$_SESSION['languages']->LoadFromPath(PHPDOTNETROOT.'modules/'.$_GET['module'].'/',$_SESSION['languages']->GetLang());

$_SESSION["ide"]->import("includes.helper");
?>
<div class="grid mtop5">
    <table class="tablelist" cellspacing="0" id="tblobjtemas">
        <tr class="theader">
            <td width="10px"><?php echo THelper::checkBox('chk', '', array('onclick="CheckAll(\'.itmchk\', this.checked);"'))?></td>
            <?php
            for ($i = 0; $i < $dataset->t_user()->Columns()->Count(); $i++)
                if ($dataset->t_user()->Columns()->GetItem($i)->AutoIncrement()==0){
                ?>
                <td><?php  echo  $_SESSION['languages']->GetString($dataset->t_user()->Columns()->GetItem($i)->Caption());?></td>
                <?php
            }
            ?>


        </tr>

        <?php
        for ($i = 0; $i < $dataset->t_user()->Count(); $i++):

            $user = $dataset->t_user()->Row($i);
            ?>

            <tr id="<?=$user->iduser()?>">
                <td><input type="checkbox" class="itmchk"/></td>
                <?php
                for ($k = 0; $k < $dataset->t_user()->Columns()->Count(); $k++)
                  if ($dataset->t_user()->Columns()->GetItem($k)->AutoIncrement()==0){
                    $field = $dataset->t_user()->Columns()->GetItem($k)->ColumnName();

                    ?>
                    <td>

                        <a href="<?php echo PHPDOTNETROOTLIVE . "modules/controller.php"?>?op=module&view=edit&module=user&lang=<?php echo $_REQUEST["lang"]?>&item=<?php echo $user->iduser();?>"
                           class="map rojooscuro tdn" rel="<?php echo $user ->iduser();?>">
                            <?php
if($field == "idrol")
{
    $dataset->t_rol()->Rows()->Clear();
 $t_roltableadapter->FillByID($dataset->t_rol(),$user->GetItem($field))   ;
    echo $dataset->t_rol()->Row(0)->namerol();

}else

                            echo $user->GetItem($field);

                            ?> </a>
                    </td>

                    <?php
                }
                ?>

                <td></td>
                <td><?php /*  $parent = $dataset->t_categoria()->GetById($cat->idparent());
        if($parent==null)
            echo "Raiz";
                else
                    echo $parent->namecategoria();*/
                    ?></td>
            </tr>

            <?php

        endfor;


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
        AjaxUpdate($this.attr('href'), 'update', 'frmguardar','<?php echo PHPDOTNETROOTLIVE;?>',errors);
        return false;
    });
</script>