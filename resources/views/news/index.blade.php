<?php foreach ($news as $n): ?>
    <div style="border: 2px solid gray">
        <h1><?=$n['title'] ?></h1>
        <p><?=$n['description']?></p>
        <p><?=$n['category_id']?></p>
        <div><?=$n['author']?>  (<?=$n['created_at']?>) </div>
        <a href="<?=route('news.show', ['id' => $n['id']])?>">Читать полностью...</a>
    </div>
<?php endforeach; ?>
