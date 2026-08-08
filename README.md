# Counter Web APP
Небольшой проект веб-приложения на PHP, разработанный для проведения курса PHP в Alif Academy

## Что демонстрирует проект
- Простейшая реализация MVC на PHP
- Самописный FrontController/Router
- Вывод HTML с PHP
- Обработку AJAX-запросов
- Работу с Docker

## Инструкции по установке
1. Склонировать репозиторий
2. Перейти в папку docker внутри проекта
3. Скопировать .env.example в просто .env, при необходимости поменять данные
4. Запустить в папке docker команду ```docker compose up -d```
5. Запустить composer ```docker compose exec -u www-data php composer install```