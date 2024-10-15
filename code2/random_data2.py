import random
import hashlib
from datetime import datetime, timedelta

def md5(pas):
    h = hashlib.new("MD5")
    h.update(pas.encode())
    return h.hexdigest()

def random_date():
    y = random.randint(1990,2024)
    m = random.randint(1, 12)
    
    if m in [1, 3, 5, 7, 8, 10, 12]:
        d = random.randint(1, 31)
    elif m in [4, 6, 9, 11]:
        d = random.randint(1, 30)
    elif y % 4 == 0:
        d = random.randint(1, 29)
    else:
        d = random.randint(1, 28)
        
    return datetime(y,m,d)

with open("sql3.txt", "w") as f:
    f.write("insert into conge (emp_id, date_debut, date_fin, nbr_jours, statut, jours_conge) values ")
    emp=[]
    for i in range(5000):
        id_emp = random.randint(1005,2007)
        if id_emp in emp:
            continue
        emp.append(id_emp)
        jours_conge = random.randint(5, 30)
        date_debut = random_date()
        date_fin = date_debut + timedelta(days=random.randint(1, jours_conge))

        nbr_jours = (date_fin - date_debut).days

        statut = random.choice(["Approuvé", "En attente", "Refusé"])

        sql = f"({id_emp}, '{date_debut}', '{date_fin}', {nbr_jours}, '{statut}', {jours_conge}),\n"
        f.write(sql)

    f.write(";")

