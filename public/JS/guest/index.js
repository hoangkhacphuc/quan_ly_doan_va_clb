$(document).ready(function(){
    let focus_nav_radio = "nav-radio-0";
    $('input:radio[name=nav-radio]').change(function () {
        if (focus_nav_radio != "nav-radio-0")
            $("#label-"+focus_nav_radio).css("background-color", "white");
        $("#label-"+this.id).css("background-color", "#e94b00");
        focus_nav_radio = this.id;
    });
});