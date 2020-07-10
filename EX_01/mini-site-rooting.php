<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>mini-site-routing</title>
</head>
<header>
<nav class="menu">
        <a href="http://localhost/ISCC/J12/EX_01/mini-site-rooting.php?page=1">Accueil</a>
        <a href="http://localhost/ISCC/J12/EX_01/mini-site-rooting.php?page=2">Page 2</a>
        <a href="http://localhost/ISCC/J12/EX_01/mini-site-rooting.php?page=3">Page 3</a>
        <a href="http://localhost/ISCC/J12/EX_01/mini-site-rooting.php?page=connexion">Connexion</a>
        <?php
        if(isset($_COOKIE['id'])){
            echo '<a href="http://localhost/ISCC/J12/EX_01/mini-site-rooting.php?page=admin">Admin</a>';
        }
?>
</nav>



<?php
if($_GET){
    if($_GET['page'] == 1){
        echo '<h1>' .$title = 'Accueil!</h1>';}
    elseif($_GET['page'] == 2){
        echo '<h1>' .$title = 'Page 2!</h1>';}
    elseif($_GET['page'] == 3){
        echo '<h1>' .$title = 'Page 3!</h1>';}
    elseif($_GET['page'] == 'connexion'){
        echo '<h1>' .$title = 'Connexion</h1>';
        include('connexion.php');}
    elseif($_GET['page'] == 'admin'){
        echo '<h1>' .$title = 'Admin</h1>';
?>
    <form enctype="multipart/form-data" action="admin.php" method="POST">
        <input type="text" name="login" value="Login">
        <input type="password" name="password" value="Password">
        <input type="hidden" name="MAX_FILE_SIZE" value="2097152"/>
        <input name="userfile" type="file" id="fileUpload"/>
        <input type="submit" name="submit" value="Envoyer le fichier"/>
    </form>
<?php
    include('admin.php');
    }
}
?>

</header>

<body>

<?php
if(isset($_SESSION["id"])){
    echo '<p>Login: ' .$_SESSION["id"]. '</p>';
}
elseif(isset($_COOKIE["id"])){
    $_SESSION['id'] = $_POST['login'];
    $_SESSION['mdp'] = $_POST['password'];
}
else{
    header('http://localhost/ISCC/J12/EX_01/mini-site-rooting.php?page=connexion');
}
?>
</body>
</html>
