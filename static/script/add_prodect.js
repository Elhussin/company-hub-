
const productId = getProductIdFromUrl();
const apiUrl = productId ? `api/update_product_api.php?id=${productId}` : "api/add_product_api.php";
console.log("productId",productId,apiUrl)

const productForm = document.getElementById("productForm")
productForm.addEventListener("submit", function (e) {
  e.preventDefault(); // منع التحديث الافتراضي للصفحة

  // جمع البيانات من الفورم
  const formData = new FormData(this);
  console.log(formData);
  // إرسال البيانات إلى API باستخدام Fetch
  fetch(apiUrl, {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log("Success:", data);

      let statusMessage = document.getElementById("statusMessage");
      statusMessage.innerHTML = ""; // تنظيف الرسائل السابقة

      if (data.status === "success") {
        statusMessage.innerHTML += `<p style="color: green;">${data.message}</p>`;
      } else {
        statusMessage.innerHTML += `<p style="color: red;">${data.message}</p>`;
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      // alert('Something went wrong!');
    });
});

function brand_fun() {
  var prodectType = document.getElementById("PRODECT").value;
  document.getElementById("brand_lens").style.display = "none";

  if (prodectType === "lens" || prodectType === "contc_Lens") {
    document.getElementById("brand_lens").style.display = "block";
  }
}

function add_brand() {
  // يمكنك إضافة وظيفة لفتح نافذة جديدة لإضافة علامة تجارية جديدة
  window.open("index.php?page=add_brand", "_blank", "width=600,height=400");
}


async function fetchBrands() {
  var selectedType = document.getElementById("PRODECT").value; // جلب القيمة المختارة

  if (selectedType) {
    // إذا كانت القيمة محددة
    // إرسال طلب باستخدام fetch
    fetch("api/get_prand_api.php", {
      method: "POST", // تحديد الطريقة POST
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: "type=" + selectedType, // تمرير البيانات في body
    })
      .then((response) => response.text()) // تحويل الاستجابة إلى نص
      .then((data) => {
        // عرض النتيجة داخل select
        document.getElementById("brand_container").innerHTML = data;
        brand_fun();
      })
      .catch((error) => {
        console.error("Error:", error); // في حال حدوث خطأ
      });
  }
}

// دالة لجلب id المنتج من Query Parameter
function getProductIdFromUrl() {
  const urlParams = new URLSearchParams(window.location.search);
  console.log(urlParams.get("id"));

  return urlParams.get("id");
}

// عند تحميل الصفحة، تحقق من وجود id المنتج وجلب البيانات
document.addEventListener("DOMContentLoaded", function () {
  const productId = getProductIdFromUrl();

  if (productId) {
    fetchProductDetails(productId);
    // const form = document.getElementById('productForm');
    const fornTitle = document.getElementById("forn-title");

    if (fornTitle) {
    //   form.id = 'updateform';  // تغيير id الفورم إلى updateform
      fornTitle.innerHTML = "Updte Product ";
    }
  }
});

function fetchProductDetails(productId) {
  // إرسال طلب للحصول على بيانات المنتج
  fetch("api/get_item_to_update_prodect.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "id=" + productId,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data.product);

      if (data.status === "success") {
        populateForm(data.product); //
      } else {
        alert("Product not found");
      }
    })
    .catch((error) => console.error("Error fetching product details:", error));
}

function populateForm(data) {
  // Select the option with the value from the data
  const productSelect = document.getElementById("PRODECT");

  // Set selected value for PRODECT
  if (productSelect) {
    if (productSelect.querySelector(`option[value="${data.PRODECT}"]`)) {
      productSelect.value = data.PRODECT;

      // استدعاء دالة fetchBrands وانتظار تحميل البيانات
      fetchBrands().then(function () {
        brand_fun(); // يتم استدعاء هذا بعد أن تكتمل عملية fetchBrands
      });
    }
    productSelect.addEventListener("change", function() {
      // تأكد من تحميل البيانات بناءً على الاختيار
      const brandSelect = document.getElementById("brand_id");
    
      if (brandSelect) {
        brandSelect.value = data.brand_id;
      }
    });
  }

  document.getElementById("cotger").value = data.cotger;
  document.getElementById("typelens").value = data.typelens;
  document.getElementById("index").value = data.index;
  document.getElementById("Special").value = data.Special;
  document.getElementById("model").value = data.model;
  document.getElementById("made").value = data.made_year;
  document.getElementById("color").value = data.color;
  document.getElementById("lens").value = data.lens;
  document.getElementById("arm").value = data.arm;
  document.getElementById("bridg").value = data.bridg;
  document.getElementById("cost").value = data.cost;
  document.getElementById("ratel").value = data.ratel;
  document.getElementById("discon").value = data.discon;
  document.getElementById("tax").value = data.tax;
  document.getElementById("final").value = data.final;
  document.getElementById("count").value = data.count;
  document.getElementById("madein").value = data.madein;
  document.getElementById("descrip").value = data.descrip;
// عرض البيانات للتحقق من محتوياتها
console.log("data:", data);


// تحقق إذا كانت البيانات عبارة عن نص JSON
if (typeof data.type === 'string') {
  try {
    // تحويل النص إلى مصفوفة باستخدام JSON.parse()
    data.type = JSON.parse(data.type);
    console.log("Parsed data.type:", data.type);
  } catch (error) {
    console.error("Error parsing JSON:", error);
  }

  // console.log(typeof(data.type))
 // التأكد أن data.type هي مصفوفة
console.log(data.type)
  data.type.forEach(function(value) {
    // تحويل القيمة إلى تنسيق يناسب id (مثال: "TRN Brown" -> "trn_brown")
    let id = "type_" + value.toLowerCase().replace(/\s+/g, '_');
    
    // البحث عن العنصر في DOM
    let checkbox = document.getElementById(id);
    
    // إذا كان العنصر موجودًا، ضع علامة الاختيار
    if (checkbox) {
      checkbox.checked = true;
    } else {
      console.error("Checkbox with id " + id + " not found.");
    }
  });

}

// فرضاً أنك تنتظر تغيير في اختيار المستخدم:



  
}
