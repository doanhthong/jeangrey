$(document).ready(function() {
	var $filter_location = $('#filter-location select').select2({ width: '250px' });
	var $filter_role = $('#filter-role select').select2({ width: '250px' });
	var $filter_job_type = $('#filter-job-type select').select2({ width: '250px' });

	select_custom_click("#filter-location", $filter_location);
	select_custom_click("#filter-role", $filter_role);
	select_custom_click("#filter-job-type", $filter_job_type);

	$("#filter-compensation .dropdown-menu").click(function(e) {
		e.stopPropagation();
	})

	function select_custom_click(selector, select2obj)
	{
		$(selector + ' .dropdown-menu').click(function(e) {
			e.stopPropagation();
			select2obj.select2("open");
		});

		$(selector).click(function() {
			select2obj.select2("open");
		});
	}
});

