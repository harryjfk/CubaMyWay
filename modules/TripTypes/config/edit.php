<?php //defined('JEXEC') or die('Restricted access');
include(PHPDOTNETROOT . 'includes/helper.php');
include_once(ROOT . "config.php");
//include(ROOT."DSCubaMyWay.Designer.php");
$dataset = new DSCubaMyWay();
$t_tripstableadapter = new t_tripTableAdapter();
$edit = !empty($_REQUEST['item']);
$dataset2 = new DSDatos();
$t_usertableadapter = new t_userTableAdapter();
$t_usertableadapter->FillDefault($dataset2->t_user());
$_SESSION['languages']->LoadFromPath(__DIR__ . '/', $_SESSION['languages']->GetLang());
if ($edit) {
    $tit = $_SESSION['languages']->GetString(strtoupper($_REQUEST['view'])) . ' ' . $_SESSION['languages']->GetString(strtoupper($_REQUEST['module']));
    $t_tripstableadapter->FillByID($dataset->t_trip(), $_REQUEST['item']);

    if ($dataset->t_trip()->Count() > 0)
        $item = $dataset->t_trip()->Row(0);
    else
        $tit = $_SESSION['languages']->GetString(strtoupper($_REQUEST['view'])) . ' ' . $_SESSION['languages']->GetString(strtoupper($_REQUEST['module']));
    $tit .= ' ' . $item->nametrip();

} else
    $tit = $_SESSION['languages']->GetString(strtoupper($_REQUEST['view'])) . ' ' . $_SESSION['languages']->GetString(strtoupper($_REQUEST['module']));

?>

<link rel="stylesheet" media="all" href="<?php echo PHPDOTNETROOTLIVE;?>assets/css/jquery-jvectormap.css"/>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/jquery/jquery-jvectormap.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/jquery/jquery-mousewheel.js"></script>

<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/jvectormap.js"></script>

<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/abstract-element.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/abstract-canvas-element.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/abstract-shape-element.js"></script>

<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/svg-element.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/svg-group-element.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/svg-canvas-element.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/svg-shape-element.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/svg-path-element.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/svg-circle-element.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/svg-image-element.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/svg-text-element.js"></script>

<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/vml-element.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/vml-group-element.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/vml-canvas-element.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/vml-shape-element.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/vml-path-element.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/vml-circle-element.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/vml-image-element.js"></script>

<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/map-object.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/region.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/marker.js"></script>

<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/vector-canvas.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/simple-scale.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/ordinal-scale.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/numeric-scale.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/color-scale.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/legend.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/data-series.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/proj.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/map.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/svg.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/svg/svg.path.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/jquery/jquery.fancymap.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/list.js"></script>

