<?php
session_start();
$mode = "input";
$errmessage = [];
if (isset($_POST['back']) && $_POST['back']) {
    // 入力画面
} else if (isset($_POST['totop']) && $_POST['totop']) {
    // 入力画面
} else if (isset($_POST['confirm']) && $_POST['confirm']) {
    // 確認画面
    if (!$_POST['name']) {
        $errmessage[] = "名前を入力してください";
    } else if (mb_strlen($_POST['name']) > 100) {
        $errmessage[] = "名前は100文字以内にしてください";
    }
    $_SESSION['name'] = htmlspecialchars($_POST['name'], ENT_QUOTES);
    if (!$_POST['ruby']) {
        $errmessage[] = "フリガナを入力してください";
    } else if (mb_strlen($_POST['ruby']) > 100) {
        $errmessage[] = "フリガナは100文字以内にしてください";
    }
    $_SESSION['ruby'] = htmlspecialchars($_POST['ruby'], ENT_QUOTES);
    if (!$_POST['email']) {
        $errmessage[] = "メールアドレスを入力してください";
    } else if (mb_strlen($_POST['email']) > 200) {
        $errmessage[] = "メールアドレスは200文字以内にしてください";
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errmessage[] = "メールアドレスを正しく入力してください";
    }
    $_SESSION['email'] = htmlspecialchars($_POST['email'], ENT_QUOTES);
    $_SESSION['tel'] = htmlspecialchars($_POST['tel'], ENT_QUOTES);
    $_SESSION['inquiry'] = htmlspecialchars($_POST['inquiry'], ENT_QUOTES);
    if ($errmessage) {
        $mode = "input";
    } else {
        $token = bin2hex(random_bytes(32));
        $_SESSION['token'] = $token;
        $mode = "confirm";
    }
} else if (isset($_POST['send']) && $_POST['send']) {
    // 送信ボタンを押したとき
    if (!$_POST['token'] || !$_SESSION['token'] || !$_SESSION['email']) {
        $errmessage[] = "不正な処理が行われました";
        $_SESSION = [];
        $mode = "input";
    } else  if ($_POST['token'] != $_SESSION['token']) {
        $errmessage[] = "不正な処理が行われました";
        $_SESSION = [];
        $mode = "input";
    }
    include('./contact/mail.php');
    $_SESSION = [];
    $mode = "send";
} else {
    $_SESSION = [];
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>りょ－やのポートフォリオ</title>
    <!-- favicon -->
    <link rel="icon" type="image/png" href="./img/favicon.png">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/destyle.css">
    <link rel="stylesheet" href="./css/swiper.css">
    <link rel="stylesheet" href="./css/style.css">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@Ryoya_prog" />
    <meta property="og:url" content="https://portfolio.ryoya-web.com/" />
    <meta property="og:title" content="りょーやのポートフォリオ" />
    <meta property="og:image" content="./img/twitter.jpg" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-179733140-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-179733140-4');
    </script>

</head>

<body>
    <?php if ($mode === "input") { ?>

        <div class="loading is-hide">
            <img src="./img/loading.svg" alt="Loading..." class="loading__img is-hide">
        </div><!-- /.loading -->

        <!-- header -->
        <header class="header">
            <div class="header__inner">
                <div class="header__logo-wrap">
                    <a href="#" class="header__logo"><img src="./img/logo.png" alt="ロゴ" class="header__logo-img"></a><!-- /.header__logo -->
                </div><!-- /.header__logo-wrap -->
                <div class="header__list-wrap is-pc">
                    <ul class="header__list">
                        <li class="header__item"><a href="#about" class="header__link ">自己紹介</a><!-- /.header__link -->
                        </li><!-- /.header__item -->
                        <li class="header__item"><a href="#skill" class="header__link ">スキル</a></li><!-- /.header__item -->
                        <li class="header__item"><a href="#flow" class="header__link ">制作の流れ</a></li><!-- /.header__item -->
                        <li class="header__item"><a href="#works" class="header__link ">作品</a></li><!-- /.header__item -->
                        <li class="header__item"><a href="#contact" class="header__link ">お問い合わせ</a></li><!-- /.header__item -->
                    </ul><!-- /.header__list -->
                </div><!-- /.header__list-wrap -->
            </div><!-- /.header__inner -->
        </header><!-- /.header -->

        <!-- ハンバーガーメニュー -->
        <div class="hamberger">
            <div class="hamberger__line-wrap">
                <span class="hamberger__line"></span>
                <span class="hamberger__line"></span>
                <span class="hamberger__line"></span>
            </div>

            <nav class="hamberger-menu">
                <ul class="hamberger-menu__list">
                    <li class="hamberger-menu__item"><a href="#about" class="header__link hamberger-menu__link">自己紹介</a><!-- /.header__link -->
                    </li><!-- /.header__item -->
                    <li class="hamberger-menu__item"><a href="#skill" class="header__link hamberger-menu__link">スキル</a></li><!-- /.header__item -->
                    <li class="hamberger-menu__item"><a href="#flow" class="header__link hamberger-menu__link">制作の流れ</a></li><!-- /.header__item -->
                    <li class="hamberger-menu__item"><a href="#works" class="header__link hamberger-menu__link">作品</a></li><!-- /.header__item -->
                    <li class="hamberger-menu__item"><a href="#contact" class="header__link hamberger-menu__link">お問い合わせ</a></li><!-- /.header__item -->
                </ul><!-- /.header__list -->
            </nav>

            <!-- クリックしたときの背景 -->
            <div class="overlay"></div>
        </div>

        <main class="main">
            <!-- top -->
            <div class="top">
                <div class="top__img-wrap">
                    <div class="top__letters-wrap">
                        <span class="top__letter">素</span><!-- /.top__letter -->
                        <span class="top__letter">早</span><!-- /.top__letter -->
                        <span class="top__letter">い</span><!-- /.top__letter -->
                        <br>
                        <span class="top__letter">対</span><!-- /.top__letter -->
                        <span class="top__letter">応</span><!-- /.top__letter -->
                        <span class="top__letter">・</span><!-- /.top__letter -->
                        <span class="top__letter">行</span><!-- /.top__letter -->
                        <span class="top__letter">動</span><!-- /.top__letter -->
                        <span class="top__letter">が</span><!-- /.top__letter -->
                        <br>
                        <span class="top__letter">持</span><!-- /.top__letter -->
                        <span class="top__letter">ち</span><!-- /.top__letter -->
                        <span class="top__letter">味</span><!-- /.top__letter -->
                        <span class="top__letter">で</span><!-- /.top__letter -->
                        <span class="top__letter">す</span><!-- /.top__letter -->
                    </div><!-- /.top__letters-wrap -->
                    <img src="./img/bg.jpg" alt="トップ" class="top__img">
                    <div class="top__button-wrap">
                        <a href="#contact" class="button top__button">お問い合わせする</a><!-- /.button top__button -->
                    </div><!-- /.top__button-wrap -->
                </div><!-- /.top__img-wrap -->
            </div><!-- /.top -->


            <!-- about -->
            <section class="section about" id="about">
                <div class="section__inner about__inner">
                    <div class="section__heads">
                        <h2 class="section__title">ー自己紹介ー</h2><!-- /.about_title -->
                    </div><!-- /.section__heads -->
                    <div class="about__contents-wrap">
                        <div class="about__content about__content--img js-hide">
                            <div class="about__img-wrap">
                                <img src="./img/profile.jpg" alt="自己紹介" class="about__img" loading="lazy">
                            </div><!-- /.about__img-wrap -->
                        </div><!-- /.about__content about__content--img -->
                        <div class="about__content about__content--desc js-hide">
                            <p class="about__intro">
                                はじめまして！<span class="about__name">りょーや</span>といいます！<br>Web制作を4月に知り、そこから勉強しています！<br>
                                現在Web制作のフリーランスとして活動しています！
                            </p><!-- /.about__intro -->
                            <a href="https://twitter.com/Ryoya_prog" class="button about__button  button--shape_circle"><span class="button__icon button__icon--twitter"><i class="fab fa-twitter"></i></span><!-- /.button__icon --></a><!-- /.button -->
                            <a href="https://www.facebook.com/ryoya.0401" class="button about__button  button--shape_circle"><span class="button__icon button__icon--facebook"><i class="fab fa-facebook-f"></i></span><!-- /.button__icon --></a><!-- /.button -->
                        </div><!-- /.about__content about__content--desc -->
                    </div><!-- /.about__contents-wrap -->
                </div><!-- /.section__inner about__inner -->
            </section><!-- /.section about -->

            <!-- skill -->
            <section class="section skill section--bg_gray section__bg--shape_triangle section__bg--shape_triangle-down" id="skill">
                <div class="section__inner skill__inner">
                    <div class="section__heads">
                        <h2 class="section__title">ースキルー</h2><!-- /.about_title -->
                    </div><!-- /.section__heads -->
                    <div class="skills">
                        <div class="skill__item js-hide">
                            <div class="skill__icon-wrap">
                                <span class="skill__icon"><i class="fab fa-html5 fa-4x"></i></span>
                            </div><!-- /.skill__icon-wrap -->
                            <div class="skill__title">HTML/CSS</div><!-- /.skill__title -->
                            <div class="skill__desc">HTML/CSSを用いた静的なWebサイトのコーディングが可能です。</div><!-- /.skill__desc -->
                        </div><!-- /.skill__item js-hide -->
                        <div class="skill__item js-hide">
                            <div class="skill__icon-wrap">
                                <span class="skill__icon"><i class="fas fa-mobile-alt fa-4x"></i></span><!-- /.skill__icon -->
                            </div><!-- /.skill__icon-wrap -->
                            <div class="skill__title">レスポンシブ対応</div><!-- /.skill__title -->
                            <div class="skill__desc">レスポンシブ対応したWebサイトを制作することが可能です。</div><!-- /.skill__desc -->
                        </div><!-- /.skill__item js-hide -->
                        <div class="skill__item js-hide">
                            <div class="skill__icon-wrap">
                                <span class="skill__icon"><i class="fab fa-js-square fa-4x"></i></span><!-- /.skill__icon -->
                            </div><!-- /.skill__icon-wrap -->
                            <div class="skill__title">jQuery</div><!-- /.skill__title -->
                            <div class="skill__desc">jQueryを用いてWebサイトに動きをつけることが可能です。</div><!-- /.skill__desc -->
                        </div><!-- /.skill__item js-hide -->
                        <div class="skill__item js-hide">
                            <div class="skill__icon-wrap">
                                <span class="skill__icon"><i class="fab fa-sass fa-4x"></i></span><!-- /.skill__icon -->
                            </div><!-- /.skill__icon-wrap -->
                            <div class="skill__title">Sass</div><!-- /.skill__title -->
                            <div class="skill__desc">Sassを用いてCSSを効率よく書くことが可能です。</div><!-- /.skill__desc -->
                        </div><!-- /.skill__item js-hide -->
                        <div class="skill__item js-hide">
                            <div class="skill__icon-wrap">
                                <span class="skill__icon"><i class="fab fa-wordpress fa-4x"></i></span><!-- /.skill__icon -->
                            </div><!-- /.skill__icon-wrap -->
                            <div class="skill__title">WordPress</div><!-- /.skill__title -->
                            <div class="skill__desc">WordPressを用いてコーポレートサイトやブログサイトを作ることが可能です。</div><!-- /.skill__desc -->
                        </div><!-- /.skill__item js-hide -->
                        <div class="skill__item js-hide">
                            <div class="skill__icon-wrap">
                                <span class="skill__icon"><i class="fab fa-github fa-4x"></i></span><!-- /.skill__icon -->
                            </div><!-- /.skill__icon-wrap -->
                            <div class="skill__title">Git</div><!-- /.skill__title -->
                            <div class="skill__desc">Githubを用いてソースコードを管理することが可能です。</div><!-- /.skill__desc -->
                        </div><!-- /.skill__item js-hide -->
                    </div><!-- /.skills -->
                </div><!-- /.section__inner skill__inner -->
            </section><!-- /.section skill -->

            <!-- flow -->
            <section class="section flow" id="flow">
                <div class="section__inner flow__inner">
                    <div class="section__heads">
                        <h2 class="section__title">ー制作の流れー</h2><!-- /.about_title -->
                    </div><!-- /.section__heads -->
                    <div class="cards">
                        <div class="cards__item card js-hide">
                            <div class="card__img-wrap">
                                <img src="./img/flow-img/hearing.jpg" alt="ヒアリング" class="card__img" loading="lazy">
                            </div><!-- /.card__img-wrap -->
                            <div class="card__body">
                                <div class="card__title">1.ヒアリング</div><!-- /.card__title -->
                                <div class="card__desc">お客様のご期待に沿った最適な提案をいたします。</div><!-- /.card__desc -->
                            </div><!-- /.card__body -->
                        </div><!-- /.cards__item card js-hide -->
                        <div class="cards__item card js-hide">
                            <div class="card__img-wrap">
                                <img src="./img/flow-img/coding.jpg" alt="コーディング" class="card__img" loading="lazy">
                            </div><!-- /.card__img-wrap -->
                            <div class="card__body">
                                <div class="card__title">2.コーディング</div><!-- /.card__title -->
                                <div class="card__desc">作成されたデザインカンプをもとにWebサイトを作成していきます。</div><!-- /.card__desc -->
                            </div><!-- /.card__body -->
                        </div><!-- /.cards__item card js-hide -->
                        <div class="cards__item card js-hide">
                            <div class="card__img-wrap">
                                <img src="./img/flow-img/finish.jpg" alt="納品" class="card__img" loading="lazy">
                            </div><!-- /.card__img-wrap -->
                            <div class="card__body">
                                <div class="card__title">3.納品</div><!-- /.card__title -->
                                <div class="card__desc">期日に余裕をもって納品いたします。</div><!-- /.card__desc -->
                            </div><!-- /.card__body -->
                        </div><!-- /.cards__item card js-hide -->
                    </div><!-- /.cards -->
                </div><!-- /.section__inner flow__inner -->
            </section><!-- /.section flow -->

            <!-- work -->
            <section class="section work section--bg_gray section__bg--shape_triangle section__bg--shape_triangle-up" id="works">
                <div class="section__inner work__inner">
                    <div class="section__heads">
                        <h2 class="section__title">ー作品ー</h2><!-- /.about_title -->
                    </div><!-- /.section__heads -->
                    <div class="section__desc work__desc">作成したWebサイトを掲載いたします。クリックするとそのサイトに移動します。</div><!-- /.section__desc -->
                    <p class="work__basic">※Basic認証があるサイトはユーザー名：portfolio、パスワード：pswd9038を入力してください。</p><!-- /.work__basic -->
                    <div class="works-wrap work__items swiper-container js-hide">
                        <div class="works swiper-wrapper">
                            <div class="works__item-wrap swiper-slide">
                                <a href="https://engress.ryoya-web.com/" class="works__item">
                                    <img src="./img/works-img/engress.jpg" alt="Engress" class="works__img" loading="lazy">
                                </a><!-- /.works__item -->
                            </div><!-- /.works__item-wrap -->
                            <div class="works__item-wrap swiper-slide">
                                <a href="https://30days.ryoya-web.com" class="works__item">
                                    <img src="./img/works-img/mahaba.jpg" alt="mahaba" class="works__img" loading="lazy">
                                </a><!-- /.works__item -->
                            </div><!-- /.works__item-wrap -->
                            <div class="works__item-wrap swiper-slide">
                                <a href="https://ryoya-murata.github.io/samplecorp-reproduce/" class="works__item">
                                    <img src="./img/works-img/sample-corp.jpg" alt="sample-corp" class="works__img" loading="lazy">
                                </a><!-- /.works__item -->
                            </div><!-- /.works__item-wrap -->
                            <div class="works__item-wrap swiper-slide">
                                <a href="https://ryoya-murata.github.io/sobolon/" class="works__item">
                                    <img src="./img/works-img/sobolon.jpg" alt="sobolon" class="works__img" loading="lazy">
                                </a><!-- /.works__item -->
                            </div><!-- /.works__item-wrap -->
                            <div class="works__item-wrap swiper-slide">
                                <a href="https://ryoya-murata.github.io/shiro/" class="works__item">
                                    <img src="./img/works-img/shiro.jpg" alt="Shiro" class="works__img" loading="lazy">
                                </a><!-- /.works__item -->
                            </div><!-- /.works__item-wrap -->
                        </div><!-- /.works -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div><!-- /.works-wrap swiper-container -->
                    <div class="swiper-pagination swiper-pagination--black work__pagination js-hide"></div>
                </div><!-- /.section__inner works__inner -->
            </section><!-- /.section work -->

            <!-- Contact -->
            <section class="section contact" id="contact">
                <div class="section__inner contact__inner">
                    <div class="section__heads">
                        <h2 class="section__title">ーお問い合わせー</h2><!-- /.about_title -->
                    </div><!-- /.section__heads -->
                    <div class="section__desc section__desc--contact">下記のお問い合わせフォームからご連絡よろしくお願いします。</div><!-- /.section__desc -->
                    <form id="form" action="./index.php" class="form js-hide" method="POST" novalidate>
                        <?php if ($errmessage) : ?>
                            <div class="err-message">
                                <?php echo implode('<br>', $errmessage); ?>
                            </div><!-- /.err-message -->
                        <?php endif; ?>
                        <div class="form__table-wrap">
                            <table class="form__table">
                                <tr class="form__item">
                                    <th class="form__label-wrap"><span class="form__label form__label--input_required">お名前</span><!-- /.form__label -->
                                    </th><!-- /.form__label-wrap -->
                                    <td class="form__input-wrap">
                                        <input type="text" class="form__input" name="name" required value="<?php echo $_SESSION['name']; ?>">
                                        <p class="form__example">例）山田 太郎</p><!-- /.form__example -->
                                    </td><!-- /.form__input-wrap -->
                                </tr><!-- /.form__item -->
                                <tr class="form__item">
                                    <th class="form__label-wrap"><span class="form__label form__label--input_required">フリガナ</span><!-- /.form__label -->
                                    </th><!-- /.form__label-wrap -->
                                    <td class="form__input-wrap">
                                        <input type="text" class="form__input" name="ruby" required value="<?php echo $_SESSION['ruby']; ?>">
                                        <p class="form__example">例）ヤマダ　タロウ</p><!-- /.form__example -->
                                    </td><!-- /.form__input-wrap -->
                                </tr><!-- /.form__item -->
                                <tr class="form__item">
                                    <th class="form__label-wrap"><span class="form__label form__label--input_required">メールアドレス</span><!-- /.form__label -->
                                    </th><!-- /.form__label-wrap -->
                                    <td class="form__input-wrap">
                                        <input type="email" class="form__input" name="email" required value="<?php echo $_SESSION['email']; ?>">
                                        <p class="form__example">例）aaa@example.com</p><!-- /.form__example -->
                                    </td><!-- /.form__input-wrap -->
                                </tr><!-- /.form__item -->
                                <tr class="form__item">
                                    <th class="form__label-wrap"><span class="form__label form__label--input_optional">電話番号</span><!-- /.form__label -->
                                    </th><!-- /.form__label-wrap -->
                                    <td class="form__input-wrap">
                                        <input type="tel" class="form__input" name="tel" value="<?php echo $_SESSION['tel']; ?>">
                                        <p class="form__example">例）12345678901</p><!-- /.form__example -->
                                    </td><!-- /.form__input-wrap -->
                                </tr><!-- /.form__item -->
                                <tr class="form__item">
                                    <th class="form__label-wrap form__label-wrap--textarea"><span class="form__label form__label--input_optional">お問い合わせ内容</span><!-- /.form__label -->
                                    </th><!-- /.form__label-wrap -->
                                    <td class="form__textarea-wrap"><textarea name="inquiry" id="" class="form__textarea"><?php echo $_SESSION['inquiry']; ?></textarea><!-- /.form__textarea -->
                                        <!-- /.form__textarea-wrap -->
                                </tr><!-- /.form__item -->
                            </table>
                        </div>
                        <div class="form__button-wrap">
                            <input id="js-submit" type="submit" class="button form__button" name="confirm" value="確認画面へ" disabled><!-- /.button form__button -->
                        </div><!-- /.form__button-wrap -->
                    </form><!-- /.form -->
                </div><!-- /.section__inner contact__inner -->
            </section><!-- /.section contact -->
        </main><!-- /.main -->

        <footer class="footer">
            <div class="footer__inner">
                <div class="footer__button-wrap">
                    <a href="https://twitter.com/Ryoya_prog" class="button footer__button button--bg_dark button--shape_circle"><i class="fab fa-twitter footer__icon"></i><span class="button__icon button__icon--twitter"></span><!-- /.button__icon button__icon--twitter --></a><!-- /.button button--bg_dark -->
                    <a href="https://www.facebook.com/ryoya.0401" class="button footer__button button--bg_dark  button--shape_circle"><i class="fab fa-facebook-f footer__icon"></i><span class="button__icon button__icon--facebook"></span><!-- /.button__icon button__icon--facebook --></a><!-- /.button button--bg_dark -->
                </div><!-- /.footer__button-wrap -->
                <small class="footer__copyright">&copy; 2020 Ryoya</small><!-- /.footer__copyright -->
            </div><!-- /.footer__inner -->
        </footer><!-- /.footer -->
    <?php } else if ($mode === "confirm") {
        include('./contact/confirm.php');
    } else {
        include('./contact/complete.php');
    } ?>



    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- TweenMax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <!-- Swiper.js -->
    <script src="./js/swiper.min.js"></script>
    <!-- my js -->
    <script src="js/script.js"></script>
    <!-- Swiper -->




</body>

</html>