<?php
include_once('../../../config.php');
$_SESSION['languages']->LoadFromPath(ROOT_MODULES.'Places/config/',$_SESSION['languages']->GetLang());
include_once(PHPDOTNETROOT.'includes/helper.php');
$edit = !empty($_REQUEST['item']);
if ($edit)
{
    $dataset = new DSCubaMyWay();
 $toursadapter = new t_tourpoloTableAdapter();
  $toursadapter->FillByID($dataset->t_tourpolo(),$_REQUEST['item']);
    $r = $dataset->t_tourpolo()->Row(0);
}

?>

<div style="height: 400px; width:600px">
    <?php// echo $_REQUEST['item'];?>
    <form id="frmpolo" name="frmpolo" method="post"
          enctype="multipart/form-data" target="ifrmimages"  action="<?php echo LIVESITE;?>imagecreator.php?lang=<?php echo $_SESSION['languages']->GetLang(); ?>&dataset=DSCubaMyWay&dspath=DSCubaMyWay.Designer&tableimg=t_poloimages&tableparent=t_tourpolo&task=add&itemp=idtourpolo&itemc=idtour&pathf=pathimage<?php if($edit) echo "&item=".$_REQUEST["item"]; ?>">
    <div class="tpolo">
        <h1><?php
            if($edit)
                echo $_SESSION['languages']->GetString('EDIT_PLACES');
            else
                echo $_SESSION['languages']->GetString('ADD_PLACES');?></h1>
        <label for="namepolo"><?php echo $_SESSION['languages']->GetString('namepolo');?>:</label>
        <input id="namepolo" name="namepolo" type="text" value="<?php if($edit) echo $r->namepolo(); ?>">
        <div class="cb"></div>
        <label for="descpolo"><?php echo $_SESSION['languages']->GetString('descpolo');?>:</label>
        <input id="descpolo" name="descpolo" type="text" value="<?php if($edit) echo $r->descpolo(); ?>">
    </div>

    <div class="bpolo">
        <p ><?php echo $_SESSION['languages']->GetString('images');?></p>
        <div class="bpolog">

        <ul>
          <?php
        if($edit)
        {
            $imagesadapter = new t_poloimagesTableAdapter();
            $imagesadapter->FillBy($dataset->t_poloimages(),$_REQUEST["item"]);
            for($i= 0;$i<$dataset->t_poloimages()->Count();$i++)
            {
            ?>
            <li>                <input type="checkbox" name="itemima[]" value="<?php echo $dataset->t_poloimages()->Row($i)->idimage()?>" class="abs itmima" style="left:5px; top:5px; z-index:10;"/>
                <img src="<?php echo LIVE_USER_IMGS.$dataset->t_poloimages()->Row($i)->pathimage();?>"></li>


                <?php } } ?>
        </ul></div>
        <div class="btimages">

                    <?php
                    echo THelper::file('imgs1',["onchange=changeimg(event)","style='width:90%; margin:2%;'"]);
                    echo THelper::file('imgs2',["onchange=changeimg(event)","style='width:90%; margin:2%;'"]);
            echo THelper::file('imgs3',["onchange=changeimg(event)","style='width:90%; margin:2%;'"]);
            echo THelper::file('imgs4',["onchange=changeimg(event)","style='width:90%; margin:2%;'"]);
            echo THelper::file('imgs5',["onchange=changeimg(event)","style='width:90%; margin:2%;'"]);
            echo THelper::file('imgs6',["onchange=changeimg(event)","style='width:90%; margin:2%;'"]);
            echo THelper::file('imgs7',["onchange=changeimg(event)","style='width:90%; margin:2%;'"]);
            echo THelper::file('imgs8',["onchange=changeimg(event)","style='width:90%; margin:2%;'"]);



            //  echo THelper::button('add', $_SESSION['languages']->GetString('ADD'),array('class="btn-confirm"'));
                      if($edit)
                          if($dataset->t_poloimages()->Count()>0)
                              echo THelper::button('delete', $_SESSION['languages']->GetString('DELETE'),array('class="btn-confirm"'));
                  ?>



        </div>
    </div>

    <div class="cb"></div>
    <div class="btpolo">
        <?php

        echo THelper::submit('guardar', $_SESSION['languages']->GetString('SAVE'),array('class="btn-confirm"'));
     if($edit)
        echo THelper::button('eliminar', $_SESSION['languages']->GetString('DELETE'),array('class="btn-confirm"'));

        echo THelper::button('cancelar', $_SESSION['languages']->GetString('CANCEL'),array('class="btn-confirm"'));
        ?>

    </div>
        <iframe id="ifrmimages" name="ifrmimages" style="display:none;"></iframe>

        <div class="cb"></div>
    </form>
