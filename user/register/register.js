const acc=document.querySelector('#rsignup');
function removedisable(){

    acc.classList.remove('disabled');
}

function varifyMobile()
{   
    var rmob = document.getElementById("rmob").value;
    if(rmob== "")
    {
        window.alert("Please enter the Mobile number");
    }
    if(rmob.length != 10)
    {
        window.alert("Please enter a 10 digit mobile number");
    }
    for(i=0;i<rmob.length;i++)
    {
        digit=rmob.charAt(i);
        if(/[0-9]+/.test(digit)==false) 
        {
            window.alert("Character are not allowed");
            break;
        }
    }
}
function varifyPassword(){
    var rpass = document.getElementById("rpass").value;
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
    var rpass = document.getElementById("rpass").value;
    var repass = document.getElementById("repass").value;
    if(rpass!=repass)
    {
        window.alert("Password dosen't match");
    }
}
function showPassword() {
    var x = document.getElementById("rpass");
      if (x.type === "password") 
        {
          x.type = "text";
        }
        else 
        {
          x.type = "password";
        }
        }
var checkbox = document.querySelector("input[name=iacceptreg]");

var active=document.querySelector('#regform');
checkbox.addEventListener('change', function() {
  if (this.checked) {
    active.setAttribute("action","register.php");
  } else {
    window.alert("Please accept our Terms & Conditions ");
    active.removeAttribute("action");
  }
});


const box=document.querySelector("#passinfo");
function showpassinfo(){
    box.style.display="block";

}

function hidepassbox() {
    box.style.display="none";
}
