import smtplib


def send_email(recipient , sender, subject, body, server='localhost'):
    # Initial values for message
    SERVER = str(server)
    TO = [str(recipient)] # must be a list
    FROM = str(sender)
    SUBJECT = str(subject)
    TEXT = str(body)


    # Prepare actual message
    message = """\
    From: %s
    To: %s
    Subject: %s

    %s
    """ % (FROM, ", ".join(TO), SUBJECT, TEXT)

    # Send the mail

    server = smtplib.SMTP(SERVER)
    server.sendmail(FROM, TO, message)
    server.quit()
