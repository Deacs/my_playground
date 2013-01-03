<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/partials/header.php');

print '<h1>Domain Setup</h1>';

?>

<ul>
        <li>Enable the virtualhost config inclusion in httpd.conf : uncomment Include /private/etc/apache2/extra/httpd-vhosts.conf</li>
        <li>Add new entry in /privare/etc/apache2/extra/httpd-vhosts.conf : sudo vim /private/etc/apache2/extra/httpd-vhosts.conf</li>
        <li>sudo vim /etc/hosts add new domain to 127.0.0.1</li>
        <li>Apache will NOT restart without the appropriate log directories being set up</li>
</ul>
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/partials/footer.php');
?>

