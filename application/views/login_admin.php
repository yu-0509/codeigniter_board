<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="destyle.css">
    <link rel="stylesheet" href="style.css">
    <title>【管理用ページ】ひと言掲示板ログイン</title>
</head>
<body>
    <h1>【管理用ページ】ひと言掲示板ログイン</h1>

    <?php if(isset($login) and $login === false) : ?>
        <p class="error_message"><?php echo $fail_message; ?></p>
    <?php endif; ?>

    <form method="post">
        <div>
            <label for="mail">メールアドレス</label>
            <input type="text" id="mail" name="mail" value="">
        </div>
        <div>
            <label for="admin_password">パスワード</label>
            <input type="password" id="admin_password" name="admin_password" value="">
        </div>
        <input type="submit" name="btn_submit" value="ログイン">
    </form>

</body>
</html>