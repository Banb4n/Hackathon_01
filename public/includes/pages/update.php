<?php

if(isset($_POST)) {
//    print_r($_POST) . PHP_EOL;
    echo serialize($_POST['user']);
    echo '<br />';
    echo serialize($_POST['repos']);
    echo '<br />';
    $arguments['user'] = $_POST['user'];
    $arguments['repos'] = $_POST['repos'];
    $arguments['gists'] = ["limit" => "D-3", "show"];

     print_r($arguments);
    echo "<br />";
    echo "Array ( [user] => Array ( [0] => avatar_url [1] => login [2] => followers [3] => following [4] => public_repos [5] => public_gists ) [repos] => Array ( [limit] => F-3 [0] => show ) [gists] => Array ( [limit] => D-3 [0] => show ) ) ";
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
<!--            <div class="input-field col s6">-->
<!--                <select>-->
<!--                    <option value="" disabled selected>Choose your option</option>-->
<!--                    <option value="1">Option 1</option>-->
<!--                    <option value="2">Option 2</option>-->
<!--                    <option value="3">Option 3</option>-->
<!--                </select>-->
<!--                <label>Materialize Select</label>-->
<!--            </div>-->
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