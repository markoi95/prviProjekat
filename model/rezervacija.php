<?php

class Rez {

    public $rezID;
    public $sto;
    public $datumRez;
    public $opis;
    public $korisnik;

    public function __construct($rezID = null, $sto = null, $datumRez = null, $opis = null, $korisnik=null)
    {
        $this->rezID = $rezID;
        $this->sto = $sto;
        $this->datumRez = $datumRez;
        $this->opis = $opis;
        $this->korisnik = $korisnik;
    }

    public static function getAll(mysqli $conn) //dobija konekciju sa bazom kao ulazni element
    {
        $q = "SELECT * FROM rez";               //u varijablu q upisi sve kolone iz tabele rez
        return $conn->query($q);                //objektno orijentisan nacin za vracanje query-a kao rezultata
    }
    public static function deleteById($rezID, mysqli $conn) //ulazni element id koji cemo da obrisemo i konekcija sa bazom
    {
        $q = "DELETE FROM rez WHERE rezID=$rezID"; //kveri za brisanje id-a iz tabele
        return $conn->query($q);                   //vracanje tabele (bez obrisanog id-a)
    }
    public static function add($sto, $datumRez, $opis, $korisnik, mysqli $conn) // svi atributi objekta osim id-a, sam se generise
    {
        $q = "INSERT INTO rez(sto, datumRez, opis, korisnik) values('$sto', '$datumRez','$opis','$korisnik')"; //kveri za ubacivanje u tabelu
        return $conn->query($q); //vraca tabelu sa ubacenim id-em (novom rezervacijom) 
    }

    public function update(mysqli $conn)
    {
        $query = "UPDATE rez SET sto=$this->sto, datumRez=$this->datumRez, opis=$this->opis, korisnik=$this->korisnik WHERE id=$this->stoID";
        return $conn->query($query); //vraca tabelu sa update-ovanim sadrzajem 
    }

}


?>