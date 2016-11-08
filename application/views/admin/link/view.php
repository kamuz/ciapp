<div class="view_link">
    <p><strong>ID ссылки:</strong> <?php echo $link_id; ?></p>
    <p><strong>Описание ссылки:</strong> <?php echo $descr; ?></p>
    <p><strong>URL ссылки:</strong> <?php echo $url; ?></p>
    <p><strong>Количество кликов:</strong> <?php echo $clicks; ?></p>
</div>
<p><?php echo anchor('admin/links/edit/' . $link_id, 'Редактировать ссылку'); ?></p>
<p><?php echo anchor('admin/links/del/' . $link_id, 'Удалить ссылку'); ?></p>
<p><?php echo anchor('admin/links', 'Вернуться к списку ссылок'); ?></p>