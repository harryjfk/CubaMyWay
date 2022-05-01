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
$_SESSION['languages']->LoadFromPath(__DIR__ . '/config/', $_SESSION['languages']->GetLang());
    $tit = $_SESSION['languages']->GetString(strtoupper($_REQUEST['view'])) . ' ' . $_SESSION['languages']->GetString(strtoupper($_REQUEST['module']));

?>

<script src="<?php echo LIVESITE;?>assets/js/<?php echo MAP_PATH;?>"></script>
<form id="frm<?php echo $_REQUEST['module'];?>" name="frm<?php echo $_REQUEST['module'];?>">
<div class="profile">
    <div class="info">
    <div class="fielditem" style="  width: 20%; ">
        <label for="nametrip" class="in_block w35p fleft">    <?php echo $_SESSION['languages']->GetString('nametrip');?>                    :</label>
        <div class="">  <input type="text" name="nametrip" id="nametrip" value="" class="w100p"></div>
        <div class="cb"></div>
    </div>          </div>


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
            echo THelper::submit('guardar', $_SESSION['languages']->GetString('NEW'), array('class="btn-confirm"'));
            echo THelper::button('cancelar', $_SESSION['languages']->GetString('CANCEL'), array('class="btn-confirm"'));
            ?>
        </div>

        <?php //echo THelper::hidden('item[]', $_REQUEST['item'][0]);?>

    <div class="cb"></div>
    </div>
</form>

<script type="text/javascript">

    var list = new JFKList();
    var item = 0;
    //$(function(){
    //   alert('a');
    $('#frm<?php echo $_REQUEST['module'];?>').validate({
        rules:{
            'nametrip':{required:true}
        },
        messages:{
            'nametrip':{required:'<?php  echo $_SESSION['languages']->GetString("FIELD_REQUIRED");?>'}
        },
        debug:true,
        errorElement:'div',

            submitHandler:function (form) {
                           if(list.Count()==0)
                           alert('<?php echo $_SESSION['languages']->GetString("NONE_SELECTED");?>');
                else
                           {
                var data = $('#frm<?php echo $_REQUEST['module'];?>').serialize();

                AjaxRequest('<?php echo LIVESITE . 'controller/'.\UrlCrypt\UrlCrypt::encrypt('lang='.$_SESSION['languages']->GetLang().'&op=controller&dataset=DSCubaMyWay&dspath=DSCubaMyWay.Designer&silent=true&table=t_trip&task=add&iduser='. $_SESSION["authuser"]["id"]);?>&' + data, 'frm<?php echo $_REQUEST['module'];?>', function (j) {
                    AjaxJson(j);


                    if ($('#sh-ok') != null) {


                        data = "data=" + list.BaseArray.toString();

                        AjaxRequest('<?php echo LIVESITE . 'updlist/'.\UrlCrypt\UrlCrypt::encrypt('lang='.$_SESSION['languages']->GetLang());?>&' + data, 'frm<?php echo $_REQUEST['module'];?>', function (j) {
                            AjaxJson(j);
                            AjaxUpdate('<?php echo LIVESITE.'controller/'.\UrlCrypt\UrlCrypt::encrypt('lang='.$_SESSION['languages']->GetLang().'&op=module&module=trips&view=index');?>', 'update', 'frmvolverimp', '<?php echo PHPDOTNETROOTLIVE?>', errors);

                        }, 'json', '<?php echo PHPDOTNETROOTLIVE?>', errors);


                    }
                }, 'json', '<?php echo PHPDOTNETROOTLIVE?>', errors);


            }  }
        });
    var s = 0;
    var map = new jvm.Map({
                container:$('.map'),
                map:'cuba',
                markers: <?php

        //   $dataset = new DSCubaMyWay();
        $t_toursadapter = new t_tourpoloTableAdapter();

        $t_toursadapter->FillDefault($dataset->t_tourpolo());
        echo $dataset->t_tourpolo()->GetData(true);
        ?> ,

                backgroundColor:'#257ADE' ,
                markerStyle:{
                    initial:{
                        fill:'gray'
                    }
                }, onMarkerTipShow:function (e, tip, code) {
                    map.tip.text(map.markers[code].name);
                },  labels: {
                markers: {
                    render: function(index){

                        return  markers[index].name;
                    }
                }
            },
                onMarkerClick:function (e, code) {
s=e;
                //buscar como saber que click fue el q presiono
                    var t = map.markers[code].element.shape.isSelected;
                    if (!t)
                    {
                        list.Add(map.markers[code].config.item);

                    }
                     else
                    {
                        //if(e.button==derecho)
                        //   list.Remove(map.markers[code].config.item);
                       // else
                    //    t=false;

                    }

                    map.setSelectedMarkers([code], !t);
                    UpdatePoints();
                   /* poloheader.innerHTML=map.markers[code].config.name;
                    var path= "<?php echo LIVE_UPLOADS;?>";
                    poloimgs.innerHTML ="";
                    var i;
                    for(i=0;i<map.markers[code].config.imgs.length;i++)
                        poloimgs.innerHTML+='<li><img src="'+path+map.markers[code].config.imgs[i]+'"></li>';
                    $('#preview').show();*/
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
      //  w.hide();
        mapObj.clearLines('100%','100%');
        cr.ResfreshRects();
        var t = [] ;
        /*  mapObj.drawPointLines(t); */
        for(i=0;i<list.Count();i++)
            t.push(map.markers[map.GetMarkerByCode(list.BaseArray[i])]);
        mapObj.drawPointLines(t);
        cr.ResfreshRects();
      //  w.show();

    }

    function tresize(f)
    {
        UpdatePoints();
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
        $tripdesc = new t_tripdesTableAdapter();
        $tripdesc->FillByTrip($dataset->t_tripdes(),$_REQUEST["item"]);
        ?>

    $(function(){


        var tempdata = <?php echo $dataset->t_tripdes()->GetData(); ?>;
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
        return AjaxUpdate('<?php echo LIVESITE.'controller/'.\UrlCrypt\UrlCrypt::encrypt('lang='.$_SESSION['languages']->GetLang().'&op=module&module=trips&view=index');?>', 'update', 'frmvolverimp', '<?php echo PHPDOTNETROOTLIVE?>', errors);
    });
    // });

</script>
