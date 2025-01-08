<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 20px;
        }
        .btn-group {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Companies List</h1>
        <div id="companies-container" class="row">
            <!-- سيتم تعبئة هذا القسم بالكرتات باستخدام JavaScript -->
        </div>
    </div>

    <script>
        // جلب البيانات من API
        async function fetchCompanies() {
            try {
                const response = await fetch('./api/get_companies.php');
                const companies = await response.json();
                displayCompanies(companies);
            } catch (error) {
                console.error('Error fetching companies:', error);
            }
        }

        // عرض الشركات على شكل كرتات
        function displayCompanies(companies) {
            const container = document.getElementById('companies-container');
            container.innerHTML = ''; // مسح المحتوى القديم

            companies.forEach(company => {
                const card = `
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">${company.name}</h5>
                                <p class="card-text">
                                    <strong>Country:</strong> ${company.country}<br>
                                    <strong>Phone:</strong> ${company.tell}<br>
                                    <strong>Email:</strong> ${company.email}<br>
                                    <strong>Website:</strong> <a href="${company.wep}" target="_blank">${company.wep}</a><br>
                                    <strong>Category:</strong> ${company.cotegray}<br>
                                    <strong>Type:</strong> ${company.ROEL}
                                </p>
                                <div class="btn-group">
                                     <a href="index.php?page=edit_company&id=${company.id}" class="btn btn-secondary">Edit</a>
                                    <button class="btn btn-danger" onclick="deleteCompany(${company.id})">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                container.innerHTML += card;
            });
        }

        // وظيفة التعديل (سيتم تنفيذها لاحقاً)
        function editCompany(id) {
            alert(`Edit company with ID: ${id}`);
            // يمكنك توجيه المستخدم إلى صفحة التعديل أو فتح نموذج تعديل
        }

        // وظيفة الحذف (سيتم تنفيذها لاحقاً)
        async function deleteCompany(id) {
            if (confirm('Are you sure you want to delete this company?')) {
                try {
                    const response = await fetch(`./api/delete_company.php?id=${id}`, {
                        method: 'DELETE'
                    });
                    const result = await response.json();
                    alert(result.message);
                    fetchCompanies(); // إعادة تحميل القائمة بعد الحذف
                } catch (error) {
                    console.error('Error deleting company:', error);
                }
            }
        }

        // جلب البيانات عند تحميل الصفحة
        document.addEventListener('DOMContentLoaded', fetchCompanies);
    </script>
</body>
</html>