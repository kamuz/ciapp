<?php echo form_open('admin/links/add'); ?>
<table border="0" align="left" width="600" cellspacing="4">
    <tr>
        <th align="left">ID для ссылки:</th>
        <td><input type="text" name="link_id" value="<?php echo set_value('link_id')?>"></td>
    </tr>

    <tr>
        <th align="left">Название для ссылки:</th>
        <td><input type="text" name="descr" value="<?php echo set_value('descr')?>"></td>
    </tr>

    <tr>
        <th align="left">URL ссылки:</th>
        <td><input type="text" name="url" value="<?php echo set_value('url', 'http://') ?>"></td>
    </tr>

    <tr>
        <th>&nbsp;</th>
        <td><input type="submit" value="Добавить"></td>
    </tr>
</table>
</form>
<div style="clear: both;"></div>