$(document).ready(function() {
	$('#btnAddContact').click(function(){
		$('#contactModal').modal('show'); 
	});

	$('#btnAddContactModal').click(function(){
		var form = document.forms['formKontak'];
		var dataString = $('#formKontak').serialize();
		$.ajax({
            type: "POST",
            url: "<?= site_url('anggota/add_contact') ; ?>",
            data: dataString,
            dataType: "JSON",
            cache: false,
            success: function(json) {
            	reloadTableKontak(json);
            } 
        });

	});
});


function reloadTableKontak(json){
	$("#tableBodyKontak").html(

	);
}