<?php
// połączenie z bazą danych
$connection = mysqli_connect('localhost', 'root', '', 'egzamin1');

// PHP ZADANIE 2
session_start();

setcookie("first", "1", time() + 3600);
$_COOKIE["first"] = 1;
if(@$_SESSION["notFirst"] == "True"){
    $_COOKIE["first"] = 0;
}

?>
<html>
    <head>
        <title> Odloty samolotów </title>
        <link rel="stylesheet" href="styl6.css" </link>
    <head>
    <body>
        <!-- Headery -->
        <header class="header-left">
            <h2> Odloty z lotniska </h2>
        </header>

        <header class="header-right">
            <img src="zad6.png" alt="logotyp" height="150px">
        </header>
        <!-- Main -->
        <section>
            <h4> tabela odlotów </h4>
            <?php
            // PHP ZADANIE 1
            $sql = "SELECT id, nr_rejsu, czas, kierunek, status_lotu from odloty ORDER BY czas DESC";
            $query = mysqli_query($connection, $sql);

            echo "<table>";
            echo
            "<th>LP.</th>
            <th>NUMER REJSU</th>
            <th>CZAS</th>
            <th>KIERUNEK</th>
            <th>STATUS</th>"
            ;
            while($result = mysqli_fetch_array($query)){
                echo "<tr>";
                echo "<td>".$result['id']."</td>";
                echo "<td>".$result['nr_rejsu']."</td>";
                echo "<td>".$result['czas']."</td>";
                echo "<td>".$result['kierunek']."</td>";
                echo "<td>".$result['status_lotu']."</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </section>
        <!-- Stopki -->
        <footer class="footer-left">
            <a href="zad6.png"> Pobierz obraz </a>
        </footer>

        <center> <footer class="footer-mid">
            <?php
                if(isset($_COOKIE["first"])){
                    if($_COOKIE["first"] == "1"){
                        echo "<p> <i> Dzień dobry! Sprawdź regulamin naszej strony </i> </p>";
                        $_SESSION["notFirst"] = "True";
                    } else {
                        echo "<p> <b> Miło nam, że nas znowu odwiedziłeś </b> </p>";
                    }
                }
            ?>
        </footer> </center>

        <footer class="footer-right">
            <text> Autor: 0000000000X</text>
        </footer>
    </body>
</html>