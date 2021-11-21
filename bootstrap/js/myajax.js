toastr.options = {
	closeButton: false,
	debug: false,
	newestOnTop: false,
	progressBar: true,
	positionClass: "toast-top-center",
	preventDuplicates: true,
	onclick: null,
	showDuration: "300",
	hideDuration: "1000",
	timeOut: "5000",
	extendedTimeOut: "1000",
	showEasing: "swing",
	hideEasing: "linear",
	showMethod: "fadeIn",
	hideMethod: "fadeOut"
};

$(document).ready(function(e) {
	// =============  Signup Ajax here ==================
	$(".signup-btn").click(function(e) {
		e.preventDefault();
		var user = $(".username").val();
		var email = $(".email").val();
		var pass = $("#password").val();
		var pass2 = $(".password1").val();

		if ($.trim(user) == false) {
			toastr.warning("Please fill your username!");
			$("#username").focus();
			$("#username").addClass("is-invalid");
		} else if ($.trim(email) == false) {
			$("#email").focus();
			$("#email").addClass("is-invalid");
			$("#username").removeClass("is-invalid");
			$("#username").addClass("is-valid");
			toastr.warning("Please fill your email correctly!");
		} else if (email.includes("@") == false) {
			$("#email").focus();
			$("#email").addClass("is-invalid");
			$("#username").removeClass("is-invalid");
			$("#username").addClass("is-valid");
			toastr.warning("Please include '@' in your email!");
		} else if ($.trim(pass).length < 8) {
			$("#password").focus();
			$("#password").addClass("is-invalid");
			$("#email").removeClass("is-invalid");
			$("#email").addClass("is-valid");
			toastr.warning("Please enter 8 or more characters!");
		} else if ($.trim(pass2) != $.trim(pass)) {
			$("#password1").focus();
			$("#password").removeClass("is-invalid");
			$("#password").addClass("is-valid");
			$("#password1").addClass("is-invalid");
			toastr.warning("Password did not match!");
		} else {
			$.ajax({
				type: "POST",
				url: "signup-submit",
				data: {
					username: user,
					email: email,
					password: pass,
					password1: pass2
				},
				dataType: "json",
				cache: false,
				success: function(response) {
					if (response.success == true) {
						window.location = response.message;
					} else {
						if (response.message.includes("Username")) {
							toastr.error(response.message);
							$("#username").addClass("is-invalid");
						} else {
							toastr.error(response.message);
						}
					}
				}
			});
			return false;
		}
	});

	// =============  Login Ajax here ==================
	$(".login-btn").click(function(e) {
		e.preventDefault();
		var user = $(".username").val();
		var pass = $("#password").val();

		if ($.trim(user) == false) {
			toastr.warning("Please enter your username!");
			$("#username").focus();
			$("#username").addClass("is-invalid");
		} else if ($.trim(pass) == false) {
			$("#password").focus();
			$("#username").removeClass("is-invalid");
			$("#username").addClass("is-valid");
			toastr.warning("Please enter you password!");
		} else {
			$.ajax({
				type: "POST",
				url: "login-user",
				data: {
					username: user,
					password: pass
				},
				dataType: "json",
				cache: false,
				success: function(response) {
					if (response.success == true) {
						window.location = response.message;
					} else {
						toastr.error(response.message);
						$("#username").removeClass("is-valid");
						$("#username").addClass("is-invalid");
						$("#password").addClass("is-invalid");
					}
				}
			});
			return false;
		}
	});

	//  ============= Post Ajax here ==================

	$("#shout-post").click(function(e) {
		e.preventDefault();
		var formdata = new FormData(document.getElementById("post-form"));
		var post = $(".post").val();
		var img_post = $(".shout-img").val();
		if ($.trim(post) == false && $.trim(img_post) == false) {
			toastr.warning("Please write something!");
		} else {
			$.ajax({
				type: "POST",
				url: "post-submit",
				dataType: "json",
				data: formdata,
				processData: false,
				contentType: false,
				cache: false,
				success: function(response) {
					toastr.success(response.messages);
					$("#post-form")[0].reset();
					setTimeout(function() {
						window.location.reload(1);
					}, 2000);
				}
			});
		}
		return false;
	});

	//  ============= Change Username Ajax here ==================

	$("#change_pass").click(function(e) {
		e.preventDefault();

		var pass1 = $("#inputpass").val();
		var pass2 = $("#inputconf").val();

		if ($.trim(pass1) == false && $.trim(pass2) == false) {
			toastr.warning("Please enter something!");
		}else if (pass1 != pass2) {
			toastr.warning("Password did not match!");
		} else {
			$.ajax({
				type: "POST",
				url: "change-password",
				dataType: "json",
				data: {
					password1:pass1,
					password2:pass2
				},
				cache: false,
				success: function(response) {
					if(response.success){
						toastr.success(response.message);
						$('#change-password').modal('hide');

						setTimeout(function() {
							window.location = 'logout';
						}, 4000);
					
					}else{
						toastr.error(response.message);
					}
				}
			});
		}
		return false;
	});

	var x = window.matchMedia("(max-width:1024px)");

	myfunction(x);
	x.addListener(myfunction);

	var y= window.matchMedia("(max-width:375px)");

	myfunction1(y);
	y.addListener(myfunction1);

});
 
// ========= MEdia query ================
function myfunction(x){
	if(x.matches){
		$('.sidebar-right').removeClass('col-3');
		$('.sidebar-right').addClass('col-4');
		$('.main').removeClass('col-6');
		$('.main').addClass('col-7');
		$('.nav-left').removeClass('col-3');
		$('.nav-left').addClass('col-1');
		$('.prof-text').text('');

	}
}
function myfunction1(x){
	if(x.matches){
		$('.sidebar-right').removeClass('col-4');
		// $('.sidebar-right').addClass('col-4');
		$('.main').removeClass('col-7');
		$('.main').addClass('col-6');
		// $('.nav-left').removeClass('col-3');
		// $('.nav-left').addClass('col-1');
		// $('.prof-text').text('');

	}
}
