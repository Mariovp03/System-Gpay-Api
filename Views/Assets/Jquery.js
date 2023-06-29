$(document).ready(function() {
    $(".edit-task").click(function() {
      var buttonId = $(this).attr("id"); // Obter o ID do botão clicado
      console.log(buttonId);
      $.ajax({
        url: "http://localhost/Estudando/System-Gpay-Api/edit-api",
        type: "POST",
        data: { id: buttonId },
        success: function(response) {
          // Lógica adicional para manipular a resposta do servidor, se necessário
        },
        error: function(xhr, status, error) {
          console.error("Ocorreu um erro durante a solicitação AJAX: " + error);
        }
      });
    });
  });

// Quando clicar em editar
// Pegar o id do item que estou editando
// Após pegar o id
// enviar via post 
// e alterar

// ---------------------------------------------

// Fazer um foreach assim como tem na view
// mas pegando o id e encaixando na url
