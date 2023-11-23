<?php
error_reporting(E_ALL);
    ini_set('display_errors', '1');
    define("__root", $_SERVER["DOCUMENT_ROOT"]);
    define("Core", __root . "/Core");

    require_once Core . "/db.php";
    require_once Core . "/helper.php";

    if(count($_POST) == 0) {
        go('/', '잘못된 접근입니다.');
        exit;
    }
    if($_FILES[25]['tmp_name'] != "" && 
        substr(($_FILES[25]['type']), 0, 5) != "image") {
        back('이미지 파일만 선택할 수 있습니다.');
        exit;
    }
    

    var_dump($_POST);
    $action = array_pop($_POST);
    $temp = array_pop($_POST);
    $_POST[25] = $_FILES[25];
    $_POST[26] = $temp;


    if($action = "edit") {
        $listSql = 
        "SELECT * FROM nihdetail
            WHERE
                ccbaKdcd = ? AND
                ccbaAsno = ? AND
                ccbaCtcd = ?
        "; 
        $listSql_result = fetchAll($listSql, [$_POST[1], $_POST[2], $_POST[3]]);
        if(!$listSql_result || count($listSql_result) == 0) {
            go('/culturalProperties.php', "데이터가 존재하지 않습니다.");
            exit;
        }

        $sql = 
            "UPDATE `nihdetail` SET
                `ccbaKdcd` = ?,
                `ccbaAsno` = ?,
                `ccbaCtcd` = ?,
                `ccbaCpno` = ?,
                `longitude` = ?,
                `latitude` = ?,
                `ccmaName` = ?,
                `crltsnoNm` = ?,
                `ccbaMnm1` = ?,
                `ccbaMnm2` = ?,
                `gcodeName` = ?,
                `bcodeName` = ?,
                `mcodeName` = ?,
                `scodeName` = ?,
                `ccbaQuan` = ?,
                `ccbaAsdt` = ?,
                `ccbaCtcdNm` = ?,
                `ccsiName` = ?,
                `ccbaLcad` = ?,
                `ccceName` = ?,
                `ccbaPoss` = ?,
                `ccbaAdmin` = ?,
                `ccbaCncl` = ?,
                `ccbaCndt` = ?,
                `imageUrl` = ?,
                `content` = ?
            WHERE
                ccbaKdcd = ? AND
                ccbaAsno = ? AND
                ccbaCtcd = ?
            ";
        execute($sql, [...$_POST, $_POST[1], $_POST[2], $_POST[3]]);
        go('/culturalProperties.php', "정상적으로 수정하였습니다");
        exit;
    } else if($action == "remove") {

    }
    