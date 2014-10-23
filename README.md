##Sistema de Gerenciamento de Processos UFBA

Trabalho da disciplina MATB09 - Laboratório de Banco de Dados.

Criação de um sistema que visa auxiliar os servidores da UFBA em sua atividade cotidianas.

###Padrão

***1 - Estrutura***

Utilização do modelo MVC - Model, View and Controller (Modelo, Visualização e Controle), com o auxilio de uma camada de acesso ao banco de dado, utilizada para manipulação dos dados entre a aplicação e o banco de dados (DAO, Data Access Object).

Os imports globais estão localizados na classe Base.

***2 - Model***

O modelo são as classes. Adicionadas no repositório model com o modelo de nome padrão class.objeto_que_representa.php, cada objeto tem o seu model ou classe.

***3 - View***

Página que serão visualizadas pelo usuário.

***4 - Controller***

Arquivos que farão a análise dos dados oriundos das View's, onde será feita as validações dos campos e regras de negócios, antes de passar para a camada de persistencia do banco.
