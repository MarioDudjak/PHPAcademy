#include<stdio.h>

#include<math.h>
struct Trokut{
       float a;
       float b;
       float c;
       };
float povrsina(Trokut T){
      float s= (T.a+T.b+T.c)/2;
      return sqrt(s*(s-T.a)*(s-T.b)*(s-T.c));}
int main(){
    float a,b,c;
  
    printf("Unesite stranice trokuta \n");
    scanf("%f",&a);
    scanf("%f",&b);
    scanf("%f",&c);
    Trokut T ={a,b,c};
    printf("Povrsina tog trokuta je :%.2f ",povrsina(T));
   
    return 0;
}
