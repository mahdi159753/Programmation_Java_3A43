/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prositMap;

/**
 *
 * @author SALMA
 */
public interface InterfaceSociete {

    public void ajouterEmployeDepartement(Employé e, Département d);

    public void supprimerEmploye(Employé e);

    public void afficherLesEmployesLeursDepartements();

    public void afficherLesEmployes();

    public void afficherLesDepartements();

    public void afficherDepartement(Employé e);

    public boolean rechercherEmploye(Employé e);

    public boolean rechercherDepartement(Département e);
}
