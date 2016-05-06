<?php
class Model
{
    public function __construct($kwargs) {
        foreach ($kwargs as $key => $value) {
            $this->$key = $value;
        }
    }

    public static function all() {
        $list  = [];
        $sql   = 'SELECT * FROM '.get_called_class();
        $items = Db::getconn()->query($sql);
        $items = $items->fetch_all(MYSQLI_ASSOC);
        $class = get_called_class();
        $keys  = get_class_vars(get_called_class());

        foreach ($items as $item) {
            $arr = [];
            foreach ($keys as $key=>$value) {
                $arr[$key] = $item[$key];
            }

            $list[] = new $class($arr);
        }

        return $list;
    }

    public static function find($id) {
        $id    = intval($id);
        $sql   = 'SELECT * FROM '.get_called_class().' WHERE id="'.$id.'" LIMIT 1';
        $item  = Db::getconn()->query($sql);
        $item  = $item->fetch_assoc();
        $class = get_called_class();
        $keys  = get_class_vars(get_called_class());

        $arr = [];
        foreach ($keys as $key=>$value) {
            $arr[$key] = $item[$key];
        }

        return new $class($arr);
    }

    public static function findOneBy($kwargs) {
        foreach ($kwargs as $key => $value) {
            $conditions[] = $key.' = "'.$value.'"';
        }

        $condition = implode(' AND ', $conditions);

        $sql   = 'SELECT * FROM '.get_called_class().' WHERE '.$condition.' LIMIT 1';

        $item  = Db::getconn()->query($sql);
        $item  = $item->fetch_assoc();

        if (!$item) {
            return null;
        }

        $class = get_called_class();
        $keys  = get_class_vars(get_called_class());

        $arr = [];
        foreach ($keys as $key=>$value) {
            $arr[$key] = $item[$key];
        }

        return new $class($arr);
    }

    public static function findBy($condition_args, $glue = 'AND', $select = '', $having_args = [], $having_glue = 'AND') {
        foreach ($condition_args as $condition_arg) {
            $conditions[] = $condition_arg[0].' '.$condition_arg[1].' "'.$condition_arg[2].'"';
        }

        $condition = implode(' '.$glue.' ', $conditions);

        foreach ($having_args as $having_arg) {
            $havings[] = $having_arg[0].' '.$having_arg[1].' "'.$having_arg[2].'"';
        }

        $having_condition = implode(' '.$having_glue.' ', $havings);

        if ($select) {
            $select = ', '.$select;
        }

        if ($condition) {
            $where_condition = ' WHERE '.$condition;
        }

        $sql   = 'SELECT *'.$select.' FROM '.get_called_class().$where_condition;

        if ($having_condition) {
            $sql.= " HAVING ".$having_condition;
        }

        $items  = Db::getconn()->query($sql);

        if ($items) {
            $items = $items->fetch_all(MYSQLI_ASSOC);
            $class = get_called_class();
            $keys  = get_class_vars(get_called_class());

            foreach ($items as $item) {
                $arr = [];
                foreach ($keys as $key=>$value) {
                    $arr[$key] = $item[$key];
                }

                $list[] = new $class($arr);
            }
        }

        return $list;
    }

    public function save() {
        $object_vars = get_object_vars($this);

        if (empty($object_vars['id'])) {
            $keys   = array_keys($object_vars);
            $values = array_values($object_vars);

            unset($keys[0]);
            unset($values[0]);

            $key_str   = implode(', ', $keys);
            $value_str = implode('", "', $values);
            $value_str = '"'.$value_str.'"';

            $sql  = 'INSERT INTO '.get_called_class().' ('.$key_str.') VALUES ('.$value_str.')';
            $conn = Db::getconn();
            $conn->query($sql);

            $this->id = $conn->insert_id;

        } else {
            foreach ($object_vars as $key => $value) {
                $keys_and_values[] = $key.'="'.$value.'"';
            }

            $update_str = implode(', ', $keys_and_values);

            $sql = 'UPDATE '.get_called_class().' SET '.$update_str.' WHERE id="'.$object_vars['id'].'"';
            Db::getconn()->query($sql);
        }
    }
}
