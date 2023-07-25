<?php
class Article
{
    private $id;
    private $titre;
    private $contenu;

    public function __construct($id, $titre, $contenu)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->contenu = $contenu;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getContenu()
    {
        return $this->contenu;
    }
}
?>