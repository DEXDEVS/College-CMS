// modalStudents....
$(function(){
	$('#modalStudents').click(function(){
		$('#modalStudent').modal('show')
			.find('#studentContent')
			.load($(this).attr('value'));
	});
});
// modalEmployees....
$(function(){
	$('#modalEmployees').click(function(){
		$('#modalEmployee').modal('show')
			.find('#employeeContent')
			.load($(this).attr('value'));
	});
});
// modalParents....
$(function(){
	$('#modalParents').click(function(){
		$('#modalParent').modal('show')
			.find('#parentContent')
			.load($(this).attr('value'));
	});
});
// modalToday's....
$(function(){
	$('#modalTodays').click(function(){
		$('#modalToday').modal('show')
			.find('#todayContent')
			.load($(this).attr('value'));
	});
});
// modalUpcoming....
$(function(){
	$('#modalUpcomings').click(function(){
		$('#modalUpcoming').modal('show')
			.find('#upcomingContent')
			.load($(this).attr('value'));
	});
});
