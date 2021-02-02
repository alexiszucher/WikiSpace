<?php require_once "header.php"; ?>

<div class="col-12">
    <h2>Faire un vhost Apache !</h2>

    <b>→ Dans var/www/vhosts/
    Mettez le dossier reporting.com (ou autre)
    Dans le dossier reporting.com, mettez le dossier reporting (dossier du projet)</b>

    <br /> <br />


    <b>→ Générer un fichier de conf appelé reporting.conf dans etc/apache2/sites-available</b>

    <br /> <br />

    <b>→ Mettez ceci : (Pensez à changer ServerName, ServerAlias et DocumentRoot)</b>

    <br />

    <textarea cols="100" rows="40">
        <VirtualHost *:80>
            # The ServerName directive sets the request scheme, hostname and port that
            # the server uses to identify itself. This is used when creating
            # redirection URLs. In the context of virtual hosts, the ServerName
            # specifies what hostname must appear in the request's Host: header to
            # match this virtual host. For the default virtual host (this file) this
            # value is not decisive as it is used as a last resort host regardless.
            # However, you must set it for any further virtual host explicitly.
            #ServerName www.example.com
        
            ServerAdmin webmaster@localhost
            ServerName reporting.com
            ServerAlias www.reporting.com
            
            DocumentRoot /var/www/vhosts/reporting.com/reporting
        
            # Available loglevels: trace8, ..., trace1, debug, info, notice, warn,
            # error, crit, alert, emerg.
            # It is also possible to configure the loglevel for particular
            # modules, e.g.
            #LogLevel info ssl:warn
        
            ErrorLog ${APACHE_LOG_DIR}/error.log
            CustomLog ${APACHE_LOG_DIR}/access.log combined
        
            # For most configuration files from conf-available/, which are
            # enabled or disabled at a global level, it is possible to
            # include a line for only one particular virtual host. For example the
            # following line enables the CGI configuration for this host only
            # after it has been globally disabled with "a2disconf".
            #Include conf-available/serve-cgi-bin.conf
            
            <Directory /var/www/vhosts/reporting.com>
                Options Indexes FollowSymLinks MultiViews
                AllowOverride All
                Require all granted
            </Directory>
        </VirtualHost>
        
        # vim: syntax=apache ts=4 sw=4 sts=4 sr noet
    </textarea>

    <br /> <br />

    <b>→ a2ensite reporting   cette commande va permettre d’activer le site à partir du fichier de conf appelé reporting</b>

    <br /> <br />

    <b>→ gedit etc/hosts  va vous permettre de créer l’host en liant adresse ip et nom de domaine<br />
    127.0.0.1	localhost
    127.0.1.1	lazucher

    # The following lines are desirable for IPv6 capable hosts
    ::1     ip6-localhost ip6-loopback
    fe00::0 ip6-localnet
    ff00::0 ip6-mcastprefix
    ff02::1 ip6-allnodes
    ff02::2 ip6-allrouters

    127.0.0.1	reporting.com
    127.0.0.1	local.datasearchengine.com</b>

    <br /> <br />

    <b>Pensez à redémarrer votre apache2</b>
</div>

<?php require_once "footer.php"; ?>

