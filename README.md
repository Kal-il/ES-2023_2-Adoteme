# Engenharia de software-2023.2 | Universidade Federal do Tocantins - Palmas, 2023
## Adoteme
#### Curso: Bacharelado em Ciência da Computação
#### Professor: Edeilson Milhomem da Silva.
#### Monitor: João Gabriel Alves de Souza.
#### Time: Romeu Miranda Borges, Ana Flavia Moreira Pires, Kalil Garcia Canuto, Matheus Henrique Dreher dos Santos, Maria Clara Nazareno Aires, Thiago Gonzaga dos Santos.
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

#### Revisor: @mariaclaranaires - Maria Clara Nazareno Aires

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

<br/>

### Relatório de usuário

| Campo | Descrição | Formato |
| ----- | --------- | ------- |
| 'Logado com sucesso!' | Assegura o usuárido de que ele conseguiu realizar login | Texto   |
| ‘Email ou senha não encontrado, tente novamente’ | Mostra pro usuário que algo está errado | Texto   |
<br/>
 ### Fluxos Alternativos:
 #### Fluxo alternativo 1:

| Passos   | Descrição                                                                 |
| -------- | ------------------------------------------------------------------------- |
| Passo 1  | Entrar na página                                                          |
| Passo 2  | Usuário seleciona a opção 'Cadastrar'                                       |
| Passo 3  | Usuário é redirecinado para a tela de cadastro                            |
<br/>
#### Fluxo alternativo 2:

| Passos   | Descrição                                                                 |
| -------- | ------------------------------------------------------------------------- |
| Passo 1  | Entrar na página                                                          |
| Passo 2  | Usuário seleciona a opção 'Redefinir senha'                               |
| Passo 3  | Usuário é redirecinado para a tela de redefinição de senha                |
<br/>

# User Story

### Persona 01 - Usuário comum

|     Epic     |     User Story     | Critério de aceitação |
|--------------| ------------------ | --------------------- |
|  Como usuário comum gostaria de realizar autenticação de Usuário  | Enquanto usuário comum do site, gostaria de poder acessar minha conta através de uma página de login para poder ultilizar as funcionalidades do sistéma.  |  Para realizar login no sistéma o usuário deve ter seus dados cadastrados no banco de dados, e deve saber o e-mail e senha informados durante o cadastro |
<br/>

