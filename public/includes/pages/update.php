<!-- form for update infos -->
<div class="card">
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
                    <input type="checkbox" id="displayUserName" checked="checked" />
                    <label for="displayUserName">Afficher le userName : </label>
                </p>
                <p>
                    <input type="checkbox" id="displayPicsProfil" checked="checked" />
                    <label for="displayPicsProfil">Afficher la photo de profil : </label>
                </p>
            </div>
            <div class="col s4">
                <p>
                    <input type="checkbox" id="displayFollowers" checked="checked" />
                    <label for="displayFollowers">Afficher le total de followers : </label>
                </p>
                <p>
                    <input type="checkbox" id="displayFollowings" checked="checked" />
                    <label for="displayFollowings">Afficher le total de followers : </label>
                </p>
            </div>
            <div class="col s4">
                <p>
                    <input type="checkbox" id="displayRepos" checked="checked" />
                    <label for="displayRepos">Afficher les depôts : </label>
                </p>
                <p>
                    <input type="checkbox" id="displayGists" checked="checked" />
                    <label for="displayGists">Afficher les gists : </label>
                </p>
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