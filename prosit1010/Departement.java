/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.prosit1010;

/**
 *
 * @author gth
 * @version 1.0.0
 * 
 */
public class Departement {
    private int id;
    private String nom;
    
    public Departement(int id, String nom) {
        this.id = id;
        this.nom = nom;
    }

    public Departement() {
    }

    public int getId() {
        return id;
    }

    public String getNom() {
        return nom;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    @Override
    public boolean equals(Object obj) {
        if(obj==null) return false;
        if(!(obj instanceof Departement)) return false;
        if(!(((Departement)obj).getId()==this.id)) return false;
        return true; 
    }

    @Override
    public String toString() {
        return "Departement["+this.id+","+this.nom+"]";
    }
}
