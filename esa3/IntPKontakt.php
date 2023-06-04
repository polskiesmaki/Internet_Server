interface IntPKontakt {
public function getRolle(): string;
public function toString(): string;
}

class Projektkontakt implements IntPKontakt {
private $rolle = "keine";
private $vname;
private $nname;
private $email;
private $tnr;

public function __construct($vname, $nname, $email, $tnr) {
$this->vname = $vname;
$this->nname = $nname;
$this->email = $email;
$this->tnr = $tnr;
}

public function getRolle(): string {
return $this->rolle;
}

public function toString(): string {
// Gib alle relevanten Daten des Projektkontakts in einem Satz aus, einschließlich der Rolle
return "Projektkontakt: Vorname: " . $this->vname . " Nachname: " . $this->nname . " E-Mail: " . $this->email . "
Telefonnummer: " . $this->tnr . " Rolle: " . $this->rolle;
}
}

class TeamProjektkontakt implements IntPKontakt {
private $rolle;
private $vname;
private $nname;
private $email;
private $tnr;

public function __construct($vname, $nname, $email, $tnr, $rolle) {
$this->rolle = $rolle;
$this->vname = $vname;
$this->nname = $nname;
$this->email = $email;
$this->tnr = $tnr;
}

public function getRolle(): string {
return $this->rolle;
}

public function toString(): string {
// Gib alle relevanten Daten des TeamProjektkontakts in einem Satz aus, einschließlich der Rolle
return "TeamProjektkontakt: Vorname: " . $this->vname . " Nachname: " . $this->nname . " E-Mail: " . $this->email . "
Telefonnummer: " . $this->tnr . " Rolle: " . $this->rolle;
}
}