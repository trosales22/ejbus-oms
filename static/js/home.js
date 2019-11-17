$(function() {
	function base_url() {
		var pathparts = location.pathname.split('/');
		var url;

		if (location.host == 'localhost') {
			url = location.origin+'/'+pathparts[1].trim('/')+'/'; // http://localhost/myproject/
		}else{
			url = location.origin + "/"; // http://stackoverflow.com/
		}
		return url;
	}

	$('#tbl_reservation').DataTable();

	$("#inputReservationDate").flatpickr({
		dateFormat: "m/d/Y",
		static: true,
		allowInput: true
	});

	$("#inputReservationTime").flatpickr({
		enableTime: true,
		noCalendar: true,
		dateFormat: "G:i K",
	});

	function reserveNow(){
		$("#frmReserveNow").submit(function(e) {
			//prevent Default functionality
			e.preventDefault();
			
			//get the action-url of the form
			var actionUrl = e.currentTarget.action;
			
			$.confirm({
				title: 'Confirmation!',
				content: 'Are you sure you want to reserve this bus?',
				useBootstrap: false, 
				theme: 'supervan',
				buttons: {
					NO: function () {
						//do nothing
					},
					YES: function () {
						$.ajax({
							url: actionUrl,
							type: 'POST',
							data: $("#frmReserveNow").serialize(),
							success: function(data) {
								var obj = JSON.parse(data);
								
								if(obj.flag === 0){
									$.alert({
										title: "Oops! We're sorry!",
										content: obj.msg,
										useBootstrap: false,
										theme: 'supervan',
										buttons: {
											'Ok, Got It!': function () {
												//do nothing
											}
										}
									});
								}else{
									$.alert({
										title: 'Success!',
										content: obj.msg,
										useBootstrap: false,
										theme: 'supervan',
										buttons: {
											'Ok, Got It!': function () {
												location.replace(base_url());
											}
										}
									});
								}
							},
							error: function(xhr, status, error){
								var errorMessage = xhr.status + ': ' + xhr.statusText;
								$.alert({
									title: "Oops! We're sorry!",
									content: errorMessage,
									useBootstrap: false,
									theme: 'supervan',
									buttons: {
										'Ok, Got It!': function () {
											//do nothing
										}
									}
								});
							}
						});
						
					}
				}
			});
		});

		$('#frmReserveNow').parsley().on('field:validated', function() {
			var ok = $('.parsley-error').length === 0;
		});
	}

	reserveNow();
});
