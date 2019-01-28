$(function(){
	$('#modalButton').click(function(){
		$('#modal').modal('show')
			.find('#modalContent')
			.load($(this).attr('value'));
	});
});

$(function(){
	$('#modalButton1').click(function(){
		$('#modal1').modal('show')
			.find('#modalContent1')
			.load($(this).attr('value'));
	});
});

