<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="destyle.css">
    <link rel="stylesheet" href="style.css">
    <title>【管理用ページ】ひと言掲示板（削除）</title>
</head>
<body>
    <h1>【管理用ページ】ひと言掲示板（削除）</h1>
   
    <form method="post">
        <div>
            <label for="view_name">表示名</label>
            <input type="text" id="view_name" name="view_name"
            value="<?php if(!empty($view_data)) { echo $view_data; } ?>">
        </div>
        <div>
            <label for="message">ひと言メッセージ</label>
            <textarea id="message" name="message"></textarea>
        </div>
        <a class="btn_cancel" href="<?php echo base_url("codeigniter/public/board_admin"); ?>">キャンセル</a>
        <input type="submit" name="btn_submit" value="削除">
    </form>
    <hr>
</body>
</html>