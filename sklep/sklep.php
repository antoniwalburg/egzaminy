<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset='UTF-8'>
        <link href="styl2.css" rel="stylesheet">
        <title> Warzywniak </title>
    </head>
    <body>
        <header id="baner-left">
            <h1> Internetowy skelp z eko-warzywami </h1>
        </header>
        <header id="baner-right">
            <ol>
                <li> warzywa </li>
                <li> owoce </li>
                <a href="https://terapiasokami.pl/" target="_blank"><li> soki </li> </a>
            </ol>
        </header>
        <section id="block-main">
            <!-- Script -->
            <?php
                $conn = new mysqli("localhost","root","","dane2");
                $query = $conn -> query("SELECT nazwa,opis,cena,ilosc,zdjecie from produkty WHERE produkty.Rodzaje_id in (1,2)");
                while($r = mysqli_fetch_object($query)){
                    $name = $r -> nazwa;
                    $desc = $r -> opis;
                    $price = $r -> cena;
                    $amount = $r -> ilosc;
                    $photo = $r -> zdjecie;
                    echo "<section id='block-product'>";
                    echo "<img src='$photo' alt='warzywniak'>";
                    echo "<h5> $name </h5>";
                    echo "<p> $desc </p>";
                    echo "<p> $amount </p>";
                    echo "<h2> $price zł </h2>";
                    echo "</section>";
                }
            ?>
        </section>
        <footer>
            <form method="POST" action="sklep.php">
                Nazwa:
                <input name="onName" type="text">
                Cena:
                <input name="onPrice" type="number">
                <input type="submit" name="onSubmit" value="Dodaj produkt">
                <br>
                Stronę wykonał: Antoni Walburg
            </form>
            <?php 
                if(isset($_POST["onName"]) && isset($_POST["onPrice"])
                && isset($_POST["onSubmit"])) {
                    $nameNext = $_POST["onName"];
                    $priceNext = $_POST["onPrice"];
                    $queryNext = $conn -> query("INSERT INTO produkty(`id`, `Rodzaje_id`, `Producenci_id`, `nazwa`, `ilosc`, `opis`, `cena`, `zdjecie`) VALUES(NULL,1,4,'$nameNext',10,'',$priceNext,'owoce.jpg')");
                }
                mysqli_close($conn);
            ?>
        </footer>
    </body>
</html>