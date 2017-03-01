function showGDD() {
    var plant = document.getElementById("plantSelect").value;
    var GDD;
    switch (plant) {
    case "Witch-hazel":
        GDD = "Begins flowering at <1 GDD";
        break;
    case "Red maple":
        GDD = "Begins flowering at 1-27 GDD";
        break;
    case "Forsythia":
        GDD = "Begin flowering at 1-27 GDD";
        break;
    case "Sugar maple":
        GDD = "Begin flowering at 1-27 GDD";
        break;
    case "Norway maple":
        GDD = "Begins flowering at 30-50 GDD";
        break;
    case "White ash":
        GDD = "Begins flowering at 30-50 GDD";
        break;
    case  "Crabapple":
        GDD = "Begins flowering at 50-80 GDD";
        break;
    case "Common Broom":
        GDD = "Begins flowering at 50-80 GDD";
        break;
    case "Horsechestnut":
        GDD = "Begin flowering at 80-110 GDD";
        break;
    case "Common lilac":
        GDD = "Begin flowering at 80-110 GDD";
        break;
    case "Beach plum":
        GDD = "Full bloom at 80-110 GDD";
        break;
    case "Black locust":
        GDD = "Begins flowering at 140-160 GDD";
        break;
    case  "Catalpa":
        GDD = "Begins flowering at 250-330 GDD"; 
        break;   
    case  "Privet":
        GDD = "Begins flowering at 330-400 GDD"; 
        break;
    case  "Elderberry":
        GDD = "Begins flowering at 330-400 GDD"; 
        break;  
    case  "Purple loosestrife":
        GDD = "Begins flowering at 400-450 GDD"; 
        break;  
    case  "Sumac":
        GDD = "Begins flowering at 450-500 GDD"; 
        break;  
    case  "Butterfly bush":
        GDD = "Begins flowering at 550-650 GDD"; 
        break;  
    case  "Corn (maize)":
        GDD = "800 to 1400 GDD to crop maturity"; 
        break;
    case  "Dry beans":
        GDD = "1100-1300 GDD to maturity depending on cultivar and soil conditions"; 
        break; 
    case  "Sugar Beet":
        GDD = "130 GDD to emergence and 1400-1500 GDD to maturity"; 
        break; 
    case  "Barley":
        GDD = "125-162 GDD to emergence and 1290-1540 GDD to maturity"; 
        break; 
    case  "Wheat (Hard Red)":
        GDD = "143-178 GDD to emergence and 1550-1680 GDD to maturity"; 
        break; 
    case  "Oats":
        GDD = "1500-1750 GDD to maturity"; 
        break; 
    case  "European Corn Borer":
        GDD = "207 - Emergence of first spring moths"; 
        break;                                                   
}

    document.getElementById("gddDetails").innerHTML = GDD;

}