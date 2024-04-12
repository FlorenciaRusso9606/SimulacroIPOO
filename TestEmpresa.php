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
include "cliente.php";
include "venta.php";
include "moto.php";
include "empresa.php";
$objCliente1 = new Cliente("Florencia", "Russo", false, "DNI", "12345678");
$objCliente2 = new Cliente("Nicolás", "Flores", true, "DNI", "87654321");
$colClientes=[$objCliente1, $objCliente2];
//     public function __construct($cod, $cos, $anoFabr, $porcIncrAnual, $descripcion, $act) {
$objMoto1= new Moto(11, 2230000, 2022, 85, "Benelli Imperiale 400", true);
$objMoto2= new Moto(12, 584000, 2021, 70,"Zanella Zr 150 Ohc",  true);
$objMoto3= new Moto(13, 999900, 2023, 55,"Zanella Patagonian Eagle 250", false);
$colMotos=[$objMoto1, $objMoto2, $objMoto3];
$colVentasRealizadas=[];
// public function __construct($den, $dir, $cli, $mot, $vtas) {
 $empresa = new Empresa("Alta Gama", "Av Argenetina 123", $colClientes, $colMotos,$colVentasRealizadas);
$colCodigosMoto=[];
foreach($colMotos as $moto){
    $codigoMoto=$moto->getCodigo();
    $colCodigosMoto[]=$codigoMoto;
}

$registrarVenta= $empresa->registrarVenta($colCodigosMoto, $objCliente2);
echo "Precio de venta: ". $registrarVenta ."\n";

$tipo=$objCliente1->get_tipo_dni();
$numDoc=$objCliente1->get_nro_dni();
$empresa->retornarVentasXCliente($tipo,$numDoc);
echo $empresa;
?>