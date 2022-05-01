<div class="modules">
<?php
    $_SESSION['ide']->import('includes.Common.Path');
    $files = TPath::FilesWithFolderName(ROOT . "modules/", 'config');

    ?>
    <div class="cb mt2p">

        <div class="w100p">
            <fieldset class="br5 p1p">
                <legend><input type="checkbox" id="chkbox" onclick="CheckAll('.mod', this.checked);"/> <?php echo $_SESSION['languages']->GetString("MODULES");?></legend>

                <?php
               /* $cnt = count($listModulos);
                $start = 1;
                $current = 1;
                foreach($listModulos as $modulo):
                    $idmodulo = $modulo->getPkIdmodulo();
                    $listVistas = $view->getVistas($idmodulo, $_REQUEST['idperfil']);
                    echo THelper::hidden('idmodule[]', $idmodulo);
                    ?>
                    <?php if($start == 1):?>
	     <div class="cb">
	   <?php endif; ?>
                    <fieldset class="br5 p1p fleft w47p <?php echo $start ==2 ? 'mleft1p': '';?>">
                        <legend><?php echo $modulo->getNombre()?></legend>

                        <div class="grid mtop5">
                            <table class="tablelist" cellspacing="0" id="tblobjtemas">
                                <tr class="theader">
                                    <td width="10px"><?php echo THelper::checkBox('chk', '', array('onclick="CheckAll(\'.chk'.$idmodulo.'\', this.checked);"'))?></td>
                                    <td><?php echo $txtVista?></td>
                                    <td><?php echo $txtDescripcion?></td>

                                </tr>
                                <?php foreach($listVistas as $view):
                                $checked = $view->get('idperfil') ? 'checked="checked"' : '';
                                $idview = $view->getPkIdvista();
                                ?>
                                <tr>
                                    <td><?php echo THelper::checkBox('views[]', $idview, array('class="chk'.$idmodulo.' mod"', $checked))?></td>
                                    <td><?php echo $view->getNombreVista()?></td>
                                    <td><?php echo $view->getDescripcion()?></td>
                                </tr>
                                <?php endforeach; ?>
                                <tr class="paginador">
                                    <td colspan="3"></td>
                                </tr>
                            </table>
                        </div>


                        <fieldset class="br5 p1p">
                            <legend><?php echo $txtAccionesEn.': '.$modulo->getNombre()?></legend>
                            <div class="grid mtop5">
                                <table class="tablelist" cellspacing="0" id="tblobjtemas">
                                    <tr class="theader">
                                        <td width="10px"><?php echo THelper::checkBox('chk', '', array('onclick="CheckAll(\'.chka'.$idmodulo.'\', this.checked);"'))?></td>
                                        <td><?php echo $txtaccion?></td>
                                        <td><?php echo $txtDescripcion?></td>

                                    </tr>
                                    <?php
                                    $listAcciones = $accion->getAcciones($idmodulo, $_REQUEST['idperfil']);
                                    foreach($listAcciones as $accion):
                                        $checked = $accion->get('idmodulo') ? 'checked="checked"' : '';
                                        $idaccion = $accion->getPkIdaccion();
                                        ?>
                                        <tr>
                                            <td><?php echo THelper::checkBox($idmodulo.'[]', $idaccion, array('class="chka'.$idmodulo.' mod"', $checked))?></td>
                                            <td><?php echo $accion->getAccion()?></td>
                                            <td><?php echo $accion->getDescripcion()?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <tr class="paginador">
                                        <td colspan="3"></td>
                                    </tr>
                                </table>
                            </div>
                        </fieldset>


                    </fieldset>

                    <?php if($start == 2 or $current >= $cnt): $start = 1?>
                    <div class="cb"></div>
		</div>
	   <?php else:
                    $start++;
                endif;?>
                    <?php
                    $current++;
                endforeach;?>

            </fieldset>
            <div class="cb"></div>
        </div>

        <div class="w100p ptop2p">
            <fieldset class="br5 p1p">
                <legend><input type="checkbox" id="chkboxt" onclick="CheckAll('.task', this.checked);"/> <?php echo $_SESSION['admlang']->get('ACL_CONTROLADORES')?></legend>

                <?php
                $cnt = count($listCtrls);
                $start = 1;
                $current = 1;
                foreach($listCtrls as $ctrl):
                    $idctrl = $ctrl->getPkIdcontrolador();
                    $listTasks = $task->getTasks($idctrl, $_REQUEST['idperfil']);
                    ?>
                    <?php if($start == 1):?>
	     <div class="cb">
	   <?php endif; ?>
                    <fieldset class="br5 p1p fleft w47p <?php echo $start ==2 ? 'mleft1p': '';?>">
                        <legend><?php echo $ctrl->getNombre()?></legend>

                        <div class="grid mtop5">
                            <table class="tablelist" cellspacing="0" id="tblobjtemas">
                                <tr class="theader">
                                    <td width="10px"><?php echo THelper::checkBox('chk', '', array('onclick="CheckAll(\'.chktask'.$idctrl.'\', this.checked);"'))?></td>
                                    <td><?php echo $txtTask?></td>
                                    <td><?php echo $txtDescripcion?></td>

                                </tr>
                                <?php foreach($listTasks as $task):
                                $checked = $task->get('idperfil') ? 'checked="checked"' : '';
                                $idtask = $task->getPkIdtask();
                                ?>
                                <tr>
                                    <td><?php echo THelper::checkBox('taskctrl[]', $idtask, array('class="chktask'.$idctrl.' task"', $checked))?></td>
                                    <td><?php echo $task->getNombre()?></td>
                                    <td><?php echo $task->getDescripcion()?></td>
                                </tr>
                                <?php endforeach; ?>
                                <tr class="paginador">
                                    <td colspan="3"></td>
                                </tr>
                            </table>
                        </div>

                    </fieldset>
                    <?php if($start == 2 or $current >= $cnt): $start = 1?>
                    <div class="cb"></div>
		</div>
	   <?php else:
                    $start++;
                endif;?>
                    <?php
                    $current++;
                endforeach;*/?>

            </fieldset>
            <div class="cb"></div>
        </div>

        <div class="cb"></div>
    </div>

</div>