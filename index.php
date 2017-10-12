<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Snippets Github API's</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <!-- Personal stylesheet -->
    <link rel="stylesheet" href="public/assets/css/main.css">
</head>
<body>

<main class="containerHome" id="">
    <div class="app">
        <!--  Pics and username github  -->
        <div class="appHeader">
            <img src="public/images/picsProfil.png" alt="imgProfil" class="circle" width="120px" height="120px">
            <div class="infos">
                <span class="userName">@userName</span>
                <!--  Followers and following  -->
                <div class="appFollow">
                    <span class="followers">@followers</span>
                    <br>
                    <span class="following">@following</span>
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <!--  The last repos  -->
        <div class="appRepos">
            <div class="countCreate">
                <p class="countRepos">@repos</p>
                <p class="countGists">@gists</p>
            </div>
            <div class="divider"></div>

            <div class="deposApp">
                <span>Les derniers depos :</span>
                <!--  Loop for display the lasts repos  -->
                <ul>
                    <li>@nomDuDêpot</li>
                    <li>@nomDuDêpot</li>
                    <li>@nomDuDêpot</li>
                </ul>
            </div>
        </div>
        <div class="divider"></div>
        <div class="appFooter center">
            <!-- Modal Trigger -->
            <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Click here for more details</a>
        </div>
    </div>

</main>
<!-- Modal Structure -->
<div id="modal1" class="modal bottom-sheet">
    <div class="modal-header">
        <h4>Détails du compte github de @userName</h4>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><i class="material-icons">close</i></a>
    </div>
    <div class="modal-content">
        <ul id="tabs-swipe-demo" class="tabs tabs-fixed-width">
            <li class="tab"><a href="#test-swipe-1">repos</a></li>
            <li class="tab"><a href="#test-swipe-2">gists</a></li>
        </ul>
        <div id="test-swipe-1" class="col s12 slideDetails">
            <ul class="collapsible popout" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header"><i class="material-icons">filter_drama</i>@depot1</div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">place</i>@depot2</div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">whatshot</i>@depot3</div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
            </ul>
        </div>
        <div id="test-swipe-2" class="col s12 slideDetails">
            <ul class="collapsible popout" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header"><i class="material-icons">filter_drama</i>@gist1</div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">place</i>@gist2</div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">whatshot</i>@gist3</div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
            </ul>
        </div>

    </div>
</div>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<!-- Import main.js -->
<script src="public/assets/js/main.js"></script>
</body>
</html>