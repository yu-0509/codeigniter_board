<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="destyle.css">
    <link rel="stylesheet" href="style.css">
    <title>【管理用ページ】ひと言掲示板</title>
</head>
<body>
    <h1>【管理用ページ】ひと言掲示板</h1>
    <form method="post">
        <input type="submit" name="btn_logout" value="ログアウト">
    </form>
    
    <section>
        <!-- ここに投稿したメッセージを表示 -->
        <?php if(!empty($message_list)) : ?>
            <?php foreach( $message_list as $message ) : ?>
                <article>
                    <div class="info">
                        <h2><?php echo $message['view_name']; ?></h2>
                        <time><?php echo date('Y年m月d日 H:i', strtotime($message['post_date'])); ?></time>
                    </div>
                    <p><?php echo $message['message']; ?></p>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
</body>
</html>