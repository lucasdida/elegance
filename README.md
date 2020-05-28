# Elegance
Site em desenvolvimento da loja Elegance

# Descrição
Site em desenvolvimento de uma loja de roupas, calçados e acessórios chamada Elegance. O site possui as seguintes funções:
- Home Page: Banner da loja + Carrossel de produtos cadastrados como novidade;
- Sobre: Um pouco sobre a loja Elegance;
- Vitrine: Apresenta todos os produtos ja cadastrados, funções de filtro estão em desenvolvimento;
- Visite-nos: Apresenta o local da loja através de uma mapa do google;
- Sistema/Cadastro de produtos: Cadastra os produtos desejados com diversas especificações (nome, preço, tipo, gênero, tamanho e imagem);
- Sistema/Cadastro de banner: Ainda não desenvolvido, terá como função alterar o banner da pagina principal do site.

# Pré-Requisitos
- PHP + MySQL (Aconselho a baixar o XAMPP que ja vem com os dois inclusos);
- Composer (https://getcomposer.org/download/);
- Algum navegador Web (de preferência o Google Chrome).

# Execução
- Depois de baixar o PHP + MySQL (Aconselhavel baixar o Xampp que já baixa os dois juntos) e instalar é aconselhavel adicionar o php como variavel de ambiente. Caso o uso seja no sistema operacional Windows basta ir em propriedades em "Meu Computador", selecionar a opção variaveis de ambiente, na parte de variaveis de sistema selecionar o campo "path" e editar, colocar no final do conteudo o caminho da pasta php, no meu caso com utilizo o xampp basta adicinar: C:\xampp\php e confirmar a alteração.
- Para a instalação do Composer caso utilize o Windows é aconselhavel baixar o .exe e executa-lo pois além de fazer a instalação do composer em si de uma forma fácil e rápida também já iria adicionar o composer como varável de ambiente.
- Entrar na pasta do projeto elegance, abrir o prompt de comando (cmd) e utilizar o seguintes comandos:
    - **composer install** - Instala das dependências do composer no projeto;
    - **copy .env.example .env** - Copia o arquivo .env.example da pasta do projeto com um novo nome .env;
    - **php artisan key:generate** - Gera a Chave para o novo arquivo .env;
- **Banco de Dados:** Deve-se criar o banco em sua base dados e alterar o arquivo .env no campo de Database o nome do banco de dados criado, é importante também deixar configurado as opções como username e password da base de dados;
- No prompt de comando (cmd) novamente, inserir os comandos:
    - **php artisan migrate** - Irá criar todas as tabelas no banco de dados criado anteriormente;
    - **php artisan db:seed** - Irá adicionar o conteúdo de determinadas tabelas para que a funcionalidade delas no site/sistema não sejam prejudicadas;
- Depois de todas essas etapas com o banco de dados criado, tabelas criadas e algumas delas ja preenchidas automaticamente através do comando seed utilizar o comando **php artisan serve** no prompt de comando. Irá fazer com que os arquivos sejam compilados e executados e você poderá acessá-los através do navegador com o endereço: http://127.0.0.1:8000/ (Lembrando que para o uso da parte do sistema é necessário entrar no endereço: http://127.0.0.1:8000/sistema.

# Ferramentas utilizadas no desenvolvimento
- Sistema Operacional: Windows 10;
- Linguagem: PHP com Framework: Laravel;
- Visual Studio Code.
- HTML
- CSS
- JavaScript
- JQuery
- MySQL
- AJAX
 

