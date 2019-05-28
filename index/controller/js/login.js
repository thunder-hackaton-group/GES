var ID = document.getElementById.bind(document), 
	CLASS = document.getElementsByClassName.bind(document), 
	TAG = document.getElementsByTagName.bind(document);

var content = CLASS('ctnt-prp')[0], ctntStyle = content.style;
	content1 = CLASS('ctnt-1')[0], ctnt1Style = content1.style;
	logo = CLASS('logo')[0], logoStyle = logo.style;
	h1 = TAG('h1')[0], h1Style = h1.style;
	frm = CLASS('frm-ctnt')[0], frmStyle = frm.style;
	content2 = CLASS('ctnt-2')[0], ctnt2Style = content2.style;

window.onload = function(){
	setTimeout(function(){
		ctntStyle.width = '50%';
		ctntStyle.margin = '80px 0 0 25%';
		ctntStyle.opacity = 1;
	},1000);

	setTimeout(function(){
		ctnt1Style.width = '50%';
	},2000);

	setTimeout(function(){
		logoStyle.opacity = 1;
		h1Style.opacity = 1;
		ctnt2Style.opacity = 1;
	},4000);

	setTimeout(function(){
		frmStyle.opacity = 1;
	},4500);
}

function addEvent(element,event,fonction){
	if(element.addEventListener){
 element.addEventListener(event,fonction,false);
	}
	else{
		element.attachEvent("on" + event,fonction)
	}
}

var mail = ID('mail'), label1 = TAG('label')[0];
var pwd = ID('password'), label2 = TAG('label')[1];

addEvent(mail,'mouseover',act1 = function(){
	label1.style.color = 'rgb(250,70,0)';
	mail.style.borderBottom = '1px solid rgb(250,70,0)';
});

addEvent(mail, 'mouseout', function(){
	label1.style.color = 'grey';
	mail.style.borderBottom = '1px solid grey';
});

addEvent(pwd,'mouseover', function(){
	label2.style.color = 'rgb(250,70,0)';
	pwd.style.borderBottom = '1px solid rgb(250,70,0)';
});

addEvent(pwd, 'mouseout', function(){
	label2.style.color = 'grey';
	pwd.style.borderBottom = '1px solid grey';
});