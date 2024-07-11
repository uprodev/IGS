jQuery(document).ready(function($) { 

	$(document).on('click', '.load_news', function(e){
		e.preventDefault();
		let _this = $(this);

		let data = {
			'action': 'load_news',
			'query': _this.attr('data-param-posts'),
			'page': this_page,
		}

		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			data: data,
			type: 'POST',
			success:function(data){
				if (data) {
					$('#response_news').append(data); 
					this_page++;                      
					if (this_page == _this.attr('data-max-pages')) {
						_this.remove();               
					}
				} else {                              
					_this.remove();                   
				}
			}
		});
	});


	$(document).on('click', '.load_vacancies', function(e){
		e.preventDefault();
		let _this = $(this);

		let data = {
			'action': 'load_vacancies',
			'query': _this.attr('data-param-posts'),
			'page': this_page,
		}

		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			data: data,
			type: 'POST',
			success:function(data){
				if (data) {
					$('#response_vacancies').append(data); 
					this_page++;                      
					if (this_page == _this.attr('data-max-pages')) {
						_this.remove();               
					}
				} else {                              
					_this.remove();                   
				}
			}
		});
	});


	$(document).on('submit', '#search-form', function(e){
		e.preventDefault();
		let _this = $(this);

		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			data: _this.serialize(),
			success: function(data){
				$('#ajax_news').html(data);
			}
		});
	});


	$(document).on('click', '.btn-flag', function(e){
		e.preventDefault();
		$('.btn-flag').addClass('btn-border');
		$(this).toggleClass('btn-border');

		let term_id = $(this).attr('data-value');

		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			data:{
				action: 'vacancies_by_term',
				term_id: term_id,
			},
			success:function(data){
				$('#ajax_vacancies').html(data);
			}
		});
	});

});