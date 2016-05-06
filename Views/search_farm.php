<div class="row">
    <div class="col-lg-12 text-center">
        <h1 class="mt-5">Поиск объявлений по продаже сельхозугодий</h1>
        <p class="lead"></p>
    </div>
</div>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="control-label" for="farm_type">Предназначение:</label>
        <select name="farm_type_id" class="form-control">
            <option></option>
            <?php foreach ($farm_types as $farm_type): ?>
                <option <?php if($post['farm_type_id']==$farm_type->id): ?> selected <?php endif ?> value="<?=$farm_type->id ?>""> <?=$farm_type->title ?> </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="area_from">Площадь от:</label>
        <input type="number" min="1" class="form-control" value="<?=$post['area_from']?>" id="area_from" name="area_from">
    </div>

    <div class="form-group">
        <label for="area_to">Площадь до:</label>
        <input type="number" min="1" class="form-control" value="<?=$post['area_to']?>"  id="area_to" name="area_to">
    </div>

    <div class="form-group">
        <label for="cost_from">Стоимость от:</label>
        <input type="number" class="form-control"  value="<?=$post['cost_from']?>"  id="cost_from" name="cost_from">
    </div>

    <div class="form-group">
        <label for="cost_to">Стоимость до:</label>
        <input type="number" class="form-control"  value="<?=$post['cost_to']?>"  id="cost_to" name="cost_to">
    </div>

    <div class="form-group">
        <label for="cost_1_sq_m_from">Стоимость 1 кв. метра от:</label>
        <input type="number" class="form-control"  value="<?=$post['cost_1_sq_m_from']?>"  id="cost_1_sq_m_from" name="cost_1_sq_m_from">
    </div>

    <div class="form-group">
        <label for="cost_1_sq_m_to">Стоимость 1 кв. метра до:</label>
        <input type="number" class="form-control"  value="<?=$post['cost_1_sq_m_to']?>"  id="cost_1_sq_m_to" name="cost_1_sq_m_to">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-outline-dark" name="submit" value="Поиск"/>
    </div>
</form>

<?php if ($farms): ?>
    <table class="table">
        <caption></caption>
        <thead>
            <th>№</th>
            <th>Предназначение</th>
            <th>Адрес</th>
            <th>Площадь</th>
            <th>Строения</th>
            <th>Стоимость</th>
            <th>Стоимость за 1 кв. метр</th>
        </thead>
        <tbody>
            <?php foreach($farms as $farm): ?>
                <tr>
                    <td>
                        <a href="/?controller=ad&action=view_farm&id=<?= $farm->id ?>"><?= $farm->id ?></a>
                    </td>
                    <td>
                        <?php foreach ($farm_types as $farm_type): ?>
                            <?php if($farm_type->id == $farm->farm_type_id): ?> <?=$farm_type->title?><?php endif ?>
                        <?php endforeach; ?>
                    </td>
                    <td><?= $farm->address?></td>
                    <td><?= $farm->area?></td>
                    <td><?= $farm->buildings?></td>
                    <td><?= $farm->cost?></td>
                    <td><?= $farm->cost/$farm->area?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    Нет результатов
<?php endif; ?>