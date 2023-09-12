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


