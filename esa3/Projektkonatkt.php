<?php
class Projektkontakt implements IntPKontakt
{
    private $rolle = "keine";
    private $vname;
    private $nname;
    private $email;
    private $tnr;

    public function __construct($vname, $nname, $email, $tnr)
    {
        $this->vname = $vname;
        $this->nname = $nname;
        $this->email = $email;
        $this->tnr = $tnr;
    }

    public function getRolle(): string
    {
        return $this->rolle;
    }

    public function toString(): string
    {
        // Gib alle relevanten Daten des Projektkontakts in einem Satz aus, einschließlich der Rolle
        return "Projektkontakt: Vorname: " . $this->vname . " Nachname: " . $this->nname . " E-Mail: " . $this->email . "
Telefonnummer: " . $this->tnr . " Rolle: " . $this->rolle;
    }
}