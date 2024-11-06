<?php
require("session.php");
require("db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wstawianie</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="icon" href="../images/icon.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
    <div class="main">
        <div class="bg-image"></div>
        <div class="bg-text przerwa">
            <?php
                    $id = $_GET['id_grobu'];
                    $sql = "SELECT id, imie, nazwisko, tekst FROM groby WHERE id= $id ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $imie = $row["imie"];
                        $nazwisko = $row["nazwisko"];
                        $tekst = $row["tekst"];

                    }
                }
                        
            ;
                ?>
                <h2>Edytuj grób</h2></br>
                <form action="edycjaGrobu.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <p>  Imię: </p><input type="text" name="imie" value = <?php echo $imie; ?> >
                <p>Nazwisko: </p><input type="text" name="nazwisko"  value ="<?php echo $nazwisko; ?>">
                <p> Tekst: </p> <textarea name="tekst" cols="30" rows="10" ><?php echo $tekst; ?></textarea>
                </p>
                <p>
                    Zdjęcie: <input type="file" name="zdjecie">
                </p>
                <p>
                    <input type="submit" value="Zedytuj grób">
                </p>
        </form>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>