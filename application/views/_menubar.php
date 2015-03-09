<?php
/*
 * Menu navbar, just an unordered list
 */
?>
<ul id="navigation">
    {menudata}
    <li>
    <a href="{link}">{name}</a>
    </li>
    {/menudata}
    <li>
        <a href="/register">Register</a>/<a href="{loginouturl}">{loginout}</a>
    </li>
</ul>
