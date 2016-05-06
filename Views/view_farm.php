<div class="row">
    <div class="col-lg-12 text-center">
        <h1 class="mt-5">Объявление о продаже сельхозугодья</h1>
        <p class="lead"></p>
    </div>
</div>

<dl class="row">
    <dt class="col-sm-3">Тип сельхозугодья</dt>
    <dd class="col-sm-9"><?= $farm_type->title?></dd>

    <dt class="col-sm-3">Адрес</dt>
    <dd class="col-sm-9"><?= $farm->address?></dd>

    <dt class="col-sm-3">Площадь</dt>
    <dd class="col-sm-9"><?= $farm->area?></dd>

    <dt class="col-sm-3">Строения</dt>
    <dd class="col-sm-9"><?= $farm->buildings?></dd>

    <dt class="col-sm-3">Транспортная доступность</dt>
    <dd class="col-sm-9"><?= $farm->transport_accessibility?></dd>

    <dt class="col-sm-3">Стоимость</dt>
    <dd class="col-sm-9"><?= $farm->cost?></dd>

    <?php if(!empty($farm_communication_types)): ?>
        <dt class="col-sm-3">Коммуникации</dt>
        <dd class="col-sm-9">
            <?php foreach ($communication_types as $communication_type): ?>
                <?php foreach ($farm_communication_types as $farm_communication_type): ?>
                    <?php if($communication_type->id == $farm_communication_type->communication_type_id): ?>
                        <dl class="row">
                            <dt class="col-sm-4"><?= $communication_type->title?></dt>
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
