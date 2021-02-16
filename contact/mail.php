<?php mb_language("Japanese"); 
      mb_internal_encoding("UTF-8");
      $mailfrom="From:" .mb_encode_mimeheader("りょーや@Web制作"). "<ryoya.working@gmail.com>";
      $message = "お問い合わせを受け付けました \r\n"
                . "お名前:" . $_SESSION['name'] . "\r\n"
                . "フリガナ:" . $_SESSION['ruby'] . "\r\n"
                . "メールアドレス:" . $_SESSION['email'] . "\r\n"
                . "電話番号:" . $_SESSION['tel'] . "\r\n"
                . "お問い合わせ内容: \r\n"
                . preg_replace("/\r\n|\r|\n/", "\r\n",$_SESSION['inquiry']);
      mb_send_mail($_SESSION['email'],  'お問い合わせありがとうございます', $message, $mailfrom);
      mb_send_mail( 'ryoya.working@gmail.com',  'お問い合わせ', $message, $mailfrom);?>
