//intialization of source of marker
var src='';
var iconStyle = [new ol.style.Style({
    image: new ol.style.Icon(({
        scale: 0.7,
        rotateWithView: false,
        anchor: [0.5, 1],
        anchorXUnits: 'fraction',
        anchorYUnits: 'fraction',
        opacity: 1,
        color: '#4271AE',
        src: src
    })),
    zIndex: 5
})];

//adding each feature style
function flickrStyle(feature) {
    //show legend div
    var legend = document.getElementById("legend");
    legend.style.display = "block";

    if (feature.get('cat') === 'Driving School') {
        //legend cat
        document.getElementById("driving_school").style.display = "block";
        document.getElementById("driving_img").style.display = "block";
        src='images/marker_001.png'
        //alert('d');							
        return iconStyle;

    } else if (feature.get('cat') === 'Embassies and Consulates') {
        //legend embassy
        document.getElementById("emb_cons").style.display = "block";
        document.getElementById("emb_cons_img").style.display = "block";
        src='images/marker_002.png'
        return iconStyle;

    } else if (feature.get('cat') === 'Citybike Locations') {
        document.getElementById("citybike").style.display = "block";
        document.getElementById("citybike_img").style.display = "block";
        src='images/marker_003.png'
        return iconStyle;
    } else if (feature.get('cat') === 'Hospital Locations') {
        document.getElementById("hospital").style.display = "block";
        document.getElementById("hospital_img").style.display = "block";
        src='images/marker_004.png'
        return iconStyle;
    } else if (feature.get('cat') === 'Kindergarten') {
        document.getElementById("kind_garten").style.display = "block";
        document.getElementById("kind_garten_img").style.display = "block";
        src='images/marker_005.png'
        return iconStyle;
    } else if (feature.get('cat') === 'Library Locations') {
        document.getElementById("lib_loc").style.display = "block";
        document.getElementById("lib_loc_img").style.display = "block";
        src='images/marker_006.png'
        return iconStyle;
    } else if (feature.get('cat') === 'Museums Locations') {
        document.getElementById("Museums").style.display = "block";
        document.getElementById("Museums_img").style.display = "block";
        src='images/marker_007.png'
        return iconStyle;
    } else if (feature.get('cat') === 'Musik Locations') {
        document.getElementById("musik").style.display = "block";
        document.getElementById("musik_img").style.display = "block";
        src='images/marker_008.png'
        return iconStyle;
    } else if (feature.get('cat') === 'Parking Locations') {
        document.getElementById("park_loc").style.display = "block";
        document.getElementById("park_loc_img").style.display = "block";
        src='images/marker_009.png'
        return iconStyle;
    } else if (feature.get('cat') === 'Swimming Pool') {
        document.getElementById("siwimming").style.display = "block";
        document.getElementById("siwimming_img").style.display = "block";
        src='images/marker_010.png'
        return iconStyle;
    } else if (feature.get('cat') === 'Social Market Locations') {
        document.getElementById("social_market").style.display = "block";
        document.getElementById("social_market_img").style.display = "block";
        src='images/marker_011.png'
        return iconStyle;
    } else if (feature.get('cat') === 'Residential and Nursing') {
        document.getElementById("resi_nur_loc").style.display = "block";
        document.getElementById("resi_nur_loc_img").style.display = "block";
        src='images/marker_012.png'
        return iconStyle;
    } else if (feature.get('cat') === 'Vaccination Locations') {
        document.getElementById("Vacc_loc").style.display = "block";
        document.getElementById("Vacc_loc_img").style.display = "block";
        src='images/marker_013.png'
        return iconStyle;
    } //Bicycle Parking Locations' 
    else {
        document.getElementById("bicycle_loc").style.display = "block";
        document.getElementById("bicycle_loc_img").style.display = "block";
        src='images/marker_014.png'
        return iconStyle;
    } 
}