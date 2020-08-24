<?php
if (!function_exists('obj_to_arr')) {
    function obj_to_arr($obj)
    {
        if (is_object($obj)) $obj = (array) dismount($obj);
        if (is_array($obj)) {
            $new = array();
            foreach ($obj as $key => $val) {
                $new[$key] = obj_to_arr($val);
            }
        } else $new = $obj;
        return $new;
    }

    function dismount($object)
    {
        $reflectionClass = new ReflectionClass(get_class($object));
        $array = array();
        foreach ($reflectionClass->getProperties() as $property) {
            $property->setAccessible(true);
            $array[$property->getName()] = $property->getValue($object);
            $property->setAccessible(false);
        }
        return $array;
    }
}
