<?php
include("../../langsetter.php");
$_SESSION["languages"]->LoadFromPath(ROOT_MODULES . 'Comments/config/', $_SESSION["languages"]->GetLang());
include_once("../../config.php");

$dataset = new DSCubaMyWay();
?>
         <div class="questions-body">
<div class="questions-panel">

 <?php if(isset($_SESSION["authuser"]))
{?>
    <a class="updt btn-confirm"
       href="<?php echo LIVESITE.'controller/'.\UrlCrypt\UrlCrypt::encrypt('op=module&module=comments&view=view&task=add&lang='.$_SESSION["languages"]->GetLang()); ?>"><?php
            echo $_SESSION["languages"]->GetString("NEW").' '.$_SESSION["languages"]->GetString("COMMENT");
        ?></a>
    <?php }?>
</div>

<?php
$t_commentstableadapter = new t_commentTableAdapter();
$t_commentstableadapter->FillByID($dataset->t_comment(),-1);
?>
<ul>
    <?php
    for($i=0;$i<$dataset->t_comment()->Count();$i++)
    {
        $row = $dataset->t_comment()->Row($i);

        ?>
        <li class="ui-shadow">
            <div class="question-head ">
                <img src="<?php echo LIVESITE?>assets/css/images/comment.png">
                <a class="updt" href="<?php echo LIVESITE.'controller/'.\UrlCrypt\UrlCrypt::encrypt('op=module&module=comments&item='.$row->idcomment().'&view=view&lang='.$_SESSION["languages"]->GetLang());?>"> <?php echo $row->topiccomment();?></a>

                <p><?php echo $row->textcomment();?> </p>
            </div>
            <div class="question-user">
                <div>
                    <img src="<?php echo LIVE_USER_IMGS ?><?php echo $row->pictureuser();?>">

                    <p><?php echo $row->nameuser();?></p>
                </div>
            </div>

        </li>
        <?php  }
    ?>



</ul>

         </div>
<script type="text/javascript">

    $(function () {
        $('a.updt').bind('click', function () {
            var $this = $(this);
            AjaxUpdate($this.attr('href'), 'update', '', '<?php echo LIVESITE;?>',errors);

            return false;
        });


    });

</script>