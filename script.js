const BASE_URL = "https://sistema-pedidos-eng-reversa-1.onrender.com";

async function adicionar() {
  let produto = document.getElementById("produto").value;
  let qtd = document.getElementById("qtd").value;

  if (qtd <= 0 || qtd === "") {
    alert("Quantidade inválida");
    return;
  }

  try {
    await fetch(`${BASE_URL}/backend/api.php?action=adicionar`, {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded"
      },
      body: `produto=${produto}&quantidade=${qtd}`
    });

    atualizarLista();
  } catch (e) {
    console.log("Erro adicionar:", e);
  }
}

async function atualizarLista() {
  try {
    let res = await fetch(`${BASE_URL}/backend/api.php?action=listar`);
    let text = await res.text();
    let data = JSON.parse(text);

    let lista = document.getElementById("lista");
    lista.innerHTML = "";

    let total = 0;

    if (!data.itens) return;

    data.itens.forEach(item => {
      let li = document.createElement("li");
      li.innerHTML =
        item.produto +
        " | Qtd: " +
        item.quantidade +
        " | Subtotal: R$ " +
        item.preco * item.quantidade;

      lista.appendChild(li);
      total += item.preco * item.quantidade;
    });

    document.getElementById("total").innerText = total;

  } catch (e) {
    console.log("Erro listar:", e);
  }
}

function finalizar() {
  alert("Pedido enviado para backend!");
}

// WhatsApp
function enviarWhatsApp() {
  let mensagem = "Pedido:%0A";

  fetch(`${BASE_URL}/backend/api.php?action=listar`)
    .then(res => res.text())
    .then(text => {
      let data = JSON.parse(text);

      data.itens.forEach(item => {
        mensagem += `- ${item.produto} (x${item.quantidade})%0A`;
      });

      mensagem += `%0ATotal: R$ ${data.total}`;

      let numero = "5585999999999";

      window.open(`https://wa.me/${numero}?text=${mensagem}`, "_blank");
    })
    .catch(err => console.log("Erro WhatsApp:", err));
}

window.adicionar = adicionar;
window.finalizar = finalizar;
window.enviarWhatsApp = enviarWhatsApp;
