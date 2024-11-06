$(document).ready(function() {
    $(".fav").on("click", function() {
        const img = $(this);
        const idGrobu = img.data("grob");      
        $.post("changeFav.php", { idGrobu: idGrobu }, function(data) {
            if (data === "sukces") {
                const currentSrc = img.attr('src');
                if (currentSrc === 'niezapalony.png') {
                    img.attr('src', 'zapalony.png');
                } else {
                    img.attr('src', 'niezapalony.png');
                }
            }
        });
    });
});
