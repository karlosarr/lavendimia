<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>La Vendimia</title>

        <meta name="description" content="Source code generated using layoutit.com">
        <meta name="author" content="LayoutIt!">
        <?= link_tag('assets/humans.txt', 'autor', ''); ?>

        <?= link_tag('assets/js/bootstrap/css/bootstrap.min.css'); ?>
		<?= link_tag('assets/js/bootstrap/css/bootstrap-theme.min.css'); ?>

        
        <?= link_tag('assets/js/jqgrid/css/ui.jqgrid-bootstrap-ui.css'); ?>
		
		<?= link_tag('assets/js/jquery/jquery-ui.min.css'); ?>
		<?= link_tag('assets/js/jquery/jquery-ui.theme.css'); ?>
		
		<?= link_tag('assets/css/style.css'); ?>

        <?= script_tag('assets/js/jquery/jquery.min.js'); ?>
        <?= script_tag('assets/js/bootstrap/js/bootstrap.min.js'); ?>
		
		<!--<?= script_tag('assets/js/bootstrap/js/jquery.mockjax.js'); ?>
        <?= script_tag('assets/js/bootstrap/js/bootstrap-typeahead.min.js'); ?>-->
        
        <?= script_tag('assets/js/jqgrid/js/i18n/grid.locale-es.js'); ?>
        <?= script_tag('assets/js/jqgrid/js/jquery.jqGrid.min.js'); ?>
       		
		<?= script_tag('assets/js/jquery/jquery-ui.min.js'); ?>
		
        <?= script_tag('assets/js/script.js'); ?>

    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-right">
                        La Vendimia
                    </h3>
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="navbar-header">

                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">La Vendimia</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                            </button> <a class="navbar-brand" href="#"></a>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Inicio<strong class="caret"></strong></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/ventas/">Ventas</a>
                                        </li>
                                        <li class="divider">
                                        </li>
                                        <li>
                                            <a href="/clientes">Clientes</a>
                                        </li>
                                        <li>
                                            <a href="/articulos">Articulos</a>
                                        </li>
                                        <li>
                                            <a href="/configuracion">Configuración</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="#"> <b><?=date("d/m/Y"); ?></b></a>
                                </li>
                            </ul>
                        </div>
