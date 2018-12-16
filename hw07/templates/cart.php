<div style="outline: #b94a48 1px solid; padding: 10px">
    <?foreach ($cartContent as $product):?>
    <div style="display: inline-block; outline: #4D5662 1px solid; padding: 5px">
        <h4><?=$product['type']?></h4>
        <p>Количество: <?=$product['count']?></p>
        <p>Цена за шт: <?=$product['price']?></p>
        <p>Общая стоимость: <?=$product['count'] * $product['price']?></p>
        <a href="?remid=<?=$product['id']?>">Убрать</a>
    </div>
    <?endforeach;?>
</div>

