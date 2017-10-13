<?php

if(isset($_POST)) {
    $arguments['user'] = $_POST['user'];
    $arguments['repos'] = ["limit" => "D-3"];
    $arguments['gists'] = ["limit" => "D-3", "show"];

    array_push($arguments['repos'], $_POST['repos'][0]);

    $serveur = str_replace('index.php','',$_SERVER['SCRIPT_URI']);
}

?>
<!-- form for update infos -->
<div class="card z-depth-4">
    <form class="container" action="#" method="post">
        <div class="row">
            <div class="input-field col s12">
                <input id="userName" name="userName" type="text" class="validate" value="Banb4n">
                <label for="userName">@userName</label>
            </div>
        </div>
        <div class="row">
            <div class="col s4">
                <p>
                    <input type="checkbox" id="displayUserName" checked="checked" name="user[]" value="login" />
                    <label for="displayUserName">Afficher le userName : </label>
                </p>
                <p>
                    <input type="checkbox" id="displayPicsProfil" checked="checked" name="user[]" value="avatar_url" />
                    <label for="displayPicsProfil">Afficher la photo de profil : </label>
                </p>
            </div>
            <div class="col s4">
                <p>
                    <input type="checkbox" id="displayFollowers" checked="checked" name="user[]" value="followers" />
                    <label for="displayFollowers">Afficher le total de followers : </label>
                </p>
                <p>
                    <input type="checkbox" id="displayFollowings" checked="checked" name="user[]" value="following" />
                    <label for="displayFollowings">Afficher le total de followers : </label>
                </p>
            </div>
            <div class="col s4">
                <p>
                    <input type="checkbox" id="displayRepos" checked="checked" name="user[]" value="public_repos" />
                    <label for="displayRepos">Afficher les depôts : </label>
                </p>
                <p>
                    <input type="checkbox" id="displayGists" checked="checked" name="user[]" value="public_gists" />
                    <label for="displayGists">Afficher les gists : </label>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <select name="repos[]">
                    <option value="" disabled selected>Afficher la liste des dépôts</option>
                    <option value="show" selected>Show</option>
                    <option value="hide">Hide</option>
                </select>
                <label for="displayList">Afficher la liste des dépôts</label>
            </div>
            <p class="col s4 offset-s1">
                <input type="checkbox" id="extends" checked="checked" name="extends" value="true" />
                <label for="extends">Génèrez le code HTML : </label>
            </p>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea id="textarea1" class="materialize-textarea" readonly></textarea>
                <label for="textarea1">Code HTML à intégrer</label>
            </div>
        </div>

<!--        <div class="row">-->
<!--            <div class="input-field col s12">-->
<!--                <input id="password" type="password" class="validate">-->
<!--                <label for="password">Password</label>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row">-->
<!--            <div class="input-field col s12">-->
<!--                <input id="email" type="email" class="validate">-->
<!--                <label for="email">Email</label>-->
<!--            </div>-->
<!--        </div>-->
        <div class="row">
            <div class="col s3 offset-s9">
                <button class="btn waves-effect waves-light" type="submit">Submit
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Go to update -->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large waves-effect waves-light red" href="?page=home" title="home page">
        <i class="large material-icons">home</i>
    </a>
</div>