<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/resizer.js"></script>
<script src="<?php echo PHPDOTNETROOTLIVE;?>assets/js/events.js"></script>
<script src="<?php echo LIVESITE;?>assets/js/<?php echo MAP_PATH;?>"></script>
<form id="frm<?php echo $_REQUEST['module'];?>" name="frm<?php echo $_REQUEST['module'];?>">

    <fieldset class="br5">
        <legend><?php echo $tit  ?></legend>
    <div class="cb mt1p">
        <?php

        for ($i = 0; $i < $dataset->t_trip()->Columns()->Count(); $i++) {
            $col = $dataset->t_trip()->Columns()->GetItem($i);
            if ($col->AutoIncrementSeed() == 0 && $col->Caption() != "username" && $col->Caption() != "nameuser") {
                ?>
                    <div class="fielditem">
                        <?php
                $t = "";
                if ($item != null)
                    $t = $item->GetItem($col->ColumnName());
                if ($col->ColumnName() === "iduser") {
                    ?>
                    <label for="<?php echo $col->ColumnName(); ?>"
                           class="in_block w35p fleft"><?php echo $_SESSION['languages']->GetString($col->ColumnName()); ?>
                        :</label>
                    <div class=""><?php
                        // $dataset->t_rol()->Rows()->AsArray("idrol",array("namerol"));

                        echo THelper::selectObject2('iduser', $dataset2->t_user()->Rows(), 'iduser', 'nameuser', null, $t, false, array('class="w100p"', null));
                        ?>
                    </div>        </div>
                       </div> <?php
                } else {
                    ?>
                    <label for="<?php echo $col->ColumnName(); ?>"
                           class="in_block w35p fleft"><?php echo $_SESSION['languages']->GetString($col->ColumnName()); ?>
                        :</label>
                    <div class="">  <?php




                        echo THelper::textbox($col->ColumnName(), $t, array('class="w100p"'));
                        ?></div>
                    <div class="cb"></div>
                    </div>


                    <?php
                }
            }
        }

        ?>

        <div class="cb"></div>
        <div class="mappanel">
            <div id="mapContainer" style="height: 80%;width: 100%">

                <div id="map" class="map" style=" margin-top:1%  ">

                </div>

            </div>
            <div id="svgMapOverlay" class="svgMapOverlay"><input type="hidden"></div>
        </div>
        <div id="preview"  class="polopreview ui-shadow" style="display: none;" ">
        <h1 id="poloheader"></h1>
        <ul id="poloimgs">

        </ul>

        </div>


        <div class="cb">
            <?php
            echo THelper::submit('guardar', $_SESSION['languages']->GetString('SAVE'), array('class="btn-confirm"'));
            echo THelper::button('cancelar', $_SESSION['languages']->GetString('CANCEL'), array('class="btn-confirm"'));
            ?>
        </div>

        <?php //echo THelper::hidden('item[]', $_REQUEST['item'][0]);?>

    </fieldset>
    <div class="cb"></div>
    </div>
    <div></div>
</form>

