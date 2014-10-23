function validateEmail(email)
{
   er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
   if(er.exec(email))
       return true;
   else
       return false;
}

$(function(){
    
    var altura_m = $('#pessoa_altura_m');
    var altura_cm = $('#pessoa_altura_cm');
    var peso = $('#pessoa_peso');
    
    $(".telefone").mask("9999-9999");
    $(".cpf").mask("999.999.999-99");
    $(".cep").mask("99999-999");
    $(".data").mask("99/99/9999");
    altura_m.mask("9");
    altura_cm.mask("99");
    peso.mask("999");
    
    $('.numero').keypress(function(event) {
         var tecla = (window.event) ? event.keyCode : event.which;
         if ((tecla > 47 && tecla < 58)) return true;
         else {
             if (tecla != 8) return false;
             else return true;
         }
     });
     
     altura_m.keyup(function(){
         var valor = this.value;
         var mens = $("#msg_pessoa_altura");
         (valor > 2) ? mens.html("máximo permitido 2 metros") : mens.html("");    
     });
 
     peso.keyup(function(){
         var valor = this.value;
         var mens = $("#msg_pessoa_peso");
         (valor > 299) ? mens.html("peso máximo permitido 299 quilogramas") : mens.html("");    
     });
     
     var email = $("#pessoa_email");
     
     email.focus(function(){$("#msg_pessoa_email").html(" ");});
     email.blur(function(){
        var msg = $("#msg_pessoa_email");
        if(!validateEmail(this.value)){
            msg.html("Email inválido.");
        }
        else
        {   
            msg.html(" ");
        }
            
     });
     
     var cadastro = $("#cadastro");
     var content = '<span class="icon-hand-down"></span>';;
     cadastro.prepend(content);    
     var modal = $("#modal");
        
     cadastro.click(function(){
        cadastro.children("span").remove();
        if(!modal.is(":visible")){
            modal.slideDown();
            content = '<span class="icon-hand-up"></span>';
        }else{
            modal.slideUp();
            content = '<span class="icon-hand-down"></span>';
        }
        cadastro.prepend(content);    
     });
     
});

