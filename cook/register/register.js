function varifymob(){
    var mob = document.getElementById("crmob").value;
    if(mob.length != 10)
    {
        window.alert("Please enter a 10 digit mobile numbber");
    }
    for(i=0;i<mob.length;i++)
    {
        digit = mob.charAt(i);
        if(/[0-9]+/.test(digit)==false)
        {
            window.alert("Only digit allowed");
            break;
        }
    }
}
function varifyPassword(){
    var rpass = document.getElementById("crpass").value;
    var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
    if(rpass.match(passw)) 
    { 
        return true;
    }
    else
    { 
        window.alert("Wrong...!");
        return false;
    }
}
function varifyPasswordmatching(){
    var rpass = document.getElementById("crpass").value;
    var repass = document.getElementById("crepass").value;
    if(rpass!=repass)
    {
        window.alert("Password and Re-type password dosen't match");
    }
}
function showPassword() {
    var x = document.getElementById("crpass");
      if (x.type === "password") 
        {
          x.type = "text";
        }
        else 
        {
          x.type = "password";
        }
        }