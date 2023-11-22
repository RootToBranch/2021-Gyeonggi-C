<?php 
    require_once "./Core/header.php"; 
        

    /* 
        상수
        
        

        변수

    */
    $categoryName = "전체";
    $categoryList = ["전통 공연·예술", "전통기술", "전통지식", "구전 전통 및 표현", "전통 생활관습",
                    "의례·의식", "전통 놀이·무예"];

    $page = isset($_GET['page']) ? $_GET['page'] : 1; //page 값
    $category = isset($_GET['category']) ? $_GET['category'] : null; //category 값
    $type = isset($_GET['type']) ? $_GET['type'] : "album"; //type 값
    

    define("CONTENT_CNT", $type === "album" ? 8 : 10);
    define("PAGE_CNT", 10);

    $totalCnt = fetch("SELECT COUNT(*) as cnt FROM nihdetail")->cnt; //기본적으로는 전체 페이지를 구함

    $listSql = "SELECT D.ccbaMnm1, 
                       D.imageUrl,
                       D.ccmaName,
                       D.crltsnoNm,
                       D.ccbaKdcd,
                       D.ccbaAsno,
                       D.ccbaCtcd
                FROM nihdetail as D
                "; 
            
    if(!is_null($category) && ($category != "all")) { //카테고리가 지정됐을때
        $categoryName = $categoryList[$category - 1];
        $listSql .= " WHERE bcodeName = '$categoryName'"; //카테고리를 추가
        $totalCnt = fetch("SELECT COUNT(*) as cnt 
                                FROM nihdetail
                                WHERE bcodeName = '$categoryName'")->cnt; //지정한 카테고리 항목 수를
    } else if (is_null($category) || $category == "all") {
        $category = "all";
    } else {
        go("/", "존재하지 않는 카테고리입니다.");
        exit;
    }

    $startIdx = ($page - 1) * CONTENT_CNT;
    $listSql .= " LIMIT $startIdx, " . CONTENT_CNT; 

    
    $totalPage = ceil($totalCnt / CONTENT_CNT); //totalCnt의 계산이 끝나는 직후 totalPage를 구함
    
    if($page < 1 || $page > $totalPage) go("/", "존재하지 않는 페이지입니다."); //없는 페이지 감지


    $minNum = 0;
    $maxNum = 0;
    if($page <= PAGE_CNT) { // 만약 페이지 값이 PAGE_CNT보다 작다면
        // 기본 값으로 설정
        $minNum = 1; 
        $maxNum = PAGE_CNT;
    } else { // 그 이외라면
        // PAGE_CNT을 이용해 $minNum과 $maxNum을 구한다
        $maxNum = ceil($page / PAGE_CNT) * PAGE_CNT; 
        $minNum = $maxNum - (PAGE_CNT - 1);
    }
    if($maxNum > $totalPage) $maxNum = $totalPage; // 최대 페이지 값 지정

    $list = fetchAll($listSql);
    
    // dd($totalCnt);

?>


    <div class="section_layout_type1 ">
        <div class="inner">
            <div class="title row-100">
                <h1>무형문화재 현황</h1>
                <div>
                    <p>
                        <a href="./index.php">HOME</a> > 
                        <a href="./culturalProperties.php">무형문화재 현황</a> > 
                        <a href="./culturalProperties.php?category=<?= $category ?>&page=<?= $page ?>&type=<?= $type ?>"><?= $categoryName ?></a> 
                    </p>
                </div>
            </div>
            <div class="tab-menu-pages">
                <div class="pageStatus">
                    <?= $page ?>p / <?= $totalPage ?>p (총 <?= $totalCnt ?>건)
                </div>
                <div class="tab-menu">
                    <a href="/culturalCreate.php" class="addBtn btn-primary">등록</a>
                    <a href="?category=<?= $category ?>&type=album" class="<?= $type == 'album' ? 'active' : '' ?>">앨범</a>
                    <a href="?category=<?= $category ?>&type=list" class="<?= $type == 'list' ? 'active' : '' ?>">목록</a>
                </div>
            </div>
            <div class="contentSection">
                <div class="type album <?= $type == 'album' ? 'active' : '' ?>">
                    <div class="item_list">
                        <div class="page">
                            <?php 
                                foreach ($list as $value): 
                                    $imgSrc;
                                    if(isset($value->imageUrl) && $value->imageUrl != "")
                                        $imgSrc = "data:image/jpeg;base64," . base64_encode(file_get_contents('../nihcImage/' . $value->imageUrl )); 
                                    else $imgSrc = "";
                            ?>
                                <div data-id="${ccbaKdcd}_${ccbaCtcd}_${ccbaAsno}">
                                    <img src="<?= $imgSrc ?>" alt="img" class="">
                                    <span><?= $value->ccbaMnm1 ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        
                    </div>
                </div>  
                <div class="type list <?= $type == 'list' ? 'active' : '' ?>">
                    <div class="item_list">
                        <div class="page">
                            <div class="title">
                                <span class="key">순번</span>
                                <span class="ccbaMnm1">문화재명</span>
                                <span class="ccmaName">문화재종목</span>
                                <span class="crltsnoNm">지정호수</span>
                                <span class="ccbaKdcd">종목코드</span>
                                <span class="ccbaAsno">지정번호</span>
                                <span class="ccbaCtcd">시도코드</span>
                            </div>
                            <!-- ${ccbaKdcd}_${ccbaCtcd}_${ccbaAsno} -->
                            <?php foreach ($list as $key => $value): ?>
                                <div class="item">
                                    <span class="key"><?= $key + 1 + (($page - 1) * 10) ?></span>
                                    <a class="ccbaMnm1" href="/culturalEdit.php?id=<?= $value->ccbaKdcd ?>_<?= $value->ccbaAsno ?>_<?= $value->ccbaCtcd ?>"><?= $value->ccbaMnm1 ?></a>
                                    <span class="ccmaName"><?= $value->ccmaName ?></span>
                                    <span class="crltsnoNm"><?= $value->crltsnoNm ?></span>
                                    <span class="ccbaKdcd"><?= $value->ccbaKdcd ?></span>
                                    <span class="ccbaAsno"><?= $value->ccbaAsno ?></span>
                                    <span class="ccbaCtcd"><?= $value->ccbaCtcd ?></span>
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
                    <a class="fa fas fa-angle-double-left 
                    <?= $minNum - 1 === 0 ? 'disabled' : '' ?>" 
                            href="?category=<?= $category ?>&page=<?= $minNum - 1 ?>&type=<?= $type ?>">
                    </a>
                    <a class="fa fas fa-angle-left 
                    <?= $page - 1 === 0 ? 'disabled' : '' ?>" 
                            href="?category=<?= $category ?>&page=<?= $page - 1 ?>&type=<?= $type ?>">
                    </a>
                    <?php 
                        for ($i = $minNum; $i <= $maxNum; $i++): 
                            if(!is_null($category)) $href = "?category=$category&page=$i";
                            else $href = "?page=$i";
                    ?>
                        <a class="pageNum" href="<?= $href ?>&type=<?= $type ?>"><?= $i ?></a>
                    <?php endfor; ?>
                    <a class="fa fas fa-angle-right
                    <?= $page >= $totalPage ? 'disabled' : '' ?>" 
                            href="?category=<?= $category ?>&page=<?= $page + 1 ?>&type=<?= $type ?>">
                    </a>
                    <a class="fa fas fa-angle-double-right 
                    <?= $maxNum === $totalPage ? 'disabled' : '' ?>" 
                            href="?category=<?= $category ?>&page=<?= $maxNum + 1 ?>&type=<?= $type ?>">
                    </a>
                </div>
            </div>
        </div>
        
    </div>
    <?php require_once "./Core/footer.php"; ?>
</body>
</html>