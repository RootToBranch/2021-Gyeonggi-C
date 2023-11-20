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

    if($page < 1 || $page > $totalPage) go("/", "존재하지 않는 페이지입니다.");

    $minNum = 0;
    $maxNum = 0;
    if($page <= PAGE_CNT) { // 만약 페이지 값이 PAGE_CNT보다 작다면
        // 기본 값으로 설정
        $minNum = 1; 
        $maxNum = PAGE_CNT;
    } else { // 그 이외라면
        // PAGE_CNT을 이용해 $minNum과 $maxNum을 구한다
        $maxNum = ceil($page / PAGE_CNT) * PAGE_CNT; 
        if($maxNum > $totalPage) $maxNum = $totalPage; // 최대 페이지 값 지정
        $minNum = $maxNum - (PAGE_CNT - 1);
    }

    $startIdx = ($page - 1) * CONTENT_CNT;

    $listSql = "SELECT L.ccbaMnm1, D.imageUrl 
                FROM nihlist as L
                LEFT JOIN nihdetail as D
                ON 
                    L.ccbaKdcd = D.ccbaKdcd AND
                    L.ccbaAsno = D.ccbaAsno AND
                    L.ccbaCtcd = D.ccbaCtcd";
    $listSql .= ' WHERE bcodeName = "전통 공연·예술"';
    $listSql .= " LIMIT $startIdx, 8";
                
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
                        <a href="./culturalProperties.php">전체</a> 
                    </p>
                </div>
            </div>
            <div class="tab-menu-pages">
                <div class="pageStatus">
                    <?= $page ?>p / <?= $totalPage ?>p (총 <?= $totalCnt ?>건)
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
                            <?php 
                                foreach ($list as $value): 
                                    $imgSrc = "data:image/jpeg;base64," . base64_encode(file_get_contents('../nihcImage/' . $value->imageUrl )); 
                            ?>
                                <div data-id="${ccbaKdcd}_${ccbaCtcd}_${ccbaAsno}">
                                    <img src="<?= $imgSrc ?>" alt="img" class="">
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
                    <a class="fa fas fa-chevron-left 
                    <?= $minNum - 1 === 0 ? 'disabled' : '' ?>" 
                            href="?page=<?= $minNum - 1 ?>">
                    </a>
                    <?php for ($i = $minNum; $i <= $maxNum; $i++): ?>
                        <a class="pageNum" href="?page=<?= $i ?>"><?= $i ?></a>
                    <?php endfor; ?>
                    <a class="fa fas fa-chevron-right 
                    <?= $maxNum + 1 === $totalPage ? 'disabled' : '' ?>" 
                            href="?page=<?= $maxNum + 1 ?>">
                    </a>
                </div>
            </div>
        </div>
        
    </div>
    <?php require_once "./Core/footer.php"; ?>
</body>
</html>