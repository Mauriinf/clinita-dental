<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="{!! asset('odontograma/scripts/jquery-2.1.4.js') !!}"></script>
	<script src="{!! asset('odontograma/scripts/angular.js') !!}"></script>
	<link rel="stylesheet" type="text/css" href="{!! asset('odontograma/css/estilosOdontograma.css') !!}">
</head>
<body ng-app="app" >
<div ng-controller="dientes">
<center>
	<div>
		<svg height="50" class="" width="50"  data-ng-repeat="i in adultoArriva" id="">
		  	<polygon points="10,15 15,10 50,45 45,50" estado="4" value="6" class="ausente" />
  			<polygon points="45,10 50,15 15,50 10,45" estado="4" value="7" class="ausente" />
  			<circle cx="30" cy="30" r="16" estado="8" value="8" class="corona"/>
  			<circle cx="30" cy="30" r="20" estado="3" value="9" class="endodoncia"/>
  			<polygon points="50,10 40,10 10,26 10,32 46,32 10,50 20,50 50,36 50,28 14,28" estado="6" value="10" class="implante"/>
  			<polygon points="10,10 50,10 40,20 20,20" estado="0" value="1" class="diente" />
  			<polygon points="50,10 50,50 40,40 40,20" estado="0" value="2" class="diente" />
  			<polygon points="50,50 10,50 20,40 40,40" estado="0" value="3" class="diente" />
  			<polygon points="10,50 20,40 20,20 10,10" estado="0" value="4" class="diente" />
  			<polygon points="20,20 40,20 40,40 20,40" estado="0" value="5" class="diente" />

		</svg>
	</div>
	<div>
		<svg height="50" class="" width="50"  data-ng-repeat="i in ninoArriva" id="">
  			<polygon points="10,15 15,10 50,45 45,50" estado="4" value="6" class="ausente" />
  			<polygon points="45,10 50,15 15,50 10,45" estado="4" value="7" class="ausente" />
  			<circle cx="30" cy="30" r="16" estado="8" value="8" class="corona"/>
  			<circle cx="30" cy="30" r="20" estado="3" value="9" class="endodoncia"/>
  			<polygon points="50,10 40,10 10,26 10,32 46,32 10,50 20,50 50,36 50,28 14,28" estado="6" value="10" class="implante"/>
  			<polygon points="10,10 50,10 40,20 20,20" estado="0" value="1" class="diente" />
  			<polygon points="50,10 50,50 40,40 40,20" estado="0" value="2" class="diente" />
  			<polygon points="50,50 10,50 20,40 40,40" estado="0" value="3" class="diente" />
  			<polygon points="10,50 20,40 20,20 10,10" estado="0" value="4" class="diente" />
  			<polygon points="20,20 40,20 40,40 20,40" estado="0" value="5" class="diente" />

		</svg>
	</div>
	<div>
		<svg height="50" class="" width="50"  data-ng-repeat="i in ninoAbajo" id="">
  			<polygon points="10,15 15,10 50,45 45,50" estado="4" value="6" class="ausente" />
  			<polygon points="45,10 50,15 15,50 10,45" estado="4" value="7" class="ausente" />
  			<circle cx="30" cy="30" r="16" estado="8" value="8" class="corona"/>
  			<circle cx="30" cy="30" r="20" estado="3" value="9" class="endodoncia"/>
  			<polygon points="50,10 40,10 10,26 10,32 46,32 10,50 20,50 50,36 50,28 14,28" estado="6" value="10" class="implante"/>
  			<polygon points="10,10 50,10 40,20 20,20" estado="0" value="1" class="diente" />
  			<polygon points="50,10 50,50 40,40 40,20" estado="0" value="2" class="diente" />
  			<polygon points="50,50 10,50 20,40 40,40" estado="0" value="3" class="diente" />
  			<polygon points="10,50 20,40 20,20 10,10" estado="0" value="4" class="diente" />
  			<polygon points="20,20 40,20 40,40 20,40" estado="0" value="5" class="diente" />

		</svg>
	</div>
	<div>
		<svg height="50" class="" width="50"  data-ng-repeat="i in adultoAbajo" id="">
   			<polygon points="10,15 15,10 50,45 45,50" estado="4" value="6" class="ausente" />
  			<polygon points="45,10 50,15 15,50 10,45" estado="4" value="7" class="ausente" />
  			<circle cx="30" cy="30" r="16" estado="8" value="8" class="corona"/>
  			<circle cx="30" cy="30" r="20" estado="3" value="9" class="endodoncia"/>
  			<polygon points="50,10 40,10 10,26 10,32 46,32 10,50 20,50 50,36 50,28 14,28" estado="6" value="10" class="implante"/>
  			<polygon points="10,10 50,10 40,20 20,20" estado="0" value="1" class="diente" />
  			<polygon points="50,10 50,50 40,40 40,20" estado="0" value="2" class="diente" />
  			<polygon points="50,50 10,50 20,40 40,40" estado="0" value="3" class="diente" />
  			<polygon points="10,50 20,40 20,20 10,10" estado="0" value="4" class="diente" />
  			<polygon points="20,20 40,20 40,40 20,40" estado="0" value="5" class="diente" />

		</svg>
	</div>
</center>
</div>

<input type="button" value="ver" id="ver"/>
<input type="button" value="Agregar" id="agregar"/>
<input type="button" value="limpiar" id="limpiar"/>

<input type="radio" id="Decidua" name="tipo" value="1" checked />Permanente
<input type="radio" id="Niños" name="tipo" value="2" />Decidua
<input type="radio" id="Mixta" name="tipo" value="3" />Mixta
<table border="1" align="center">
	<tr>
		<th>Amalgama</th>
		<th>Caries</th>
		<th>Endodoncia</th>
		<th>Ausente</th>
		<th>Resina</th>
		<th>Implante</th>
		<th>Sellante</th>
		<th>Corona</th>
		<th>Normal</th>
	</tr>
		<td><center><div class="color" value="1" style="background-color:red;width:20px;height:20px"></div></center></td>
		<td><center><div class="color" value="2" style="background-color:yellow;width:20px;height:20px"></div></center></td>
		<td><center><div class="color" value="3" style="background-color:orange;width:20px;height:20px"></div></center></td>
		<td><center><div class="color" value="4" style="background-color:tomato;width:20px;height:20px"></div></center></td>
		<td><center><div class="color" value="5" style="background-color:#CC6600;width:20px;height:20px"></div></center></td>
		<td><center><div class="color" value="6" style="background-color:#CC66CC;width:20px;height:20px"></div></center></td>
		<td><center><div class="color" value="7" style="background-color:green;width:20px;height:20px"></div></center></td>
		<td><center><div class="color" value="8" style="background-color:blue;width:20px;height:20px"></div></center></td>
		<td><center><div class="color" value="9" style="background-color:black;width:20px;height:20px"></div></center></td>
	<tr>
</table>

<!--Jquery/Javascrip-->
<script type="text/javascript" src="{!! asset('odontograma/scripts/jquery-odontograma.js') !!}"></script>
<!--Modulo de Angular-->
<script type="text/javascript" src="{!! asset('odontograma/scripts/app.js') !!}"></script>
<!-- Angular Directivas-->
<script type="text/javascript" src="{!! asset('odontograma/scripts/controller.js') !!}"></script>

</body>
</html>
