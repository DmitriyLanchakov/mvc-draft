<div class="row">
    <div class="col-lg-12 text-center">
        <h1 class="mt-5">Объявление о продаже квартиры</h1>
        <p class="lead"></p>
    </div>
</div>

<dl class="row">
    <dt class="col-sm-3">Общая площадь</dt>
    <dd class="col-sm-9"><?= $flat->gross_area?></dd>

    <dt class="col-sm-3">Площадь кухни</dt>
    <dd class="col-sm-9"><?= $flat->kitchen_area?></dd>

    <dt class="col-sm-3">Количество комнат</dt>
    <dd class="col-sm-9"><?= $flat->room_amount?></dd>

    <dt class="col-sm-3">Этаж</dt>
    <dd class="col-sm-9"><?= $flat->floor?></dd>

    <dt class="col-sm-3">Количество этажей</dt>
    <dd class="col-sm-9"><?= $flat->floor_amount?></dd>

    <dt class="col-sm-3">Адрес</dt>
    <dd class="col-sm-9"><?= $flat->address?></dd>

    <dt class="col-sm-3">Стоимость</dt>
    <dd class="col-sm-9"><?= $flat->cost?></dd>

    <?php if(!empty($flat_bathroom_types)): ?>
    <dt class="col-sm-3">Санузлы</dt>
    <dd class="col-sm-9">
            <?php foreach ($bathroom_types as $bathroom_type): ?>
                <?php foreach ($flat_bathroom_types as $flat_bathroom_type): ?>
                    <?php if($bathroom_type->id == $flat_bathroom_type->bathroom_type_id): ?>
                        <dl class="row">
                            <dt class="col-sm-4"><?= $bathroom_type->title?></dt>
                            <dd class="col-sm-8"><?= $flat_bathroom_type->amount ?></dd>
                        </dl>
                    <?php endif ?>
                <?php endforeach ?>
            <?php endforeach ?>
    </dd>
    <?php endif; ?>

    <?php if(!empty($flat_balcony_types)): ?>
    <dt class="col-sm-3">Балконы</dt>
    <dd class="col-sm-9">
            <?php foreach ($balcony_types as $balcony_type): ?>
                <?php foreach ($flat_balcony_types as $flat_balcony_type): ?>
                    <?php if($balcony_type->id == $flat_balcony_type->balcony_type_id): ?>
                        <dl class="row">
                            <dt class="col-sm-4"><?= $balcony_type->title?></dt>
                            <dd class="col-sm-8"><?= $flat_balcony_type->amount ?></dd>
                        </dl>
                    <?php endif ?>
                <?php endforeach ?>
            <?php endforeach ?>
    </dd>
    <?php endif; ?>
</dl>

<?php foreach ($images as $image): ?>
    <div class="row">
        <div class="text-center">
            <img src="<?=$image->src?>" class="rounded" alt="<?=$image->title?>">
        </div>
    </div>
<?php endforeach;?>
