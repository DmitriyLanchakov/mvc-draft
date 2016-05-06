<div class="row">
    <div class="col-lg-12 text-center">
        <h1 class="mt-5">Добавить объявление по продаже сельхозугодья</h1>
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
        <label for="address">Адрес:</label>
        <input type="text" required class="form-control" id="address" name="address">
    </div>

    <div class="form-group">
        <label for="area">Площадь:</label>
        <input type="number" required min="1" class="form-control" id="gross_area" name="area">
    </div>

    <div class="form-group">
        <label class="control-label" for="farm_type">Предназначение:</label>
        <select name="farm_type_id" class="form-control">
            <?php foreach ($farm_types as $farm_type): ?>
                <option value="<?=$farm_type->id ?>""> <?=$farm_type->title ?> </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="buildings">Постройки:</label>
        <textarea class="form-control" required id="buildings" name="buildings"></textarea>
    </div>

    <div class="form-group">
        <label class="control-label">Коммуникаци:</label>
    </div>

    <div class="form-group">
        <?php foreach ($communication_types as $communication_type): ?>
            <label for="communication_type_<?=$communication_type->id ?>"><?=$communication_type->title ?></label>
            <input type="checkbox" class="form-control" id="communication_type_<?=$communication_type->id ?>" name="communication_type[<?=$communication_type->id ?>]">
        <?php endforeach; ?>
    </div>

    <div class="form-group">
        <label for="transport_accessibility">Транспортная доступность:</label>
        <input type="text" required class="form-control" id="transport_accessibility" name="transport_accessibility">
    </div>

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
