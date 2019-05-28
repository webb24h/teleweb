<?php
/*************************************************************************
 * 
 * TELEWEB 
 * CURRENT VERSION : 1.0 \\ teleweb ultra light
 * 
 * LICENSE : GNU GENERAL PUBLIC LICENSE
 * Read More On GNU GENERAL PUBLIC LICENSE at https://www.gnu.org/licenses/gpl-3.0.en.html
 *
 * Copyright (C) [2019] Teleweb Systems initiative of Webb24h Incorporated
 * All Rights Reserved.
 * 
 * Written by Marie-Eva BB Volmar, May 2019
 * Official launch date : May 17th 2019
 * For support contact us at teleweb@webb24h.com
 * 
 * Thanks for using Teleweb. 
 * No classes. No hassle. 
 * Pure procedural PHP.
 * Still, I followed a certain OOP logic to avoid repetition, so no worries. 
 * There is a method to the madness. 
 * Breathe, take your time and you will see magic.
 * 
 * I had fun and by the way... simplicity works ^^
 *
 * God bless and YOU ARE LOVED.
 **************************************************************************/
/*
 * 
 * 
 * CONTROLLER
 * 
 * The controller takes care of all views
 * 
 * 
 * 
 * 
 * 
 * 
  /*
 * 
 * 
 * 
 * VIEWS
 * INCLUDES
 * 
  /*
 * 
 * 
 * get current php file name
 * 
 * 
 * 
 */
$current_file = basename($_SERVER['PHP_SELF']);
/*
 * 
 * 
 * get current directory/folder
 * 
 * 
 * 
 */
$current_directory = basename(__DIR__);
/*
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * VIEW
 * header.php
 * 
 * 
 */
if (empty($_GET)) {
    $headerclass = 'navabar-ottawa';
    $linkclass = 'indexlink';
    $telelogo = 'tau_white';
} else
if (isset($_GET['callcenter'])) {
    $linkclass = '';
    $headerclass = 'navbar-inverse';
    $homefile = 'index.php?callcenter&dashboard';
    $telelogo = 'tau_white';
}else
{
    $linkclass = 'loginlink';
    $headerclass = 'navbarordinary';
    $homefile = 'index.php';
    $telelogo = 'tau';
}
include_once 'view/header.php';
/*
 * 
 * 
 * VIEW
 * home.php
 * 
 * 
 */
if (empty($_GET)) {
    include_once 'view/home.php';
}
/*
 * 
 * 
 * VIEW
 * confirmation.php
 * 
 * 
 */
if (isset($_GET['confirmation'])) {

    $id = $_GET['confirmation'];

    include_once 'view/confirmation.php';
}
/*
 * 
 * 
 * VIEW
 * validate.php
 * 
 * 
 */
if (isset($_GET['validate'])) {

    $id = $_GET['validate'];

    include_once 'view/validate.php';
}
/*
 * 
 * 
 * VIEW
 * login.php
 * 
 * 
 */
if (isset($_GET['login'])) {

    include_once 'view/login.php';
}
/*
 * 
 * 
 * VIEW
 * dashboard.php
 * 
 * 
 */
if (isset($_GET['callcenter'])) {
    /*
     * 
     * 
     * 
     * SESSION
     * protect pages
     * 
     * 
     */
    include 'session.php';
}
/*
 * 
 * 
 * VIEW
 * install.php
 * 
 * 
 */
if (isset($_GET['install'])) {

    include 'install.php';
}
/*
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * VIEW
 * footer.php
 * The footer will only 
 * display on the front end view of the site
 * 
 */
if (!isset($_GET['callcenter'])) {
    include_once 'view/footer.php';
}
