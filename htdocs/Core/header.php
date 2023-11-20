<?php
    session_start();
    define("__root", $_SERVER["DOCUMENT_ROOT"]);
    define("Core", __root . "/Core");
    define('Layout', __root . "/Layout");
    define("IMAGE_PATH", pathinfo(__root, PATHINFO_DIRNAME) . "/nihcImage");
    
    require_once Core . "/db.php";
    require_once Core . "/helper.php";
    $pageName = substr(preg_replace('/.php/', '', $_SERVER["PHP_SELF"]), 1);
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

<body id="<?= $pageName ?>Page">
    <input type="checkbox" id="main_menu_1" hidden>
    <input type="checkbox" class="main_menu_checkbox" id="main_menu_2" hidden>
    <input type="checkbox" class="main_menu_checkbox" id="main_menu_3" hidden>
    <input type="checkbox" class="main_menu_checkbox" id="main_menu_4" hidden>
    <input type="checkbox" class="main_menu_checkbox" id="main_menu_5" hidden>
    <input type="checkbox" class="main_menu_checkbox" id="main_menu_6" hidden>
    <input type="checkbox" id="utilites_checked" hidden>
    <input type="checkbox" id="lang_change" hidden>
    <div class="window lang_change_window">
        <div class="lang_change_window_inner">
            <h3>언어설정</h3>
            <div class="select_list">
                <a href="#">한국어</a>
                <a href="#">English</a>
                <a href="#">中文(简体)</a>
                <a href="#">日本語</a>
            </div>

            <label for="lang_change">⨉</label>
        </div>
    </div>
    <div class="outer_layout header">
        <div class="inner_layout header_inner">
            <a href="./index.php" class="logo">
            </a>
            <div class="menu_list">
                <label><a href="#">HOME</a></label>
                <label for="main_menu_2"><a href="#">무형문화재관리원</a></label>
                <label for="main_menu_3"><a href="./culturalProperties.php">무형문화재 현황</a></label>
                <label for="main_menu_4"><a href="#">행사 안내</a></label>
                <label for="main_menu_5"><a href="#">전승지원</a></label>
                <label for="main_menu_6"><a href="#">공개 데이터</a></label>
            </div>
            <label for="utilites_checked">
                <span class="utilites"></span>
                <div>
                    <a href="#">로그인</a>
                    <a href="#">회원가입</a>
                    <a href="#">문의하기</a>
                    <label for="lang_change">언어 선택</label>
                </div>
            </label>

        </div>
    </div>
    <div class="outer_layout header sub_header_outer">
        <div class="inner_layout sub_header_inner">
            <div class="sub_menu_list">
                <div class="sub_menu_2">
                    <input type="checkbox" id="sub_menu_2_2" hidden>
                    <a href="#">소개</a>
                    <div class="depth3">
                        <a href="#">일반현황</a>
                        <div class="sub_menu_contents">
                            <a href="#">설립목적</a>
                            <a href="./history.php">연혁</a>
                            <a href="#">역할</a>
                        </div>
                    </div>
                    <a href="#">주요업무계획</a>
                    <a href="#">조직 및 구성</a>
                    <a href="./phone.php">전화번호</a>
                </div>
                <div class="sub_menu_3">
                    <input type="checkbox" id="sub_menu_3_7" hidden>
                    <a href="#">전통 공연·예술</a>
                    <a href="#">전통기술</a>
                    <a href="#">전통지식</a>
                    <a href="#">구전 전통 및 표현</a>
                    <a href="#">전통 생활관습</a>
                    <a href="#">의례·의식</a>
                    <label for="sub_menu_3_7"><a href="#">전통 놀이·무예</a></label>
                    <a href="#">전체 현황</a>
                </div>
                <div class="sub_menu_4">
                    <!-- <input type="checkbox" id="sub_menu_4_1" hidden>
                    <input type="checkbox" id="sub_menu_4_2" hidden>
                    <input type="checkbox" id="sub_menu_4_3" hidden> -->
                    <div class="depth3">
                        <a href="#">공연</a>
                        <div class="sub_menu_contents">
                            <a href="#">월간 공연 일정</a>
                            <a href="#">연간 공연 일정</a>
                        </div>
                    </div>
                    <div class="depth3">
                        <a href="#">전시</a>
                        <div class="sub_menu_contents">
                            <a href="#">관람 안내</a>
                            <a href="#">전시실</a>
                            <a href="#">디지털 체험관</a>
                            <a href="#">기획 전시실</a>
                        </div>
                    </div>
                    <div class="depth3">
                        <a href="#">교육</a>
                        <div class="sub_menu_contents">
                            <a href="#">전문 교육</a>
                            <a href="#">사회 교육</a>
                            <a href="#">연간 교육일정</a>
                        </div>
                    </div>
                </div>
                <div class="sub_menu_5">
                    <a href="#">공방</a>
                    <a href="#">공예품 갤러리</a>
                    <a href="#">전수교육관 현황</a>
                </div>
                <div class="sub_menu_6">
                    <a href="./culturalProperties.php">무형문화재 현황 조회</a>
                    <a href="#">공연 일정 조회</a>
                </div>
            </div>

        </div>
    </div>
