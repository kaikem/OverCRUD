![logo_white4_small](https://github.com/user-attachments/assets/69f69df9-21dc-48ae-a09f-ad66cfb3aef2)
<h1>Software de Gestão</h1>


<p align="center">
  <img src="https://img.shields.io/badge/Início-Out/2024-blue"/>
  <img src="https://img.shields.io/badge/Lançamento-Dez/2024-green"/>
  <img src="https://img.shields.io/badge/Licensa-MIT-red"/>
  <img src="https://img.shields.io/badge/Versão-1.0-orange"/>
</p>


# Índice 
- [Descrição do Projeto](#descrição-do-projeto)
- [Funcionalidades](#funcionalidades)
- [Tecnologias utilizadas](#tecnologias-utilizadas)
- [Acesso ao Projeto](#acesso-ao-projeto)
- [Pessoas Contribuidoras](#pessoas-contribuidoras)
- [Pessoas Desenvolvedoras do Projeto](#pessoas-desenvolvedoras)
- [Licença](#licença)


# Descrição do Projeto
<p>
  Projeto 01 do programa de estágio 2024 da Overdrive Softwares e Consultoria.
</p>
<p align="justify">
  Esta primeira aplicação utiliza-se de linguagens de Front-end e Back-end com o intuito de construir, para a web, um sistema CRUD (Create, Read, Update, and Delete) de gerenciamento de funcionários e empresas. Atualmente possibilita a consulta de detalhada de dados, bem como a alteração de registros e a remoção/adição de cadastros. 
</p>
<p align="justify">
  Este sistema foi desenvolvido com base em dois tipos de usuários: Comum (tem acesso apenas à consulta de dados) e Admin (acesso total para consultas e alterações).
</p>


# Funcionalidades
- :mag_right:`CONSULTE`: Consulta rápida e ordenada de funcionários e empresas cadastradas.
- :pencil2:`EDITE`: Edição de dados com atualização em tempo real.
- :heavy_plus_sign:`ADICIONE`: Adição e remoção de cadastros para ambas categorias. 
- :small_red_triangle:`CONTROLE`: Dois níveis de acesso para melhor atribuição.


# Tecnologias Utilizadas
- ``HTML``
- ``CSS``
- ``JavaScript``
- ``PHP``
- ``SQL``


# Acesso ao Projeto
Você pode acessar o [código fonte do projeto](https://github.com/kaikem/OverCRUD).


# Abrir e rodar o projeto
  1. Software necessário: Emulador de servidor Apache com suporte à banco de dados em SQL (deixo como sugestão o [XAMPP](https://www.apachefriends.org/pt_br/index.html)).
  2. Fazer o download do projeto completo e inserir na pasta pertinente do emulador (no caso do XAMPP, normalmente em <i>"C:\xampp\htdocs"</i>).
  3. Fazer a importação do banco de dados da aplicação através do arquivo `overcrud_bd.sql` contido na pasta <i>"overcrud/database"</i> da aplicação.
  4. Abrir o emulador e habilitar o servidor Apache e conexão com o banco de dados (no caso do XAMPP, basta apertar o botão "Start" em "Actions", conforme imagem abaixo):
     
  ![xampp](https://github.com/user-attachments/assets/975f2cf4-4b92-4ba5-b69b-75812351e434)
  
  5. Abrir o navegador de preferência e acessar a aplicação através do endereço emulado (no caso do XAMPP, <i>"localhost/overcrud"</i>).
  6. Caso seja necessário alguma configuração diferente para conexão com Banco de Dados, basta acessar o arquivo `ConexaoBD.php` na pasta <i>"overcrud/components"</i> do projeto e alterar as variáveis conforme o necessário.
  7. Usuários para teste da aplicação: <b>Usuário Comum:</b> Login 999.999.999-99 e Senha comum123 | <b>Usuário Admin:</b> Login 000.000.000-00 e Senha admin123


# Pessoas Contribuidoras
Gostaria de deixar aqui um agradecimento aos monstros sagrados [Felipão](https://www.github.com/felipedegodoy16) e [Pombo](https://github.com/Martins2802/) pela parceria e ajuda inestimáveis e ao mestre [Diego](https://www.github.com/diegonegretto) pela paciência!


# Pessoas Desenvolvedoras
Desenvolvido por [Kaike Maróstica](https://www.github.com/kaikem), sendo o primeiro projeto feito atuando profissionalmente na área.

# Licença
O OverCRUD é [MIT licensed](./LICENSE).

