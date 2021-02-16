<div class="loading is-hide">
            <img src="./img/loading.svg" alt="Loading..." class="loading__img is-hide">
        </div><!-- /.loading -->


        <!-- Contact -->
        <section class="section contact" id="contact">
            <div class="section__inner contact__inner">
                <div class="section__heads">
                    <h2 class="section__title">ーお問い合わせー</h2><!-- /.about_title -->
                </div><!-- /.section__heads -->
                <div class="section__desc section__desc--contact">入力内容をご確認ください。</div><!-- /.section__desc -->
                <form id="form" action="./index.php#form" class="form" method="POST">
                <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                    <div class="form__table-wrap">
                        <table class="form__table">
                            <tr class="form__item">
                                <th class="form__label-wrap"><span class="form__label form__label--input_required">お名前</span><!-- /.form__label -->
                                </th><!-- /.form__label-wrap -->
                                <td class="form__input-wrap">
                                    <?php echo $_SESSION['name']; ?>
                                </td><!-- /.form__input-wrap -->
                            </tr><!-- /.form__item -->
                            <tr class="form__item">
                                <th class="form__label-wrap"><span class="form__label form__label--input_required">フリガナ</span><!-- /.form__label -->
                                </th><!-- /.form__label-wrap -->
                                <td class="form__input-wrap">
                                    <?php echo $_SESSION['ruby']; ?>
                                </td><!-- /.form__input-wrap -->
                            </tr><!-- /.form__item -->
                            <tr class="form__item">
                                <th class="form__label-wrap"><span class="form__label form__label--input_required">メールアドレス</span><!-- /.form__label -->
                                </th><!-- /.form__label-wrap -->
                                <td class="form__input-wrap">
                                    <?php echo $_SESSION['email']; ?>
                            </tr><!-- /.form__item -->
                            <tr class="form__item">
                                <th class="form__label-wrap"><span class="form__label form__label--input_optional">電話番号</span><!-- /.form__label -->
                                </th><!-- /.form__label-wrap -->
                                <td class="form__input-wrap">
                                    <?php echo $_SESSION['tel']; ?>
                                </td><!-- /.form__input-wrap -->
                            </tr><!-- /.form__item -->
                            <tr class="form__item">
                                <th class="form__label-wrap form__label-wrap--textarea"><span class="form__label form__label--input_optional">お問い合わせ内容</span><!-- /.form__label -->
                                </th><!-- /.form__label-wrap -->
                                <td class="form__textarea-wrap">
                                    <?php echo nl2br($_SESSION['inquiry']); ?>
                                </td>
                            </tr><!-- /.form__item -->
                        </table>
                    </div>
                    <div class="form__button-wrap">
                        <input id="backk" type="submit" class="button form__button" name="back" value="戻る"><!-- /.button form__button -->
                        <input id="js-submit" type="submit" class="button form__button" name="send"><!-- /.button form__button -->
                    </div><!-- /.form__button-wrap -->
                </form><!-- /.form -->
            </div><!-- /.section__inner contact__inner -->
        </section><!-- /.section contact -->
        </main><!-- /.main -->

        <footer class="footer">
            <div class="footer__inner">
                <div class="footer__button-wrap">
                    <a href="https://twitter.com/Ryoya_prog" class="button footer__button button--bg_dark button--shape_circle" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter footer__icon"></i><span class="button__icon button__icon--twitter"></span><!-- /.button__icon button__icon--twitter --></a><!-- /.button button--bg_dark -->
                    <a href="https://www.facebook.com/ryoya.0401" class="button footer__button button--bg_dark  button--shape_circle" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f footer__icon"></i><span class="button__icon button__icon--facebook"></span><!-- /.button__icon button__icon--facebook --></a><!-- /.button button--bg_dark -->
                </div><!-- /.footer__button-wrap -->
                <small class="footer__copyright">&copy; 2020 Ryoya</small><!-- /.footer__copyright -->
            </div><!-- /.footer__inner -->
        </footer><!-- /.footer -->