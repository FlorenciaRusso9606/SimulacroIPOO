<?php
class Importada extends Moto{
    private $pais;
    private $impuestosImportacion;
    public function __construct($cod, $cos, $anoFabr, $porcIncrAnual, $descripcion, $act, $pais, $impuestosImportacion){
        parent::__construct($cod, $cos, $anoFabr, $porcIncrAnual, $descripcion, $act);
        $this->pais = $pais;
        $this->impuestosImportacion =$impuestosImportacion;
    }
    public function getPais(){
        return $this->pais;
    }
    public function getImpImportacion(){
        return $this->impuestosImportacion;
    }
    public function setPais($pais){
        $this->pais=$pais;
    }
    public function setImpImportacion($impuestosImportacion){
        $this->impuestosImportacion=$impuestosImportacion;
    }
    public function darPrecioVenta()
    {
        $venta= parent::darPrecioVenta();
        if($venta != -1){
            $venta += $this->getImpImportacion();
        }
        return $venta;

    }
    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.= "País: " . $this->getPais() . "\n" ."Impuestos: " . $this->getImpImportacion() . "\n";
        return $cadena;
    }
}

?>