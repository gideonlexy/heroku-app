<!DOCTYPE html>
<html>
<head>
	<title>Form Validation</title>
	<script>
		function _(id) {
			return.getElementById(id);
		}
		function submitForm() {
			_("mybtn").disabled = true;
			_("status").innerHTML = 'Please wait...';
			var formdata = new Formdata ();
			formdata.append("name",_("name").value);
			formdata.append("mail",_("mail").value);
			formdata.append("pass",_("pass").value);
			var ajax = new XMLHttpRequest();
			ajax.open = ("POST","parser.php" ,true);
			ajax.onreadystatechange = function () {
				if (ajax.readyState == 4 && ajax.status == 200) {
					if (ajax.responseText == 'success') {
						_("myform").innerHTML = '<h2>Thanks '+_("name").value',your message has been sent</h2>';
					}else {
						_("status").innerHTML = ajax.responseText;
						_("mybtn").disabled = false;
					}
				}

			}
			ajax.send(formdata);
		}
	</script>
</head>
<body>
<div class="container">
<form class="form-control" id="myform" onsubmit="submitForm();return false;">
	<div class="col-md-offset-4">
	<div>
	<label for="name">Name</label><br>
	<input type="text" name="username" id="name" placeholder="Name" required>
	</div>
	<div>
	<label for="email">Email</label><br>
	<input type="email" name="email" id="mail" placeholder="Email" required>
	</div>
	<div>
	<label for="password">Passsword</label><br>
	<input type="password" name="password" id="pass" placeholder="Passsword" required>
	</div>
	<div>
	<input type="submit" name="submit" id="mybtn" value="submit"><br>
	<span id="status"></span>
	</div>
	</div>
	</div>
</form>
</body>
</html>