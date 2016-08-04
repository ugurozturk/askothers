<?php

/**
 * Class Songs
 * This is a demo Model class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Model;

use Mini\Core\Model;

class Languages extends Model
{
    public function getAllLanguages()
    {
        $sql = "SELECT language_id, language_detail FROM languages";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addLanguages($language_detail)
    {
        $sql = "INSERT INTO languages (language_detail) VALUES (:language_detail)";
        $query = $this->db->prepare($sql);
        $parameters = array(':language_detail' => $language_detail);

        $query->execute($parameters);
    }

    public function deleteLanguages($language_id)
    {
        $sql = "DELETE FROM languages WHERE language_id = :language_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':language_id' => $language_id);

        $query->execute($parameters);
    }

    public function getLanguages($language_id)
    {
        $sql = "SELECT language_id, language_detail FROM languages WHERE language_id = :language_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_type_id' => $user_type_id);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function updateLanguages($language_id, $language_detail)
    {
        $sql = "UPDATE languages SET language_detail = :language_detail WHERE language_id = :language_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':language_id' => $language_id, ':language_detail' => $language_detail);

        $query->execute($parameters);
    }

    public function getAmountOfLanguages()
    {
        $sql = "SELECT COUNT(language_id) AS amount_of_languages FROM languages";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_languages;
    }
}
