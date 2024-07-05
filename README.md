## Funcionalidades

-   CRUD de usuários com Filament
-   API com rotas específicas na `ApiController`
-   Testes unitários com PHPUnit

## Tecnologias Utilizadas

-   Laravel
-   Filament
-   PHPUnit

## Instalação

1. Clone o repositório:

    ```bash
    git clone https://github.com/GuilhermeRocha19/painel-filament.git
    cd seu-repositorio
    ```

2. Instale as dependências do Composer:

    ```bash
    composer install
    ```

3. Configure o arquivo `.env`:

    ```bash
    cp .env.example .env
    ```

    Atualize as configurações do banco de dados conforme necessário.

4. Gere a chave da aplicação:

    ```bash
    php artisan key:generate
    ```

5. Execute as migrações:

    ```bash
    php artisan migrate
    ```

### Uso

## Executando a Aplicação

Inicie o servidor de desenvolvimento:

```
php artisan serve

Acesse a aplicação em http://localhost:8000.
```

## Filament Admin Panel

1. Acesse o painel de administração Filament em:

```
 http://localhost:8000/admin.
```

## API

GET /api/user/index
GET /api/user/{id}/show
POST /api/user/store

## Testes
Para executar os testes unitários:

    ```
    phpunit --testdox
    ```
