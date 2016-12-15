<div id="login">
<table width="97%">
    <tr>
	    <td align="right">
		<?php
		if (!$_SESSION['login']) {
		?>
		    <span style="color:red;" id="login_msg"></span>
    		<span>Username</span><input placeholder="" class="text" type="text" size="10" name="username" id="username">
			<span>Password</span><input placeholder="" class="text" type="password" size="10" name="password" id="password">
			<input class="btn" type="button" id="login_submit" value="Login">
			<input class="btn" type="button" id="register" value="Register">
		<?php 
		} else {
		?>
		    <span>Hi,<?php echo $_SESSION['username'];?></span>
			<span><a href="member_area.php">Member Area</a></span>
			<input class="btn" type="button" id="logout" value="Logout">
		<?php } ?>
		</td>
	<tr>
</table>
</div>