<?php
include 'connect.php';
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
    <section>
        <h2>POLITIQUE</h2>
        <div class="container">
            <?php
            $query="SELECT * FROM vijesti WHERE prikaz=0 AND kategorija='Politique' LIMIT 3";
            $rezultat=mysqli_query($dbc,$query);
            while($row=mysqli_fetch_array($rezultat)){
            ?>
            <article>
                <img src="images/<?php echo $row['slika'];?>" alt="slika">
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
    <section>
        <h2>IMMOBILIER</h2>
        <div class="container">
            <?php
            $query="SELECT * FROM vijesti WHERE prikaz=0 AND kategorija='Immobilier' LIMIT 3";
            $rezultat=mysqli_query($dbc,$query);
            while($row=mysqli_fetch_array($rezultat)){
            ?>
            <article>
                <img src="images/<?php echo $row['slika'];?>" alt="slika">
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