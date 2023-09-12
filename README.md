# Engenharia de software-2023.2 | Universidade Federal do Tocantins - Palmas, 2022
## Adoteme
### Introdução

O "AdoteMe" é uma plataforma digital inovadora desenvolvida para unir corações e lares, conectando gatos abandonados no campus da Universidade Federal do Tocantins (UFT) a indivíduos e famílias carinhosas que desejam fazer a diferença na vida desses animais. Além de ser uma plataforma intuitiva e interativa ela proporciona um ambiente virtual dedicado à catalogação e adoção de gatos abandonados dentro da universidade. Nossa visão é criar um espaço virtual gratuito onde a solidariedade, compaixão e amor pelos animais possam florescer, ao mesmo tempo em que promovemos a responsabilidade e conscientização sobre a adoção de animais de estimação.
 

### Definindo os requisitos e seus respectivos grupos.

---

#### Iteração 1

- [ ] RF01 - Realizar Login do Usuário. 1.1 [Kalil Garcia Canuto](https://github.com/Kal-il) Revisado por @mariaclaranaires

- [ ] RF02 - Cadastrar Usuário. 1.2 [Ana Flavia Moreira Pires](https://github.com/MatheusDreher) Revisado por @romeuborges19

- [ ] RF03 - Preencher Formulário. 1.3 [Matheus Henrique Dreher dos Santos](https://github.com/MatheusDreher) Revisador por @Kal-il

- [ ] RF04 - Visualizar Animal. 1.4 [Thiago Gonzaga dos Santos](https://github.com/tgofsaints) Revisado por @MatheusDreher

- [ ] RF05 - Visualizar Página Principal. 1.5 [Maria Clara Nazareno Aires](https://github.com/mariaclaranaires) Revisado por @ana-flav

- [ ] RF06 - Visualizar Perfil do Usuário. 1.6 [Romeu Miranda Borges](https://github.com/romeuborges19) Revisado por @tgofsaints

---

## Adoteme
## **RF01 - Realizar Login do Usuário**

#### Autor: @Kal-il - Kalil Garcia Canuto.

---

### Revisor: @mariaclaranaires - Maria Clara Nazareno Aires

| Item            | Descrição                                                                                                                                                                                               |
| --------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Caso de uso     | Login.                                                                                                                                                                                                  |
| Resumo          | Espera-se que quando o usuário entrar em contato com a página de login, ele possa realizar as ações de: Efetuar login na aplicação, ir para a tela de cadastro, caso esteja usando pela primeira vez e ter a opção de ir pra tela de redefinição de senha.                                                          |
| Ator principal  | Usuário utilizador da plataforma e novos usuários.                                                                                                                                                                                                                                                                                                       |
| Pré-condição    | O Usuário deve estar conectado a internet e estar na plataforma para que possam realizar o login internet.                                                                                                                        |
| Pós-condição    | É necessário que, para fazer o login, o usuário tenha sua própria conta.                                                                                                                                  |
### Descrição Sucinta:

"Realiza o login dos usuários na plataforma"

#### Fluxo principal

| Passos   | Descrição                                                                 |
| -------- | ------------------------------------------------------------------------- |
| Passo 1  | Usuário deverá Entrar na página                                                          |
| Passo 2  | Usuário deverá inserir seu email e senha                                  |
| Passo 3  | Usuário deverá clicar no botão 'Entrar'                                   |
| Passo 4  | O sistéma irá verificar se o usuário está cadastrado no banco de dados <br/>  4.1 - Se sim : exibira: logado com sucesso <br/> 4.2 - Se não: exibirá a mensagem: ‘Email ou senha não encontrado, tente novamente’ |
| Passo 5  | O sistema irá verificar o nível de acesso do usuário <br/> 5.1 - Administrador - Usuário é redirecionado para a página de administrador <br/> 5.2 Comum - Usuário é redirecionado para a página inicial de adoção |

### Campos do Formulário:

| Campo  | Obrigatório? | Editável? | Formato        |
| ------ | ------------ | --------- | -------------- |
| e-mail |     Sim      |    Não    |  texto         |
| Senha  |     Sim      |    Sim    |  alfanumérico  |
### Opções dos Usuários:

| Campo                                   | Descrição | 
| --------------------------------------- | ----------- | 
|Login                             | Checa se o usuário está cadastrado no banco de dados        | 
|Cadastrar                                | Redireciona usuário pra tela de cadastro        |
|Redefinir senha                          | Redireciona usuário pra tela de redefinição de senha         | 

 ### Fluxos Alternativos:
 #### Fluxo alternativo 1:

| Passos   | Descrição                                                                 |
| -------- | ------------------------------------------------------------------------- |
| Passo 1  | Entrar na página                                                          |
| Passo 2  | Usuário seleciona a opção 'Cadastrar'                                       |
| Passo 3  | Usuário é redirecinado para a tela de cadastro                            |

#### Fluxo alternativo 2:

| Passos   | Descrição                                                                 |
| -------- | ------------------------------------------------------------------------- |
| Passo 1  | Entrar na página                                                          |
| Passo 2  | Usuário seleciona a opção 'Redefinir senha'                               |
| Passo 3  | Usuário é redirecinado para a tela de redefinição de senha               |


![login (2) (4)](https://github.com/Kal-il/repositorioTeste/assets/106031060/587b59c7-3ce4-41ad-aeef-752618623d82)


## **RF02 - Cadastrar do Usuário**.

#### Autor: @ana-flav- Ana Flavia Moreira Pires.

---

### Revisor: @romeuborges19 - Romeu Miranda Borges.

| Item            | Descrição                                                              |
| --------------- | ---------------------------------------------------------------------- |
| Caso de uso     | Cadastrar do Usuário. |
| Resumo          | Este caso de uso descreve o processo de cadastro de um novo usuário no sistema de adoção de gatos. |
| Ator principal  | Usuário interessado em adotar um gato.                      |
| Ator secundário |                                                                       |
| Pré-condição    | O ator principal deve ter acesso a plataforma. |
| Pós-condição    | O ator principal não deve ter um cadastro no sistema. |



#### Fluxo principal

| Passos  | Descrição                                                                                                            |
| ------- | -------------------------------------------------------------------------------------------------------------------- |
| Passo 1 | O usuário acessa o sistema de adoção de gatos da UFT e é apresentada a tela inicial.        |
| Passo 2 | Na tela de inicial, o usuário encontra um botão com o título “Criar uma conta” e clica nele para ir para a tela de cadastro. |
| Passo 3 | Exibe um formulário de cadastro com campos para o usuário preencher com seus dados. |
| Passo 4 | Após preencher o formulário, clica no botão "Cadastrar".   |
| Passo 5 | O sistema verifica os dados fornecidos pelo usuário.<br/> Se correto, ele é redirecionado para a página inicial.<br/> Se incorreto, irá retornar mensagens de erro no formulário. |





#### Campos do formulário.

| Campo    | Obrigatório? | Editável? | Formato      |
| -------- | ------------ | --------- | ------------ |
| Nome     | Sim          | Sim       | Texto        |
| Email    | Sim          | Sim       | Texto        |
| Senha    | Sim          | Sim       | Alfanumérico        |
| CPF      | Sim          | Sim       | Texto |
| Estado | Sim         | Sim       | Texto        |
| Cidade | Sim         | Sim       | Texto        |
| Endereço | Não          | Sim       | Texto        |
| Contato  | Sim          | Sim       | Numérico     |
| Data de nascimento   | sim          | Sim       | Numérico     |
| Matrícula   | Sim         | Sim       | Numérico     |

#### Opções de usuário

| Opção       | Descrição                 | Atalho |
| ----------- | ------------------------- | ------ |
| Cadastrar no sistema | Verificar os dados preenchidos |

#### Relatório de usuário

| Campo                    | Descrição                                                             | Formato |
| ------------------------ | --------------------------------------------------------------------- | ------- |
| Conta criada com sucesso! | Assegura o usuário do resultado positivo do registro no sistema | Texto   |

#### Fluxo alternativo 

| Passos    | Descrição                                                                                                      |
| --------- | -------------------------------------------------------------------------------------------------------------- |
| Passo 1 | O ator já possui um conta no sistema.                                                                                      |
| Passo 2 | O ator clica no botão "Já tenho um conta. Fazer Login." e ele é redirecionado para tela de Login. |


# User Story
## Persona 01 - Usuário comum


| Epic       | User Story                 | Critério de aceitação |
| ----------- | ------------------------- | ------ | 
| Como um usuário comum, eu gostaria de me cadastrar no sistema para  utilizar suas funcionalidades | Enquanto usuário comum, eu gostaria de me cadastrar no sistema para adotar gatos. | Para se cadastrar no sistema, seus dados não devem estar registrados previamente no banco de dados.

## Protótipo
![Tela de Cadastro](https://uploaddeimagens.com.br/images/004/605/446/original/cadastrar_%282%29.png?1694552172)
