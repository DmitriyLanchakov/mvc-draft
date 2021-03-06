<div class="row">
    <div class="col-lg-12 text-center">
        <h1 class="mt-5">Добавить объявление по продаже квартиры</h1>
        <p class="lead"></p>
    </div>
</div>


<?php if ($notice=='success'): ?>
    <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Добавлено!</strong> Объявление о продаже дома было добавлено успешно.
    </div>
<?php endif ?>

<?php if ($notice=='error'): ?>
    <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Ошибка!</strong> Произошла ошибка <?=$errno?>
    </div>
<?php endif ?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="gross_area">Общая площадь:</label>
        <input type="number" min="1" required class="form-control" id="gross_area" name="gross_area">
    </div>

    <div class="form-group">
        <label for="kitchen_area">Площадь кухни:</label>
        <input type="number" min="1" required class="form-control" id="kitchen_area" name="kitchen_area">
    </div>

    <div class="form-group">
        <label for="room_amount">Количество комнат:</label>
        <input type="number" min="1" required class="form-control" id="room_amount" name="room_amount">
    </div>

    <div class="form-group">
        <label for="floor">Этаж:</label>
        <input type="number" min="1" required class="form-control" id="floor" name="floor">
    </div>

    <div class="form-group">
        <label for="floor_amount">Количество этажей:</label>
        <input type="number" min="1" class="form-control" id="floor_amount" name="floor_amount">
    </div>

    <div class="form-group">
        <label for="address">Адрес:</label>
        <input type="text" required class="form-control" id="address" name="address">
    </div>

    <?php foreach ($bathroom_types as $bathroom_type): ?>
        <div class="form-group">
            <label for="bathroom_type_<?=$bathroom_type->id ?>">Количество санузлов типа "<?=$bathroom_type->title ?>"</label>
            <input type="number" min="0" class="form-control" required id="bathroom_type_<?=$bathroom_type->id ?>" name="bathroom_type[<?=$bathroom_type->id ?>]">
        </div>
    <?php endforeach; ?>

    <?php foreach ($balcony_types as $balcony_type): ?>
        <div class="form-group">
            <label for="balcony_type_<?=$balcony_type->id ?>">Количество балконов типа "<?=$balcony_type->title ?>"</label>
            <input type="number" min="0" class="form-control" required id="balcony_type_<?=$balcony_type->id ?>" name="balcony_type[<?=$balcony_type->id ?>]">
        </div>
    <?php endforeach; ?>

    <div class="form-group">
        <label for="cost">Стоимость:</label>
        <input type="number" required class="form-control" id="cost" name="cost">
    </div>

    <div class="form-group">
        <label for="image">Изображения:</label>
        <input type="file" multiple required class="form-control" name="upload[]" accept="image/jpeg, image/png">
    </div>

    <div class="form-group gallery"></div>

    <div class="form-group">
        <input type="submit" class="btn btn-outline-dark" name="submit" value="Добавить"/>
    </div>
</form>
