<p></p>

<table border="1" class="border" width="600" cellpadding="5">

<?php foreach($list as $one): ?>

    <tr>
        <td><?php echo anchor('img/upload/' . $one, $one, 'target="_blank"') ?></td>
        <td><?php echo anchor('admin/images/del/' . $one, 'Удалить') ?></td>
    </tr>

<?php endforeach; ?>

</table>

<br>

<?php echo anchor('admin/images/show_upload', 'Загрузить новую картинку'); ?>