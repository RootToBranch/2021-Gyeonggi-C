<?php require_once "./core/header.php"; ?>

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