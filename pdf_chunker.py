#!/usr/bin/env python
from pyPdf import PdfFileWriter, PdfFileReader
import sys, time

def readFile():
    if(len(sys.argv)<4):
        return sendError("Too few arguments")


    try:
        filename = sys.argv[1]
        startpage = int(sys.argv[2])
        noofpages = int(sys.argv[3])
    except IndexError, e:
        return sendError(e)

    timestamp = str(time.time())
    temppath = "temp/" + timestamp + '.pdf'
    
    
    #Open input and output
    inputfile = None
    try:
        
        inputfile = file(filename, "rb")
    except (OSError, IOError), e:
        return sendError(e)
    
    try:
        input1 = PdfFileReader(inputfile)
        output = PdfFileWriter()

        for i in range(noofpages):
            readpage = i+startpage
            output.addPage(input1.getPage(readpage))

        return writeOutput(temppath, output)
        
    except IndexError:
        return writeOutput(temppath, output, string=' DONE')
        
    except AttributeError, e:
        return sendError(e)

def sendError(error_msg):
    sender = "emil@kjer.info"
    recipient = "readachunk@kjer.info"
    subject = "ERROR with pdf chunker"
    body = str(error_msg)
    import sendemail
    sendemail.send_email(recipient, sender, subject, body)

    return "ERROR"
    
def writeOutput(temppath, output, string=''):
    outputStream = file(temppath, "wb")
    output.write(outputStream)
    outputStream.close()
    print temppath + string
    return
    
        
if __name__ == '__main__':
    readFile()
    
