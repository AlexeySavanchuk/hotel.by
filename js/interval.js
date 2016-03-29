var isWorked = false;
var count =0;
var timeoutId;
function timer_on () 
{
	timeoutId= setInterval(timer_go,500);
}
function timer_go()
{
	count++;
	writeLabel(count);
}
function timer_off ()
{
	clearInterval(timeoutId);
}
function btn_click () 
{
	if (!isWorked)
	{
		timer_on();
		writeButton("Остановить");
	}
	else
	{
		timer_off();
		writeButton("Запустить");
	}
	isWorked=!isWorked;
}
function writeButton(text)
{
	var lab=document.getElementById("btn_start-stop").innerHTML =text;
}
function writeLabel (text)
{
	document.getElementById("texttimer").innerHTML =text;
}