package tn.esprit.gestionzoo.entities;

class Terrestrial extends Animal {
    int nbrLegs;
    public Terrestrial(int nbrLegs) {
        this.nbrLegs = nbrLegs;
    }
    public int getNbrLegs() {
        return nbrLegs;
    }
    public void setNbrLegs(int nbrLegs) {
        this.nbrLegs = nbrLegs;
    }
}