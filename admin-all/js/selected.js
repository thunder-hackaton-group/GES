// Selection de l'ecole dont les informations seront modifiées

if (window.XMLHttpRequest) {
    xhr = new XMLHttpRequest();
 } else {
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}

function addEvent(element,event,func){
    if(element.addEventListener){
        element.addEventListener(event,func,false);
    }
    else{
        element.attachEvent("on" + event, func);
    }
}

var ID = document.getElementById.bind(document);

var id = ID('id_et'),
    nom = ID('nom_et'),
    addr = ID('addr_et'),
    contact = ID('contact_et'),
    mail = ID('mail_et'),
    slogan = ID('slogan_et'),
    slc = ID('slc'),
    val = ID('valeur');

var choice,text;

xhr.onreadystatechange = function act(){
    if(xhr.readyState == 4){
        var donnees = JSON.parse(xhr.responseText);

        addEvent(slc,'change',function(){

            choice = slc.selectedIndex;
            text =  slc.options[choice].value;

            for(var i=0;i<donnees.length;i++){
                if(donnees[i].nom == text){
                    id.value = donnees[i].id;
                    nom.value = donnees[i].nom;
                    addr.value = donnees[i].addr;
                    contact.value = donnees[i].contact;
                    mail.value = donnees[i].mail;
                    slogan.value = donnees[i].slogan;
                    valeur.value = donnees[i].id;
                }
            }
        });
        
    }
};

xhr.open('GET', './selected.php', true);
xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
xhr.send();