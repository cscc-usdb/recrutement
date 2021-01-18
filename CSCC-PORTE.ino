#include <RFID.h>
#include <SPI.h>
#include <LiquidCrystal_I2C.h>


int cc;
const int p=2;
int UI[5] = {};
char nom[20];
char role[15];

LiquidCrystal_I2C lcd(0x27, 20, 4);
RFID RFID(10, 9);
int b;
int k;
char u[10] = "";
int UID[4] = {};
int KEY[26][5] = {
  {0x84, 0x5B, 0xDF, 0x1E, 0x1E},
  {0x0B, 0x1C, 0x17, 0xA3, 0xA3},
  {0xD9, 0x43, 0x6C, 0x91, 0x67},
  {0x93, 0x10, 0x59, 0xED, 0x37},
  {0x6B, 0x8F, 0x4E, 0x72, 0xD8},
  {0x75, 0x48, 0xB8, 0x0D, 0x88},
  {0xDA, 0xF4, 0x97, 0x03, 0xBA},
  {0xE3 ,0xC2 ,0x58 ,0xED ,0x94},
  {0x97 ,0xA0 ,0xB5 ,0x3C ,0xBE},
  {0xAA, 0xF4, 0x24, 0x1F, 0x65},
  {0x84, 0xE4, 0xC3, 0x1E, 0xBD},
  {0x35, 0xE0, 0x1F, 0xA3, 0x69},
  {0xEA, 0x51, 0xC0, 0x2E, 0x55},
  {0xB1, 0x4E, 0x4D, 0x79, 0xCB},
  {0xB3, 0x35, 0x55, 0xED, 0x3E},
  {0xD1, 0x55, 0x47, 0xAC, 0x6F},
  {0x61, 0xE6, 0x49, 0xAC, 0x62},
  {0x9B, 0x4F, 0x57, 0x72, 0xF1},
  {0x91, 0x36, 0x50, 0xAC, 0x5B},
  {0x25, 0x8D ,0xA3, 0x0D, 0x06},
  {0x88, 0x04, 0x7B, 0x03, 0xF4},
  {0xA7, 0x0E, 0x83, 0x3B, 0x11},
  {0xDD ,0xC1 ,0x86 ,0x49 ,0xD3},
  {0x97 ,0x8C ,0x3E ,0x3B ,0x1E},
  {0x0A ,0x70 ,0x19 ,0x1F ,0x7C},
  {0xC6 ,0xBE ,0x36 ,0x78 ,0x36}
};
const int buzz = A3;
int check_c(int UID[], int KEY[]) {
  for (int i = 0; i <= 4; i++) {
    if (UID[i] != KEY[i])
      return 0;
  }
  return 1;

}
int check_all(int C[],int K[26][5]){
  UI[5] = {};
  b = 0;
for(int i = 0;i<=25;i++){
  for (int j = 0;j<= 4;j++){
    UI[j] = K[i][j];
  }  
  if(check_c(C,UI) == 1){
    b = 1;
    cc = i;
    return b;
  }
}
return b;
  
}


void setup() {
  Serial.begin(9600);
  SPI.begin();
  RFID.init();
  lcd.init();
  lcd.init();
  lcd.backlight();
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Bienvenue");
  pinMode(buzz, OUTPUT);
  pinMode(6, OUTPUT);
  pinMode(7, OUTPUT);
  pinMode(p,OUTPUT);
  digitalWrite(p,1);
}

