<?php
include 'connect.php';
$kategorija=$_GET['kategorija'];
$query="SELECT * FROM vijesti WHERE kategorija='$kategorija' AND prikaz=0";
$rezultat=mysqli_query($dbc,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L’OBS - <?php echo $kategorija; ?></title>
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
    <section class="kategorija">
        <p class="path">L’Obs > <?php echo $kategorija; ?></p>
        <h1 class="clanak-naslov"><?php echo $kategorija; ?></h1>
        <div class="container">
        <?php while($row=mysqli_fetch_array($rezultat)){?>
        <article>
            <img src="images/<?php echo $row['slika']; ?>">
            <div class="tekst">
                <h3><a href="clanak.php?id=<?php echo $row['id']; ?>">
                    <?php echo $row['naslov']; ?>
                </a></h3>
                <p><?php echo $row['datum']; ?></p>
            </div>
        </article>
        <?php } ?>
        </div>
    </section>  
  </main>
  <footer>
    © L’Obs - Les marques ou contenus du site nouvelobs.com sont soumis à la protection de la propriété intellectuelle
    <p>Kristina Bobek - kbobek@tvz.hr - 2026</p>
  </footer>
</body>
</html>