# ProjetoAlbumPrivado
## Projeto de construção de banco de dados com PHP 

### Descrição: 

#### O arquivo cadastro.php recebe os dados fornecidos por um formulário HTML (usuário, senha e foto) e efetua o cadastro do usuário no banco de dados. 
### Caso os dados esperados não cheguem, a mensagem “Você não passou os dados necessários!” é exibida e nada mais é executado.
### Caso os dados esperados cheguem vazios, sem um valor, a mensagem “Os dados informados são inválidos!” é exibida e nada mais é executado.
### O arquivo com a foto do usuário é guardado no servidor na pasta “fotos” que fica dentro da pasta “img”. 
### O usuario, a senha e o nome da foto são registrados na tabela Usuário do banco de dados.
### Depois do usuário ser cadastrado no banco, é inserida ao final do arquivo “log.txt” uma linha com o formato “O {nome do usuário} se cadastrou no sistema”.
### Existe, no projeto, um arquivo chamado “msg.txt” que contém em cada uma de suas linhas uma mensagem de boas vindas.
### Ao final do processo de cadastro, é sorteada uma das mensagens contida neste arquivo e exibida da seguinte forma: “{mensagem sorteada} {nome do usuário}”.
