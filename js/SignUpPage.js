function validate()
{
    var username=document.getElementById("username").value;
    var password=document.getElementById("password").value;
    if(username=="admin@gmail.com" && password="user")
    {
        
        alert("Login success");
        return false;
    }
    else
    {
        alert("Login Failed");
    }
}