
# SISGAP - Sistema de Gerenciamento de Alunos e Professores

O sistema visa proporcionar um amplo ambiente de gestão e automatização das atividades pedagógicas da escola de idioma Wizard by Pearson, inicialmente na microrregião do oeste paranaense, atendendo particularidades das operações da escola no setor pedagógico. O sistema abrange desde a formação e manutenção de diário de aulas de turmas Connections (modelo tradicional de aula) até o gerenciamento de aulas Interactive (modelo de turmas multi-nível que permite maior flexibilidade aos alunos e, consequentemente, exige maior adaptabilidade do sistema). Os principais profissionais a fazerem uso do sistema serão professores e coordenadores pedagógicos.

## Como instalar

Clone o projeto

```bash
  git clone https://github.com/calebeso/gerenciamento-cursos-livres.git
```

Navegue até a pasta do projeto

```bash
  cd sisgap
```

Instale as dependências com o comando:

```bash
  composer install
```

Gere a chave da aplicação com o comando:

```bash
  php artisan key:generate
```

Ajuste o arquivo **.env** com as credenciais do seu banco de dados

```bash
  DB_DATABASE=laravel
  DB_USERNAME=root
  DB_PASSWORD=
```

Gere as tabelas do banco de dados com o comando: 
```bash
 php artisan migrate
```

Popule o banco de dados com os dados pré-configurados com o comando: 
```bash
  php artisan db:seed
```
## Usuário Padrão

Login: **admin**

Senha: **123456**


## Autores

- [Calebe Santana](https://www.github.com/calebeso)
- [Jessica Lima](https://www.github.com/LimaJessica)
- [Eduardo Rezes](https://www.github.com/EduardoRezes)
- [João Saratt](https://www.github.com/jvsrt)
