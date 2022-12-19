<!DOCTYPE html>
<!-- Ustawienie polskich znaków -->
<html lang="pl">
    <!-- Połączenie z bazą danych -->
    <?php
         $conn = new mysqli("localhost","root","","biblioteka");
    ?>

    <head>
        <!-- Ustawienie polskich znaków -->
        <meta charset="utf-8">
        <title> Biblioteka publiczna </title>
        <!-- Połączenie stylów -->
        <link rel="stylesheet" href="style.css"> 

    </head>

    <body>

        <header>

            <h2> <center> Miejska Biblioteka Publiczna w Książkowicach </center> </h2>

        </header>

        <section class='main-left'>

            <h2> Dodaj czytelnika </h2>
            <!-- Formularz -->
            <form method='POST'>
                
                imię:
                <input type="text" name="name">
                <br>
                </input>
                nazwisko:
                <input type="text" name="surname">
                </input>
                <br>
                rok urodzenia:
                <input type="number" name="year">
                </input>
                <br>
                <input type="submit" name="submit" value="DODAJ">
                </input>

            </form>

            <?php
              
                if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['year'])
                && isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $surname = $_POST['surname'];
                    $year = $_POST['year'];
                    echo "Czytelnik: ". $surname . " został dodany do bazy danych ";
                    // Modyfikacja kodu
                    $code = strtolower(substr($name,0,2).substr($year,-2).substr($surname,0,2));
                    // Wpisywanie elementów do bazy 
                    if(!empty($surname)){
                    $query = $conn -> query("INSERT INTO czytelnicy(id,imie,nazwisko,kod) 
                    VALUES(NULL,'$name','$surname','$code')");
                    }
                }
            ?>
            
        </section>
        <!-- Środkowy blok -->
        <section class='main-mid'>
            
            <img src="biblioteka.png" alt="biblioteka">
            <h4> ul. Czytelnicza 25 <br>
            12-120 Książkowice <br>
            tel.: 123123123  <br>
            e-mail: <a href='biuro@bib.pl'> biuro@bib.pl </a> </h4>

        </section>

        <section class='main-right'>

            <h3> Nasi czytelnicy: </h3>
            <!-- List of names and surnames from biblioteka.czytelnicy -->
            <ul>
                <?php
                    $query = $conn -> query("SELECT imie,nazwisko from czytelnicy");
                    while ($r = mysqli_fetch_object($query)){
                        $name = $r -> imie;
                        $surname = $r -> nazwisko;
                        echo "<li>". $name. " " .$surname ."</li>"; 
                    }

                    mysqli_close($conn);
                ?>
            </ul>

        </section>
        <!-- Footer -->
        <footer>

            <p> Projekt witryny: 0000000000X </p>

        </footer>
    
    </body>

</html>