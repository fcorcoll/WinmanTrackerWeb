$(document).ready(function()
{
    $("#login").click(function()
    {
        var email = $("#email").val();
        var password = $("#password").val();
        
        // Comprobando campos vacios
        if( email =='' || password =='')
        {
            $('input[type="text"],input[type="password"]')
                    .css("border","2px solid red");
            $('input[type="text"],input[type="password"]')
                    .css("box-shadow","0 0 3px red");
            alert("Por favor rellene todo los campos...!");
        }
        else 
        {
            $.post("http://localhost/ProyectoWinmanWeb/public_html/login.php",
            { 
                email:email, password:password
                
            },function(data) 
            {
                //alert(data);
                //Un "message box" redundante".                
               
                if(data=='ERROR, loguin incorrecto\r\n')
                {
                    var errormesage = "La contrasenya o el email son incorrectos";
                    
                    alert(data + errormesage);
                } 
                else if(data=='Sesion iniciada correctamente\r\n')
                {
                    //al final la ruta relativa sería "usuario.php"
                    var urlUsuario = "usuario.php";
                                        
                    alert(data);
                    
                    //La nueva página web a la que se redireccionará
                    //Será un PHP con una quest de usuario.
                    $(location).attr('href', urlUsuario);
                    
                } 
                else
                {
                    alert("Fatal Error: " + data);
                }
            });
        }
    });
});
