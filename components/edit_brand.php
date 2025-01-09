<?php
require_once 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $databass->prepare("SELECT * FROM brand WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $brand = $stmt->fetch(PDO::FETCH_ASSOC);
}

$stmt = $databass->prepare("SELECT * FROM company");
$stmt->execute();
$companies = $stmt->fetchAll(PDO::FETCH_ASSOC);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $code = $_POST['code'];
    $company_id = $_POST['company_id'];

    $stmt = $databass->prepare("UPDATE brand SET name = :name, type = :type, code = :code, company_id = :company_id WHERE id = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':company_id', $company_id);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // إعادة التوجيه بعد التعديل
    header("Location: index.php?page=view_brand");
    exit();
}
?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Update Brand </h1>
        <form method="POST" action="index.php?page=edit_brand">
            <input type="hidden" name="id" value="<?php echo $brand['id']; ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $brand['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <input type="text" class="form-control" id="type" name="type" value="<?php echo $brand['type']; ?>" required>
            </div>
            <div class="form-group">
                <label for="code">الكود:</label>
                <input type="text" class="form-control" id="code" name="code" value="<?php echo $brand['code']; ?>" required>
            </div>
            <div class="form-group">
                <label for="company_id">Company:</label>
                <select class="form-control" name="company_id" id="company_id">
                                    <?php foreach ($companies as $company):
                                         $selected = ($company['ID'] == $brand['company_id']) ? 'selected' : '';
                                        ?>
                                        <option value="<?php echo $company["id"]; ?>"><?php echo $company["name"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
  
                       
            </div>
            <button type="submit" class="btn btn-primary mt-3"> Update </button>
        </form>
    </div>
