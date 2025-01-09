<style>
    .form-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #f9f9f9;
    }

    .form-group label {
        font-weight: bold;
    }

    .alert {
        margin-top: 20px;
    }
</style>

<div class="container">
    <div class="form-container">
        <p id="alrt" style="display: none;"></p>
        <form id="edit_company_form" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <?php include('static/html/countery.html'); ?>
            </div>
            <div class="form-group">
                <label for="tell">Tell Num</label>
                <input type="tel" class="form-control" id="tell" name="tell">
            </div>
            <div class="form-group">
                <label for="fax">Fax Num</label>
                <input type="tel" class="form-control" id="fax" name="fax">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="wep">Web Site</label>
                <input type="url" class="form-control" id="wep" name="wep">
            </div>
            <div class="form-group">
                <label for="cotegray">Category</label>
                <select class="form-control" id="cotegray" name="cotegray" required>
                    <option value="">Choose</option>
                    <option value="fram">Frame</option>
                    <option value="lens">Lens</option>
                    <option value="exa">Exa</option>
                    <option value="all">All</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ROEL">Company Type</label>
                <select class="form-control" id="ROEL" name="ROEL" required>
                    <option value="">Choose the type</option>
                    <option value="User">User</option>
                    <option value="Agent">Agent</option>
                    <option value="inseranc">Insurance</option>
                </select>
            </div>
            <button type="submit" class="btn btn-info btn-block">Update Company</button>
        </form>
    </div>
</div>

<script>
// جلب معرف الشركة من الرابط
    const urlParams = new URLSearchParams(window.location.search);
    const companyId = urlParams.get('id');

    // جلب بيانات الشركة من API
    async function fetchCompanyData() {
        if (!companyId) {
            alert('Company ID is missing.');
            return;
        }

        try {
            const response = await fetch(`./api/get_companies.php?id=${companyId}`);
            const company = await response.json();
            populateForm(company);
        } catch (error) {
            console.error('Error fetching company data:', error);
        }
    }

    // تعبئة النموذج ببيانات الشركة
    function populateForm(company) {
        document.getElementById('name').value = company.name;
        document.getElementById('country').value = company.country;
        document.getElementById('tell').value = company.tell;
        document.getElementById('fax').value = company.fax;
        document.getElementById('email').value = company.email;
        document.getElementById('wep').value = company.wep;
        document.getElementById('cotegray').value = company.cotegray;
        document.getElementById('ROEL').value = company.ROEL;
    }



    document.getElementById('edit_company_form').onsubmit = async function(event) {
        event.preventDefault(); // منع إرسال النموذج بشكل مباشر

        // جلب معرف الشركة من الرابط
        const urlParams = new URLSearchParams(window.location.search);
        const companyId = urlParams.get('id');

        if (!companyId) {
            alert('Company ID is missing.');
            return;
        }

        // إنشاء FormData من النموذج
        const formData = new FormData(this);

        try {
            // إرسال البيانات إلى API لتحديث الشركة
            const response = await fetch(`./api/update_company.php?id=${companyId}`, {
                method: 'POST',
                body: formData
            });

            // التحقق من نجاح الطلب
            if (!response.ok) {
                throw new Error('Network response was not ok.');
            }

            const result = await response.json(); // تحويل النتيجة إلى JSON
            alert(result.message); // عرض رسالة النجاح

            // العودة إلى صفحة عرض الشركات بعد التحديث
            window.location.href = 'index.php?page=view_company';
        } catch (error) {
            console.error('Error updating company:', error);
            alert('An error occurred while updating the company.');
        }
    };

    // جلب بيانات الشركة عند تحميل الصفحة
    document.addEventListener('DOMContentLoaded', fetchCompanyData);
</script>