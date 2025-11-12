
let flagCadastro = 0;
let contador = 0;

// Ao carregar a página, executa o seguinte código
document.addEventListener("DOMContentLoaded", () => {

    // Pega os elementos do DOM necessários
    const section = document.getElementById("conteudo");
    const aproxime = document.getElementById("aproximeCracha");
    const form = document.getElementById('formCadastro');
    const olho = document.getElementById('olho');
    const senha = document.getElementById('senha');

    // Responsável por mostrar/ocultar a senha ao clicar no olho
    olho.addEventListener('click', () => {
        const senhaVisivel = senha.type ==='text';
        senha.type = senhaVisivel ? 'password' : 'text'; // Inverte o tipo de caixa de texto
        
        // Altera o ícone de olho fechado/aberto
        olho.classList.toggle('bi-eye-fill', senhaVisivel);
        olho.classList.toggle('bi-eye-slash-fill', !senhaVisivel);
    });

    // Responsável por monitorar o botão de envio do formulário
    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const formData = new FormData(form);

        try {
            // Chama o arquivo de cadastro que irá processar os dados de cadastro
            const response = await fetch("../templates/cadastro.php", {
            method: "POST",
            body: formData
            });

            const data = await response.json(); 

            // Se der certo o processo feito em cadastro.php
            if(data.ok){
                // Verifica se os elementos existem antes de mexer com eles
                if(section && aproxime){
                    section.style.display = "none"; // Esconde a seção de cadastro
                    aproxime.style.display = "flex"; // Mostra a seção de aproximação do crachá
                    flagCadastro = 1; // Seta a flag para iniciar o monitoramnento do cadastro
                    monitoraCadastro(data.solicitacao_id); // Chama a função que monitora o estado do cadastro
                } else { // Se existir algum problema ao pegar os elementos
                    alert("Erro: não achei os elementos no DOM");
                }
            } else { // Se der erro no processo feito em cadastro.php
                alert("Erro ao cadastrar: " + (data.error || "desconhecido"));
            }

        } catch (err){
            alert("Falha na requisição: " + err);
        }
    });
});


// Função que monitora o estado atual de cadastro, para atualizar o site conforme o status
async function monitoraCadastro(idSolicitacao) {
    if (flagCadastro == 1) {
        try {
            const resp = await fetch(`../APIs/monitoraEstadoCadastro.php?id=${idSolicitacao}`, {method: "GET", cache: "no-store"});
            if (!resp.ok) throw new Error("HTTP " + resp.status);

            const data = await resp.json();

            if (data.ok && contador <= 240) {

                if (data.status_cadastro == 'concluido') {
                    mostrarModalSucesso();
                    setTimeout(() => window.location.href = "login.php", 3000);
                    flagCadastro = 0;

                } else if (data.status_cadastro == 'pendente') {
                    
                    contador++;
                    
                    if (contador == 240){ 

                        const formData = new FormData();
                        formData.append('id_solicitacao', idSolicitacao);
                        formData.append('cracha', ''); 
                        formData.append('flag', '1');

                        try {

                            const response = await fetch("../APIs/atualizaDB.php", {
                            method: "POST",
                            body: formData
                            });

                            const result = await response.json();

                            if (result.ok){
                                alert("Cadastro cancelado por tempo esgotado.");
                            } else {
                                alert("Erro ao cancelar o cadastro por tempo esgotado.");
                            }

                        } catch (err) {
                            console.error("Erro ao enviar flag de timeout:", err);
                        }
                        
                        contador = 0;
                        flagCadastro = 0;
                        window.location.href = "cadastro.php";

                    } else {
                        setTimeout(() => monitoraCadastro(idSolicitacao), 500);
                    }

                } else if (data.status_cadastro == 'erro') {
                    alert("Houve um erro no cadastro. Por favor, tente novamente.");
                    window.location.href = "cadastro.php";
                    
                    flagCadastro = 0;

                }
            }
        } catch (err) {
            console.error("Erro ao se conectar com a API:", err);
            setTimeout(() => monitoraCadastro(idSolicitacao), 1000); 
        }
    }
}


function mostrarModalSucesso() {
  const modal = document.getElementById("modalSucesso");
  modal.style.display = "flex";
}