<?php
include("../../config.php");
$dataset = new DSCubaMyWay();
$t_triptableadapter = new t_tripTableAdapter();
$t_triptableadapter->FillDefault($dataset->t_trip());
$tripdesc = new t_destripTableAdapter();

$_SESSION['languages']->LoadFromPath(__DIR__ . '/config/', $_SESSION['languages']->GetLang());

?>

<div class="tours-menu">
    <h1><?php echo $_SESSION["languages"]->GetString("TRIPS");?></h1>

    <div class="update-tours-list">
        <ul>
            <?php
            for($i=0;$i<$dataset->t_trip()->Count();$i++)
            {
               $t = $dataset->t_trip()->Row($i);
                $dataset->t_destrip()->Clear();
                $tripdesc->FillByTripID($dataset->t_destrip(),$t->idtrip());
                ?>
             <li id="<?php echo $t->idtrip();?>"><a href="#"  value='<?php  echo $dataset->t_destrip()->GetData(); ?>'><?php echo $t->nametrip(); ?></a></li>


           <?php }


            ?>

        </ul>
    </div>
    <div class="newtrip">
        <?php  if(!empty($_SESSION["authuser"])) {?>
        <button class="btn-confirm"><?php echo $_SESSION["languages"]->GetString("NEW");?></button>
            <?php } ?>
    </div>

</div>
<div class="mappanel" style="width: 80%" >
    <div id="mapContainer" style="width: 100%">

        <div id="map" class="map" style="height: 90%; margin-top:1%  ">
           
        </div>
        <div id="preview"  class="polopreview ui-shadow" style="display: none;" ">
            <h1 id="poloheader"></h1>
            <ul id="poloimgs">

            </ul>
        </div>
        <div id="svgMapOverlay" class="svgMapOverlay"><input type="hidden"></div>
    </div>

    <div style="text-align: right">
          <?php  if(!empty($_SESSION["authuser"])) {?>
        <button class="btn-confirm"><?php echo $_SESSION["languages"]->GetString("CREATE");?></button>
        <?php } ?>
    </div>
 </div>

<div class="cb"></div>

<script>

     var markers = <?php

     //   $dataset = new DSCubaMyWay();
     $t_toursadapter = new t_tourpoloTableAdapter();

     $t_toursadapter->FillDefault($dataset->t_tourpolo());

     echo $dataset->t_tourpolo()->GetData(true);
     ?>;

    var list = new JFKList();
    var selected=-1;

    var map = new jvm.Map({
        container:$('.map'),
        map:'cuba'    ,
        markers: markers,
        onMarkerOut:function(e,code)
        {
          //  $('#preview').hide()
        },
        onMarkerClick:function(e,code)
        {
            poloheader.innerHTML=markers[code].name;
            var path= "<?php echo LIVE_UPLOADS;?>";
              poloimgs.innerHTML ="";
            var i;
            for(i=0;i<markers[code].imgs.length;i++)
            poloimgs.innerHTML+='<li><img src="'+path+markers[code].imgs[i]+'"></li>';
            $('#preview').show();

        },
        onMarkerTipShow: function(e, tip, code){

        map.tip.text(map.markers[code].config.name);
        } ,  backgroundColor:'#257ADE' ,
        labels: {
            markers: {
                render: function(index){

                  return  markers[index].name;
                }
            }
        }
    });
    $('li a').bind('click', function (s) {
        var $this = $(this);
        var j = JSON;

        var tempdata = j.parse($this.attr('value'));

        list.Clear();
        map.clearSelectedMarkers();
        selected = this.parentNode.id;
        $('.update-tours-list')[0].selected = $this;
        mapObj.clearLines('100%','100%');
       var t = map.CreateMarkerPath(tempdata);
        mapObj.drawPointLines(t);
         for(i=0;i<tempdata.length;i++)
           {
               list.Add(tempdata[i]);
               var t = map.GetMarkerByCode(tempdata[i]);

               if(t!=-1)
                   map.setSelectedMarkers([t], true);
           }

    });
   //  map.OnMouseDown = OnMM;
var mapObj = $.fancyWorldMap({
        elm: '#map',
        svgContainer : { id : 'svgMapOverlay', fill : 'none', stroke_color: '#ffa553', stroke_width: 3},
        data: 'Fancy Maps Content'//,
      //  markers: markersData
    });
     function tresize(f)
     {
        if(selected !=-1)
            $('.update-tours-list')[0].selected.click();

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
     $('.mappanel button').bind('click', function (s) {


         if(selected==-1)
             alert("<?php echo $_SESSION["languages"]->GetString("NONE_SELECTED");?>");
         else
             PopupWindow("<?php echo LIVESITE."modules/Trips/create.php?item=";?>"+selected,'',null,'');
     });

     $('.newtrip button').bind('click', function (s) {
         AjaxUpdate('<?php echo LIVESITE.'controller/'.\UrlCrypt\UrlCrypt::encrypt('lang='.$_SESSION['languages']->GetLang().'&op=module&module=triptypes&view=newtrip');?>', 'update', '', '<?php echo LIVESITE;?>',errors);
     });

</script>
