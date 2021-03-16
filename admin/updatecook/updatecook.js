function varifymob(){
    var mob = document.getElementById("cmob").value;
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