function loader(nameSelect) {
    if (nameSelect) {
        console.log(nameSelect);
        serviceValue = document.getElementById("preloader").value;
        linkValue = document.getElementById("link").value;
        if (serviceValue == nameSelect.value) {
            // document.getElementById("linktes").required = false;
            // document.getElementById("servicecheck").style.display = "block";
            // document.getElementById("linkcheck").style.display = "none";
        } else if (linkValue == nameSelect.value) {
            // document.getElementById("linktes").required = true;
            // document.getElementById("linkcheck").style.display = "block";
            // document.getElementById("servicecheck").style.display = "none";
        }
    }
}