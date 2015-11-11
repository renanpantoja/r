#r
Eu sou um cara muito esquecido, então decidir criar um sistema
para me lembrar oque eu tenho que fazer no dia, na atual versão
do sistema o Cron só culsulta o arquivo de uma em uma hora todo
dia, então você será lembrado da tarefa todo dia na hora que
escolheu, depois de concluir ela pode remover efetuando o login.

##Versão
- 0

## Frontend
- Bootstrap 3.3.5

## Backend
- PHP 5.5
- POO
- PDO

## Arquitetura

MVC (modelo próprio)

##Outros

- Primeiro deve ter a versão 5.5 do PHP ou então o sistema não
vai reconhcer algumas funções nativas como 'password_verify'.

- Coloque os arquivos no diretório www e importe o arquivo banco.sql
para sua base de dados, assim vamos carregar os dados default.

- Altere os dados do arquivos src/Config com os dados do seu servidor
e banco. Também deve alterar esses dados no arquivo cron.php que se
encontra na pasta raiz e tem uma cópia da classe Config, vamos ver o
porque disso. De permissão 777 para esse arquivo 'cron.php'.

- Cron: o cron é um serviço que toda a hospedagem tem para fazer 
arquivos executarem em determinado momento, esse arquivo vai
consultar o bd atrás de alguma tarefa para realizar com o cron
executando o arquivo de hora em hora. Atenção, é por esse motivo
que temos uma repetição da classe Config nesse arquivo, oute 
teriamos que ativar o cron para o arquivo src/Config.php também
e como esse servido é cobrado a parte em alguma hospedagens vamos
ficar com esse modelo por enquanto. Configure o cron para executar
esse arquivo de hora em hora 'cron.php'.

##Como Usar

ao acessar a pasta raiz do r ele te manda para uma página inicial
onde tem uma breve descrição do programa, clicando em login efetue
o login default com login: admin senha: 000000. depois crie um novo
usuário para você. Na próxima versão vou incluir um CRUD de usuários.
Clicando em nova tarefa pode programar novas tarefas e utilizando os
numeros de 00 a 24 pode programar o horário que ele vai te avisar.
Tenha certeza que o horário do seu servidor está certo, se não a
notificação não vai chegar na hora.

###Leia antes de usar...
Essa é a versão 0 do r então aguardem melhoras em breve

## Demo
[Teste online](http://squad.net.br/r)

##Licença
[MIT Licence](https://github.com/renanpantoja/r/blob/master/LICENSE) © Renan Pantoja Vilas

