
    <!-- モーダルだよ🍩 -->
    <div id="modal_content" class="modal_closed">
        <div onclick="close_modal()" class="close_button">
            <i class="fas fa-times grey"></i>
        </div>
        <form action="result.php" method="post" id="modal_inside">
        <!-- <section id="modal_inside"> -->
            <section class="upper_section">
                <section class="modal_first">
                        <div class="study_day inside">
                        <p>学習日</p>
                        <input type="text" name="date" class="input_box calender" id="calender">
                        </div>
                    <div class="study_contents inside modal_margin">
                        <p>学習コンテンツ(複数選択可)</p>
                        <div class="checkbox_outside grey">
                            <label>
                                <input type="checkbox" name="contents[]" value="1" class="checkbox" id="checkboxes" onclick="checkcheck()">
                                <span class="checkmark"></span>
                                N予備校
                            </label>
                        </div>
                        <div class="checkbox_outside grey">
                            <label>
                                <input type="checkbox" name="contents[]" value="2" class="checkbox">
                                <span class="checkmark"></span>
                                ドットインストール
                            </label>
                        </div>
                        <div class="checkbox_outside grey">
                            <label>
                                <input type="checkbox" name="contents[]" value="3" class="checkbox">
                                <span class="checkmark"></span>
                                POSSE課題
                            </label>
                        </div>
                    </div>
                    <div class="study_languages inside modal_margin">
                        <p>学習言語(複数選択可)</p>
                        <div class="checkbox_outside grey">
                            <label><input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                                HTML</label>
                        </div>
                        <div class="checkbox_outside grey">
                            <label><input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                                CSS</label>
                        </div>
                        <div class="checkbox_outside grey">
                            <label><input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                                JavaScript</label>
                        </div>
                        <div class="checkbox_outside grey">
                            <label><input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                                PHP</label>
                        </div>
                        <div class="checkbox_outside grey">
                            <label><input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                                Laravel</label>
                        </div>
                        <div class="checkbox_outside grey">
                            <label><input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                                SQL</label>
                        </div>
                        <div class="checkbox_outside grey">
                            <label><input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                                SHELL</label>
                        </div>
                        <div class="checkbox_outside grey">
                            <label><input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                                情報システム基礎知識(その他)</label>
                        </div>
                </section>
                <section class="modal_second">
                    <div class="study_hour inside">
                        <p>学習時間</p>
                        <input type="text" class="input_box">
                    </div>
                    <div class="twitter_comment inside modal_margin">
                        <p>Twitter用コメント</p>
                        <input type="text" name="message" class="input_box comment" id="twitter_com">
                        <!-- <textarea name="twitter_com" id="twitter_com" class="input_box comment"></textarea> -->
                    </div>
                    <div class="twitter inside">
                        <label>
                            <input type="checkbox" id="tweet" class="checkbox">
                            <span class="checkmark big_check"></span>
                            Twitterに自動投稿する
                        </label>
                    </div>
                </section>
            </section>
            <section class="under_section">
                <!-- <div class="modal_button" onclick="post()">記録・投稿</div> -->
                <button class="modal_button" onclick="post()">記録・投稿</button>
            </section>
        </form>


        <!-- ローディング・投稿完了画面 -->
        <section class="before_post" id="posted1">
            <div class="loader-wrap">
                <div class="loader">Loading...</div>
            </div>
        </section>

        <section class="before_post" id="posted">
            <p class="green">AWESOME!</p>
            <i class="fas fa-check-circle green checkmark2"></i>
            <p>記録・投稿</p>
            <p>完了しました</p>
        </section>

        <!-- <p><a id="modal-close" class="button-link">閉じる</a></p> -->
    </div>