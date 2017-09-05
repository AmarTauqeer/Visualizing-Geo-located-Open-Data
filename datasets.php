<?php 
	//code for datasets
	$datasets=[];
	$coordinate='';
	$name='';
	$goeid='';
	$address='';
	$weblink='';
	$email='';
	$phone='';
	$dist_code='';

	
	//embassy and consulate
	$embassy_consulate = file_get_contents('http://data.wien.gv.at/daten/geo?service=WFS&request=GetFeature&version=1.1.0&typeName=ogdwien:BOTSCHAFTOGD&srsName=EPSG:4326&outputFormat=json' );

		$result_data_consu = json_decode($embassy_consulate);

		foreach($result_data_consu->features as $item)
		{
		if(in_array($item->properties->BEZIRK, $distr_code))			
		//if($item->properties->BEZIRK == $distr_code)
		{

		$coordinate_consu=json_encode($item->geometry->coordinates,TRUE);

		$goeid=json_encode($item->id,TRUE);
		$name=json_encode($item->properties->NAME,TRUE);
		$address=json_encode($item->properties->ADRESSE,TRUE);
		$weblink=json_encode($item->properties->WEBLINK1,TRUE);
		$email=json_encode($item->properties->EMAIL,TRUE);
		$phone=json_encode($item->properties->TELEFON,TRUE);
		$dist_code=json_encode($item->properties->BEZIRK,TRUE);
		
		$data_consu=array('goeid'=>$goeid,'coordinates'=>$coordinate_consu,'name'=>$name,'address'=>$address,'weblink'=>$weblink,'email'=>$email,'phone' =>$phone,'cat'=>'Embassies and Consulates','dist_code' =>$dist_code);

			array_push($datasets,$data_consu);

			}
			}


	//driving school		
	$driving_school = file_get_contents('http://data.wien.gv.at/daten/geo?service=WFS&request=GetFeature&version=1.1.0&typeName=ogdwien:FAHRSCHULEOGD&srsName=EPSG:4326&outputFormat=json');
	
		$result_data_consu = json_decode($driving_school);

		foreach($result_data_consu->features as $item)
		{
		if(in_array($item->properties->BEZIRK, $distr_code))	
		//if($item->properties->BEZIRK == $distr_code)
		{

		$coordinate_consu=json_encode($item->geometry->coordinates,TRUE);

		$goeid=json_encode($item->id,TRUE);
		$name=json_encode($item->properties->NAME,TRUE);
		$address=json_encode($item->properties->ADRESSE,TRUE);
		$weblink=json_encode($item->properties->WEBLINK1,TRUE);
		$email='';//json_encode($item->properties->EMAIL,TRUE);
		$phone='';//json_encode($item->properties->TELEFON,TRUE);
		$dist_code=json_encode($item->properties->BEZIRK,TRUE);
		
		$data_consu=array('goeid'=>$goeid,'coordinates'=>$coordinate_consu,'name'=>$name,'address'=>$address,'weblink'=>$weblink,'email'=>$email,'phone' =>$phone,'cat'=>'Driving School','dist_code' =>$dist_code);

			array_push($datasets,$data_consu);

			}
			}


	//city bike locations		
	$citybike_location = file_get_contents('http://data.wien.gv.at/daten/geo?service=WFS&request=GetFeature&version=1.1.0&typeName=ogdwien:CITYBIKEOGD&srsName=EPSG:4326&outputFormat=json');
	
	
	
		$result_data_consu = json_decode($citybike_location);

		foreach($result_data_consu->features as $item)
		{
		if(in_array($item->properties->BEZIRK, $distr_code))
		{

		$coordinate_consu=json_encode($item->geometry->coordinates,TRUE);
		
		$goeid=json_encode($item->id,TRUE);
		$name=json_encode($item->properties->STATION,TRUE);
		$address=json_encode($item->properties->STATION,TRUE);
		$weblink='';//json_encode($item->properties->WEBLINK1,TRUE);
		$email='';//json_encode($item->properties->EMAIL,TRUE);
		$phone='';//json_encode($item->properties->TELEFON,TRUE);
		$dist_code=json_encode($item->properties->BEZIRK,TRUE);
				
		$data_consu=array('goeid'=>$goeid,'coordinates'=>$coordinate_consu,'name'=>$name,'address'=>$address,'weblink'=>$weblink,'email'=>$email,'phone' =>$phone,'cat'=>'Citybike Locations','dist_code' =>$dist_code);

			array_push($datasets,$data_consu);

			}
			}
