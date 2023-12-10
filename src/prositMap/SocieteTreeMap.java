/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prositMap;

import java.util.HashMap;
import java.util.HashSet;
import java.util.Iterator;
import java.util.Map;
import java.util.Set;
import java.util.TreeMap;

/**
 *
 * @author SALMA
 */
public class SocieteTreeMap implements InterfaceSociete {

    Map<Employé, Département> hm;

    public SocieteTreeMap() {
        hm = new TreeMap<Employé, Département>(   new ComparerParNom()    );

    }

    @Override
    public void ajouterEmployeDepartement(Employé e, Département d) {
        hm.put(e, d);

    }

    @Override
    public void supprimerEmploye(Employé e) {
        hm.remove(e);

    }

    @Override
    public void afficherLesEmployesLeursDepartements() {
        System.out.println("-------------------------------aff non perso -------------------------");
        System.out.println(hm);
        System.out.println("-------------------------------aff perso -------------------------");

        for (Map.Entry<Employé, Département> ent : hm.entrySet()) {
            System.out.println("l'employé : " + ent.getKey()
                    + ", son département : " + ent.getValue());
        }

        /*      //m2
        for (Employé e : hm.keySet()) {
            System.out.println("l'employé : " + e.toString()
                    + ", son département : " + hm.get(e));
        }
         */
    }

    @Override
    public void afficherLesEmployes() {
        for (Employé e : hm.keySet()) {
            System.out.println(e.toString());
        }

    }

    @Override
    public void afficherLesDepartements() {

        System.out.println("----------------- avec red ------------------");
        for (Map.Entry<Employé, Département> ent : hm.entrySet()) {
            System.out.println(ent.getValue());
        }
        /*//m2
        for (Employé e : hm.keySet()) {
            System.out.println(hm.get(e));
        }
        //m3
        for (Département d : hm.values()) {
            System.out.println(d.toString());

        }
        //m4

        Iterator<Département> it = hm.values().iterator();
        while (it.hasNext()) {
            System.out.println(it.next());

        }
         */
        System.out.println("----------------- sans red ------------------");
        Set<Département> s = new HashSet<Département>();
        /*   for (Map.Entry<Employé, Département> ent : hm.entrySet()) {
            s.add(ent.getValue());
        }*/
        s.addAll(hm.values());
        for (Département d : s) {
            System.out.println(d.toString());
        }

    }

    @Override
    public void afficherDepartement(Employé e) {
        System.out.println("le départment de l'employé " + e.toString()
                + ", est : " + hm.get(e).toString());

    }

    @Override
    public boolean rechercherEmploye(Employé e) {

        return hm.containsKey(e);

    }

    @Override
    public boolean rechercherDepartement(Département e) {
        return hm.containsValue(e);

    }

}
