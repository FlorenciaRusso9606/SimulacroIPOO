<?php
include "cliente.php";
include "moto.php";
include "empresa.php";
$objCliente1 = new Cliente("Florencia", "Russo", false, "DNI", "12345678");
$objCliente2 = new Cliente("Nicolás", "Flores", true, "DNI", "87654321");
$colClientes=[$objCliente1, $objCliente2];
// public function __construct($cod, $cos, $anoFabr, $porcIncrAnual, $act) 
$objMoto1= new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$objMoto2= new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
$objMoto3= new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);
$colMotos=[$objMoto1, $objMoto2, $objMoto3];
$colVentasRealizadas=[];
// public function __construct($den, $dir, $cli, $mot, $vtas) {
 $empresa = new Empresa("Alta Gama", "Av Argenetina 123", $colClientes, $colMotos,$colVentasRealizadas);
$colCodigosMoto=[];
foreach($colMotos as $moto){
    $codigoMoto=$moto->getCodigo();
    $colCodigosMoto[]=$codigoMoto;
}

$empresa->registrarVenta($colCodigosMoto, $objCliente2);
foreach($colVentasRealizadas as $ventas){
}

$tipo=$objCliente1->get_tipo_dni();
$numDoc=$objCliente1->get_nro_dni();
$empresa->retornarVentasXCliente($tipo,$numDoc);
echo $empresa;

?>