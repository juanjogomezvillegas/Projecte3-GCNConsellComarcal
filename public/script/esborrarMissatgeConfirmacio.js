let idEsborrar;

$(document).ready(function() {
    $("span.esborrarMissatge").click(function(e) {
        idEsborrar = $( e.target ).first().next().val();
        $("div#modalConfirmacio").removeClass("hidden");

    });
    $("button.confirmarEsborrarUsuari").click(function() {
        $.ajax({
            url: "index.php?r=esborrarusuari&id="+idEsborrar, 
            type: "POST",
            success: (response) => {
                window.location.assign("index.php?r=llistarusuari");
            }
        });
    });
    $("button.confirmarEsborrarCategoria").click(function() {
        $.ajax({
            url: "index.php?r=esborrarcategoria&id="+idEsborrar, 
            type: "POST",
            success: (response) => {
                window.location.assign("index.php?r=llistarcategoria");
            }
        });
    });
    $("button.confirmarEsborrarArticle").click(function() {
        $.ajax({
            url: "index.php?r=esborrararticle&id="+idEsborrar, 
            type: "POST",
            success: (response) => {
                window.location.assign("index.php?r=llistararticle");
            }
        });
    });
    $("button.cancelarEsborrar").click(function() {
        $("div#modalConfirmacio").addClass("hidden");
    });
});