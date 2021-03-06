<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url()?>codeigniter/asset/css/destyle.css">
    <link rel="stylesheet" href="<?php echo base_url()?>codeigniter/asset/css/style.css">
    <title>【管理用ページ】ひと言掲示板（表示）</title>
</head>
<body>
    <h1>【管理用ページ】ひと言掲示板（表示）</h1>
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
                        <a href="" onclick="document.forms.message_edit.submit();return false;">編集</a>
                        <a href="" onclick="document.forms.message_delete.submit();return false;">削除</a>
                        
                        <form method="post" name="message_edit" action="<?php echo base_url("codeigniter/public/board_edit_admin"); ?>">
                            <input type="hidden" name="board_edit_show" value="編集">
                            <input type="hidden" name="message_id" value="<?php echo $message['id']; ?>">
                        </form>
                        
                        <form method="post" name="message_delete" action="<?php echo base_url("codeigniter/public/board_delete_admin"); ?>">
                            <input type="hidden" name="board_delete_show" value="削除">
                            <input type="hidden" name="message_id" value="<?php echo $message['id']; ?>">
                        </form>

                    </div>
                    <p><?php echo $message['message']; ?></p>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
</body>
</html>