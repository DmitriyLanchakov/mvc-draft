<?php

class AdController extends Controller
{
    public function addAction()
    {
        return $this->render('add', ['menu' => 'add'], 'layout');
    }

    public function add_flatAction()
    {
        if ($_POST) {
            $flat = new Flat([
                'gross_area'   => (int)$_POST['gross_area'],
                'kitchen_area' => (int)$_POST['kitchen_area'],
                'room_amount'  => (int)$_POST['room_amount'],
                'floor'        => (int)$_POST['floor'],
                'floor_amount' => (int)$_POST['floor_amount'],
                'address'      => $_POST['address'],
                'cost'         => (int)$_POST['cost'],
            ]);

            $flat->save();

            foreach($_POST['bathroom_type'] as $bathroom_type_id => $amount) {
                $flat_bathroom_type = new FlatBathroomType([
                    'flat_id'         => $flat->id,
                    'bathroom_type_id' => (int)$bathroom_type_id,
                    'amount'           => (int)$amount,
                ]);
                $flat_bathroom_type->save();
            }

            foreach($_POST['balcony_type'] as $balcony_type_id => $amount) {
                $flat_balcony_type = new FlatBalconyType([
                    'flat_id'         => $flat->id,
                    'balcony_type_id' => (int)$balcony_type_id,
                    'amount'          => (int)$amount,
                ]);
                $flat_balcony_type->save();
            }

            foreach($_POST['floor_area'] as $floor_number => $area) {
                if ($area > 0) {
                    $flat_floor_area = new FlatFloorArea([
                        'flat_id' => $flat->id,
                        'number'   => (int)$floor_number,
                        'area'     => (int)$area,
                    ]);
                    $flat_floor_area->save();
                }
            }

            foreach ($_POST['communication_type'] as $communication_type_id => $value) {
                $flat_communication_type = new FlatCommunicationType([
                    'flat_id' => $flat->id,
                    'communication_type_id' => (int)$communication_type_id,
                ]);

                $flat_communication_type->save();
            };

            $total = count($_FILES['upload']['name']);

            for($i=0; $i<$total; $i++) {
                $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
                $mimetype = mime_content_type($_FILES['upload']['tmp_name'][$i]);
                if ($tmpFilePath != "") {
                    $newFilePath = "./upload/" . $_FILES['upload']['name'][$i];
                    if(in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png'))) {
                        if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                            $image = new Image(['src' => $newFilePath, 'title' => '']);
                            $image->save();

                            $flat_image = new FlatImage(['flat_id' => $flat->id, 'image_id' => $image->id]);
                            $flat_image->save();
                        }
                    }
                }
            }

            if (Db::getconn()->errno) {
                $response['notice'] = 'error';
                $response['errno']  = $this->conn->errno;
            } else {
                $response['notice'] = 'success';
            }
        }

        $response['balcony_types']       = BalconyType::all();
        $response['bathroom_types']      = BathroomType::all();
        $response['communication_types'] = CommunicationType::all();
        $response['menu']                = 'add';

