<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
global $APPLICATION;
use Bitrix\Main\Page\Asset;
?>
<main>
    <header>

        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <meta name="description" content="">
            <meta name="author" content="">

            <title><?= $APPLICATION->ShowTitle(); ?></title>
            <?=$APPLICATION->ShowHead();?>

            <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.min.js") ?>
            <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/bootstrap.bundle.min.js") ?>
            <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/Headroom.js") ?>
            <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jQuery.headroom.js") ?>
            <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/slick.min.js") ?>
            <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/custom.js") ?>

            <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "https://fonts.googleapis.com") ?>
            <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "https://fonts.gstatic.com") ?>
            <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap") ?>
            <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap.min.css")?>
            <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap-icons.css")?>
            <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/slick.css")?>
            <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/tooplate-little-fashion.css")?>



        </head>

        <body>
        <div id="panel">
            <? $APPLICATION->ShowPanel(); ?>
        </div>



        <main>