void loop() {
    if (digitalRead (3) == HIGH)
     ouv();

  if (RFID.isCard()) {

    if (RFID.readCardSerial()) {

      Serial.print("L'UID est : ");

      for (int i = 0; i <= 5; i++)
      {
        UID[i] = RFID.serNum[i];
        strcat(UID[i], u);
        Serial.print(u);
        Serial.print(UID[i], HEX);
        Serial.print(" ");
      }
      int c = check_all(UID, KEY);
      if (c == 1) {
          switch(cc){
            case 0:
                strcpy(nom,"Iniesta");
                strcpy(role,"R.Securite");
                break;
            case 1:
                strcpy(nom,"Besbasa");  
                strcpy(role,"V.President");
                break;
            case 2:
                strcpy(nom,"Lafri  "); 
                strcpy(role,"S.General");
                break;
            case 3:
                strcpy(nom,"Mr Wibou");
                strcpy(role,"President"); 
                break;
            case 4:
                strcpy(nom,"Maria");     
                strcpy(role,"R.Robotique");   
                break;
            case 5:
                strcpy(nom,"Meriem");     
                strcpy(role,"Membre");   
                break;
            case 6:
                strcpy(nom,"Ahlem");     
                strcpy(role,"R.Logistique");   
                break;
            case 7:
                strcpy(nom,"Soumia");     
                strcpy(role,"Formation");   
                break;
            case 8:
                strcpy(nom,"Tarek");     
                strcpy(role,"Adj SG");   
                break;
            case 9:
                strcpy(nom,"Imene Isso");     
                strcpy(role,"R.Comm");   
                break;
            case 10:
                strcpy(nom,"Yacine");     
                strcpy(role,"Event Manager");   
                break;
            case 11:
                strcpy(nom,"Samah");     
                strcpy(role,"Membre");   
                break;
           case 12:
                strcpy(nom,"Kheiro");     
                strcpy(role,"R Robotique");     
                break;
           case 13:
                strcpy(nom,"El Bey");     
                strcpy(role,""); 
                break;
            case 14:
                strcpy(nom,"Haythem");     
                strcpy(role,"R Design");   
                break;
            case 15:
                strcpy(nom,"Romaissa");     
                strcpy(role,"Membre");   
                break;
            case 16:
                strcpy(nom,"Yousra");     
                strcpy(role,"Membre");   
                break;
            case 17:
                strcpy(nom,"Cha3rinho");     
                strcpy(role,"UI UX");   
                break;
            case 18:
                strcpy(nom,"Mr Bourahla");     
                strcpy(role,"Ex President");   
                break;
            case 19:
                strcpy(nom,"Obito");     
                strcpy(role,"Membre");   
                break;
            case 20:
                strcpy(nom,"Tekabdji");     
                strcpy(role,"Bras Droit");   
                break;      
            case 21:
                strcpy(nom,"Latif");     
                strcpy(role,"Membre");   
                break;
            case 22:
                strcpy(nom,"Ilyes B");     
                strcpy(role,"Membre");   
                break;
            case 23:
                strcpy(nom,"Charif");     
                strcpy(role,"Logistique");   
                break;
            case 24:
                strcpy(nom,"Zakaria");     
                strcpy(role,"Membre");   
                break;
            case 25:
                strcpy(nom,"Feriel");     
                strcpy(role,"Membre");   
                break;
             
            default:
                strcpy(nom,"Bienvenue");        
                
          }
          lcd.backlight();
          lcd.clear();
          lcd.setCursor(0, 0);
          lcd.print(nom);
          lcd.setCursor(0, 1);
          lcd.print(role);
          digitalWrite(6,HIGH);
          digitalWrite(p,0);
          tone(buzz,523,50);
          delay(100);
          tone(buzz, 783, 50);
          delay(100);
          tone(buzz, 1046, 50);
          delay(100);
          tone(buzz, 1568, 50);
          delay(100);
          tone(buzz, 2093, 70);
          delay(250);
          delay(3000);
          digitalWrite(p,1);
          digitalWrite(6,LOW);
          lcd.clear();
          lcd.setCursor(0,0);
          lcd.print("CSCC - Bienvenue");
        



      }
      else {
          digitalWrite(7, 1);
          tone(buzz,370,50);
          delay(100);
          tone(buzz, 370, 300);
          delay(1000);
          digitalWrite(7, 0);
        lcd.backlight();
        lcd.clear();
        lcd.setCursor(3, 0);
        lcd.print("Erreur !");
        lcd.setCursor(2, 1);
        lcd.print("Members Only");
      }
      Serial.println("");
    }
    RFID.halt();
    delay(100);

  }



}


void ouv(){
          digitalWrite(6,HIGH);
          digitalWrite(p,0);
          tone(buzz,523,50);
          delay(100);
          tone(buzz, 783, 50);
          delay(100);
          tone(buzz, 1046, 50);
          delay(100);
          tone(buzz, 1568, 50);
          delay(100);
          tone(buzz, 2093, 70);
          delay(250);
          delay(3000);
          digitalWrite(p,1);
          digitalWrite(6,LOW);
          
          

}
