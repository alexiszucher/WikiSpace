<?php require_once "header.php"; ?>

<h2>Documentation SSH</h2>

<div class="col-12">
    <div tag="CONNEXION SSH A UN SERVEUR">
        <b>CONNEXION SSH A UN SERVEUR</b>
        <br /><br />
        <button onclick="copy('1')" id="copy" type="button" class="btn btn-dark">COPIE</button><br />
        <textarea id="1" cols="100" rows="7">
            ssh root@|server-ip|

            example : ssh root@175.60.0.25
        </textarea>

    </div>

    <br /><br />

    <div tag="GENERATION JEUX DE CLE">
        <b>GENERATION JEU DE CLES</b>
        <br /><br />
        <button onclick="copy('2')" id="copy" type="button" class="btn btn-dark">COPIE</button><br />
        <textarea id="2" cols="100" rows="7">
            ssh-keygen -t rsa -C alexiszucher -b 2048

            Le jeu de clés est stocké dans un dossier .ssh (/home/alexis/.ssh)
        </textarea>
    </div>
</div>

<?php require_once "footer.php"; ?>

