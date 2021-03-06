<h3>UNICEF MADAGASCAR</h3>
<br/>
<h4 style="text-align:center">FICHE INDIVIDUELLE D'INVENTAIRE<h4>
<br/>
<br/>
<p><span style="text-decoration: underline">Nom et prenom</span>: {{$holder->firstName}} {{$holder->lastName}}</p>
<p><span style="text-decoration:underline">Titre</span>: {{$holder->title}}</p>
<p><span style="text-decoration:underline">Section</span>: {{$holder->section->sectionname}}</p>
<br/>
<div class="container">
        <table border="1" width="100%">
            <thead>
            <tr>
                <th>Inventory Tag</th>
                <th>AMR</th>
                <th>Type</th>
                <th>Model</th>
                <th>Serial Number</th>
            </tr>
            </thead>
            <tbody id="assetsTable">
            @foreach($assets as $asset)
            <tr>
                <td>{{$asset->inventorytag}}</td>
                <td>{{$asset->amr}}</td>
                <td>{{$asset->assettype->typename}}</td>
                <td>{{$asset->assetmodel->modelname}}</td>
                <td>{{$asset->serialnumber}}</td>
            </tr>
            @endforeach
            </tbody>
        <table>
</div>

<div>
    <p>CONDITIONS D'UTILISATION:</p>
    <p>Je, soussigné, atteste que:</p>
    <ol type=1>
        <li>Je suis responsable de (ou des) l’équipement (s) que l’UNICEF a mis à ma disposition (y compris les accessoires qui viennent avec) et le(s) retournerai a la demande du bureau ou lorsque mes fonctions ne nécessitent plus leur usage.</li>
        <li>J’utiliserai l’équipement suivant le document « Standards of Electronic Conduct».</li>
        <li>En cas de perte ou de détérioration de(s) l’équipement(s), je m’engagerai à me soumettre aux directives du comité PSB pour tout remplacement ou remboursement.</li>
        <li>En apposant ma signature sur cette fiche de prêt, j’affirme que j’ai lu et j'accepte les conditions susmentionnées. </li>
    </ol>
<br/>

    <p>Signature de l'utilisateur:  ___________________________________   Date : __________________ </p>
    <p>Matériels fournis par: ______________________________________   Date : __________________ </p>
    <p>Approuvé par : ___________________________________________   Date : __________________ </p>
</div>
