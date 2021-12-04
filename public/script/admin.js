$(document).ready(function() {
    $("div.itemsAdminUsuaris").click(function() {
        $.ajax({
            url: "index.php?r=llistarusuari", 
            type: "POST",
            success: (response) => {
                console.log(response);
            }
        });
        window.location.assign("index.php?r=llistarusuari");
    });
    $("div.itemsAdminArticles").click(function() {
        $.ajax({
            url: "index.php?r=llistararticle", 
            type: "POST",
            success: (response) => {
                console.log(response);
            }
        });
        window.location.assign("index.php?r=llistararticle");
    });
    $("div.itemsAdminCategories").click(function() {
        $.ajax({
            url: "index.php?r=llistarcategoria", 
            type: "POST",
            success: (response) => {
                console.log(response);
            }
        });
        window.location.assign("index.php?r=llistarcategoria");
    });
});