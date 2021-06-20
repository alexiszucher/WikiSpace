<?php require_once "header.php"; ?>

<h2>Documentation SSH</h2>

<div class="col-12">
    <div tag="SECURITE">
        <b>SECURITE</b>
        <br /><br />
        <button onclick="copy('1')" id="copy" type="button" class="btn btn-dark">COPIE</button><br />
        <textarea id="1" cols="150" rows="35">
            Dans la console Wildfly : ajouter un domaine de sécurité avec :
            - /subsystem= security/security−domain=secureDomain:add(cache−type= default)
            
            Ensuite paramétrer le domaine de sécurité en sélectionnant la source de données de WildFly + la requète à effectuer :
            - /subsystem=security/security-domain=secureDomain/authentication=classic:add(login-modules=[{"code"=>"Database", "flag"=>"required","module-options"=>{"dsJndiName" => "java:/TopaidiDS","principalsQuery" => "select password from user where mail=?", "rolesQuery" => "select rank, 
            'Roles' from user where username=?"}}])


            Enfin, insérer ce genre de code dans web.xml du projet :
            - <!-- Gestion de la sécurité -->
            <security-constraint>
                <web-resource-collection>
                    <web-resource-name>secure</web-resource-name>
                    <url-pattern>/home</url-pattern>
                    <url-pattern>/list-ideas</url-pattern>
                    <url-pattern>/create-rateIdea</url-pattern>
                    <url-pattern>/rates-idea</url-pattern>
                    <url-pattern>/create-rateIdea</url-pattern>
                    <url-pattern>/leaderboard</url-pattern>
                </web-resource-collection>
                <auth-constraint>
                    <role-name>0</role-name>
                    <role-name>1</role-name>
                </auth-constraint>
            </security-constraint>
            
            <!-- Gestion de la sécurité -->
            <security-constraint>
                <web-resource-collection>
                    <web-resource-name>adminsecure</web-resource-name>
                    <url-pattern>/admin</url-pattern>
                </web-resource-collection>
                <auth-constraint>
                    <role-name>1</role-name>
                </auth-constraint>
            </security-constraint>

            <login-config>
                <auth-method>FORM</auth-method>
                <realm-name>secureRealm</realm-name>
                <form-login-config>
                    <form-login-page>/home</form-login-page>
                    <form-error-page>/loginError.jsp</form-error-page>
                </form-login-config>
            </login-config>

            <security-role>
                <role-name>0</role-name>
            </security-role>
            <security-role>
                <role-name>1</role-name>
            </security-role>
        </textarea>

    </div>
</div>

<?php require_once "footer.php"; ?>

