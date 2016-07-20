$(document).ready(function() {
	$('#btnAddContact').click(function(){
		$('#contactModal').modal('show'); 
	});

	$('#btnAddContactModal').click(function(){
		var form = document.forms['formKontak'];
		form.submit();
	});
});