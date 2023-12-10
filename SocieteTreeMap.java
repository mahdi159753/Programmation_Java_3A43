/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.prosit1010;

import java.util.HashMap;
import java.util.HashSet;
import java.util.Map;
import java.util.Set;
import java.util.TreeMap;

/**
 *
 * @author gth
 */
public class SocieteTreeMap implements InterfaceSociete{

    Map<Employe,Departement> shm;
    
    public SocieteTreeMap(){
        shm=new TreeMap<Employe,Departement>();
    }
    

    @Override
    public void ajouterEmployeDepartement(Employe e, Departement d) {
        shm.put(e, d);
    }

    @Override
    public void supprimerEmploye(Employe e) {
        shm.remove(e);
    }

    @Override
    public void afficherLesEmployesLeursDepartements() {
        //Methode 1
        /*for(Map.Entry<Employe,Departement> entry: shm.entrySet()){
            System.out.println(entry.getKey().toString());
            System.out.println(entry.getValue().toString());
        }*/
        
        //Methode 2
        for(Employe emp:shm.keySet()){
            System.out.println(emp.toString());
            System.out.println(shm.get(emp).toString());
        }
    }

    @Override
    public void afficherLesEmployes() {
        for(Employe emp:shm.keySet()){
            System.out.println(emp.toString());
        }
    }

    @Override
    public void afficherLesDepartements() {
        /*for(Employe emp:shm.keySet()){
            System.out.println(shm.get(emp).toString());
        }*/
        
        //Methode 2 sans redondance
        Set<Departement> dep=new HashSet<Departement>();
        dep.addAll(shm.values());
        
        for(Departement d: dep){
            System.out.println(d.toString());
        }
    }

    @Override
    public void afficherDepartement(Employe e) {
        if(!(shm.containsKey(e))) System.out.println("Employe inexistant");
        else{
            System.out.println(shm.get(e).toString());
        }
    }

    @Override
    public boolean rechercherEmploye(Employe e) {
        return shm.containsKey(e);
    }

    @Override
    public boolean rechercherDepartement(Departement e) {
        return shm.containsValue(e);
    }
    
}
