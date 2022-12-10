from twilio.twiml.messaging_response import Body, Message, Redirect, MessagingResponse

response = MessagingResponse()
message = Message()
message.body('TwilioQuest rules')
response.append(message)
response.redirect('https://demo.twilio.com/welcome/sms/')

print(response)