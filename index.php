<?php 
require('conn.php');
//list of districts name
require('district_bound_dataset.php');


?>

<html>

<head>
    <title>Vienna Districts</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="JScripts/LoadData.js"></script>
    <script type="text/javascript" src="JScripts/HideLegend.js"></script>
    <script type="text/javascript">
        //loading district and their boundaries
        LoadData();
        //hide category
        function ShowHideDiv(category) {
            var div_cat = document.getElementById("div_cat");
            div_cat.style.display = category.checked ? "block" : "none";

        }
    </script>

</head>

<body background="images/background.jpg">
    <br>
    <h2 align="center">Vienna Districts</h2>
    <!--List of district -->

    <table align="center">
        <tr>
            <td valign="top">
                <div>
                    <table>
                        <tr>
                            <td>
                                <div> <select name="districts" id="districts" multiple="multiple" size="14">
																					<option value="">Select District</option>
																					<?php  $result_data = json_decode($dist_boundary_str,TRUE);
																							$total_features=$result_data['totalFeatures' ];
																					
																							$total_features=$total_features-1;
																					
																								for ($x = 0; $x <= $total_features; $x++) {
																										
																									$distr_name_arr=$result_data['features'][$x]['properties']['NAMEG'];
																									$distr_code=$result_data['features'][$x]['properties']['BEZNR'];
																									  ?>
																					<option value=" <?php echo $distr_code; ?>"><?php echo $distr_name_arr; ?></option>
																					
																					
																					<?php 
																							}
																					?>
																		</select>

                                </div>
                            </td>
                            <td><button class="button" onclick="HideLegend();">GO</button></td>
                            <td>Category:<input type="checkbox" name="category" id="category" onclick="ShowHideDiv(this)"></td>
                        </tr>
                        <tr>
                            <td>
                                <div name="div_cat" id="div_cat" style="display: none"> <select name="cat" id="cat" size="14" multiple="multiple">
																					<option value="">Select Category</option>
																					<option value="Driving School">Driving School</option>
																					<option value="Embassies and Consulates">Embassies and Consulates</option>
																					<option value="Citybike Locations">Citybike Locations</option>
																					<option value="Hospital Locations">Hospital Locations</option>
																					<option value="Kindergarten">Kindergarten</option>
																					<option value="Library Locations">Library Locations</option>
																					<option value="Museums Locations">Museums Locations</option>
																					<option value="Musik Locations">Musik Locations</option>
																					<option value="Parking Locations">Parking Locations</option>
																					<option value="Swimming Pool">Swimming Pool Locations</option>
																					<option value="Social Market Locations">Social Market Locations</option>
																					<option value="Residential and Nursing">Residential and Nursing</option>
																					<option value="Vaccination Locations">Vaccination Locations</option>
																					<option value="Bicycle Parking Locations">Bicycle Parking Locations</option>
																					
																					</select>

                                </div>
                            </td>
                            <td>
                                <p>&nbsp;</p>
                            </td>

                        </tr>
                    </table>
                </div>
            </td>
            <td valign="top">
                <div id="wait" class="wait" align="center"><img id="loading" src="images/loading_001.gif" width="120px" height="120px" /></div>
                <div id="display_info" class="display_info"></div>
                <div id="legend" class="legend" style="display: none">
                    <h2>Legend</h2>
                    <table id="legend_tbl" class="legend_tbl" height="25px;">
                        <tr>
                            <td> <label id="label_cat" class="label_cat" style="display: block">Category:</label></td>
                            <td> <label id="driving_school" class="driving_school" style="display: none">Driving School</label></td>
                            <td> <label id="emb_cons" class="emb_cons" style="display: none">Embassies</label></td>
                            <td> <label id="citybike" class="citybike" style="display: none">City Bikes</label></td>
                            <td> <label id="hospital" class="hospital" style="display: none">Hospital</label></td>
                            <td> <label id="kind_garten" class="kind_garten" style="display: none">Kindergarten</label></td>
                            <td> <label id="lib_loc" class="lib_loc" style="display: none">Library</label></td>
                            <td> <label id="Museums" class="Museums" style="display: none">Museums</label></td>
                            <td> <label id="musik" class="musik" style="display: none">Musik</label></td>
                            <td> <label id="park_loc" class="park_loc" style="display: none">Parking</label></td>
                            <td> <label id="siwimming" class="siwimming" style="display: none">Siwimming</label></td>
                            <td> <label id="social_market" class="social_market" style="display: none">Social Market</label></td>
                            <td> <label id="resi_nur_loc" class="resi_nur_loc" style="display: none">Residential</label></td>
                            <td> <label id="Vacc_loc" class="Vacc_loc" style="display: none">Vaccination</label></td>
                            <td> <label id="bicycle_loc" class="bicycle_loc" style="display: none">Bicycle</label></td>
                        </tr>
                        <tr>
                            <td> <label id="label_img" class="label_img" style="display: block">Legend:</label></td>
                            <td align="center"> <label id="driving_img" class="driving_img" style="display: none"><img src="images/marker_001.png" height="25px" /></label></td>
                            <td align="center"> <label id="emb_cons_img" class="emb_cons_img" style="display: none"><img src="images/marker_002.png" height="25px" /></label></td>
                            <td align="center"> <label id="citybike_img" class="citybike_img" style="display: none"><img src="images/marker_003.png" height="25px" /></label></td>
                            <td align="center"> <label id="hospital_img" class="hospital_img" style="display: none"><img src="images/marker_004.png" height="25px" /></label></td>
                            <td align="center"> <label id="kind_garten_img" class="kind_garten_img" style="display: none"><img src="images/marker_005.png" height="25px" /></label></td>
                            <td align="center"> <label id="lib_loc_img" class="lib_loc_img" style="display: none"><img src="images/marker_006.png" height="25px" /></label></td>
                            <td align="center"> <label id="Museums_img" class="Museums_img" style="display: none"><img src="images/marker_007.png" height="25px" /></label></td>
                            <td align="center"> <label id="musik_img" class="musik_img" style="display: none"><img src="images/marker_008.png" height="25px" /></label></td>
                            <td align="center"> <label id="park_loc_img" class="park_loc_img" style="display: none"><img src="images/marker_009.png" height="25px" /></label></td>
                            <td align="center"> <label id="siwimming_img" class="siwimming_img" style="display: none"><img src="images/marker_010.png" height="25px" /></label></td>
                            <td align="center"> <label id="social_market_img" class="social_market_img" style="display: none"><img src="images/marker_011.png" height="25px" /></label></td>
                            <td align="center"> <label id="resi_nur_loc_img" class="resi_nur_loc_img" style="display: none"><img src="images/marker_012.png" height="25px" /></label></td>
                            <td align="center"> <label id="Vacc_loc_img" class="Vacc_loc_img" style="display: none"><img src="images/marker_013.png" height="25px" /></label></td>
                            <td align="center"> <label id="bicycle_loc_img" class="bicycle_loc_img" style="display: none"><img src="images/marker_014.png" height="25px" /></label></td>
                        </tr>

                    </table>
                </div>

            </td>
        </tr>
    </table>
</body>

</html>