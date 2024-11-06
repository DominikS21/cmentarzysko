<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="../styles/style.css">

    <link rel="icon"  href="/images/icon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img class="ikona" width="4%" src="../images/nagrobek.png" >
        <a class="navbar-brand" href="#">Cmentarz im. Ryana Goslinga</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <a class="nav-item nav-link active" href="../index.php">Strona główna <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="order.php">Zamów</a>
            <a class="nav-item nav-link" href="search.php">Wyszukiwarka grobów</a>
            <a class="nav-item nav-link" href="login.php">Logowanie</a>
          </div>
        </div>
    </nav>
    <div class="main">
        <div class="bg-image"></div>
        <div class="bg-text">

<h2>Rejestracja</h2>
    <form action="register.php" method="post">
        Login: <input type="text" name="login" required><br>
        Hasło: <input type="password" name="haslo" required><br>
        <input type="submit" value="Zarejestruj się">
    </form>
    <?php
    session_start();
    require("db.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require("db.php");
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];
        $sql = "INSERT INTO uzytkownicy (login, haslo, email) VALUES ('$login', '$haslo', 'user')";
        if ($conn->query($sql) === TRUE) {
            echo "Rejestracja zakończona sukcesem!";
        } else {
            echo "Błąd: " . $conn->error;
        }
    }
    ?>
    <a href="login.php">Zaloguj się</a>
    
        </div>
    </div>
    <div class="container">
        
    </div>
    <?php include("footer.php"); ?>
</body>
</html>