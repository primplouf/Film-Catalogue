<?php

require_once("Vote.class.php");

class VoteManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->_db = $db;
  }

  public function addFilm(Vote $vote)
  {
    $q = $this->_db->prepare('INSERT INTO vote(film_id, user_id) VALUES(:film_id, :user_id)');

    $q->bindValue(':film_id', $vote->film_id());
    $q->bindValue(':user_id', $vote->user_id());

    return $q->execute();
  }

  public function updateFilm(Vote $vote)
  {
    $q = $this->_db->prepare('UPDATE vote SET film_id WHERE id = :id');

    $q->bindValue(':film_id', $vote->film_id());
    $q->bindValue(':id', $vote->user_id());

    return $q->execute();
}
?>