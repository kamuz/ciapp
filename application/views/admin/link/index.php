<?php echo form_open('admin/links/search'); ?>

<table>
    <tr>
        <td><input type="text" name="str" value=""></td>
        <td>
            <select name="field">
                <option value="link_id">ID ссылки</option>
                <option value="descr">Название ссылки</option>
                <option value="url">URL</option>
            </select>
        </td>
        <td><input type="submit" value="Найти"></td>
    </tr>
</table>

</form>

<?php if (!empty($list)): ?>

<table border="1" cellpadding="5" class="border">

    <tr>
        <th><?php echo anchor('admin/links/sort/link_id', 'ID ссылки'); ?></th>
        <th><?php echo anchor('admin/links/sort/descr', 'Название ссылки'); ?></th>
        <th><?php echo anchor('admin/links/sort/url', 'URL ссылки'); ?></th>
        <th><?php echo anchor('admin/links/sort/clicks', 'Кликов'); ?></th>
    </tr>

    <?php foreach ($list as $one): ?>  
    <tr>
        <td><?php echo anchor('admin/links/show/' . $one['link_id'], $one['link_id']);; ?></td>
        <td><?php echo $one['descr'] ?></td>
        <td><a href="<?php echo $one['url'] ?>" target="_blank"><?php echo $one['url'] ?></a></td>
        <td><?php echo $one['clicks']; ?></td>
    </tr>
    <?php endforeach ?>

</table>



<p><?php echo $page_links; ?></p>

<p><?php echo anchor('admin/links/add', 'Добавить новую ссылку'); ?></p>

<?php else: ?>
<p>В базе нет записей.</p>

<?php endif ?>