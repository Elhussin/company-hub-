
    function brand() {
        var selectl = document.getElementById('PRODECT');
        var optionl = selectl.options[selectl.selectedIndex];
        if (optionl.value == "frame") {
            document.getElementById('brand_frame').style.display = "block";
            document.getElementById('fram_type').style.display = "block";
            document.getElementById('company_frame').style.display = "block";
            document.getElementById('company_lens').style.display = "none";

            document.getElementById('brand_lens').style.display = "none";
            document.getElementById('lens_type').style.display = "none";

        } else if (optionl.value == "lens") {
          document.getElementById('brand_frame').style.display = "none"
          document.getElementById('fram_type').style.display = "none";
            document.getElementById('company_frame').style.display = "none";
            document.getElementById('company_lens').style.display = "block";
            document.getElementById('brand_lens').style.display = "block";
            document.getElementById('lens_type').style.display = "block";
            
        } else {
            document.getElementById('brand_frame').style.display = "none";
            document.getElementById('fram_type').style.display = "none";
            document.getElementById('company_frame').style.display = "none";
            document.getElementById('company_lens').style.display = "none";
            document.getElementById('brand_lens').style.display = "none";
            document.getElementById('lens_type').style.display = "none";

        }
    }
    
    brand();



    // 
    function lens_type_view_fun() {
      var selectl = document.getElementById('lens_type');
      var optionl = selectl.options[selectl.selectedIndex];
      if(optionl.value =="Rl"){
          document.getElementById('rady_lens').style.display = "block"; 
          document.getElementById('lens_power').style.display = "block";
          document.getElementById('singl_lens').style.display = "block"; 
          document.getElementById('lab_lens').style.display = "none";
          document.getElementById('singl_duble_lens').style.display = "none"; 
        //   document.getElementById('lens_base').style.display = "none"; 
          
      }else if(optionl.value =="XR"){
          document.getElementById('lab_lens').style.display = "block"; 
          document.getElementById('singl_duble_lens').style.display = "block"; 
        //   
          document.getElementById('rady_lens').style.display = "none"; 
          document.getElementById('lens_power').style.display = "none"; 
          document.getElementById('singl_lens').style.display = "none"; 
          
          
      } else{
          document.getElementById('rady_lens').style.display = "none"; 
          document.getElementById('lab_lens').style.display = "none"; 
          document.getElementById('lens_power').style.display = "none"; 
          document.getElementById('singl_lens').style.display = "none"; 
          document.getElementById('singl_duble_lens').style.display = "none"; 
        //   document.getElementById('lens_base').style.display = "none"; 
      }
  }
  lens_type_view_fun()


  // document.getElementById('control_EMAIL').readOnly = true;

function OpenWindow_brand() {
  window.open('index.php?page=add_brand',
              'newwindow',
              config='height=670,width=500,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,directories=no,status=no');
}
function OpenWindow_lens_type() {
  window.open('index.php?page=lens_type',
              'newwindow',
              config='height=670,width=500,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,directories=no,status=no');
}

function OpenWindow_newcompany() {
  window.open('index.php?page=add_company',
              'newwindow',
              config='height=670,width=500,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,directories=no,status=no');
}