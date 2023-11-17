<?php require_once "./core/header.php"; ?>

<body id="indexPage">
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
            First commit
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

    <div class="visualSlide">
        <input type="radio" name="slide" id="slide_3-1" checked hidden>
        <input type="radio" name="slide" id="slide_3-1_copy" hidden>
        <input type="radio" name="slide" id="slide_1-2" hidden>
        <input type="radio" name="slide" id="slide_1-2_copy" hidden>
        <input type="radio" name="slide" id="slide_2-3" hidden>
        <input type="radio" name="slide" id="slide_2-3_copy" hidden>

        <input type="radio" name="slide" id="slide_2-1" hidden>
        <input type="radio" name="slide" id="slide_3-2" hidden>
        <input type="radio" name="slide" id="slide_1-3" hidden>
        <div class="visualImg_list">
            <div class="visualImg_item1">
                <img src="./resource/visual1.png" alt="visual1">
            </div>
            <div class="visualImg_item2">
                <img src="./resource/visual2.png" alt="visual2">
            </div>
            <div class="visualImg_item3">
                <img src="./resource/visual3.png" alt="visual3">
            </div>
        </div>

        <div class="status_bar">
            <div class="slide_3-1">
                <label for="slide_3-1"></label>
                <!-- <label for="slide_3-1_copy"></label> -->
                <!-- <label class="sub slide_2-1" for="slide_2-1"></label> -->
            </div>
            <div class="slide_1-2">
                <label for="slide_1-2"></label>
                <label for="slide_1-2_copy"></label>
            </div>
            <div class="slide_2-3">
                <label for="slide_2-3"></label>
                <!-- <label for="slide_2-3_copy"></label> -->
            </div>

        </div>

    </div>
</body>

<?php require_once "./core/footer.php"; ?>

</html>