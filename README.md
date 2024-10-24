
# Nome do projeto

![GitHub repo size](https://img.shields.io/github/repo-size/isaiasvas/gestor-financeiro-agenda?style=for-the-badge)
![GitHub language count](https://img.shields.io/github/languages/count/isaiasvas/gestor-financeiro-agenda?style=for-the-badge)
![GitHub forks](https://img.shields.io/github/forks/isaiasvas/gestor-financeiro-agenda?style=for-the-badge)
![Bitbucket open issues](https://img.shields.io/bitbucket/issues/isaiasvas/gestor-financeiro-agenda?style=for-the-badge)
![Bitbucket open pull requests](https://img.shields.io/bitbucket/pr-raw/isaiasvas/gestor-financeiro-agenda?style=for-the-badge)



> O sistema de gestão financeira em Laravel permite cadastrar e gerenciar ganhos e gastos, proporcionando uma visão clara das finanças. Inclui uma agenda para criar lembretes, ajudando a organizar pagamentos e acompanhar despesas de forma eficiente.

## 💻 Pré-requisitos

Antes de começar, verifique se você atendeu aos seguintes requisitos:

- Você tem o PHP 8.x instalado em sua máquina.
- Você instalou o Composer.
- Você tem um banco de dados MySQL ou MariaDB configurado.
- Você tem uma máquina com **Windows**, **Linux** ou **MacOS**.
- Você configurou o servidor local (usando algo como XAMPP, Laragon ou Homestead).

## 🚀 Instalando o Gestor Financeiro Agenda

Para instalar o **Gestor Financeiro Agenda**, siga estas etapas:

### 1. Clonando o repositório

```bash
git clone https://github.com/isaiasvas/gestor-financeiro-agenda.git
```

### 2. Instalando as dependências

Navegue até a pasta do projeto e execute o comando abaixo para instalar as dependências do Laravel:

```bash
cd gestor-financeiro-agenda
composer install
```

### 3. Configurando o arquivo `.env`

Renomeie o arquivo `.env.example` para `.env`:

```bash
cp .env.example .env
```

Abra o arquivo `.env` e configure as seguintes variáveis para conectar ao banco de dados:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 4. Gerando a chave da aplicação

Execute o comando abaixo para gerar a chave única da aplicação Laravel:

```bash
php artisan key:generate
```

### 5. Executando as migrations

Agora, execute as migrations para criar as tabelas no banco de dados:

```bash
php artisan migrate
```

### 6. Servindo a aplicação

Por fim, rode o servidor local do Laravel:

```bash
php artisan serve
```

Acesse a aplicação no seu navegador através do endereço:

```
http://localhost:8000
```

## ☕ Usando o Gestor Financeiro Agenda

Para usar o **Gestor Financeiro Agenda**, basta seguir as instruções de interface do sistema para cadastrar ganhos, gastos, e gerenciar lembretes financeiros.

## 📫 Contribuindo para <gestor-financeiro-agenda>

Para contribuir com <gestor-financeiro-agenda>, siga estas etapas:

1. Bifurque este repositório.
2. Crie um branch: `git checkout -b <nome_branch>`.
3. Faça suas alterações e confirme-as: `git commit -m '<mensagem_commit>'`
4. Envie para o branch original: `git push origin <gestor-financeiro-agenda> / <local>`
5. Crie a solicitação de pull.

Como alternativa, consulte a documentação do GitHub em [como criar uma solicitação pull](https://help.github.com/en/github/collaborating-with-issues-and-pull-requests/creating-a-pull-request).

## 🤝 Colaboradores



## 😄 Seja um dos contribuidores

Quer fazer parte desse projeto? Clique [AQUI](CONTRIBUTING.md) e leia como contribuir.

## 📝 Licença

Esse projeto está sob licença. Veja o arquivo [LICENÇA](LICENSE.md) para mais detalhes.