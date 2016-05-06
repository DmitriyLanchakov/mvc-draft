<div class="row">
    <div class="col-lg-12 text-center">
        <h1 class="mt-5">Поиск объявлений по продаже квартир</h1>
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
        <label for="room_amount_from">Количество комнат от:</label>
        <input type="number" min="1" class="form-control"  value="<?=$post['room_amount_from']?>"  id="room_amount_from" name="room_amount_from">
    </div>

    <div class="form-group">
        <label for="room_amount_to">Количество комнат до:</label>
        <input type="number" min="1" class="form-control"  value="<?=$post['room_amount_from']?>"  id="room_amount_to" name="room_amount_to">
    </div>

    <div class="form-group">
        <label for="floor_from">Этаж от:</label>
        <input type="number" class="form-control" value="<?=$post['floor_from']?>"  id="floor_from" name="floor_from">
    </div>

    <div class="form-group">
        <label for="floor_to">Этаж до:</label>
        <input type="number" class="form-control" value="<?=$post['floor_to']?>" id="floor_to" name="floor_to">
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


<?php if ($flats): ?>
    <table class="table">
        <caption></caption>
        <thead>
            <th>№</th>
            <th>Общая площадь</th>
            <th>Площадь кухни</th>
            <th>Количество комнат</th>
            <th>Этаж</th>
            <th>Количество этажей</th>
            <th>Стоимость</th>
            <th>Стоимость за 1 кв. метр</th>
        </thead>

        <?php foreach($flats as $flat): ?>
            <tr>
                <th><a href="/?controller=ad&action=view_flat&id=<?= $flat->id ?>"><?= $flat->id ?></a></th>
                <td><?= $flat->gross_area?></td>
                <td><?= $flat->kitchen_area?></td>
                <td><?= $flat->room_amount?></td>
                <td><?= $flat->floor?></td>
                <td><?= $flat->floor_amount?></td>
                <td><?= $flat->cost?></td>
                <td><?= $flat->cost/$flat->gross_area?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
Нет результатов
<?php endif; ?>