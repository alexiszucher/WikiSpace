<?php require_once "header.php"; ?>

<h2>Documentation PHP</h2>

<div class="col-12">
    <div id="APPEL-API">
        <b>APPEL API HTTP</b>
        <br /><br />
        <button onclick="copy('1')" id="copy" type="button" class="btn btn-dark">COPIE</button><br />
        <textarea id="1" cols="100" rows="25">
                // Appel API pour récup température en JSON
                $errmsg = null;
                $ch = curl_init();
                $options = array(
                    CURLOPT_URL             => 'http://172.25.0.60/xml/json.php?mode=all',
                    CURLOPT_HEADER          => 0,
                    CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
                    CURLOPT_RETURNTRANSFER  => true
                );
                
                curl_setopt_array($ch, $options);
                $response = json_decode(curl_exec($ch));
                if (curl_errno($ch) != 0) {
                    $errmsg = curl_error($ch);
                }
                curl_close($ch);
                
                echo "Il fait actuellement ".$response[1]->value." ".$response[1]->info->unit;
                var_dump($response);
        </textarea>
        <br /><br />
    </div>

    <div id="COMPARER-2-CHAINES">
        <b>COMPARER 2 CHAINES DE CARACTERES</b>
        <br /><br />
        <button onclick="copy('2')" id="copy" type="button" class="btn btn-dark">COPIE</button><br />
        <textarea id="2" cols="100" rows="7">
            // Si les deux chaînes sont identiques
            if (strcmp($str, $str2) === 0) {
                // Let's Go !
            }
        </textarea>
        <br /><br />
    </div>

    <div id="CONNEXION BASE DE DONNEES">
        <b>CONNEXION BASE DE DONNEES</b>
        <br /><br />
        <button onclick="copy('3')" id="copy" type="button" class="btn btn-dark">COPIE</button><br />
        <textarea id="3" cols="100" rows="7">
            $bdd = new PDO('mysql:host=localhost;dbname=alexis1099_trade', 'root', '');
        </textarea>
        <br /><br />
    </div>

    <div id="REQUETE SQL ET PARCOURS DES DONNEES">
        <b>REQUETE SQL ET PARCOURS DES DONNEES</b>
        <br /><br />
        <button onclick="copy('4')" id="copy" type="button" class="btn btn-dark">COPIE</button><br />
        <textarea id="4" cols="100" rows="7">
            $request = $bdd->prepare("SELECT * FROM applications WHERE id=:id");
            $request->bindParam(':id', $_SESSION['id']);
            $request->execute();
            while($app = $request->fetch(PDO::FETCH_ASSOC)) {
                // TODO ! 
            }
        </textarea>
        <br /><br />
    </div>

</div>

<?php require_once "footer.php"; ?>

