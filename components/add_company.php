<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Company</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
</head>
<body>
    <div class="container">
        <div class="form-container">
            <p id="alrt" style="display: none;"></p>
            <form id="add_new_company" method="POST">
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
                <button type="submit" class="btn btn-info btn-block">Add New Company</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('add_new_company').onsubmit = function(event) {
            event.preventDefault();
            let formdata = new FormData(this);

            fetch('./api/add_company_api.php', {
                method: 'POST',
                body: formdata
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                let alert = document.getElementById('alrt');
                alert.style.display = 'block';
                alert.innerHTML = `<p class="alert alert-dark" role="alert">${data.message}</p>`;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        };
    </script>
</body>
</html>