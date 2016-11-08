<?php echo form_open('admin/login'); ?>

<table>
	<tr>
		<td><label for="login">Логин:</label></td>
		<td><input type="text" name="login" id="login" value="<?php echo set_value('login') ?>"/></td>
	</tr>
	<tr>
		<td><label for="pass">Пароль:</label></td>
		<td><input type="password" name="pass" id="pass" value=""/></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Войти" /></td>
	</tr>
</table>

<?php echo form_close(); ?>