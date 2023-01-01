<!DOCTYPE html>
<html lang="pl">
<?php
    $connection = new mysqli("localhost","root","","przyjaciele");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='styl.css' rel='stylesheet'>
</head>
<body>
    <!-- Body Headge -->
    <!-- Header Section -->
    <header class='baner'>
        <h1> Portal Społecznościowy - moje konto </h1>
    </header>
    <!-- Main Section -->
    <section class='main'>
        <h2> Moje zainteresowania </h2>
        <ul>
            <li> muzyka </li>
            <li> film </li>
            <li> komputery </li>
        </ul>
        <h2> Moi znajomi </h2>
        <?php
            $query = $connection -> query("SELECT imie, nazwisko, opis, zdjecie FROM osoby where Hobby_id = 1 or Hobby_id = 2 or Hobby_id = 6");
            while($r = mysqli_fetch_object($query)){
                $photo = $r -> zdjecie;
                $name = $r -> imie;
                $surname = $r -> nazwisko;
                $desc = $r -> opis;
                echo "<img class='block-photo' src='photos/$photo' alt='przyjaciel'>";
                echo "<section class='block-desc'> 
                <h3> $name $surname </h3>
                <p>$desc</p>
                </section>";
                echo "<hr>";
            }
        ?>
    </section>
    <!-- Footer Sections -->
    <footer class='footer-left'> 
        <a> Stronę wykonał: OOOOOOOOOOO </a>
    </footer>

    <footer class='footer-right'> 
        <a href="ja@portal.pl"> napisz do mnie </a>
    </footer>
</body>
</html>