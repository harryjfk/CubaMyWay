<html>
<head>
    <?php include('config.php');?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title> <?php echo PROJECTNAME;?></title>
 <?php include_once("import.php"); ?>
</head>
<body style="background-color: #257ADE;">
<div class="top">


</div>
<div class="cb"></div>

<div class="main br5">

    <div class="body br5">
        <div class="" >
            <div class="imgbanner" >
            <img src="<?php echo LIVESITE."/assets/css/images/left-orig.png"?>" width="130px">
</div>
            <div class="imgbanner" >
                <ul  style="text-align: center;margin-top: 15%;">
                    <li> <a href="<?php echo LIVESITE.'en' ?>"><img src="assets/css/images/english.ico"></a>
                    </li>
                    <?php if (isset($_SESSION["authuser"])) {
                    ?>

                    <li class = "li-button"><a class="updt none" href="<?php echo LIVESITE . 'controller/'.\UrlCrypt\UrlCrypt::encrypt('op=module&module=user&view=profile&lang=' . $_SESSION['languages']->GetLang().'&otherpages=Messages:index');?>"><?php echo   $_SESSION["authuser"]['name'];?>
                            <a></li>
                    <?php } else
                    {?>
                        <li class = "li-button"><a class="updt none" href="<?php echo LIVESITE . 'controller/'.\UrlCrypt\UrlCrypt::encrypt('op=module&module=user&view=login&url='.LIVESITE.'&lang=' . $_SESSION['languages']->GetLang() . ''); ?>"><?php echo $_SESSION['languages']->GetString('LOGIN_TITLE'); ?>
                                <a></li>
                   <?php } ?>
                </ul>
                </div>
            <div class="imgbanner" style ="padding-top:5px;">
            <img  src="<?php echo LIVESITE."/assets/css/images/OTRA VARIANTE.png"?>" height="128px">
                </div>
            <div class="imgbanner">
                <ul  style="text-align: center;margin-top: 15%; margin-left: 5%">
                    <li> <a href="<?php echo LIVESITE.'es' ?>"><img src="assets/css/images/spanish.ico"></a></li>
                    <?php if (isset($_SESSION["authuser"])) {
                        ?>

                        <li class = "li-button">
                            <a class="updt none" href="<?php echo LIVESITE . 'controller/'.\UrlCrypt\UrlCrypt::encrypt('op=logout&redirect=' . LIVESITE .'&lang='. $_SESSION['languages']->GetLang() . ''); ?>"><?php echo $_SESSION['languages']->GetString('LOGOUT'); ?>
                                <a></li>

                    <?php }
                    else
                    { ?>


                        <li class = "li-button">
                            <a class="updt none" href="<?php echo LIVESITE . 'controller/'.\UrlCrypt\UrlCrypt::encrypt('op=module&module=user&view=profile&url='.LIVESITE.'&lang=' . $_SESSION['languages']->GetLang() . ''); ?>"><?php echo $_SESSION['languages']->GetString('REGISTER_TITLE'); ?>
                                <a></li>


                    <?php } ?>
                </ul>
            </div>

            <div style="width:20%; float: left;">
            <img align="right" src="<?php echo LIVESITE."/assets/css/images/right-orig.png"?>" width="100px">
            </div>
        </div>
        <div class="cb"></div>
        <div class="">
            We design your trip.

        </div>
        <div class="menu">
            <ul id="itemlist">
                <li class="br5 selected"><a class="updt" href="<?php echo LIVESITE.'controller/'.\UrlCrypt\UrlCrypt::encrypt('op=index&lang=' . $_SESSION['languages']->GetLang());?>"><?php echo $_SESSION['languages']->GetString('HOME'); ?></a></li>

                <?php

               $module="";
                if(array_key_exists("module",$_REQUEST))
                    $module=$_REQUEST["module"];
                $_SESSION["ide"]->import("includes.Common.Path");
                $r =  TPath::ChildFolders(ROOT_MODULES);

                for($i=0;$i<$r->Count();$i++)
                    if($r->GetItem($i)!='languages'&& $r->GetItem($i)!='user' &&$r->GetItem($i)!='Messages'&&$r->GetItem($i)!='Places'&&$r->GetItem($i)!='TripTypes')
                    {


                        $n = new Language(ROOT_MODULES.$r->GetItem($i).'/config/',$_SESSION['languages'] ->GetLang());

                        ?>
                        <li class="br5 <?php if ($n->GetString(strtoupper($r->GetItem($i))) === $module)
                        { echo "selected";}?>"><a class="<?php echo $n->GetString("CLASSNAME");?>"
                                href="<?php
                            if($n->GetString("CLASSNAME")=="updt")
                            {echo LIVESITE.'controller/'.\UrlCrypt\UrlCrypt::encrypt('op=module&module='.$r->GetItem($i).'&view=index&lang='.$_SESSION['languages']->GetLang()); ?>"><?php echo $n->GetString(strtoupper($r->GetItem($i))); ?></a>
<?php } else { echo LIVESITE.$_SESSION['languages'] ->GetLang().'/'.$n->GetString("PAGE"); ?>"><?php echo $n->GetString(strtoupper($r->GetItem($i))); ?></a> <?php } ?>
                        </li>
                        <?php
                        unset($n);
                    }
                 ?>
            </ul>
        </div>
        <div id="update" class="updatepanel">
            <?php
            include('innerindex.php');
        ?>
        </div>
    </div>
    <div class="cb"></div>
    <div class="footer">Cuba My Way 2015 ® - <?php echo $_SESSION['languages']->GetString('GEN_RIGHTS'); ?></div>
</div>

</body>
</html>
<script type="text/javascript">
    var errors = <?php echo $_SESSION["languages"]->GetErrorsAsJson();?>;

    $(document).ready(function () {
        $('a.updt').bind('click', function () {
            var $this = $(this);

                for (i = 0; i < itemlist.children.length; i++)

                itemlist.children[i].classList.remove("selected");

            if (!this.classList.contains("none"))
                this.parentNode.classList.add("selected");

            AjaxUpdate($this.attr('href'), 'update', '', '<?php echo LIVESITE;?>',errors);
            return false;
        });
        $('a.new').bind('click', function () {

            document.location.href =($(this)).href;
            /* var $this = $(this);


             for (i = 0; i < itemlist.children.length; i++)

                 itemlist.children[i].classList.remove("selected");


             this.parentNode.classList.add("selected");
             // alert();
             //this.stylesheet.addRule("a");
             AjaxUpdate($this.attr('href'), 'update', '', '<?php echo PHPDOTNETROOTLIVE;?>');
            return false;*/
        });

        $('a.fn').bind('click', function () {
            var $this = $(this);
           // var errors = <?php echo $_SESSION["languages"]->GetErrorsAsJson();?>;
            AjaxRequest($this.attr('href'), '', function (j) {
                AjaxJson(j);
            }, 'json',errors);
            return false;
        });
    });
</script>