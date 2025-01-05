<div class="container min-vh-100 mt-5" >

   
    <div class="col-xxl-8">
        <div style="display:none; text-align:center;" id="alrt" class="alert alert-info" role="alert">

        </div>

        <div>

            <form method="POST" id="sign" onsubmit="send(event)">

                <!-- user name  -->
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label" for="user">User Name
                        <span>*</span></label>
                    <div class="col-sm-10">
                        <!-- readonly -->
                        <input type="text" class="form-control" id="staticEmail" required name="user"
                        placeholder="Enter User Name Or Emile">
                    </div>
                </div><br>
                <!-- name -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="name"> Name <span>*</span></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" required name="name" placeholder="Enter Your Name">
                    </div>
                </div><br>
                <!-- telll -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="">TELL<span>*</span></label>
                    <div class="col-sm-10">
                        <input class="form-control" size="10" type="TEXT" required name="tell"
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
                        <input class="form-control" type="password" required name="pasword" placeholder="Pasword"
                            autocomplete>
                    </div>
                </div> <br>
                <!-- elmpoye id  -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="">EmpolyId<span>*</span></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" required name="empolyId" placeholder="EmpolyId">
                    </div>
                </div>
                <br>
                <!-- gender -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="">gender<span>*</span></label>
                    <div class="col-sm-10">
                        <select required name="gender" class="form-control">
                            <option>select gender</option>
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
                        <button class="btn btn-info form-control" type="submit">ADD
                            User</button>
                    </div>
            </form>

        </div>
    </div>


</div>



<script>
    function send(event) {
        event.preventDefault(); // منع الإرسال الافتراضي للنموذج
        let getForm = document.getElementById("sign");
        let formdata = new FormData(getForm); // إنشاء البيانات من النموذج
        console.log(formdata);
        fetch("./api/adduser_api.php", {
                method: 'POST',
                body: formdata
            })
            .then(response => {
                // التحقق من نوع الاستجابة
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.text(); // قراءة النص الكامل للاستجابة
            })
            .then(text => {
                try {
                    // محاولة تحليل JSON
                    let data = JSON.parse(text);
                    console.log(data);

                    let alert = document.getElementById("alrt");
                    alert.style.display = "block";
                    alert.innerHTML = `<p>${data.messege}</p>`;
                } catch (error) {
                    // إذا لم تكن JSON، عرض الرسالة الخام
                    console.error("Invalid JSON:", text);
                    let alert = document.getElementById("alrt");
                    alert.style.display = "block";
                    alert.innerHTML = `<p>Server Response: ${text}</p>`;
                }
            })
            .catch(error => {
                console.error("Error:", error);
                let alert = document.getElementById("alrt");
                alert.style.display = "block";
                alert.innerHTML = `<p>Error: ${error.messege}</p>`;
            });

    }
</script>