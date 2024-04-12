<?php

class Empresa {
    private $denominacion;
    private $direccion;
    private $colClientes;
    private $colMotos;
    private $colVentas;

    public function __construct($den, $dir, $cli, $mot, $vtas) {
        $this->denominacion = $den;
        $this->direccion = $dir;
        $this->colClientes = $cli;
        $this->colMotos = $mot;
        $this->colVentas = $vtas;
    }

    public function getDenominacion() {
        return $this->denominacion;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getColClientes() {
        return $this->colClientes;
    }

    public function getColMotos() {
        return $this->colMotos;
    }

    public function getColVentas() {
        return $this->colVentas;
    }


// METODOS SET
    public function setDenominacion($den) {
        $this->denominacion = $den;
    }

    public function setDireccion($dir) {
        $this->direccion = $dir;
    }

    public function setColClientes($cli) {
        $this->colClientes = $cli;
    }

    public function setColMotos($mot) {
        $this->colMotos = $mot;
    }

    public function setColVentas($vtas) {
        $this->colVentas = $vtas;
    }

    public function retornarMoto($codigoMoto){
    $arrayMotos = $this->getColMotos();
    $objMoto= null;
    $i=0;
    while($i<count($arrayMotos) && $objMoto == null){
        if($arrayMotos[$i]->getCodigo() == $codigoMoto){
            $objMoto= $arrayMotos[$i];
        }
        $i++;
    }return $objMoto;
     }      
     public function registrarVenta($colCodigosMoto, $objCliente){
        $i=0;
        $motoRetornada=null;
        $arrayMotosVenta=$this->getColMotos();
        // compara cada codigo de la coleccion con cada moto de la coleccion de motos
        while ($i < count($colCodigosMoto) && ($motoRetornada==null)) {
           $motoRetornada=$this-> retornarMoto($colCodigosMoto[$i]);
           //
           if($motoRetornada== null){
            $i++;
           }
        }
        if ($motoRetornada!=null) {
            if ($motoRetornada->getActiva()==true && $objCliente->getDadoBaja()==false) {
                $nuevoArrayMotosVenta=array_push($arrayMotosVenta, $motoRetornada);
                $this->getColVentas()->setArraysMotos($nuevoArrayMotosVenta);
            }
        }
     }

     public function retornarVentasXCliente($tipo,$numDoc){
        $colVentasCliente=[];
        $ventas=$this->getColVentas();
        foreach($ventas as $venta){
            if($venta->getCliente()->get_tipo_dni() == $tipo){
                if($venta->getCliente()->get_nro_dni() == $numDoc)
                $colVentasClientes[]=$ventas;
            }
        }
        return $colVentasCliente;
     }

    public function __toString() {
        $rta = "Denominación: " . $this->getDenominacion() . "\n";
        $rta .= "Dirección: " . $this->getDireccion() . "\n";
        $rta .= "Clientes:\n";
        foreach ($this->getColClientes() as $cli) {
            $rta .= "- " . $cli . "\n";
        }
        $rta .= "Motos:\n";
        foreach ($this->getColMotos() as $mot) {
            $rta .= "- " . $mot . "\n";
        }
        $rta .= "Ventas:\n";
        foreach ($this->getColVentas() as $vtas) {
            $rta .= "- " . $vtas . "\n";
        }
        return $rta;
    }
}

