<?php
include 'connect.php';
$id=$_GET['id'];
$query="SELECT * FROM vijesti WHERE id=$id";
$rezultat=mysqli_query($dbc,$query);
$row=mysqli_fetch_array($rezultat);
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
        <p class="path">L’Obs > <?php echo $row['kategorija']; ?></p>
        <h1 class="clanak-naslov"><?php echo $row['naslov']; ?></h1>
        <div class="clanak-slika">
            <img src="images/<?php echo $row['slika']; ?>" alt="slika">
        </div>
        <div class="kratki-opis">
            <?php echo $row['sazetak']; ?>
        </div>
        <div class="datum">
            Objavljeno <?php echo $row['datum']; ?>
        </div>
        <div class="clanak-tekst">
            <?php echo nl2br($row['tekst']); ?>
        </div>
    </section>
  </main>
  <footer>
    © L’Obs - Les marques ou contenus du site nouvelobs.com sont soumis à la protection de la propriété intellectuelle
    <p>Kristina Bobek - kbobek@tvz.hr - 2026</p>
  </footer>
</body>
</html>