function admSelectCheck(nameSelect) {
    "use strict";
    if (nameSelect) {
        
        if (document.getElementById("customer").value == nameSelect.value) {
            document.getElementById("pelanggancheck").style.display = "block";
            document.getElementById("drivercheck").style.display = "none";
            document.getElementById("mitracheck").style.display = "none";

        } else if (document.getElementById("driver").value == nameSelect.value) {
            document.getElementById("drivercheck").style.display = "block";
            document.getElementById("pelanggancheck").style.display = "none";
            document.getElementById("mitracheck").style.display = "none";
        } else if (document.getElementById("partner").value == nameSelect.value) {
            document.getElementById("mitracheck").style.display = "block";
            document.getElementById("drivercheck").style.display = "none";
            document.getElementById("pelanggancheck").style.display = "none";

        } else {
            document.getElementById("pelanggancheck").style.display = "block";
        }
    }
}

$(function() {
    "use strict";
    $(".select2").select2({
      dropdownAutoWidth: true,
      width: '100%'
    });
    
    
    });