<script type="text/javascript">

    var list = new JFKList();
        var item =0;
    //$(function(){
    //   alert('a');
    $('#frm<?php echo $_REQUEST['module'];?>').validate({
        rules:{
            'namerol':{required:true}
        },
        messages:{
            'namerol':{required:'<?php  echo $_SESSION['languages']->GetString("FIELD_REQUIRED");?>'}
        },
        debug:true,
        errorElement:'div',
        submitHandler:function (form) {

            var data = $('#frm<?php echo $_REQUEST['module'];?>').serialize();

            AjaxRequest('<?php echo PHPDOTNETROOTLIVE . '';?>DSDatosHelper.php?lang=<?php echo $_SESSION['languages']->GetLang(); ?>&op=controller&dataset=DSCubaMyWay&dspath=DSCubaMyWay.Designer&table=t_trip&task=<?php if ($edit) echo "edit&item=" . $_REQUEST["item"]; else echo "add";?>&' + data, 'frm<?php echo $_REQUEST['module'];?>', function (j) {
                AjaxJson(j);

                         <?php if(!$edit)
{      ?>
                    AjaxRequest('<?php echo PHPDOTNETROOTLIVE . '';?>includes/tablemax.php?dataset=DSCubaMyWay&dspath=DSCubaMyWay.Designer&table=t_trip&item=idtrip', 'frm<?php echo $_REQUEST['module'];?>', function (j) {
                        AjaxJson(j);
<?php }           ?>
                        if ($('#sh-ok') != null) {


                        <?php
                        if($edit)
                        { ?> item= <?php echo $_REQUEST["item"];?> ; <?php }   ?>

                            data = "item=" +item +"&data=" + list.BaseArray.toString();

                            AjaxRequest('<?php echo LIVESITE . '';?>updatelist.php?lang=<?php echo $_SESSION['languages']->GetLang(); ?>&' + data, 'frm<?php echo $_REQUEST['module'];?>', function (j) {
                                AjaxJson(j);
                            }, 'json', '<?php echo PHPDOTNETROOTLIVE?>', errors);
                        }
<?php if(!$edit)
{      ?>
                    }, 'json', '<?php echo PHPDOTNETROOTLIVE?>', errors);
    <?php }           ?>

            }, 'json', '<?php echo PHPDOTNETROOTLIVE?>', errors);


        }
    });

    var map = new jvm.Map({
                container:$('.map'),
                map:'cuba',
                markers: <?php

        //   $dataset = new DSCubaMyWay();
        $t_toursadapter = new t_tourpoloTableAdapter();

        $t_toursadapter->FillDefault($dataset->t_tourpolo());
        echo $dataset->t_tourpolo()->GetData(true);
        ?> ,

                backgroundColor:'gray',
                markerStyle:{
                    initial:{
                        fill:'gray'
                    }
                }, onMarkerTipShow:function (e, tip, code) {

                    map.tip.text(map.markers[code].name);
                },
                onMarkerClick:function (e, code) {

                    var t = map.markers[code].element.shape.isSelected;
                    if (!t)
                        list.Add(map.markers[code].config.item);
                    else
                        list.Remove(map.markers[code].config.item);
                    map.setSelectedMarkers([code], !t);
                    UpdatePoints();
                    poloheader.innerHTML=map.markers[code].config.name;
                    var path= "<?php echo LIVE_UPLOADS;?>";
                    poloimgs.innerHTML ="";
                    var i;
                    for(i=0;i<map.markers[code].config.imgs.length;i++)
                        poloimgs.innerHTML+='<li><img src="'+path+map.markers[code].config.imgs[i]+'"></li>';
                    $('#preview').show();
                }}
    );
    var mapObj = $.fancyWorldMap({
        elm: '#map',
        svgContainer : { id : 'svgMapOverlay', fill : 'none', stroke_color: '#ffa553', stroke_width: 3},
        data: 'Fancy Maps Content'//,
        //  markers: markersData
    });
    function UpdatePoints()
    {
        var w =  $('.svgMapOverlay');
        w.hide();
       mapObj.clearLines('100%','100%');
       var t = [] ;
       /*  mapObj.drawPointLines(t); */
        for(i=0;i<list.Count();i++)
        t.push(map.markers[map.GetMarkerByCode(list.BaseArray[i])]);
        mapObj.drawPointLines(t);
       w.show();

    }

    function tresize(f)
    {
        UpdatePoints();
       // if(selected !=-1)
      //      $('.update-tours-list')[0].selected.click();

    }
    map.OnUpdate=tresize;
    var cr = new ClientControlResizer(mapContainer,svgMapOverlay);
    cr.ResizeWidth =true;
    cr.ResizeHeight =true;
    cr.ResizeLeft = true;
    cr.ResizeTop = true;
    cr.OnResize = tresize;
    cr.ResfreshRects();

    $('.svgMapOverlay').forwardevents({ enableMousemove: true});

    <?php
      if($edit)
      {
     $tripdesc = new t_destripTableAdapter();
         $tripdesc->FillByTripID($dataset->t_destrip(),$_REQUEST["item"]);
          ?>

      $(function(){


          var tempdata = <?php echo $dataset->t_destrip()->GetData(); ?>;
          for(i=0;i<tempdata.length;i++)
          {
                  list.Add(tempdata[i]);
              var t = map.GetMarkerByCode(tempdata[i]);

             if(t!=-1)
              map.setSelectedMarkers([t], true);
          }
      });

          <?php
      }

    ?>

    $('#cancelar').bind('click', function () {
        return AjaxUpdate('<?php echo PHPDOTNETROOTLIVE;?>modules/controller.php?lang=<?php echo $_SESSION['languages']->GetLang(); ?>&op=module&module=triptypes&view=list', 'update', 'frmvolverimp', '<?php echo PHPDOTNETROOTLIVE?>', errors);
    });
    // });
    UpdatePoints();
</script>
