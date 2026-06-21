<?php
session_start();
include 'connect.php';
$uspjesnaPrijava=false;
$admin=false;
if(isset($_SESSION['username']) && $_SESSION['razina']==1){
    $uspjesnaPrijava=true;
    $admin=true;
}
if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    header("Location: administrator.php");
    exit();
}


if(isset($_POST['prijava'])){
    $prijavaKorisnickoIme=$_POST['username'];
    $prijavaLozinkaKorisnik=$_POST['password'];
    $sql="SELECT ime, lozinka, razina FROM korisnik WHERE korisnicko_ime=?";
    $stmt=mysqli_stmt_init($dbc);
    if(mysqli_stmt_prepare($stmt,$sql)){
        mysqli_stmt_bind_param($stmt,'s',$prijavaKorisnickoIme);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt,$ime, $password,$razina);
        mysqli_stmt_fetch($stmt);
        if(mysqli_stmt_num_rows($stmt)>0 && password_verify($prijavaLozinkaKorisnik,$password)){
            $uspjesnaPrijava=true;
            if($razina==1){
                $admin=true;
            }
            $_SESSION['username']=$ime;
            $_SESSION['razina']=$razina;
            header("Location: administrator.php");
            exit();
        }
    }
}
if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $query="DELETE FROM vijesti WHERE id='$id'";
    mysqli_query($dbc,$query);
}
if(isset($_POST['update'])){
    $id=$_POST['id'];
    $title=$_POST['title'];
    $about=$_POST['about'];
    $content=$_POST['content'];
    $kategorija=$_POST['kategorija'];
    if(isset($_POST['prikaz'])){
        $prikaz=0;
    }else{
        $prikaz=1;
    }
    $slika=$_FILES['slika']['name'];
    if($slika!=""){
        move_uploaded_file($_FILES['slika']['tmp_name'],'images/'.$slika);
        $query="UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content', slika='$slika', kategorija='$kategorija', prikaz='$prikaz'
        WHERE id='$id'";
    }else{
        $query="UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content', kategorija='$kategorija', prikaz='$prikaz'
        WHERE id='$id'";
    }
    mysqli_query($dbc, $query);
}
$query="SELECT * FROM vijesti";
$result=mysqli_query($dbc,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L’OBS - Administracija</title>
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
    <?php
    if($uspjesnaPrijava==true && $admin==true){
    ?>
    <section class="admin">
        <p class="path">L’Obs > Administracija</p>
        <h1>Administracija vijesti</h1>
        <div class="naprijed-nazad">
            <a href="unos.php">Dodaj novu vijest</a>
        </div>
        <?php while($row=mysqli_fetch_array($result)){ ?>
        <form method="post" class="admin-form" enctype="multipart/form-data">
            <label for="title">Naslov vijesti</label>
            <input type="text" name="title" id="title" value="<?php echo $row['naslov']; ?>">
            <label for="about">Kratki sadržaj vijesti</label>
            <textarea name="about" id="about" rows="5"><?php echo $row['sazetak']; ?></textarea>
            <label for="content">Sadržaj vijesti</label>
            <textarea name="content" id="content" rows="10"><?php echo $row['tekst']; ?></textarea>
            <label for="kategorija">Kategorija vijesti</label>
            <select name="kategorija" id="kategorija">
                <option value="Politique" <?php if($row['kategorija']=="Politique") echo "selected"; ?>>Politique</option>
                <option value="Immobilier" <?php if($row['kategorija']=="Immobilier") echo "selected"; ?> >Immobilier</option>
            </select>
            <label for="slika">Slika</label>
            <input type="file" name="slika" id="slika"><br>
            <img src="images/<?php echo $row['slika']; ?>" width="250">
            
            <div class="prikaz">
                <label for="prikaz">Prikaz vijesti na stranici</label>
                <input type="checkbox" name="prikaz" id="prikaz" <?php if($row['prikaz']==0){ echo "checked"; } ?>>
            </div>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="button">
                <button type="submit" name="update">Izmijeni</button>
                <button type="submit" name="delete" id="bdel">Izbriši</button>
            </div>
        </form>
        <?php } ?>
        <div class="registracija">
            <a href="administrator.php?logout=1">Odjava</a>
        </div>
    </section>
    <?php }elseif(isset($_SESSION['username']) && $_SESSION['razina']==0){
        echo "<h2 class='poruka'>".$_SESSION['username']." uspješna prijava. Nemate administratorsku razinu.</h2>";
        ?>
        <div class="registracija">
            <a href="administrator.php?logout=1">Odjava</a>
        </div>
        <?php
    }elseif($uspjesnaPrijava==false){
    ?>
    <section class="admin">
        <p class="path">L’Obs > Prijava</p>
        <h1>Prijava</h1>
        <form method="POST">
            <label>Korisničko ime:</label>
            <input type="text" name="username" required>
            <label>Lozinka:</label>
            <input type="password" name="password" required>
            <div class="button">
                <button type="submit" name="prijava">Prijava</button>
            </div>
        </form>
        <br>
        <div class="registracija">
            <a href="registracija.php">Registriraj se</a>
        </div>
    </section>
    <?php } ?>
  </main>
  <footer>
    © L’Obs - Les marques ou contenus du site nouvelobs.com sont soumis à la protection de la propriété intellectuelle
    <p>Kristina Bobek - kbobek@tvz.hr - 2026</p>
  </footer>
</body>
</html>