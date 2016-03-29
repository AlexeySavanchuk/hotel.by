function SumTo (n)
{//1:5 =15
	if (n!=1)
	{
		return n+SumTo(n-1);
	}
	else
	{
		return n;
	}
}
function fact (n) 
{
	if (n!=1)
	{
		return n*fact(n-1);
	}
	else
	{
		return n;
	}	
}
function fib (n) 
{
	if (n>1)
	{
		return fib(n-1)+fib(n-2);
	}
	else
	{
		return n;
	}	
}