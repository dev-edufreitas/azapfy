# API de Controle de Notas Fiscais

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

## Estrutura dos Dados

Cada nota fiscal contém informações detalhadas como número, valor, data de emissão, CNPJ e nome do remetente.

## Funcionalidades Extras

- Validações utilizando Form request.
- Restrição de acesso com Policies.
- Envio assíncrono de emails com Notifications e filas.
- Testes automatizados.
- Documentação da API.

## Contribuição

Sugestões e contribuições são bem-vindas. Sinta-se à vontade para fazer um fork e enviar um pull request.
