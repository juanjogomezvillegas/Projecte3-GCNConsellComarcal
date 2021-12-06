let usuaris;
let articles;
let categories;
let usuarisAntic;
let articlesAntic;
let categoriesAntic;
let tempsresfresc;

const countUsuaris = $("div#countUsuaris");
const countArticles = $("div#countArticles");
const countCategories = $("div#countCategories");

$(document).ready(function() {
    tempsresfresc = parseInt($("input#tempsRefresc").val()) * 1000;
    panell = setInterval(obtenirCount, tempsresfresc);

    $("input#tempsRefresc").on("change", function() {
        if (parseInt($(this).val()) < 1 && parseInt($(this).val()) > 15) {
            tempsresfresc = 10 * 1000;
        } else {
            tempsresfresc = parseInt($(this).val()) * 1000;
        }
        
        clearInterval(panell);
        panell = setInterval(obtenirCount, tempsresfresc);
    });
    $("div.itemsAdminUsuaris").click(function() {
        window.location.assign("index.php?r=llistarusuari");
    });
    $("div.itemsAdminArticles").click(function() {
        window.location.assign("index.php?r=llistararticle");
    });
    $("div.itemsAdminCategories").click(function() {
        window.location.assign("index.php?r=llistarcategoria");
    });
});

function obtenirCount() {
    usuarisAntic = $("div#countUsuaris h3").text().trim();
    articlesAntic = $("div#countArticles h3").text().trim();
    categoriesAntic = $("div#countCategories h3").text().trim();

    $.ajax({
        url: "index.php?r=countUsuaris", 
        type: "POST",
        data: { usuaris },
        success: (response) => {
            usuaris = parseInt(response);
        }
    });
    $.ajax({
        url: "index.php?r=countArticles", 
        type: "POST",
        data: { articles },
        success: (response) => {
            articles = parseInt(response);
        }
    });
    $.ajax({
        url: "index.php?r=countCategories", 
        type: "POST",
        data: { categories },
        success: (response) => {
            categories = parseInt(response);
        }
    });

    drawResultsUsuaris();
    drawResultsArticles();
    drawResultsCategories();
};

function drawResultsUsuaris() {
    let tmp;

    if (usuaris == usuarisAntic) {
        tmp = `<h5 class="font-bold uppercase text-gray-100">Usuaris</h5>
        <h3 class="font-bold text-3xl text-gray-300">
        ${usuaris} <span class="text-pink-600"><i class="fas fa-equals"></i></span>
        </h3>`;
    } else if (usuaris > usuarisAntic) {
        tmp = `<h5 class="font-bold uppercase text-gray-100">Usuaris</h5>
        <h3 class="font-bold text-3xl text-gray-300">
        ${usuaris} <span class="text-green-600"><i class="fas fa-caret-up"></i></span>
        </h3>`;
    } else if (usuaris < usuarisAntic) {
        tmp = `<h5 class="font-bold uppercase text-gray-100">Usuaris</h5>
        <h3 class="font-bold text-3xl text-gray-300">
        ${usuaris} <span class="text-red-600"><i class="fas fa-caret-down"></i></span>
        </h3>`;
    }

    countUsuaris.html(tmp);
};

function drawResultsArticles() {
    let tmp;

    if (articles == articlesAntic) {
        tmp = `<h5 class="font-bold uppercase text-gray-100">Articles</h5>
        <h3 class="font-bold text-3xl text-gray-300">
        ${articles} <span class="text-pink-600"><i class="fas fa-equals"></i></span>
        </h3>`;
    } else if (articles > articlesAntic) {
        tmp = `<h5 class="font-bold uppercase text-gray-100">Articles</h5>
        <h3 class="font-bold text-3xl text-gray-300">
        ${articles} <span class="text-green-600"><i class="fas fa-caret-up"></i></span>
        </h3>`;
    } else if (articles < articlesAntic) {
        tmp = `<h5 class="font-bold uppercase text-gray-100">Articles</h5>
        <h3 class="font-bold text-3xl text-gray-300">
        ${articles} <span class="text-red-600"><i class="fas fa-caret-down"></i></span>
        </h3>`;
    }

    countArticles.html(tmp);
};

function drawResultsCategories() {
    let tmp;

    if (categories == categoriesAntic) {
        tmp = `<h5 class="font-bold uppercase text-gray-100">Categories</h5>
        <h3 class="font-bold text-3xl text-gray-300">
        ${categories} <span class="text-pink-500"><i class="fas fa-equals"></i></span>
        </h3>`;
    } else if (categories > categoriesAntic) {
        tmp = `<h5 class="font-bold uppercase text-gray-100">Categories</h5>
        <h3 class="font-bold text-3xl text-gray-300">
        ${categories} <span class="text-green-500"><i class="fas fa-caret-up"></i></span>
        </h3>`;
    } else if (categories < categoriesAntic) {
        tmp = `<h5 class="font-bold uppercase text-gray-100">Categories</h5>
        <h3 class="font-bold text-3xl text-gray-300">
        ${categories} <span class="text-red-600"><i class="fas fa-caret-down"></i></span>
        </h3>`;
    }

    countCategories.html(tmp);
};