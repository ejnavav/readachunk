
`rm ../uploads/*.pdf`
`rm ../temp/*.pdf`
`rm ../db.json`
`touch ../db.json`

puts `curl -F "book=@20-pages.pdf;type=application/pdf" -F "email=vhnv2g@gmail.com" -F "pages=5" -F "frequency=1" http://localhost/upload.php`

4.times do |i|
  puts "scheduller: #{i}"
  puts `curl http://localhost/scheduler.php`
  sleep(5)
end  
