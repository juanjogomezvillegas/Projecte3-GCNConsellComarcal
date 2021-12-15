
$(document).ready(function() {

    $("span.contentMsg").click(function(e) {
        let missatge = $( e.target ).first().prev().val();

        $("div#modalMissatge").removeClass("hidden");

        $("p#contentMessage").text(missatge);
    });

    $("button#tancaModal").click(function() {
        $("div#modalMissatge").addClass("hidden");
    });
});