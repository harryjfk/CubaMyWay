<?php
include_once('../../config.php');
$dataset = new DSCubaMyWay();
$_SESSION['languages']->LoadFromPath(ROOT_MODULES . $_REQUEST['module'] . '/config/', $_SESSION['languages']->GetLang());

$edit =false;

  if(!empty($_REQUEST["msgtypes"]))
  {
      $r = $_REQUEST["msgtypes"];
 $edit =  $_REQUEST["msgtypes"] =1;

  }
else
    $r = 2;


$t_messagestableadapter = new t_messagesTableAdapter();
$t_messagestableadapter->FillBy1($dataset->t_messages(),$_SESSION["authuser"]["id"],$r);

?>
<ul class="msgbuttons">
    <li>            <a class="updtmsg" href="<?php echo LIVESITE.'controller/'.\UrlCrypt\UrlCrypt::encrypt('op=module&view=view&module=messages&lang='.$_SESSION['languages']->GetLang());?>" class="action"><i class="icon-plus-sign"></i><?php echo $_SESSION['languages']->GetString('SEND');?></a></li>
    <li>           <a href="<?php echo LIVESITE.'controller/'.\UrlCrypt\UrlCrypt::encrypt('op=controller&dataset=DSCubaMyWay&dspath=DSCubaMyWay.Designer&table=t_messages&task=delete&lang='.$_SESSION['languages']->GetLang());?>" class="deletemsg">  <i class="icon-trash"></i><?php echo $_SESSION['languages']->GetString('DELETE');?></a></li>

</ul>
<div class="msgbody ui-shadow">
    <ul>
        <?php
         for($i=0;$i<$dataset->t_messages()->Count();$i++)
         {
             $row = $dataset->t_messages()->Row($i);

             ?>
             <li class="ui-shadow" style="overflow: hidden;"  id="<?=$row->idmessages()?>">
                 <div class="msg-head ">

                     <input type="checkbox" class="itmchk"/>       <a class="updtmsg <?php if($row->statemsg()==0) echo "unread"; else echo "read";?>" href="<?php echo  LIVESITE.'controller/'.\UrlCrypt\UrlCrypt::encrypt('op=module&module=messages&item='.$row->idmessages().'&view=view&lang='.$_SESSION["languages"]->GetLang()); ?>"> <?php echo $row->topicmsg();?></a>


                 </div>
                 <div class="msg-user">
                     <div>

                         <a><?php if($edit)echo $row->destuser(); else echo $row->origuser()?></a>
                     </div>
                 </div>

             </li>
             <?php  }
        ?>



    </ul>

</div>
<script type="text/javascript">

    $(function () {
        $('a.updtmsg').bind('click', function () {
            var $this = $(this);

            AjaxUpdate($this.attr('href'), 'updatemsgpanel', '', '<?php echo LIVESITE;?>',errors);

            return false;
        });


    });
    $('a.deletemsg').bind('click', function(e){

        var $this = $(this);

        algunSeleccionado('.itmchk:checked', '<?php echo $_SESSION['languages']->GetString('NONE_SELECTED'); ?>', function(first)
        {

           if(confirm('<?php echo  $_SESSION['languages']->GetString('DELETE_CONFIRM'); ?>'))

               AjaxRequest($this.attr('href')+'&item='+first.parentNode.parentNode.id, 'frmguardar', function(j){AjaxJson(j);},'json','<?php echo PHPDOTNETROOTLIVE;?>',errors);
        });

        return false;
    });

</script>