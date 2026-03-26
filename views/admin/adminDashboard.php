<?php

$title = 'Dashboard Admin';

$pageCss = '<link rel="stylesheet" href="../../public/css/dashboardAdmin.css">';

include 'adminHeader.php';
?> 

<body>

    <div class="body-section">
        <div class="sidebar-section">
            <div>
               <h2><a href="/admin-dashboard">All</a></h2>
               <h2><a href="/admin-users">Utilisateurs</a></h2>
               <h2><a href="/admin-reviews">Avis</a></h2>
               <h2><a href="/admin-contact">Contact</a></h2>
            </div>
            <button>Deconnecter</button>
        </div>
        <div class="collection-section">
            <div class="boad">
                <h1>46</h1>
                <h3>Utilisateurs</h3>
            </div>
            <div class="boad">
                <h1>10</h1>
                <h3>Avis</h3>
            </div>
            <div class="boad">
                <h1>20</h1>
                <h3>Contacts</h3>
            </div>
        </div>
    </div>
</body>