<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../html/icon.html'); ?>
    <title>new company</title>
</head>

<body>
    <?php include('../html/nav.html'); ?>


    <div style="overflow:auto">
        <div class="menu">
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
            <a href="#">Link 3</a>
            <a href="#">Link 4</a>
        </div>
        <div style="margin:auto;" class="form-group row  main">
            <p style="margin:auto; margin-top:5px;" id="alrt"></p>
            <table class="table table-borderless">
                <thead>

                </thead>
                <tbody>
                    <form action="" method="POST" id="add_new_company">

                        <tr>
                            <th class="table-primary">Name</th>
                            <td><input class="form-control" id="name" name="name" type="text" required></td>

                        </tr>
                        <tr>
                            <th class="table-primary"> Countery</th>
                            <td><?php include('../html/countery.html'); ?></td>
                        </tr>
                        <tr>
                            <th class="table-primary">Tell Num </th>
                            <td><input class="form-control" id="tell" name="tell" type="tel"> </td>
                        </tr>
                        <tr>
                            <th class="table-primary">fax Num </th>
                            <td><input class="form-control" id="fax" name="fax" type="tel"> </td>
                        </tr>
                        <tr>
                            <th class="table-primary">Email </th>
                            <td><input class="form-control" id="email" name="email" type="text"> </td>
                        </tr>
                        <tr>
                            <th class="table-primary">Wep Site</th>
                            <td><input class="form-control" id="wep" name="wep" type="url"> </td>
                        </tr>
                        <tr>
                            <th class="table-primary">Cotegray</th>
                            <td>
                                <select class="form-control" name="cotegray" id="cotegray" required>
                                    <option>Choose </option>
                                    <option value="fram">Frame</option>
                                    <option value="lens">Lens</option>
                                    <option value="exa">exa</option>
                                    <option value="all">All</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-primary">Company Type</th>
                            <td><select class="form-control" name="ROEL" id="ROEL" required>
                                    <option>choose the type</option>
                                    <option value="User">User</option>
                                    <option value="Agent">Agent</option>
                                    <option value="inseranc">inseranc</option>
                                </select>
                            </td>
                        </tr>

                        <tr>

                            <td colspan="2"> <button class="form-control btn btn-info" onclick="send()"
                                    type="submit">add new company</button></td>
                        </tr>
                </tbody>
            </table>
            <!-- /hidden view -->
            <div style="display:none">

                <tr>
                    <th class="table-primary">User name </th>
                    <td><input class="form-control" id="userName" name="userName" type="text"> </td>
                </tr>



                <tr>
                    <th class="table-primary">lastName</th>
                    <td><input class="form-control" id="lastName" name="lastName" type="text"> </td>
                </tr>
                <tr>

                    <th class="table-primary">iD</th>
                    <td><input class="form-control" id="ID" name="ID" type="text" size="10" placeholder="0123456789">
                    </td>
                </tr>
                <tr>
                    <th class="table-primary">age</th>
                    <td><input class="form-control" id="age" name="age" type="text"> </td>
                </tr>
                <tr>
                    <th class="table-primary">Gender</th>
                    <td><input class="form-control" id="gender" name="gender" type="text"> </td>
                </tr>
                <tr>
                    <th class="table-primary">Stat</th>
                    <td><input class="form-control" id="stat" name="stat" type="text"> </td>
                </tr>
                <tr>
                    <th class="table-primary">Password</th>
                    <td><input class="form-control" id="pasword" name="pasword" type="text"> </td>
                </tr>
                <tr>
                    <th class="table-primary">ACTIEV</th>
                    <td><input class="form-control" id="ACTIEV" name="ACTIEV" type="text"> </td>
                </tr>
                <tr>
                    <th class="table-primary">SECUERTY_COD</th>
                    <td><input class="form-control" id="SECUERTY_COD" name="SECUERTY_COD" type="text"> </td>
                </tr>





                </form>
            </div>

        </div>
    </div>
    <div><?php include('../html/footer.html'); ?></div>


    <script>
    function send() {
        let getForm = document.getElementById("add_new_company");


        getForm.onsubmit = (form1) => { // لمنع الارسال المياشر الي السيرفر 
            form1.preventDefault();
            let formdata = new FormData(getForm);

            fetch("http://new-worled.eb2a.com/company/api/adduser.php", {
                method: 'POST',
                body: formdata
            }).then(response => response.json()).then(data => {
                console.log(data);
                var alert = document.getElementById("alrt")
                alert.style.display = "block";
                alert.innerHTML = '<p class="alert alert-dark" role="alert">' + data.messeg; + '<p> ';
            })
        };
    }
    </script>

</body>

</html>