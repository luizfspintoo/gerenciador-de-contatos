# Gerenciador de Contatos

Aplicativo web para gerenciamento de contatos, permitindo que os usuários cadastrem, editem, visualizem e excluam informações. Além disso, oferece criptografia de dados.

---

## 📽️ Demonstração

![Demonstração do Projeto](./.github/gerenciador-de-contatos.gif)

---

## 🚀 Funcionalidades

- Criação de conta e login com autenticação
- Cadastro de contatos com nome, email, e telefone
- Pesquisa de contatos
- Listagem e visualização detalhada dos contatos
- Upload de imagens
- Cripografar informações seniciveis 

---

## 🧰 Tecnologias Utilizadas

- **PHP**
- **HTML5, CSS3, JavaScript**
- **Tailwindcss, daisyUI**
- **SQlite**
- **Servidor Web (Apache)**

---

## 🛠️ Como rodar o projeto

### ✅ Pré-requisitos

- PHP instalado (versão 7.4+ recomendada)
- Servidor web (Apache, Nginx, XAMPP, Laragon etc.)
- Banco de dados MySQL ou Sqlite

### 📦 Instalação

1. Clone o repositório:

```bash
git clone https://github.com/luizfspintoo/gerenciador-de-contatos.git
```

### 🛢️ Banco de Dados

1. Crie as tabelas no banco:

```bash
(SQlite)

- tabela users

CREATE TABLE
  CREATE TABLE
  users (
    id integer primary key,
    name varchar(255) not null,
    email varchar(255) unique not null,
    password varchar(255) not null
  );

- tabela contacts

CREATE TABLE
  CREATE TABLE
  contacts (
    id integer primary key,
    name varchar(255) not null,
    email varchar(255) not null,
    phone varchar(14) not null,
    user_id integer,
    image varchar(255),
    foreign key (user_id) references users (id)
  );

```
2. Arquivo config.php

```
//aqui é configurado o nome do banco dados

"database" => "../database.sqlite"

```

### ⚙ Configuração

```
No arquivo '.env.example' , faça uma cópia para um arquivo '.env' e mude sua chave de criptografia
```

### ✅ Considerações Finais

Este projeto ainda está em desenvolvimento e pode ser expandido com novas funcionalidades. Fique a vontade para colaborar e sugerir melhorias.
Obrigado por visitar este repositório.