<?php 	
			require('district_bound_dataset.php');	
			//total districts
			$t=count($distr_code);
			
			//boundary data
			$json_boundary = json_decode($dist_boundary_str);
			
			foreach($json_boundary->features as $item)
			{
				//distric code
				$a=$item->properties->BEZNR;
			
			if ($t) {
				$bez="";
				$bez=$distr_code[0];
			}
			//echo $bez;
			//compare wirh original data
			if ($a==$bez) {
				//coordinates of each polygon
				$coordinates_bez="";
				$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
					
?>
	
	<script>
		    //multipolygon string
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
			
			//json dataset		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of first district
			var style_bez=new ol.style.Style({
						fill : new ol.style.Fill({
		   			   color: 'rgba(255,0,0,0.3)'
		   			   })
			});

			//vector layer first district		
			var vectorLayer_b = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez
			});	
			
			
	</script>
					
<?php			
		}
	        //next district
			if ($t>1) {
				$bez="";
				$bez=$distr_code[1];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_1=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(0,255,0,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b1 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_1
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>2) {
				$bez="";
				$bez=$distr_code[2];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_2=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(0,0,255,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b2 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_2
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>3) {
				$bez="";
				$bez=$distr_code[3];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_3=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(100,0,0,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b3 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_3
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>4) {
				$bez="";
				$bez=$distr_code[4];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_4=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(0,100,0,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b4 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_4
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>5) {
				$bez="";
				$bez=$distr_code[5];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_5=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(0,0,100,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b5 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_5
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>6) {
				$bez="";
				$bez=$distr_code[6];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_6=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(200,0,0,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b6 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_6
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>7) {
				$bez="";
				$bez=$distr_code[7];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_7=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(0,200,0,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b7 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_7
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>8) {
				$bez="";
				$bez=$distr_code[8];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_8=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(0,0,200,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b8 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_8
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>9) {
				$bez="";
				$bez=$distr_code[9];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_9=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(300,0,0,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b9 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_9
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>10) {
				$bez="";
				$bez=$distr_code[10];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_10=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(0,300,0,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b10 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_10
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>11) {
				$bez="";
				$bez=$distr_code[11];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_11=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(0,0,300,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b11 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_11
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>12) {
				$bez="";
				$bez=$distr_code[12];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_12=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(400,0,0,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b12 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_12
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>13) {
				$bez="";
				$bez=$distr_code[13];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_13=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(0,400,0,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b13 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_13
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>14) {
				$bez="";
				$bez=$distr_code[14];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_14=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(0,0,400,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b14 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_14
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>15) {
				$bez="";
				$bez=$distr_code[15];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_15=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(500,0,0,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b15 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_15
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>16) {
				$bez="";
				$bez=$distr_code[16];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_16=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(0,500,0,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b16 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_16
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>17) {
				$bez="";
				$bez=$distr_code[17];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_17=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(0,0,500,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b17 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_17
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>18) {
				$bez="";
				$bez=$distr_code[18];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_18=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(600,0,0,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b18 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_18
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>19) {
				$bez="";
				$bez=$distr_code[19];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_19=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(600,0,0,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b19 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_19
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>20) {
				$bez="";
				$bez=$distr_code[20];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_20=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(0,600,0,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b20 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_20
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>21) {
				$bez="";
				$bez=$distr_code[21];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_21=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(0,0,600,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b21 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_21
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>22) {
				$bez="";
				$bez=$distr_code[22];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_22=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(700,0,0,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b22 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_22
			});	
			
	</script>
					
<?php			
				}
	        //next district
			if ($t>23) {
				$bez="";
				$bez=$distr_code[23];
			}		    
		    if ($a==$bez) {
		    	$coordinates_bez="";
		    	$coordinates_bez=json_encode($item->geometry->coordinates,TRUE);
			
?>
	<script>
		    //boundaries
		    var geomStr="";
			var geomStr = '{"coordinates":[<?php echo $coordinates_bez; ?>],"type":"MultiPolygon"}';
			
		
			var geoJson ="";
			var geoJson = {
				"type" : "FeatureCollection",
				"features" : [{
					"type" : "Feature",
					"geometry" : JSON.parse(geomStr)
				}]
			};
			//style of next layer
			var style_bez_23=new ol.style.Style({
				fill : new ol.style.Fill({
				color: 'rgba(0,700,0,0.3)'
					 })
			});		

			
			//vector layer of next district		
			var vectorLayer_b23 = new ol.layer.Vector({
				source : new ol.source.Vector({
					features : new ol.format.GeoJSON().readFeatures(geoJson, {
						dataProjection : 'EPSG:4326',
						featureProjection : 'EPSG:3857'
							})
						}),
						style:style_bez_23
			});	
			
	</script>
					
<?php			
				}


		}		 
?>
