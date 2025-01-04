<STYle>

.container {
    margin-bottom: 50px; /* أو أي قيمة تناسبك */
}
body, html {
    height: 100%;
    margin: 0;
    display: flex;
    flex-direction: column;
}

.container {
    flex: 1;
    padding-bottom: 20px; /* أضف مساحة لتجنب التغطية */
}

.table {
    overflow-x: auto; /* لإضافة شريط تمرير أفقي في الشاشات الصغيرة */
}
</STYle>

<div class="container  mt-5" style="height: 100vh;">
    <div class="row justify-content-md-center">
        <div class="col-md-auto col-xxl">
            <!-- Search Box -->
            <div class="input-group mb-3">

                <input type="text" id="search" class="form-control" placeholder="Enter search term">
                <button id="Search" class="btn btn-outline-info" type="button">Search</button>
                <button id="clear" class="btn btn-outline-info" type="button" onClick="clearSearch()">Clear</button>

            </div>

            <!-- Results Table -->
            <table class="table" style="display:none" id="table">
                <thead>
                    <tr class="table-dark">
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Tell</th>
                        <th scope="col">Password</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Emp. ID</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody id="tablebody"></tbody>
            </table>

            <!-- Live Update List -->
            <div class="card">
                <ul id="contant2" class="list-group list-group-flush"></ul>
            </div>
        </div>
    </div>
</div>

<script>
    // Search Functionality
    document.getElementById("Search").onclick = () => {
        const searchValue = document.getElementById("search").value.trim();

        if (searchValue.length >= 0) {
            fetch("./api/search_api.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ value: searchValue })
            })
            .then(response => response.json())
            .then(data => {
                const tbody = document.getElementById("tablebody");
                tbody.innerHTML = ""; // Clear previous results

                if (data.length > 0) {
                    document.getElementById("table").style.display = "block";
                    data.forEach(element => {
                        const status = element.stat == 1 ? "Active" : "Not Active";
                        const row = `
                            <tr class='table-success'>
                                <td>${element.ID}</td>
                                <td>${element.NAME}</td>
                                <td>${element.userName}</td>
                                <td>${element.tell}</td>
                                <td>${element.pasword}</td>
                                <td>${element.age}</td>
                                <td>${element.gender}</td>
                                <td>${element.EmpolyId}</td>
                                <td class='table-warning'>${status}</td>
                            </tr>`;
                        tbody.insertAdjacentHTML("beforeend", row);
                    });
                } else {
                    alert("No results found");
                    document.getElementById("table").style.display = "none";
                }
            })
            .catch(error => console.error("Error fetching data:", error));
        } else {
            alert("Please enter a search term.");
        }
    };

    // Clear Search
    function clearSearch() {
        document.getElementById("search").value = "";
        document.getElementById("table").style.display = "none";
        document.getElementById("tablebody").innerHTML = "";
    }

    // Live Updates
    setInterval(() => {
        fetch("./api/search_api.php")
        .then(response => response.json())
        .then(data => {
            const main = document.getElementById("contant2");
            main.innerHTML = ""; // Clear previous content
            data.forEach(element => {
                main.innerHTML += `
                    <li class="list-group-item text-white bg-secondary">ID NO: ${element.ID}</li>
                    <li class="list-group-item text-white bg-info">User Name: ${element.userName}</li>
                    <li class="list-group-item bg-info">Name: ${element.NAME}</li>
                    <li class="list-group-item bg-info">Gender: ${element.gender}</li>
                    <br>`;
            });
        })
        .catch(error => console.error("Error fetching live updates:", error));
    }, 1000);
</script>
