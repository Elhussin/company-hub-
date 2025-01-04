<?php
// الاتصال بقاعدة البيانات
include_once 'config.php';

// جلب الرسائل من قاعدة البيانات
$query = $databass->prepare("SELECT id, name, phone, message, created_at FROM messages ORDER BY created_at DESC");
$query->execute();
$messages = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container my-5">
    <h2 class="text-center mb-4">Messages</h2>
    <div class="row">
        <?php if (!empty($messages)) : ?>
            <?php foreach ($messages as $message) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($message['name']); ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($message['phone']); ?></h6>
                            <p class="card-text"><?php echo htmlspecialchars($message['message']); ?></p>
                            <small class="text-muted">Sent on: <?php echo htmlspecialchars($message['created_at']); ?></small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-12">
                <p class="text-center">No messages available.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
