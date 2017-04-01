var but=document.getElementById("butn");
    but.onclick=function()
    {
    	var user=document.getElementById("username");
    	if(user.value=="")
    	{
    		alert("yourname is inaviable");
    	}
    };
    var butm=document.getElementById("butm");
    butm.onclick=function()
    {
    	var password=document.getElementById("password");
    	if(password.value=="")
    	{
    		alert("your password is illegel");
    	}
    	else
    	{
    	document.getElementById("div2").setAttribute("hidden", "ture");
    	}
    };