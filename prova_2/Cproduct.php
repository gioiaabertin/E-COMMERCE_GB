<?php
class CProduct
{
    // property declaration
    public $id = 0;
    public $nome = 'prodotto';
    public $descr = 'nessuna descrizione';
    public $quantManc = 0;
    public $idCateg = 0;

    public $prezzo = 0;

    public $foto = '';

    // costruttore della classe
    public function __construct( $id,$nome , $descr , $quantManc , $idCateg , $prezzo , $foto )
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descr = $descr;
        $this->quantManc = $quantManc;
        $this->idCateg = $idCateg;
        $this->prezzo = $prezzo;
        $this->foto=$foto;
    }
    
    public function displayVar()
    {
       // echo ....;
    }
}
?>