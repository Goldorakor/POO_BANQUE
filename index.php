<h1>POO Banque</h1>

<style type="text/css">
            .special {
               color: red ;
            }
        </style>
    

<?php

// require "Entreprise.php";
// require "Employe.php";

spl_autoload_register(function ($class_name) {
    require 'classes/'. $class_name .'.php'; // 'classes/' puisque nos fichiers de classe ont été stockés dans le dossier 'classes'
});


// création de la fonction personnalisé convertirRouge
function convertirRouge (string $texte) : string {
    return "<p class='special'>$texte</p>";
}

// on commence par créer des titulaires puisque les comptes bancaires en ont besoin pour leur propre création !
$titulaire1 = new Titulaire ("Heid", "Michaël", "1974-11-27", "Strasbourg");
$titulaire2 = new Titulaire ("Durand", "Pierre", "1999-12-04", "Lens");
$titulaire3 = new Titulaire ("Flaubert", "Gustave", "2007-05-14", "Rouen");


// on affiche de beaux résultats grâce à __toString de la classe Titulaire.
echo "<h2>__toString de la classe Titulaire</h2>";
echo $titulaire1."<br>";
echo $titulaire2."<br>";
echo $titulaire3."<br>";

// on poursuit en créant nos comptes bancaires
$compte1 = new CompteBancaire ("compte courant", 200.50, "eur", $titulaire1);
$compte2 = new CompteBancaire ("livret A", 12000, "eur", $titulaire1);
$compte3 = new CompteBancaire ("compte épargne", 4080.50, "eur", $titulaire1);

$compte4 = new CompteBancaire ("compte courant", 400, "eur", $titulaire2);
$compte5 = new CompteBancaire ("livret A", 2000, "eur", $titulaire2);
$compte6 = new CompteBancaire ("compte épargne", 680.50, "eur", $titulaire2);

$compte7 = new CompteBancaire ("compte courant", 400.37, "eur", $titulaire3);
$compte8 = new CompteBancaire ("livret A", 1000.20, "eur", $titulaire3);
$compte9 = new CompteBancaire ("compte épargne", 70080.10, "eur", $titulaire3);


// on affiche de beaux résultats grâce à __toString de la classe CompteBancaire.
echo "<h2>__toString de la classe CompteBancaire</h2>";
echo $compte1."<br>";
echo $compte2."<br>";
echo $compte3."<br>";
echo $compte7."<br>";
echo $compte8."<br>";
echo $compte9."<br>";


echo "<h2>Infos globales du titulaire choisi</h2>";
echo $titulaire1->afficherInformationsGlobales()."<br>";

echo "test de ma méthode getAgeTitulaire () pour titulaire1 : l'âge du titulaire est de ".$titulaire1->getAgeTitulaire ()." ans";

echo "<h2>Infos globales du titulaire choisi</h2>";
echo $titulaire3->afficherInformationsGlobales()."<br>";

echo "test de ma méthode getAgeTitulaire () pour titulaire3 : l'âge du titulaire est de ".$titulaire3->getAgeTitulaire ()." ans";

echo "<h2>Infos globales du compte choisi : compte1</h2>";
echo $compte1->afficherInfosCompte ();

echo "<h2>Infos globales du compte choisi : compte3</h2>";
echo $compte3->afficherInfosCompte ();


echo "<h4>créditer le compte1 (solde actuel : 200.50) de 400.3 euros : crediterCompte(400.3)</h4>";
$compte1->crediterCompte(400.3);
echo $compte1->afficherInfosCompte ();

echo "<h4>débiter le compte3 (solde actuel de : 4080.50) de 2000 euros : debiterCompte(2000)</h4>";
$compte3->debiterCompte(2000);
echo $compte3->afficherInfosCompte ();


echo "<h2>je teste l'envoi de virement (je perds des sous : 40 euros) - j'affiche l'état des deux comptes avant et après l'opération pour bien visualiser</h2>";

echo "<h4>compte 6 : va envoyer le virement</h4>";
echo $compte6->afficherInfosCompte ();
echo "<h4>compte 7 : va recevoir le virement</h4>";
echo $compte7->afficherInfosCompte ();

echo "".convertirRouge("opération en cours ---- opération en cours")."<br>";
$compte6->envoyerVirement_actuelvers2 ($compte7, 40);
echo "".convertirRouge("opération effectuée ---- opération effectuée")."<br>";

echo "<h4>compte 6 : a envoyé le virement</h4>";
echo $compte6->afficherInfosCompte ();
echo "<h4>compte 7 : a reçu le virement</h4>";
echo $compte7->afficherInfosCompte ();


echo "<h2>je teste la réception de virement (je reçois des sous : 240 euros) - j'affiche l'état des deux comptes avant et après l'opération pour bien visualiser</h2>";

echo "<h4>compte 7 : va recevoir le virement</h4>";
echo $compte7->afficherInfosCompte ();
echo "<h4>compte 8 : va envoyer le virement</h4>";
echo $compte8->afficherInfosCompte ();

echo "".convertirRouge("opération en cours ---- opération en cours")."<br>";
$compte7->recevoirVirement_actuelvers2 ($compte8, 240);
echo "".convertirRouge("opération effectuée ---- opération effectuée")."<br>";

echo "<h4>compte 7 : a reçu le virement</h4>";
echo $compte7->afficherInfosCompte ();
echo "<h4>compte 8 : a envoyé le virement</h4>";
echo $compte8->afficherInfosCompte ();