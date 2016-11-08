<?php echo form_open('admin/pages/add'); ?>

<table border="0" align="left" width="900" cellspacing="4">
    <tr>
        <th align="left">ID для страницы:</th>
        <td><input type="text" name="page_id" value="<?php echo set_value('page_id')?>"></td>
    </tr>

    <tr>
        <th align="left">Название для страницы:</th>
        <td><input type="text" name="title" value="<?php echo set_value('title')?>"></td>
    </tr>

    <tr>
        <th align="left">Показывать:</th>
        <td><input type="checkbox" name="showed" value="1" <?php echo set_checkbox('showed', 1, TRUE) ?>></td>
    </tr>

    <?php echo show_tinymce('mytext') ?>

    <tr>
        <th align="left">Текст:</th>
        <td><textarea id="mytext" name="text" cols="60" rows="10"><?php echo set_value('test', 'Текст страницы')?></textarea></td>
    </tr>

    <tr>
        <th>&nbsp;</th>
        <td><input type="submit" value="Добавить"></td>
    </tr>

</table>

<input type="hidden" name="date" value="<?php echo set_value('date', time()) ?>">

</form>
<div style="clear: both;"></div>