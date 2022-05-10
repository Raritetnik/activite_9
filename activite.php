<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    class Carte {
        public $valeurCarte = 0;
        public $signeCarte = "-";

        function afficherCarte() {
            return "$this->valeurCarte-$this->signeCarte";
        }
        function afficherSigne() {
            return "$this->signeCarte";
        }
        function afficherValeur() {
            return "$this->valeurCarte";
        }

        function setValeurCarte($valeur) {
            $this->valeurCarte = $valeur;
        }
        function setSigneCarte($signe) {
            $this->signeCarte = $signe;
        }
    }

    function creationPaquet() {
        $listeSignes = array('Carreau','Trèfle','Coeur','Pique');
        foreach($listeSignes as $signe) {
            for($i = 1; $i <= 13; $i++) {
                $carte = new Carte();
                $carte->setSigneCarte($signe);
                $carte->setValeurCarte($i);
                $cartes[] = $carte;
            }
        }
        return $cartes;
    }

    function afficherLesCartes($paquet) {
        $once = true;
        for($i=0; $i < count($paquet); $i++){
            if( $i%13 == 0){
                echo "<br><br>";
            }
            echo($paquet[$i]->afficherCarte()."  ");
        }
    }
    $paquetCartes = creationPaquet();

    $paquet1 = array_slice($paquetCartes,(count($paquetCartes)/2));
    $paquet2 = array_slice($paquetCartes, 0, (count($paquetCartes)/2));

    for ($i=0; $i < count($paquet1); $i++) {
        $paquetMelange[] = $paquet1[$i];
        $paquetMelange[] = $paquet2[$i];
    }
    echo ('<h2>Paquet brassé et affiché</h2>');
    afficherLesCartes($paquetMelange);

    echo ('<h2>Paquet arrangé et affiché</h2>');
    afficherLesCartes($paquetCartes);
    ?>
</body>
</html>
