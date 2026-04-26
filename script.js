async function adicionar() {
  let produto = document.getElementById("produto").value;
  let qtd = document.getElementById("qtd").value;

  if (qtd <= 0 || qtd === "") {
    alert("Quantidade inválida");
    return;
  }

  await fetch("backend/api.php?action=adicionar", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    body: `produto=${produto}&quantidade=${qtd}`
  });

  atualizarLista();
}

async function atualizarLista() {
  let res = await fetch("backend/api.php?action=listar");
  let data = await res.json();

  let lista = document.getElementById("lista");
  lista.innerHTML = "";

  let total = 0;

  data.itens.forEach(item => {
    let li = document.createElement("li");
    li.innerHTML = item.produto + " | Qtd: " + item.quantidade + " | Subtotal: R$ " + item.preco * item.quantidade;
    lista.appendChild(li);

    total += item.preco * item.quantidade;
  });

  document.getElementById("total").innerText = total;
}

function finalizar() {
  alert("Pedido enviado para backend!");
}

// Envio do pedido via WhatsApp
function enviarWhatsApp() {
  let mensagem = "Pedido:%0A";

  fetch("backend/api.php?action=listar")
    .then(res => res.json())
    .then(data => {

      data.itens.forEach(item => {
        mensagem += `- ${item.produto} (x${item.quantidade})%0A`;
      });

      mensagem += `%0ATotal: R$ ${data.total}`;

      let numero = "5585999999999"; // trocar pelo número do estabelecimento

      window.open(`https://wa.me/${numero}?text=${mensagem}`, "_blank");
    });
}
