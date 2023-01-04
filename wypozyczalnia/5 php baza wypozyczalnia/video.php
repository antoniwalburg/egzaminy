<!DOCTYPE html>
<html lang=pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styl3.css" rel="stylesheet"> 
    <title>Video On Demand</title>
</head>
<body>
    <!-- Top -->
    <header class="baner-left">
        <h1> Interentowa wypożyczalnia filmów </h1>
    </header>
    <header class="baner-right">
        <table>
            <th> Kryminał </th> <th> Horror </th> <th> Przygodowy </th>
            <tr>
                <td> 20 </td> <td> 30 </td> <td> 20 </td>
            </tr>
        </table>
    </header>
    <!-- List Under Top -->
    <section class="list">
        <h3> Polecamy </h3>
        <!-- Script 1 -->
        <?php
            $connection = new mysqli("localhost","root","","dane3");
            $query = $connection -> query("SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id IN (18,22,23,25)");
            while ($r = mysqli_fetch_object($query)){
                $id = $r -> id;
                $name = $r -> nazwa;
                $desc = $r -> opis;
                $photo = $r -> zdjecie;
                echo "<section class='movie'>
                    <h4> $id $name </h4>
                    <img src='$photo' alt='film'>
                    <a> $desc </a>
                </section>";
            }
        ?>
    </section>
    <!-- Main -->
    <section class="main-films">
        <h3> Filmy fantastyczne </h3>
        <!-- Script 2 -->
        <?php
            $query = $connection -> query("SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id = 12");
            while ($r = mysqli_fetch_object($query)){
                $id = $r -> id;
                $name = $r -> nazwa;
                $desc = $r -> opis;
                $photo = $r -> zdjecie;
                echo "<section class='movie'>
                    <h4> $id $name </h4>
                    <img src='$photo' alt='film'>
                    <a> $desc </a>
                </section>";
            }
        ?>
    </section>
    <foooter>
        <form method="POST" action="video.php">
            Usuń film nr.:
            <input type="number" name="number-delete">
            <input type="submit" name="submit" value="Usuń film"> 
        </form>
        Stronę wykonał: Antoni Walburg
        <?php
            if(isset($_POST['number-delete']) && isset($_POST['submit'])){
                $toDeleteMovieId = $_POST['number-delete'];
                $delete_query = $connection -> query("DELETE FROM produkty WHERE id = '$toDeleteMovieId'");
            }
            mysqli_close($connection);
        ?>
    </footer>
</body>
</html>