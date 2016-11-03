#include<stdio.h>
#include <iostream>
#define X 0
using namespace std;
int main(void)
{
int a1[] = { 1,2,3,4,5 };
int a2[] = { 5,2,3,1,0 };
int *p[] = { a1, a2};
printf("%d\n", **p**p[!X]);
system("Pause");
return 0;
}
