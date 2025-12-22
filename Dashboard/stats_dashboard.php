<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assests/style.css">
    <title>Document</title>
</head>

<body>
    <?php require_once '../Infrastructure/header.php' ?>
    <main class="container fade-in">
        <h2 class="page-title">Statistiques du Tableau de Bord</h2>

        <section class="grid-kpi">
            <div class="kpi-card">
                <h4>Nombre Total de Cours</h4>
                <p><?php require_once 'Total_Cours.php' ?></p>
            </div>
            <div class="kpi-card">
                <h4>Total des Utilisateurs</h4>
                <p><?php require_once 'Total_Users.php' ?></p>
            </div>

            <div class="kpi-card">
                <h4>Total des Inscriptions</h4>
                <p><?php require_once 'Total_Inscriptions_cours.php' ?></p>
            </div>

            <div class="kpi-card">
                <h4>Cours le Plus Populaire</h4>
                <p><?php require_once 'Cours_Populaire.php' ?></p>
            </div>
        </section>

        <section class="grid-tables">

            <div class="card">
                <h3>Nombre Moyen de Sections par Cours</h3>
                <div class="big-stat"><?php require_once 'Moyen_Sections_Cours.php'; ?></div>
            </div>

            <div class="card">
                <h3>Cours Ayant Plus de 5 Sections</h3>
                <?php require_once 'Cours_Ayant_Sections.php'; ?>
            </div>
            <div class="card">
                <h3>Utilisateurs Inscrits cette Année</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Utilisateur</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ahmed</td>
                            <td>2025-01-15</td>
                        </tr>
                        <tr>
                            <td>Sara</td>
                            <td>2025-02-02</td>
                        </tr>
                        <tr>
                            <td>Yassine</td>
                            <td>2025-03-10</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card">
                <h3>Cours Sans Inscription</h3>
                <ul class="list">
                    <?php require_once 'Cours_Sans_Inscription.php'; ?>
                </ul>
            </div>

            <div class="card">
                <h3>Dernières Inscriptions</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Utilisateur</th>
                            <th>Cours</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php require_once '../Dashboard/Dernières_Inscriptions.php' ?>
                    </tbody>
                </table>
            </div>

        </section>
    </main>
    <?php require_once '../Infrastructure/footer.php' ?>
</body>

</html>