//print_r(array_values($datasets));

 
	//hospital locations		
	$hospital_location = file_get_contents('http://data.wien.gv.at/daten/geo?service=WFS&request=GetFeature&version=1.1.0&typeName=ogdwien:KRANKENHAUSOGD&srsName=EPSG:4326&outputFormat=json');
	
		$result_data_consu = json_decode($hospital_location);

		foreach($result_data_consu->features as $item)
		{
		if(in_array($item->properties->BEZIRK, $distr_code))
		{

		$coordinate_consu=json_encode($item->geometry->coordinates,TRUE);

		$goeid=json_encode($item->id,TRUE);
		$name=json_encode($item->properties->BEZEICHNUNG,TRUE);
		$address=json_encode($item->properties->ADRESSE,TRUE);
		$weblink='';//json_encode($item->properties->WEBLINK1,TRUE);
		$email='';//json_encode($item->properties->EMAIL,TRUE);
		$phone='';//json_encode($item->properties->TELEFON,TRUE);
		$dist_code=json_encode($item->properties->BEZIRK,TRUE);
		
		$data_consu=array('goeid'=>$goeid,'coordinates'=>$coordinate_consu,'name'=>$name,'address'=>$address,'weblink'=>$weblink,'email'=>$email,'phone' =>$phone,'cat'=>'Hospital Locations','dist_code' =>$dist_code);

			array_push($datasets,$data_consu);
			

			}
			}


	//kindergarten		
	$kindergarten_location = file_get_contents('http://data.wien.gv.at/daten/geo?service=WFS&request=GetFeature&version=1.1.0&typeName=ogdwien:KINDERGARTENOGD&srsName=EPSG:4326&outputFormat=json');
	
		$result_data_consu = json_decode($kindergarten_location);
		foreach($result_data_consu->features as $item)
		{
			//convert from 1160 to 16
			$plz = substr($item->properties->PLZ, 1,-1); 
			
		if(in_array($plz, $distr_code))
		{
		$coordinate_consu=json_encode($item->geometry->coordinates,TRUE);

		$goeid=json_encode($item->id,TRUE);
		$name=json_encode($item->properties->BEZEICHNUNG,TRUE);
		$address=json_encode($item->properties->ADRESSE,TRUE);
		$weblink=json_encode($item->properties->WEBLINK1,TRUE);
		$email='';//json_encode($item->properties->EMAIL,TRUE);
		$phone=json_encode($item->properties->KONTAKT,TRUE);
		//code for districts having lest than 10
		if ($plz=='01'|| $plz=='02'|| $plz=='03'|| $plz=='04'|| $plz=='05'|| $plz=='06'|| $plz=='07'|| $plz=='08'|| $plz=='09') {
			$plz=intval(substr($plz,-1));
		}
		$dist_code=json_encode(intval($plz),TRUE);
		
		$data_consu=array('goeid'=>$goeid,'coordinates'=>$coordinate_consu,'name'=>$name,'address'=>$address,'weblink'=>$weblink,'email'=>$email,'phone' =>$phone,'cat'=>'Kindergarten','dist_code' =>$dist_code);

			array_push($datasets,$data_consu);

			}
			}


			 
	//library locations		
	$library_location = file_get_contents('http://data.wien.gv.at/daten/geo?service=WFS&request=GetFeature&version=1.1.0&typeName=ogdwien:BUECHEREIOGD&srsName=EPSG:4326&outputFormat=json');
	
		$result_data_consu = json_decode($library_location);

		foreach($result_data_consu->features as $item)
		{
		if(in_array($item->properties->BEZIRK, $distr_code))
		{

		$coordinate_consu=json_encode($item->geometry->coordinates,TRUE);

		$goeid=json_encode($item->id,TRUE);
		$name=json_encode($item->properties->NAME,TRUE);
		$address=json_encode($item->properties->ADRESSE,TRUE);
		$weblink=json_encode($item->properties->WEBLINK1,TRUE);
		$email=json_encode($item->properties->EMAIL,TRUE);
		$phone=json_encode($item->properties->TELEFON,TRUE);
		$dist_code=json_encode($item->properties->BEZIRK,TRUE);
		
		$data_consu=array('goeid'=>$goeid,'coordinates'=>$coordinate_consu,'name'=>$name,'address'=>$address,'weblink'=>$weblink,'email'=>$email,'phone' =>$phone,'cat'=>'Library Locations','dist_code' =>$dist_code);

			array_push($datasets,$data_consu);

			}
			}
  
	//museums locations		
	$museum_location = file_get_contents('http://data.wien.gv.at/daten/geo?service=WFS&request=GetFeature&version=1.1.0&typeName=ogdwien:MUSEUMOGD&srsName=EPSG:4326&outputFormat=json');
	
		$result_data_consu = json_decode($museum_location);

		foreach($result_data_consu->features as $item)
		{
		if(in_array($item->properties->BEZIRK, $distr_code))
		{

		$coordinate_consu=json_encode($item->geometry->coordinates,TRUE);

		$goeid=json_encode($item->id,TRUE);
		$name=json_encode($item->properties->NAME,TRUE);
		$address=json_encode($item->properties->ADRESSE,TRUE);
		$weblink='';//json_encode($item->properties->WEBLINK1,TRUE);
		$email='';//json_encode($item->properties->EMAIL,TRUE);
		$phone='';//json_encode($item->properties->TELEFON,TRUE);
		$dist_code=json_encode($item->properties->BEZIRK,TRUE);
		
		$data_consu=array('goeid'=>$goeid,'coordinates'=>$coordinate_consu,'name'=>$name,'address'=>$address,'weblink'=>$weblink,'email'=>$email,'phone' =>$phone,'cat'=>'Museums Locations','dist_code' =>$dist_code);

			array_push($datasets,$data_consu);

			}
			}
   
	//Musik locations		
	$musik_location = file_get_contents('http://data.wien.gv.at/daten/geo?service=WFS&request=GetFeature&version=1.1.0&typeName=ogdwien:MUSIKSINGSCHULEOGD&srsName=EPSG:4326&outputFormat=json');
	
		$result_data_consu = json_decode($musik_location);

		foreach($result_data_consu->features as $item)
		{
		if(in_array($item->properties->BEZIRK, $distr_code))
		{

		$coordinate_consu=json_encode($item->geometry->coordinates,TRUE);

		$goeid=json_encode($item->id,TRUE);
		$name=json_encode($item->properties->NAME,TRUE);
		$address=json_encode($item->properties->ADRESSE,TRUE);
		$weblink=json_encode($item->properties->WEBLINK1,TRUE);
		$email=json_encode($item->properties->EMAIL,TRUE);
		$phone=json_encode($item->properties->TELEFON,TRUE);
		$dist_code=json_encode($item->properties->BEZIRK,TRUE);
		
		$data_consu=array('goeid'=>$goeid,'coordinates'=>$coordinate_consu,'name'=>$name,'address'=>$address,'weblink'=>$weblink,'email'=>$email,'phone' =>$phone,'cat'=>'Musik Locations','dist_code' =>$dist_code);

			array_push($datasets,$data_consu);

			}
			}
 
	//parking locations		
	$parking_location = file_get_contents('http://data.wien.gv.at/daten/geo?service=WFS&request=GetFeature&version=1.1.0&typeName=ogdwien:PARKANLAGEOGD&srsName=EPSG:4326&outputFormat=json');
	
		$result_data_consu = json_decode($parking_location);

		foreach($result_data_consu->features as $item)
		{
		if(in_array($item->properties->BEZIRK, $distr_code))
		{

		$coordinate_consu=json_encode($item->geometry->coordinates,TRUE);

		$goeid=json_encode($item->id,TRUE);
		$name=json_encode($item->properties->PARKANLAGE,TRUE);
		$address=json_encode($item->properties->FLAECHE,TRUE);
		$weblink='';//json_encode($item->properties->WEBLINK1,TRUE);
		$email='';//json_encode($item->properties->EMAIL,TRUE);
		$phone=json_encode($item->properties->TELEFON,TRUE);
		$dist_code=json_encode($item->properties->BEZIRK,TRUE);
		
		$data_consu=array('goeid'=>$goeid,'coordinates'=>$coordinate_consu,'name'=>$name,'address'=>$address,'weblink'=>$weblink,'email'=>$email,'phone' =>$phone,'cat'=>'Parking Locations','dist_code' =>$dist_code);

			array_push($datasets,$data_consu);

			}
			}
   
