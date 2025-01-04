<?php
// contact_process.php
include_once 'config.php';

$alert = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $sendMessag = $databass->prepare("INSERT INTO messages (name, phone, message) VALUES (:name, :phone, :message)");
    $sendMessag->bindParam(':name', $name);
    $sendMessag->bindParam(':phone', $phone);
    $sendMessag->bindParam(':message', $message);

    if ($sendMessag->execute()) {
        $alert = '<div class="alert alert-success text-center">Message sent successfully!</div>';
    } else {
        $alert = '<div class="alert alert-danger text-center">Error while sending the message.</div>';
    }
}
?>


<div style="height: 100vh;">

    <div class="container d-flex justify-content-center align-items-center mt-3">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px;">
            <h2 class="text-center mb-4">Contact Us</h2>
            <p class="text-center">Get in touch with us for any inquiries or support.</p>
            <hr>
            <div id="alert"><?php echo $alert; ?></div>

            <div id="successMessage"></div>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"
                        required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number:</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number"
                        pattern="[0-9]{10,15}" required>
                    <small class="form-text text-muted">Phone number should be between 10 to 15 digits.</small>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message:</label>
                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter your message"
                        required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100" name="sendMessge">Send</button>
            </form>
        </div>
    </div>

</div>