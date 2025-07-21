<?php
session_start();

// Check if result is available
if (!isset($_SESSION['result'])) {
    header("Location: index.php");
    exit;
}

$result = $_SESSION['result'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thank You</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 text-center">
        <h2>Thank you, <?php echo htmlspecialchars($result['name']); ?>!</h2>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($result['email']); ?></p>
        <p><strong>Contact:</strong> <?php echo htmlspecialchars($result['contact']); ?></p>
        <div class="alert alert-success mt-4">
            <h4>Your Quiz Results</h4>
            <p>✅ Correct Answers: <strong><?php echo $result['correct']; ?></strong></p>
            <p>❌ Wrong Answers: <strong><?php echo $result['wrong']; ?></strong></p>
        </div>
    </div>
</body>
</html>
