<?php
class CProduct
{
    // property declaration
    public $id = 0;
    public $nome = 'prodotto';
    public $descr = 'nessuna descrizione';
    public $quantitaManc = 0;
    public $idCateg = 0;

    public $prezzo = 0;

    public $foto = '';

    public $taglie ='';
    // costruttore della classe
    public function __construct( $id,$nome , $descr , $quantitaManc , $idCateg , $prezzo , $foto, $taglie )
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descr = $descr;
        $this->quantitaManc = $quantitaManc;
        $this->idCateg = $idCateg;
        $this->prezzo = $prezzo;
        $this->foto=$foto;
        $this->taglie = $taglie;
    }
 
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDescr() {
        return $this->descr;
    }

    public function setDescr($descr) {
        $this->descr = $descr;
    }

    public function getQuantitaManc() {
        return $this->quantitaManc;
    }

    public function setQuantitaManc($quantitaManc) {
        $this->quantitaManc = $quantitaManc;
    }

    public function getIdCateg() {
        return $this->idCateg;
    }

    public function setIdCateg($idCateg) {
        $this->idCateg = $idCateg;
    }

    public function getPrezzo() {
        return $this->prezzo;
    }

    public function setPrezzo($prezzo) {
        $this->prezzo = $prezzo;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function getTaglie()
    {
        return $this->taglie;
    }

    public function setTaglie($taglie)
    {
        $this->taglie = $taglie;
    }
    public function displayVar()
    {
       // echo ....;
    }
}
?>