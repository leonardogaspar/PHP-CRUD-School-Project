function calcularMedia(nota1, nota2) {
    return ((parseFloat(nota1) + parseFloat(nota2)) / 2).toFixed(2);
}

function salvarNotas() {
    const notas = [];
    const linhas = document.querySelectorAll("#notas-table tbody tr");

    linhas.forEach(linha => {
        const idAluno = linha.dataset.idAluno;
        const nota1 = parseFloat(linha.querySelector(".nota1").value) || 0;
        const nota2 = parseFloat(linha.querySelector(".nota2").value) || 0;
        const media = calcularMedia(nota1, nota2);
        linha.querySelector(".media").innerText = media;
        notas.push({
            id_aluno: idAluno,
            nota_primeiro_semestre: nota1,
            nota_segundo_semestre: nota2,
            media: media
        });
    });
    
    fetch("/projeto/models/alterarNotas.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ notas })
    })

    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            alert("Notas salvas com sucesso!");
        } else {
            alert("Erro ao salvar notas.");
        }
    })
    
    .catch(error => console.error("Erro:", error));
}

