<?php defined('JEXEC') or die('Restricted access');
include_once('../../config.php');
$_SESSION['languages']->LoadFromPath(ROOT_MODULES . $_REQUEST['module'] . '/config/', $_SESSION['languages']->GetLang());
$edit = !empty($_REQUEST['item']);
$dataset = new DSCubaMyWay();

if($edit)
    {
        $t_messages = new t_messagesTableAdapter();
        $t_messages->FillByID($dataset->t_messages(), $_REQUEST["item"]);
        $q = $dataset->t_messages()->Row(0);
    }
?>
<div class="questions-body">
    <div class="questions-panel">
        <?php if ($edit)
    if(  $q->idoriguser()!=$_SESSION["authuser"]["id"]){?>
        <a class="updtmsg btn-confirm"
           href="<?php echo LIVESITE.'controller/'.\UrlCrypt\UrlCrypt::encrypt('op=module&module=messages&view=view&user='.$q->idoriguser().'&lang='.$_SESSION["languages"]->GetLang()); ?>"><?php echo $_SESSION["languages"]->GetString("RESPONSE"); ?></a>
                          <?php }?>
        <a class="updtmsg btn-confirm"
            <?php
            $t= "2";
            if($edit)
            if($q->idoriguser()==$_SESSION["authuser"]["id"])
              $t= "1"; else $t="2"; else $t= "2";  ?>
           href="<?php echo LIVESITE.'controller/'.\UrlCrypt\UrlCrypt::encrypt('op=module&module=messages&view=list&msgtypes='.$t.'&lang='.$_SESSION["languages"]->GetLang()); ?>"><?php echo $_SESSION["languages"]->GetString("BACK"); ?></a>
    </div>
    <?php
    include(PHPDOTNETROOT . 'includes/helper.php');

    if($edit)
    {




        ?>

        <ul id="list"class="commentview">
            <?php //encabezado
            ?>
            <li class="ui-shadow">

                <div class="question-head ">
                    <img src="<?php     $t ="";
                        if($q->idoriguser()==$_SESSION["authuser"]["id"])
                            $t= "send";
                        else
                            $t= "received";


                        echo LIVESITE."assets/css/images/" .$t.".png" ?>"
                    <a><?php echo $q->topicmsg()."           (".$q->datemsg().")"; ?></a>
                    <p style="text-align: justify"><?php echo $q->textmsg(); ?></p>
                </div>
                <div class="question-user">
                    <div>
                        <img src="<?php
                            $t ="";
                            if($q->idoriguser()==$_SESSION["authuser"]["id"])
                                $t= $q->origuserpic();
                            else
                                $t= $q->destuserpic();



                            echo LIVE_USER_IMGS .$t; ?>">

                        <p><?php
                            $t ="";
                            if($q->idoriguser()==$_SESSION["authuser"]["id"])
                                $t= $q->destuser();
                            else
                                $t= $q->origuser();

                            echo $t ?></p>
                    </div>
                </div>
                <div class="cb"></div>
            </li>

            <?php

            ?>
        </ul>
            <?php if($q->statemsg()=="0")
    { ?>
       <script>
           <?php  if($q->iddestuser()==$_SESSION["authuser"]["id"]) {?>
           AjaxRequest('<?php echo LIVESITE.'controller/'.\UrlCrypt\UrlCrypt::encrypt('lang='.$_SESSION['languages']->GetLang().'&op=controller&dataset=DSCubaMyWay&dspath=DSCubaMyWay.Designer&table=t_messages&task=edit&item='.$_REQUEST["item"].'&statemsg=1&silent=true');?>', 'frm<?php echo $_REQUEST['module'];?>', function(j){AjaxJson(j);}, 'json','<?php echo PHPDOTNETROOTLIVE?>',errors);
                       <?php } ?>
       </script>
        <?php }
    }
    else
    { $dataset2 = new DSDatos();
       $t_usertableadapter = new t_userTableAdapter();
        $t_usertableadapter->FillDefault($dataset2->t_user());
        $i=0;
       while ($i<$dataset2->t_user()->Count())
           if($dataset2->t_user()->Row($i)->iduser()===$_SESSION["authuser"]["id"])
           {
           $dataset2->t_user()->Rows()->Remove($i)    ; break;
           }
           else
               $i++;

        ?>
         <form id="frm<?php echo $_REQUEST['module'];?>" name="frm<?php echo $_REQUEST['module'];?>" method="post"
              enctype="multipart/form-data" target="ifrmimages"
              action="<?php echo LIVESITE.'controller/'.\UrlCrypt\UrlCrypt::encrypt('op=controller&dataset=DSCubaMyWay&dspath=DSCubaMyWay.Designer&table=t_messages&task=add&lang='.$_SESSION['languages']->GetLang().'&idoriguser='.$_SESSION["authuser"]["id"].'&file=none&fn=Update();')?>">
            <div class="archivos" style="width: 99%;">
                <fieldset class="br5 fieldset">

                    <div class="cb mt1p">
                        <?php

                        ?>
                        <div class="fielditem">
                            <label for="topicmsg"
                                   class=""><?php echo $_SESSION['languages']->GetString("topicmsg"); ?>
                                :</label>

                            <div style=" text-align:left;">
                                <?php
                                echo THelper::textBox("topicmsg",'',[]);
                                ?></div>

                        </div>
                        <div class="fielditem">
                            <label for="iddestuser"
                                   class=""><?php echo $_SESSION['languages']->GetString("iddestuser"); ?>
                                :</label>

                            <div style=" text-align:left;">
                                <?php
                                   $t= "";
                                   if(!empty($_REQUEST["user"]))
                                       $t =  $_REQUEST["user"];
                               echo THelper::selectObject2("iddestuser", $dataset2->t_user()->Rows(), 'iduser', 'nameuser', null, $t, false, array('class="w100p"', null));

                                ?></div>

                        </div>
                        <div class="cb"></div>
                        <div class="fielditem">
                            <label for="textmsg"
                                   class=""><?php echo $_SESSION['languages']->GetString("textmsg"); ?>
                                :</label>

                            <div style=" text-align:left;">
                                <?php
                                echo THelper::textarea("area", "", '', 8, array('style="width:99%;height:60%"'));
                                ?></div>

                        </div>


                        <?php

                        //   echo  $_SESSION["authuser"]["id"];
                        echo   THelper::hidden("iduser",$_SESSION["authuser"]["id"]);
                        echo   THelper::hidden("idcomment",$_REQUEST["item"]);

                        ?>

                        <div class="cb"></div>
                    </div>


                    <div class="cb tc mt2p">
                        <?php
                        echo THelper::submit('guardar', $_SESSION['languages']->GetString('SEND'), array('class="btn-confirm"'));
                        ?>
                    </div>

                    <?php //echo THelper::hidden('item[]', $_REQUEST['item'][0]);?>

                </fieldset>
                <iframe id="ifrmimages" name="ifrmimages" style="display:none ;"></iframe>

                <div class="cb"></div>
            </div>
        </form>










        <?php   }
    ?>



