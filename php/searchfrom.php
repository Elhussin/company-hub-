<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/stylb.css">
    <link rel="stylesheet" href="../css/bootstrab.css">

    
</head>
<body>
<?php  include('../html/nav.html') ?>

<div class="container">
<div class="row justify-content-md-center">
    <div class="col col-lg-2  ">
  <!-- <div class="row">
    <div class="col"> -->
        <!-- left box -->
    </div>

<!-- center box -->
    <!-- <div class="col-6"> -->
    <div class="col-md-auto col-xxl">
<div>
        <!-- search box -->
        <div class="input-group mb-3">
        <button id="updata" class="btn btn-outline-secondary" type="button" id="button-addon1">search</button>

  <input type="text" id="search" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
  <button id="clear"  value="Reload Page" onClick="document.location.reload(true)" class="btn btn-outline-secondary" type="button" id="button-addon1">Clear</button>

</div>

<!-- view search -->


<table class="table"  style="display:none"  id="table">
  <thead>
    <tr class="table-dark">
        <th scope="col">ID</th>
        <th scope="col">Name </th>
        <th scope="col">U.Name</th>
        <th scope="col">Tell</th>
        <th scope="col">Pasword</th>
        <th scope="col">AGe</th>
        <th scope="col">Gender</th>
        <th scope="col">Em.Id</th>
        <th scope="col">Stata</th>
      </tr>
  </thead>
  <tbody  id="t">
</tbody>    
</table>

<script> 
let search=document.getElementById("search");
document.getElementById("updata").onclick=()=>{  
let searchvalue= document.getElementById("search").value;


if(searchvalue.length>1){
fetch("api/search_api.php",{
method: 'POSt',
body :JSON.stringify({value:searchvalue}) // تحويل الي JISON
})
// تلقي الرد
.then(response=>response.json()).then(
data=>{
data =data.reverse();   // لعكس النتائج
    var td= document.getElementById("t");
      var p = ""; 
      td.innerHTML=p;
data.forEach(element => {
  
if(element.EmpolyId.search(searchvalue) !=-1||element.userName.search(searchvalue) !=-1||
element.NAME.search(searchvalue) !=-1||element.ID.search(searchvalue) !=-1 ){

    var stat =element.stat ;
    if(stat ==0){
        stat ="Not Active";
    }else if(stat ==1){
        stat="Active";
    }
      p += "<tr class='table-success'>";
      p += "<td>" + element.ID+ "</td>";
      p += "<td>" + element.NAME+"</td>";
      p += "<td>" + element.userName + "</td>";
      p += "<td>" + element.tell+"</td>";
      p += "<td>" + element.pasword + "</td>";
      p += "<td>" + element.age + "</td>";
      p += "<td>" + element.gender + "</td>";
      p += "<td>" + element.EmpolyId+"</td>";
        p += "<td class='table-warning'>" + stat + "</td>";
      p += "<tr>";
      document.getElementById("table").style.display="block";
      td.insertAdjacentHTML("beforeend", p);  
          }
         }
       )}
       )}}
</script>
</div>
<!-- all aitam  -->
<div>


<div class="card" >
    <ul   id="contant2"  style="margin-bottom: 15px;" class="list-group  list-group-flush"> </ul>
   
   </div>
 
<script>

    setInterval(()=>{   
         
fetch("api/search_api.php").then(Response=>Response.json()).then(
    data1=>{
// لعرض بيانات متقبله
let main=document.getElementById("contant2");
main.innerHTML='';// تصفير القيمه لتححدث ر
data1.forEach(element => {
    main.innerHTML+=  '<li class="list-group-item  text-white bg-secondary ">ID NO:'+element.ID + "</li>";
    main.innerHTML+=  '<li class="list-group-item  text-white bg-info "> User Name '+element.userName + "</li>";
    main.innerHTML+=  '<li class="list-group-item  bg-info"> NAME :'+element.NAME + "</li>";
    main.innerHTML+=  '<li class="list-group-item bg-info"> gender :'+element.gender + "</li> ";
    main.innerHTML+="<br>"
    
});
});
        },1000);  
</script>

</div>
    </div>
    <!--  left side -->
    <!-- <div class="col"> -->
    <div class="col col-lg-2">
    </div>
  </div>
</div>
<?php  include('../html/footer.html') ?>

</body>
</html>
