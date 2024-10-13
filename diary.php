<?php
$diary_entries = [
    "2024-10-01" => "今日は法要を行いました。",
    "2024-10-02" => "新しい行事を計画中です。",
    "2024-10-03" => "境内の掃除をしました。"
];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>住職の日記 - 上輩寺</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>住職の日記</h1>
        <nav>
            <ul>
                <li><a href="index.php">ホーム</a></li>
                <li><a href="about.php">お寺の紹介</a></li>
                <li><a href="events.php">行事案内</a></li>
                <li><a href="access.php">アクセス</a></li>
                <li><a href="diary.php">住職の日記</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>最新の日記</h2>
            <ul>
                <?php foreach ($diary_entries as $date => $entry) : ?>
                    <li><strong><?php echo $date; ?>:</strong> <?php echo $entry; ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 上輩寺. All rights reserved.</p>
    </footer>
</body>
</html>