</div>

    <?php if (!$edit)
{     ?>

<script type="text/javascript">

    function Update()
    {//   var s =  tinyMCE.activeEditor.setContent()
        //tinyMCE.activeEditor.setContent('');
        <?php
        $t= "2";
        if($edit)
            if($q->idoriguser()==$_SESSION["authuser"]["id"])
                $t= "1"; else $t="2"; else $t= "2";  ?>
        AjaxUpdate("<?php echo LIVESITE.'controller/'.\UrlCrypt\UrlCrypt::encrypt('op=module&module=messages&view=list&msgtypes='.$t.'&lang='.$_SESSION["languages"]->GetLang()); ?>", 'updatemsgpanel', '', '<?php echo LIVESITE;?>',errors);
    }
    $(function () {
        //   alert('a');
        $('#frm<?php echo $_REQUEST['module'];?>').validate({
            rules:{
                'topicmsg': {required:true},
                'textmsg':{required:true}

            },
            messages:{
                'topicmsg':{required:'<?php echo $_SESSION['languages']->GetString("FIELD_REQUIRED");?>'}
                ,
                'textmsg':{required:'<?php echo $_SESSION['languages']->GetString("FIELD_REQUIRED");?>'}

            },
            debug:true,
            errorElement:'div',
            submitHandler:function (form) {
                if(tinyMCE.activeEditor.getContent()=='')
                    alert('<?php echo $_SESSION['languages']->GetString("FIELD_REQUIRED")?>') ;
                else
                {
                    var t = "2015-04-02";

                    // if (textresponse.value=="")
                    //          textresponse.value = tinyMCE.activeEditor.getContent();
                    form.action = form.action +"&datemsg="+t+"&textmsg="+tinyMCE.activeEditor.getContent();

                    form.submit();
                }
            }
        });

    });
    tinyMCE.init({
        // General options
        mode:"textareas",
        theme:"advanced",
        plugins:"pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

        // Theme options
        theme_advanced_buttons1:"save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2:"cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3:"tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4:"insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
        theme_advanced_toolbar_location:"top",
        theme_advanced_toolbar_align:"left",
        theme_advanced_statusbar_location:"bottom",
        theme_advanced_resizing:true,

        // Example content CSS (should be your site CSS)
        //content_css : "css/content.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url:"lists/template_list.js",
        external_link_list_url:"lists/link_list.js",
        external_image_list_url:"lists/image_list.js",
        media_external_list_url:"lists/media_list.js",

        // Style formats
        style_formats:[
            {title:'Bold text', inline:'b'},
            {title:'Red text', inline:'span', styles:{color:'#ff0000'}},
            {title:'Red header', block:'h1', styles:{color:'#ff0000'}},
            {title:'Example 1', inline:'span', classes:'example1'},
            {title:'Example 2', inline:'span', classes:'example2'},
            {title:'Table styles'},
            {title:'Table row 1', selector:'tr', classes:'tablerow1'}
        ],

        // Replace values for the template plugin
        template_replace_values:{
            username:"Some User",
            staffid:"991234"
        }
    });

</script>




        <?php
}
    ?>

<script type="text/javascript">

    $(function () {
        $('a.updtmsg').bind('click', function () {
            var $this = $(this);
            AjaxUpdate($this.attr('href'), 'updatemsgpanel', '', '<?php echo LIVESITE;?>',errors);

            return false;
        });


    });

</script>
