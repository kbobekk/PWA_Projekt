<?php
include 'connect.php';
$title="";
$about="";
$content="";
$kategorija="";
$slika="";
if(isset($_POST['title'])){
    $title=$_POST['title'];
}
if(isset($_POST['about'])){
    $about=$_POST['about'];
}
if(isset($_POST['content'])){
    $content=$_POST['content'];
}
if(isset($_POST['kategorija'])){
    $kategorija=$_POST['kategorija'];
}
if(isset($_FILES['slika'])){
    $slika=$_FILES['slika']['name'];
}
if(isset($_POST['prikaz'])){
    $prikaz=0;
}else{
    $prikaz=1;
}
$datum=date("d.m.Y.");
$target_dir='images/'.$slika;
move_uploaded_file($_FILES['slika']['tmp_name'],$target_dir);
$query="INSERT INTO vijesti (datum,naslov,sazetak,tekst,slika,kategorija,prikaz)
VALUES ('$datum','$title','$about','$content','$slika','$kategorija','$prikaz')";
$rezultat=mysqli_query($dbc,$query) or die('Error querying database.');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L’OBS</title>
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
    <section class="clanak">
        <p class="path">L’Obs > <?php echo $kategorija; ?></p>
        <h1 class="clanak-naslov"><?php echo $title; ?></h1>
        <div class="clanak-slika">
            <img src="images/<?php echo $slika; ?>" alt="slika">
        </div>
        <div class="kratki-opis">
            <?php echo $about; ?>
        </div>
        <div class="datum">
            Objavljeno <?php echo $datum; ?>
        </div>
        <div class="clanak-tekst">
            <?php echo nl2br($content); ?>
        </div>
    </section>
  </main>
  <footer>
    © L’Obs - Les marques ou contenus du site nouvelobs.com sont soumis à la protection de la propriété intellectuelle
    <p>Kristina Bobek - kbobek@tvz.hr - 2026</p>
  </footer>
</body>
</html>