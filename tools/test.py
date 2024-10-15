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
    f.write("insert into pointage values ")
    for i in range(1005,2007):
        for j in range(1827):
            jours_conge = random.randint(25, 55)
            date_debut = random_date()
            date_fin = date_debut + timedelta(days=random.randint(1,1))

            nbr_jours = (date_fin - date_debut).days
            if date_debut<datetime(2024,5,1,0,0,0):
                statut = random.choice(["Approuvé", "Refusé"])
            else:
                statut = random.choice(["Approuvé", "En attente", "Refusé"])
            sql = f"({i}, '{date_debut}', '{date_fin}', {nbr_jours}, '{statut}', {jours_conge}),\n"
            f.write(sql)

        f.write(";")

