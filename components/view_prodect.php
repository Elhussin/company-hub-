<div class="bg-light shadow-sm text-xxl-center m-5 p-3"> <h5  id="pageTitle"> All Prodeact</h5>   </div>
<div id="product-container" class="mt-5">
    <!-- المنتجات ستظهر هنا -->
</div>




<script>


const selectIteam = getٍSelectProductFromUrl();
const apiUrl = selectIteam ? `api/get_brodect.php?select=${selectIteam}` : "api/get_brodect.php";
console.log(apiUrl)
if (selectIteam){
    document.getElementById("pageTitle").innerHTML=selectIteam.toUpperCase()
}

// دالة لتحميل المنتجات عبر AJAX
function loadProducts() {
    fetch(apiUrl)  // استخدام ملف PHP المناسب لجلب المنتجات
        .then(response => response.text())
        .then(data => {
            document.getElementById('product-container').innerHTML = data;
        })
        .catch(error => {
            console.error('Error loading products:', error);
        });
}

// yourpage.php?name=product&type=Lens&min_price=100&max_price=500).

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


function getٍSelectProductFromUrl() {
  const urlParams = new URLSearchParams(window.location.search);
  console.log("select",urlParams.get("select"));

  return urlParams.get("select");
}




</script>