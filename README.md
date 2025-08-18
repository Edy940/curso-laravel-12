## Requisitos

* PHP 8.2 ou superior - Conferir a versão: php -v
* Composer - Conferir a instalação: Composer --version
* Node.js 22 ou superior - Conferir a versão: node -v



## Sequencias para criar o projeto

Criar o projeto com Laravel: composer create-project laravel/laravel .
````````

Iniciar o projeto criado com laravel: php artisan serve


Acessar o conteúdo padrão do laravel

http://127.0.0.1:8000



## Instalação (primeira vez)

```powershell
# Na raiz do projeto
docker compose build

# (Se o projeto ainda não existir em src) — cria o Laravel 12 dentro de src
docker compose run --rm app composer create-project laravel/laravel src "^12.0"

# Instalar dependências (com timeout maior, caso necessário)
docker compose run --rm -e COMPOSER_PROCESS_TIMEOUT=2000 app composer install --no-interaction --prefer-dist --no-progress

# Gerar APP_KEY
docker compose run --rm app php artisan key:generate
```

## Configurar Banco de Dados

Edite `src/.env` e ajuste:

```env
DB_CONNECTION=mysql
DB_HOST=<host>
DB_PORT=3306
DB_DATABASE=<nome>
DB_USERNAME=<usuario>
DB_PASSWORD=<senha>
```

Depois rode as migrações:

```powershell
docker compose run --rm app php artisan migrate
```

## Subir o servidor

- Interativo (mostra logs no terminal):

```powershell
cd C:\SQG\Projetos\sqgServerAdmin
docker compose run --rm --service-ports app php artisan serve --host=0.0.0.0 --port=8000
```

- Em background (detached):

```powershell
cd C:\SQG\Projetos\sqgServerAdmin
docker compose run -d --service-ports app php artisan serve --host=0.0.0.0 --port=8000
```

Acesse: [http://localhost:8000](http://localhost:8000)

> **Atenção (Linux):**  
> Para acessar serviços do host pelo nome `host.docker.internal` dentro do container, adicione o parâmetro abaixo ao rodar o container:
>
> ```bash
> docker compose run --rm --add-host=host.docker.internal:host-gateway --service-ports app php artisan serve --host=0.0.0.0 --port=8000
> ```
>
> Ou configure `extra_hosts` no `docker-compose.yml`:
>
> ```yaml
> services:
>   app:
>     extra_hosts:
>       - "host.docker.internal:host-gateway"
> ```

## Parar o serviço

- Se estiver rodando no terminal (interativo): pressione `Ctrl + C`.
- Se estiver em background (detached):

```powershell
# Ver os containers em execução
docker ps
# Parar pelo CONTAINER ID
docker stop <CONTAINER_ID>
```

Opcional: listar apenas containers baseados na imagem do app e pará-los:

```powershell
# Listar containers com a imagem do app
docker ps --filter "ancestor=sqgserveradmin-app"
# Parar o container (substitua pelo ID listado)
docker stop <CONTAINER_ID>
```

## Outros comandos úteis

- Rodar qualquer comando Artisan:

```powershell
docker compose run --rm app php artisan <comando>
```

- Rodar testes:

```powershell
docker compose run --rm app php artisan test
```

- Rebuild (se mudar o Dockerfile):

```powershell
docker compose build
```

## Observações

- O campo `version:` no docker-compose foi removido porque é obsoleto em versões recentes do Compose.
- O volume monta `./src` em `/var/www/html` dentro do container.
- Evite criar o Laravel dentro da pasta `docker/`. Sempre use `src/`.

## Estrutura de pastas (Laravel)

```text
src/
  app/
  bootstrap/
  config/
  database/
  public/
  resources/
  routes/
  storage/
  tests/
  vendor/
```



