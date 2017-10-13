<?php
/**
 * Created by PhpStorm.
 * User: hysterias
 * Date: 12/10/17
 * Time: 18:30
 */

namespace FJA;


class Request
{
    public $user;

    public $arguments;

    /**
     * Request constructor.
     * @param $user
     * @param $arguments
     */
    public function __construct($user, $arguments)
    {
        $this->user = $user;
        $this->arguments = unserialize($arguments);
    }


    public function snippetsLite()
    {
        $token = "f99cb33f9c2608fd26d8a7b4338368fd71b821bd"; //token fantasia
        $returnDiv = "";
        $prenom = $this->user;
        $url = 'https://api.github.com/users/Cerynna';
        $user = curl_init();
        curl_setopt($user, CURLOPT_URL, 'https://api.github.com/users/Cerynna');
        curl_setopt($user, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($user, CURLOPT_HEADER, 0);
        curl_setopt($user, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; fr; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13');
        curl_setopt($user, CURLOPT_HTTPHEADER, array('Content-Type: application/json', "Authorization: Bearer $token"));
        $dataUser = curl_exec($user);
        curl_close($user);
        $arrayUser = json_decode($dataUser);


        $repos = curl_init();
        curl_setopt($repos, CURLOPT_URL, "$arrayUser->repos_url");
        curl_setopt($repos, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($repos, CURLOPT_HEADER, 0);
        curl_setopt($repos, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; fr; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13');
        curl_setopt($repos, CURLOPT_HTTPHEADER, array('Content-Type: application/json', "Authorization: Bearer $token"));
        $dataRepos = curl_exec($repos);
        curl_close($repos);
        $arrayRepos = json_decode($dataRepos);
        foreach ($arrayRepos as $key => $array) {
            $sort[$key] = strtotime($array->pushed_at);
            //$returnDiv .= $array->pushed_at . PHP_EOL;
        }
        array_multisort($sort, SORT_DESC, $arrayRepos);


        $linkGists = preg_replace("/(\{.*?\})/", "", $arrayUser->gists_url);
        $gists = curl_init();
        curl_setopt($gists, CURLOPT_URL, "$linkGists");
        curl_setopt($gists, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($gists, CURLOPT_HEADER, 0);
        curl_setopt($gists, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; fr; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13');
        curl_setopt($gists, CURLOPT_HTTPHEADER, array('Content-Type: application/json', "Authorization: Bearer $token"));
        $dataGists = curl_exec($gists);
        curl_close($gists);
        $arrayGists = json_decode($dataGists);

        foreach ($arrayUser as $key => $value) {
            if (in_array($key, $this->arguments['user'])) {
                $arrayFinal['user'][$key] = $value;
            }
        }
        $limitRepos = $this->arguments['repos']['limit'];


        $limiterRepos = explode("-", $limitRepos);
        $nbRepos = $arrayUser->public_repos - 1;
        if ($limiterRepos[0] == "D") {
            for ($i = 0; $i < $limiterRepos[1]; $i++) {
                $arrayFinal['repos'][$i] = $arrayRepos[$i];
            }
        }
        if ($limiterRepos[0] == "F") {
            for ($i = $nbRepos; $i > ($nbRepos - $limiterRepos[1]); $i--) {
                $arrayFinal['repos'][$i] = $arrayRepos[$i];
            }

        }
        $limitGists = $this->arguments['gists']['limit'];
        $limiterGists = explode("-", $limitGists);
        $nbGists = $arrayUser->public_repos - 1;
        if ($limiterGists[0] == "D") {
            for ($i = 0; $i < $limiterGists[1]; $i++) {
                $arrayFinal['gists'][$i] = $arrayGists[$i];
            }
        }
        if ($limiterGists[0] == "F") {
            for ($i = $nbGists; $i > ($nbGists - $limiterGists[1]); $i--) {
                $arrayFinal['gists'][$i] = $arrayGists[$i];
            }
        }


        $returnDiv .= "<div class=\"app z-depth-4\">" . PHP_EOL;
        $returnDiv .= "<div class=\"appHeader\">" . PHP_EOL;
        if (in_array("avatar_url", $this->arguments['user'])) {
            $returnDiv .= "<img src=\"" . $arrayFinal['user']['avatar_url'] . "\" alt=\"imgProfil\" class=\"circle\" width=\"120px\" height=\"120px\">" . PHP_EOL;
        }
        $returnDiv .= "<div class=\"infos\">" . PHP_EOL;
        if (in_array("name", $this->arguments['user'])) {
            $returnDiv .= "<span class=\"userName\">" . $arrayFinal['user']['name'] . "</span>" . PHP_EOL;
        }
        $returnDiv .= "<div class=\"appFollow\">" . PHP_EOL;
        if (in_array("followers", $this->arguments['user'])) {
            $returnDiv .= "<span class=\"followers chip\">Followers : " . $arrayFinal['user']['followers'] . "</span>" . PHP_EOL;
        }
        $returnDiv .= "<br>" . PHP_EOL;
        if (in_array("following", $this->arguments['user'])) {
            $returnDiv .= "<span class=\"following chip\">Following : " . $arrayFinal['user']['following'] . "</span>" . PHP_EOL;
        }
        $returnDiv .= "</div></div></div>" . PHP_EOL;
        $returnDiv .= "<div class=\"divider\"></div>" . PHP_EOL;
        $returnDiv .= "<div class=\"appRepos\">" . PHP_EOL;
        $returnDiv .= "<div class=\"countCreate\">" . PHP_EOL;
        if (in_array("public_repos", $this->arguments['user'])) {
            $returnDiv .= "<p class=\"countRepos chip\">Depots : " . $arrayFinal['user']['public_repos'] . "</p>" . PHP_EOL;
        }
        if (in_array("public_gists", $this->arguments['user'])) {
            $returnDiv .= "<p class=\"countGists chip\">Gists : " . $arrayFinal['user']['public_gists'] . "</p>" . PHP_EOL;
        }
        $returnDiv .= "</div>" . PHP_EOL;
        $returnDiv .= "<div class=\"divider\"></div>" . PHP_EOL;
        $returnDiv .= "<div class=\"deposApp\">" . PHP_EOL;
        if (in_array("show", $this->arguments['repos'])) {
            $returnDiv .= "<span>Les derniers depos :</span>" . PHP_EOL;
            $returnDiv .= "<ul>" . PHP_EOL;
            foreach ($arrayFinal['repos'] as $key => $arrayOneRepos) {
                $returnDiv .= "<li>" . $arrayOneRepos->name . "</li>" . PHP_EOL;
            }
            $returnDiv .= "</ul>" . PHP_EOL;
        }
        $returnDiv .= "</div>" . PHP_EOL;
        $returnDiv .= "</div>" . PHP_EOL;
        $returnDiv .= "<div class=\"divider\"></div>" . PHP_EOL;
        $returnDiv .= "<div class=\"appFooter center\">" . PHP_EOL;
        $returnDiv .= "<a class=\"waves-effect waves-light btn modal-trigger\" href=\"#modal1\">Click here for more details</a>" . PHP_EOL;
        $returnDiv .= "</div>" . PHP_EOL;
        $returnDiv .= "</div>" . PHP_EOL;

        //$returnDiv .= "";
        return $returnDiv;


    }


    public function snippetsFat()
    {
        $token = "f99cb33f9c2608fd26d8a7b4338368fd71b821bd"; //token fantasia
        $returnDiv = "";
        $prenom = $this->user;
        $url = 'https://api.github.com/users/Cerynna';
        $user = curl_init();
        curl_setopt($user, CURLOPT_URL, 'https://api.github.com/users/Cerynna');
        curl_setopt($user, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($user, CURLOPT_HEADER, 0);
        curl_setopt($user, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; fr; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13');
        curl_setopt($user, CURLOPT_HTTPHEADER, array('Content-Type: application/json', "Authorization: Bearer $token"));
        $dataUser = curl_exec($user);
        curl_close($user);
        $arrayUser = json_decode($dataUser);
        $returnDiv = serialize($arrayUser);


        $repos = curl_init();
        curl_setopt($repos, CURLOPT_URL, "$arrayUser->repos_url");
        curl_setopt($repos, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($repos, CURLOPT_HEADER, 0);
        curl_setopt($repos, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; fr; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13');
        curl_setopt($repos, CURLOPT_HTTPHEADER, array('Content-Type: application/json', "Authorization: Bearer $token"));
        $dataRepos = curl_exec($repos);
        curl_close($repos);
        $arrayRepos = json_decode($dataRepos);
        foreach ($arrayRepos as $key => $array) {
            $sort[$key] = strtotime($array->pushed_at);
            //$returnDiv .= $array->pushed_at . PHP_EOL;
        }
        array_multisort($sort, SORT_DESC, $arrayRepos);


        $linkGists = preg_replace("/(\{.*?\})/", "", $arrayUser->gists_url);
        $gists = curl_init();
        curl_setopt($gists, CURLOPT_URL, "$linkGists");
        curl_setopt($gists, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($gists, CURLOPT_HEADER, 0);
        curl_setopt($gists, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; fr; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13');
        curl_setopt($gists, CURLOPT_HTTPHEADER, array('Content-Type: application/json', "Authorization: Bearer $token"));
        $dataGists = curl_exec($gists);
        curl_close($gists);
        $arrayGists = json_decode($dataGists);

        foreach ($arrayUser as $key => $value) {
            if (in_array($key, $this->arguments['user'])) {
                $arrayFinal['user'][$key] = $value;
            }
        }
        $limitRepos = $this->arguments['repos']['limit'];


        $limiterRepos = explode("-", $limitRepos);
        $nbRepos = $arrayUser->public_repos - 1;
        if ($limiterRepos[0] == "D") {
            for ($i = 0; $i < $limiterRepos[1]; $i++) {
                $arrayFinal['repos'][$i] = $arrayRepos[$i];
            }
        }
        if ($limiterRepos[0] == "F") {
            for ($i = $nbRepos; $i > ($nbRepos - $limiterRepos[1]); $i--) {
                $arrayFinal['repos'][$i] = $arrayRepos[$i];
            }

        }
        $limitGists = $this->arguments['gists']['limit'];
        $limiterGists = explode("-", $limitGists);
        $nbGists = $arrayUser->public_repos - 1;
        if ($limiterGists[0] == "D") {
            for ($i = 0; $i < $limiterGists[1]; $i++) {
                $arrayFinal['gists'][$i] = $arrayGists[$i];
            }
        }
        if ($limiterGists[0] == "F") {
            for ($i = $nbGists; $i > ($nbGists - $limiterGists[1]); $i--) {
                $arrayFinal['gists'][$i] = $arrayGists[$i];
            }
        }


        $returnDiv .= "<div id=\"modal1\" class=\"modal bottom-sheet\">" . PHP_EOL;

        $returnDiv .= "<div class=\"modal-header\">" . PHP_EOL;
        $returnDiv .= "<h4>Détails du compte github de " . $arrayFinal['user']['name'] . "</h4>" . PHP_EOL;
        $returnDiv .= "<a href=\"#!\" class=\"modal-action modal-close waves-effect waves-green btn-flat\"><i class=\"material-icons\">close</i></a>" . PHP_EOL;
        $returnDiv .= "</div>" . PHP_EOL;

        $returnDiv .= "<div class=\"modal-content\">" . PHP_EOL;

        $returnDiv .= "<ul id=\"tabs-swipe-demo\" class=\"tabs tabs-fixed-width\">" . PHP_EOL;
        $returnDiv .= "<li class=\"tab\"><a href=\"#test-swipe-1\">repos</a></li>" . PHP_EOL;
        $returnDiv .= "<li class=\"tab\"><a href=\"#test-swipe-2\">gists</a></li>" . PHP_EOL;
        $returnDiv .= "</ul>" . PHP_EOL;

        $returnDiv .= "<div id=\"test-swipe-1\" class=\"col s12 slideDetails\">" . PHP_EOL;

        $returnDiv .= "<ul class=\"collapsible popout\" data-collapsible=\"accordion\">" . PHP_EOL;

        foreach($arrayFinal['repos'] as $key => $arrayOneRepos) {
            
            $returnDiv .= "<li>" . PHP_EOL;
            $returnDiv .= "<div class=\"collapsible-header\"><i class=\"material-icons\">filter_drama</i>@depot1</div>" . PHP_EOL;
            $returnDiv .= "<div class=\"collapsible-body\"><span>Lorem ipsum dolor sit amet.</span></div>" . PHP_EOL;
            $returnDiv .= "</li>" . PHP_EOL; 
            
        }
        

        $returnDiv .= "</ul>" . PHP_EOL;

        $returnDiv .= "</div>" . PHP_EOL;

        $returnDiv .= "<div id=\"test-swipe-2\" class=\"col s12 slideDetails\">" . PHP_EOL;

        $returnDiv .= "<ul class=\"collapsible popout\" data-collapsible=\"accordion\">" . PHP_EOL;
        foreach($arrayFinal['gists'] as $key => $arrayOneGists) {
            $returnDiv .= "<li>" . PHP_EOL;
            $returnDiv .= "<div class=\"collapsible-header\"><i class=\"material-icons\">filter_drama</i>@gist1</div>" . PHP_EOL;
            $returnDiv .= "<div class=\"collapsible-body\"><span>Lorem ipsum dolor sit amet.</span></div>" . PHP_EOL;
            $returnDiv .= "</li>" . PHP_EOL;
        }
        

        $returnDiv .= "</ul>" . PHP_EOL;

        $returnDiv .= "</div>" . PHP_EOL;
        $returnDiv .= "</div>" . PHP_EOL;
        $returnDiv .= "</div>" . PHP_EOL;
        //$returnDiv .= "";


        /* <div id="modal1" class="modal bottom-sheet">
        <div class="modal-header">
            <h4>Détails du compte github de @userName</h4>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><i class="material-icons">close</i></a>
        </div>
        <div class="modal-content">
            <ul id="tabs-swipe-demo" class="tabs tabs-fixed-width">
                <li class="tab"><a href="#test-swipe-1">repos</a></li>
                <li class="tab"><a href="#test-swipe-2">gists</a></li>
            </ul>
    <!--    depot     -->
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
    <!--   Gist     -->
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
    </div>*/
        return $returnDiv;


    }
}







