<?php
// データベース接続設定
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "johanjitemple";

$conn = new mysqli($servername, $username, $password, $dbname);

// 接続確認
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 日記データを取得
$sql = "SELECT id, title, content, date FROM diary ORDER BY date DESC";
$result = $conn->query($sql);
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
        <?php include 'navbar.php'; ?>
    </header>

    <main>
        <section>
            <h2>日記一覧</h2>
            <?php if ($result->num_rows > 0): ?>
                <ul>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <li>
                            <strong><?php echo $row['date']; ?>:</strong>
                            <a href="diary_post.php?id=<?php echo $row['id']; ?>">
                                <?php echo $row['title']; ?>
                            </a> 
                            | <a href="edit_diary.php?id=<?php echo $row['id']; ?>">編集</a> 
                            | <a href="delete_diary.php?id=<?php echo $row['id']; ?>" onclick="return confirm('本当に削除しますか？');">削除</a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else: ?>
                <p>まだ日記はありません。</p>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 上輩寺. All rights reserved.</p>
    </footer>
</body>
</html>

<?php $conn->close(); ?>
