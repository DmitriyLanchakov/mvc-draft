<div class="row">
    <div class="col-lg-12 text-center">
        <h1 class="mt-5">Объявление о продаже дома</h1>
        <p class="lead"></p>
    </div>
</div>

<dl class="row">
    <dt class="col-sm-3">Общая площадь</dt>
    <dd class="col-sm-9"><?= $house->gross_area?></dd>

    <dt class="col-sm-3">Площадь кухни</dt>
    <dd class="col-sm-9"><?= $house->kitchen_area?></dd>

    <dt class="col-sm-3">Количество комнат</dt>
    <dd class="col-sm-9"><?= $house->room_amount?></dd>

    <dt class="col-sm-3">Адрес</dt>
    <dd class="col-sm-9"><?= $house->address?></dd>

    <dt class="col-sm-3">Площадь земельного участка</dt>
    <dd class="col-sm-9"><?= $house->land_area?></dd>

    <dt class="col-sm-3">Стоимость</dt>
    <dd class="col-sm-9"><?= $house->cost?></dd>

    <?php if(!empty($house_communication_types)): ?>
        <dt class="col-sm-3">Коммуникации</dt>
        <dd class="col-sm-9">
            <?php foreach ($communication_types as $communication_type): ?>
                <?php foreach ($house_communication_types as $house_communication_type): ?>
                    <?php if($communication_type->id == $house_communication_type->communication_type_id): ?>
                        <dl class="row">
                            <dt class="col-sm-4"><?= $communication_type->title?></dt>
                        </dl>
                    <?php endif ?>
                <?php endforeach ?>
            <?php endforeach ?>
        </dd>
    <?php endif; ?>

    <dt class="col-sm-3">Площадь этажей</dt>
    <dd class="col-sm-9">
        <?php foreach ($house_floor_areas as $house_floor_area): ?>
            <dl class="row">
                <dt class="col-sm-4"><?= $house_floor_area->number?> этаж</dt>
                <dd class="col-sm-8"><?= $house_floor_area->area ?></dd>
            </dl>
        <?php endforeach ?>
    </dd>

    <?php if(!empty($house_bathroom_types)): ?>
        <dt class="col-sm-3">Санузлы</dt>
        <dd class="col-sm-9">
            <?php foreach ($bathroom_types as $bathroom_type): ?>
                <?php foreach ($house_bathroom_types as $house_bathroom_type): ?>
                    <?php if($bathroom_type->id == $house_bathroom_type->bathroom_type_id): ?>
                        <dl class="row">
                            <dt class="col-sm-4"><?= $bathroom_type->title?></dt>
                            <dd class="col-sm-8"><?= $house_bathroom_type->amount ?></dd>
                        </dl>
                    <?php endif ?>
                <?php endforeach ?>
            <?php endforeach ?>
        </dd>
    <?php endif; ?>

    <?php if(!empty($house_balcony_types)): ?>
        <dt class="col-sm-3">Балконы</dt>
        <dd class="col-sm-9">
            <?php foreach ($balcony_types as $balcony_type): ?>
                <?php foreach ($house_balcony_types as $house_balcony_type): ?>
                    <?php if($balcony_type->id == $house_balcony_type->balcony_type_id): ?>
                        <dl class="row">
                            <dt class="col-sm-4"><?= $balcony_type->title?></dt>
                            <dd class="col-sm-8"><?= $house_balcony_type->amount ?></dd>
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
