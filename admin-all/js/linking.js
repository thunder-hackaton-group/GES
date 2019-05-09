var ID = document.getElementById.bind(document);

var link1 = ID('link-1'),
    link2 = ID('link-2'),
    ajout = ID('ajoutP'),
    modify = ID('modifyP');

    function addEvent(element,event,func){
        if(element.addEventListener){
            element.addEventListener(event,func,false);
        }
        else{
            element.attachEvent("on" + event, func);
        }
    }

var clique1 = function(){
    modify.style.display = 'none';
    ajout.style.display = 'block';
    link1.style.borderBottom = '2px solid rgb(110, 27, 110)';
    link2.style.borderBottomColor = 'transparent';
};

var clique2 = function(){
    ajout.style.display = 'none';
    modify.style.display = 'block';
    link2.style.borderBottom = '2px solid rgb(110, 27, 110)';
    link1.style.borderBottomColor = 'transparent';
};

addEvent(link1, 'click', clique1);
addEvent(link2, 'click', clique2);