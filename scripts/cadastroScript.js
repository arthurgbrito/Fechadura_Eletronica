
let flagCadastro = 0;

document.addEventListener("DOMContentLoaded", () => {
    const section = document.getElementById("conteudo");
    const aproxime = document.getElementById("aproximeCracha");
    const form = document.getElementById('formCadastro');

    const olho = document.getElementById('olho');
    const senha = document.getElementById('senha');

    olho.addEventListener('click', () => {
        const senhaVisivel = senha.type ==='text';
        senha.type = senhaVisivel ? 'password' : 'text';
        
        olho.classList.toggle('bi-eye-fill', senhaVisivel);
        olho.classList.toggle('bi-eye-slash-fill', !senhaVisivel);
    });

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const formData = new FormData(form);

        try {
            const response = await fetch("../templates/cadastro.php", {
            method: "POST",
            body: formData
            });

            const data = await response.json(); 

            if(data.ok){
                if(section && aproxime){
                    section.style.display = "none";
                    aproxime.style.display = "flex";
                    flagCadastro = 1;
                    monitoraCadastro(data.solicitacao_id);
                } else {
                    alert("Erro: não achei os elementos no DOM");
                }
            } else {
                alert("Erro ao cadastrar: " + (data.error || "desconhecido"));
            }

        } catch (err){
            alert("Falha na requisição: " + err);
        }
    });
});

async function monitoraCadastro(idSolicitacao) {
    if (flagCadastro == 1) {
        try {
            const resp = await fetch(`../APIs/monitoraEstadoCadastro.php?id=${idSolicitacao}`, {method: "GET", cache: "no-store"});
            if (!resp.ok) throw new Error("HTTP " + resp.status);

            const data = await resp.json();

            if (data.ok) {
                console.log(data.status_cadastro)
                if (data.status_cadastro == 'concluido') {
                    mostrarModalSucesso();
                    setTimeout(() => window.location.href = "login.php", 3000);
                    flagCadastro = 0;
                } else if (data.status_cadastro == 'pendente') {
                    setTimeout(() => monitoraCadastro(idSolicitacao), 500); 
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