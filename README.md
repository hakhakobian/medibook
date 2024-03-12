
# Open Source MediBook using PHP

[MediBook](https://github.com/hakhakobian/medibook) is a Simple web project that is made using PHP, HTML & CSS.
I have set a common challenge, such as booking an appointment with a doctor. To address this, the minimal requirement is a platform with user-specific dashboards. Patients should be able to book appointments, while doctors can view and manage their schedules.
To expand on this, we can also include features like user registration, email notifications, a calendar for booking, and more detailed information about doctors' experience.
The main idea here is to create a backend API using REST API, making it easy to have a separate frontend. Right now, I’m using pure PHP/HTML/CSS for the frontend, but we might switch to something like ReactJS later.
It's important that the backend and the database are set up in a way that makes it simple to add more features in the future.
I have set a deadline of two days to get the first version of the dashboard ready, with plans to add more features later on.
During the project planning, the need for database requirements came up. I have decided to use  relational databases since the project is intended to be scalable, involving numerous tables that need to share information between each other, establishing both one-to-many and many-to-many connections.
As a programming principle was chosen OOP with the same reason, to make it expandable anytime.
So for the first I have registered rest routes to provide connection and data receiving between backend and frontend. Some of the routes are:
I decided to use OOP as the programming principle to make it easy to add more things later on. I set up rest routes to connect the backend and frontend and share data. Here are some of the routes:

GET method
/doctors
/doctors/[id]
/patients
/patients/[id]

PUT method
/appointment

DELETE method
/appointment/[id]

In this first version, I didn't include user registration, just added some data to the database. On the login page, you pick if you're a doctor or a patient, then choose from the existing users and log in. Patients can book appointments with their preferred doctor, and doctors can cancel booked appointments.
  

  
-----------------------------------------------


# GET STARTED WITH LOCALHOST

1. Open your XAMPP Control Panel and start Apache and MySQL.
2. Extract the downloaded source code zip file.
3. Copy the extracted source code folder and paste it into the XAMPP's "htdocs" directory.
4. Browse the PHPMyAdmin in a browser. i.e. http://localhost/phpmyadmin
5. Create a new database naming `medibook`.
6. Import the provided SQL file. The file is known as DATABASE medibook.sql located inside the source code root folder.
7. Browse the MediBook in a browser. i.e. http://localhost/medibook/.
