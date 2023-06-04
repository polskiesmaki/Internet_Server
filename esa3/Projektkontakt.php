<?php declare(strict_types=1);
class Projektkontakt implements IntPKontakt
{
    public $rolle = "keine";
    public $vorname;
    public $nachname;
    public $email;
    public $telefonnummer;

    public function getRolle(): string
    {
        return $this->rolle;
    }

    public function toString(): string
    {
        // Gib alle relevanten Daten des Projektkontakts in einem Satz aus, einschließlich der Rolle
        return "Projektkontakt: Vorname: " . $this->vorname . " Nachname: " . $this->nachname . " E-Mail: " . $this->email . "
Telefonnummer: " . $this->telefonnummer . " Rolle: " . $this->rolle;
    }
}