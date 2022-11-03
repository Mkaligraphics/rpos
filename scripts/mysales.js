
$('#dataTabale').DataTable();

$(document).on('click','.mysale',function(){
	let billno =  $(this).attr('id');
		$.ajax({
			url:'harvests/fetchmysales.php',
			method:'POST',
			data:{billno:billno},
			success:function(data){
				$('.sales').html(data);
			}
		})
});