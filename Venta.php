<?php
/*1. Se registra la siguiente información: número, fecha, referencia al objClientes, referencia a una colección de
arraysMotosos y el precio final.
2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
atributo de la clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
5. Implementar el método incorporararraysMotoso($objarraysMotoso) que recibe por parámetro un objeto Motoso y lo
incorpora a la colección de Motos de la venta, siempre y cuando sea posible la venta. El método cada
vez que incorpora una arraysMotoso a la venta, debe actualizar la variable instancia precio final de la venta.
Utilizar el método que calcula el precio de venta de la arraysMotoso donde crea necesario.**/

class Venta {
    private $numero;
    private $fecha;
    private $objCliente;
    private $arraysMotos;
    private $precioFinal;

    public function __construct($nro, $fecha, $cli, $arraysMotos, $preFin) {
        $this->numero = $nro;
        $this->fecha = $fecha;
        $this->objCliente = $cli;
        $this->arraysMotos = $arraysMotos;
        $this->precioFinal = $preFin;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getobjCliente() {
        return $this->objCliente;
    }

    public function getArrayMotos() {
        return $this->arraysMotos;
    }

    public function getPrecioFinal() {
        return $this->precioFinal;
    }

    public function setNumero($nro) {
        $this->numero = $nro;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setobjCliente($cli) {
        $this->objCliente = $cli;
    }

    public function setArrayMotos($arraysMotos) {
        $this->arraysMotos = $arraysMotos;
    }

    public function setPrecioFinal($preFin) {
        $this->precioFinal = $preFin;
    }

    public function incorporarMoto($objMoto){
        $precioMotoVenta= $objMoto->darPrecioVenta();//obtenemos el precio final
        $arrayMotos=$this->getArrayMotos();//accedo a la coleccion de motos
        if ($precioMotoVenta>0) {
            array_push($arrayMotos,$objMoto);//agrego el objeto moto a la coleccion
            $this->setArrayMotos($arrayMotos);//cambie el valor del arrays
            $this->setPrecioFinal($this->getPrecioFinal()+ $precioMotoVenta);//cambie el precio de venta
        }

    }
    public function retornarTotalVentaNacional(){
        $motos = $this->getArrayMotos();
        $totalVentaNacional = 0;
        foreach($motos as $moto){
            if($moto instanceof Nacional){
                if($moto->darPrecioVenta() != -1){
                    $totalVentaNacional += $moto->darPrecioVenta();
                }
            }
        }
        return $totalVentaNacional;
    }
    public function retornarMotosImportadas(){
        $motos = $this->getArrayMotos();
        $colMotosImportadas= [];
        foreach($motos as $moto){
            if($moto instanceof Importada){
                if($moto->darPrecioVenta() != -1){
                    $colMotosImportadas[]= $moto;
                }
            }
        }
        return $colMotosImportadas;
    }
    // 
    private function obtValoresArrays($array){
        $cadena="";
        foreach ($array as $elementoArray) {
            $cadena = $cadena . " " . $elementoArray . "\n";
        }
        return $cadena;
    }



    public function __toString() {
        $arrayMotos= $this->obtValoresArrays($this->getArrayMotos());
        $rta = "Número de Venta: " . $this->getNumero() . "\n";
        $rta .= "Fecha: " . $this->getFecha() . "\n";
        $rta .= "Cliente: " . $this->getobjCliente() . "\n";
        $rta .= "Coleccion de motos:" . $arrayMotos . "\n";
        $rta .= ":\n";
        $rta .= "Precio Final: " . $this->getPrecioFinal() . "\n";
        return $rta;
    }
}

