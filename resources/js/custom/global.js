$(document).ready(function () {

    window.axios_options = {
        headers: { 'X-CSRF-TOKEN': _token }
    };

    window._token = $('meta[name="csrf-token"]').attr('content');

	/* login and auth */
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': _token
		}
    });

    $('.mdb-select').materialSelect();

    $('.message-agent').off('click').on('click', function() {
        message_agent($(this).data('id'), $(this).data('name'), $(this).data('email'));
    });

    function message_agent(id, name, email) {
        $('#email_agent_modal').modal();
        $('#email_agent_modal_label').text('Email '+name);
        $('#agent_id').val(id);
        $('#agent_email').val(email);
    }

	/* Format Phone */
	$('.phone').bind('keypress change blur', function () {
		format_phone(this);
	}).attr('maxlength', '14');

	function format_phone(obj) {
		var numbers = obj.value.replace(/\D/g, ''),
			char = {
				0: '(',
				3: ') ',
				6: '-'
			};
		obj.value = '';
		for (var i = 0; i < numbers.length; i++) {
			if (i > 13) {
				return false;
			}
			obj.value += (char[i] || '') + numbers[i];

		}
    }

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }

	var d = new Date();
	var year = d.getFullYear();
	var month = ('0' + (d.getMonth())).slice(-2);
	var day = ('0' + (d.getDate())).slice(-2);
	$('.datepicker').pickadate({
		format: 'yyyy-mm-dd',
		min: [year, month, day]
	});
	$('.datepicker').removeAttr('readonly');

	$('.time').pickatime({
		twelvehour: true,
		default: 'now',
		autoclose: true,
    });



    $(document).on('click', '.share-link-listing', function () {
        $(this).html('<i class="fas fa-spinner fa-spin fa-lg text-white"></i>');
        get_user_data_share();
        var message, preview;
        var link = window.location.href; // change url when agent is clicked on
        var type = $(this).data('type');
        var heading = $(this).data('heading');
        var image = $(this).data('image');
        var address = $(this).data('address');
        var beds = $(this).data('beds');
        var price = '$' + formatNumber($(this).data('price'));
        $('#shareModalLabel').html(heading);


        preview = '<div class="row"><div class="col-12 p-3">Check out the property I found for sale on Taylor Properties website</div></div> <div class="row"> <div class="col-12 col-sm-4"><img class="img-fluid" src="'+image+'"></div> <div class="col-12 col-sm-8">'+address+'<br>'+price+'<br>'+beds+'<br><a href="' + link + '" target="_blank">View Listing</a></div> </div>';

        message = '<table width="100%"> <tbody> <tr> <td colspan="2">Check out the property I found for sale on Taylor Properties website</td></tr><tr><td width="40%" class="full"><img style="width: 90%; margin-left: auto; margin-right: auto" src="' + image + '"></td><td width="60%" class="full">' + address + '<br>'+price+'<br>' + beds + '<br><a href="' + link + '" target="_blank">View Listing</a></td></tr></tbody> </table>';

        $('#share_message').html(preview);

        $('#share_form').off('submit').on('submit', function (e) {
            $('#send_share').html('Sending <i class="fas fa-spinner fa-spin text-white"></i>');
            e.preventDefault();
            if ($('#share_message_add').val() != '') {
                message = $('#share_message_add').val() + '<br>' + message;
            }
            $.ajax({
                type: 'post',
                url: '/share',
                data: { type: $('#share_type').val(), to_email: $('#share_to_email').val(), from_email: $('#share_from_email').val(), from_name: $('#share_from_name').val(), message: message  },
                success: function(response) {
                    $('#send_share').html('Send <i class="fal fa-share primary-text"></i>');
                    $('#shareModal').modal('hide');
                    toastr['success']('Listing Successfully Shared');
                }
            });
        });

    });

    $(document).on('click', '.share-link-agent', function () {
        $(this).html('Please Wait <i class="fas fa-spinner fa-spin text-white"></i>');
        get_user_data_share();
        var message, preview;
        var link = window.location.href; // change url when agent is clicked on
        var type = $(this).data('type');
        var heading = $(this).data('heading');
        var image = $(this).data('image');
        if (image == '') {
            image = window.location.protocol+'//'+window.location.hostname+'/images/agents/logo_dome_emails.png';
        }
        var agent_name = $(this).data('agentname');
        var agent_phone = '<a href="tel:'+$(this).data('agentphone')+'" target="_blank">'+$(this).data('agentphone')+'</a>';
        var agent_email = '<a href="mailto:'+$(this).data('agentemail')+'" target="_blank">'+$(this).data('agentemail')+'</a>';

        $('#shareModalLabel').html(heading);


        preview = '<div class="row"><div class="col-12 p-3">Taylor Properties Agent</div></div> <div class="row"> <div class="col-12 col-sm-4"><img class="img-fluid"  style="max-height: 200px; max-width: 200px" src="'+image+'"></div> <div class="col-12 col-sm-8">'+agent_name+'<br>'+agent_phone+'<br>'+agent_email+'<br><a href="' + link + '" target="_blank">View Agent Details</a></div> </div>';

        message = '<table width="100%"><tr> <td colspan="2">Taylor Properties Agent</td></tr><tr><td width="50%" class="full"> <img style="max-height: 300px; max-width: 300px" src="' + image + '"> </td><td width="50%" class="full"> <p>' + agent_name + '<br>' + agent_phone + '<br>' + agent_email + '<br><a href="' + link + '" target="_blank">View Agent Details</a></p></td></tr></table>';

        $('#share_message').html(preview);


        $('#share_form').off('submit').on('submit', function (e) {
            $('#send_share').html('Sending <i class="fas fa-spinner fa-spin text-white"></i>');
            e.preventDefault();
            if ($('#share_message_add').val() != '') {
                message = $('#share_message_add').val() + '<br>' + message;
                console.log(message);
            }
            $.ajax({
                type: 'post',
                url: '/share',
                data: { type: $('#share_type').val(), to_email: $('#share_to_email').val(), from_email: $('#share_from_email').val(), from_name: $('#share_from_name').val(), message: message  },
                success: function(response) {
                    $('#send_share').html('Send <i class="fal fa-share primary-text"></i>');
                    $('#shareModal').modal('hide');
                    toastr['success']('Agent Successfully Shared');
                }
            });
        });

    });



    function get_user_data_share() {
        $.ajax({
            type: 'get',
            url: '/search/user_data',
            data: {
                _token: _token
            },
            dataType: 'json',
            success: function(response) {
                if (response.status == 'found') {
                    $('#share_from_name').val(response.name);
                    $('#share_from_email').val(response.email);
                    $('.user-logged-in').hide();
                }
                $('#shareModal').modal();
                $('.share-link-listing').html('<i class="far fa-share fa-lg text-white"></i>');
                $('.share-link-agent').html('Share <i class="fa fa-share-alt text-white ml-2"></i>');
            }
        });
    }

	/* had to add this function to this file because it would not work in global.js */
	function register_user() {

        let formData = new FormData();
        formData.append('email', $('#register_email').val());
        formData.append('password', $('#register_password').val());
        formData.append('phone', $('#register_phone').val());
        formData.append('name', $('#register_name').val());

        axios.post('/register/user', formData, axios_options)
        .then(function (data) {
            data = response.data;
            if (data.status == 'error') {
                $('#register_error').show();
                $('#already_registered_login').unbind('click').bind('click', function() {
                    $('#modalRegisterForm').modal('hide');
                    $('#modalSignInForm').modal();
                });
            } else {
                $('#modalRegisterForm').modal('hide');
                $('#nav_logged').html('<div id="nav_logged_in"><a href="/dashboard" class="mb-n2 text-white float-right"><i class="fal fa-user-circle mr-2"></i> My Account</a><br><a href="/logout" class="text-yellow float-right"><small><i class="fal fa-sign-out mr-2"></i> Logout </small></a></div>');
                if ($('#active_service').val() == 'save_search') {
                    add_alias();
                } else if ($('#active_service').val() == 'save_favorite') {
                    setTimeout(function() {
                        add_favorite(data.lead_id);
                    }, 500);
                }
            }
			/* 	if (data.status == 'error') {
                    if(data.message == 'user_exists') {
                        $('#register_error').show();
                        $('#already_registered_login').unbind('click').bind('click', function () {
                            $('#modalRegisterForm').modal('hide');
                            $('#modalSignInForm').modal();
                        });
                    } else {
                        $('#modal_danger').modal().find('.modal-body').html('There was an unknown error while registering your account. Please try again.');
                    }
				} else {
					$('#modalRegisterForm').modal('hide');
					$('#nav_logged_in').html('<div id="nav_logged_in"><a href="/dashboard" class="mb-n2 text-white float-right"><i class="fal fa-user-circle mr-2"></i> My Account</a><br><a href="/logout" class="text-yellow float-right"><small><i class="fal fa-sign-out mr-2"></i> Logout </small></a></div>');
					if ($('#active_service').val() == 'save_search') {
						add_alias();
					} else if ($('#active_service').val() == 'save_favorite') {
						add_favorite(data.lead_id);
					}
				} */
        })
        .catch(function (error) {
            console.log(error);
        });


	}

	function login_user() {

		var email = $('#signin_email').val();
		var password = $('#signin_password').val();
		var remember_input = $('#signin_remember').val();
		var remember = false;
		if (remember_input == 'on') {
			remember = true;
		}
		if (email != '' && password != '') {
			$.ajax({
				type: 'post',
				url: '/login/user',
				data: {
					_token: _token,
					email: email,
					password: password,
					remember: remember
				},
				success: function (data) {
					if (data.status == 'error') {
						$('#signin_error').show();
					} else {
						$('#modalSignInForm').modal('hide');
						$('#nav_logged').html('<div id="nav_logged_in"><a href="/dashboard" class="mb-n2 text-white float-right"><i class="fal fa-user-circle mr-2"></i> My Account</a><br><a href="/logout" class="text-yellow float-right"><small><i class="fal fa-sign-out mr-2"></i> Logout </small></a></div>');
						if ($('#active_service').val() == 'save_search') {
							add_alias();
						} else if ($('#active_service').val() == 'save_favorite') {
							add_favorite();
						} else if ($('#active_service').val() == 'login') {
							if (!window.location.href.match(/listing_results/)) {
								window.location = '/dashboard';
							} else {
								toastr['success']('Successfully Logged In');
							}
						}
					}
				}
			});
		}
	}

	$('.open-register').click(function () {
		$('#modalRegisterForm').modal();
		$('#modalSignInForm').modal('hide');
		$('#active_service').val('register');
		$('#register_form').off().on('submit', function (e) {
			e.preventDefault();
			register_user();
		});
	});

	$('#signin_form').off().on('submit', function (e) {
		e.preventDefault();
		login_user();
	});

	$('.forgot-password').unbind('click').bind('click', function () {
		$('#resetPasswordModal').modal();
		$('#modalSignInForm').modal('hide');
		$('#modalRegisterForm').modal('hide');
		$('#reset_password_form').off().on('submit', function (e) {
			e.preventDefault();
			reset_password();
			$('#reset_password').val('Sending Email...');
		});
	});

	$('.open-login').click(function () {
		$('#modalSignInForm').modal();
		$('#modalRegisterForm').modal('hide');
		$('#active_service').val('login');
	});

	function reset_password() {

		var email = $('#reset_email').val();
		$.ajax({
			type: 'post',
			url: '/password/email',
			data: {
				email: email,
				_token: _token
			},
			success: function (response) {
				if (response.status == 'success') {
					$('#resetPasswordModal').modal('hide');
					toastr['success']('Password Reset Email Successfully Sent');
				} else {
					$('#reset_error').show();
				}
				$('#reset_password').val('Reset Password');
			}
		});
    }

    $('#contact_form').submit(function (e) {
        alert('test');
        $('#contact_form_submit').html('Sending <i class="fas fa-spinner fa-spin"></i>').prop('disabled', true)
        e.preventDefault();

        let form = $(this);
        let formData = new FormData(form[0]);
        axios.post('/contact-submit', formData, axios_options)
        .then(function (response) {
            toastr['success']('Your message was successfully sent!');
            $('#contact_form_submit').html('Send <i class="fal fa-share"></i>').prop('disabled', false);
            $('#contact_form').find('input, textarea').not('#type').val('');
            $('label').removeClass('active');
            $('#email_agent_modal').modal('hide');
        })
        .catch(function (error) {
            console.log(error);
        });

    });


	// form submission validation
	(function () {
		'use strict';
       // window.addEventListener('load', function () {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function (form) {
				form.addEventListener('submit', function (event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});
		//}, false);
	})();

});