<!-- Maken van de navigatie bar op de sidebalks met links -->
<?php
include "sql-statements/Database-Connectie.php";
include "sql-statements/sidebar/SQL-category.php"
?>
<nav class="sidebar col-1.9 sidebar">
    <div class="sidebar-sticky nav flex-column" id="Sidebar">
        <a class="nav-item h5"> Categorieën</a>
        <br>
        <!-- link voor elke categorie geeft ook een datagegeven aan de categorie pagina om alleen een query te maken zodat alleen producten van deze categorie getoond worden -->
        <?php
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $StockGroupID = $row["StockGroupID"];
            $StockGroupName = $row["StockGroupName"];
            print(" <a id='Sidebar1' class=\"nav-item\" href=\"categorie.php?StockGroupID={$StockGroupID}\">{$StockGroupName}</a><br>");
        }
        ?>
    </div>
</nav>