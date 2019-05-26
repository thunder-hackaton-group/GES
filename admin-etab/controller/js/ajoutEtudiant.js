var categorie = document.getElementById('categorie_etudiant');

var changementCategorie = function()
{
    if (categorie.options[categorie.selectedIndex].innerHTML == "Primaire")
    {
        var queryAll1 = document.querySelectorAll('#classe_etudiant .primaire');
        var queryAll2 = document.querySelectorAll('#classe_etudiant .college');
        var queryAll3 = document.querySelectorAll('#classe_etudiant .lycee');

        for (var i=0; i<queryAll1.length; i++)
        {
            queryAll1[i].hidden = false;
        }

        for (var i=0; i<queryAll2.length; i++)
        {
            queryAll2[i].hidden = true;
        }

        for (var i=0; i<queryAll3.length; i++)
        {
            queryAll3[i].hidden = true;
        }
        document.getElementById("classe_etudiant").value = "12ème";
    }

    else if (categorie.options[categorie.selectedIndex].innerHTML == "Collège")
    {
        var queryAll1 = document.querySelectorAll('#classe_etudiant .primaire');
        var queryAll2 = document.querySelectorAll('#classe_etudiant .college');
        var queryAll3 = document.querySelectorAll('#classe_etudiant .lycee');

        for (var i=0; i<queryAll1.length; i++)
        {
            queryAll1[i].hidden = true;
        }

        for (var i=0; i<queryAll2.length; i++)
        {
            queryAll2[i].hidden = false;
        }

        for (var i=0; i<queryAll3.length; i++)
        {
            queryAll3[i].hidden = true;
        }
        document.getElementById("classe_etudiant").value = "6ème";
    }

    else if (categorie.options[categorie.selectedIndex].innerHTML == "Lycée")
    {
        var queryAll1 = document.querySelectorAll('#classe_etudiant .primaire');
        var queryAll2 = document.querySelectorAll('#classe_etudiant .college');
        var queryAll3 = document.querySelectorAll('#classe_etudiant .lycee');

        for (var i=0; i<queryAll1.length; i++)
        {
            queryAll1[i].hidden = true;
        }

        for (var i=0; i<queryAll2.length; i++)
        {
            queryAll2[i].hidden = true;
        }

        for (var i=0; i<queryAll3.length; i++)
        {
            queryAll3[i].hidden = false;
        }
        document.getElementById("classe_etudiant").value = "2nd";
    }
};

categorie.addEventListener('change', changementCategorie);