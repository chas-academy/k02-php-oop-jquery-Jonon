<?php

if (isset($_SESSION['user'])) {
    require_once 'navigation_loggedIn.html';
} else {
    require_once 'navigation_notLoggedIn.html';
}
