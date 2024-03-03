# Desafio da Maximize

## Clonando o repositório

```bash
git clone https://github.com/LuanMobile/desafio-maximize.git
```

## Em seguida, para utilizar o Docker, na raiz do projeto, clone o Laradock

```bash
git clone https://github.com/Laradock/laradock.git
```

Agora, crie o arquivo `.env` do seu Laradock

```bash
cp .env-laradock ./laradock/.env
```

## Comandos para rodar a aplicação

Para iniciar os serviços Docker. No terminal, acesse a pasta do "laradock" e execute o seguinte comando:

```bash
docker compose up -d nginx redis
```

Com o projeto já em execução e ainda na pasta "laradock", acesse o workspace da aplicação e execute o seguinte comando:

```bash
docker compose exec workspace bash
```

Após acessar o workspace, instale as dependências da aplicação e gere chave da aplicação no arquivo `.env`

```bash
composer install
```

```bash
php artisan key:generate
```

### Acesse o [history.md](/HISTORY.md) para entender sobre o projeto
