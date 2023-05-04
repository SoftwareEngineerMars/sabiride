;
(function ($) {
    "use strict";
var heading = $(".typed");
    if(heading.length){
        heading.typed({
            strings: [". . ."],
            // Optionally use an HTML element to grab strings from (must wrap each string in a <p>)
            stringsElement: null,
            typeSpeed: 100,
            startDelay: 500,
            backSpeed: 100,
            backDelay: 500,
            loop: true,
            showCursor: true,
            cursorChar: "",
            attr: null,
            contentType: 'html',
            callback: function() {},
            preStringTyped: function() {},
            onStringTyped: function() {},
            resetCallback: function() {}
        });
    }

})(jQuery)

function Updating() {
    var warning1 = document.getElementById("warning1");
    var warning2 = document.getElementById("warning2");
    var buttoninstall = document.getElementById("buttoninstall");
    var installing = document.getElementById("installing");
    var pc = document.getElementById("pc");
    var username = document.getElementById("username");
    if (warning1.style.display == "none" || pc.value == '' || username.value == '') {
        warning1.style.display = "block";
        buttoninstall.style.display = "block";
        warning2.style.display = "none";
        installing.style.display = "none";
    } else {
        warning2.style.display = "block";
        buttoninstall.style.display = "none";
        warning1.style.display = "none";
        installing.style.display = "block";
    }
  }