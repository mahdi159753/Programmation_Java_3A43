/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.prosit1010;

/**
 *
 * @author gth
 */
public class Test {
    public static void main(String[] args){
        Departement dep1=new Departement(1,"Data Science");
        Departement dep2=new Departement(2,"Big Data");
        Departement dep3=new Departement(3,"Data Science");
        
        Employe emp2=new Employe(2,"Empl002","Ala", "Ser");
        Employe emp1=new Employe(1,"Empl001","Al", "Serges");
        Employe emp3=new Employe(5,"Empl003","Alai", "Se");
        Employe emp4=new Employe(50,"Empl004","Alain55", "Sges");
        Employe emp5=new Employe(3,"Empl005","Alain12", "Sers");
        
        SocieteTreeMap shm=new SocieteTreeMap();
        shm.ajouterEmployeDepartement(emp1, dep1);
        shm.ajouterEmployeDepartement(emp2, dep2);
        shm.ajouterEmployeDepartement(emp3, dep1);
        shm.ajouterEmployeDepartement(emp4, dep3);
        
        
        System.out.println("---Employes et Leurs Departements");
        shm.afficherLesEmployesLeursDepartements();
        
        System.out.println("List des Employes---");
        shm.afficherLesEmployes();
        System.out.println("---List des Departements---");
        shm.afficherLesDepartements();
        System.out.println("---Dep de emp1---");
        shm.afficherDepartement(emp1);
        System.out.println("---Dep de emp5---");
        System.out.println("Emcherche emp5:"+shm.rechercherEmploye(emp5));
        System.out.println("Recherche dep1:"+shm.rechercherDepartement(dep1));
        shm.supprimerEmploye(emp3);
        System.out.println("---Employes et Leurs Departements---");
        shm.afficherLesEmployesLeursDepartements();
        
    }
}
