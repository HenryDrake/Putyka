from twilio.rest import Client

# Your Account SID from twilio.com/console
account_sid = "ACc731c2af4fb82abb78f377c49379a831"
# Your Auth Token from twilio.com/console
auth_token  = "6b2cc3076d986d5d45bc59edc4983fa7"

client = Client(account_sid, auth_token)

message = client.messages.create(
    to="+420732280293", 
    from_="+13862617037",
    body="TwilioQuest rules")

print(message.sid)

