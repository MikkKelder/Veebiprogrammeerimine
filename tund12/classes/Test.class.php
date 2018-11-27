<?php
class Test
{
    //omadused ehk muutujad
    private $secretNumber;
    public $publicNumber;

    //eriline funktsioon ehk constructor on see, mis käivitatakse kohe, klassi kasutuselevõtmisel ehk objekti loomisel
    function __construct($givenNumber){
        $this->secretNumber = 4;
        $this->publicNumber = $this->secretNumber * $givenNumber;
        $this->tellSecrets();
        $this->tellThings();
    }

    //eriline funktsioon, mida kasutatakse, kui klass suletakse/objekt eemaldatakse
    function __destruct(){
        echo "Lõpetame!";
    }

    private function tellSecrets(){
        echo "Salajane number on: " .$this->secretNumber ."! ";
    }

    public function tellThings(){
        echo "\n Saladusi ei paljasta!";
    }


}//class lõppeb
?>