//swimming pool locations		
	$swipping_location = file_get_contents('http://data.wien.gv.at/daten/geo?service=WFS&request=GetFeature&version=1.1.0&typeName=ogdwien:SCHWIMMBADOGD&srsName=EPSG:4326&outputFormat=json');
	
		$result_data_consu = json_decode($swipping_location);

		foreach($result_data_consu->features as $item)
		{
		if(in_array($item->properties->BEZIRK, $distr_code))
		{

		$coordinate_consu=json_encode($item->geometry->coordinates,TRUE);

		$goeid=json_encode($item->id,TRUE);
		$name=json_encode($item->properties->NAME,TRUE);
		$address=json_encode($item->properties->ADRESSE,TRUE);
		$weblink=json_encode($item->properties->WEBLINK1,TRUE);
		$email='';//json_encode($item->properties->EMAIL,TRUE);
		$phone='';//json_encode($item->properties->TELEFON,TRUE);
		$dist_code=json_encode($item->properties->BEZIRK,TRUE);
		
		$data_consu=array('goeid'=>$goeid,'coordinates'=>$coordinate_consu,'name'=>$name,'address'=>$address,'weblink'=>$weblink,'email'=>$email,'phone' =>$phone,'cat'=>'Swimming Pool','dist_code' =>$dist_code);

			array_push($datasets,$data_consu);

			}
			}
     
