<?php require_once "./Core/header.php"; ?>
<?php 
    $id = $_GET['id'];
    $idArr = (explode('_', $id));
    $listSql = 
    "SELECT * FROM nihdetail AS L
        WHERE
            L.ccbaKdcd = ? AND
            L.ccbaAsno = ? AND
            L.ccbaCtcd = ?
    "; 
    $result = fetch($listSql, [$idArr[0], $idArr[1], $idArr[2]]);
    $result_Arr = array();
    foreach ($result as $key => $value) {
        array_push($result_Arr, $value);
    }
    $onclick_1 = "'/culturalEdit.php?id=<?= $id ?>&action=`Register`";
?>
    <div class="section_layout_type1">
        <div class="inner">
            <div class="title row-100">
                <h1>무형문화재 정보 수정</h1>
                <div>
                    <p>
                        <a href="./index.php">HOME</a> > 
                        <a href="./culturalProperties.php">무형문화재 현황</a> > 
                        <a href="./culturalEdit.php?id=<?= $id ?>">수정 (<?= $result_Arr[8] ?>)</a> 
                    </p>
                </div>
            </div>
            <div class="tab-menu"></div>
            <div class="contentSection">
                <form action="/culturalEdit_process.php" 
                      method="POST" 
                      enctype="multipart/form-data">
                    <label><span>종목코드 *</span> <input type="number" name="1" required value="<?= $result_Arr[1 - 1] ?>"></label>
                    <label><span>지정번호 *</span> <input type="number" name="2" required value="<?= $result_Arr[2 - 1] ?>"></label>
                    <label><span>시도코드 *</span> <input type="number" name="3" required value="<?= $result_Arr[3 - 1] ?>"></label>
                    <label><span>연계번호</span> <input type="text" name="4" value="<?= $result_Arr[4 - 1] ?>"></label>
                    <label><span>경도</span> <input type="text" name="5" value="<?= $result_Arr[5 - 1] ?>"></label>
                    <label><span>위도</span> <input type="text" name="6" value="<?= $result_Arr[6 - 1] ?>"></label>
                    <label><span>문화재종목 *</span> <input type="text" name="7" required value="<?= $result_Arr[7 - 1] ?>"></label>
                    <label><span>지정호수 *</span> <input type="text" name="8" required value="<?= $result_Arr[8 - 1] ?>"></label>
                    <label><span>문화재명(국문) *</span> <input type="text" name="9" required value="<?= $result_Arr[9 - 1] ?>"></label>
                    <label><span>문화재명(한자)</span> <input type="text" name="10" value="<?= $result_Arr[10 - 1] ?>"></label>
                    <label><span>문화재분류</span> <input type="text" name="11" value="<?= $result_Arr[11 - 1] ?>"></label>
                    <label><span>문화재분류2(종류)</span> <input type="text" name="12" value="<?= $result_Arr[12 - 1] ?>"></label>
                    <label><span>문화재분류3</span> <input type="text" name="13" value="<?= $result_Arr[13 - 1] ?>"></label>
                    <label><span>문화재분류4</span> <input type="text" name="14" value="<?= $result_Arr[14 - 1] ?>"></label>
                    <label><span>수량</span> <input type="text" name="15" value="<?= $result_Arr[15 - 1] ?>"></label>
                    <label><span>지정(등록일)</span> <input type="date" name="16" value="<?= $result_Arr[16 - 1] ?>"></label>
                    <label><span>시도명</span> <input type="text" name="17" value="<?= $result_Arr[17 - 1] ?>"></label>
                    <label><span>시군구명</span> <input type="text" name="18" value="<?= $result_Arr[18 - 1] ?>"></label>
                    <label><span>소재지 상세</span> <input type="text" name="19" value="<?= $result_Arr[19 - 1] ?>"></label>
                    <label><span>시대</span> <input type="text" name="20" value="<?= $result_Arr[20 - 1] ?>"></label>
                    <label><span>소유자</span> <input type="text" name="21" value="<?= $result_Arr[21 - 1] ?>"></label>
                    <label><span>관리자</span> <input type="text" name="22" value="<?= $result_Arr[22 - 1] ?>"></label>
                    <label><span>지정해제여부</span> <input type="text" name="23" value="<?= $result_Arr[23 - 1] ?>"></label>
                    <label><span>지정해제일</span> <input type="text" name="24" value="<?= $result_Arr[24 - 1] ?>"></label>
                    <label><span>이미지</span> <input type="file" name="25" value="<?= $result_Arr[25 - 1] ?> "></label>
                    <label><span>설명</span> <textarea name="26" id="" cols="30" rows="10"><?= $result_Arr[26 - 1] ?></textarea></label>
                    <input type="hidden" name="action">
                    <div class="btnList">
                        <button type="submit" id="confirmBtn" 
                            onclick="
                                document.querySelector('input[name=action]').value = 'edit';
                            ">수정</button>
                        <button type="submit" id="denyBtn" 
                            onclick="
                                document.querySelector('input[name=action]').value = 'remove';
                            ">삭제</button>
                    </div>
                </form>


            </div>
        </div>
        
    </div>
    <?php require_once "./Core/footer.php"; ?>
</body>
</html>