## Protótipo
![login (2) (4)](https://uploaddeimagens.com.br/images/004/612/287/original/adotemelogin.PNG?1695073457)


## **RF02 - Cadastrar do Usuário**.

#### Autor: @ana-flav- Ana Flavia Moreira Pires.

---

#### Revisor: @romeuborges19 - Romeu Miranda Borges.

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


## Adoteme
## **RF03 - Preencher formulário de adoção**

#### Autor: @MatheusDreher - Matheus Henrique Dreher dos Santos.

---

#### Revisor: @Kal-il - Kalil Garcia Canuto.

| Item            | Descrição                                                                                                                                                                                               |
| --------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Caso de uso     | Preencher formulário.                                                                                                                                                                                                  |
| Resumo          | Este requisito descreve o processo pelo qual um adotante pode preencher um formulário de adoção para expressar interesse em adotar um gato disponível no site.                                                          |
| Ator principal  | Usuário adotante.                                                                                                           |
| Pré-condição    | O adotante deve estar registrado no site e autenticado.                                                                                                                     |
| Pós-condição    | O formulário de adoção é preenchido e submetido.                                                                                                                                  |
### Descrição Sucinta:

"O usuário preenche o formulário de adoção"

#### Fluxo principal

| Passos   | Descrição                                                                 |
| -------- | ------------------------------------------------------------------------- |
| Passo 1  | O sistema exibe o formulário de adoção contendo os campos necessários para preenchimento                                                          |
| Passo 2  | O adotante preenche os campos obrigatórios do formulário.                                  |
| Passo 3  | O adotante tem a opção de fornecer um comentário adicional (opcional).                                   |
| Passo 4  | O adotante clica no botão de envio. |
| Passo 5  | O sistema valida os dados do formulário. |
| Passo 6  | Se houver erros de validação, o sistema exibe mensagens de erro ao lado dos campos afetados. |
| Passo 7  | Se não houver erros de validação, o sistema registra os dados no banco de dados. |
| Passo 8  | O sistema exibe uma mensagem de confirmação indicando que a solicitação de adoção foi recebida. |
| Passo 9  | O sistema envia um e-mail de confirmação para o adotante com um resumo da solicitação de adoção e informações de contato.
 |


### Campos da aba Formulário:

| Campo  | Obrigatório?  | Formato        |
| ------ | ------------  | -------------- |
| Nome completo |     Sim      |  texto         |
| E-mail  |     Sim        |  texto |
| Telefone |     Sim        |  numérico         |
| Endereço  |     Sim        |  texto |
| Idade |     Sim          |  numérico         |
| Estado civil  |     Sim        |  texto |
| Tipo de moradia |     Sim       |  texto         |
| Sua moradia tem a segurança necessária?  |     Sim       |  texto |
| Qual a sua renda?  |     Sim       |  texto |
| Possui outros animais?  |     Sim        |  texto |
| Caso sim, quantos e quais tipos? |     Sim        |  texto   |
| Já teve experiência com gatos?  |     Sim       |  texto |
| Motivação para adotar um gato |     Sim       |  texto      |
| Comentário adicional  |     Não       |  texto |
### Opções dos Usuários:

| Campo                                   | Descrição | 
| --------------------------------------- | ----------- | 
|Enviar formulário                             | Envia o formulário para o banco de dados   | 


 ### Fluxos Alternativos:
 #### Fluxo alternativo 1:

| Passos   | Descrição                                                                 |
| -------- | ------------------------------------------------------------------------- |
| Passo 1  | No passo 8, se houver erros de validação, o sistema exibe mensagens de erro ao lado dos campos afetados e retorna ao passo 4 para correção.|

# User Story
## Persona 01 - Usuário comum


| Epic       | User Story                 | Critério de aceitação |
| ----------- | ------------------------- | ------ | 
| Como usuário comum do site e possível adotante, gostaria de preencher o formulário de adoção. | Enquanto usuário comum, eu gostaria de preencher o formulário para adotar um gato. | Para adotar um gato, seu formulário precisa ser lido e julgado passível para adoção.

<br/>

## Protótipo
![formulario](https://uploaddeimagens.com.br/images/004/605/447/original/formulario.png?1694552460)

# RF04 - Visualizar Animal
#### Autor: @tgofsaints - Thiago Gonzaga dos Santos.

---

#### Revisor: @MatheusDreher - Matheus Henrique Dreher dos Santos.

## Atores:

**Usuário Registrado** - Qualquer usuário que tenha criado uma conta no site para visualizar os animais disponíveis para adoção.

**Usuário Anônimo** - Qualquer usuário que esteja utilizando o site sem ter uma conta criada ou que não esteja logado.

### Descrição Sucinta:

Exibe informações detalhadas sobre gatos disponíveis para adoção no site. Os gatos são exibidos com fotos e descrições para ajudar os interessados a tomar uma decisão informada sobre a adoção.

### Pré-Condição:

Os atores devem ter selecionado um animal para visualizar suas informações.

### Fluxo Principal:

| Passos | Descrição | 
| :--------: | -------- | 
| Passo 1 &nbsp;|  O ator ao acessar a tela de listagem de todos os animais disponíveis para adoção seleciona um dos animais para visualizar.    | 
| Passo 2 &nbsp;| O sistema verifica se o animal existe no banco de dados: <br/> 2.1 - se sim, o sistema vai para o passo 3. <br/> 2.2 - Senão o sistema exibe a mensagem "Erro ao exibir o animal selecionado, verifique se o animal ainda está disponível para adoção e tente novamente".     | 
| Passo 3 &nbsp;| O sistema verifica se o ator possui cadastro no banco de dados e o seu nível de permissões e:<br/> 3.1 -  Se sim, o sistema exibe o botão com a mensagem "Tenho Interesse!" e vai para o passo 4. <br/> 3.2 - Senão, o sistema exibe o botão com a mensagem "Entrar".  | 
| Passo 4    &nbsp;| O sistema apresenta a caixa de confirmação se o ator se encaixa no perfil do animal selecionado.     |   

### Opções dos Usuários:

| Opção | Descrição | Atalho |
| --- | --- | --- |
| Tenho Interesse! | Exibe ao ator a solicitação de confirmação se o ator se encaixa no perfil do animal selecionado |  |
| Entrar| Redireciona o ator à página de login | |


### Fluxo Alternativo:

**FA01 -** Botão de entrar:

| Passos  | Descrição | 
| :--------: | -------- | 
| Passo 1  &nbsp;|  O ator ao acessar a tela de listagem de todos os animais disponíveis para adoção seleciona um dos animais para visualizar.   | 
| Passo 2 &nbsp;| O sistema verifica se o animal existe no banco de dados: <br/> 2.1 - se sim, o sistema vai para o passo 3. <br/> 2.2 - Senão o sistema exibe a mensagem "Erro ao exibir o animal selecionado, verifique se o animal ainda está disponível para adoção e tente novamente".     | 
| Passo 3 &nbsp;|O sistema verifica se o ator possui cadastro no banco de dados e o seu nível de permissões e o ator que ainda não autenticou-se no sistema seleciona a opção de entrar;  | 
| Passo 4    &nbsp;| O sistema exibe na tela o formulário de login.   | 

# User Story

### Persona 01 - Usuário comum

| User Story | Critério de aceitação |
| --------- | --------------------- |
| Como usuário comum interessado em adotar um gato eu quero ser capaz de visualizar informações detalhadas sobre gatos disponíveis para adoção no site para que eu possa tomar uma decisão informada sobre a adoção.| Selecionar um dos animais disponíveis para adoção

<br/>

## Protótipo

![Protótipo de tela de visualização do animal selecionado](https://uploaddeimagens.com.br/images/004/605/444/full/adoteme.png?1694552147)


## **RF05 - Visualizar página principal**

#### Autor: @mariaclaranaires - Maria Clara Nazareno Aires

---

#### Revisor: @ana-flav - Ana Flávia Moreira Pires

Item           | Descrição
---------------|----------
Caso de uso    | Visualizar página principal.|
Resumo           | É esperado que, ao pesquisar pelo site e entrar nele, clicar na logo do site exibida no topo do site ou fazer login, o usuário se depare com a página principal, que dará a ele a possibilidade de ter uma visão sobre uma parte do catálogo de animais disponíveis para adoção, botões que o redirecionem para as redes sociais oficiais do projeto, botão para fazer login ou ver a própria conta, barra de busca de animais por nome, busca por categoria (menu) e também permitirá que a página individual de cada animal do catálogo seja acessada.|
Ator principal | Usuário utilizador da plataforma.|
Ator secundário| Não possui.|
Pré-condição   | É necessário que o usuário tenha um browser, busque o site ou esteja dentro dele, e que tenha acesso à internet.|
Pós-condição   | Ter acesso ao site.|



#### Fluxo principal

Passos  | Descrição
--------|----------
Passo 1 | Buscar o site em seu browser.|
Passo 2 | Clicar em cima do nome do site após a busca.|


#### Campos da página principal

Campo                                | Obrigatório | Editável | Formato
-------------------------------------|-------------|----------|--------|


#### Opções de usuário

Opção                                  | Descrição   | Atalho
---------------------------------------|-------------|-------
Acessar redes sociais                  | Ao clicar num dos botões referentes às redes sociais, o usuário deverárá ser redirecionado para o perfil do site na respectiva rede social.		  				 | 
Visualizar catálogo                    | Estando na página principal, o usuário deverárá ser capaz de visualizar o catálogo de animais. |
Fazer login ou acessar a própria conta | Ao clicar no botão com símbolo de usuário, o usuário deverá ser redirecionado para a página de login caso não esteja dentro de alguma conta, ou para a página da sua própria conta. |
Barra de busca de animais	       | Ao clicar na barra de busca de animais o usuário deverá ser capaz de buscar os animais que correspondam à sua busca. |
Visualizar animal		       | Ao clicar em cima de um animal o usuário deverá conseguir visualizar a página referente àquele animal em específico. |
Botão de menu	       | Ao clicar no botão de menu o usuário poderá selecionar a categoria de animais que se deseja buscar. |

#### Relatório de usuário


Campo | Descrição | Formato
------|-----------|--------

#### Fluxo alternativo 

Passos      | Descrição
------------|----------
Passo 1.1.1 | Caso o usuário já esteja dentro do site, para voltar para a página principal ele deverá clicar em cima da logo exibida no topo do site.
Passo 2.1.2 | Caso o usuário tenha efetuado seu login, ele deverá ser redirecionado para a página principal.
Passo 1.1.3 | Caso o usuário faça o logout, ele deverá ser redirecionado para a página principal.


# User Story
## Persona 01 - Usuário comum


Epic                                |User Story| Critério de aceitação
-----------------------|----------|----------------------
Como um usuário comum, eu gostaria de acessar a página principal para ter uma visão geral do site. | Enquanto usuário comum, eu gostaria de ser capaz de visualizar uma página principal que me permita acessar as diversas funcionalidades do site.| Certifique-se de que o usuário seja capaz de **buscar o site ou ser redirecionado para a página principal.**
<br/>

## Protótipo
![Página principal](https://uploaddeimagens.com.br/images/004/605/591/original/p%C3%A1gina_principal_-_AdoteMe.png?1694564418)


## **RF06 - Visualizar Perfil do Usuário**

#### **Autor:** @romeuborges19 - Romeu Miranda Borges\
---

#### **Revisor:** @tgofsaints - Thiago Gonzaga dos Santos

| **Item**            | **Descrição**                                                                                                          |
| --------------- | -------------------------------------------------------------------------------------------------------------------------- |
| **Caso de Uso**     | Visualizar o perfil do usuário                                                                                             |
| **Resumo**          | O usuário deve ser capaz de visualizar seu próprio perfil para editá-lo e acompanhar as ofertas de adoção que o interessam. |
| **Ator Principal**  | Usuário utilizador da plataforma                                                                                           |
| **Pré-condição**    | O usuário deve estar acessando a plataforma e autenticado no sistema.                                                                               |
| **Pós-condição**    | É necessário que o usuário esteja cadastrado.                     |                                                                                                                        

#### **Fluxo Principal**

| Passo | Descrição |
| --------| --- |
| **Passo 1** | Entrar na página principal. |
| **Passo 2** | Clicar no seu perfil pelo botão disponível na página principal. |
| **Passo 3** | Visualizar o perfil. |

#### **Opções do Usuário**

| Opção | Descrição |
| - | - |
| **Editar informações do perfil** | O usuário pode clicar em um botão que o levará para uma tela de edição de perfil. |
| **Acessar interesses do usuário** | É possível acessar as postagens dos animais pelos quais o dono do perfil se interessa |

---

## User Story

#### Persona 1 - Usuário comum

| User Story | Critério de Aceitação |
| ---------- | --------------------- |
| Enquanto usuário comum, eu preciso visualizar o meu perfil e ter acesso às ofertas de adoção que me interessam, para poder acompanhá-las. Além disso, preciso ser capaz de editar as informações do meu perfil. | Para visualizar o próprio perfil, certifique-se de que o usuário está cadastrado e logado na plataforma. |
<br/>

## Protótipo

![](https://uploaddeimagens.com.br/images/004/605/683/original/MacBook_Air_-_1_%281%29.png?1694569982)
