<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pagination
 *
 * @author MIRADO
 */
class Pagination {
    //put your code here
    private $sizeAll;
    private $sizePage;
    private $first;
    private $last;
    private $sizeConfig;
    
    function __construct() {
        
    }

    function getSizeAll() {
        return $this->sizeAll;
    }

    function getFirst() {
        return $this->first;
    }

    function getLast() {
        return $this->last;
    }

    function getSizeConfig() {
        return $this->sizeConfig;
    }

    function setSizeAll($sizeAll) {
        $this->sizeAll = $sizeAll;
    }

    function setFirst($first) {
        
        if($first <= 0){
            $this->first = 1;
            return;
        }
        
        else if(($first >= ($this->sizePage - $this->sizeConfig) )) {
            if(($this->sizePage - $this->sizeConfig) == 0){
                $this->first = 1;
                return;
            }
            $this->first = ($this->sizePage - $this->sizeConfig);
            return;
        }
        
        else{
            $this->first = $first;
        }
        
    }

    function setLast($last) {
        $this->last = $last;
    }
    function calculLast() {
        $this->last = $this->first + $this->sizeConfig;
        if($this->last > $this->sizePage){
            $this->last = $this->sizePage;
        }
    }

    function setSizeConfig($sizeConfig) {
        $this->sizeConfig = $sizeConfig;
    }
    
    function getSizePage() {
        return $this->sizePage;
    }

    function setSizePage($sizeTable) {
        if($sizeTable == 2){
            $this->sizePage = $this->sizeAll;
            return;
        }
        
        //pas de repetition
        $norepeat = ceil($this->sizeAll / $sizeTable);
        
        //ajouter les surplus par repetitions
//        ceil($norepeat / $this->sizeConfig);
        $this->sizePage = $norepeat + ceil($norepeat / $sizeTable) + 1;
    }

    function getMinimumMultiple($a){
        
        while ($a%$this->sizeConfig!=0){
            $a--;
        }
        return $a;
    }

}
