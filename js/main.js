function WriteAlert (text) 
	{
		var buttone = document.getElementById('MessageRow');
		console.log(buttone);
		var Elem = document.createElement('div');
		Elem.innerHTML =text;
		Elem.className= 'alert alert-error span3';
		Elem.style ='padding-left:10px;';
		console.log(Elem);
		//buttone.parentNode.insertBefore(Elem,buttone);
		buttone.appendChild(Elem);
	};
function WriteSuccess (text) 
	{
		var buttone = document.getElementById('MessageRow');
		console.log(buttone);
		var Elem = document.createElement('div');
		Elem.innerHTML =text;
		Elem.className= 'alert alert-success span3';
		Elem.style ='padding-left:10px;';
		console.log(Elem);
		//buttone.parentNode.insertBefore(Elem,buttone);
		buttone.appendChild(Elem);
	};
function GoOnPageAutorization()
	{
		setTimeout(function(){document.location.href='../autorization/';},1500);
	}