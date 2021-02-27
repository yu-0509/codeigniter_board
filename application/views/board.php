<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="destyle.css">
    <link rel="stylesheet" href="style.css">
    <title>ひと言掲示板</title>
</head>
<body>
    <h1>ひと言掲示板</h1>

    <?php if(isset($create) and $create === true) : ?>
        <!-- $data["create"]がtrueの時に表示されます -->
        <p class="success_message"><?php echo $success_message; ?></p>
    <?php elseif(isset($create) and $create === false) : ?>
        <p class="error_message"><?php echo $fail_message; ?></p>
    <?php endif; ?>

    <!-- ここにメッセージの入力フォームを設置 -->
    <form method="post">
        <div>
            <label for="view_name">表示名</label>
            <input type="text" id="view_name" name="view_name" value="">
        </div>
        <div>
            <label for="message">ひと言メッセージ</label>
            <textarea id="message" name="message"></textarea>
        </div>
        <input type="submit" name="btn_submit" value="書き込む">
    </form>
    <hr>
    <section>
        <!-- ここに投稿したメッセージを表示 -->
    </section>
</body>
</html>