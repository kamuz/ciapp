<div class="view_page">
    <p><strong>ID страницы:</strong> <?php echo $page_id; ?></p>
    <p><strong>Название страницы:</strong> <?php echo $title; ?></p>
    <p><strong>URL для просмотра:</strong> <?php echo anchor($page_id . '.html'); ?></p>
    <p><strong>Дата добавления:</strong> <?php echo date('j.m.Y H:i', $date); ?></p>
    <p><strong>Показывать:</strong> <?php echo ($showed==1)?'Да':'Нет'; ?></p>
</div>
<p><?php echo anchor('admin/pages/edit/' . $page_id, 'Редактировать страницу'); ?></p>
<p><?php echo anchor('admin/pages/del/' . $page_id, 'Удалить страницу'); ?></p>
<p><?php echo anchor('admin/pages', 'Вернуться к списку страниц'); ?></p>