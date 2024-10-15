import random 
import hashlib
import random
import string
def no_spaces(s):
    s=s.replace(" ","",s.count(" "))
    return s
def md5(pas):
    h=hashlib.new("MD5")
    h.update(pas.encode())
    hash=h.hexdigest()
    return hash
def random_date():
    y=random.randint(1990,2024)
    m=random.randint(1,12)
    if m in [1,3,5,7,8,10,12]:
        d=random.randint(1,31)
    elif m in [4,6,9,11]:
        d=random.randint(1,30)
    elif y%4==0:
        d=random.randint(1,29)
    else:
        d=random.randint(1,28)
    if m<=9:
        m=str(m)
        m="0"+m
    if d<=9:
        d=str(d)
        d="0"+d
    y=str(y)
    m=str(m)
    d=str(d)
    return y+"-"+m+"-"+d
def random_password():
    alphabet = string.ascii_letters + string.digits
    password = alphabet[random.randint(0, len(alphabet)-1)]
    for i in range(7):
        password += alphabet[random.randint(0, len(alphabet)-1)]
    return password
men=["Ahmed", "Mohamed", "Hassan", "Omar", "Youssef", "Karim", "Abdelaziz", "Khalid", "Mustapha", "Hamza", "Rachid", "Amine", "Said", "Adil", "Anas", "Reda", "Younes", "Mehdi", "Ismail", "Abdelkader", "Jamal", "Noureddine", "Tarik", "Abderrahmane", "Abdelilah", "Brahim", "Yassin", "Fouad", "Abdou", "Mounir", "Yahya", "Kamal", "Aziz", "Hicham", "Nabil", "Mohammed", "Lahcen", "Mohcine", "Othmane", "Youness", "Sofiane", "Adnane", "Tariq", "Houssine", "Jawad", "Badr", "Saad", "Noureddine", "Yassine"]
women=["Fatima", "Khadija", "Amina", "Samira", "Zahra", "Safia", "Malika", "Sanaa", "Meriem", "Hafsa", "Salma", "Fadwa", "Soukaina", "Latifa", "Ibtissam", "Nawal", "Rajaa", "Hanane", "Siham", "Naima", "Rania", "Houda", "Asmaa", "Fatiha", "Loubna", "Nadia", "Hajar", "Imane", "Nisrine", "Noura", "Saida", "Nadia", "Sanae", "Rabia", "Ahlam", "Nour", "Karima", "Nadia", "Nadia", "Nadia", "Nadia", "Nadia", "Nadia", "Nadia", "Nadia", "Nadia", "Nadia", "Nadia", "Nadia"]
lname=["Alami", "Benabdallah", "Chami", "Dahbi", "El Amrani", "Fassi", "Ghazali", "Hassani", "Idrissi", "Jebbour", "Kabbaj", "Lazaar", "Mansouri", "Najjar", "Ouahabi", "Rahmani", "Safi", "Tazi", "Zeroual", "Bakkali", "Chaoui", "El Bouazzaoui", "Fakir", "Guerrouj", "Hamdouchi", "Jamai", "Kadiri", "Lamrani", "Mekkaoui", "Nouiri", "Ouazzani", "Rachidi", "Saidi", "Talbi", "Zidane", "Bensaid", "Daoudi", "El Idrissi", "Fassi-Fihri", "Ghalam", "Hassouni", "Jouini", "Kassimi", "Laaroussi", "Moussaoui", "Nasri", "Ouakili", "Rochdi"]
domain=["gmail","hotmail","outlook","yahoo"]
civil=["Célibataire","Marié(e)","Divorcé(e)","Voeuf(ve)"]
f = open("text.txt", "w")
f.write("insert into employe (nom, prenom, sexe, date_embauche, email, etat_civil ,mdp) values ")
for i in range(1000):
    g=random.randint(1,2)
    if g==1:
        nom=lname[random.randint(0,47)]
        prenom=men[random.randint(0,48)]
        mdp=md5(random_password())
        sql="('"+nom+"','"+prenom+"','"+"M"+"','"+random_date()+"','"+no_spaces(prenom+'.'+nom+str(random.randint(0,100))+"@"+domain[random.randint(0,3)]+".com")+"','"+civil[random.randint(0,3)]+"','"+mdp+"'),\n"
        f.write(sql)
    else:
        nom=lname[random.randint(0,47)]
        prenom=women[random.randint(0,48)]
        mdp=md5(random_password())
        sql="('"+nom+"','"+prenom+"','"+"F"+"','"+random_date()+"','"+no_spaces(prenom+'.'+nom+str(random.randint(0,100))+"@"+domain[random.randint(0,3)]+".com")+"','"+civil[random.randint(0,3)]+"','"+mdp+"'),\n"
        f.write(sql)
f.close()
print(sql)