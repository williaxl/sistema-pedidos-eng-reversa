# Sistema de Pedidos - Engenharia Reversa

Projeto desenvolvido para a disciplina de Programação Web I (IFCE - Campus Boa Viagem).

## Objetivo
Evoluir um sistema de pedidos simples para uma arquitetura profissional com backend em PHP, frontend integrado, padrões de projeto e persistência de dados.

---

## Tecnologias
- HTML, CSS, JavaScript
- PHP (API backend)
- Docker
- JSON (persistência)

---

## Arquitetura

O sistema foi estruturado em camadas:

- Models: entidades do sistema (Produto, Pedido, ItemPedido)
- Controllers: controle da API
- Services: regras de negócio (Strategy de desconto)
- Repositories: persistência em JSON
- Frontend: interface HTML + JS (fetch API)

---

## Padrões de Projeto

### Factory
Responsável pela criação de objetos do sistema.

### Singleton
Garante uma única instância do pedido durante a execução.

### Strategy
Responsável pela aplicação de descontos no pedido.

### Repository
Responsável pela persistência dos dados em JSON.

---

## Funcionalidades

- Adicionar produtos ao pedido
- Listar itens do pedido
- Calcular total automaticamente
- Aplicar desconto (Strategy)
- Finalizar pedido
- Persistência em JSON

---

## API

- GET  ?action=listar → lista pedidos
- POST ?action=adicionar → adiciona item
- GET  ?action=finalizar → finaliza pedido

---

## Docker

Executar o sistema:

docker-compose up -d

Acesso:
http://localhost:8000

---

## Estrutura do Projeto

backend/
frontend/
models/
services/
controllers/
repositories/
data/

---

## Observação

Este projeto foi desenvolvido com foco em evolução arquitetural, aplicando conceitos de engenharia de software como separação de responsabilidades, padrões de projeto e organização em camadas.

---

## Autor
Projeto acadêmico - IFCE Boa Viagem

---

## Justificativa Técnica

1. Problemas resolvidos:
- Código monolítico refatorado para arquitetura em camadas
- Remoção de lógica duplicada
- Separação de responsabilidades

2. Melhoria da arquitetura:
- Implementação de backend em PHP
- Separação frontend/backend
- Uso de Repository para persistência

3. Padrões aplicados:
- Factory: criação centralizada de produtos
- Singleton: controle único de pedido
- Strategy: aplicação de descontos
- Repository: persistência de dados

4. Integração frontend/backend:
- Comunicação via fetch API
- Backend exposto via endpoints PHP

5. Dificuldades:
- Limitações do ambiente Termux
- Ajustes de integração entre camadas

6. Papel do Docker:
- Garantir ambiente padronizado e reprodutível
