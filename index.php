<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>環境チェック</title>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>

        $(function(){
            var to_email = "info@example.com";
            var subject = "環境チェック結果";
            var info_text = $('#info').val();
            var header_text = "環境チェック結果\n\n";
            $('#mailsend').on('click', function(){
                location.href = "mailto:"+to_email+
                    "?subject="+encodeURI(subject)+
                    "&body="+encodeURI(header_text)+
                    encodeURI(info_text);
            });
        });

    </script>
</head>
<body onload="document.getElementById('info').select();">

<h1>お客様環境チェック</h1>

大変お手数ですが、以下の「--ここから--」〜「--ここまで--」のテキストをすべて選択してコピー（または切り取り）してお送りください。<br>

<textarea id="info" style="width:400px;height:300px">
    --ここから--
    <?php
    ini_set('error_log','/tmp/dump.log'); // ログ出力先を適当に指定する
    $dump = print_r($_SERVER,1);
    error_log($dump); // 上のログに情報を出力する（一応）
    echo htmlspecialchars($dump, ENT_QUOTES, "UTF-8");
    ?>
    --ここまで--
</textarea><br>

<button id="mailsend">または、結果をメール送信する</button><br>

<p>運営会社や問い合わせ先を適当にいれる</p>

</body>
</html>
<html>



