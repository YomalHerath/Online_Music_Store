// valitadion 
   function register(){

        var pass1 = document.getElementById("pwd").value;
        var pass2 = document.getElementById("cpwd").value;


        // if(pass1==pass2){
        //     // alert("password and confirm password are similer");
        //     Swal.fire('password and confirm password are similer');
        //     return true;
        // }
        if(pass1!=pass2){
            Swal.fire('Passwords do not match');
            // alert("password and confirm password are doesn't match");
            return false;
        }
        
   }