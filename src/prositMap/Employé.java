/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prositMap;

import java.util.Objects;

/**
 *
 * @author SALMA
 */
public class Employé /*implements Comparable<Employé>*/{
   private int cin;
    private String matricule , nom, prenom;

    public int getCin() {
        return cin;
    }

    public void setCin(int cin) {
        this.cin = cin;
    }

    public String getMatricule() {
        return matricule;
    }

    public void setMatricule(String matricule) {
        this.matricule = matricule;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getPrenom() {
        return prenom;
    }

    public void setPrenom(String prenom) {
        this.prenom = prenom;
    }

    public Employé() {
    }

    public Employé(int cin, String matricule, String nom, String prenom) {
        this.cin = cin;
        this.matricule = matricule;
        this.nom = nom;
        this.prenom = prenom;
    }

    @Override
    public int hashCode() {
        int hash = 5;
        hash = 53 * hash + this.cin;
        hash = 53 * hash + Objects.hashCode(this.matricule);
        return hash;
    }

    @Override
    public boolean equals(Object obj) {
        if (this == obj) {
            return true;
        }
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Employé other = (Employé) obj;
        if (this.cin != other.cin) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "Employé{" + "cin=" + cin + ", matricule=" + matricule + ", nom=" + nom + ", prenom=" + prenom + '}';
    }
/*
    @Override
    public int compareTo(Employé e) {

        return this.cin - e.cin;

    }*/
    
    
    
}
