$(document).ready(function() {
	$('#btnAddContact').click(function(){
		$('#contactModal').modal('show'); 
	});

	$('#btnAddContactModal').click(function(){
		var form = document.forms['formKontak'];
		
		$.ajax({
            type: "POST",
            url: "update-modal.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#body-tabel-rekomendasi").html(html);
                $('#recomender-modal').modal('show'); 
            } 
        });

	});
});