# Projeto Malams
Projeto desenvolvido para trabalho de conclusão de curso (TCC) do curso de Análise e Desenvolvimento de Sistemas, da ETEC Professor Camargo Aranha, no ano letivo de 2025.
## Sistema de Agendamento Online para Salões de Beleza
Este é um sistema de agendamento online desenvolvido para salões de beleza de pequeno e médio porte. Através dessa plataforma, os usuários poderão visualizar horários disponíveis, serviços oferecidos, profissionais e preços. O objetivo é proporcionar uma experiência simples e eficiente tanto para os clientes quanto para os administradores do salão.

# Índice
1. [Descrição](#descrição)
2. [Tecnologias](#tecnologias)
3. [Instalação](#instalação)
4. [Uso](#uso)
5. [Comandos Git para Gerenciamento de Branches](#comandos-git-para-gerenciamento-de-branches)

# Descrição
O sistema de agendamento online foi criado para facilitar a gestão de salões de beleza. Ele permite que os clientes agendem horários para diversos serviços, visualizem as informações sobre os profissionais disponíveis, vejam os preços dos serviços e escolham o horário que melhor se adapta à sua agenda.

Além disso, os administradores têm acesso a um painel de controle para gerenciar os serviços, os horários dos profissionais e outras configurações do sistema.

# Tecnologias
- Linguagens: PHP, HTML, CSS, JavaScript
- Framework: Laravel
- Banco de Dados: MySQL

# Instalação
Para rodar o projeto na sua máquina local, siga os passos abaixo:

1. **Clone o repositório:**
   git clone https://github.com/usuario/nome-do-projeto.git
2. **Navegue até a pasta do projeto:**
   cd nome-do-projeto
3. **Instale as dependências do projeto:**
   Se você ainda não tiver o Composer instalado, você pode baixá-lo aqui: https://getcomposer.org/.
   Com o Composer instalado, execute o seguinte comando para instalar as dependências:
   composer install
4. **Configuração do ambiente:**
   Crie um arquivo .env baseado no arquivo .env.example.
   Em seguida, configure suas credenciais de banco de dados no arquivo .env.
5. **Gerar a chave do aplicativo:**
   Execute o comando abaixo para gerar a chave do Laravel:
   php artisan key:generate
6. **Criando o banco de dados no Workbench:**
   Abra o aplicativo do My Workbench e crie o banco de dados com o nome bdMalams
   create database bdMalams;
7. **Migrar o banco de dados:**
   Execute as migrações para criar as tabelas necessárias no banco de dados:
   php artisan migrate
8. **Rodar o servidor:**
   Agora, você pode rodar o servidor local para testar a aplicação:
   php artisan serve
   O sistema estará acessível em http://localhost:8000.

# Uso
Após a instalação, você pode acessar a interface do sistema através do navegador. Os usuários poderão:

Ver os serviços oferecidos pelo salão.
Consultar os horários disponíveis.
Escolher um profissional para o atendimento.
Agendar um horário conforme sua conveniência.
Administradores terão a capacidade de:

Adicionar, editar ou remover serviços.
Gerenciar horários e disponibilidade dos profissionais.
Visualizar agendamentos futuros.

# Comandos Git para Gerenciamento de Branches

## Criando e Entrando em uma Branch no Git

No Git Bash, após clonar o repositório e entrar no projeto:

1. **Verificar as branches existentes:**
   git branch -a

2. **Criar uma nova branch e já entrar nela:**
   git checkout -b nome-da-branch
   
3. **Subir a branch para o GitHub:**
   git push -u origin nome-da-branch
     
4. **Sair da branch e voltar para a main (branch principal):**
   git checkout main
   
## Subindo Alterações na Branch

1. **Verificar o status das alterações:**
   git status
   
2. **Adicionar arquivos para commit:**
   git add .
   
3. **Criar um commit com uma descrição das alterações:**
   git commit -m "Descrição das alterações"
   
4. **Enviar a branch para o repositório remoto:**
   git push origin sua-branch

## Juntando as Alterações na main

1. **Mudar para a branch principal (main):**
   git checkout main
   
2. **Atualizar a main para garantir que está com as últimas alterações:**
   git pull origin main
   
4. **Mesclar as alterações da sua branch na main:**
   git merge sua-branch
   
5. **Se houver conflitos, resolva-os manualmente e finalize o merge com:**
   git commit -m "Resolvendo conflitos
   
7. **Subir a main atualizada para o repositório remoto:**
  git push origin main
   

