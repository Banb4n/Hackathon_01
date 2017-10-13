<!-- display home page -->
<?php
require 'vendor/autoload.php';

use FJA\Request;

$arguments['user'] = ["avatar_url", "name", "followers", "following", "public_repos", "public_gists"];
$arguments['repos'] = ["limit" => "F-3", "hide"];
$arguments['gists'] = ["limit" => "D-3", "show"];

$lol = new Request("Banb4n", serialize($arguments));

echo $lol->snippetsLite();
?>

<?php /*include "snippets.php?user=Banb4n&var=a:2:{s:8:"userName";s:6:"Banb4n";s:4:"user";a:6:{i:0;s:4:"name";i:1;s:10:"avatar_url";i:2;s:9:"followers";i:3;s:9:"following";i:4;s:12:"public_repos";i:5;s:12:"public_gists";}}"; */?>


<!-- Go to update -->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red waves-effect waves-light" href="?page=update" title="updateDisplay">
        <i class="large material-icons">mode_edit</i>
    </a>
</div>

<!-- Modal for view more details -->
<div id="modal1" class="modal bottom-sheet">
    <div class="modal-header">
        <h4>Détails du compte github de @userName</h4>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><i class="material-icons">close</i></a>
    </div>
    <div class="modal-content">
        <ul id="tabs-swipe-demo" class="tabs tabs-fixed-width">
            <li class="tab"><a href="#test-swipe-1">Les dépôts : </a></li>
            <li class="tab"><a href="#test-swipe-2">Les gists : </a></li>
        </ul>
<!--    depot     -->
        <div id="test-swipe-1" class="col s12 slideDetails">
            <ul class="collapsible popout" data-collapsible="accordion">
                <!--  Tu boucle sur celle la  -->
                <li>
                    <div class="collapsible-header hoverable blue white-text">
                        <div>
                            <h5><i class="material-icons">folder</i>@name</h5>
                        </div>
                        <span class="lastCommit">Last updated : @pushed_at</span>
                    </div>
                    <div class="collapsible-body">
                        <div class="center">
                            <span>Liens du dépôt : @html_url</span>
                        </div>
                    </div>
                    <div class="collapsible-footer">
                        <div class="chip red white-text">
                            @language
                        </div>
                        <span>@forks Forks</span>
                    </div>
                </li>

            </ul>
        </div>
<!--   Gist     -->
        <div id="test-swipe-2" class="col s12 slideDetails">
            <ul class="collapsible popout" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header hoverable green white-text">
                        <div>
                            <h5><i class="material-icons">description</i>@filename</h5>
                        </div>
                        <span class="lastCommit">Last updated : @updated_at</span>
                    </div>
                    <div class="collapsible-body">
                        <div class="center">
                            <a href="@html_url" class="" >Liens du gists : @html_url</a>
                        </div>
                    </div>
                    <div class="collapsible-footer">
                        <div class="chip red white-text">
                            @language
                        </div>
                        <span>@forks Forks</span>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>