<?php 
    require_once "./Core/header.php"; 
        

    /* 
        상수
        
        

        변수

    */

    define("CONTENT_CNT", 8);
    define("PAGE_CNT", 10);

    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $totalCnt = fetch("SELECT COUNT(*) as cnt FROM nihList")->cnt;
    $totalPage = ceil($totalCnt / CONTENT_CNT);
    // $startPage = 
    // $endPage = 


    $startIdx = $page;

    $list = fetchAll("SELECT L.ccbaMnm1, D.imageUrl 
                FROM nihlist as L
                LEFT JOIN nihdetail as D
                ON 
                    L.ccbaKdcd = D.ccbaKdcd AND
                    L.ccbaAsno = D.ccbaAsno AND
                    L.ccbaCtcd = D.ccbaCtcd
                LIMIT $startIdx, 8");
    // $endIdx = 

    
    // dd($totalCnt);

?>

<body id="propertiesPage">
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

    <div class="section_layout_type1 ">
        <div class="inner">
            <div class="title row-100">
                <h1>무형문화재 현황</h1>
                <div>
                    <p>
                        <a href="./index.php">HOME</a> > 
                        <a href="./culturalProperties.php">무형문화재 현황</a> > 
                        <a href="./culturalProperties.php">전체</a> 
                    </p>
                </div>
            </div>
            <div class="tab-menu-pages">
                <div class="pageStatus">
                    0p / 0p (총 0건)
                </div>
                <div class="tab-menu">
                    <span class="active">앨범</span>
                    <span>목록</span>
                </div>
              
            </div>
            <div class="contentSection">
                <div class="type album">
                    <div class="item_list">
                        <div class="page">
                            <?php foreach ($list as $value): ?>
                                <div data-id="${ccbaKdcd}_${ccbaCtcd}_${ccbaAsno}">
                                    <img src="./xml/nihcImage/<?= $value->imageUrl ?>" alt="img" class="">
                                    <span><?= $value->ccbaMnm1 ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        
                    </div>
                </div>  
                    
                <!-- <div class="type list">
                    <div class="item_list">
                        <div>
                            <div class="date">01. 05</div>
                            <div class="text">가나다</div>
                            <div class="btnList">
                                <button class="editButton">수정</button>
                                <button class="removeButton">삭제</button>
                            </div>
                        </div>
                    </div>
                    <div class="img">
                        이미지
                    </div>
                </div> -->
                <div class="page_bar">
                    <a class="pageNum" href="?page=1">1</a>
                    <a class="pageNum" href="?page=2">2</a>
                    <a class="pageNum" href="?page=3">3</a>
                    <a class="pageNum" href="?page=4">4</a>
                    <a class="pageNum" href="?page=5">5</a>
                </div>
            </div>
        </div>
        
    </div>
    <?php require_once "./Core/footer.php"; ?>
</body>
</html>