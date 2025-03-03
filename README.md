# Symfony-Filters

This is a Symfony app to test filters with data.

We have data fixtures in the project.

### Routes

We can test 3 routes in the project to display the data:
```
- /
- /limit/page{num} (num => digit equal or greater than 1)
- /limitpaginator
```

### Install the project

Get the dependencies and follow instructions:

1. Create database in MySQL
```bash
symfony console doctrine:database:create
```

2. Execute migration
```bash
symfony console doctrine:migrations:migrate
```

3. Load data fixtures
```bash
symfony console doctrine:fixtures:load
```

4. Run the app
```bash
symfony server:start
```