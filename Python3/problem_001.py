#encoding:utf8
import time

below = 1000
num1 = 3
num2 = 5
tot = 0

if __name__ == "__main__":
    itime=time.time()
    tot = sum(x for x in range(1,below) if x%num1 == 0 or x%num2 == 0)
    ftime=time.time()
    print("Method 1 - sum array elements")
    print("The sum of the multiples is:",tot)
    print("Total time to find solution method 1 was",ftime-itime,"seconds")