//social market locations		
	$socialmarket_location = file_get_contents('http://data.wien.gv.at/daten/geo?service=WFS&request=GetFeature&version=1.1.0&typeName=ogdwien:SOZIALMARKTOGD&srsName=EPSG:4326&outputFormat=json');
	
		$result_data_consu = json_decode($socialmarket_location);
		foreach($result_data_consu->features as $item)
		{
			
		if(in_array($item->properties->BEZIRK, $distr_code))
		{
		$coordinate_consu=json_encode($item->geometry->coordinates,TRUE);

		$goeid=json_encode($item->id,TRUE);
		$name=json_encode($item->properties->BEZEICHNUNG,TRUE);
		$address=json_encode($item->properties->ADRESSE,TRUE);
		$weblink=json_encode($item->properties->WEBLINK1,TRUE);
		$email='';//json_encode($item->properties->EMAIL,TRUE);
		$phone='';//json_encode($item->properties->TELEFON,TRUE);
		$dist_code=json_encode($item->properties->BEZIRK,TRUE);
		
		$data_consu=array('goeid'=>$goeid,'coordinates'=>$coordinate_consu,'name'=>$name,'address'=>$address,'weblink'=>$weblink,'email'=>$email,'phone' =>$phone,'cat'=>'Social Market Locations','dist_code' =>$dist_code);

			array_push($datasets,$data_consu);

			}
			}
		//print_r(array_values($datasets));

 
