$(function() {
    var floor = 1;

    $('#add_floor').on('click', function add_floor() {
        floor++;
        var html = "<div class='form-group'><label for='floor_area_"+floor+"'>Площадь "+floor+" этажа</label><input type='number' min='1' class='form-control' id='floor_area_"+floor+"' name='floor_area["+floor+"]'></div>";
        var floor_before=floor-1;
        $('#floor_area_'+floor_before).closest('.form-group').after(html);
    });
});

