

<div class="mt-5 d-flex justify-content-center align-items-center" >
    <a href="index.php?page=add_user" class="btn btn-info">Add New User</a>
</div>

<div class="container min-vh-100  mt-5">
        <input type="text" id="search" class="form-control" placeholder="Search by User Id or User name">
        <button id="Search" class="btn btn-outline-info" type="button">Search</button>
        <button id="clear" class="btn btn-outline-info" type="button" onClick="clearSearch()">Clear</button>

    <div id="cardContainer" class="d-flex flex-wrap gap-3 mt-4">
        <!-- Cards will be dynamically added here -->
    </div>
</div>

<script>
const getsearch = document.getElementById("Search");
getsearch.addEventListener("click", search);
function search(){
    
    const searchValue = document.getElementById("search").value.trim();

    if (searchValue.length >= 0) {
        fetch("./api/search_api.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ value: searchValue })
        })
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById("cardContainer");
            container.innerHTML = ""; // Clear previous results

            if (data.length > 0) {
                data.forEach(element => {
                    const status = element.stat == 1 ? "Active" : "Not Active";
                    const card = `
                        <div class="card mb-3 shadow" style="width: 18rem;">
                            <div class="card-header">User ID: ${element.ID}</div>
                            <div class="card-body">
                                <h5 class="card-title">${element.NAME}</h5>
                                <p class="card-text">
                                    <strong>Username:</strong> ${element.userName}<br>
                                    <strong>Phone:</strong> ${element.tell}<br>
                                    <strong>Age:</strong> ${element.age}<br>
                                    <strong>Gender:</strong> ${element.gender}<br>
                                    <strong>Status:</strong> ${status}<br>
                                    <strong>Employee ID:</strong> ${element.EmpolyId}<br>
                                </p>
                                <button class="btn btn-warning" onclick="editUser(${element.ID})">Edit</button>
                                <a href="index.php?page=user_id&userid='${element.ID}" class="btn btn-danger">Delete</a>

                                // <button class="btn btn-danger" onclick="deleteUser(${element.ID})">Delete</button>
                            </div>
                        </div>`;
                    container.insertAdjacentHTML("beforeend", card);
                });
            } else {
                alert("No results found");
            }
        })
        .catch(error => console.error("Error fetching data:", error));
    } else {
        alert("Please enter a search term.");
    }
};

search()

// Function to edit user
function editUser(userId) {
    alert(`Edit user with ID: ${userId}`);
    // Implement edit logic here
}

// Function to delete user
function deleteUser(userId) {
    if (confirm("Are you sure you want to delete this user?")) {
        fetch(`./api/delete_user.php`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ id: userId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("User deleted successfully!");
                document.getElementById("Search").click(); // Refresh the results
            } else {
                alert("Failed to delete user.");
            }
        })
        .catch(error => console.error("Error deleting user:", error));
    }
}

function clearSearch() {
    document.getElementById("search").value = ""; // إعادة تعيين قيمة حقل البحث
    document.getElementById("cardContainer").innerHTML = ""; // تنظيف النتائج
}

</script>