let missatge;
let idMsg;

$(document).ready(function() {

    $("span.contentMsg").click(function(e) {
        missatge = $( e.target ).first().prev().val();
        idMsg = $( e.target ).first().prev().prev().val();

        $("div#modalMissatge").removeClass("hidden");

        $("p#contentMessage").text(missatge);
    });

    $("button#esborrarMissatgeModal").click(function() {
        $.ajax({
            url: "index.php?r=esborrarmissatge&id="+idMsg, 
            type: "POST",
            success: (response) => {
                window.location.assign("index.php?r=llistarmissatges");
            }
        });
    });

    $("span#tancaModal").click(function() {
        $("div#modalMissatge").addClass("hidden");
    });
});