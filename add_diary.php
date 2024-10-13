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

// フォームが送信されたか確認
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    $date = date('Y-m-d H:i:s'); // 現在の日付と時間

    // データベースに日記を追加
    $sql = "INSERT INTO diary (title, content, date) VALUES ('$title', '$content', '$date')";
    
    if ($conn->query($sql) === TRUE) {
        $message = "新しい日記が追加されました！";
    } else {
        $message = "エラー: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日記の追加 - 上輩寺</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>日記の追加</h1>
        <?php include 'navbar.php'; ?>
    </header>

    <main>
        <section>
            <h2>新しい日記を追加する</h2>

            <?php if (!empty($message)): ?>
                <p><?php echo $message; ?></p>
            <?php endif; ?>

            <form action="add_diary.php" method="POST">
                <label for="title">タイトル:</label><br>
                <input type="text" id="title" name="title" required><br><br>
                
                <label for="content">内容:</label><br>
                <textarea id="content" name="content" rows="10" required></textarea><br><br>

                <button type="submit">日記を追加</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 上輩寺. All rights reserved.</p>
    </footer>
</body>
</html>