        return $this->render('add_flat', $response, 'layout');
    }

    public function add_houseAction()
    {
        if ($_POST) {
            $house = new House([
                'gross_area'   => (int)$_POST['gross_area'],
                'kitchen_area' => (int)$_POST['kitchen_area'],
                'room_amount'  => (int)$_POST['room_amount'],
                'address'      => $_POST['address'],
                'land_area'    => (int)$_POST['land_area'],
                'cost'         => (int)$_POST['cost'],
            ]);

            $house->save();

            foreach($_POST['bathroom_type'] as $bathroom_type_id => $amount) {
                $house_bathroom_type = new HouseBathroomType([
                    'house_id'         => $house->id,
                    'bathroom_type_id' => (int)$bathroom_type_id,
                    'amount'           => (int)$amount,
                ]);
                $house_bathroom_type->save();
            }

            foreach($_POST['floor_area'] as $floor_number => $area) {
                if ($area > 0) {
                    $house_floor_area = new HouseFloorArea([
                        'house_id' => $house->id,
                        'number'   => (int)$floor_number,
                        'area'     => (int)$area,
                    ]);
                    $house_floor_area->save();
                }
            }

            foreach ($_POST['communication_type'] as $communication_type_id => $value) {
                $house_communication_type = new HouseCommunicationType([
                    'house_id' => $house->id,
                    'communication_type_id' => (int)$communication_type_id,
                ]);

                $house_communication_type->save();
            };

            $total = count($_FILES['upload']['name']);

            for($i=0; $i<$total; $i++) {
                $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
                $mimetype = mime_content_type($_FILES['upload']['tmp_name'][$i]);
                if ($tmpFilePath != "") {
                    $newFilePath = "./upload/" . $_FILES['upload']['name'][$i];
                    if(in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png'))) {
                        if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                            $image = new Image(['src' => $newFilePath, 'title' => '']);
                            $image->save();

                            $house_image = new HouseImage(['house_id' => $house->id, 'image_id' => $image->id]);
                            $house_image->save();
                        }
                    }
                }
            }

            if (Db::getconn()->errno) {
                $response['notice'] = 'error';
                $response['errno']  = $this->conn->errno;
            } else {
                $response['notice'] = 'success';
            }
        }

        $response['balcony_types']      = BalconyType::all();
        $response['bathroom_types']      = BathroomType::all();
        $response['communication_types'] = CommunicationType::all();
        $response['menu']                = 'add';

        return $this->render('add_house', $response, 'layout');
    }

    public function add_farmAction()
    {
        if ($_POST) {
            $farm = new Farm([
                'farm_type_id'            => (int)$_POST['farm_type_id'],
                'address'                 => $_POST['address'],
                'area'                    => (int)$_POST['area'],
                'buildings'               => $_POST['buildings'],
                'transport_accessibility' => $_POST['transport_accessibility'],
                'cost'                    => (int)$_POST['cost'],
            ]);

            $farm->save();

            foreach ($_POST['communication_type'] as $communication_type_id => $value) {
                $farm_communication_type = new FarmCommunicationType([
                    'farm_id' => $farm->id,
                    'communication_type_id' => (int)$communication_type_id,
                ]);

                $farm_communication_type->save();
            };

            $total = count($_FILES['upload']['name']);

            for($i=0; $i<$total; $i++) {
                $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
                $mimetype = mime_content_type($_FILES['upload']['tmp_name'][$i]);
                if ($tmpFilePath != "") {
                    $newFilePath = "./upload/" . $_FILES['upload']['name'][$i];
                    if(in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png'))) {
                        if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                            $image = new Image(['src' => $newFilePath, 'title' => '']);
                            $image->save();

                            $farm_image = new FarmImage(['farm_id' => $farm->id, 'image_id' => $image->id]);
                            $farm_image->save();
                        }
                    }
                }
            }

            if (Db::getconn()->errno) {
                $response['notice'] = 'error';
                $response['errno']  = $this->conn->errno;
            } else {
                $response['notice'] = 'success';
            }
        }

        $response['farm_types']          = FarmType::all();
        $response['communication_types'] = CommunicationType::all();
        $response['menu']                = 'add';

        return $this->render('add_farm', $response, 'layout');
    }

    public function searchAction()
    {
        return $this->render('search', ['menu' => 'search'], 'layout');
    }

    public function search_flatAction()
    {
        $flats = Flat::all();

        if ($_POST) {
            if ($_POST['gross_area_from'] > 0) {
                $conditions[] = ['gross_area', '>=', (int)$_POST['gross_area_from']];
            }

            if ($_POST['gross_area_to']) {
                $conditions[] = ['gross_area', '<=', (int)$_POST['gross_area_to']];
            }

            if ($_POST['kitchen_area_from'] > 0) {
                $conditions[] = ['kitchen_area', '>=', (int)$_POST['kitchen_area_from']];
            }

            if ($_POST['kitchen_area_to']) {
                $conditions[] = ['kitchen_area', '<=', (int)$_POST['kitchen_area_to']];
            }

            if ($_POST['room_amount_from'] > 0) {
                $conditions[] = ['room_amount', '>=', (int)$_POST['room_amount_from']];
            }

            if ($_POST['room_amount_to']) {
                $conditions[] = ['room_amount', '<=', (int)$_POST['room_amount_to']];
            }

            if ($_POST['floor_from'] > 0) {
                $conditions[] = ['floor', '>=', (int)$_POST['floor_from']];
            }

            if ($_POST['floor_to']) {
                $conditions[] = ['floor', '<=', (int)$_POST['floor_to']];
            }

            if ($_POST['cost_from'] > 0) {
                $conditions[] = ['cost', '>=', (int)$_POST['cost_from']];
            }

            if ($_POST['cost_to']) {
                $conditions[] = ['cost', '<=', (int)$_POST['cost_to']];
            }

            if ($_POST['cost_1_sq_m_from'] > 0) {
                $havings[] = ['cost_1_sq_m', '>=', (int)$_POST['cost_1_sq_m_from']];
            }

            if ($_POST['cost_1_sq_m_to']) {
                $havings[] = ['cost_1_sq_m', '<=', (int)$_POST['cost_1_sq_m_to']];
            }


            if ($conditions or $havings) {
                $flats = Flat::findBy($conditions, 'AND', 'cost/gross_area as cost_1_sq_m', $havings, 'AND');
            }

        }

        return $this->render('search_flat', [
            'menu'  => 'search',
            'flats' => $flats,
            'post'  => $_POST,
        ], 'layout');
    }

    public function search_houseAction()
    {
        $houses = House::all();

        if ($_POST) {
            if ($_POST['gross_area_from'] > 0) {
                $conditions[] = ['gross_area', '>=', (int)$_POST['gross_area_from']];
            }

            if ($_POST['gross_area_to']) {
                $conditions[] = ['gross_area', '<', (int)$_POST['gross_area_to']];
            }

            if ($_POST['kitchen_area_from'] > 0) {
                $conditions[] = ['kitchen_area', '>=', (int)$_POST['kitchen_area_from']];
            }

            if ($_POST['kitchen_area_to']) {
                $conditions[] = ['kitchen_area', '<=', (int)$_POST['kitchen_area_to']];
            }

            if ($_POST['land_area_from'] > 0) {
                $conditions[] = ['land_area', '>=', (int)$_POST['land_area_from']];
            }

            if ($_POST['land_area_to']) {
                $conditions[] = ['land_area', '<', (int)$_POST['land_area_to']];
            }

            if ($_POST['room_amount_from'] > 0) {
                $conditions[] = ['room_amount', '>=', (int)$_POST['room_amount_from']];
            }

            if ($_POST['room_amount_to']) {
                $conditions[] = ['room_amount', '<=', (int)$_POST['room_amount_to']];
            }

            if ($_POST['cost_from'] > 0) {
                $conditions[] = ['cost', '>=', (int)$_POST['cost_from']];
            }

            if ($_POST['cost_to']) {
                $conditions[] = ['cost', '<=', (int)$_POST['cost_to']];
            }

            if ($_POST['cost_1_sq_m_from'] > 0) {
                $havings[] = ['cost_1_sq_m', '>=', (int)$_POST['cost_1_sq_m_from']];
            }

            if ($_POST['cost_1_sq_m_to']) {
                $havings[] = ['cost_1_sq_m', '<=', (int)$_POST['cost_1_sq_m_to']];
            }

            if ($conditions or $havings) {
                $houses = House::findBy($conditions, 'AND', 'cost/gross_area as cost_1_sq_m', $havings, 'AND');
            }
        }

        return $this->render('search_house', [
            'menu'   => 'search',
            'houses' => $houses,
            'post'   => $_POST
        ], 'layout');
    }

    public function search_farmAction()
    {
        $farms      = Farm::all();

        if ($_POST) {
            if ($_POST['farm_type_id'] > 0) {
                $conditions[] = ['farm_type_id', '=', (int)$_POST['farm_type_id']];
            }

            if ($_POST['area_from'] > 0) {
                $conditions[] = ['area', '>=', (int)$_POST['area_from']];
            }

            if ($_POST['area_to']) {
                $conditions[] = ['area', '<=', (int)$_POST['area_to']];
            }

            if ($_POST['cost_from'] > 0) {
                $conditions[] = ['cost', '>=', (int)$_POST['cost_from']];
            }

            if ($_POST['cost_to']) {
                $conditions[] = ['cost', '<=', (int)$_POST['cost_to']];
            }

            if ($_POST['cost_1_sq_m_from'] > 0) {
                $havings[] = ['cost_1_sq_m', '>=', (int)$_POST['cost_1_sq_m_from']];
            }

            if ($_POST['cost_1_sq_m_to']) {
                $havings[] = ['cost_1_sq_m', '<=', (int)$_POST['cost_1_sq_m_to']];
            }

            if ($conditions or $havings) {
                $farms = Farm::findBy($conditions, 'AND', 'cost/area as cost_1_sq_m', $havings, 'AND');
            }
        }

        return $this->render('search_farm', [
            'menu'       => 'search',
            'farms'      => $farms,
            'post'       => $_POST,
            'farm_types' => FarmType::all(),
        ], 'layout');
    }

    public function view_farmAction()
    {
        $id          = (int)$_GET['id'];
        $farm        = Farm::find($id);
        $farm_images = FarmImage::findBy([['farm_id', '=', $id]]);

        $farm_type = FarmType::find($farm->farm_type_id);


        $images = [];
        foreach ($farm_images as $farm_image) {
            $images[] = Image::find($farm_image->image_id);
        }

        $farm_communication_types = FarmCommunicationType::findBy([['farm_id', '=', $id]]);
        $communication_types       = CommunicationType::all();


        return $this->render('view_farm', [
            'menu'                     => 'search',
            'farm'                     => $farm,
            'farm_type'                => $farm_type,
            'images'                   => $images,
            'farm_communication_types' => $farm_communication_types,
            'communication_types'      => $communication_types,
        ], 'layout');
    }

    public function view_houseAction()
    {

        $id          = (int)$_GET['id'];
        $house        = House::find($id);
        $house_images = HouseImage::findBy([['house_id', '=', $id]]);



        $images = [];
        foreach ($house_images as $house_image) {
            $images[] = Image::find($house_image->image_id);
        }

        $house_bathroom_types = HouseBathroomType::findBy([['house_id', '=', $id]]);
        $bathroom_types       = BathroomType::all();

        $house_balcony_types = HouseBalconyType::findBy([['house_id', '=', $id]]);
        $balcony_types       = BalconyType::all();

        $house_communication_types = HouseCommunicationType::findBy([['house_id', '=', $id]]);
        $communication_types       = CommunicationType::all();

        $house_floor_areas = HouseFloorArea::findBy([['house_id', '=', $id]]);

        return $this->render('view_house', [
            'menu'                      => 'search',
            'house'                     => $house,
            'images'                    => $images,
            'house_bathroom_types'      => $house_bathroom_types,
            'bathroom_types'            => $bathroom_types,
            'house_balcony_types'       => $house_balcony_types,
            'balcony_types'             => $balcony_types,
            'house_floor_areas'         => $house_floor_areas,
            'house_communication_types' => $house_communication_types,
            'communication_types'       => $communication_types,
        ], 'layout');
    }

    public function view_flatAction()
    {
        $id          = (int)$_GET['id'];
        $flat        = Flat::find($id);
        $flat_images = FlatImage::findBy([['flat_id', '=', $id]]);

        $images = [];
        foreach ($flat_images as $flat_image) {
            $images[] = Image::find($flat_image->image_id);
        }

        $flat_bathroom_types = FlatBathroomType::findBy([['flat_id', '=', $id]]);
        $bathroom_types      = BathroomType::all();

        $flat_balcony_types = FlatBalconyType::findBy([['flat_id', '=', $id]]);
        $balcony_types      = BalconyType::all();

        return $this->render('view_flat', [
            'menu'                => 'search',
            'flat'                => $flat,
            'images'              => $images,
            'flat_bathroom_types' => $flat_bathroom_types,
            'bathroom_types'      => $bathroom_types,
            'flat_balcony_types'  => $flat_balcony_types,
            'balcony_types'       => $balcony_types,
        ], 'layout');
    }

}