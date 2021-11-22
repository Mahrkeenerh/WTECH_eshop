import os

for i in os.listdir('.'):
    if os.path.isdir(i):
        for j in os.listdir(i):
            or_name = i + "/" + j
            ne_name = or_name.replace(".png", ".jpg")
            os.rename(or_name, ne_name)
