<?php require_once "header.php"; ?>

<h2>Documentation Redis</h2>

<div class="col-12">
    <div tag="INSTALLATION DE REDIS">
        <b>INSTALLATION DE REDIS</b>
        <br /><br />
        <button onclick="copy('1')" id="copy" type="button" class="btn btn-dark">COPIE</button><br />
        <textarea id="1" cols="100" rows="7">
            sudo apt-get install redis-server
        </textarea>

    </div>

    <br /><br />

    <div tag="CHARGEMENT MODULE REDIS">
        <b>CHARGEMENT MODULE REDIS</b>
        <br /><br />
        <button onclick="copy('2')" id="copy" type="button" class="btn btn-dark">COPIE</button><br />
        <textarea id="2" cols="100" rows="11">
            -> Si c'est un repo git, clonez
            -> Allez dans le dossier du repo, puis faites "cargo build --release"
            -> Un dossier target/release s'est créé dans le repo.
            -> Aller dans /etc/redis/redis.conf
            -> Dans la partie Module, ajouter une ligne "loadmodule /home/alexis/ModuleRedis/RedisJSON/target/release/librejson.so"
            -> Sauvegarder, puis lancer redis en faisant "redis-server /etc/redis/redis.conf"
        </textarea>
    </div>
</div>

<?php require_once "footer.php"; ?>

