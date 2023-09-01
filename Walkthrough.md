# Error404Unknown Lab Walkthrough
## Task 2 - SQL injection AuthBypass
- Due to most languages having a secure from the start design a lot of injections are harder to introduce but I have seen all of these vulnerabilities and more in real world applications. Most were not as straight forward but they were still present and thus exploitable.
### Fuzzing
- Start with small payloads and build upon them. This will not only benefit your understanding of a vulnerability but also help you identify more information about the enviornment.
   - With some basic fuzzing we can tell that something is not right with the login page. Let's think about what kind of query is probably being ran. This is taken straight from the source code but we can see that for login pages its going to check whether the inputted parameters match up to what is in the database and if so return true. So how do we exploit that?
   - ``` $query = "SELECT username, password FROM users WHERE username = '$userInputUsername' AND password = '$userInputPassword'"; ```
   - What about: ``` "SELECT username, password FROM users WHERE username = ''OR 1=1-- ' AND password = '$userInputPassword'"; ```
   - The above ends the query early and makes it return true (1=1, which will always evaluate to true) and then comments out the remainder. Inturn this logs you in as the first user in the database(Admin).
   - ``` "SELECT username, password FROM users WHERE username = 'Jackson'-- ' AND password = '$userInputPassword'";
   - The above will make the username Jackson and then comment out the remainder. As long as Jackson is a valid user you will be logged in.
 
## Task 3 - Insecure Direct Object Reference (IDOR)
### Identification
- When searching for IDORs it is ideal to be working with multiple user roles. Navigating around as both seeing if user 1 can access stuff that only user 2 should have access to. Usually by changing a URL parameter or POST body parameter.
    - Looking through the application we only see one location for this: records.php. Ironically, we see an id parameter that gets passed. Modify the id=1 -> id=2 and resend the request. Observe you are viewing other users sensitive information.
 
## Task 4 - Missing Function Level Access Control
### Identification
- When searching for MFLACs it is ideal to be working with mulitple user roles that are different. For example, a standard user and an admin. The goal is to GAIN functionality that you shouldn't have such as an admin page. This can be through forced browsing or submitting requests for priveleged functions replacing the admins cookies with the standard users.
    - In this instance the admin panel is hidden from every user in the User Interface. Thus doing a quick gobuster scan will reveal this page with no authorization checks in place. Sometimes your burp target will find hidden locations that are in the html.




































- For example in fields that search or ingest strings, try to verify. This step will help you narrow down the type of database so you can form your payload to fit it.
       ```ad'+'min or ad' 'min or ad'||'min```
       - Now that this step has been done review portswiggers cheatsheet. Depending on what worked it is possible to figure out a rough idea of what type of database is in use. This isn't as useful for auth bypass but it is for many other scenarios.
       - 
