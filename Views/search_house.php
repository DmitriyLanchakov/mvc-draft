<div class="row">
    <div class="col-lg-12 text-center">
        <h1 class="mt-5">Поиск объявлений по продаже домов</h1>
        <p class="lead"></p>
    </div>
</div>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="gross_area_from">Общая площадь от:</label>
        <input type="number" min="1" class="form-control" value="<?=$post['gross_area_from']?>" id="gross_area_from" name="gross_area_from">
    </div>

    <div class="form-group">
        <label for="gross_area_to">Общая площадь до:</label>
        <input type="number" min="1" class="form-control" value="<?=$post['gross_area_to']?>" id="gross_area_to" name="gross_area_to">
    </div>

    <div class="form-group">
        <label for="kitchen_area_from">Площадь кухни от:</label>
        <input type="number" min="1" class="form-control" value="<?=$post['kitchen_area_from']?>" id="kitchen_area_from" name="kitchen_area_from">
    </div>

    <div class="form-group">
        <label for="kitchen_area_to">Площадь кухни до:</label>
        <input type="number" min="1" class="form-control" value="<?=$post['kitchen_area_to']?>"  id="kitchen_area_to" name="kitchen_area_to">
    </div>

    <div class="form-group">
        <label for="land_area_from">Площадь земельного участка от:</label>
        <input type="number" min="1" class="form-control" value="<?=$post['land_area_from']?>" id="land_area_from" name="land_area_from">
    </div>

    <div class="form-group">
        <label for="land_area_to">Площадь земельного участка до:</label>
        <input type="number" min="1" class="form-control" value="<?=$post['land_area_to']?>"  id="land_area_to" name="land_area_to">
    </div>

    <div class="form-group">
        <label for="room_amount_from">Количество комнат от:</label>
        <input type="number" min="1" class="form-control"  value="<?=$post['room_amount_from']?>"  id="room_amount_from" name="room_amount_from">
    </div>

    <div class="form-group">
        <label for="room_amount_to">Количество комнат до:</label>
        <input type="number" min="1" class="form-control"  value="<?=$post['room_amount_from']?>"  id="room_amount_to" name="room_amount_to">
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


<?php if ($houses): ?>
    <table class="table">
        <caption></caption>
        <thead>
            <th>№</th>
            <th>Общая площадь</th>
            <th>Площадь кухни</th>
            <th>Количество комнат</th>
            <th>Площадь земельного участка</th>
            <th>Стоимость</th>
            <th>Стоимость за 1 кв. метр</th>
        </thead>

        <?php foreach($houses as $house): ?>
            <tr>
                <th><a href="/?controller=ad&action=view_house&id=<?= $house->id ?>"><?= $house->id ?></a></th>
                <td><?= $house->gross_area?></td>
                <td><?= $house->kitchen_area?></td>
                <td><?= $house->room_amount?></td>
                <td><?= $house->land_area?></td>
                <td><?= $house->cost?></td>
                <td><?= $house->cost/$house->gross_area?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    Нет результатов
<?php endif; ?>