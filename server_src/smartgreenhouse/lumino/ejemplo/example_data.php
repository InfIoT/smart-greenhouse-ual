<?php
$pie_chart_data=array(
					array(
						array('Heavy Industry', 12),
						array('Retail', 9),
						array('Light Industry', 14),
						array('Out of home', 16),
						array('Commuting', 7),
						array('Orientation', 9)));
						
$linebar_chart_data = 
array(
				array(
					array("Jan",8.25),
					array("Feb",138.75),
					array("Mar",85.50),
					array("Apr",370.50),
					array("May",266.80),
					array("Jun",500))
					);
					
$line_chart_data=array(
				array(
					array("Jan",48.25),
					array("Feb",238.75),
					array("Mar",95.50),
					array("Apr",300.50),
					array("May",286.80),
					array("Jun",400)),
				array(
					array("Jan",300.25),
					array("Feb",225.75),
					array("Mar",44.50),
					array("Apr",259.50),
					array("May",250.80),
					array("Jun",300)),
				array(
					array("Jan",148.25),
					array("Feb",248.75),
					array("Mar",195.50),
					array("Apr",230.50),
					array("May",260.80),
					array("Jun",365)),
				array(
					array("Jan",256.25),
					array("Feb",125.75),
					array("Mar",344.50),
					array("Apr",299.50),
					array("May",150.80),
					array("Jun",370))
					);
					
// HEATMAP DATA
// $heatmap_chart_data= array(
						// array(71, 62, 73, 61, 75, 64),
						// array(60, 65, 60, 75, 45, 74),
						// array(75, 45, 51, 54, 72, 37),
						// array(51, 40, 67, 36, 62, 43),
						// array(60, 46, 61, 47, 32, 56),
						// array(41, 54, 60, 64, 43, 53), 
						// array(51, 44, 43, 53, 31, 36),
						// array(40, 31, 36, 33, 34, 45),
						// array(30, 34, 41, 31, 35, 49)
						// );
$heatmap_chart_data = array();
for($a=0;$a<10;$a++)
	for($b=0;$b<25;$b++)
		$heatmap_chart_data[$a][$b] = rand(0,99);
		
$donut_chart_data=array(array(
					array('Mango',6), 
					array('Apple',8), 
					array('Kiwi',14), 
					array('Pear',20)
					));

$candlestick_chart_data = array(array(
				 array("2017-01-04",116.019997,116.510002,115.75,115.849998),
				 array("2017-01-05",116.610001,116.860001,115.809998,115.919998),
				 array("2017-01-06",117.910004,118.160004,116.470001,116.779999),
				 array("2017-01-09",118.989998,119.43,117.940002,117.949997),
				 array("2017-01-10",119.110001,119.379997,118.300003,118.769997),
				 array("2017-01-11",119.75,119.93,118.599998,118.739998),
				 array("2017-01-12",119.25,119.300003,118.209999,118.900002),
				 array("2017-01-13",119.040001,119.620003,118.809998,119.110001),
				 array("2017-01-17",120,120.239998,118.220001,118.339996),
				 array("2017-01-18",119.989998,120.5,119.709999,120),
				 array("2017-01-19",120.610001,120.860001,119.809998,120.919998),
				 array("2017-01-20",121.910004,121.160004,121.470001,120.779999),
				 array("2017-01-22",121.989998,121.43,121.940002,121.949997),
				 array("2017-01-23",122.110001,121.379997,122.300003,121.769997),
				 array("2017-01-25",122.75,122.93,122.599998,122.739998),
				 array("2017-01-27",122.25,122.300003,122.209999,121.900002),
				 array("2017-01-28",123.040001,123.620003,122.809998,122.110001),
				 array("2017-01-30",123,123.239998,123.220001,123.339996),
				 array("2017-01-31",123.989998,123.5,123.709999,121),
				 array("2017-02-01",124.75,124.93,123.599998,123.739998),
				 array("2017-02-02",124.25,125.300003,125.209999,124.900002),
				 array("2017-02-03",125.040001,125.620003,126.809998,127.110001),
				 array("2017-02-04",126,126.239998,126.220001,127.339996),
				 array("2017-02-05",127.989998,126.5,127.709999,128),
				 array("2017-02-06",127.610001,126.860001,127.809998,128.919998),
				 array("2017-02-07",128.910004,128.160004,128.470001,129.779999),
				 array("2017-02-08",129.989998,129.43,129.940002,130.949997),
				 array("2017-02-09",130.110001,130.379997,131.300003,131.769997),
				 array("2017-02-10",131.75,131.93,131.599998,132.739998),
				 array("2017-02-11",132.25,132.300003,131.209999,132.900002),
				 array("2017-02-12",133.289993,133.820007,132.75,133.080002),
				 array("2017-02-13",135.020004,135.089996,133.25,133.470001),
				 array("2017-02-15",135.509995,136.270004,134.619995,135.520004)
				 ));

