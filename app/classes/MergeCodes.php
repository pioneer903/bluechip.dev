<?php 
/*
   * To change this license header, choose License Headers in Project Properties.
   * To change this template file, choose Tools | Templates
   * and open the template in the editor.
   */

  /**
   * Description of MergeCodes
   *
   * @author ershovsw
   */
  class MergeCodes {

    var $first_name;
    var $last_name;
    var $camp_year;
    var $season;
    var $graduation_year;
    var $payment_due_date;
    var $token;

    public function __construct( $player, $season, $token) {
      
      $this->first_name = $player->first_name;
      $this->last_name = $player->last_name;
      $this->camp_year = $season->grad_year;
      $this->season = $season->season;
      $this->graduation_year = $player->graduation_year;
      $this->payment_due_date = $player->payment_due_date;
      $this->token = URL::to('link').'/'.$token;
      
    }

    public function transform($text) {
      
      $text = preg_replace_callback('/\{\{([^}]+)\}\}/', array(&$this, "search_cb"), $text);
      return $text;
    }

    public function search_cb($match) {
      
      if (property_exists($this, str_replace('-', '_', $match[1])))
        return $this->{str_replace('-', '_', $match[1])};
    }

  }

 ?>