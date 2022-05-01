
<?php

if(!empty($_REQUEST["module"]))
{if($_REQUEST["module"]=="")
        return; }
else return;
include_once(ROOT."config.php");?>
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

<script src="<?php echo LIVESITE;?>assets/js/<?php echo MAP_PATH;?>"></script>



    <div class="mappanel">
        <div id="map" class="map" style="width: 100%; height:80%; "></div>


    </div>
<script>
  //  $(function(){
        var markerData = {} ;
     var map = new jvm.Map({
                    container: $('.map'),
                    map: 'cuba'     ,
         markers: <?php

         $dataset = new DSCubaMyWay();
         $t_toursadapter = new t_tourpoloTableAdapter();

         $t_toursadapter->FillDefault($dataset->t_tourpolo());
         echo $dataset->t_tourpolo()->GetData();
             ?> ,

                    backgroundColor:'gray',
                    markerStyle: {
                        initial: {
                            fill: 'blue'
                        }
                    } , onMarkerTipShow: function(e, tip, code){
                        map.tip.text(map.markers[code].name);
                    },
                    onMarkerClick: function(e, code){

                    /*    map.removeMarkers([code]); */
                        //map.tip.hide();
                        PopupWindow("<?php echo LIVESITE."modules/Places/config/edit.php?item=";?>"+map.markers[code].config.item,'',null,'code='+code);
                    }}
        );


  $('#map').click(function(e){
          //  alert('a');


            var x = e.pageX - map.container.offset().left,
                    y = e.pageY - map.container.offset().top,
                    latLng = map.pointToLatLng(x, y),
                    targetCls = $(e.target).attr('class');

            if (latLng && (!targetCls || targetCls.indexOf('jvectormap-marker') === -1)) {
                map.markersCoords[map.markerIndex] = latLng;

               /// map.addMarker(markerIndex, {latLng: [latLng.lat, latLng.lng],name:'aaaa'});
              //  markerIndex += 1;
               PopupWindow("<?php echo LIVESITE."modules/Places/config/edit.php";?>",'',null,'data=['+latLng.lat+','+latLng.lng+']');
            }
        });
 //   });
</script>

