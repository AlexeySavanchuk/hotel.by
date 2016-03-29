function function_name () {
	var pictures =document.body.getElementsByTagName("img");
	for (var i = pictures.length - 1; i >= 0; i--)
	{
		console.log(pictures.length);
		var image = pictures[i];
		if (image.alt) 
			{
				//var text = document.createTextNode(image.alt);
				var text = document.createElement("span");
				text.style.color ="Blue";
				text.innerHTML = image.alt;
				text.id = "itter"+(i);
				console.log(text);
				console.log(text.id);
				image.parentNode.replaceChild(text,image);				
			};
	};
	var el = document.getElementById("itter0");
	var span2 = el.cloneNode(true);
	span2.id +="new";
	span2.innerHTML =" Романовна";
	el.parentNode.insertBefore(span2,el.nextSibling);
	el =document.getElementById("itter1");
	var span3=el.cloneNode(true);
	span3.id +="new2";
	span3.innerHTML = " Сергеевна";
	el.parentNode.insertBefore(span3,el.nextSibling);
 } 
function CheckAge () 
{
	var age = prompt("Сколько вам лет","20");
	var sayHi;
	if (age>=18) 
		{
			sayHi =function  () { alert("Прошу вас")};
			console.log("прошу");
		}
	else
		{
			sayHi = function () {alert("До 18 нельзя")};
			console.log("нельзя");
		}
	sayHi();
}
