<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['razina']!=1){
    header("Location: administrator.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L’OBS - Unos</title>
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
        <p class="path">L’Obs > Administracija</p>
        <h1>Unos nove vijesti</h1>
        <div class="naprijed-nazad">
            <a href="administrator.php">Uredi postojeću vijest</a>
        </div>
        <form name="vijest" action="skripta.php" method="post" enctype="multipart/form-data">
            <label for="title">Naslov vijesti</label>
            <input type="text" name="title" id="title" required>
            <label for="about">Kratki sažetak vijesti</label>
            <textarea name="about" id="about" rows="5" required></textarea>
            <label for="content">Sadržaj vijesti</label>
            <textarea name="content" id="content" rows="10" required></textarea>
            <label for="kategorija">Kategorija vijesti</label>
            <select name="kategorija" id="kategorija">
                <option value="Politique">Politique</option>
                <option value="Immobilier">Immobilier</option>
            </select>
            <label for="slika">Slika</label>
            <input type="file" name="slika" id="slika" required>
            <div class="prikaz">
                <label for="prikaz">Prikaz vijesti na stranici</label>
                <input type="checkbox" name="prikaz" id="prikaz">
            </div>
            
            <div class="button">
                <button type="reset">Poništi</button>
                <button type="submit">Pošalji</button>
            </div>
        </form>
  </section>
  </main>
  <footer>
    © L’Obs - Les marques ou contenus du site nouvelobs.com sont soumis à la protection de la propriété intellectuelle
    <p>Kristina Bobek - kbobek@tvz.hr - 2026</p>
  </footer>
</body>
</html>