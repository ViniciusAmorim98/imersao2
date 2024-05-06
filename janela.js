// Função para abrir o modal e definir o tipo de ingresso
function openModal(tipo) {
    var modal = document.getElementById('modal');
    modal.style.display = "block";
    document.getElementById('tipo_ingresso').value = tipo; // Define o tipo de ingresso no campo oculto do formulário

    // Adicione código aqui para ajustar o conteúdo do modal com base no tipo de ingresso clicado, se necessário
}

// Fechar o modal quando o usuário clicar fora dele
window.onclick = function (event) {
    var modal = document.getElementById('modal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
