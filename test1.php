<?php
    // Заполнитель
    $a = 101;

    // Определение исходного массива
    $array = [];
    for ($i = 0; $i < 50; $i++)
        $array[] = rand(0, 100);

    // Определение ключевых точек, содержащих 2
    $has2_after = [];
    $has2_values = [];
    $first = null;
    $last = null;
    foreach ($array as $key => $value) {
        $str = strval($value);
        if (strpos($str, '2') !== false) {
            if ($first === null)
                $first = $key;
            $has2_after[$key] = [];
            $has2_values[$key] = $value;
            $last = $key;

        } else {
            if ($last !== null)
                $has2_after[$last][] = $value;
        }
    }

    // Добавление элементов
    if ($first !== null) {
        $index = $first - 1;
        foreach ($has2_after as $key => $data) {
            $index++;
            $array[$index] = $has2_values[$key];
            $index++;
            $array[$index] = $a;
            if (count($data)) {
                foreach ($data as $item) {
                    $index++;
                    $array[$index] = $item;
                }
            }
        }
    }
