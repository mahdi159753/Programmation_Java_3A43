package com.mycompany.prosit1010;

import java.util.HashMap;
import java.util.HashSet;
import java.util.Map;
import java.util.Set;

/**
 *
 * @author gth
 */
public class SocieteHashMap implements InterfaceSociete{
    Map<Employe,Departement> shm;
    
    public SocieteHashMap(){
        shm=new HashMap<Employe,Departement>();
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
