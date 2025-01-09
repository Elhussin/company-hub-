
<div id="product-container" class="mt-5">
    <!-- المنتجات ستظهر هنا -->
</div>




<script>
// دالة لتحميل المنتجات عبر AJAX
function loadProducts() {
    fetch('api/get_brodect.php')  // استخدام ملف PHP المناسب لجلب المنتجات
        .then(response => response.text())
        .then(data => {
            document.getElementById('product-container').innerHTML = data;
        })
        .catch(error => {
            console.error('Error loading products:', error);
        });
}

function editProduct(productId) {
    // تحويل المستخدم إلى صفحة add_prodect.php مع إضافة id المنتج كـ Query Parameter
    window.location.href = `index.php?page=add_prodect&id=${productId}`;
}
// // دالة لتحميل بيانات المنتج عند النقر على زر التعديل

// إغلاق نموذج التعديل
function closeEditForm() {
    document.getElementById('edit-product-modal').style.display = 'none';
}


// دالة لحذف المنتج
function deleteProduct(productId) {
    // تأكيد الحذف من المستخدم
    if (confirm('Are you sure you want to delete this product?')) {
        fetch('api/delete_product.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'id=' + productId  // إرسال id المنتج
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Product deleted successfully');
                loadProducts();  // إعادة تحميل قائمة المنتجات بعد الحذف
            } else {
                alert('Failed to delete product');
            }
        })
        .catch(error => {
            console.error('Error deleting product:', error);
        });
    }
}



// تحميل المنتجات عند تحميل الصفحة
document.addEventListener('DOMContentLoaded', loadProducts);






</script>