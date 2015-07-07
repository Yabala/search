<?php



// This file is part of Search https://github.com/Yabala/search
//
// Search is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Search is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Search.  If not, see <http://www.gnu.org/licenses/>.



?>



<html>
<head>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

<h1>SEARCH</h1>


<?php

include("../yabala/iyabala.php");

$YABALA = new yabala();

?>


<form name="searchForm" method="post" action="search.php" class="admin">

<div class="admin">
Seleccionar el repositorio en el cual se buscará:<br /> 
<select name="repository">
<?php
	//Obtener la lista de respositorios disponibles en la instalación local de Yabalá
	$listRepository = $YABALA->getRepositoryList();

	//Imprimir como una opción cada uno de los repositorios disponibles en la lista	
	foreach ($listRepository as $item){
		echo "\n"."<option value='$item[1]'>$item[0]</option>";
	};
?>
</select>
</div>

&nbsp;

<div class="admin">
DEFINIR LOS CRITERIOS DE BÚSQUEDA Y LUEGO ELEGIR EL BOTÓN "SEARCH" PARA LANZAR LA BÚSQUEDA<br>
</div>

&nbsp;

<div class="admin">
<input type="text" name="clave" value=""><br />
<input type="radio" name="campo" value="-1" checked> Buscar en todos los campos<br>
<input type="radio" name="campo" value="1"> Buscar en keywords<br />
<input type="radio" name="campo" value="2"> Buscar en autor<br />
<input type="radio" name="campo" value="3"> Buscar en url<br />
<input value="SEARCH" type="submit" />
</div>

&nbsp;

<div class="admin">
Buscar por formato:<br>
<input type="radio" name="campo" value="0">
<select name="type" onchange="searchForm.campo.value=0">
	<option value="">Elegir ...</option>
	<?php
		//Toma la lista de formatos definidos por YABALA
		$formats = $YABALA->getFormats(); 

		//Imprime opciones de la lista despegable por cada formato definido por YABALA
		foreach ($formats as $format) {
		    echo "<option value='$format'>$format</option>\n";
		}
	?>
</select>
 <input value="SEARCH" type="submit" />
</div>

&nbsp;

<div class="admin">
Buscar por licencia:<br />
<input type="radio" name="campo" value="4">
<select name="cc" onchange="searchForm.campo.value=4">
	<option value="">Elegir ...</option>
	<?php
		//Toma la lista de licencias definidas por YABALA
		$licenses = $YABALA->getLicenses(); 

		//Imprime opciones de la lista despegable por cada licencia definida por YABALA
		foreach ($licenses as $license) {
		    echo "<option value='$license'>$license</option>\n";
		}
	?>
</select>
 <input value="SEARCH" type="submit" />
</div>



</form>


</body>
</html>	

