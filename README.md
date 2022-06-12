# Proiect-TW

**ENUNT**

Se dorește realizarea unei aplicații web prin intermediul căreia să se realizeze managementul fotografiilor personale. Aplicația va permite preluarea (upload-ul) de fotografii, ștergerea, organizarea în albume și partajarea acestora în mod public. In funcție de diversele tag-uri asociate unei fotografii, se va putea permite filtrarea acestora după diverse criterii (e.g. fotografiile din ultima luna, toate fotografiile în care apare o mașină roșie lângă un copac etc.). De asemenea, vor putea fi identificate/adnotate diverse obiecte sau persoane prezente intr-o fotografie – actiune ce va putea fi realizata de către orice utilizator, dar aprobata doar de posesorul fotografiei. Pentru orice fotografie, utilizatorii vor putea adăuga comentarii, acestea putand fi redate automat sau daca au fost aprobate de posesorului fotografiei. Din aplicație se vor putea exporta în format CSV diverse statistici (precum numărul de fotografii pe care un utilizator le are, câte dintre acestea au un anumit tag si altele). In plus, se va oferi posibilitatea de editare a fotografiilor la nivel minimal prin aplicarea de diverse filtre și efecte disponibile în CSS (efecte ce vor fi stocate în baza de date și aplicate fotografiei ori de câte ori va fi afișată).

**Specificatie**

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

## Albums

The user is able to create albums destined for organizing photos.

**Client side**

**The albums page**

![image](https://user-images.githubusercontent.com/67517427/173236951-953555cd-92fa-45b0-917c-4be8e7dbf02a.png)

**Server side**

**The `albums` table in MySql**

![image](https://user-images.githubusercontent.com/67517427/173236987-a7ab449b-3af6-40a3-b027-fbe2e5ebbc45.png)


**After a user adds albums**

![image](https://user-images.githubusercontent.com/67517427/173237005-6c4d2f6d-88b0-4c9e-b526-6a7b9bb893e2.png)

In `addAlbum.php`:
* the server will extract from the database the albums associated to the current session username, and will display them in html through the `albums.php` file.
* when the 'add new' album is clicked in `albums.php`, the server will extract the album name entered by the user (in the popup form made with JavaScript) and will insert it along the username in the databse.



