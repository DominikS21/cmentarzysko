<footer>
        <p>Autor: Dominik Sabak</p>
        <textarea id="reportContent"></textarea></br>
        <button id="submitReport">Wyślij zgłoszenie</button>
</footer>

<script>
    $(document).ready(function() {
        $("#submitReport").on("click", function() {
            const tresc = $("#reportContent").val();
            $.post("../src/submitReport.php", {
                tresc: tresc
            }, function(response) {
                if (response.trim() === "sukces") {
                    alert("Zgłoszenie zostało pomyślnie dodane.");
                    $("#reportContent").val("");
                } else {
                    alert("Wystąpił błąd podczas dodawania zgłoszenia.");
                }
            });
        });
    });
</script>