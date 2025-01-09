<?php
require_once 'config.php';

// جلب البيانات من جدول brand
$stmt = $databass->prepare("SELECT brand.id, brand.name, brand.type, brand.code, company.NAME AS company_name 
                            FROM brand 
                            INNER JOIN company ON brand.company_id = company.ID");
$stmt->execute();
$brands = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    <style>
        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        .btn-edit {
            background-color: #28a745;
            color: white;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
    </style>

    <div class="container mt-5">
        <h1 class="text-center mb-4"> Brands </h1>
        <div class="row">
            <?php foreach ($brands as $brand): ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <?php echo htmlspecialchars($brand['name']); ?>
                        </div>
                        <div class="card-body">
                            <p><strong>Type:</strong> <?php echo htmlspecialchars($brand['type']); ?></p>
                            <p><strong>Code:</strong> <?php echo htmlspecialchars($brand['code']); ?></p>
                            <p><strong>Company:</strong> <?php echo htmlspecialchars($brand['company_name']); ?></p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="index.php?page=edit_brand&id=<?php echo $brand['id']; ?>" class="btn btn-edit btn-sm">Edit </a>
                            <a href="index.php?page=delete_brand&id=<?php echo $brand['id']; ?>" class="btn btn-delete btn-sm" onclick="return confirm('Are you sure you want to delete this company?')">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

