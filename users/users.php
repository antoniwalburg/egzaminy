<html lang="pl">
    <head>
        <title> Panel administratora </title>
        <link href="styl4.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <h3> Portal Społecznościowy - panel administratora </h3>
        </header>
        <section id='block-left'>
            <h4> Użytkownicy </h4>
            <?php
                $conn = new mysqli("localhost","root","","dane4");
                $query = $conn -> query("SELECT id, imie, nazwisko, rok_urodzenia, zdjecie from osoby LIMIT 30");
                while ($r = mysqli_fetch_object($query)){
                    $id = $r -> id;
                    $name = $r -> imie;
                    $surname = $r -> nazwisko;
                    $birth = $r -> rok_urodzenia;
                    $wiek = (2023 - $birth);
                    echo '<section>'.$id.". ".$name." ".$surname." ".$wiek." lat".'</section>';
                }
            ?>
            <!-- script 1 -->
            <a href="settings.html"> Inne ustawienia </a>
        </section>
        <section id='block-right'>
            <h4> Podaj id użytkownika </h4>
            <form method="POST" action="users.php">
                <input type="number" name="onData">
                <input type="submit" name="onSubmit" id="button">
            </form>
            <hr> </hr>
            <!-- Script 2 -->
            <?php
                if(isset($_POST['onData']) && isset($_POST['onSubmit'])){
                    $onId = $_POST['onData'];
                    $newQuery = $conn -> query("SELECT imie, nazwisko, rok_urodzenia, opis, zdjecie, nazwa from osoby,hobby where osoby.id = '$onId' and osoby.Hobby_id = hobby.id");
                    while ($r = mysqli_fetch_object($newQuery)){
                        $name = $r -> imie;
                        $surname = $r -> nazwisko;
                        $photo = $r -> zdjecie;
                        $newBirth = $r -> rok_urodzenia;
                        $desc = $r -> opis;
                        $title = $r -> nazwa;
                    }
                    echo '<h2>'.$onId.". ". $name." ".$surname .'</h2>';
                    echo "<img src='$photo' alt='$onId'>";
                    echo '<p>'."Rok urodzenia: ".$newBirth .'</p>';
                    echo '<p>'."Opis: ".$desc .'</p>';
                    echo '<p>'."Hobby: ".$title .'</p>';
                    mysqli_close($conn);
                }
            ?>
        </section>
        <footer>
            Stronę wykonał: Antoni Walburg
        </footer>
    </body>
</html>