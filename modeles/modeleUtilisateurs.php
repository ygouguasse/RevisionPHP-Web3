<?php

require_once "modeles/bd.php";

class ModeleUtilisateurs
{
  public static function obtenirUtilisateur($courriel)
  {
    $requete = BD::ObtenirConnexion()->prepare(' SELECT *
    FROM utilisateurs
   WHERE courriel = :courriel ');
   
    $requete->bindparam('courriel', $courriel, PDO::PARAM_STR);
    
  
    try {
        $requete->execute();
        return $requete;

    } catch (PDOException $e) {
        echo 'Erreur de connexion  : ' . $e->getMessage();
    }

  }

  public static function ajouterUtilisateur($courriel, $motDePasse)
  {
    $req = BD::ObtenirConnexion()->prepare(
      "INSERT INTO utilisateurs (courriel, motDePasse) VALUES
            (:courriel, :motDePasse)"
    );

    $req->bindParam("courriel", $courriel, PDO::PARAM_STR);
    $req->bindParam("motDePasse", $motDePasse, PDO::PARAM_STR);
    $req->execute();

    return $req;
  }
}
