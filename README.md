<h1 align="center" style="color:#F50057;"> 
    personal-media-vault
</h1>

# Índice

- [Sobre](#sobre)
- [Tecnologias utilizadas](#tecnologias-utilizadas)
- [Funcionalidades](#funcionalidades)
- [Como usar](#como-usar)
- [Como contribuir](#como-contribuir)

<a id="sobre"></a>
## 🔖 Sobre 

- Este repositório é um CRUD feito em PHP com a utilização do Framework Laravel.

- A idéia do projeto foi apresentada em um trabalho da faculdade, onde era necessário desenvolver um <b>software para agentamento de consultas médicas.</b>

<a id="tecnologias-utilizadas"></a>
## 🚀 Tecnologias Utilizadas

- [PHP](https://www.php.net/)
- [Laravel](https://laravel.com/)
- [Bootstrap](https://getbootstrap.com/)

<a id="funcionalidades"></a>
## 📄 Funcionalidades

- Cadastro, Edição, Visualização e Remoção (CRUD):
  - Usuários
  - Consultas
  - Pacientes
  - Médicos
  - Especialidades
- Relatório PDF: 
  - Consultas
  - Pacientes
  - Médicos
  - Especialidades

<a id="como-usar"></a>
## ⚡ Como usar

- Clone esse repositório: `git clone https://github.com/marshfellow42/personal-media-vault.git`
- Instale o Composer na sua máquina
- Instale as dependências: `composer install`
- Abra o XAMPP ou o Laragon
- Execute o MySQL
- Crie o Banco de Dados:
  - Nome: `media-vault`
  - Colação: `utf8mb4_unicode_ci`
- Execute as migrations do Banco de Dados: `php artisan migrate`
- Começe a aplicação: `php artisan serve`

<a id="como-contribuir"></a>
## ♻️ Como contribuir

- Faça um Fork desse repositório,
- Crie uma branch com a sua feature: `git checkout -b my-feature`
- Commit as suas mudanças: `git commit -m 'feat: My new feature'`
- Push a sua branch: `git push origin my-feature`

## 📝 Licença

Esse projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.
