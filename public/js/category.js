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
		$.ajax({
			type: 'get',
			url: '/categories',
			success: function(response) {
				var toAppend = '';
				var optSelect = $(document).find('#categories');
				$.each(response, function(i, o) {
					toAppend += '<option>'+o.name+'<option>';
				})
				optSelect.append(toAppend);
			}
		});
	}
}

Categories.Init();