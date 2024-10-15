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
f.write("update employe set admin='oui' where")
for i in range(1005,2008):
    x=random.randint(1,10)
    if x==1:
        sql=" id_emp="+str(i)+" and"
        f.write(sql)
f.close()
print(sql)