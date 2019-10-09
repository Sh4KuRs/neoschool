$("#aluno").validate({
       rules : {
             inputNome:{
                    required:true,
                    minlength:3
             },
             email:{
                    required:true
             },
             mensagem:{
                    required:true
             }                                 
       },
       messages:{
             inputNome:{
                    required:"Por favor, informe seu nome",
                    minlength:"O nome deve ter pelo menos 3 caracteres"
             },
             email:{
                    required:"É necessário informar um email"
             },
             mensagem:{
                    required:"A mensagem não pode ficar em branco"
             }      
       },
       highlight: function(element){
        $(element).closest('.validate').addClass('has-error');
        },
        success: function(element) {
            $(element).closest('.validate').removeClass('has-error');
            $(element).remove();
        }
});

