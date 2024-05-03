<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Facture</h2>
                </div>
                <div class="card-body">
                    <h4>Informations Utilisateur</h4>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Nom:</strong> {{ Auth::user()->name }}</li>
                        <li class="list-group-item"><strong>Prénom:</strong> {{ Auth::user()->prenom }}</li>
                        <li class="list-group-item"><strong>Date de naissance:</strong> {{ Auth::user()->anniversaire }}</li>
                        <li class="list-group-item"><strong>Adresse:</strong> {{ Auth::user()->adresse }}</li>
                        <li class="list-group-item"><strong>Code postal:</strong> {{ Auth::user()->code_postal }}</li>
                        <li class="list-group-item"><strong>Téléphone:</strong> {{ Auth::user()->telephone }}</li>
                        <li class="list-group-item"><strong>Téléphone portable:</strong> {{ Auth::user()->telephone_portable }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ Auth::user()->email }}</li>
                    </ul>
                    <hr>
                    <h4>Commande</h4>
                    <p><strong>Mode de paiement:</strong> {{ $commande->mode_paiement->mode_paiement_en }}</p>
                    <p><strong>Expédition:</strong> {{ $commande->expedition->expedition_en }}</p>
                    <p><strong>Statut:</strong> {{ $commande->statut_commande->statut_en }}</p>
                    <p><strong>Statut:</strong> $ {{ number_format($commande->prix_totale, 0, ',', ' ') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>