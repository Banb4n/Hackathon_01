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
        $returnDiv = "";
        $prenom = $this->user;
        $url = 'https://api.github.com/users/Cerynna';
        $user = curl_init();
        curl_setopt($user, CURLOPT_URL, 'https://api.github.com/users/Cerynna');
        curl_setopt($user, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($user, CURLOPT_HEADER, 0);
        curl_setopt($user, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; fr; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13');
        curl_setopt($user, CURLOPT_HTTPHEADER, array('Content-Type: application/json', "Authorization: Bearer f7e6e0bdbf3c19ef8af5635c38a0057d68b9c416"));
        $dataUser = curl_exec($user);
        curl_close($user);
        $arrayUser = json_decode($dataUser);
        $returnDiv = serialize($arrayUser);



        $repos = curl_init();
        curl_setopt($repos, CURLOPT_URL, "$arrayUser->repos_url");
        curl_setopt($repos, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($repos, CURLOPT_HEADER, 0);
        curl_setopt($repos, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; fr; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13');
        curl_setopt($repos, CURLOPT_HTTPHEADER, array('Content-Type: application/json', "Authorization: Bearer f7e6e0bdbf3c19ef8af5635c38a0057d68b9c416"));
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
        curl_setopt($gists, CURLOPT_HTTPHEADER, array('Content-Type: application/json', "Authorization: Bearer f7e6e0bdbf3c19ef8af5635c38a0057d68b9c416"));
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
}







