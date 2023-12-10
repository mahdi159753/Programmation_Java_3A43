/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prositMap;

import java.util.Comparator;

/**
 *
 * @author SALMA
 */
public class ComparerParNom implements Comparator<Employé>{

    @Override
    public int compare(Employé e1, Employé e2) {

        return e1.getNom().compareTo(e2.getNom());

    }
    
}
