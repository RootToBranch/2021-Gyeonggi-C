<?php
    session_start();
    define("__root", $_SERVER["DOCUMENT_ROOT"]);
    define("Core", __root . "/Core");
    define('Layout', __root . "/Layout");
    define("IMAGE_PATH", pathinfo(__root, PATHINFO_DIRNAME) . "/nihcImage");
    
    require_once Core . "/db.php";
    require_once Core . "/helper.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>무형문화재관리원</title>
    <link rel="stylesheet" href="./resource/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

