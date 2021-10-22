function AbrirCategoria()
{
  document.getElementById('frmCategoria').submit();
}

function AbrirMenu(base){
  $.post(base +"notifica/m",
 
  function(data){

    $("#menu").html(data)

    });
 

}
$(document).ready(function(){
$("#cep-destino").keypress(function(){
  $(this).mask('00.000-000')

});
});

$(document).ready(function() {
 
  $('#calcular-frete').click(function(){
      var cep = document.getElementById('cep-destino').value;
      var pesofrete = document.getElementById('pesofrete').value;
    
      $.ajax({
        url:'calcularCep/calcular',
        type:'POST',
        data : {cep:cep,pesofrete:pesofrete},
        dataType: "json",
      
      }).done(function(resposta)
      {
        //console.log (resposta.cep);
        document.getElementById('cepcalculo').innerHTML = resposta.cep;
        
      }).fail(function (resposta)
      {
        console.log('ERRO');
      })

  
  });
});

(function () {
  'use strict'


  var forms = document.querySelectorAll('.needs-validation')


  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

function validar()
{
  valid = true;
  if(document.getElementById('txtestoque').value < 0){
    alert("Desculpe a quantidade no estoque não pode ser negativa!");
   
    valid = false;
  }
  return valid;

}
