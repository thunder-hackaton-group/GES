root = document.querySelector('.rootN');
var ID = document.getElementById.bind(document);

function addEvent(element,event,func){
    if(element.addEventListener){
        element.addEventListener(event,func,false);
    }
    else{
        element.attachEvent("on" + event, func);
    }
}

var form = document.getElementsByTagName('form')[3];
var h3 = document.getElementsByTagName('h3')[0];
var rr = ID('rr'),rrs = rr.style;
var rtp = ID('rootEdit'), rtpS = rtp.style;


var show = function(){
    rrs.display='block';
    rrs.backgroundColor = 'rgba(0,0,0,0.5)';
    rtpS.width = '30%';
    rtpS.height = '100%';
    form.style.opacity = 1;
    h3.style.opacity = 1;
}

var hide = function(){
    rrs.display='none';
    form.style.opacity = 0;
    h3.style.opacity = 0;
    setTimeout(() => {
        rtpS.width = 0;
        rtpS.height = 0;
    }, 700);
}

addEvent(root,'click',show);
addEvent(rr,'click',hide);

if (window.XMLHttpRequest) {
    xhr = new XMLHttpRequest();
 } else {
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}

var doe = function(e){
    e.preventDefault();
    var Cpassword= ID('Cpassword').value, 
        Npassword = ID('Npassword').value;
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4){
            var resp = JSON.parse(xhr.responseText);
            if(resp[0] === 'True'){
                alert('Opération effectué\nVeuillez vous reconnecter!');
                window.location.href = './index.php'
            }
            else{
                alert('Operation non éffectuée!');
            }
        }
    };
    xhr.open('POST', 'rootm.php', true);
    xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send('Cpassword='+Cpassword+'&Npassword='+Npassword);
}

var upd = ID('upd'), rootF = ID('rootF');
addEvent(rootF,'submit',doe);