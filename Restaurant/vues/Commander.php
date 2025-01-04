<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commander</title>
    <link rel="stylesheet" href="../Restaurant/CSS/style.css">
</head>
<body>
    <?php include_once "inclusions/Entete/enteteCommander.php" ?>
    
    <section class="ubereats">
    <h1 style="text-align: center;">Commander</h1>
    <form method="post" action="?action=ajouterCommande">
        <h2>Choisissez votre Combo</h2>
        <article class="section-form">
            <label for="name">Entrez votre nom :</label>
            <input type="text" name="name" id="name" required>
            <br>
            <label>
                <div class="border">
                    <div class="imgCentered">
                        <img src="images/VeganCombo.png" width="70">
                    </div>
                    <div class="textCentrer">
                        <input type="checkbox" name="combo[]" value="vegancombo">
                        Combo Végétalien - 30.00 $
                    </div>
                </div>
            </label>
            <br>
            <label>
                <div class="border">
                    <div class="imgCentered">
                        <img src="images/MeatCombo.png" width="70">
                    </div>
                    <div class="textCentrer">
                        <input type="checkbox" name="combo[]" value="meatcombo">
                        Combo Viande - 45.00 $
                    </div>
                </div>
            </label>
        </article>

        <div class="section-form">
            <h2>Choisissez vos Boissons</h2>
            <label>
                <input type="checkbox" name="drink[]" value="cock">
                Coca-Cola
            </label>
            <br>
            <label>
                <input type="checkbox" name="drink[]" value="pepsi">
                Pepsi
            </label>
            <br>
            <label>
                <input type="checkbox" name="drink[]" value="crush">
                Crush
            </label>
            <br>
            <label>
                <input type="checkbox" name="drink[]" value="orangejuice">
                Jus d'Orange
            </label>
            <br>
            <label>
                <input type="checkbox" name="drink[]" value="applejuice">
                Jus de Pomme
            </label>
        </div>

        <div class="section-form">
            <button type="submit">Passer la commande</button>
        </div>
    </form>
    </section>
    <?php include_once "inclusions/Pied/pied.php" ?>
    <canvas id="flocon"></canvas>


<script>

const canvas = document.getElementById('flocon');
const ctx = canvas.getContext('2d');


canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

const NOMBRE_FLOCONS = 100; 
const flocons = [];


function aleatoire(min, max) {
    return Math.random() * (max - min) + min;
}


class Flocon {
    constructor() {
        this.x = aleatoire(0, canvas.width);
        this.y = aleatoire(0, canvas.height);
        this.taille = aleatoire(2, 5);
        this.vitesseY = aleatoire(1, 3);
        this.vitesseX = aleatoire(-1, 1);
    }

    dessiner() {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.taille, 0, Math.PI * 2);
        ctx.fillStyle = '#fff';
        ctx.fill();
    }

    mettreAJour() {
        this.y += this.vitesseY;
        this.x += this.vitesseX;

        
        if (this.y > canvas.height) {
            this.y = 0;
            this.x = aleatoire(0, canvas.width);
        }

        this.dessiner();
    }
}


function initialiserFlocons() {
    for (let i = 0; i < NOMBRE_FLOCONS; i++) {
        flocons.push(new Flocon());
    }
}

function animer() {
    ctx.clearRect(0, 0, canvas.width, canvas.height); 
    flocons.forEach(flocon => flocon.mettreAJour());
    requestAnimationFrame(animer);
}


window.addEventListener('resize', () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    flocons.length = 0; 
    initialiserFlocons();
});


initialiserFlocons();
animer();
</script>

</body>
</html>