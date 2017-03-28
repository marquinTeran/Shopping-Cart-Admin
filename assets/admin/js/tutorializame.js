function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split('&');
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split('=');
        if (decodeURIComponent(pair[0]) == variable) {
            return decodeURIComponent(pair[1]);
        }else{
          return false;
        }
    }
}

$(document).ready(function() {
var active_menu = getQueryVariable('active_menu');
if(active_menu) {
  $("#"+active_menu.replace(".", "")+"SUB").addClass("active_submenu");
  active_menu = active_menu.split(".")[0];
  $("#"+active_menu).removeClass("closed");
}
});