$bar_stacked_data = 
array(
	array(
		array('Hybrid',6), 
		array('SUV',3), 
		array('Sedan',7), 
		array('Mini Van',5), 
		array('Wagon',8),
		array('Coupe',9), 
		array('Truck',3)
		), 
	array(
		array('Hybrid',7), 
		array('SUV',5), 
		array('Sedan',3), 
		array('Mini Van',3), 
		array('Wagon',1), 
		array('Coupe',8), 
		array('Truck',7)
		), 
	array(
		array('Hybrid',5), 
		array('SUV',9), 
		array('Sedan',9), 
		array('Mini Van',8), 
		array('Wagon',3), 
		array('Coupe',5), 
		array('Truck',9)
		), 					
	array(
		array('Hybrid',9), 
		array('SUV',6), 
		array('Sedan',5), 
		array('Mini Van',8), 
		array('Wagon',7), 
		array('Coupe',6),
		array('Truck',2)
		)
);

$bar_grouped_chart_data = 
array(
	array(
		array('Hybrid',60), 
		array('SUV',34), 
		array('Convertible',55), 
		array('Sedan',77), 
		array('Mini Van',50), 
		array('Wagon',84), 
		array('Coupe',98), 
		array('MPV',54), 
		array('Crossover',78), 
		array('Hatchback',34), 
		array('Truck',23),
	),
	array(
		array('Hybrid',43), 
		array('SUV',53), 
		array('Convertible',59), 
		array('Sedan',35), 
		array('Mini Van',37), 
		array('Wagon',10), 
		array('Coupe',37), 
		array('MPV',45), 
		array('Crossover',98), 
		array('Hatchback',64), 
		array('Truck',87), 
	),
	array(
		array('Hybrid',75), 
		array('SUV',59), 
		array('Convertible',45), 
		array('Sedan',63), 
		array('Mini Van',43), 
		array('Wagon',60), 
		array('Coupe',50), 
		array('MPV',65), 
		array('Crossover',90), 
		array('Hatchback',44), 		
		array('Truck',49)
	),
	array(
		array('Hybrid',55), 
		array('SUV',69), 
		array('Convertible',75), 
		array('Sedan',95), 
		array('Mini Van',88), 
		array('Wagon',73), 
		array('Coupe',76), 
		array('MPV',67), 
		array('Crossover',34), 
		array('Hatchback',84), 		
		array('Truck',62),
	)
);
				
$bar_chart_data = 
array(
	array(
		array("2010/12",48.25),
		array("2011/01",238.75),
		array("2011/02",95.50),
		array("2011/03",300.50),
		array("2011/04",286.80),
		array("2011/05",148.25),
		array("2011/06",128.75),
		array("2011/07",95.50),
		array("2011/08",200.50),
		array("2011/09",216.80),
		array("2011/10",248.25),
		array("2011/11",148.25),
		array("2011/12",318.75),
		array("2012/01",295.50),
		array("2012/02",30.50),
		array("2012/03",236.80),
		array("2012/04",367)
		)
	);
	
$area_chart_data=
array(
	array(
		array("Jan",348.25),
		array("Feb",338.75),
		array("Mar",395.50),
		array("Apr",330.50),
		array("May",326.80),
		array("Jun",400)),
	array(	
		array("Jan",300.25),
		array("Feb",225.75),
		array("Mar",440.50),
		array("Apr",259.50),
		array("May",350.80),
		array("Jun",360)),
	array(
		array("Jan",220.25),
		array("Feb",338.75),
		array("Mar",315.50),
		array("Apr",330.50),
		array("May",267.80),
		array("Jun",340)),

	array(	
		array("Jan",300.25),
		array("Feb",325.75),
		array("Mar",344.50),
		array("Apr",270.50),
		array("May",320.80),
		array("Jun",300))		
	);
	
// $p->shape = "vhv"; // vhv, hvh, vh, hv, spline

// candle stick data
$rangestart='2017-01-03 12:00'; 
$rangeend='2017-02-15 12:00'; 
$rangesliderstart='2017-01-03 12:00';
$rangesliderend='2017-02-15 12:00';
$rangetitle= 'Date'; 
$rangetype= 'date';
$yrangestart=114.609999778;
$yrangeend=137.410004222; 
//$p->decreasing_line_color = "#7F7F7F";  //Optional
//$p->increasing_line_color = "#17BECF";  //Optional
//$p->series_label = array("Team1");	  //Optional

