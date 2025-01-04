<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
    <link rel="icon" href="../img/icon.jpg" />
    <link rel="shortcut" href="../img/icon.jpg" />
    <link rel="apple-touch-icon" href="../img/icon.jpg" />
    <link rel="stylesheet" href="../css/bootstrab.css">

</head>

<body>

    <?php  include('../html/nav.html') ?>
    <div>
        <br>
        <div class="container">

            <div class="col-sm-4"></div>
            <div class="col-xxl-8">
                <div style="display:none; text-align:center;" id="alrt" class="alert alert-info" role="alert">

                </div>

                <div>
                    <form method="POST" id="sign">

                        <!-- user name  -->
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label" for="user">User Name
                                <span>*</span></label>
                            <div class="col-sm-10">
                                <!-- readonly -->
                                <input type="text" class="form-control" id="staticEmail" required name="user"
                                    value="Enter User Name Or Emile">
                            </div>
                        </div><br>
                        <!-- name -->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="name"> Name <span>*</span></label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" required name="name"
                                    placeholder="Enter Your Name">
                            </div>
                        </div><br>
                        <!-- telll -->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="">TELL<span>*</span></label>
                            <div class="col-sm-10">
                                <input class="form-control" size="10" type="number" required name="tell"
                                    placeholder="  Tell Number">
                            </div>
                        </div><br>
                        <!-- age -->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="">Age<span>*</span></label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" required name="age" placeholder="AGE">
                            </div>
                        </div><br>
                        <!-- pasword -->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="">Pasword<span>*</span></label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" required name="pasword"
                                    placeholder="Pasword" autocomplete>
                            </div>
                        </div> <br>
                        <!-- elmpoye id  -->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="">EmpolyId<span>*</span></label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" required name="empolyId"
                                    placeholder="EmpolyId">
                            </div>
                        </div>
                        <br>
                        <!-- gender -->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="">gender<span>*</span></label>
                            <div class="col-sm-10">
                                <select required name="gender" class="form-control">
                                    <option selected>select gender</option><span>*</span>
                                    <option value="man">man</option>
                                    <option value="woman">women</option>
                                    <option value="other">other</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for=""></label>
                            <div class="col-sm-10">
                                <button class="btn btn-info  form-control" onclick="send()" style="margin:auto ; "
                                    type="submit">ADD New</button>
                            </div>
                    </form>

                </div>
            </div>


        </div>
    </div>
    <br>


    <script>
    function send() {
        let getForm = document.getElementById("sign");
        getForm.onsubmit = (form1) => { // لمنع الارسال المياشر الي السيرفر 
            form1.preventDefault();
            let formdata = new FormData(getForm);
            fetch("../api/adduser_api.php", {
                method: 'POST',
                body: formdata
            }).then(response => response.json()).then(data => {
                console.log(data);

                var alert = document.getElementById("alrt")
                alert.style.display = "block";

                alert.innerHTML = '<p >' + data.messeg;
                '  <p> ';

            })
        };
    }
    </script>
