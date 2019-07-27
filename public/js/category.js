var Categories = {
	Init: function() {
		Categories.registerEventListeners();
	},

	registerEventListeners: function() {
		$(document).on('click', '.add-topic', function(e) {
			e.preventDefault();
			Categories.populateDataToOptionSelect();
		});
	},

	populateDataToOptionSelect: function() {
		var toAppend = [];
		$.ajax({
			type: 'get',
			url: '/categories',
			success: function(response) {
				var optSelect = $(document).find('#categories');
				$.each(response, function(key, value) {
					toAppend.push('<option value="'+value.id+'">'+value.name+'</option>');
				})
				optSelect.html(toAppend.join(''));
			}
		});
	}
}

Categories.Init();