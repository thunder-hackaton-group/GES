var country;

$.ajax({
    url: "https://geoip-db.com/jsonp",
    jsonpCallback: "callback",
    dataType: "jsonp",
    success: function(location) {

        country = location.country_name;
        var options = $('#pays').children('option');

        for (let i = 0; i < options.length; i++) {
            if (options[i].value == country) {
                options[i].setAttribute('selected', 'selected');
            }
        }
        $('#city').val(location.city);
        console.log('Public IP : ' + location.IPv4);
    }
});

var today = new Date();
var y = today.getFullYear(),
    m = today.getMonth() + 1,
    d = today.getDate();

if (m < 10) {
    m = '0' + String(m);
}

$('#naissance').attr('max', y + '-' + m + '-' + d);

if (UIkit.modal($('#my_id')) != undefined) {
    $(document).ready(function() {
        UIkit.modal($('#my_id')).show();
        $('.uk-button').click(function() {
            UIkit.modal($('#my_id')).hide();
        });
    });
}