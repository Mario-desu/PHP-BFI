"use strict"

function shoppingcart(){
    let output="";
    let total=0;
    
    // mehrere Elemente mit der class Bestellung werden durchlaufen und angepasst(Farbe //z.B.)
    let inputfield=document.getElementsByClassName("bestellung");
    //https://www.mediaevent.de/javascript/for-loop.html
    for(let counter=0;counter<inputfield.length;counter++){
    /*
    -length returns the items of a node list
    -for(let startwert=0;startwert<Bedingung.length;counter++)
    -Schleife wird bei 0 initialisiert (1.Element), die Anweisungen der Schleife werden solange durchlaufen wie diese Bedingung erfüllt ist, um 1 wird erhöht(++)
    -Die for-Iteration wird eingesetzt, wenn die Zahl der Durchläufe im Vorherein bekannt ist – z.B. bei Arrays, deren Länge per arr.length abgefragt wird.*/
        
        let amount=parseInt(  inputfield[counter].value ); //eingetragene Menge 
        let price=parseFloat(  inputfield[counter].getAttribute("data-preis") );
        //Preis
        let result=amount*price;
        //ergebnis zur gesamtsumme addieren
        let info=inputfield[counter].getAttribute("data-info");
        
        
        if(amount>0){
        
            total=total+result;// nur wenn amount >0
            //bei jeder Schleife wird resultat zum vorigen Taotal addiert
            output=output+amount+" "+info+" "+result+"<br>";// das was im data-info //drinnen steht angezeigt, wenn amount >0,  output=output --> damit //vorheriger Output stehen bleibt 
            }        
    }//for Ende
    output=output+"<hr>Total: "+total;
    //output=output --> damit vorheriger output stehenbleibt
    
    
    document.getElementById("test").innerHTML=output;
    //aktuellster output wird in div eingefügt
    
}

//Node Liste (Sammlung von HTML-Elementen, Node (=Knoten, hier ein HTML-Element im DOM)
//Klassen Name    (Hintergrund)
let clsBestellung=document.getElementsByClassName("bestellung");// Variable erstellen, Elemente holen
    
for(let counter=0;counter<clsBestellung.length;counter++){
    clsBestellung[counter].onchange=shoppingcart;
    //wenn man eingetragen wird, wird Funktion "shoppingcart" aktiviert
}
