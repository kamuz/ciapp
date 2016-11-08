<?php echo form_open('admin/pages/search'); ?>

<table>
    <tr>
        <td><input type="text" name="str" value=""></td>
        <td>
            <select name="field">
                <option value="page_id">ID страницы</option>
                <option value="title">Название страницы</option>
                <option value="text">Текст</option>
            </select>
        </td>
        <td><input type="submit" value="Найти"></td>
    </tr>
</table>

</form>

<?php if (!empty($list)): ?>

<table border="1" cellpadding="5" class="border" width="900">

    <tr>
        <th><?php echo anchor('admin/pages/sort/page_id', 'ID страницы'); ?></th>
        <th><?php echo anchor('admin/pages/sort/title', 'Название страницы'); ?></th>
        <th><?php echo anchor('admin/pages/sort/date', 'Дата публикации'); ?></th>
        <th><?php echo anchor('admin/pages/sort/showed', 'Показывать'); ?></th>
    </tr>

    <?php foreach ($list as $one): ?>  
    <tr>
        <td><?php echo anchor('admin/pages/show/' . $one['page_id'], $one['page_id']);; ?></td>
        <td><?php echo $one['title'] ?></td>
        <td><?php echo date('j.m.Y H:i', $one['date']) ?></td>
        <td><?php echo ($one['showed'])?'Да':'Нет'; ?></td>
    </tr>
    <?php endforeach ?>

</table>



<p><?php echo $page_links; ?></p>

<?php else: ?>
<p>В базе нет записей.</p>

<?php endif ?>

<p><?php echo anchor('admin/pages/add', 'Добавить новую страницу'); ?></p>
