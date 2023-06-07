<?php foreach ($newsCategories as $nc): ?>
<div style="border: 2px solid gray">
    <h1><?=$nc['category_title'] ?></h1>
    <a href="<?=route('news', ['category_id' => $nc['id']])?>">Новости по теме</a>
</div>
<?php endforeach; ?>
