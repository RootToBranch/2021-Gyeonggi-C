<?php
    define("__root", $_SERVER["DOCUMENT_ROOT"]);
    define("Core", __root . "/Core");

    require_once Core . "/db.php";
    require_once Core . "/helper.php";

    if($_FILES[25]['tmp_name'] != "" && 
        substr(($_FILES[25]['type']), 0, 5) != "image") {
        back('이미지 파일만 선택할 수 있습니다.');
    }
    $temp = array_pop($_POST);
    $_POST[25] = $_FILES[25];
    $_POST[26] = $temp;

    $sql = "INSERT INTO `nihdetail` VALUES(";
    foreach ($_POST as $key => $value) {
        $value_2 = "";
        if($key == 25) {
            if($_POST[25]['full_path'] != "") {
                $fileName = uniqid('', true) . '_'. $_POST[25]['name'];
                $filePath = "../nihcImage/$fileName";
                $value_2 = $fileName;
    
                move_uploaded_file($_POST[25]['tmp_name'], $filePath);
            } else $value_2 = 'null';
        } else {
            // var_dump($value == '');
            $value_2 = ($value) == '' ? 'null' : $value;
        }

        $sql .= $value_2 == 'null' ? "null" : "'$value_2'";
        if($key < count($_POST)) $sql .= ", ";
    }
    $sql .= ");";

    var_dump($sql);
    execute($sql);
    // go('/culturalProperties.php', "정상적으로 등록되었습니다.");
    exit;
    // var_dump($_POST);
    // execute($sql);