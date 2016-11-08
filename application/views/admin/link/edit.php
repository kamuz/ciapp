<?php echo form_open('admin/links/edit/' . $link_id); ?>
<table border="0" align="left" width="600" cellspacing="4">
    <tr>
        <th align="left">ID для ссылки:</th>
        <td><?php echo $link_id; ?></td>
    </tr>

    <tr>
        <th align="left">Название для ссылки:</th>
        <td><input type="text" name="descr" value="<?php echo set_value('descr', $descr)?>"></td>
    </tr>

    <tr>
        <th align="left">URL ссылки:</th>
        <td><input type="text" name="url" value="<?php echo set_value('url', $url) ?>"></td>
    </tr>

    <tr>
        <th>&nbsp;</th>
        <td><input type="submit" value="Сохранить изменения"></td>
    </tr>
</table>
</form>
<div style="clear: both;"></div>