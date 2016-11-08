<?php echo form_open('admin/settings') ?>

<table>
	<tr>
		<td><label for="admin_login">Логин:</label></td>
		<td><input type="text" name="admin_login" id="admin_login" value="<?php echo set_value('admin_login', $this->config->item('admin_login'));?>" /></td>
	</tr>
	<tr>
		<td><label for="admin_pass">Пароль:</label></td>
		<td><input type="text" name="admin_pass" id="admin_pass" value="<?php echo set_value('admin_pass', $this->config->item('admin_pass')); ?>"></td>
	</tr>
    <tr>
        <td><label for="per_page">Записей на страницу:</label></td>
        <td><input type="text" name="per_page" id="per_page" value="<?php echo set_value('per_page', $this->config->item('per_page')); ?>"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="Сохранить"></td>
    </tr>
</table>

<?php echo  form_close();?>