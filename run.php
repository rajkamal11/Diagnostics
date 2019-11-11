<html>
<body>

	<?php
		session_start();
	?>
	<p id='form'>
<form action='test.php' method="post">
	<table style="padding: 8px;">
<tr><td>Name : </td><td><input name='name' type = 'text'></td></tr>
<tr><td>OS Version : </td><td><input name='OS' type = 'text'></td></tr>
<tr><td></td><td><button type='submit' onclick='fun()' style=>OK</button></td>
</table>
</form>
</p>

</body>
</html>