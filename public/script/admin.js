$(document).ready(function() {
    $.ajax({
        url: "index.php?r=admin",
        type: "POST",
        async: true,
        data: { p : "prova" },
        success: (response) => {
            console.log("prova exit");
        }
    });
});

/*
let categories = $();
let articles = $();
let usuaris = $();
*/