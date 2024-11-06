<?php
require("session.php");
require("db.php");
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grób</title>
    <link rel="stylesheet" href="../styles/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img class="ikona" width="4%" src="../images/nagrobek.png">
        <a class="navbar-brand" href="#">Cmentarz im. Ryana Goslinga</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="menu.php">Strona główna <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="order.php">Zamów</a>
                <a class="nav-item nav-link" href="search.php">Wyszukiwarka grobów</a>
                <?php
            if (isset($_SESSION["rola"]) && $_SESSION["rola"] === "admin") {
                echo '<a class="nav-item nav-link" href="reports.php">Zgłoszenia</a>';
            }
        ?>
                <a class="nav-item nav-link log">Zalogowany jako: <?= $_SESSION["login"] ?></a>
                <a class="nav-item nav-link log" href="logout.php">Wyloguj</a>
            </div>
        </div>
    </nav>
    <?php
    $id = $_GET["id"];
    $idUzytkownika = $_SESSION["id"];
    $sql = "SELECT id, imie, nazwisko, tekst, zdjecie
            FROM groby
            WHERE id=$id ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='wrap'>";
        while($row = $result->fetch_assoc()) {
            echo "   <div class='card'>
  <img src='../images/" . $row["zdjecie"]. "'>
  <div class='container'>
    <h4><b><a href='details.php?id=".$row["id"]."'>".$row["imie"]." ".$row["nazwisko"]."</a></b></h4>
  </div>
</div>
<div class='container2'><h5>".$row["tekst"]."</h5></div>"
;

            
        $sqlFav = "SELECT id FROM wirtualne_znicze WHERE idGrobu=$id AND idUzytkownika=$idUzytkownika";
        $resultFav = $conn->query($sqlFav);
        echo '<div class="znicze">';
        if ($resultFav->num_rows > 0) {
            echo "<img class='fav' src='niezapalony.png' data-grob=$id>";
        }
        else {
            echo "<img class='fav' src='zapalony.png' data-grob=$id>";
        };
        if (isset($_SESSION["rola"]) && $_SESSION["rola"] === "admin") {
            echo '<a href="usun.php?id_grobu='.$id.'">Usun grob</a></br>
            <a href="edytuj.php?id_grobu='.$id.'">Edytuj grob</a>';
        }
        echo '</div>';
        }
    echo "</div>";
    } else {
        echo "Brak wyników";
    }

    ?>
    <?php
        $sql = "
        SELECT u.login AS nazwa, k.tekst, k.id_grobu 
        FROM komentarze k
        JOIN uzytkownicy u ON k.idUzytkownika = u.id
        WHERE k.id_grobu = $id
    ";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='komentarze'>
                    <h4>" . $row["nazwa"] . "</h4>
                    <p>" . $row["tekst"] . "</p>
                  </div>";
        }
    } else {
        echo "<div class='sr'><p>Brak komentarzy</p></div>";
    }
    $conn->close();
    
        ?>
    <div class="wrap">
        <form action="wstawKomentarz.php" method="post">
            <input type="hidden" name="id_grobu" value="<?php echo $id; ?>">
            <h3>Twoj komentarz</h3>
            <textarea name="tekst" cols="30" rows="3"></textarea></br>
            <input type="submit"></br>
        </form>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>