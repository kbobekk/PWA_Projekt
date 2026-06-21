<?php
include 'connect.php';
$registriranKorisnik=false;
$msg="";
if(isset($_POST['registracija'])){
    $ime=$_POST['ime'];
    $prezime=$_POST['prezime'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $passRep=$_POST['passRep'];
    if($password=$passRep){
        $hashPassword=password_hash($password,PASSWORD_BCRYPT);
        $razina=0;
        $sql="SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime=?";
        $stmt=mysqli_stmt_init($dbc);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt,'s',$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }
        if(mysqli_stmt_num_rows($stmt)>0){
            $msg="Korisničko ime već postoji.";
        }else{
            $sql="INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina)
            VALUES (?,?,?,?,?)";
            $stmt=mysqli_stmt_init($dbc);
            if(mysqli_stmt_prepare($stmt,$sql)){
                mysqli_stmt_bind_param($stmt,'ssssd',$ime, $prezime, $username, $hashPassword, $razina);
                mysqli_stmt_execute($stmt);
                $registriranKorisnik=true;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L’OBS - Registracija</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <header>
    <h1>L’OBS</h1>
    <nav>
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="kategorija.php?kategorija=Politique">POLITIQUE</a></li>
            <li><a href="kategorija.php?kategorija=Immobilier">IMMOBILIER</a></li>
            <li><a href="administrator.php">ADMINISTRACIJA</a></li>
        </ul>
    </nav>
  </header>
  <main>
    <section class="admin">
        <p class="path">L’Obs > Registracija</p>
        <h1>Registracija korisnika</h1>
        <?php if($registriranKorisnik){
            echo "<p>Korisnik je uspješno registriran.</p>";} ?>
        <form method="POST">
            <label>Ime:</label>
            <input type="text" name="ime" required>
            <label>Prezime:</label>
            <input type="text" name="prezime" required>
            <label>Korisničko ime:</label>
            <input type="text" name="username" required>
            <?php echo $msg; ?>
            <label>Lozinka:</label>
            <input type="password" name="password" required>
            <label>Ponovi lozinku:</label>
            <input type="password" name="passRep" required>
            <div class="button">
                <button type="submit" name="registracija">Registracija</button>
            </div>
        </form>
        <div class="registracija">
            <a href="administrator.php">Prijavi se</a>
        </div>
    </section>
  </main>
  <footer>
    © L’Obs - Les marques ou contenus du site nouvelobs.com sont soumis à la protection de la propriété intellectuelle
    <p>Kristina Bobek - kbobek@tvz.hr - 2026</p>
  </footer>
</body>
</html>