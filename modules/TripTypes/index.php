<?php
$_SESSION['languages']->LoadFromPath(ROOT_MODULES.'Trips/config/',$_SESSION['languages']->GetLang());

?>
<link rel="stylesheet" media="all" href="<?php echo PHPDOTNETROOTLIVE?>assets/css/jquery-jvectormap.css"/>
<style>
    ul {
        padding: 0;
        list-style: none;
    }

    .jvectormap-legend .jvectormap-legend-tick-sample {
        height: 26px;
    }

    .jvectormap-legend-icons {
        background: white;
        border: black 1px solid;
    }

    .jvectormap-legend-icons {
        color: black;
    }
</style>


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

<script src="<?php echo LIVESITE;?>assets/js/jquery-jvectormap-cuba-all.js"></script>

<div class="tours-menu">
<ul class="nav nav-pills" role="tablist">
    <li role="presentation" class="active"><a href="#"><?php
echo $_SESSION['languages'] ->GetString("TRIPS_ALL");
         ?> <span class="badge">42</span></a></li>
    <li role="presentation"><a href="#"><?php echo $_SESSION['languages'] ->GetString("TRIPS_MOST"); ?><span class="badge">3</span></a></li>
</ul>
 <div class="update-tours-list">
         <ul>
         <li>asd adsasd</li>
         <li>asd adsasd</li>
         <li>asd adsasd</li>
         <li>asd adsasd</li>
     </ul>
 </div>

</div>
   <div class="mappanel">
       <div class="map" style="width: 100%; height: 100%; background-color: white; display: none;"></div>


   </div>

<script>
    $(function(){

        var map = new jvm.Map({
            container: $('.map'),
            map: 'cuba'    });

    });
</script>


