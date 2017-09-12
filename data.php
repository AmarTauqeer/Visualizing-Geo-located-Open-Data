<?php 
require('conn.php');
//get parameters
$distr_code='';
$cat='';
$categories='';

$GLOBALS['distr_code'] = $_GET["distr_code"];
$GLOBALS['cat'] = $_GET["cat"];
if ($cat=='true') {
	$GLOBALS['categories'] = $_GET["category"];	
}
//print_r(array_values($distr_code));
//echo $categories;
require('datasets.php');
?>
<html>

<head>
    <title>Vienna Districts</title>
    <link type="text/css" href="css/ol.css" />
    <script src="JScripts/ol.js" type="text/javascript"></script>
    <script src="JScripts/jquery.js" type="text/javascript"></script>
    <script src="popup/scripts/ol-popup.js"></script>
    <script type="text/javascript" src="JScripts/CategoryStyle.js"></script>
    <script type="text/javascript" src="JScripts/AddDistBound.js"></script>
</head>

<body>
    <div id="map"></div>
    <?php
	//districts boundaries
	 require('district_boundaries.php');
?>
        <script>
            //features collection
            var iconFeatures = [];
        </script>

        <?php
	//datasets
	$total=count($datasets);
	for ($i=0; $i <$total ; $i++) {
		$goeid=$datasets[$i]['goeid'];
		$name=$datasets[$i]['name'];
		$coordinates=$datasets[$i]['coordinates'];
		$address=$datasets[$i]['address'];
		$weblink=$datasets[$i]['weblink'];
		$email=$datasets[$i]['email'];
		$phone=$datasets[$i]['phone'];
		$category=$datasets[$i]['cat'];
		$dist_code=$datasets[$i]['dist_code'];
		//echo $category;
		//category checkbox		
		if ($cat=='true') {
			//multiple check of category
			if (in_array($category, $categories)) {
?>
            <script>
                //adding category to popup
                var a = ol.proj.transform(<?php echo $coordinates;?>, 'EPSG:4326', 'EPSG:3857');
                var iconFeature = new ol.Feature({
                    type: 'click',
                    geometry: new ol.geom.Point(a),
                    cat: '<?php echo $category;?>',
                    description: 'Name=<?php echo $name;?><br>Category=<?php echo $category;?><br>GeoID=<?php echo $goeid;?><br>Address=<?php echo $address;?><br>Telephone=<?php echo $phone;?><br>Email=<?php echo $email;?><br>Weblink=<?php echo $weblink;?>'
                });
                //collection of features
                iconFeatures.push(iconFeature);
            </script>
            <?php
			}
		}
else {
	//check multiple districts without category
	if (in_array($dist_code, $distr_code)) {
		// print_r(array_values($distr_code));
?>
                <script>
                    var a = ol.proj.transform(<?php echo $coordinates;?>, 'EPSG:4326', 'EPSG:3857');
                    var iconFeature = new ol.Feature({
                        type: 'click',
                        geometry: new ol.geom.Point(a),
                        cat: '<?php echo $category;?>',
                        description: 'Name=<?php echo $name;?><br>GeoID=<?php echo $goeid;?><br>Address=<?php echo $address;?><br>Telephone=<?php echo $phone;?><br>Email=<?php echo $email;?><br>Weblink=<?php echo $weblink;?>'
                    });
                    //adding features
                    iconFeatures.push(iconFeature);
                </script>
                <?php
		}
	}
}

?>
                <script>
                    var vectorSource = new ol.source.Vector({
                        features: iconFeatures 
                    });

                    var vectorLayer = new ol.layer.Vector({
                        source: vectorSource,
                        style: flickrStyle

                    });
                    var center = ol.proj.transform([16.363449, 48.210033], 'EPSG:4326', 'EPSG:3857');
                    //map initialization
                    var map = new ol.Map({
                        target: 'map',
                        layers: [],
                        // Create a view centered on the specified location and zoom level
                        view: new ol.View({
                            center: center,
                            zoom: 11
                        })
                    });

                    // OSM layer
                    var layerOSM = new ol.layer.Tile({
                        source: new ol.source.OSM()
                    });
                    map.addLayer(layerOSM);

                    //adding districts boundaries
                    var count_dist = '<?php  $count=count($distr_code); echo $count; ?>';
                    AddDistBound(count_dist);
                    //adding vector layer
                    map.addLayer(vectorLayer);
                    //popup		
                    var popup = new ol.Overlay.Popup;
                    popup.setOffset([0, -55]);
                    map.addOverlay(popup);
                    //click event		
                    map.on('click', function(evt) {
                        var f = map.forEachFeatureAtPixel(
                            evt.pixel,
                            function(ft, layer) {
                                return ft;
                            }
                        );
                        if (f && f.get('type') == 'click') {
                            var geometry = f.getGeometry();
                            var coord = geometry.getCoordinates();

                            var content = '<p>' + f.get('description') + '</p>';
                            popup.show(coord, content);

                        } else {
                            popup.hide();
                        }
                    });
                    //pointer move
                    map.on('pointermove', function(e) {
                        if (e.dragging) {
                            popup.hide();
                            return;
                        }

                        var pixel = map.getEventPixel(e.originalEvent);
                        var hit = map.hasFeatureAtPixel(pixel);

                        map.getTarget().style.cursor = hit ? 'pointer' : '';
                    });
                </script>
</body>

</html>