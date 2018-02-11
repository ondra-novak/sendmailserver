# sendmailserver
Server formats email using a template and sends it to the recepient. Controller by REST interface. nginx,PHP, sendmail required

#API
POST /send (send.php) - send e-mail
POST /preview (preview.php) - preview e-email

## input

**Content-Type**: application/json

```json
{
"template":"template-name",
"recepient":"user@email.com",
"data":{
   "custom-data":"custom-value"
}
```

# Templates

* Put templates into /templates
* Template is a PHP script.
* The output of the template is the body of the e-mail
* The script must specify a content-type of the e-mail in the variable $contentType 
* The script must specify a subject of the e-mail in the variable $subject




