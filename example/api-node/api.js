const express = require('express');
const mysql = require('mysql');
const dbconfig = require('./dbconfig.json')
const app = express();
const MD5 = require("crypto-js/md5");
app.use(express.json())


const db = mysql.createConnection({
    host: dbconfig.host,
    user: dbconfig.user,
    password: dbconfig.password,
    database: dbconfig.database
});

db.connect(function(err){
    if (err) throw err;
    console.log(`Database-status : ON`)
})

app.post('/users/login', (req,res) => {
    let loginFromBody = req.body.login;
    let passwordFromBody = req.body.password;
    let EstValide = false;
    let objectToReturn;
    db.query("SELECT username, email, password FROM user", function(err, result){
        if (err) return res.status(500).json("ErreurMySQL");
        result.forEach(dataObject => {
            if (loginFromBody == dataObject.username || loginFromBody == dataObject.email){
                if (MD5(passwordFromBody).toString() == dataObject.password){
                    let object = {login: dataObject.username, email: dataObject.email};
                    objectToReturn = object;
                    EstValide = true;
                }
            }
        });
        if (EstValide){
            res.status(200).json(objectToReturn);
        } else {
            res.status(403).json("Login ou mot de passe incorrect");
        }
    })
    
    
})

app.post('/users/register', (req,res) => {
    let loginFromBody = req.body.login;
    let emailFromBody = req.body.email;
    let passwordFromBody = req.body.password;
    let EstValide = true;
    let objectToReturn;
    db.query("SELECT username, email FROM user", function(err, result){
        if (err) return res.status(500).json("Erreur MySQL");
        result.forEach(dataObject => {
            if (loginFromBody == dataObject.username || emailFromBody == dataObject.email){
                EstValide = false
            }
        });
        if (EstValide){
            db.query(`INSERT INTO user (username, email, password) VALUES (${mysql.escape(loginFromBody)}, ${mysql.escape(emailFromBody)}, ${mysql.escape(MD5(passwordFromBody).toString())})`, function(err, result){
                if (err) {
                    res.status(500).json("Erreur MySQL");
                } else {
                    res.status(200).json("Inscription réussie!");
                }
            })
        } else {
            res.status(500).json("Login/Email déjà utilisé!");
        }
    })
    
})

app.post('/users/qrcode', (req,res) => {
    let loginFromBody = req.body.login;
    let codeFromBody = req.body.code;
    let IdCode = 0;
    let IdUser = 0;
    let CodeExiste = false;
    let UtilisateurPossedeDejaCode = true;
    db.query("SELECT id, code FROM qrcode", function(err, result){
        if (err) return res.status(500).json("Erreur MySQL");
        result.forEach(dataObject => {
            if (codeFromBody == dataObject.code){
                CodeExiste = true;
                IdCode = dataObject.id;
            }
        });
        db.query("SELECT id, username FROM user", function(err, result){
            if (err) return res.status(500).json("Erreur MySQL");
            result.forEach(dataObject => {
                if (loginFromBody == dataObject.username){
                    IdUser = dataObject.id;
                }
            });
        db.query(`SELECT user_id, qrcode_id FROM user_qrcode WHERE user_id = ${IdUser} AND qrcode_id = ${IdCode}`, function(err, result){
            if (err) return res.status(500).json("Erreur MySQL");
                if (result.length == 0){
                    UtilisateurPossedeDejaCode = false;
                }
                if (CodeExiste && !UtilisateurPossedeDejaCode){
                    db.query(`INSERT INTO user_qrcode (user_id, qrcode_id) VALUES (${IdUser}, ${IdCode})`, function(err, result){
                        if (err) {
                            res.status(500).json("Erreur MySQL");
                        } else {
                            res.status(200).json("Association réussie!");
                        }
                    })
                } else {
                    if (!CodeExiste){
                        res.status(500).json("Ce code n'existe pas");
                    } else if (UtilisateurPossedeDejaCode){
                        res.status(500).json("L'utilisateur possède déjà ce code de réduction");
                    } else {
                        res.status(500).json("Erreur MySQL");
                    }
                }
            });
        
    })
    
    
})

})

//Données de la base -- /users
app.get('/users', (req,res) => {
    db.query("SELECT username, email FROM user", function(err, result){
        if (err) return res.status(500).json("Erreur MySQL");
        let usersToReturn = [];
        result.forEach(dataObject => {
            let userTrav = {username: dataObject.username, email: dataObject.email}
            usersToReturn.push(userTrav);
        });
        res.status(200).json(usersToReturn);
    })
    
})

//Données de la base -- /users/{mail}
app.get('/users/:mail', (req,res) => {
    db.query(`SELECT username, email FROM user WHERE email= ` + mysql.escape(req.params.mail), function(err, result){
        if (err) return res.status(500).json("Erreur MySQL");
        if (result.length == 1){
            let userTrav = {username: result[0].username, email: result[0].email}
            res.status(200).json(userTrav);
        } else if (result.length == 0){
            res.status(404).json("Aucun résultat");
        }
    })
})

//Données de la base -- /qrcodes
app.get('/qrcodes', (req,res) => {
    db.query(`SELECT promotion_code, description, start_date, end_date FROM qrcode`, function(err, result){
        if (err) return res.status(500).json("Erreur MySQL");
        let qrcodesToReturn = [];
        result.forEach(dataObject => {
            let qrcode = {promotion_code: dataObject.promotion_code, description: dataObject.description, start_date: new Date(dataObject.start_date), end_date: new Date(dataObject.end_date)};
            qrcodesToReturn.push(qrcode);
        })
        if (qrcodesToReturn.length > 0){
            res.status(200).json(qrcodesToReturn);
        } else {
            res.status(404).json("Aucun résultat");
        }
    })
    
})

//Données de la base -- /qrcodes/{code}
app.get('/qrcodes/:code', (req,res) => {
    db.query(`SELECT code, promotion_code, description, start_date, end_date FROM qrcode WHERE code= ` + mysql.escape(req.params.code), function(err, result){
        if (err) return res.status(500).json("Erreur MySQL");
        if (result.length == 1){
            let qrcodeTrav = {promotion_code: result[0].promotion_code, description: result[0].description, start_date: new Date(result[0].start_date), end_date: new Date(result[0].end_date)};
            res.status(200).json(qrcodeTrav);
        } else if (result.length == 0){
            res.status(404).json("Aucun résultat");
        }
    })
})

//Données de la base -- /users/{mail}/qrcodes
app.get('/users/:mail/qrcodes', (req,res) => {
    db.query(`select email, promotion_code, description, start_date, end_date from user inner join user_qrcode on user.id = user_qrcode.user_id inner join qrcode on user_qrcode.qrcode_id = qrcode.id where user.email= `+ mysql.escape(req.params.mail), function(err, result){
        if (err) return res.status(500).json("Erreur MySQL");
        let qrcodesToReturn = [];
        result.forEach(dataObject => {
            let qrcodeTrav = {promotion_code: dataObject.promotion_code, description: dataObject.description, start_date: new Date(dataObject.start_date), end_date: new Date(dataObject.end_date)};
            qrcodesToReturn.push(qrcodeTrav);
        });
        if (qrcodesToReturn.length > 0){
            res.status(200).json(qrcodesToReturn);
        } else {
            res.status(404).json("Aucun résultat");
        }
    })
})

app.listen(3000, () => {
    console.log(`Server-status : ON`)
  })
