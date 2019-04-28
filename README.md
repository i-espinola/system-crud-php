
# Koper - Front end test

## Requisitos

### Controle de venda de unidades

#### O sistema deve poder realizar as seguintes funcionalidades

- [ ] Cadastrar / Editar / Excluir um cliente
- [ ] Cadastrar / Editar / Excluir um  empreendimento
- [ ] Cadastrar / Editar / Excluir um bloco
- [ ] Cadastrar / Editar / Excluir um andar
- [ ] Cadastrar / Editar / Excluir uma unidade
- [ ] Cadastrar / Editar / Excluir / Cancelar uma reserva
- [ ] Cadastrar / Editar / Excluir / Cancelar uma proposta
- [ ] Cadastrar / Editar / Excluir / Cancelar uma venda
- [ ] Listar empreendimentos
- [ ] Listar unidades de um empreendimento organizadas por bloco/andar se existirem
- [ ] Lista de Reservas
- [ ] Lista de propostas
- [ ] Lista de vendas
- [ ] Regra de unidades
- [ ] Alterar status de unidade
- [ ] Empreendimento => Pode possuir blocos e/ ou unidades
- [ ] Blocos => Pode possuir andares e/ou unidades
- [ ] Andares/Pavimentos => Pode possuir unidades

Somente as unidades podem sofrer ações de reserva/proposta/venda.

Uma unidade pode ter os seguintes status => Disponível / indisponível / reservada / Vendida
Disponível => Pode ser reservada/vendida ou tornar indisponível para venda
Indisponível =>  Somente é possível torna-la Disponível
Reservada => Gerar proposta ou cancelar reserva, cancelar proposta, gerar venda
Vendida => Pode ser cancelada a venda retornando a unidade para Disponível

### Dados de cadastro

empreendimento => Nome, data de inicio, data de conclusão,  tipo de empreedimento ( comercial / residencial / comercial e residencial / loteamento ), endereço, area total
bloco => Nome
Andar/Pavimento => Nome, posição ( 1, 2, 3... )
Unidade => Nome, status, area privativa, area comum, vendável, valor, valor mínimo de venda

#### Obs, a soma das areas não pode ser maior que a area total do empreendimento

Dados Cliente => Nome, cpf, data nascimento, endereço e renda

### Regras reservas

Ao cadastrar uma nova reserva é necessário ter um cliente para a reserva, data de reserva, uma ou mais unidade para reservar. Nesse momento o sistema deve apresentar o valor de cada unidade e o valor total da reserva
A edição da reserva, pode ser alterado a(s) unidade(s) da mesma.
Se a proposta foi gerada, não pode permitir a edição da reserva
Cancelamento de uma reserva o sistema deve liberar as unidades para disponível e colocar a data de cancelamento
A exclusão da reserva apenas torna a(s) unidade(s) disponíveis.

### Regras Proposta

Ao gerar uma proposta a partir de uma reserva, é necessário ter na proposta, a reserva vinculada, cliente e unidades, data da proposta, e formas de pagamento. Nesse momento também deve ser possível alterar uma unidade por outra disponível.
Exclusão da proposta, deve se verificar se deseja deixar a reserva ativa ou liberar as unidades.
Rejeição da proposta, deve ser possível rejeitar uma proposta, optando por deixar a reserva ativa, deve ter a data de rejeição e motivo.
Aprovação da proposta deve possuir a data de aprovação e liberar a proposta para realizar uma venda.
A Edição só pode ser realizada se a proposta não foi analisada., na edição posso alterar as unidades e a forma de pagamento.
Exclusão só pode ser realizada se a proposta estiver em análise.

### Regras Vendas

Ao realizar uma venda é necessário ter um cliente, data de venda, uma ou mais unidades para vender. Nesse momento o sistema deve apresentar o valor de cada unidade e o valor total da venda e as formas de pagamento.
A edição da venda, pode  somente alterar a(s) unidade(s) da mesma e a forma de pagamento.
Cancelamento da venda o sistema deve liberar a(s) unidade(s) para disponível, permitir colocar a data de cancelamento e motivo
Ao excluir uma venda apenas torna a(s) unidade(s) para disponível, somente é possível excluir uma venda direta, ou seja, sem ela ter uma reserva/proposta
Uma venda deve respeitar o critério de valor mínimo da unidade.

Cada cliente pode ter no máximo duas reservas/propostas ativas.

Tendo em consideração que podemos ter vários empreendimentos com muitas unidades de venda é importante o sistema realizar a apresentação de dados de análise para o usuário, tais como, total de venda, total de reserva, total de cancelamento, total de unidades disponíveis/indisponíveis  no período (valor e quantidade), no geral e por empreendimento específico.( o que mais achar interessante de informação)

#### Code

    // instruction
    command

#### Tree structure

    project.init/
    ├── gulpfile.babel.js
    ├── LICENSE
    ├── package.json
    ├── package-lock.json
    ├── public
    │   ├── assets
    │   │   └── js
    │   │       └── main.min.js
    │   └── index.html
    ├── README.md
    └── src
        ├── assets
        │   ├── fonts
        │   ├── icon
        │   ├── img
        │   ├── js
        │   │   └── main.js
        │   └── scss
        └── views
            └── index.html

#### IMG

[Correct link syntax](http://www.example.com/)

    * Item 1
    + Item 2
    - Item 3

    * Item 1
    + Item 2
        - Item 3
    + Item 4
    * Item 4
    + Item 5
