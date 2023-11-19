/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.prosit1010;

/**
 *
 * @author gth
 * @date 22-11-19
 * @verion 1.0.0
 * 
 */
public class Employe implements Comparable<Employe>{
    private int cin;
    private String matricule;
    private String nom;
    private String prenom;
    
    
    public int getCin() {
        return cin;
    }

    public String getMatricule() {
        return matricule;
    }

    public String getNom() {
        return nom;
    }

    public String getPrenom() {
        return prenom;
    }

    public void setCin(int cin) {
        this.cin = cin;
    }

    public void setMatricule(String matricule) {
        this.matricule = matricule;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public void setPrenom(String prenom) {
        this.prenom = prenom;
    }

    public Employe(int cin, String matricule, String nom, String prenom) {
        this.cin = cin;
        this.matricule = matricule;
        this.nom = nom;
        this.prenom = prenom;
    }
    public Employe() {
    }
    
    
    @Override
    public boolean equals(Object o){
        if(o==null) return false;
        if(!(o instanceof Employe)) return false;
        if(!(((Employe)o).getCin()==this.cin)) return false;
        return true;
    }
    
    @Override
    public String toString(){
        return "Employe["+this.cin+","+this.matricule+","+this.nom+","+this.prenom+"]";
    }

    @Override
    public int compareTo(Employe emp) {
        return this.cin-emp.getCin();
    }
    
}
