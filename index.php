<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cmentarz</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="./styles/style.css">
    <link rel="icon"  href="./images/icon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img class="ikona" width="4%" src="./images/nagrobek.png" >
        <a class="navbar-brand" href="#">Cmentarz im. Ryana Goslinga</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#">Strona główna <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="src/order.php">Zamów</a>
            <a class="nav-item nav-link" href="src/search.php">Wyszukiwarka grobów</a>
            <a class="nav-item nav-link" href="src/login.php">Logowanie</a>
          </div>
        </div>
    </nav>
    <div class="main">
        <div class="bg-image"></div>
        <div class="bg-text">
            <h1>Witamy!</h1>
            <p>Wirtualny cmentarz to idealne miejsce by uwiecznić życie naszych zmarłych bliskich przez internet!</p>
        </div>
    </div>
    <div class="container">
        <div class="last-added">
          <h1>Ostatnio kupione groby</h1>
          <?php
        $conn = new mysqli("localhost", "root", "", "cmentarzysko");
         $sql = "SELECT id, imie, nazwisko, tekst, zdjecie  
FROM groby
ORDER BY id DESC
LIMIT 3;";

    
         $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<div class='wrap'>";
            while($row = $result->fetch_assoc()) {
                echo "
                <div class='card'>
  <img src='./images/" . $row["zdjecie"]. "'>
  <div class='container'>
    <h4><b><a href='src/details.php?id=".$row["id"]."'>".$row["imie"]." ".$row["nazwisko"]."</a></b></h4>
  </div>
</div>";
            }
        echo "</div>";
        } else {
            echo "Brak wyników";
        }
         $conn->close();
    ?>
        </div>
    </div>
    <?php include("src/footer.php"); ?>
</body>
</html>