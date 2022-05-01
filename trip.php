<!DOCTYPE html>
<html lang="en">
<head>

    <title>Cuba My Way</title>

    <script src="assets/js/jquery/jquery-1.8.2.js"></script>
    <script src="assets/js/jquery/jquery-jvectormap.js"></script>
    <script src="assets/js/jquery/jquery-mousewheel.js"></script>

    <script src="assets/js/svg/jvectormap.js"></script>

    <script src="assets/js/svg/abstract-element.js"></script>
    <script src="assets/js/svg/abstract-canvas-element.js"></script>
    <script src="assets/js/svg/abstract-shape-element.js"></script>

    <script src="assets/js/svg/svg-element.js"></script>
    <script src="assets/js/svg/svg-group-element.js"></script>
    <script src="assets/js/svg/svg-canvas-element.js"></script>
    <script src="assets/js/svg/svg-shape-element.js"></script>
    <script src="assets/js/svg/svg-path-element.js"></script>
    <script src="assets/js/svg/svg-circle-element.js"></script>

    <script src="assets/js/svg/vml-element.js"></script>
    <script src="assets/js/svg/vml-group-element.js"></script>
    <script src="assets/js/svg/vml-canvas-element.js"></script>
    <script src="assets/js/svg/vml-shape-element.js"></script>
    <script src="assets/js/svg/vml-path-element.js"></script>
    <script src="assets/js/svg/vml-circle-element.js"></script>

    <script src="assets/js/svg/map-object.js"></script>
    <script src="assets/js/svg/region.js"></script>
    <script src="assets/js/svg/marker.js"></script>

    <script src="assets/js/svg/vector-canvas.js"></script>
    <script src="assets/js/svg/simple-scale.js"></script>
    <script src="assets/js/svg/numeric-scale.js"></script>
    <script src="assets/js/svg/ordinal-scale.js"></script>
    <script src="assets/js/svg/color-scale.js"></script>
    <script src="assets/js/svg/data-series.js"></script>
    <script src="assets/js/svg/proj.js"></script>
    <script src="assets/js/svg/map.js"></script>

    <script src="assets/js/jquery-jvectormap-cuba.js"></script>
    <script>
        $(function(){
            var map = $('#map1').vectorMap({
                map: 'map',
                markers: [
                    {coords: [100, 100], name: 'Marker 1', style: {fill: 'yellow'}},
                    {coords: [200, 200], name: 'Marker 2', style: {fill: 'yellow'}}
                ]
            });

        })
    </script>
</head>

<body>



<div id="map1" style="width: 600px; height: 600px"></div>

</body>
</html>
