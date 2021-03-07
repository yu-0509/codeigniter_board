<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url()?>codeigniter/asset/css/destyle.css">
    <link rel="stylesheet" href="<?php echo base_url()?>codeigniter/asset/css/style.css">
    <title>【管理用ページ】管理者ユーザ登録</title>
</head>
<body>
    <h1>【管理用ページ】管理者ユーザ登録</h1>

    <?php if(isset($create) && $create === true) : ?>
        <p class="success_message"><?php echo $success_message; ?></p>
    <?php elseif(isset($create) && $create === false) : ?>
        <p class="error_message"><?php echo $fail_message; ?></p>
    <?php endif; ?>

    <form method="post">
        <div>
            <label for="name">名前</label>
            <input type="text" id="name" name="name" value="">
        </div>
        <div>
            <label for="mail">メールアドレス</label>
            <input type="text" id="mail" name="mail" value="">
        </div>
        <div>
            <label for="admin_password">パスワード</label>
            <input type="password" id="admin_password" name="admin_password" value="">
        </div>
        <a class="btn_cancel" href="<?php echo base_url("codeigniter/public/admin/login/login"); ?>">戻る</a>
        <input type="submit" name="btn_submit" value="作成">
    </form>

</body>
</html>