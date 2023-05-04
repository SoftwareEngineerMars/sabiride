function admSelectCheck(nameSelect) {
    "use strict";
    console.log(nameSelect);
    if (nameSelect) {
        if (document.getElementById("persen").value == nameSelect.value) {
            document.getElementById("persencheckrequired").required = true;
            document.getElementById("fixcheckrequired").required = false;
            document.getElementById("persencheck").style.display = "block";
            document.getElementById("fixcheck").style.display = "none";
        } else if (document.getElementById("fix").value == nameSelect.value) {
            document.getElementById("fixcheckrequired").required = true;
            document.getElementById("persencheckrequired").required = false;
            document.getElementById("fixcheck").style.display = "block";
            document.getElementById("persencheck").style.display = "none";
        }
    } else {
        document.getElementById("persencheck").style.display = "block";
    }
}

$(function() {
    "use strict";
    $(".select2").select2({
      dropdownAutoWidth: true,
      width: '100%'
    });
    
    
    });