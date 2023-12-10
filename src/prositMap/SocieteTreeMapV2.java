/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prositMap;

import java.util.HashMap;
import java.util.HashSet;
import java.util.Map;
import java.util.Set;
import java.util.TreeMap;

/**
 *
 * @author SALMA
 */
public class SocieteTreeMapV2 implements InterfaceSociete {

    Map<Département, HashSet<Employé>> hm;

    public SocieteTreeMapV2() {

        hm = new TreeMap<Département, HashSet<Employé>>(      );

    }

    @Override
    public void ajouterEmployeDepartement(Employé e, Département d) {

        if (hm.containsKey(d)) {
              if(! rechercherEmploye(e))
            hm.get(d).add(e);
        } else {
            HashSet<Employé> s = new HashSet<Employé>();
            s.add(e);
            hm.put(d, s);

        }

    }

    @Override
    public void supprimerEmploye(Employé e) {

        for (HashSet<Employé> s : hm.values()) {
            s.remove(e);
        }
        /*
for(Département d: hm.keySet()){
    hm.get(d).remove(e);
}

for( Map.Entry<Département, HashSet<Employé>>  ent : hm.entrySet()){
    ent.getValue().remove(e);
}*/
    }

    @Override
    public void afficherLesEmployesLeursDepartements() {

        System.out.println("---------------------------- aff non perso ----------------------");
        System.out.println(hm);
        System.out.println("---------------------------- aff  perso ----------------------");

        for (Département d : hm.keySet()) {
            System.out.println(" le département : " + d.toString());
            System.out.println(" les employés de ce département :");
            for (Employé e : hm.get(d)) {
                System.out.println(e.toString());
            }

        }

    }

    @Override
    public void afficherLesEmployes() {

        System.out.println("------------------ aff sans red----------------");
        HashSet<Employé> s = new HashSet<Employé>();

        for (HashSet<Employé> hs : hm.values()) {
            s.addAll(hs);
        }

        for (Employé e : s) {
            System.out.println(e.toString());
        }
        for (HashSet<Employé> hs : hm.values()) {
            s.addAll(hs);
        }
        System.out.println("------------------ aff sous reserve de la condition ------------------");
        for (HashSet<Employé> hs : hm.values()) {
            for (Employé e : hs) {
                System.out.println(e.toString());

            }
        }

    }

    @Override
    public void afficherLesDepartements() {

        for (Département d : hm.keySet()) {
            System.out.println(d.toString());
        }

    }

    @Override
    public void afficherDepartement(Employé e) {

        for (Département d : hm.keySet()) {
            if (hm.get(d).contains(e)) {
                System.out.println(" le département de l'employé " + e.toString()
                        + ", est : " + d.toString());
            }

        }
    }

    @Override
    public boolean rechercherEmploye(Employé e) {

        for (Département d : hm.keySet()) {
            if (hm.get(d).contains(e)) {
                return true;
            }

        }
        return false;

    }

    @Override
    public boolean rechercherDepartement(Département d) {

        return hm.containsKey(d);

    }

}
