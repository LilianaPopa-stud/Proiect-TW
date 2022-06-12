# Proiect-TW

Currently, the website can be started using xampp.

## Login/Signup process

### Signup


**Client side**

The user is able to easly signup with an username, email and password.
Said user will be asked to confirm the password by writing it again such that the server will check that the passwords are the same.

**Server side**

After fetching the data from the client, the server will connect to a MySql database in order to add the data to the 'users' table.

**The users table**

![image](https://user-images.githubusercontent.com/67517427/173224988-c0d2543a-53e9-4929-b3c7-f46231fd26bc.png)

**After adding a new user**

![image](https://user-images.githubusercontent.com/67517427/173225217-92b21b31-b25a-4009-84b9-ab44b0c9d9c5.png)


The passwords will be stored after being encrypted using md5.

If the registration process is successful, the new user will be able to freely access the website (the main page, the account page etc.)

## Login

**Client side**

The user is able to login by entering its username and password.

![image](https://user-images.githubusercontent.com/67517427/173225171-3fd730af-80d6-4fbf-ac21-f60aabb9c7cc.png)


**Server side**

The server will get the data from the user and will search in the database for the matching username and password.
If the login process is successful, the new user will be able to freely access the website (the main page, the account page etc.)
