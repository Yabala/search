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
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<body>

<h1><i class="fa fa-search"></i> SEARCH</h1>

<?php

include("../yabala/iyabala.php");




//se define cual debe ser la clave de busqueda
$clave =  $_POST["clave"];
if($_POST["campo"]==1) $clave =  $_POST["type"];
if($_POST["campo"]==5) $clave =  $_POST["cc"];


//se define el modo
if(($_POST["campo"]==1) || ($_POST["campo"]==5)) $modo =  1;
else $modo = 0;


//hacer la b�squeda
$YABALA = new yabala();
$result = $YABALA->select($_POST["repository"], $clave, $_POST["campo"], $modo);

//imprimir el resultado
echo "<table class='search'>\n";
echo "<tr class='search'><td class='search'>T&iacute;tulo</td><td class='search'>Formato</td><td class='search'>Keywords</td><td class='search'>Autor</td><td class='search'>Url</td><td class='search'>Licencia</td></tr>";
foreach ($result as $record) {
	echo "<tr class='search'>\n";
	foreach ($record as $fild) {
		//Imprime celda con contenido
		echo "<td class='search'>$fild</td>\n";
	}
	echo "</tr>\n";
}
echo "</table>\n";

echo "&nbsp;\n";

//volver al panel de b�squeda
echo "<form name='back' method='post' action='admin.php'><input value='VOLVER' type='submit' id='submit'  /></form>";

?>

</body>
</html>