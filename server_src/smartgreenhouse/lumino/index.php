<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Smart-greenhouse-ual</title>
	<link href="/smartgreenhouse/lumino/css/bootstrap.min.css" rel="stylesheet">
	<link href="/smartgreenhouse/lumino/css/font-awesome.min.css" rel="stylesheet">
	<link href="/smartgreenhouse/lumino/css/datepicker3.css" rel="stylesheet">
	<link href="/smartgreenhouse/lumino/css/styles.css" rel="stylesheet">
	<link rel="stylesheet" href="/smartgreenhouse/lumino/lib/js/chartphp.css">
	<script src="/smartgreenhouse/lumino/lib/js/jquery.min.js"></script>
	<script src="/smartgreenhouse/lumino/lib/js/chartphp.js"></script>
	<script src="/smartgreenhouse/lumino/js/zingchart.min.js"></script>
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
<style>
	#titleSpan {
		font-size: 20px;
	}
	#botones {
		position:relative;
    	left:25%;
	}
</style>
</head>
<body>

	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><span>UAL</span>Smart-Greenhouse</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div class="col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Estación Externa</h1>
			</div>
		</div><!--/.row-->
		<?php 
		$link = mysqli_connect('localhost', 'root','infraiot','infraiot')
		    or die('No se pudo conectar');
		mysqli_select_db($link,'infraiot') or die('No se pudo seleccionar la base de datos');

		// Realizar una consulta MySQL
		$query = "SELECT TEMPEXT, HUMEXT, PRESEXT, LUMINOSIDAD  FROM datos ORDER BY id DESC LIMIT 1";
		$result = mysqli_query($link,$query) or die('Consulta fallida');

		while ($columna = mysqli_fetch_array( $result))
		{
		
			?>
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
					<p id="titleSpan">Temperatura<p>
					<div class="easypiechart"><span class="percent"><?php echo round($columna['TEMPEXT'],2);?> ºC</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default" id="pa">
					<div class="panel-body easypiechart-panel">
					<p id="titleSpan">Humedad<p>
						<div class="easypiechart"><span class="percent"><?php echo round($columna['HUMEXT'],2);?> %</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
					<p id="titleSpan">Presión<p>
						<div class="easypiechart"><span class="percent"><?php echo round($columna['PRESEXT'],2);?> Pa</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
					<p id="titleSpan">Luminosidad<p>
						<div class="easypiechart"><span class="percent"><?php echo round($columna['LUMINOSIDAD']);?> Luxes</span></div>
					</div>
				</div>
			</div>
		</div>
		<?php
		}
		?><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Evolución 
						</div>
					<div class="panel-body">
						<div class="canvas-wrapper" id="L">
							
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->

	</div><!--/.row-->
	<div class="col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Estación Interna</h1>
			</div>
		</div><!--/.row-->
		<?php 
		// Realizar una consulta MySQL
		$queryIn = "SELECT BMETEMP, BMEPRES, BMEHUM, HUMSUELO, TEMPSUELO FROM datos ORDER BY id DESC LIMIT 1";
		$resultIn = mysqli_query($link,$queryIn) or die('Consulta fallida');

		while ($columnaIn = mysqli_fetch_array( $resultIn))
		{
		
			?>
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
					<p id="titleSpan">Temperatura<p>
					<div class="easypiechart"><span class="percent"><?php echo round($columnaIn['BMETEMP'],2);?> ºC</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
					<p id="titleSpan">Humedad<p>
						<div class="easypiechart"><span class="percent"><?php echo round($columnaIn['BMEHUM'],2);?> %</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
					<p id="titleSpan">Presión<p>
						<div class="easypiechart"><span class="percent"><?php echo round($columnaIn['BMEPRES'],2);?> Pa</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
					<p id="titleSpan">Humedad Suelo<p>
						<div class="easypiechart"><span class="percent"><?php echo round($columnaIn['HUMSUELO'],2);?> %</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
					<p id="titleSpan">Temperatura Suelo<p>
						<div class="easypiechart"><span class="percent"><?php echo round($columnaIn['TEMPSUELO'],2);?> ºC</span></div>
					</div>
				</div>
			</div>
		</div>
		<?php
		}
		?><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Evolución
						</div>
					<div class="panel-body">
						<div class="canvas-wrapper" id="Li">
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		</div>
	<div class="col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Comparación</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Temp. Exterior/ Temp. Interior
						</div>
					<div class="panel-body">
						<div class="canvas-wrapper" id="L2">
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Hum. Exterior/ Hum. Interior
						</div>
					<div class="panel-body">
						<div class="canvas-wrapper" id="L3">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Pres. Exterior/ Pres. Interior
						</div>
					<div class="panel-body">
						<div class="canvas-wrapper" id="L4">
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Actuadores
						</div>
					<div class="panel-body" id="botones">
						<?php
						    if (isset($_POST['button']))    {
						         $a- exec("sudo python /var/www/html/smartgreenhouse/abrirVentanaMedio.py");
							 echo $a;
						    }

						    if (isset($_POST['button1']))    {
						         $a- exec("sudo python /var/www/html/smartgreenhouse/abrirVentanaMucho.py");
							 echo $a;
						    }

						    if (isset($_POST['button2']))    {
						         $a- exec("sudo python /var/www/html/smartgreenhouse/cerrarVentana.py");
							 echo $a;
						    }

						    if (isset($_POST['button3']))    {
						         $a- exec("sudo python /var/www/html/smartgreenhouse/activa_riego.py");
							 echo $a;
						    }

						    if (isset($_POST['button4']))    {
						         $a- exec("sudo python /var/www/html/smartgreenhouse/desactiva_riego.py");
							 echo $a;
						    }

						    if (isset($_POST['button5']))    {
						         $a- exec("sudo python /var/www/html/smartgreenhouse/activa_calefaccion.py");
							 echo $a;
						    }

						    if (isset($_POST['button6']))    {
						         $a- exec("sudo python /var/www/html/smartgreenhouse/desactiva_calefaccion.py");
							 echo $a;
						    }
						
						?>

						<form method="post">
						    <p>
							<button name="button" class="btn btn-primary" >Abrir ventana (mitad)</button>
						    </p>
						    <p>
							<button name="button1" class="btn btn-primary" >Abrir ventana</button>
						    </p>
						    <p>
							<button name="button2" class="btn btn-primary" >Cerrar ventana</button>
						    </p>
						    <p>
							<button name="button3" class="btn btn-primary" >Activar riego</button>
						    </p>
						    <p>
							<button name="button4" class="btn btn-primary" >Desactivar riego</button>
						    </p>
						    <p>
							<button name="button5" class="btn btn-primary" >Activar calefacción</button>
						    </p>
						    <p>
							<button name="button6" class="btn btn-primary" >Desactivar calefacción</button>
						    </p>
						    </form>
						</div>
					</div>
				</div>
			</div>
			</div><!--/.row-->	
	</div>	<!--/.main-->
	<?php 
		$mysqli = new mysqli("localhost", "root", "infraiot", "infraiot");
		 
		
		if (mysqli_connect_errno()) {
		    printf("Connect failed: %s\n", mysqli_connect_error());
		    exit();
		}
		 
		
		$datat=mysqli_query($mysqli,"SELECT BMETEMP, BMEHUM, BMEPRES, HUMSUELO, TEMPSUELO FROM datos");
		$datah=mysqli_query($mysqli,"SELECT BMETEMP, BMEHUM, BMEPRES, HUMSUELO, TEMPSUELO FROM datos");
		$datap=mysqli_query($mysqli,"SELECT BMETEMP, BMEHUM, BMEPRES, HUMSUELO, TEMPSUELO FROM datos");
		$datahs=mysqli_query($mysqli,"SELECT BMETEMP, BMEHUM, BMEPRES, HUMSUELO, TEMPSUELO FROM datos");
		$datats=mysqli_query($mysqli,"SELECT BMETEMP, BMEHUM, BMEPRES, HUMSUELO, TEMPSUELO FROM datos");
		$tempext=mysqli_query($mysqli,"SELECT TEMPEXT, PRESEXT, HUMEXT, LUMINOSIDAD FROM datos");
		$presext=mysqli_query($mysqli,"SELECT TEMPEXT, PRESEXT, HUMEXT, LUMINOSIDAD FROM datos");
		$humext=mysqli_query($mysqli,"SELECT TEMPEXT, PRESEXT, HUMEXT, LUMINOSIDAD FROM datos");
		$luminosidad=mysqli_query($mysqli,"SELECT TEMPEXT, PRESEXT, HUMEXT, LUMINOSIDAD FROM datos");
  	?>
  	</script>	  
	<script src="js/zingchart.min.js"></script>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<!--<script src="js/chart-data.js"></script>-->
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
	<?php
	$data=mysqli_query($mysqli,"SELECT * FROM datos");
	?>
	var myLabels=[<?php 
	while($info=mysqli_fetch_array($data))
	    echo '"'.$info['fechaHora'].'",'; 
	?>];
	var tempexterior=[<?php 
	while($texterior=mysqli_fetch_array($tempext))
	    echo $texterior['TEMPEXT'].','; 
	?>];

	var humedadexterior =[<?php 
	while($huexterior=mysqli_fetch_array($humext))
	    echo $huexterior['HUMEXT'].','; 
	?>];
	var presionexterior =[<?php 
	while($presexterior=mysqli_fetch_array($presext))
	    echo $presexterior['PRESEXT'].','; 
	?>];
	var luminosidadexterior =[<?php 
	while($lexterior=mysqli_fetch_array($luminosidad))
	    echo $lexterior['LUMINOSIDAD'].',';
	?>];

	var confex = 
        {
            "type": "line",
             "legend":{
    
  			},
            "plot":{ 
		    "aspect":"spline" 
		  	}, 
            "plotarea": {
			    "adjust-layout":true 
			},
			"scale-x": {
				"label":{ 
			    },
			   
			    "labels": myLabels,
			},
            "series": [  {
                    "values": tempexterior,"text":"TEMPEXT",
                    "marker":{ 
			        "size":1, 
			      	}
                  },
                  {
                    "values": humedadexterior,"text":"HUMEXT",
                    "marker":{ 
			        "size":1, 
			      	}
                  },
                  {
                    "values": presionexterior,"text":"PRESEXT",
                    "marker":{ 
			        "size":1, 
			      	}
                  },
                  {
                    "values": luminosidadexterior,"text":"LUMINOSIDAD",
                    "marker":{ 
			        "size":1, 
			      	}
                  } 
            ]
        };

	var tep=[<?php 
	while($te=mysqli_fetch_array($datat))
	    echo $te['BMETEMP'].','; 
	?>];

	var hum =[<?php 
	while($hu=mysqli_fetch_array($datah))
	    echo $hu['BMEHUM'].','; 
	?>];
	var pres =[<?php 
	while($pres=mysqli_fetch_array($datap))
	    echo $pres['BMEPRES'].','; 
	?>];
	var hums =[<?php 
	while($hus=mysqli_fetch_array($datahs))
	    echo $hus['HUMSUELO'].',';
	?>];
	var temps =[<?php 
	while($tes=mysqli_fetch_array($datats))
	    echo $tes['TEMPSUELO'].','; 
	?>];

	var myConfig = 
        {
            "type": "line",
             "legend":{
    
  			},
            "plot":{ 
		    "aspect":"spline" 
		  	}, 
            "plotarea": {
			    "adjust-layout":true 
			},
			"scale-x": {
				"label":{ 
			    },
			   
			    "labels": myLabels,
			},
            "series": [  {
                    "values": tep,"text":"BMETEMP",
                    "marker":{ 
			        "size":1, 
			      	}
                  },
                  {
                    "values": hum,"text":"BMEHUM",
                    "marker":{ 
			        "size":1, 
			      	}
                  },
                  {
                    "values": pres,"text":"BMEPRES",
                    "marker":{ 
			        "size":1, 
			      	}
                  },
                  {
                    "values": hums,"text":"HUMSUELO",
                    "marker":{ 
			        "size":1, 
			      	}
                  }  ,
                  {
                    "values": temps,"text":"TEMPSUELO",
                    "marker":{ 
			        "size":1, 
			      	}
                  }    
            ]
        };  

    

    var temptemp = 
        {
            "type": "line",
             "legend":{
    
  			},
            "plot":{ 
		    "aspect":"spline" 
		  	}, 
            "plotarea": {
			    "adjust-layout":true 
			},
			"scale-x": {
				"label":{ 
			    },
			   
			    "labels": myLabels.slice(myLabels.length-10,myLabels.length+1),
			},
            "series": [  {
                    "values": tep.slice(myLabels.length-10,myLabels.length+1),"text":"BMETEMP",
                    "marker":{ 
			        "size":1, 
			      	}
                  },
                  {
                    "values": tempexterior.slice(myLabels.length-10,myLabels.length+1),"text":"TEMPEXT",
                    "marker":{ 
			        "size":1, 
			      	}
                  }
            ]
        };

    var humhum = 
        {
            "type": "line",
             "legend":{
    
  			},
            "plot":{ 
		    "aspect":"spline" 
		  	}, 
            "plotarea": {
			    "adjust-layout":true 
			},
			"scale-x": {
				"label":{ 
			    },
			   
			    "labels": myLabels.slice(myLabels.length-10,myLabels.length+1),
			},
            "series": [  {
                    "values": hum.slice(myLabels.length-10,myLabels.length+1),"text":"BMEHUM",
                    "marker":{ 
			        "size":1, 
			      	}
                  },
                  {
                    "values": humedadexterior.slice(myLabels.length-10,myLabels.length+1),"text":"HUMEXT",
                    "marker":{ 
			        "size":1, 
			      	}
                  }
            ]
        }; 

    var prespres = 
        {
            "type": "line",
             "legend":{
    
  			},
            "plot":{ 
		    "aspect":"spline" 
		  	}, 
            "plotarea": {
			    "adjust-layout":true 
			},
			"scale-x": {
				"label":{ 
			    },
			   
			    "labels": myLabels.slice(myLabels.length-10,myLabels.length+1),
			},
            "series": [  {
                    "values": pres.slice(myLabels.length-10,myLabels.length+1),"text":"BMEPRES",
                    "marker":{ 
			        "size":1, 
			      	}
                  },
                  {
                    "values": presionexterior.slice(myLabels.length-10,myLabels.length+1),"text":"PRESEXT",
                    "marker":{ 
			        "size":1, 
			      	}
                  }
            ]
        };            
    
	window.onload=function(){
		zingchart.render({
		    id:"Li",
		    width:"100%",
		    height:400,
		    data:myConfig
		  
		});
		zingchart.render({
		    id:"L",
		    width:"100%",
		    height:400,
		    data:confex
		  
		});
		zingchart.render({
		    id:"L2",
		    width:"100%",
		    height:300,
		    data:temptemp
		  
		});
		zingchart.render({
		    id:"L3",
		    width:"100%",
		    height:300,
		    data:humhum
		  
		});
		zingchart.render({
		    id:"L4",
		    width:"100%",
		    height:300,
		    data:prespres
		  
		});
		};

  	</script>
  	<?php
	/* Close the connection */
	$mysqli->close(); 
	?>
</body>
</html>
