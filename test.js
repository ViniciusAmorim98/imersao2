
// Função para abrir o modal com base no tipo de ingresso
function openModal(type) {
    // Seleciona o modal
    var modal = document.getElementById('modal');
    // Exibe o modal
    modal.style.display = 'block';
    // Configura o valor do input hidden com o tipo de ingresso
    document.getElementById('tipo_ingresso').value = type;
}

// Função para fechar o modal
function closeModal() {
    // Seleciona o modal
    var modal = document.getElementById('modal');
    // Oculta o modal
    modal.style.display = 'none';
    // Limpa os campos do formulário
    document.getElementById('nome').value = '';
    document.getElementById('whatsapp').value = '';
    document.getElementById('email').value = '';
    // Limpa o valor do input hidden do tipo de ingresso
    document.getElementById('tipo_ingresso').value = '';
}

// Função para enviar o formulário e redirecionar o usuário para a página correta
function submitForm() {
    // Obtém o tipo de ingresso
    var tipoIngresso = document.getElementById('tipo_ingresso').value;
    // Redireciona o usuário para a página correta com base no tipo de ingresso
    if (tipoIngresso === 'vip') {
        window.location.href = 'https://payfast.greenn.com.br/58777'; // Altere 'link_para_pagina_vip.html' para o link da página VIP
    } else if (tipoIngresso === 'premium') {
        window.location.href = 'https://payfast.greenn.com.br/58778'; // Altere 'link_para_pagina_premium.html' para o link da página Premium
    }
    // Você também pode adicionar uma mensagem de sucesso ou algo assim se necessário
}

// Fecha o modal se o usuário clicar fora da área do modal
window.onclick = function (event) {
    var modal = document.getElementById('modal');
    if (event.target == modal) {
        closeModal();
    }
};
