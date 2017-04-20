$(function() {
	$("ul.vertical").sortable({
		update: function() {
			var order   = $('ul.vertical').sortable('serialize');
			$("#info").load("processo.php?idCategoria/"+order);
		}
	});
	$("ul.vertical").disableSelection();
});
