<?php
function dd(...$args)
{
    foreach ($args as $arg) {
        echo "<pre>";
        var_dump($arg);
        echo "</pre>";
    }
    exit;
}

function go($url, $msg)
{
    echo "<script>";
    echo "alert('$msg');";
    echo "location.href = '$url';";
    echo "</script>";
    exit;
}

function back($msg)
{
    echo "<script>alert('$msg');history.back();";
    exit;
}

function user() {
    if(isset($_SESSION['user'])) {
        $user = who($_SESSION['user']->user_email);
        if(!$user) {
            unset($_SESSION['user']);
            go("/", "회원정보를 찾을 수 없습니다. 로그아웃 됩니다.");
        }
        return $user;
    } else return false;
}

function admin()
{
    if(user()->user_id === "admin") return user();
    else {
        go('/', "권한이 없습니다.");
        return false;
    }
}

function jsonResponse($data)
{
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}

function checkEmpty()
{
    foreach($_POST as $input) {
        if(!is_array($input) && trim($input) == "") {
            back("모든 정보를 입력해주세요.");
        }
    }
}

function extname($filename) 
{
    return strtolower(substr($filename, mb_strrpos($filename, ".")));
}

function isImage($filename)
{
    return array_search(extname($filename), [".jpg", ".png", ".gif"]) !== false;
}

function enc($output) 
{
    return nl2br(str_replace(" ", "&nbsp;", htmlentities($output)));
}

function image_upload($file) {
    $filename = time() . extname($file['name']);
    move_uploaded_file($file['tmp_name'], IMAGE_PATH . "/$filename");
    return $filename;
}