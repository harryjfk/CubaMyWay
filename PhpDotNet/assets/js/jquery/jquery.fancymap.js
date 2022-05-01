(function ($) {  


  // finds selected markers and then calls drawMarkerLines
  function markerLines(svg, svgContainer, markersCoords){
  	var markerCoordsArr = [];
  	var markers = map.getSelectedMarkers();
	for(var i in markers){
		markerCoordsArr.push(markersCoords[markers[i]]);
	}
	drawMarkerLines(svg, svgContainer, markerCoordsArr);  	
  }


  // draw lines, accepts markers
  function drawMarkerLines(svg, svgContainer, selected_markers){
	var markerCount = selected_markers.length;

	for(var i in selected_markers){
	    if(markerCount-1 > i ){
	     	var j = parseInt(i)+1;
	     //	console.log('i,j', i, j, markerCount);
	     //	console.log(selected_markers[i]);
	     	
	     	var coordsA = map.latLngToPoint(selected_markers[i].config.latLng[0],selected_markers[i].config.latLng[1]);
			var coordsB = map.latLngToPoint(selected_markers[j].config.latLng[0],selected_markers[j].config.latLng[1]);
			drawLine(svg, svgContainer, coordsA, coordsB);			
	    }
	}
  }

  function createPointLine(svg)
  {
      var s = '<marker id="head" orient="auto" markerWidth="2" markerHeight="4" refX="1.5" refY="2">'+

      '<path d="M0,0 V4 L2,2 Z" fill="black"></path></marker>' ;
      svg.defs().node.innerHTML +=s ;
 //  if(ChildNodeTypeExits(svgContainer,"defs") )
 //  alert("aa");

  }
  // draw single line function
  function drawLine(svg, svgContainer, coordsA, coordsB){


  	svg.path().attr({'marker-end':"url(#head)", fill: svgContainer.fill ,stroke: svgContainer.stroke_color, 'stroke-width': svgContainer.stroke_width }).M(coordsA.x, coordsA.y).L(coordsB.x, coordsB.y);

	//console.log('coords', coordsA[0], coordsB);
  }

  $.fancyWorldMap = function(options) {
    //console.log('fancyWorldMap()');
    var params = $.extend({
        elm : '#map',
        svgContainer : 'svgMapOverlay'

    }, options );

	var svg = SVG(params.svgContainer.id).size(params.svgContainer.width, params.svgContainer.height);

    var mapObj = {

       SVG:svg ,
        drawPointLines: function(markers) {
            createPointLine(svg);
		    drawMarkerLines(svg, params.svgContainer, markers);
        },
        drawSelectedMarkerLines: function() {
            createPointLine(svg);
		    markerLines(svg, params.svgContainer, params.markers);
        },
        createMarkers: function(markers, values){
        	map.addMarkers(markers, values);
        },
        removeMarkers : function(){
        	map.removeAllMarkers();
        },
        clearAllSelectedRegions: function(){
        	map.clearSelectedRegions();
        },
        clearAllSelectedMarkers: function(){
        	map.clearSelectedMarkers();
        },
        clearLines: function(width,height){
        	$('#'+params.svgContainer.id).empty();
        	svg = SVG(params.svgContainer.id).size(width, height);
        },
        resetMap: function(){
        	map.reset();
        },
        removeMap: function(){
        	map.remove();
        },
        resetAll: function(){
        	map.reset();
        	$('#'+params.svgContainer.id).empty();
        	svg = SVG(params.svgContainer.id).size(1280, 400);
        }

    };

	return mapObj;
  }

  $.fn.fancyWorldMap = $.fancyWorldMap;

}(jQuery));