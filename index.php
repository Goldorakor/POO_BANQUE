<h1>POO Banque</h1>


<?php

// require "Entreprise.php";
// require "Employe.php";

spl_autoload_register(function ($class_name) {
    require 'classes/'. $class_name .'.php'; // 'classes/' puisque nos fichiers de classe ont été stockés dans le dossier 'classes'
});


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
echo "l'âge du titulaire est de ".$titulaire1->getAgeTitulaire ()." ans";

echo "<h2>Infos globales du titulaire choisi</h2>";
echo $titulaire3->afficherInformationsGlobales()."<br>";
echo "l'âge du titulaire est de ".$titulaire3->getAgeTitulaire ()." ans";

echo "<h2>Infos globales du compte choisi</h2>";
echo $compte1->afficherInfosCompte ();

echo "<h2>Infos globales du compte choisi</h2>";
echo $compte3->afficherInfosCompte ();


echo "<h4>créditer le compte1 (200.5) de 400.3 euros</h4>";
$compte1->crediterCompte(400.3);
echo $compte1->afficherInfosCompte ();