</div>

    <script>

       var files = new FilesChecker();
        function changeimg(e)
        {

      if(!files.IsImg(e.srcElement.value))

          {    alert("<?php echo $_SESSION["languages"]->GetString("UPLOAD_ERROR_ONLY_IMAGES");?>")
              e.srcElement.value = null;     }

        }
       <?php if(!$edit)
{?>
       function AddMarker(id)
       {
           map.addMarker(map.getmarkerslength(), {latLng:<?php echo $_REQUEST["data"];?>,name:namepolo.value,item:id});
       }
       <?php } ?>
        $(function(){
            //alert("a");
            $('#frmpolo').validate({
                rules: {
                    'namepolo': {required:true},
                    'descpolo': {required:true}
                },
                messages: {
                    'namepolo': {required:'<?php  echo $_SESSION['languages']->GetString("FIELD_REQUIRED");?>'}  ,
                    'descpolo': {required:'<?php  echo $_SESSION['languages']->GetString("FIELD_REQUIRED");?>'}

                },
                debug: true,
                errorElement: 'div',
                submitHandler: function(form){


                 var data = $('#frmpolo').serialize();
                    <?php if(!$edit)
{?>
             data=data+"&datapolo=<?php echo $_REQUEST["data"]; ?>";  <?php }?>


              AjaxRequest('<?php echo PHPDOTNETROOTLIVE.'';?>DSDatosHelper.php?lang=<?php echo $_SESSION['languages']->GetLang(); ?>&op=controller&dataset=DSCubaMyWay&dspath=DSCubaMyWay.Designer&table=t_tourpolo&task=<?php if($edit) echo "edit&item=".$_REQUEST["item"];else echo "add";?>&'+data, 'frmpolo', function(j){

                        AjaxJson(j);

            if(  $('#sh-ok')!=null)
                  {
                    <?php if(!$edit) {?>

                //   map.markers[map.mar]   map.markerIndex += 1;
                      <?php }
                  else {?>

                  map.markers[<?php echo $_REQUEST["code"];?> ].name=namepolo.value;

                      <?php } ?>



                   form.submit();
                   /*   if(Updateimages())
                      alert("a"); */

                   $('#popupwindow').hide();

                  }
                    } , 'json','<?php echo PHPDOTNETROOTLIVE?>',errors);
               }
            });
           $('#cancelar').bind('click', function () {


                $('#popupwindow').hide();
            });
            <?php if ($edit) {?>
            $('#eliminar').bind('click', function () {
                //alert("a");
                var data = "item=<?php echo $_REQUEST["item"];?>";
                if(confirm('<?php echo  $_SESSION['languages']->GetString('DELETE_CONFIRM'); ?>'))

                   AjaxRequest('<?php echo PHPDOTNETROOTLIVE.'';?>DSDatosHelper.php?lang=<?php echo $_SESSION['languages']->GetLang(); ?>&op=controller&dataset=DSCubaMyWay&dspath=DSCubaMyWay.Designer&table=t_tourpolo&task=delete&'+data, 'frmpolo', function(j){

                       AjaxJson(j);
                       if(  $('#sh-ok')!=null)
                       {
                           map.removeMarker(<?php echo $_REQUEST["code"];?>) ;

                       $('#popupwindow').hide();
                       }
                   },'json','<?php echo PHPDOTNETROOTLIVE;?>',errors);

            })   ;
                                 <?php }?>
<?php if ($edit) if($dataset->t_poloimages()->Count()>0) {?>
    $('#delete').bind('click', function () {
        var $this = $(this);
        algunSeleccionado('.itmima:checked', '<?php echo $_SESSION['languages']->GetString('NONE_SELECTED'); ?>', function()
        {
            if(confirm('<?php echo  $_SESSION['languages']->GetString('DELETE_CONFIRM'); ?>'))
            {

                AjaxRequest("<?php echo LIVESITE;?>imagecreator.php?lang=<?php echo $_SESSION['languages']->GetLang(); ?>&dataset=DSCubaMyWay&dspath=DSCubaMyWay.Designer&task=delete&tableimg=t_poloimages", 'frmpolo', function(j){AjaxJson(j);},'json','<?php  echo PHPDOTNETROOTLIVE ?>',errors);
            }
        });

        return false;
    });
    <?php } ?>

        });



    </script>
