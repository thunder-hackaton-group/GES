$(document).ready(function() {
    UIkit.switcher('#control-profil').show(0);
    $('#pr').click(function(e) {
        UIkit.switcher('#control-profil').show(0);
    });
    $('#pub').click(function(e) {
        UIkit.switcher('#control-profil').show(1);
    });
    $('#par').click(function(e) {
        UIkit.switcher('#control-profil').show(2);
    });
});