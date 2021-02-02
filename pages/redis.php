<?php require_once "header.php"; ?>

<h2>Documentation Redis</h2>

<div class="col-12">
    <div tag="INSTALLATION DE REDIS">
        <b>INSTALLATION DE REDIS</b>
        <br /><br />
        <textarea cols="100" rows="7">
            sudo apt-get install redis-server
        </textarea>

    </div>

    <br /><br />

    <div tag="CHARGEMENT MODULE REDIS">
        <b>CHARGEMENT MODULE REDIS</b>
        <br /><br />
        <textarea cols="100" rows="11">
            -> Si c'est un repo git, clonez
            -> Allez dans le dossier du repo, puis faites "cargo build --release"
            -> Un dossier target/release s'est créé dans le repo.
            -> Aller dans /etc/redis/redis.conf
            -> Dans la partie Module, ajouter une ligne "loadmodule /home/alexis/ModuleRedis/RedisJSON/target/release/librejson.so"
            -> Sauvegarder, puis lancer redis en faisant "redis-server /etc/redis/redis.conf"
        </textarea>
    </div>

    <h2>(A implémenter)</h2>
    <p><b>apt-get install redis-server</b></p>
    <p><b>apt-get install cmake</b></p>
    <p><b>(commande installer rust)</b></p>
    <p><b>cloner https://github.com/RedisJSON/RedisJSON.git</b></p>
    <p><b>aller dans le dossier du repo git et faire "cargo build --release"</b></p>
    <p><b>Aller dans /etc/redis/redis.conf</b></p>
    <p><b>
        Dans le fichier, il y a une section module. Ajouter la ligne permettant d'inclure le module.<br />
        Exemple : "loadmodule /home/alexis/ModuleRedis/RedisJSON/target/release/librejson.so"
    </b></p>
    <p><b>Lancer Redis avec la commande "redis-server /etc/redis/redis.conf"</b></p>
</div>

<?php require_once "footer.php"; ?>

