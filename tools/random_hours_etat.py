import random 
import hashlib
import random
import string
def no_spaces(s):
    s=s.replace(" ","",s.count(" "))
    return s
def random_time():
    h=random.randint(1,2)
    if h==1:
        return "08-00-00","16-00-00"
    else:
        return "09-00-00","17-00-00"
def random_pay():
    L=[i for i in range(8000,40001,100)]
    return random.choice(L)
def random_vacation():
    L=[i for i in range(25,56,5)]
    return random.choice(L)
f = open("time.txt", "w")
f.write("insert into etat (id_emp, taux_horaire, salaire_brut, cotisations_sociales, jours_conge, heure_debut, heure_fin) values ")
for i in range(1005,2008):
        id=str(i)
        pay=random_pay()
        hourly=pay/(160)
        pay=str(pay)
        hourly=str(hourly)
        tax="0.0674"
        vacation=str(random_vacation())
        start,end=random_time()
        sql="("+id+","+hourly+","+pay+","+tax+","+vacation+",'"+start+"','"+end+"'),"
        f.write(sql)
f.close()
print(sql)