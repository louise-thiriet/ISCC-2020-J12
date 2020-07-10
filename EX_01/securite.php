<?php
session_start();

function connect_to_database(){
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $databasename = "base-site-rooting";

    try{
        $pdo=new PDO("mysql:host=$servername;dbname=$databasename", $username, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return($pdo);
    }
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
}

function login($pdo)
{
    try{
        if (!empty($_POST['login']) && !empty($_POST['password'])){

            $login=$_POST['login'];
            $password=$_POST['password'];

            $requete=$pdo->query("SELECT passwordd
            FROM utilisateurs
            WHERE login='$login'");
            $res=$requete->fetchAll();

            if ($res){
            
                if($password == $res[0]['passwordd']){
                    echo "Bonjour ".$_POST['login']. " !";
                    echo '<br>';
                    echo 'Vous êtes connectés';
                    echo '<br>';
                    echo '<a href="http://localhost/ISCC/J12/EX_01/mini-site-rooting.php?page=admin">>>>>>>>Page Admin</a>';
                }
            }
            else{
                echo "<p>Mauvais couple identifiant / mot de passe.</p>";
                echo '<p><a href="http://localhost/ISCC/J12/EX_01/mini-site-rooting.php?page=connexion">Connexion</a></p>';
            }
        }
    }
    catch(PDOException $e){
        echo "Login erreur".$e->getMessage();
    }
}

$pdo = connect_to_database();
login($pdo);
?>