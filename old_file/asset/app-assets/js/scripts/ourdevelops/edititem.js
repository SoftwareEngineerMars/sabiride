

"use strict";
$(".select2").select2({
  // the following code is used to disable x-scrollbar when click in select input and
  // take 100% width in responsive also
  dropdownAutoWidth: true,
  width: '100%'
});

function editSelectCheck(nameSelect) {
  "use strict";
  if (nameSelect) {
      if (document.getElementById("yes").value == nameSelect.value) {

          document.getElementById("yescheck").required = true;
          document.getElementById("yescheck").style.display = "block";
      } else if (document.getElementById("no").value == nameSelect.value) {

          document.getElementById("yescheck").required = false;
          document.getElementById("yescheck").style.display = "none";
      }
  } else {
      document.getElementById("yescheck").style.display = "block";
      document.getElementById("yescheck").required = true;
  }
}
















