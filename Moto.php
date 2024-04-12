<?php
/*código, costo, año fabricación, descripción, porcentaje
incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
venta y false en caso contrario).**/



class Moto {
    private $codigo;
    private $costo;
    private $anoFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa;

    public function __construct($cod, $cos, $anoFabr, $porcIncrAnual, $act) {
        $this->codigo = $cod;
        $this->costo = $cos;
        $this->anoFabricacion = $anoFabr;
        $this->porcentajeIncrementoAnual = $porcIncrAnual;
        $this->activa = $act;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getCosto() {
        return $this->costo;
    }

    public function getAnoFabricacion() {
        return $this->anoFabricacion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPorcentajeIncrementoAnual() {
        return $this->porcentajeIncrementoAnual;
    }

    public function getActiva() {
        return $this->activa;
    }


    //METODOS SET 
   
    public function setCodigo($cod) {
        $this->codigo = $cod;
    }

    public function setCosto($cos) {
        $this->costo = $cos;
    }

    public function setAnoFabricacion($anoFabr) {
        $this->anoFabricacion = $anoFabr;
    }

    public function setDescripcion($desc) {
        $this->descripcion = $desc;
    }

    public function setPorcentajeIncrementoAnual($porcIncrAnual) {
        $this->porcentajeIncrementoAnual = $porcIncrAnual;
    }

    public function setActiva($act) {
        $this->activa = $act;
    }

    public function darPrecioVenta()
    {
        $_venta= -1;//inicializamos valor venta, si la moto no esta para la venta retorna -1
        $_compra=$this->getCosto();//llamamos al precio de costo
        $activa= $this->getActiva(); //verificamos si esta activa (true o false)con respecto a la venta
        $anioFab=$this->getAnoFabricacion();//obtenemos el año de fabricacion
        $anio_actual = date("Y");//obtenemos el año actual
        $anio = $anio_actual-$anioFab;//calculamos los años que pasaron desde el año de fabricacion al año actual
        $por_inc_anual=$this->getPorcentajeIncrementoAnual();//accedemos al porcentaje anual
        if ($activa) {

            $_venta = $_compra + $_compra * ($anio * $por_inc_anual);//calculamos el valor de venta final, devuelve un numero >0
        }
        return $_venta;// retornamos el valor de venta

    }

//  SE MUESTRAN SOLO LOS ATRIBUTOS.
    public function __toString() {
        $info = "Código: " . $this->getCodigo() . "\n";
        $info .= "Costo: " . $this->getCosto() . "\n";
        $info .= "Año de Fabricación: " . $this->getAnoFabricacion() . "\n";
        $info .= "Descripción: " . $this->getDescripcion() . "\n";
        $info .= "Porcentaje de Incremento Anual: " . $this->getPorcentajeIncrementoAnual() . "\n";
        $info .= "Activa: " . ($this->getActiva() ? "Sí" : "No") . "\n";
        return $info;
    }   
}

