<?php
class Nacional extends Moto{
    private $dcto;
    public function __construct($cod, $cos, $anoFabr, $porcIncrAnual, $descripcion, $act, $dcto){
        parent::__construct($cod, $cos, $anoFabr, $porcIncrAnual, $descripcion, $act);
        $this->dcto= $dcto ?? 15;
    }
    public function getDcto(){
        return $this->dcto;
    }
    public function setDcto($dcto){
        $this->dcto=$dcto;
    }
    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.= "Descuento: " . $this->getDcto() . "\n";
        return $cadena;
    }
    public function darPrecioVenta()
    {
        $venta= parent::darPrecioVenta();
        if($venta != -1){
            // chequear que el descuento sea >=0
            $descuento = ($venta * $this->getDcto()) / 100;
            $venta= $venta - $descuento;
        }
        return $venta;
    }
}

?>