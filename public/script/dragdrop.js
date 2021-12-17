$(document).ready(function() {
    $("div#dropzone").draggable({ revert: true });
    let valor;
    $("div#dropzone").droppable({
	    drop: function (e, ui) {
	        valor = ui.draggable;
	        valor.hide();
	    }
	});
});