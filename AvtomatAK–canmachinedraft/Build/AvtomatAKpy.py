# Superprogram

suroviny = ["energetak", "cola", "tonic"]
dny = ["pondeli","utery"]
slazeni = ["bezcukru","scukrem"]
#Algoritmus
if input("Chcete použít AVtomatAK? (ANO/NE)") == "ANO":
  print("\nZde je dostupné zboží: " + str(suroviny))

  for JednotliveJidlo in suroviny: 
    if input("") in suroviny:
      print("Chvíli strpení, pracuji")

      
      if input("\nPotvrtďte zda nakupujete zboží. (ANO/NE) ") == "ANO":
        print("\nDalší produkty: " +str(suroviny))
      else:
        print("Pokračujte")

        
      if input("\nNakoupili jste, co potřebujete? (ANO/NE)") == "ANO":
        print("Vraťte se pro Energetak nebo Colu zas!")
       
      else:
        if input("\nJe to vše? (ANO/NE) ") == "NE":
         print("\nChcete koupit další produkt?: " +str(suroviny))
        
        

    else:
      print("Tento produkt nemáme. Vyberte jiný: ")  

else:
  print("Děkuji, vrať se k AVtomatuAK zas.")
