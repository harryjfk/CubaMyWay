
<html>
<head>
    <?php include('../config.php');?>
    <?php
    if (isset($_SESSION["authuser"]))
     if($_SESSION["authuser"]["acl"]=="2")
    die("Restricted access");

    ?>
    <link rel="shortcut icon" href="<?php echo PHPDOTNETROOTLIVE;?>assets/css/favicon.png" type="image/png"/>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title> <?php echo  str_replace('%s', PROJECTNAME, $_SESSION['languages']->GetString('GEN_TITLE')); ?></title>
    <?php include('import.php');?>
  </head>
<body>

<div class="main br5">
    <div class="title">
        <p><?php echo  str_replace('%s', PROJECTNAME, $_SESSION['languages']->GetString('GEN_TITLE')); ?></p>
        <?php if (isset($_SESSION["authuser"])) {

        ?>
        <ul>
            <li><?php echo   $_SESSION["authuser"]['name'];?></li>
            <li>
                <a href="<?php echo PHPDOTNETROOTLIVE . 'modules/Controller.php?op=logout&redirect=' . LIVESITE . $_SESSION['languages']->GetLang() . '/admin'; ?>"><?php echo $_SESSION['languages']->GetString('LOGOUT'); ?>
                    <a></li>
        </ul>
        <?php } ?>
    </div>

    <div class="body">
        <?php
        if (!isset($_SESSION["authuser"]))
            include (PHPDOTNETROOT . 'modules/user/login.php');
        else {

            $module = 'email';
            if (isset($_REQUEST['module']))
                $module = $_REQUEST['module'];
            $view = 'list';
            if (isset($_REQUEST['view']))
                $view = $_REQUEST['view'];
            ?>
            <div class="menu">
                <ul id="itemlist">

                    <li class=" <?php if ($module == 'email')  {echo "selected";}?>
    "><a class="updt"
         href="<?php echo PHPDOTNETROOTLIVE; ?>modules/controller.php?op=module&config=true&module=email&view=index&lang=<?php echo $_REQUEST["lang"]?>"><?php echo $_SESSION['languages']->GetString('EMAIL'); ?></a>

                    </li>
                    <li class=" <?php if ($module == 'user')  {echo "selected";}?>
    "><a class="updt"
         href="<?php echo PHPDOTNETROOTLIVE; ?>modules/controller.php?op=module&config=true&module=user&view=list&lang=<?php echo $_REQUEST["lang"]?>"><?php echo $_SESSION['languages']->GetString('USERS'); ?></a>

                    </li>
                    <li class=" <?php if ($module == 'profile')  {echo "selected";}?>

    "><a class="updt"
         href="<?php echo PHPDOTNETROOTLIVE; ?>modules/controller.php?op=module&config=true&module=profile&view=list&lang=<?php echo $_REQUEST["lang"]?>"> <?php echo $_SESSION['languages']->GetString('PROFILE'); ?></a>

                    </li>

                    <?php
                    $_SESSION["ide"]->import("includes.Common.Path");
                    $s = TPath::FilesWithFolderName(ROOT_MODULES, "config");
                    $a = array();


                for ($i = 0; $i < $s->Count(); $i++)
                    {
        $t = TPath::GetDirectory(dirname(dirname($s->GetItem($i))).'/',false);
                       if(array_key_exists($t,$a))
                       {if($a[$t]=="")
                           $a[$t]=TPath::GetDirectory(dirname(dirname($s->GetItem($i))).'/',true);
                       }
                   else         $a[$t]=TPath::GetDirectory(dirname(dirname($s->GetItem($i))).'/',true);
                    }
                   foreach ($a as $key =>$value)
                   {
                       $_SESSION['languages']->LoadFromPath($value.'/config/',$_SESSION['languages']->GetLang());
                 //echo $_SESSION['languages']->Files()->Count();
                       ?>

                       <li ><a class="updt"
         href="<?php echo PHPDOTNETROOTLIVE; ?>modules/controller.php?op=module&config=true&module=<?php echo $key; ?>&view=list&lang=<?php echo $_REQUEST["lang"]?>"> <?php   echo $_SESSION['languages']->GetString(strtoupper($key)); ?></a>

                       </li>
                       <?php


                   }
                    ?>
                </ul>
            </div>
                 <div id="update">
            <?php
            $_GET['module'] = $module;
            $_SESSION['ide']->import('modules.' . $module . '.' . $view);
        }?>
    </div>

    <div class="footer">Visual Ways 2015 ® - <?php echo $_SESSION['languages']->GetString('GEN_RIGHTS'); ?></div>
</div> </div>

</body>
</HTML>
<script type="text/javascript">

    var errors = <?php echo $_SESSION["languages"]->GetErrorsAsJson();?>;
    $(document).ready(function () {
        $('a.updt').bind('click', function () {
            var $this = $(this);

          for(i=0;i<itemlist.childNodes.length;i++ )
              if(itemlist.childNodes.item(i).nodeType==1 && itemlist.childNodes.item(i).classList.contains("selected"))
                  itemlist.childNodes.item(i).classList.remove("selected");

this.parentNode.classList.add("selected");

           AjaxUpdate($this.attr('href'), 'update', '', '<?php echo PHPDOTNETROOTLIVE;?>',errors);
            return false;
        });

    });
</script>
