<?php

    if (isset($_POST['submit'])) {
        // Проверка наличия файла
        if (isset($_FILES['csv'])) {
            // Проверка типа
            if (in_array($_FILES['csv']['type'], ['application/vnd.ms-excel','text/plain','text/csv','text/tsv'])) {
                $file = $_FILES['csv']['tmp_name'];
                $rows = array_map('trim', file($file));
                $colums = explode(',', $rows[0]);
                array_shift($rows);
                // Проверка количества столбцов
                if (count($colums) === 2) {
                    // Проверка на сторонний массив
                    if ($colums[0] === 'file' && $colums[1] === 'content') {
                        // Проверка наличия записей
                        if (count($rows)) {

                            //Проверка наличия папки upload
                            $dir = 'upload';
                            if (!file_exists($dir)) {
                                mkdir($dir, 0777);
                            }

                            // Обработка строк
                            foreach ($rows as $index => $row) {
                                $params = array_map('trim', explode(',', $row));
                                // Проверка корректности строки
                                if (count($params) === 2) {
                                    list($fname, $content) = $params;
                                    // Проверка допустимости формата имени
                                    if (preg_match('/[a-zA-Z]/', $fname)) {
                                        file_put_contents('upload/' .($index + 1) . '.' . strtolower($fname), $content);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }



?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>Загрузка CSV</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <form method="post" action="upload.php" enctype="multipart/form-data">
            <input type="file" accept="text/csv" name="csv">
            <input type="submit" name="submit" value="Загрузить">
        </form>
    </body>
</html>