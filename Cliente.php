<?php

/*Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
2. Los métodos de acceso de cada uno de los atributos de la clase.
3. Redefinir el método _toString para que retorne la información de los atributos de la clase.**/

class Cliente {//nombre, apellido,dado de baja,tipo y el númer de doc
    private $nombre;
    private $apellido;
    private $dadoDeBaja;
    private $tipoDni;
    private $nroDni;
    public function __construct($nom,$ap,$dadoBaja,$tipo,$dni){
        $this-> nombre=$nom;
        $this-> apellido=$ap;
        $this-> dadoDeBaja=$dadoBaja;
        $this-> tipoDni=$tipo;
        $this-> nroDni=$dni;
    }
    // METODOS GET
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getDadoBaja(){
        return $this->dadoDeBaja;
    }
    public function getTipoDni(){
        return $this->tipoDni;
    }
    public function getNroDni(){
        return $this->nroDni;
    }

    // METODOS SET
    public function setNomb($nom){
        $this->nombre=$nom;
    }
    public function setApellido($ap){
        $this->apellido=$ap;
    }
    public function setDadoBaja($dadoBaja){
        $this->dadoDeBaja=$dadoBaja;
    }
    public function setTipoDni($tipo){
        $this->tipoDni=$tipo;
    }
    public function setNroDni($dni){
        $this->nroDni=$dni;
    }
    public function __toString(){
        $nom=$this->getNombre();
        $ap=$this->getApellido();
        $dadoDeBaja = $this->getDadoBaja() ? "Sí" : "No"; // expresión ternaria
        $tipoDni=$this->getTipoDni();
        $nroDni=$this->getNroDni();
        $rta="Nombre: " . $nom . "\n";
        $rta.="Apellido: " . $ap . "\n";
        $rta.="Dado de baja: " . $dadoDeBaja . "\n";
        $rta.="Tipo de documento: " . $tipoDni . "\n";
        $rta.="Numero de documento: " . $nroDni . "\n";
        return $rta;
        
    }
    

}
