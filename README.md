# Desafio da Maximize

## Comandos para rodar a aplicação

Para iniciar os serviços Docker. No terminal, acesse a pasta do "laradock" e execute o seguinte comando:

```bash
docker compose up -d nginx redis
```

Com o projeto já em execução e ainda na pasta "laradock", acesse o workspace da aplicação e execute o seguinte comando:

```bash
docker compose exec workspace bash
```

Após acessar o workspace, instale as dependências da aplicação

```bash
composer install
```

### Acesse o [history.md](/HISTORY.md) para entender sobre o projeto
