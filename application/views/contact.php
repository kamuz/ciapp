<?php echo form_open('contact'); ?>

<table border="0" cellspacing="5" cellpadding="5">
	<tr>
	    <td><label for="email">Ваш e-mail:</label></td>
	    <td><input type="text" name="email" id="email" value="<?php echo set_value('email') ?>"/></td>
	</tr>
	<tr>
	    <td><label for="subject">Тема сообщения:</label></td>
	    <td><input type="text" name="subject" id="subject" value="<?php echo set_value('subject') ?>" /></td>
	</tr>
	<tr>
	    <td><label for="text">Чего нужно?</label></td>
	    <td><textarea name="text" id="text" cols="30" rows="10"><?php echo set_value('text'); ?></textarea></td>
	</tr>
	<tr>
		<td><label for="captcha">Введите код с картинки:</label><br /><br /><?php echo $imgcode; ?></td>
		<td><br /><br /><input type="text" name="captcha"/></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Отправить"/></td>
	</tr>
</table>

<?php echo form_close() ?>