
$(document).ready(function() {
    setArticlesFavoritsFooter();

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

        setArticlesFavoritsFooter();
    });
});

function setArticlesFavoritsFooter() {
    $("ul#favoritsFooter").children().remove();
    $.ajax({
        url: "index.php?r=consultarFavorits", 
        type: "POST",
        success: function(data) {
            $.parseJSON(data).forEach(element => {
                $("ul#favoritsFooter").append("<a href='index.php?r=article&id="+element["id"]+"'>"+element["titol"]+"</a><br>");
            });
        }
    });
}