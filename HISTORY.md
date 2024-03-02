# Desafio Maximize: Um Feed de Notícias

## Sobre o Projeto

O Desafio Maximize consiste em uma aplicação de feed de notícias que consome uma API dedicada para trazer informações atualizadas. Este projeto foi desenvolvido para demonstrar a integração com uma API de notícias e para explorar a implementação de recursos de paginação, busca e documentação da API.

## Testes executados

Para garantir a qualidade do código, foram realizados testes utilizando o framework Pest, integrado ao Laravel. Os testes estão localizados na pasta "tests/Feature/Api". O Pest foi escolhido devido à sua capacidade de tornar o processo de teste claro e de fácil compreensão.

## Ideias que gostaria de implementar se tivesse tempo

- **Paginação do Feed de Notícias**: Implementar botões de "Próxima" e "Anterior" para facilitar a navegação no feed.
- **Barra de Pesquisa**: Adicionar um campo de pesquisa para filtrar as notícias com base no título pesquisado.

## Decisões que foram tomadas e seus porquês

### API

Para criar a API, foi utilizado o pacote [NewsAPI](https://newsapi.org/), que fornece acesso a notícias de todo o mundo. A API foi desenvolvida de forma simples, com suporte a paginação, e foi otimizada utilizando cache com o serviço Redis.

Os testes unitários foram escritos utilizando o Pest do Laravel devido à integração perfeita com o framework.

Para documentação da API, usei o Swagger. E afim de implementar no projeto, utilizei o [L5-Swagger](https://github.com/DarkaOnLine/L5-Swagger) que é um pacote wrapper de Swagger-php e swagger-ui adaptado para funcionar com Laravel.

### Frontend

Para a interface do usuário, foi utilizado o Blade, junto com o Bootstrap para estilização das páginas.

## Arquiteturas que foram testadas e os motivos de terem sido modificadas ou abandonadas

A arquitetura adotada foi o padrão de pastas do Laravel (MVC).
