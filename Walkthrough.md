# Error404Unknown Lab Walkthrough
## Task 2 - SQL injection AuthBypass
- Due to most languages having a secure from the start design a lot of injections are harder to introduce but I have seen all of these vulnerabilities and more in real world applications. Most were not as straight forward but they were still present and thus exploitable.
### Fuzzing
- Start with small payloads and build upon them. This will not only benefit your understanding of a vulnerability but also help you identify more information about the enviornment.
   - For example in fields that search or ingest strings, try to verify. This step will help you narrow down the type of database so you can form your payload to fit it.
       ```ad'+'min or ad' 'min or ad'||'min```
