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

- PHP 8+
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

## Contribuição

Sugestões e contribuições são bem-vindas.
