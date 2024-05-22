<?php
/**Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av
Argenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes =
[$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
5. Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.
6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido.
7. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.
8. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente1.
9. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente2
10. Realizar un echo de la variable Empresa creada en 2 */
include_once "Cliente.php";
include_once "Venta.php";
include_once "Moto.php";
include_once "Nacional.php";
include_once "Importada.php";
include_once "Empresa.php";
$objCliente1 = new Cliente("Florencia", "Russo", false, "DNI", "12345678");
$objCliente2 = new Cliente("Nicolás", "Flores", true, "DNI", "87654321");
$colClientes=[$objCliente1, $objCliente2];

$objMoto1= new Nacional(11, 2230000, 2022, 85, "Benelli Imperiale 400", true, 10);
$objMoto2= new Nacional(12, 584000, 2021, 70,"Zanella Zr 150 Ohc",  true, 10);
$objMoto3= new Nacional(13, 999900, 2023, 55,"Zanella Patagonian Eagle 250", false, null);
//public function __construct($cod, $cos, $anoFabr, $porcIncrAnual, $descripcion, $act, $pais, $impuestosImportacion){
$objMoto4= new Importada(14, 12499900, 2022, 100, "Pitbike Enduro", true, "Francia",6244400);
$colMotos=[$objMoto1, $objMoto2, $objMoto3, $objMoto4];
$colVentasRealizadas=[];

 $empresa = new Empresa("Alta Gama", "Av Argenetina 123", $colClientes, $colMotos,$colVentasRealizadas);
 $colCodigosMoto=[11,12,13,14];


$registrarVenta= $empresa->registrarVenta($colCodigosMoto, $objCliente2);
echo "PRIMERA VENTA\n";
echo "Precio de venta: ". $registrarVenta ."\n";
$colCodigosMoto=[14];
$registrarVenta= $empresa->registrarVenta($colCodigosMoto, $objCliente2);
echo "SEGUNDA VENTA\n";
echo "Precio de venta: ". $registrarVenta ."\n";

$colCodigosMoto3=[14,2];
$registrarVenta= $empresa->registrarVenta($colCodigosMoto3, $objCliente2);
echo "TERCERA VENTA\n";
echo "Precio de venta: ". $registrarVenta ."\n";

$ventasImportadas= $empresa->informarVentasImportadas();
foreach($ventasImportadas as $venta){
    echo $venta;
}

$ventasImportadas= $empresa->informarSumaVentasNacionales();
echo "Ventas Nacionales: " . $ventasImportadas . "\n";

echo $empresa;
?>