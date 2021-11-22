import os

for i in os.listdir('.'):
    if os.path.isdir(i):
        x = 1
        for j in os.listdir(i):
            os.rename(i + "/" + j, i + "/" + str(x) + ".png")
            x += 1
