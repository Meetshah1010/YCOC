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