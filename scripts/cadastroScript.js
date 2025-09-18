document.addEventListener("DOMContentLoaded", () => {
    const section = document.getElementById("conteudo");
    const aproxime = document.getElementById("aproximeCracha");
    const form = document.getElementById('formCadastro');

    const olho = document.getElementById('olho');
    const senha = document.getElementById('senha');

    let flagCadastro = 0;

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
            const response = await fetch("cadastro.php", {
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

    async function monitoraCadastro(idSolicitacao) {
        if (flagCadastro == 1) {
            try {
                const resp = await fetch(`../APIs/monitoraEstadoCadastro.php?id=${idSolicitacao}`, {method: "GET", cache: "no-store"});
                if (!resp.ok) throw new Error("HTTP " + resp.status);

                const data = await resp.json();

                if (data.ok) {
                    if (data.status_cadastro === 'concluido') {
                        alert("Cadastro aprovado! Você será redirecionado para a página de login.");
                        window.location.href = "login.php";
                    } else if (data.status_cadastro === 'pendente') {
                        setTimeout(() => monitoraCadastro(idSolicitacao), 500); 
                    } else if (data.status_cadastro === 'erro') {
                        alert("Houve um erro no cadastro. Por favor, tente novamente.");
                        window.location.href = "cadastro.php";
                    }
                }
            } catch (err) {
                console.error("Erro ao monitorar cadastro:", err);
                setTimeout(() => monitoraCadastro(idSolicitacao), 1000); 
            }
        }
    }
});
