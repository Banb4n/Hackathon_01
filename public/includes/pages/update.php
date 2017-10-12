<!-- form for update infos -->
<div class="card z-depth-4">
    <form class="container">
        <div class="row">
            <div class="input-field col s12">
                <input id="userName" name="userName" value="" type="text" class="validate">
                <label for="userName">@userName</label>
            </div>
        </div>
        <div class="row">
            <div class="col s4">
                <p>
                    <input type="checkbox" id="displayUserName" checked="checked" name="name" value="name" />
                    <label for="displayUserName">Afficher le userName : </label>
                </p>
                <p>
                    <input type="checkbox" id="displayPicsProfil" checked="checked" name="avatar_url" value="avatar_url" />
                    <label for="displayPicsProfil">Afficher la photo de profil : </label>
                </p>
            </div>
            <div class="col s4">
                <p>
                    <input type="checkbox" id="displayFollowers" checked="checked" name="followers" value="followers" />
                    <label for="displayFollowers">Afficher le total de followers : </label>
                </p>
                <p>
                    <input type="checkbox" id="displayFollowings" checked="checked" name="following" value="following" />
                    <label for="displayFollowings">Afficher le total de followers : </label>
                </p>
            </div>
            <div class="col s4">
                <p>
                    <input type="checkbox" id="displayRepos" checked="checked" name="public_repos" value="public_repos" />
                    <label for="displayRepos">Afficher les depôts : </label>
                </p>
                <p>
                    <input type="checkbox" id="displayGists" checked="checked" name="public_gists" value="public_gists" />
                    <label for="displayGists">Afficher les gists : </label>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <select>
                    <option value="" disabled selected>Afficher la liste des dépôts</option>
                    <option value="show">Show</option>
                    <option value="hide">Hide</option>
                </select>
                <label>Afficher la liste des dépôts</label>
            </div>
            <div class="input-field col s6">
                <select>
                    <option value="" disabled selected>Choose your option</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
                <label>Materialize Select</label>
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
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Go to update -->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red" href="?page=home" title="home page">
        <i class="large material-icons">home</i>
    </a>
</div>