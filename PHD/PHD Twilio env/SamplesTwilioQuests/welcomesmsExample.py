from twilio.rest import Client 
 
account_sid = 'ACc731c2af4fb82abb78f377c49379a831' 
auth_token = '[AuthToken]' 
client = Client(account_sid, auth_token) 
 
message = client.messages.create(  
                              messaging_service_sid='MGd9fe2d8682a7e425773afc1b24a6cf99', 
                              body='Welcome to Putyka man!',      
                              to='VERIFIED NUMBER' 
                          ) 
 
print(message.sid)
