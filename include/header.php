<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/functions.php';
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/favicon-180.png">

    <title>WEBHEADS — Разработка и поддержка сайтов</title>
    <meta name="description" content="Разработка, поддержка и доработка сайтов и интернет-магазинов.">

    <link rel="stylesheet" href="/assets/css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

<header class="header">
    <div class="container">
        <div class="header__wrapper">

            <a href="/" class="header__logo">WEBHEADS</a>

            <nav class="header__nav">
                <ul class="header__menu">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/about/">О компании</a></li>

                    <li class="dropdown">
                        <a href="/services/">Услуги</a>

                        <ul class="dropdown__menu">
                            <li><a href="/services/development/">Разработка сайтов</a></li>
                            <li><a href="/services/support/">Поддержка сайтов</a></li>
                            <li><a href="/services/upgrade/">Доработка функционала</a></li>
                        </ul>
                    </li>

                    <li><a href="/portfolio/">Портфолио</a></li>
                    <li><a href="/technologies/">Технологии</a></li>
                    <li><a href="/news/">Новости</a></li>
                    <li><a href="/contacts/">Контакты</a></li>
                </ul>
            </nav>

            <a href="#feedback" class="header__button">Оставить заявку</a>

        </div>
    </div>
</header>