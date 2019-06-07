$('.fBlur').mouseover(function() {
    $('.bBlur').css({ 'filter': 'blur(1px)' });
});

$('.fBlur').mouseleave(function() {
    $('.bBlur').css({ 'filter': 'blur(0)' });
});