// bubble chart data
$bubble_chart_data=
array(
	array(
	array(43.828,974.5803384,31889923,"Afghanistan"),
	array(75.635,29796.04834,708573,"Bahrain"),
	array(64.062,1391.253792,150448339,"Bangladesh"),
	array(59.723,1713.778686,14131858,"Cambodia"),
	array(72.961,4959.114854,1318683096,"China"),
	array(82.208,39724.97867,6980412,"Hong Kong, China"),
	array(64.698,2452.210407,1110396331,"India"),
	array(70.65,3540.651564,223547000,"Indonesia"),
	array(70.964,11605.71449,69453570,"Iran"),
	array(59.545,4471.061906,27499638,"Iraq"),
	array(80.745,25523.2771,6426679,"Israel"),
	array(82.603,31656.06806,127467972,"Japan"),
	array(72.535,4519.461171,6053193,"Jordan"),
	array(78.623,23348.13973,49044790,"Korea, Rep."),
	array(77.588,47306.98978,2505559,"Kuwait"),
	array(71.993,10461.05868,3921278,"Lebanon"),
	array(74.241,12451.6558,24821286,"Malaysia"),
	array(66.803,3095.772271,2874127,"Mongolia"),
	array(62.069,944,47761980,"Myanmar"),
	array(63.785,1091.359778,28901790,"Nepal"),
	array(75.64,22316.19287,3204897,"Oman"),
	array(65.483,2605.94758,169270617,"Pakistan"),
	array(71.688,3190.481016,91077287,"Philippines"),
	array(72.777,21654.83194,27601038,"Saudi Arabia"),
	array(79.972,47143.17964,4553009,"Singapore"),
	array(72.396,3970.095407,20378239,"Sri Lanka"),	
	array(74.143,4184.548089,19314747,"Syria"),
	array(78.4,28718.27684,23174294,"Taiwan"),
	array(70.616,7458.396327,65068149,"Thailand"),
	array(74.249,2441.576404,85262356,"Vietnam"),
	array(73.422,3025.349798,4018332,"West Bank and Gaza"),
	array(62.698,2280.769906,22211743,"Yemen, Rep.")
	),
	array(array(76.423,5937.029526,3600523,"Albania"),
	array(79.829,36126.4927,8199783,"Austria"),
	array(79.441,33692.60508,10392226,"Belgium"),
	array(74.852,7446.298803,4552198,"Bosnia and Herzegovina"),
	array(73.005,10680.79282,7322858,"Bulgaria"),
	array(75.748,14619.22272,4493312,"Croatia"),
	array(76.486,22833.30851,10228744,"Czech Republic"),
	array(78.332,35278.41874,5468120,"Denmark"),
	array(79.313,33207.0844,5238460,"Finland"),
	array(80.657,30470.0167,61083916,"France"),
	array(79.406,32170.37442,82400996,"Germany"),
	array(79.483,27538.41188,10706290,"Greece"),
	array(73.338,18008.94444,9956108,"Hungary"),
	array(81.757,36180.78919,301931,"Iceland"),
	array(78.885,40675.99635,4109086,"Ireland"),
	array(80.546,28569.7197,58147733,"Italy"),
	array(74.543,9253.896111,684736,"Montenegro"),
	array(79.762,36797.93332,16570613,"Netherlands"),
	array(80.196,49357.19017,4627926,"Norway"),
	array(75.563,15389.92468,38518241,"Poland"),
	array(78.098,20509.64777,10642836,"Portugal"),
	array(74.002,9786.534714,10150265,"Serbia"),
	array(74.663,18678.31435,5447502,"Slovak Republic"),
	array(77.926,25768.25759,2009245,"Slovenia"),
	array(72.476,10808.47561,22276056,"Romania"),
	array(80.941,28821.0637,40448191,"Spain"),
	array(80.884,33859.74835,9031088,"Sweden"),
	array(81.701,37506.41907,7554661,"Switzerland"),
	array(71.777,8458.276384,71158647,"Turkey"),
	array(79.425,33203.26128,60776238,"United Kingdom")
	),
	array(
	array(72.301,6223.367465,33333216,"Algeria"),
	array(42.731,4797.231267,12420476,"Angola"),
	array(56.728,1441.284873,8078314,"Benin"),
	array(50.728,12569.85177,1639131,"Botswana"),
	array(52.295,1217.032994,14326203,"Burkina Faso"),
	array(49.58,430.0706916,8390505,"Burundi"),
	array(50.43,2042.09524,17696293,"Cameroon"),
	array(44.741,706.016537,4369038,"Central African Republic"),
	array(50.651,1704.063724,10238807,"Chad"),
	array(65.152,986.1478792,710960,"Comoros"),
	array(55.322,3632.557798,3800610,"Congo, Rep."),
	array(48.328,1544.750112,18013409,"Cote d'Ivoire"),
	array(54.791,2082.481567,496374,"Djibouti"),
	array(71.338,5581.180998,80264543,"Egypt"),
	array(51.579,12154.08975,551201,"Equatorial Guinea"),
	array(58.04,641.3695236,4906585,"Eritrea"),
	array(52.947,690.8055759,76511887,"Ethiopia"),
	array(56.735,13206.48452,1454867,"Gabon"),
	array(59.448,752.7497265,1688359,"Gambia"),
	array(60.022,1327.60891,22873338,"Ghana"),
	array(46.388,579.231743,1472041,"Guinea-Bissau"),
	array(54.11,1463.249282,35610177,"Kenya"),
	array(42.592,1569.331442,2012649,"Lesotho"),
	array(45.678,414.5073415,3193942,"Liberia"),
	array(73.952,12057.49928,6036914,"Libya"),
	array(59.443,1044.770126,19167654,"Madagascar"),
	array(48.303,759.3499101,13327079,"Malawi"),
	array(54.467,1042.581557,12031795,"Mali"),
	array(64.164,1803.151496,3270065,"Mauritania"),
	array(72.801,10956.99112,1250882,"Mauritius"),
	array(71.164,3820.17523,33757175,"Morocco"),
	array(42.082,823.6856205,19951656,"Mozambique"),
	array(52.906,4811.060429,2055080,"Namibia"),
	array(56.867,619.6768924,12894865,"Niger"),
	array(46.859,2013.977305,135031164,"Nigeria"),
	array(76.442,7670.122558,798094,"Reunion"),
	array(46.242,863.0884639,8860588,"Rwanda"),
	array(65.528,1598.435089,199579,"Sao Tome and Principe"),
	array(63.062,1712.472136,12267493,"Senegal"),
	array(42.568,862.5407561,6144562,"Sierra Leone"),
	array(48.159,926.1410683,9118773,"Somalia"),
	array(49.339,9269.657808,43997828,"South Africa"),
	array(58.556,2602.394995,42292929,"Sudan"),
	array(39.613,4513.480643,1133066,"Swaziland"),
	array(52.517,1107.482182,38139640,"Tanzania"),
	array(58.42,882.9699438,5701579,"Togo"),
	array(73.923,7092.923025,10276158,"Tunisia"),
	array(51.542,1056.380121,29170398,"Uganda"),
	array(42.384,1271.211593,11746035,"Zambia"),
	array(43.487,469.7092981,12311143,"Zimbabwe"),
	),
	array(
	array(75.32,12779.37964,40301927,"Argentina"),
	array(65.554,3822.137084,9119152,"Bolivia"),
	array(72.39,9065.800825,190010647,"Brazil"),
	array(80.653,36319.23501,33390141,"Canada"),
	array(78.553,13171.63885,16284741,"Chile"),
	array(72.889,7006.580419,44227550,"Colombia"),
	array(78.782,9645.06142,4133884,"Costa Rica"),
	array(78.273,8948.102923,11416987,"Cuba"),
	array(72.235,6025.374752,9319622,"Dominican Republic"),
	array(74.994,6873.262326,13755680,"Ecuador"),
	array(71.878,5728.353514,6939688,"El Salvador"),
	array(70.259,5186.050003,12572928,"Guatemala"),
	array(60.916,1201.637154,8502814,"Haiti"),
	array(70.198,3548.330846,7483763,"Honduras"),
	array(72.567,7320.880262,2780132,"Jamaica"),
	array(76.195,11977.57496,108700891,"Mexico"),
	array(72.899,2749.320965,5675356,"Nicaragua"),
	array(75.537,9809.185636,3242173,"Panama"),
	array(71.752,4172.838464,6667147,"Paraguay"),
	array(71.421,7408.905561,28674757,"Peru"),
	array(78.746,19328.70901,3942491,"Puerto Rico"),
	array(69.819,18008.50924,1056608,"Trinidad and Tobago"),
	array(78.242,42951.65309,301139947,"United States"),
	array(76.384,10611.46299,3447496,"Uruguay"),
	array(73.747,11415.80569,26084662,"Venezuela"),
	),
	array(
	array(81.235,34435.36744,20434176,"Australia"),
	array(80.204,25185.00911,4115771,"New Zealand")
	)
);
