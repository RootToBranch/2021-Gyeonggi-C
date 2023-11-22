<?php require_once "./Core/header.php"; ?>

    <div class="section_layout_type1">
        <div class="inner">
            <div class="title row-100">
                <h1>무형문화재 추가</h1>
                <div>
                    <p>
                        <a href="./index.php">HOME</a> > 
                        <a href="./culturalProperties.php">무형문화재 현황</a> > 
                        <a href="./culturalCreate.php">무형문화재 추가</a> 


                    </p>
                </div>
            </div>
            <div class="tab-menu">
            </div>
            <div class="contentSection">
                <form action="/culturalCreate_process.php" method="POST" enctype="multipart/form-data">
                    <label><span>종목코드 *</span> <input type="number" name="1" required></label>
                    <label><span>지정번호 *</span> <input type="number" name="2" required></label>
                    <label><span>시도코드 *</span> <input type="number" name="3" required></label>
                    <label><span>연계번호</span> <input type="text" name="4"></label>
                    <label><span>경도</span> <input type="text" name="5"></label>
                    <label><span>위도</span> <input type="text" name="6"></label>
                    <label><span>문화재종목 *</span> <input type="text" name="7" required></label>
                    <label><span>지정호수 *</span> <input type="text" name="8" required></label>
                    <label><span>문화재명(국문) *</span> <input type="text" name="9" required></label>
                    <label><span>문화재명(한자)</span> <input type="text" name="10"></label>
                    <label><span>문화재분류</span> <input type="text" name="11"></label>
                    <label><span>문화재분류2(종류)</span> <input type="text" name="12"></label>
                    <label><span>문화재분류3</span> <input type="text" name="13"></label>
                    <label><span>문화재분류4</span> <input type="text" name="14"></label>
                    <label><span>수량</span> <input type="text" name="15"></label>
                    <label><span>지정(등록일)</span> <input type="date" name="16"></label>
                    <label><span>시도명</span> <input type="text" name="17"></label>
                    <label><span>시군구명</span> <input type="text" name="18"></label>
                    <label><span>소재지 상세</span> <input type="text" name="19"></label>
                    <label><span>시대</span> <input type="text" name="20"></label>
                    <label><span>소유자</span> <input type="text" name="21"></label>
                    <label><span>관리자</span> <input type="text" name="22"></label>
                    <label><span>지정해제여부</span> <input type="text" name="23"></label>
                    <label><span>지정해제일</span> <input type="text" name="24"></label>
                    <label><span>이미지</span> <input type="file" name="25"></label>
                    <label><span>설명</span> <input type="text" name="26"></label>
                    <button type="submit">등록</button>
                </form>


            </div>
        </div>
        
    </div>
    <?php require_once "./Core/footer.php"; ?>
</body>
</html>