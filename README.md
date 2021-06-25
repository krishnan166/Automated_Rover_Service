# CycleRental_Project 
![Header](https://github.com/krishnan166/CycleRental_Project/blob/main/index.png)
## Objective
The purpose of the proposed system is to automate the entire cycle lending service. It includes a web application into which registered users can log into and look for the availability of the public sharing cycles in the cycle stations. The user can book the cycle slots as well as cancel them. The proposed system has an automatic lock-unlock system. The user can take the cycle from any cycle station and drop it at any other. The user needs to pay a small amount as per usage which is automatically deducted from the user’s smart card.
Involves hardware prototyping with Node microcontroller, servo motors, RFID identification with RFID reader. 

## Software Requirements:
Arduino IDE 1.8.11

## Required Hardware components
1.Node MCU
2.IR obstacle avoidance sensor module
3.Radio Frequency Identification Reader
4.Servo motor
5.Power Supply
Languages
--- Frontend: HTML,CSS, JS
--- Backend: PHP,MySQL
H/w level: Arduino Programming language

## Working:
The project is briefly classified into:
1. Cycle Dock Stations
 2. Website application
 3. Cloud Side

*Cycle Dock Station:* 

Node MCU is the head of the hardware function. It is fitted in each of the cycle dock stations. The cycle station consists of the following components: 
1. NodeMCU-ESP8266 
2. IR Sensor Module 
3. RFID Reader 
4. Servo Motor 
5. Power Supply
<br/>
On powering the dock station, all of its constituent components also get powered as well as the NodeMCU gets connected to the internet via WiFi. The IR sensor keeps on giving the status of the slot regarding the presence and absence of the cycle in the respective slots with a certain pre-set time delay to the cloud. The absence of the cycle leads to the glowing state of the IR module. The RFID reader controls the gate of the parking slot. The code inside the RFID card is used for the unique identification of each user. The servo motor has a preset degree and direction of rotation set in order to lock and unlock the cycle during authorised access. During unauthorised access, it is denied and the gate remains in the previous state itself. This entire data including the ones sent by the IR sensor module and RFID reader through NodeMCU. The RFID reader and Servo motor control the Gate of the parking area. The user identification is done using an RFID card and RFID reader, if the user ID is matching then the servo will open the gate else access is denied. The whole data is sent to the cloud through the IoT platform using NodeMCU.


*Server:*
The Server side consists of
 1. Website application :   
  *(a) Client-side* 
  *(b) Server-side*

<br/>
2. Thingspeak Cloud 
<br/>
Web Application: Client-side
<br/>
The website has initially an index page having the options to either log in if it is an existing user or to sign up in case of a new user. On the same page, there is about and contact info regarding the application. When a new user decides to sign up for the bicycle sharing system, the user is redirected to a new page wherein he/she is supposed to enter their original email id which is verified through an OTP code. After the OTP is verified, the user is further directed to a signup page wherein all the user credentials need to be provided including details like contact number, communication address and a password of user preference for logging into the site. After successful signup, the user is issued an RFID card from the administrator or facilitator. In order to book the cycle or to dock the cycle back to any station, the slot needs to be booked. Prior to the booking, the user has the option to view the status of availability of the slots. The slots having the colour green has a cycle in them and can be taken for riding. The ones with blue colour do not have a cycle and can be used for docking the cycle. Once the booking is done, the slot can be locked or unlocked only by the RFID card of the respective user. There is an option to cancel the booking as well. There are overall four options with regards to each slot. Source booking, if the cycle is to be booked and source cancel to cancel that booking. There is destination slot booking for dock slot booking and its cancellation as well.<br/>

### Server-side
There are three tables in the database. One to store the registered users’ email id, one to store the OTP and one to store the credentials of the user after signup. The OTP remains in the database for 24 hours only and is valid till that time. The table with user credentials includes attributes like email, password, RFID card number, phone number, balance, booked slot number along with the respective station number. Whenever the cycle is booked, a particular amount is reduced from the user’s balance. The user can check for his balance as well. Redirection to a receipt page takes place after each booking action showing the user credentials and balance. In order to discourage the idea of locking the slots because of unnecessary bookings, the riding charges are deducted at the time of booking itself. <br/>

### ThingSpeak
Thingspeak is a cloud platform used for storing real-time data. The status of the slots is sent and stored in the cloud. For that, a channel is created in the Thingspeak cloud platform and that status is stored in one of the fields of the channel from which the home page of the web application gets the constantly updated data. A single channel has the utmost 8 fields. Since there are two stations in the presented project work, four of the fields in the channel corresponding to the IR sensor data regarding availability of slots and cycle and the rest four denote the RFID number that has booked the slot. RFID number is a 12 digit sequence of alphanumeric characters. If the slot booking is cancelled a sequence of zeroes is added to the RFID field to ensure that now it will be available for other users to book since the system is based on time-sharing. An additional digit is added to the RFID number just to realise which type of booking has happened; destination or source. 

## Flowchart
The internal working of the system is shown in the flowcharts given below.

**Flowchart 1**
<p align="centre">
 
![Flowchart 1](https://github.com/krishnan166/CycleRental_Project/blob/main/Flowchart1.jpg) 

<br/>

**Flowchart 2**
![Flowchart 2](https://github.com/krishnan166/CycleRental_Project/blob/main/Flowchart2.jpg)
</p>


