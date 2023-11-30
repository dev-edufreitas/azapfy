# API de Controle de Notas Fiscais
<img src="https://i.ibb.co/M8qqP0f/Teste.png" width="300" alt="Descrição da Imagem">
<img src="https://i.ibb.co/zhnckYf/teste2.png" width="300" alt="Descrição da Imagem">

Este projeto é uma API REST desenvolvida em PHP, utilizando o framework Laravel, para o gerenciamento de notas fiscais de usuários. Foi criado como parte de um desafio técnico para o cargo de Desenvolvedor Backend.

## Características

- **Autenticação de Usuários**: Implementa endpoints para cadastro e login de usuários.
- **CRUD de Notas Fiscais**: Permite criar, visualizar, atualizar e deletar notas fiscais.
- **Segurança de Dados**: Restringe o acesso às notas fiscais, garantindo que cada usuário acesse apenas suas próprias notas.
- **Notificações por Email**: Envia emails automáticos aos usuários de forma assíncrona sempre que uma nova nota fiscal é registrada.

## Tecnologias Utilizadas

- PHP 8.1.25
- Laravel 10+
- MySQL
- PHPUnit
- ShouldQueue

## Estrutura dos Dados

Cada nota fiscal contém informações detalhadas como número, valor, data de emissão, CNPJ e nome do remetente.

## Funcionalidades Extras

- Validações utilizando Form request.
- Restrição de acesso com Policies.
- Envio assíncrono de emails com Notifications e filas.
- Testes automatizados.
- Documentação da API.

- 
## Pré-requisitos

Antes de iniciar, certifique-se de que você tem instalado em sua máquina:
- [Git](https://git-scm.com/)
- [PHP 8.1.25](https://www.php.net/)
- [Composer](https://getcomposer.org/)

## Clonando o Repositório

Para começar, clone o repositório do projeto usando Git:

```bash
git clone https://github.com/dev-edufreitas/azapfy.git
cd azapfy
```

# Configuração do Ambiente

## Configurando o Arquivo .env

1. Copie o arquivo `.env.example` para um novo arquivo chamado `.env`.

2. Configure o arquivo `.env` com as informações do seu banco de dados e do serviço de e-mail.
   - Substitua `DB_DATABASE`, `DB_USERNAME` e `DB_PASSWORD` com as informações do seu banco de dados MySQL.
   - Para configurar o serviço de e-mail com Mailtrap, substitua `MAIL_USERNAME`, `MAIL_PASSWORD`, e outros campos relacionados com os dados fornecidos pelo Mailtrap.

3. Altere `QUEUE_CONNECTION` para `database`.

## Configuração do Banco de Dados

- Execute as migrations para criar as tabelas no banco de dados:
```bash
php artisan migrate
```

# Iniciando o Projeto

- Instale as dependências do projeto com o Composer:
```bash
composer install
```

- Gere a chave do aplicativo Laravel:
```bash
php artisan key:generate
```

- Inicie o servidor local:
```bash
php artisan serve
```

- Em um novo terminal, inicie o trabalhador de fila para processar jobs em segundo plano:
```bash
php artisan queue:work
```


# Executando Testes

- Para executar os testes automatizados, use o seguinte comando:
```bash
php artisan test --filter UserFlowTest
```


## Contribuição

Sugestões e contribuições são bem-vindas.
