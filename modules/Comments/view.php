<?php defined('JEXEC') or die('Restricted access');

include_once("../../config.php");
include("../../langsetter.php");
$_SESSION['languages']->LoadFromPath(ROOT_MODULES . $_REQUEST['module'] . '/config/', $_SESSION['languages']->GetLang());

?>

<div class="questions-body">
<div class="questions-panel">
    <a class="updt btn-confirm"
       href="<?php echo LIVESITE.'controller/'.\UrlCrypt\UrlCrypt::encrypt('op=module&module=comments&view=index&lang='.$_SESSION["languages"]->GetLang());    ?>"><?php echo $_SESSION["languages"]->GetString("BACK"); ?></a>
</div>
<?php
include(PHPDOTNETROOT . 'includes/helper.php');
$dataset = new DSCubaMyWay();
$edit = !empty($_REQUEST['item']);

if($edit)
{
    $t_comments = new t_commentTableAdapter();
    $t_comments->FillByID($dataset->t_comment(), $_REQUEST["item"]);
    $q = $dataset->t_comment()->Row(0);




?>

<ul id="list"class="commentview">
    <?php //encabezado
    ?>
    <li class="ui-shadow">

        <div class="question-head ">
            <img src="<?php echo LIVESITE?>assets/css/images/comment.png">
            <a><?php echo $q->topiccomment(); ?></a>
            <p style="text-align: justify"><?php echo $q->textcomment(); ?></p>
        </div>
        <div class="question-user">
            <div>
                <img src="<?php echo LIVE_USER_IMGS .$q->  pictureuser(); ?>">

                <p><?php echo $q->nameuser(); ?></p>
            </div>
        </div>
        <div class="cb"></div>
    </li>

    <?php

    ?>
</ul>

      <?php }
    else
    {   ?>

        <link href="<?php echo PHPDOTNETROOTLIVE;?>assets/css/jquery/jquery.ui.all.css" rel="stylesheet" type="text/css"/>
        <form id="frm<?php echo $_REQUEST['module'];?>" name="frm<?php echo $_REQUEST['module'];?>" method="post"
              enctype="multipart/form-data" target="ifrmimages"
              action="<?php echo PHPDOTNETROOTLIVE?>DSDatosHelper.php?params=<?php echo \UrlCrypt\UrlCrypt::encrypt('op=controller&dataset=DSCubaMyWay&dspath=DSCubaMyWay.Designer&table=t_comment&task=add&lang='.$_SESSION['languages']->GetLang().'&file=none&fn=Update();');?>">
            <div class="archivos">
                <fieldset class="br5 fieldset">
                    <legend><?php echo $tit  ?></legend>
                    <div class="cb mt1p">
                        <?php

                        ?>
                        <div class="fielditem">
                            <label for="topiccomment"
                                   class=""><?php echo $_SESSION['languages']->GetString("topiccomment"); ?>
                                :</label>

                            <div style=" text-align:left;">
                                <?php
                                echo THelper::textBox("topiccomment",'',[]);
                                ?></div>

                        </div>
                        <div class="fielditem">
                            <label for="textcomment"
                                   class=""><?php echo $_SESSION['languages']->GetString("textcomment"); ?>
                                :</label>

                            <div style=" text-align:left;">
                                <?php
                                echo THelper::textarea("area", "", '', 8, array('style="width:99%;height:65%"'));
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
                        echo THelper::submit('guardar', $_SESSION['languages']->GetString('SAVE'), array('class="btn-confirm"'));
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


<script type="text/javascript">

    function Update()
    {//   var s =  tinyMCE.activeEditor.setContent()
        //tinyMCE.activeEditor.setContent('');
        AjaxUpdate("<?php echo LIVESITE.'controller/'.  \UrlCrypt\UrlCrypt::encrypt(   'op=module&module=comments&view=index&lang='. $_SESSION["languages"]->GetLang()); ?>", 'update', '', '<?php echo LIVESITE;?>',errors);
    }
    $(function () {
        //   alert('a');
        $('#frm<?php echo $_REQUEST['module'];?>').validate({
            rules:{
                'topiccomment': {required:true},
                'textcomment':{required:true}

            },
            messages:{
                'topiccomment':{required:'<?php echo $_SESSION['languages']->GetString("FIELD_REQUIRED");?>'}
,
                'textcomment':{required:'<?php echo $_SESSION['languages']->GetString("FIELD_REQUIRED");?>'}

            },
            debug:true,
            errorElement:'div',
            submitHandler:function (form) {
                if(tinyMCE.activeEditor.getContent()=='')
                    alert('<?php echo $_SESSION['languages']->GetString("FIELD_REQUIRED")?>') ;
                else
                {
                    // if (textresponse.value=="")
                    //          textresponse.value = tinyMCE.activeEditor.getContent();
                    form.action = form.action +"&textcomment="+tinyMCE.activeEditor.getContent();

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
<script type="text/javascript">

    $(function () {
        $('a.updt').bind('click', function () {
            var $this = $(this);
            AjaxUpdate($this.attr('href'), 'update', '', '<?php echo LIVESITE;?>',errors);

            return false;
        });


    });

</script>