//residential and nursing locations		
	$residential_nursing_location = file_get_contents('http://data.wien.gv.at/daten/geo?service=WFS&request=GetFeature&version=1.1.0&typeName=ogdwien:WOHNPFLEGEHAUSOGD&srsName=EPSG:4326&outputFormat=json');
	
		$result_data_consu = json_decode($residential_nursing_location);

		foreach($result_data_consu->features as $item)
		{
		if(in_array($item->properties->BEZIRK, $distr_code))
		{

		$coordinate_consu=json_encode($item->geometry->coordinates,TRUE);

		$goeid=json_encode($item->id,TRUE);
		$name=json_encode($item->properties->BEZEICHNUNG,TRUE);
		$address=json_encode($item->properties->ADRESSE,TRUE);
		$weblink=json_encode($item->properties->WEBLINK1,TRUE);
		$email='';//json_encode($item->properties->EMAIL,TRUE);
		$phone='';//json_encode($item->properties->TELEFON,TRUE);
		$dist_code=json_encode($item->properties->BEZIRK,TRUE);
		
		$data_consu=array('goeid'=>$goeid,'coordinates'=>$coordinate_consu,'name'=>$name,'address'=>$address,'weblink'=>$weblink,'email'=>$email,'phone' =>$phone,'cat'=>'Residential and Nursing','dist_code' =>$dist_code);

			array_push($datasets,$data_consu);

			}
			}

	//vaccination locations		
	$vaccination_location = file_get_contents('http://data.wien.gv.at/daten/geo?service=WFS&request=GetFeature&version=1.1.0&typeName=ogdwien:IMPFSTELLEOGD&srsName=EPSG:4326&outputFormat=json');
	
		$result_data_consu = json_decode($vaccination_location);

		foreach($result_data_consu->features as $item)
		{
		if(in_array($item->properties->BEZIRK, $distr_code))
		{

		$coordinate_consu=json_encode($item->geometry->coordinates,TRUE);

		$goeid=json_encode($item->id,TRUE);
		$name=json_encode($item->properties->BEZEICHNUNG,TRUE);
		$address=json_encode($item->properties->ADRESSE,TRUE);
		$weblink=json_encode($item->properties->WEBLINK1,TRUE);
		$email='';//json_encode($item->properties->EMAIL,TRUE);
		$phone='';//json_encode($item->properties->TELEFON,TRUE);
		$dist_code=json_encode($item->properties->BEZIRK,TRUE);
		
		$data_consu=array('goeid'=>$goeid,'coordinates'=>$coordinate_consu,'name'=>$name,'address'=>$address,'weblink'=>$weblink,'email'=>$email,'phone' =>$phone,'cat'=>'Vaccination Locations','dist_code' =>$dist_code);

			array_push($datasets,$data_consu);

			}
			}

	//bicycle parking locations		
	$bicycle_location = file_get_contents('http://data.wien.gv.at/daten/geo?service=WFS&request=GetFeature&version=1.1.0&typeName=ogdwien:FAHRRADABSTELLANLAGEOGD&srsName=EPSG:4326&outputFormat=json');
	
		$result_data_consu = json_decode($bicycle_location);

		foreach($result_data_consu->features as $item)
		{
		if(in_array($item->properties->BEZIRK, $distr_code))
		{

		$coordinate_consu=json_encode($item->geometry->coordinates,TRUE);

		$goeid=json_encode($item->id,TRUE);
		$name=json_encode($item->properties->ADRESSE,TRUE);
		$address=json_encode($item->properties->ADRESSE,TRUE);
		$weblink='';//json_encode($item->properties->WEBLINK1,TRUE);
		$email='';//json_encode($item->properties->EMAIL,TRUE);
		$phone='';//json_encode($item->properties->TELEFON,TRUE);
		$dist_code=json_encode($item->properties->BEZIRK,TRUE);
		
		$data_consu=array('goeid'=>$goeid,'coordinates'=>$coordinate_consu,'name'=>$name,'address'=>$address,'weblink'=>$weblink,'email'=>$email,'phone' =>$phone,'cat'=>'Bicycle Parking Locations','dist_code' =>$dist_code);

			array_push($datasets,$data_consu);

			}
			}

		?>
