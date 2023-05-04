"use strict";
$(".select2").select2({
    // the following code is used to disable x-scrollbar when click in select input and
    // take 100% width in responsive also
    dropdownAutoWidth: true,
    width: '100%'
  });
  
  function addSelectCheck(nameSelect) {
    "use strict";
    console.log(nameSelect);
    if (nameSelect) {
        if (document.getElementById("service").value == nameSelect.value) {
            document.getElementById("linktes").required = false;
            document.getElementById("servicecheck").style.display = "block";
            document.getElementById("linkcheck").style.display = "none";
        } else if (document.getElementById("link").value == nameSelect.value) {
            document.getElementById("linktes").required = true;
            document.getElementById("linkcheck").style.display = "block";
            document.getElementById("servicecheck").style.display = "none";
        }
    } else {
        document.getElementById("servicecheck").style.display = "block";
    }
}