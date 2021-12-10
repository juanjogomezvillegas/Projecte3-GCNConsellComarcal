
$(document).ready(function() {
    setInterval(setArticlesFavoritsFooter, 1000);

    $("span.estrella").click(function(e) {
        let favoritActiu = $( e.target ).is(".text-yellow-400");
        let idArticle = $( e.target ).parent().parent().children().first().val();

        if (favoritActiu) {
            $.ajax({
                url: "index.php?r=esborrarFavorits", 
                type: "POST",
                data: { idArticle },
                success: (response) => {
                    console.log(response);
                }
            });
            $( e.target ).removeClass("text-yellow-400").addClass("text-gray-400");
        } else {
            $.ajax({
                url: "index.php?r=afegirFavorits", 
                type: "POST",
                data: { idArticle },
                success: (response) => {
                    console.log(response);
                }
            });
            $( e.target ).removeClass("text-gray-400").addClass("text-yellow-400");
        }
    });
});

function setArticlesFavoritsFooter() {
    $.ajax({
        url: "index.php?r=consultarFavorits", 
        type: "POST",
        success: function(data) {
            //console.table($.parseJSON(data));
            $.parseJSON(data).forEach(element => {
                console.log(element);
            });
        }
    });
}